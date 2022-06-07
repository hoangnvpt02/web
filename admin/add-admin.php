<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <br>
        <br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>FullName : </td>
                    <td><input type="text" name="full_name" placeholder="Enter your name" id="ful_name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Your Username" id="username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Your Password" id="password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" id="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<!-- Footer Section Start  -->
 <?php
    include('partials/footer.php')
 ?>
    <!-- Footer Section End  -->
<?php
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO tbl_admin SET full_name = '$full_name',
                                        username = '$username', 
                                        password = '$password'
        "; 
        
        $res = mysqli_query($conn,$sql) or die (mysqli_error());

        if($res == TRUE)
        {
            $_SESSION['add'] = "<div class='success'>Add Admin Successfully.</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed To Add Admin..</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
                                       
?>        
 