<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
    echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'connection.php'; ?>
 

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Category-Add Category</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
      <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
<?php include 'header.php'; ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
        
        <div class="row">
                      <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                  <?php
                                  if(isset($_POST["btnsubmit"]))
                                  {
                                    //abc.jpg
                                    $ext = pathinfo($_FILES["categoryimg"]["name"],PATHINFO_EXTENSION);// jpg
                                    $newname = time().rand(1111,9999).time().".".$ext;// 561561613343.jpg
                                    move_uploaded_file($_FILES["categoryimg"]["tmp_name"], "uploads/category/".$newname);
                                    //
                                     $id=my_simple_crypt($_GET["updateid"],'d');
                                    $result = mysqli_query($conn,"update tbl_category set category_name='".$_POST["txtname"]."',category_img='".$newname."',category_des='".$_POST["txtaddress"]."' where category_id='".$id."' ") or die(mysqli_error($conn));

                                     if($result==true)
                                    {
                                      echo"<script>window.location='viewcategory.php';</script>";
                                    }
                                    else
                                    {
                                      ?>
                                      <div class="alert alert-danger" role="alert">
                                        Error!! Please check again.....
                                      </div>
                                      <?php
                                    }
                                  }
                                  ?>  
                                  <?php
                                    if(isset($_GET["updateid"]))
                                    {
                                         $id=my_simple_crypt($_GET["updateid"],'d');

                                        if(!$id)
                                        {
                                            echo"<script>window.location='error.php';</script>";
                                        }

                                         $result=mysqli_query($conn,"select * from tbl_category where category_id='".$id."'") or die(mysqli_error($conn));
                                          while($item=mysqli_fetch_assoc($result))
                                          {
                                 
                                  ?>  
                                    <form method="post" id="form1" enctype="multipart/form-data">
                                        <div class="form-group">
                                        Category name :
                                           <input value="<?php echo $item["category_name"]; ?>" type="text" id="txtname"  name="txtname" class="form-control input-rounded" onBlur='checkcatname()'>
                                           <span class="error" id="lblcname"></span>
                                        </div>
                                        <div class="form-group">
                                            Category Image:<input  value="<?php echo $item["category_img"]; ?>" type="file" name="categoryimg" class="form-control input-rounded" >
                                            <a target="_blank" href="uploads/cateory/<?php echo $item["category_img"]; ?>">
                                    <img width="100" height="100" src="uploads/category/<?php echo $item["category_img"]; ?>">
                                </a>
                                        </div>
                                         <div class="form-group">
                                            Category Desc:<textarea  value="<?php echo $item["category_des"]; ?>"  rows="4" id="comment" class="form-control" name="txtaddress"></textarea>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-primary">Submit</button>
                                                <button type="submit" class="btn btn-primary">Cancel</button>
                                            </div>
                                        </div>
                                    </form>

                                    <?php 

                                    }

                                  }

                                    ?>
                             </div>   
                            </div>
                        </div>
                    </div>
    </div>
        
    </div>

       

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
  <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
  <script src="js/deznav-init.js"></script>
  <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script>
    function checkcatname()
    {
      var cname=$("#txtname").val();
      $.ajax({
        url:'checkcatname.php',
        type:'post',
        data:{cname:cname},
        datatype:"JSON",
        success: function(res)
        {
          if(res.trim()=="true")
          {
            $("#lblcname").html("This category already exist");
            $('#btnsubmit').attr("disabled",true);
          }else
          {
            $("#lblcname").html("");
            $('#btnsubmit').attr("disabled",false);
          }
        }
      });
    }
  </script>
     <script>
        $('#form1').validate({
            rules:
            {
                txtname:
                {
                    required:true
                },
                categoryimg:
                {
                    required:true,
                    accept:"image/*"
                },
                txtaddress:
                {
                    required:true
                }
            },
            messages:
            {
                txtname:
                {
                    required:"Please enter category name"
                },
                categoryimg:
                {
                    required:"Please enter image",
                    accept:"Please select valid file"
                },
                txtaddress:
                {
                    required:"Please enter category address"
                }
            }
        });
    </script> 
    


</body>


<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>