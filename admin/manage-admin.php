<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- Menu Section Start  -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Foods</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- Menu Section End  -->
    <!-- Main Content Section Start  -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                if(isset($_SESSION['pass-not-match']))
                {
                    echo $_SESSION['pass-not-match'];
                    unset($_SESSION['pass-not-match']);
                }
                if(isset($_SESSION['change-pass']))
                {
                    echo $_SESSION['change-pass'];
                    unset($_SESSION['change-pass']);
                }
            ?>
            <br><br><br>
            <!-- Button to add admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br /><br /><br />
            <table class="tbl-full" >
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="" class="btn-secondary">Update Admin</a>
                                            <a href="" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                      
            </table>

        </div>
    </div>
    <!-- Main Content Section End  -->

    <!-- Footer Section Start  -->
    <div class="footer">
       <div class="wrapper">
            <p class="text-center">2022 ALL rights reserved - Design By <a href="https://www.facebook.com/Eviljayce0709/">Tran Long Vu </a> - T2104E <a href="https://aptech.fpt.edu.vn/">FPT Aptech</a></p>
       </div>
    </div>
    <!-- Footer Section End  -->


</body>
</html>