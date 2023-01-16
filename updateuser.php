
<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
    echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'connection.php'?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Update User - Admin</title>
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
                  <h4 class="card-title">Update User</h4>
              </div>
            <div class="card-body">
                  <div class="basic-form">
                     <?php
                                  if(isset($_POST["btnsubmit"]))
                                  {
                                    //abc.jpg
                                    $ext = pathinfo($_FILES["aadharimg"]["name"],PATHINFO_EXTENSION);// jpg
                                    $newname = time().rand(1111,9999).time().rand(1111,9999).".".$ext;// 561561613343.jpg
                                    move_uploaded_file($_FILES["aadharimg"]["tmp_name"], "uploads/user/".$newname);
                                    //
                                     $id=my_simple_crypt($_GET["updateid"],'d');
                                    $result = mysqli_query($conn,"update tbl_userr set fname='".$_POST["txtfname"]."', mname='".$_POST["txtmname"]."', lname='".$_POST["txtlname"]."', contact='".$_POST["txtcon"]."', email='".$_POST["txtmail"]."', bdate='".$_POST["txtbdate"]."', aadharcard_photo='".$newname."', aadharcard_num='".$_POST["txtaadharnum"]."', password='".$_POST["txtpass"]."', gender='".$_POST["rdgen"]."', address1='".$_POST["txtadd1"]."', address2='".$_POST["txtadd2"]."', landmark='".$_POST["txtland"]."', pincode='".$_POST["txtpin"]."', city_id='".$_POST["txtcityname"]."', lattitude='".$_POST["txtlatitude"]."', longtitude='".$_POST["txtlongitude"]."', is_approve='".$_POST["isapprove"]."', otp='".$_POST["txtotp"]."', is_verify='".$_POST["isverify"]."', bloodgroup='".$_POST["txtbg"]."', height='".$_POST["txtheight"]."', weight='".$_POST["txtweight"]."' where user_id='".$id."'") or die(mysqli_error($conn));
                                    if($result==true)
                                    {
                                      echo"<script>window.location='viewuser.php';</script>";
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

                                         $result=mysqli_query($conn,"select * from tbl_userr where user_id='".$id."'") or die(mysqli_error($conn));
                                          while($item=mysqli_fetch_assoc($result))
                                          {
                                   ?>
                      <form method="post" id="form1" enctype="multipart/form-data">
                    <div class="form-group">
                       First Name<input value="<?php echo $item["fname"]; ?>" type="text" name="txtfname" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Middle Name<input value="<?php echo $item["mname"]; ?>" type="text"  name="txtmname" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Last Name<input value="<?php echo $item["lname"]; ?>" type="text" name="txtlname" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Mobile Number<input value="<?php echo $item["contact"]; ?>" type="text" name="txtcon" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Email<input value="<?php echo $item["email"]; ?>" type="email" name="txtmail" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Birth Date<input value="<?php echo $item["bdate"]; ?>" type="date" name="txtbdate" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       AadharCard Photo<input value="<?php echo $item["aadharcard_photo"]; ?>" type="file" name="aadharimg" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       AadharCard Number<input value="<?php echo $item["aadharcard_num"]; ?>" type="text" name="txtaadharnum" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Password<input value="<?php echo $item["password"]; ?>" type="password" name="txtpass" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Gender<br><input  type="radio" value="male" name="rdgen" checked="">Male<br>
                             <input type="radio" value="Female" name="rdgen">Female
                   </div>
                   <div class="form-group">
                       AddressLine 1<input value="<?php echo $item["address1"]; ?>" type="text" name="txtadd1" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       AddressLine 2<input value="<?php echo $item["address2"]; ?>" type="text" name="txtadd2" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Landmark<input value="<?php echo $item["landmark"]; ?>" type="text" name="txtland" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Pincode<input value="<?php echo $item["pincode"]; ?>" type="text" name="txtpin" class="form-control input-rounded">
                    </div>
                    <div class="form-group"> 
                     City Name:<select class="form-control input-rounded" name="txtcityname" id="sel1">
                     <?php
                         $result=mysqli_query($conn,"select * from tbl_city") or die(mysqli_error($conn));
                          while ($row=mysqli_fetch_assoc($result)) {
                     ?>
                       <option <?php if($item["city_id"]==$row["city_id"]) {?> selected <?php } ?> value="<?php echo $row["city_id"]; ?>"><?php echo $row["city_name"]; ?></option>
                     <?php
                        }
                     ?>
                    </select>
                    </div>
                    <div class="form-group">
                       Latitude<input value="<?php echo $item["lattitude"]; ?>" type="text" name="txtlatitude" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                      Longitude<input value="<?php echo $item["longtitude"]; ?>" type="text" name="txtlongitude" class="form-control input-rounded">
                     </div>
                    <div class="form-group mb-0">
                    IsApprove:<select class="form-control" name="isapprove">
                        <option>YES</option>
                        <option>NO</option>
                    </select>
                    </div>
                    <div class="form-group">
                      OTP<input value="<?php echo $item["otp"]; ?>" type="text" name="txtotp" class="form-control input-rounded">
                     </div>
                     <div class="form-group mb-0">
                      IsVerify:<select class="form-control" name="isverify">
                        <option>YES</option>
                        <option>NO</option>
                     </select>
                     </div>
                    <div class="form-group">
                       Blood Group<input value="<?php echo $item["bloodgroup"]; ?>" type="text" name="txtbg" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Height<input value="<?php echo $item["height"]; ?>" type="text" name="txtheight" class="form-control input-rounded">
                    </div>
                 <div class="form-group">
                       Weight<input value="<?php echo $item["weight"]; ?>" type="text" name="txtweight" class="form-control input-rounded">
                 </div>
                 <div class="form-group row">
                  <div class="col-sm-10">
                  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                  <button type="submit" name="btncancel" class="btn btn-primary">Cancel</button>
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
          txtfname:
          {
            required:true
          },
          txtmname:
          {
            required:true
          },
          txtlname:
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
          txtmail:
          {
            required:true
          },
          txtbdate:
          {
            required:true
          },
          aadharimg:
          {
            required:true,
            accept:"image/*"
          },
          txtaadharnum:
          {
            required:true,
            number:true
          },
          password:
          {
            required:true,
            rangelength:[8-13]
          },
          address1:
          {
            required:true
          },
          address2:
          {
            required:true
          },
          txtland:
          {
            required:true
          },
          txtpin:
          {
            required:true,
            number:true
          }, 
          txtlatitude:
          {
            required:true
          },
          txtlongitude:
          {
            required:true
          },
          txtotp:
          {
           required:true,
           number:true,
           minlength:4,
           maxlength:4
          },
          txtbg:
          {
            required:true
          },
          txtheight:
          {
            required:true
          },
          txtweight:
          {
            required:true
          }
        },
        messages:
        {
          txtfname:
          {
            required:"Please enter First Name"
          },
          txtmname:
          {
            required:"Please enter Middle Name"
          },
          txtlname:
          {
            required:"Please enter Last Name"
          },
          txtcon:
          {
            required:"Please enter Mobile Number",
            number:"Only Digits Allowed",
            minlength:"Minimum 10 Digits",
            maxlength:"Maximum 10 Digits"
          },
          txtmail:
          {
            required:"Please enter Email"
          },
          aadharimg:
          {
            required:"Please upload AadharCard Photo",
            accept:"Invalid File Formate"
          },
          txtaadharnum:
          {
            required:"Please enter AadharCard Number",
            number:"Only Digits Allowed"
          },
          password:
          {
            required:"Please enter Password",
            rangelength:"Password must between 8-13 character"
          },
          address1:
          {
            required:"Please enter AddressLine 1"
          },
          address2:
          {
            required:"Please enter AddressLine 2"
          },
          txtland:
          {
            required:"Please enter Landmark"
          },
          txtpin:
          {
            required:"Please enter Pincode",
            number:"Only Digits Allowed"
          }, 
          txtlatitude:
          {
            required:"Please enter Latitude"
          },
          txtlongitude:
          {
            required:"Please enter longtitude"
          },
          txtotp:
          {
           required:"Please enter OTP",
           number:"Only Digits Allowed",
           minlength:"Minimum Digits 4",
           maxlength:"Maximum Digits 4"
          },
          txtbg:
          {
            required:"Please enter Blood Group"
          },
          txtheight:
          {
            required:"Please enter height"
          },
          txtweight:
          {
            required:"Please enter Weight"
          }
        } 
      });
  </script>
</body>


<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>