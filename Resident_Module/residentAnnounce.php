<?php
include "../includes/Auth.php";
include "../includes/MainClass.php";
include "header.php";
?>

<html>
<head>
    <title>Fixing Code</title>
    <!-- Add your CSS stylesheets and other head elements here -->
</head>
<body>
<section class="home-section">
     <div class="home-content" style = "background-color: #494949">
        <i class='bx bx-menu'></i>
        <span class="text" style = "color:#fff">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>



    <?php
    // Read all rows from the database table
    $userId = ucwords($_SESSION['user_id']);
    $sql = "SELECT * FROM event
            JOIN resident_announcement ON resident_announcement.event_id = event.id
            WHERE resident_announcement.resident_account_ID = $userId";
    $result = $conn->query($sql);
    

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }

    while ($row = $result->fetch_assoc()) {
        ?>
        <div class='container py-2 '>
            <div class='row d-flex justify-content-center align-items-center '>
                <div class='col col-xl-7'>
                    <div class='card mb-5' style='border-radius: 15px;'>
                        <div style='background-color: #494949;border-radius: 10px' class='card-body p-4'>
                            <h3 style='color: white' class='mb-3'><?php echo $row['about']; ?></h3>
                            <p style='color: white' class='small mb-0'>
                                <i class='far fa-star fa-lg'></i> Location at
                                <strong><?php echo $row['location']; ?></strong> on <?php echo $row['date_from']; ?>
                                to <?php echo $row['date_to']; ?>
                                <span class='mx-2'>(</span> <?php echo $row['time_start']; ?>
                                - <?php echo $row['time_end']; ?> <span class='mx-2'>)</span></p>
                            <hr class='my-4'>

                            <div class='d-flex justify-content-start rounded-3 p-2 mb-2'
                                 style='background-color: #efefef;'>
                                <div class='card-body text-center'>
                                    <p class='small text-muted mb-1'><?php echo $row['post']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
</body>
</html>
