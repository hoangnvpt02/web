<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>
<body>
<section>
     <!--Bắt Đầu Phần Hình Ảnh-->
     <div class="img-bg">
         <img src="../images/burger.jpg" alt="Hình Ảnh Minh Họa">
     </div>
     <!--Kết Thúc Phần Hình Ảnh-->
     <!--Bắt Đầu Phần Nội Dung-->
     <div class="noi-dung">
         <div class="form">
             <h2>Admin Panel</h2>
             <form action="" method="POST">
                 <div class="input-form">
                     <span>Username</span>
                     <input type="text" name="username">
                 </div>
                 <div class="input-form">
                     <span>Password</span>
                     <input type="password" name="password">
                 </div>
                 <div class="nho-dang-nhap">
                     <label><input type="checkbox" name="">Remember Login</label>
                 </div>
                 <div class="input-form">
                     <input type="submit"  name="submit" value="Đăng Nhập">
                 </div>
             </form>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
 </section>
</body>
</html>

<?php
    if(isset($_POST['submit']))
    {
         $username = $_POST['username'];
         $password = md5($_POST['password']);

         $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password='$password'";

         $res = mysqli_query($conn , $sql);

         $count = mysqli_num_rows($res);

         if($count == 1)
         {
            $_SESSION['login'] = "<div class='success'>Login Successfully..</div>";

            $_SESSION['user'] = $username;
            header("location:".SITEURL.'admin/');
         }
         else
         {
            $_SESSION['login'] = "<div class='error'>Username or password is incorrect!!!</div>";
            header("location:".SITEURL.'admin/login.php');
         }
    }
?>