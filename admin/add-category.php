<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name='image'>
                    </td>
                </tr>
                <tr>
                    <td>Feature: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary ">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];

                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }
                // Kiểm tra file ảnh
                if(isset($_FILES['image']['name']))
                {
                    // Upload Ảnh
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "")
                    {               

                        $ext = end(explode('.',$image_name));

                        // Đổi tên ảnh
                        $image_name = "Food-category_".rand(000,999).".".$ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;
                        
                        $upload  = move_uploaded_file($source_path , $destination_path);

                        // Kiểm tra file ảnh
                        if($upload == false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed To Upload Images</div>";

                            header("location:".SITEURL.'admin/add-category.php');

                            die();
                        }

                    }
                }
                else
                {
                    $image_name = "";
                }

                // Câu lệnh SQL
                $sql = "INSERT INTO tbl_category SET title = '$title',image_name = '$image_name', featured='$featured' , active = '$active'";
                // Thực thi
                $res = mysqli_query($conn , $sql);
                //Kiểm tra kết quả
                if($res == TRUE)
                {
                    $_SESSION['add'] = "<div class='success'>Category Added Successful..</div>";

                    header("location:".SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to add catrgory!!!</div>";

                    header("location:".SITEURL.'admin/add-category.php');
                }
            }

        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>