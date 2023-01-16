<?php 
session_start();
if(!isset($_SESSION["islogin"]))
{
    echo"<script>window.location='index.php';</script>";
}
?>
<?php include 'connection.php' ?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Update Admin - Admin</title>
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
                  <h4 class="card-title">Update Admin</h4>
              </div>
            <div class="card-body">
                  <div class="basic-form">
                                  <?php
                                    if(isset($_GET["updateid"]))
                                    {
                                       $id=my_simple_crypt($_GET["updateid"],'d');

                                        if(!$id)
                                        {
                                            echo"<script>window.location='error.php';</script>";
                                        }

                                         $result=mysqli_query($conn,"select * from tbl_admin where login_id='".$id."'") or die(mysqli_error($conn));
                                          while($item=mysqli_fetch_assoc($result))
                                          {
                                   ?>


                      <form method="post" id="form1" enctype="multipart/form-data">
                        <table id="example3" class="display table-responsive-lg">
                          <td>
                    <div class="col=6" class="form-group">
                       <b>Name : </b>
                       <div  class="col-6" class="form-group">
                        <?php echo $item["admin_name"]; ?>
                    </div>
                  
                   <div  class="col-6" class="form-group">
                      <b> UserName : </b>
                      <div  class="col-6" class="form-group">
                      <?php echo $item["username"]; ?>
                    </div>
                 
                    <div  class="col-6" class="form-group">
                      <b> Password : </b>
                      <div  class="col-6" class="form-group">
                      <?php echo $item["password"]; ?>
                    </div>
                  
                   <div  class="col-6" class="form-group">
                       <b>Contact : </b>
                       <div  class="col-6" class="form-group">
                       <?php echo $item["contact"]; ?>
                    </div>
                  
                   <div  class="col-6" class="form-group">
                      <b> Profile Pic : </b>
                       <a target="_blank" href="uploads/profile/<?php echo $item["profile_pic"]; ?>">
                                    <img width="100" height="100" src="uploads/profile/<?php echo $item["profile_pic"]; ?>">
                                </a>
                    </div>
                  
                     <div class="col-6" class="form-group mb-0">
                     <b> User Type : </b><br>
                     <div  class="col-6" class="form-group">
                                            <?php echo $item["usertype"]; ?>
                                          
                             </div>
                          
                             <div class="col-6" class="form-group mb-0">
                     <b> Is Block : </b><br>
                     <div  class="col-6" class="form-group">
                                            <?php echo $item["is_block"]; ?>
                             </div>  
                             </td>                
                             </div><br>
                             
                    </div>                      
                  </div>
                </table>
                    </form>
                     <?php } } ?>
                  </div>
                </div>
           </div>
              </div>      
        </div>
      </div>
    
        <!--**********************************
            Content body end
        ***********************************-->        
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
  <!--<script>
      $('#form1').validate({

        rules:
        {
          txtname:
          {
            required:true
          },
          txtuname:
          {
          
            required:true
          },
          txtcon:
          {
            required:true,
            number:true,
            minlength:10,
            maxlength:10
          },
          txtpass:
          {
            required:true,
            rangelength:[8,13]
          },
          profilepic:
          {
            required:true,
            accept:"image/*"
          }
        },
        messages:
        {
          txtname:
          {
            required:"Please Enter Name"
          },
          txtuname:
          {
            required:"Please enter username"
          },
          txtcon:
          {
            required:"Please Enter COntact Number",
            number:"Only numbers allowed",
            minlength:"only 10 digits allowed",
            maxlength:"only 10 digits allowed"
          },
          txtpass:
          {
            required:"Please enter passwords",
            rangelength:"password must be between 8 to 13 character"
          },
          profilepic:
          {
            required:"Please enter picture",
            accept:"Please select valid file"
          }
        }


      });
  </script>-->
</body>
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>