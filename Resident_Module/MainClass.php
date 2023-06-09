<?php
if(session_status() === PHP_SESSION_NONE)
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class MainClass{
    protected $db;
    function __construct(){
        $this->db = new mysqli('sql211.infinityfree.com', 'if0_34365512', '5X5BVXjt829', 'if0_34365512_brgy35');
        if(!$this->db){
            die("Database Connection Failed. Error: ".$this->db->error);
        }
    }
    function db_connect(){
        return $this->db;
    }


    public function MainClasslogin2(){
        extract($_POST);
        $sql = "SELECT * FROM `resident_account` where `email` = ? ";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $data = $result->fetch_array();
            $pass_is_right = password_verify($password,$data['password']);
            if($pass_is_right){
                $resp['status'] = 'success';
                $_SESSION['user_id'] = $data['id'];
            }else{
                $resp['status'] = 'failed';
                $_SESSION['flashdata']['type'] = 'danger';
                $_SESSION['flashdata']['msg'] = ' Incorrect Password';
            }
        }else{
            $resp['status'] = 'failed';
            $_SESSION['flashdata']['type'] = 'danger';
            $_SESSION['flashdata']['msg'] = ' Email is not registered.';
        }
        return json_encode($resp);
    }
    public function login()
    {
        extract($_POST);
        
        // Check if email exists in the 'users' table
        $sql = "SELECT * FROM `users` WHERE `email` = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_array();
            $pass_is_right = password_verify($password, $data['password']);
            if ($pass_is_right) {
                $resp['status'] = 'success';
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['typeAccount'] = 'barangay';
                return json_encode($resp);
                exit;
            } else {
                $resp['status'] = 'failed';
                $_SESSION['flashdata']['type'] = 'danger';
                $_SESSION['flashdata']['msg'] = 'Incorrect Password';
            }


        } else {
            // Check if email exists in the 'resident_account' table
            $sql = "SELECT * FROM `resident_account` WHERE `email` = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $data = $result->fetch_array();
                $pass_is_right = password_verify($password, $data['password']);
                if ($pass_is_right) {
                    $resp['status'] = 'success';
                    $_SESSION['user_id'] = $data['id'];
                    $_SESSION['typeAccount'] = 'resident';
                    return json_encode($resp);
                    exit;
                } else {
                    $resp['status'] = 'failed';
                    $_SESSION['flashdata']['type'] = 'danger';
                    $_SESSION['flashdata']['msg'] = 'Incorrect Password';
                }
            } else {
                $resp['status'] = 'failed';
                $_SESSION['flashdata']['type'] = 'danger';
                $_SESSION['flashdata']['msg'] = 'Email is not registered.';
            }
        }
        
        return json_encode($resp);
    }
    
    


    public function register2(){
        foreach($_POST as $k => $v){
            $$k = $this->db->real_escape_string($v);
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $check = $this->db->query("SELECT * FROM `users` WHERE `email`= '{$email}'")->num_rows;
        if($check > 0){
            $resp['status'] = 'failed';
            $_SESSION['flashdata']['type']='danger';
            $_SESSION['flashdata']['msg'] = 'Email already exists.';
        } else {
            $sql = "INSERT INTO `users` (username, email, `password`) VALUES ('$username', '$email', '$password')";
            $save = $this->db->query($sql);
            
            if ($save) {
                $otp = sprintf("%'.06d", mt_rand(0,999999));
                $expiration = date("Y-m-d H:i", strtotime("+5 minutes"));
                $update_sql = "UPDATE `users` SET otp_expiration = '{$expiration}', otp = '{$otp}' WHERE email = '{$email}'";
                $update_otp = $this->db->query($update_sql);
                
                if ($update_otp) {
                    $has_code = true;
                    $resp['status'] = 'success';
                    $_SESSION['otp_verify_user_id'] = $this->db->insert_id;
                    $this->send_mail($email, $otp);
                } else {
                    $has_code = false;
                    $resp['status'] = 'failed';
                    $_SESSION['flashdata']['type'] = 'danger';
                    $_SESSION['flashdata']['msg'] = 'An error occurred while generating OTP. Please try again later.';
                }
            } else {
                $has_code = false;
                $resp['status'] = 'failed';
                $resp['err'] = $this->db->error;
                $_SESSION['flashdata']['type'] = 'danger';
                $_SESSION['flashdata']['msg'] = 'An error occurred while registering. Please try again later.';
            }
        }
        return json_encode($resp);
    }



  

    public function register()
    {
        foreach ($_POST as $k => $v) {
            $$k = $this->db->real_escape_string($v);
        }
        
        // Check if email already exists
        $check = $this->db->query("SELECT * FROM `resident_account` WHERE `email` = '$email'")->num_rows;
        if ($check > 0) {
            $resp['status'] = 'failed';
            $_SESSION['flashdata']['type'] = 'danger';
            $_SESSION['flashdata']['msg'] = 'Email already exists.';
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `resident_account` (username, email, `password`) VALUES ('$username', '$email', '$password')";
            $save = $this->db->query($sql);
            if ($save) {
                $resp['status'] = 'success';
            } else {
                $resp['status'] = 'failed';
                $resp['err'] = $this->db->error;
                $_SESSION['flashdata']['type'] = 'danger';
                $_SESSION['flashdata']['msg'] = 'An error occurred.';
            }
        }
        
        return json_encode($resp);
    }
    

    public function get_user_data_admin($id){
        extract($_POST);
        $sql = "SELECT * FROM `users` where `id` = ? ";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $dat=[];
        if($result->num_rows > 0){
            $resp['status'] = 'success';
            foreach($result->fetch_array() as $k => $v){
                if(!is_numeric($k)){
                    $data[$k] = $v;
                }
            }
            $resp['data'] = $data;
        }else{
            $resp['status'] = 'false';
        }
        return json_encode($resp);
    }


    public function get_user_data($id){
        extract($_POST);
        $sql = "SELECT * FROM `resident_account` where `id` = ? ";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $dat=[];
        if($result->num_rows > 0){
            $resp['status'] = 'success';
            foreach($result->fetch_array() as $k => $v){
                if(!is_numeric($k)){
                    $data[$k] = $v;
                }
            }
            $resp['data'] = $data;
        }else{
            $resp['status'] = 'false';
        }
        return json_encode($resp);
    }

    
    public function resend_otp($id){
        $otp = sprintf("%'.06d",mt_rand(0,999999));
        $expiration = date("Y-m-d H:i" ,strtotime(date('Y-m-d H:i')." +1 mins"));
        $update_sql = "UPDATE `resident_account` set otp_expiration = '{$expiration}', otp = '{$otp}' where id = '{$id}' ";
        $update_otp = $this->db->query($update_sql);
        if($update_otp){
            $resp['status'] = 'success';
            $email = $this->db->query("SELECT email FROM `resident_account` where id = '{$id}'")->fetch_array()[0];
         //   $this->send_mail($email,$otp);
            $this->send_mail($email, $pin="");
        }else{
            $resp['status'] = 'failed';
            $resp['error'] = $this->db->error;
        }
        return json_encode($resp);
    }

    
    public function login_resident($email, $password){
        $sql = "SELECT * FROM `resident_account` where `email` = ? ";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $data = $result->fetch_array();
            $pass_is_right = password_verify($password,$data['password']);
            $has_code = false;
            if($pass_is_right && (is_null($data['otp']) || (!is_null($data['otp']) && !is_null($data['otp_expiration']) && strtotime($data['otp_expiration']) < time()) ) ){
                $otp = sprintf("%'.06d",mt_rand(0,999999));
                $expiration = date("Y-m-d H:i" ,strtotime(date('Y-m-d H:i')." +1 mins"));
                $update_sql = "UPDATE `resident_account` set otp_expiration = '{$expiration}', otp = '{$otp}' where id='{$data['id']}' ";
                $update_otp = $this->db->query($update_sql);
                if($update_otp){
                    $has_code = true;
                    $resp['status'] = 'success';
                    $_SESSION['otp_verify_user_id'] = $data['id'];
                    $this->send_mail($data['email'],$otp);
                }else{
                    $resp['status'] = 'failed';
                    $_SESSION['flashdata']['type'] = 'danger';
                    $_SESSION['flashdata']['msg'] = ' An error occurred while logging in. Please try again later.';
                }
 
            }else if(!$pass_is_right){
               $resp['status'] = 'failed';
               $_SESSION['flashdata']['type'] = 'danger';
               $_SESSION['flashdata']['msg'] = ' Incorrect Password';
            }
        }else{
            $resp['status'] = 'failed';
            $_SESSION['flashdata']['type'] = 'danger';
            $_SESSION['flashdata']['msg'] = ' Email is not registered.';
        }
        return json_encode($resp);
    }


    public function otp_verify(){
        extract($_POST);
         $sql = "SELECT * FROM `resident_account` where id = ? and otp = ?";
         $stmt = $this->db->prepare($sql);
         $stmt->bind_param('is',$id,$otp);
         $stmt->execute();
         $result = $stmt->get_result();
         if($result->num_rows > 0){
             $resp['status'] = 'success';
             $this->db->query("UPDATE `resident_account` set otp = NULL, otp_expiration = NULL where id = '{$id}'");
             $_SESSION['user_login'] = 1;
             foreach($result->fetch_array() as $k => $v){
                 if(!is_numeric($k))
                 $_SESSION[$k] = $v;
             }
         }else{
             $resp['status'] = 'failed';
             $_SESSION['flashdata']['type'] = 'danger';
             $_SESSION['flashdata']['msg'] = ' Incorrect OTP.';
         }
         return json_encode($resp);
    }


 /*  function send_mail($to="", $pin="") {
        // Include the PHPMailer library
        require __DIR__ . '/PHPMailer-6.8.0/src/PHPMailer.php';
    
        // Create a new PHPMailer instance
        $mail = new PHPMailer();
    
        // Set the email address of the sender and recipient
        $mail->setFrom('info@example.com', 'Example');
        $mail->addAddress($to);
    
        // Set the subject and message body
        $mail->Subject = 'OTP';
        $mail->Body = "<html><body><h2>You are Attempting to Login in Inhabitant Management System for Brgy. 35, Zone 3, District 1, Tondo, Manila</h2><p>Here is your OTP (One-Time PIN) to verify your Identity.</p><h3><b>$pin</b></h3></body></html>";
        $mail->isHTML(true);
    
        // Send the email
        if (!$mail->send()) {
            // Handle error
            $error_message = $mail->ErrorInfo;
            // Debugging statement
            error_log("Error sending email: " . $error_message);
            return false;
        } else {
            // Debugging statement
            error_log("Email sent successfully to: " . $to);
            return true;
        }
    }
    
    function send_mail($to="",$pin=""){
        if(!empty($to)){
            try{
                $email = 'info@xyzapp.com';
                $headers = 'From:' .$email . '\r\n'. 'Reply-To:' .
                $email. "\r\n" .
                'X-Mailer: PHP/' . phpversion()."\r\n";
                $headers .= "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // the message
                $msg = "
                <html>
                    <body>
                        <h2>You are Attempting to Login in Inhabitant Management System for Brgy. 35, Zone 3, District 1, Tondo, Manila</h2>
                        <p>Here is yout OTP (One-Time PIN) to verify your Identity.</p>
                        <h3><b>".$pin."</b></h3>
                    </body>
                </html>
                ";
 
                // send email
                mail($to,"OTP",$msg,$headers);
                // die("ERROR<br>".$headers."<br>".$msg);
 
            }catch(Exception $e){
                $_SESSION['flashdata']['type']='danger';
                $_SESSION['flashdata']['msg'] = ' An error occurred while sending the OTP. Error: '.$e->getMessage();
            }
        }
    }*/


    function send_mail($to="", $pin=""){



        require '../includes/PHPMailer/src/Exception.php';
        require '../includes/PHPMailer/src/PHPMailer.php';
        require '../includes/PHPMailer/src/SMTP.php';



        if(!empty($to)){


            $email = $to;
           $message ="
            <html>
                <body>
                    <h2>You are Attempting to Login in Inhabitant Management System for Brgy. 35, Zone 3, District 1, Tondo, Manila</h2>
                    <p>Here is yout OTP (One-Time PIN) to verify your Identity.</p>
                    <h3><b>".$pin."</b></h3>
                </body>
            </html>
            ";
        
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tt9951053@gmail.com'; // Replace with your Gmail address
            $mail->Password = 'igsmajexshjxpwlo'; // Replace with your Gmail password
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->isHTML(true);
            $mail->setFrom('brgy35noreply@gmail.com', "brgy35-noreply");
            $mail->addAddress($email);
            $mail->Subject = "brgy35noreply@gmail.com";
            $mail->Body = $message;
        
            try {
                $mail->send();
                
            } catch (Exception $e) {
                $_SESSION['flashdata']['type']='danger';
                $_SESSION['flashdata']['msg'] = ' An error occurred while sending the OTP. Error: '.$e->getMessage();
             }        
        }
    }
    
    function __destruct(){
         $this->db->close();
    }
}
$class = new MainClass();
$conn= $class->db_connect();