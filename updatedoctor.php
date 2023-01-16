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
    <title>Update Doctor - Admin</title>
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
                  <h4 class="card-title">Update Doctor</h4>
              </div>
            <div class="card-body">
                  <div class="basic-form">
                    <?php
                                  if(isset($_POST["btnsubmit"]))
                                  {


                                    $ext = pathinfo($_FILES["profilepic"]["name"],PATHINFO_EXTENSION);
                                    $newname = time().rand(1111,9999).time().rand(1111,9999).".".$ext;
                                    move_uploaded_file($_FILES["profilepic"]["tmp_name"],"uploads/doctor/".$newname);

                                     $id=my_simple_crypt($_GET["updateid"],'d');
                                    $result = mysqli_query($conn,"update tbl_doctor set name='".$_POST["txtname"]."', contact='".$_POST["txtcon"]."', email='".$_POST["txtemail"]."', username='".$_POST["txtuname"]."', password='".$_POST["txtpass"]."', profile_photo='".$newname."', qualification='".$_POST["txtqual"]."', exp='".$_POST["txtexp"]."', about_doctor='".$_POST["txtabout"]."', address1='".$_POST["txtadd1"]."', address2='".$_POST["txtadd2"]."', landmark='".$_POST["txtlan"]."', city_id='".$_POST["city_id"]."', pincode='".$_POST["txtpin"]."', is_active='".$_POST["isactive"]."', is_block='".$_POST["isblock"]."' where doc_id='".$id."' ") or die(mysqli_error($conn));
                                    if($result==true)
                                    {
                                      echo"<script>window.location='viewdoctor.php';</script>";
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

                                         $result=mysqli_query($conn,"select * from tbl_doctor where doc_id='".$id."'") or die(mysqli_error($conn));
                                          while($item=mysqli_fetch_assoc($result))
                                          {
                                     ?>  
                      <form method="post" id="form1" enctype="multipart/form-data">
                    <div class="form-group">
                       Name<input value="<?php echo $item["name"]; ?>" type="text" name="txtname" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Contact<input value="<?php echo $item["contact"]; ?>" type="text" name="txtcon" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Email<input value="<?php echo $item["email"]; ?>" type="email" name="txtemail" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       UserName<input value="<?php echo $item["username"]; ?>" type="text" name="txtuname" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Password<input value="<?php echo $item["password"]; ?>" type="password" name="txtpass" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Profile Pic<input value="<?php echo $item["profile_photo"]; ?>" type="file" name="profilepic" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Qualification<input value="<?php echo $item["qualification"]; ?>" type="text" name="txtqual" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Experience<input value="<?php echo $item["exp"]; ?>" type="text" name="txtexp" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       About Doctor<input value="<?php echo $item["about_doctor"]; ?>" type="text" name="txtabout" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       AddressLine1<input value="<?php echo $item["address1"]; ?>" type="text" name="txtadd1" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       AddressLine2<input value="<?php echo $item["address2"]; ?>" type="text" name="txtadd2" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Landmark<input value="<?php echo $item["landmark"]; ?>" type="text" name="txtlan" class="form-control input-rounded">
                    </div>
                     <div class="form-group">
                                           <label>City Name:</label>
                                                <select class="form-control input-rounded" name="city_id">
                                                    <?php
                                                        $result=mysqli_query($conn,"select * from tbl_city") or die(mysqli_error($conn));
                                                          while($row=mysqli_fetch_assoc($result))
                                                         {
                                                     ?>
                                                    <option value="<?php echo $row["city_id"]; ?>"><?php echo $row["city_name"]; ?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                    <div class="form-group">
                       Pincode<input value="<?php echo $item["pincode"]; ?>" type="text" name="txtpin" class="form-control input-rounded">
                    </div>
                     <div class="form-group mb-0">
                      Is Active<br>
                                            <select value="<?php echo $item["is_active"]; ?>" class="form-control" name="isactive">
                                              <option>Yes</option>
                                              <option>No</option>
                                            </select>
                                          
                             </div>
                             <div class="form-group mb-0">
                      Is Block<br>
                                            <select value="<?php echo $item["is_block"]; ?>" class="form-control" name="isblock">
                                              <option>Yes</option>
                                              <option>No</option>
                                            </select>
                             </div>                  
                             </div><br>
                             <div class="form-group">
                              <div class="col-sm-8">
                                <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                                <button type="reset" name="btncancel" class="btn btn-primary">Cancel</button>
                       </div>
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
 <script>
      $('#form1').validate({

        rules:
        {
          txtname:
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
          txtemail:
          {
            required:true
          },
          txtuname:
          {
          
            required:true
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
          },
          txtqual:
          {
            required:true
          },
          txtexp:
          {
            required:true
          },
          txtabout:
          {
            required:true
          },
          txtadd1:
          {
            required:true
          },
          txtadd2:
          {
            required:true
          },
          txtlan:
          {
            required:true
          }
        },
        messages:
        {
          txtname:
          {
            required:"Please Enter Name"
          },
           txtcon:
          {
            required:"Please Enter Contact Number",
            number:"Only numbers allowed",
            minlength:"only 10 digits allowed",
            maxlength:"only 10 digits allowed"
          },
          txtemail:
          {
            required:"Please enter Email"
          },
          txtuname:
          {
            required:"Please enter username"
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
          },
          txtqual:
          {
            required:"Please enter Qualification"
          },
          txtexp:
          {
            required:"PLease enter Experience"
          },
          txtabout:
          {
            required:"Please enter About Doctor"
          },
          txtadd1:
          {
            required:"Please enter AddressLine1"
          },
           txtadd2:
          {
            required:"Please enter AddressLine2"
          },
          txtlan:
          {
            required:"Please enter Landmark"
          },
        }
      });
  </script>
</body>
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>