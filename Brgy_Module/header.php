


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/indexstyle.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel = "icon" href = "../img/brgylogo.png">
  <title>Barangay 35</title>


  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
  rel="stylesheet"
/>

<style>

body,h1,b,td,tr,label,input,button{
font-family: 'Roboto', sans-serif;
color:#fff;
}

.missionVission h1,p,hr{
  margin:20px;
  color:#fff;
  font-family: 'Roboto', sans-serif; /* add a font style */

}

.home-section{
  position: relative;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)) , url('../img/brgypic.jpg');
 
  left: 260px;
  width: calc(100% - 260px);
  transition: all 0.5s ease;
}
.sidebar .nav-links{
  height: 100%;
  padding: 30px 0 150px 0;
  overflow: auto;
}
.sidebar.close .nav-links{
  overflow: visible;
}
.sidebar .nav-links::-webkit-scrollbar{
  display: none;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li:hover{
  background: #343434;
}
.sidebar .nav-links li .iocn-link{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sidebar.close .nav-links li .iocn-link{
  display: block
}
.sidebar .nav-links li i{
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.sidebar .nav-links li.showMenu i.arrow{
  transform: rotate(-180deg);
}
.sidebar.close .nav-links i.arrow{
  display: none;
}
.sidebar .nav-links li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sidebar .nav-links li a .link_name{
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  transition: all 0.4s ease;
}
.sidebar.close .nav-links li a .link_name{
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links li .sub-menu{
  padding: 6px 6px 14px 80px;
  margin-top: -10px;
  background: rgb(52, 52,52 , 0.9);
  display: none;
}
.sidebar .nav-links li.showMenu .sub-menu{
  display: block;
}
.sidebar .nav-links li .sub-menu a{
  color: #fff;
  font-size: 15px;
  padding: 5px 0;
  white-space: nowrap;
  opacity: 0.6;
  transition: all 0.3s ease;
}
.sidebar .nav-links li .sub-menu a:hover{
  opacity: 1;
}
.sidebar.close .nav-links li .sub-menu{
  position: absolute;
  left: 100%;
  top: -10px;
  margin-top: 0;
  padding: 10px 20px;
  border-radius: 0 6px 6px 0;
  opacity: 0;
  display: block;
  pointer-events: none;
  transition: 0s;
}
.sidebar.close .nav-links li:hover .sub-menu{
  top: 0;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
}
.sidebar .nav-links li .sub-menu .link_name{
  display: none;
}
.sidebar.close .nav-links li .sub-menu .link_name{
  font-size: 18px;
  opacity: 1;
  display: block;
}
.sidebar .nav-links li .sub-menu.blank{
  opacity: 1;
  pointer-events: auto;
  padding: 3px 20px 6px 16px;
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links li:hover .sub-menu.blank{
  top: 50%;
  transform: translateY(-50%);
}
.sidebar .profile-details{
  position: fixed;
  bottom: 0;
  width: 260px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #343434;
  padding: 12px 0;
  transition: all 0.5s ease;
}
.sidebar.close .profile-details{
  background: none;
}
.sidebar.close .profile-details{
  width: 78px;
}
.sidebar .profile-details .profile-content{
  display: flex;
  align-items: center;
}
.sidebar .profile-details img{
  height: 52px;
  width: 52px;
  object-fit: cover;
  border-radius: 16px;
  margin: 0 14px 0 12px;
  background: #1d1b31;
  transition: all 0.5s ease;
}
.sidebar.close .profile-details img{
  padding: 10px;
}
.sidebar .profile-details .profile_name,
.sidebar .profile-details .job{
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  white-space: nowrap;
}
.sidebar.close .profile-details i,
.sidebar.close .profile-details .profile_name,
.sidebar.close .profile-details .job{
  display: none;
}
.sidebar .profile-details .job{
  font-size: 12px;
}
.sidebar.close ~ .home-section{
  left: 78px;
  width: calc(100% - 78px);
}
.home-section .home-content{
  height: 60px;
  display: flex;
  align-items: center;
}
.home-section .home-content .bx-menu,
.home-section .home-content .text{
  color: #FFF;
  font-size: 35px;
}
.home-section .home-content .bx-menu{
  margin: 0 15px;
  cursor: pointer;
}
.home-section .home-content .text{
  font-size: 30px;
  font-weight: 600;
}
@media (max-width: 400px) {
  .sidebar.close .nav-links li .sub-menu{
    display: none;
  }
  .sidebar{
    width: 78px;
  }
  .sidebar.close{
    width: 0;
  }
  .home-section{
    left: 78px;
    width: calc(100% - 78px);
    z-index: 100;
  }
  .sidebar.close ~ .home-section{
    width: 100%;
    left: 0;
  }
}</style>

<!--Style 2-->

<style>
  .editable{
    display:none;
  }

  .database,.documents,.ForIandA{
    height:830px;
  
  }

  

  
  .ForIandA{
  padding:10px;
    
  }
  .inbox,.anouncement{
    height: 400px;
padding:10px;
   


  }

  .center {
  margin: auto;
  width: 60%;
  border: 3px solid #494949;
  padding: 10px;
}

  
  .c1{
    height: 100px;
    background-color: rgb(167,196,188,0.3);
    padding: 10px;
    border-radius: 30px;
    margin: 5px;
}
  .scroll-container4 {
  height: 740px;
   overflow: hidden; /* set a fixed height for the container */
  overflow-y: scroll; /* add a vertical scrollbar */
 }
 .scroll-container3 {
  height: 320px;
   overflow: hidden; /* set a fixed height for the container */
  overflow-y: scroll; /* add a vertical scrollbar */
 }
 .scroll-container2 ,.scroll-container1 {
  height: 740px;
   overflow: hidden; /* set a fixed height for the container */
  overflow-y: scroll; /* add a vertical scrollbar */
 }
 
.missionVission{
  margin:20px;

}




.container.content {
  text-align: center; /* center the text */

}


 .center {
  text-align: center;
  margin: auto;
  
  width: 50%;
  height:650px;
  padding: 50px;
}
</style>
</head>



<body>
  <div class="sidebar close" style = "background: #494949;">
    <div class="logo-details">
      <i><img src = "../img/brgylogo.png" height="120%" width="85%"></i>
   <span class="logo_name"> Welcome, <?= ucwords(explode(' ', $_SESSION['username'])[0]) ?></span>
    </div>

    <ul class="nav-links">
      <li>
        <a href="index.php">
        <i class='bx bx-pie-chart-alt-2'></i>
      <span class="link_name">Homepage</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.php">Homepage</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="rbi.php">
            <i class='bx bx-data' ></i>
            <span class="link_name">Database</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="rbi.php">Database</a></li>
          <li><a href="rbi.php">RBI</a></li>
          <li><a href="brgyofficials.php">Barangay Officials</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="event_announcements.php">
          <i class='bx bx-book-alt'></i>
    <span class="link_name">Announce</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="event_announcements.php">Announce</a></li>
          <li><a href="event_announcements.php">General</a></li>
          <li><a href="resident_announcements.php">Residents</a></li>
          </ul>
      </li>

      <li>
      <a href="requestDocu.php">
          
      <i class='bx bx-time-five'></i>
       <span class="link_name">Issue</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="requestDocu.php">Issue</a></li>
        </ul>
      </li>

      <li>
        <a href="report4.php">
        <i class='bx bx-envelope'></i>
   <span class="link_name">Inbox</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="report4.php">Inbox</a></li>
        </ul>
      </li>


      <li>
      <a href="recycle.php">
          
      <i class='bx bx-history'></i>
          <span class="link_name">Restore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="recycle.php">Restore</a></li>
        </ul>
      </li>


      <li>
      <a href="account.php">
           <i class='bx bx-cog' ></i>
          <span class="link_name">Account</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="account.php">Account</a></li>
        </ul>
      </li>
      
     
      

      <li>
    <div class="profile-details">
      <div class="profile-content">
      </div>
      <div class="name-job">
        <div class="profile_name">Administrator</div>
        </div>
      <i class='bx bx-log-out' id="log_out" onClick="Javascript:window.location.href = 'logout.php'"></i>
    </div>
  </li>
</ul>
  </div>


