<?php
  include 'check.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: 15% auto;
  /* text-align: center; */
  font-family: arial;
  height: 200px;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>


<div class="card">
  <!-- <img src="../Desktop/IMC-BIT-18-96694/img/profile.jpeg" alt="John" style="width:100%"> -->
  <div style="margin:10px auto; width: 80%;">
    <label for="username">
      <span>Username: <span style="margin-left: 40px; color: maroon;"><?php echo $login_user; ?></span></span>
    </label>
    <p class="title">CEO & Founder, Example</p>
    <p>Institute of Finance Management</p>
    <!-- <div style="margin: 24px 0;">
      <a href="#"><i class="fa fa-dribbble"></i></a> 
      <a href="#"><i class="fa fa-twitter"></i></a>  
      <a href="#"><i class="fa fa-linkedin"></i></a>  
      <a href="#"><i class="fa fa-facebook"></i></a> 
    </div> -->
    <a href="logout.php" style="float: right;"><span style="font-size: 16px;">Logout</span></a>
  </div>
  <!-- <p><button><a style="color: #fff" href="editprofile.php">Edit Profile</a></button></p> -->
</div>

</body>
</html>