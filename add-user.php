
<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
    echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'connection.php'?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Add User - Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
      <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
 

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
        <div class="row">
          <div class="container-fluid">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Add User</h4>
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

                                    $result = mysqli_query($conn,"insert into tbl_userr (fname, mname, lname, contact, email, bdate, aadharcard_photo, aadharcard_num, password, gender, address1, address2, landmark, pincode, city_id, lattitude, longtitude, is_approve, otp, is_verify, bloodgroup, height, weight) values ('".$_POST["txtfname"]."','".$_POST["txtmname"]."','".$_POST["txtlname"]."','".$_POST["txtcon"]."','".$_POST["txtmail"]."','".$_POST["txtbdate"]."','".$newname."','".$_POST["txtaadharnum"]."','".$_POST["txtpass"]."','".$_POST["rdgen"]."','".$_POST["txtadd1"]."','".$_POST["txtadd2"]."','".$_POST["txtland"]."','".$_POST["txtpin"]."','".$_POST["txtcityname"]."','".$_POST["txtlatitude"]."','".$_POST["txtlongitude"]."','".$_POST["isapprove"]."','".$_POST["txtotp"]."','".$_POST["isverify"]."','".$_POST["txtbg"]."','".$_POST["txtheight"]."','".$_POST["txtweight"]."')") or die(mysqli_error($conn));
                                    if($result==true)
                                    {
                                      ?>
                                      <div class="alert alert-success alert-dismissible fade show">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>  
                  <strong>Success!</strong> Insert Success!.
                  <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                </div>

                                      <?php
                                    }
                                    else
                                    {
                                      ?>
<div class="alert alert-danger alert-dismissible fade show">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                  <strong>Error!</strong> Insert failed.
                  <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                </div>
                                      <?php
                                    }
                                  }
                                  ?>  
                      <form method="post" id="form1" enctype="multipart/form-data">
                    <div class="form-group">
                       First Name<input type="text" name="txtfname" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Middle Name<input type="text"  name="txtmname" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Last Name<input type="text" name="txtlname" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Mobile Number<input type="text" name="txtcon" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Email<input type="email" name="txtmail" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Birth Date<input type="date" name="txtbdate" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       AadharCard Photo<input type="file" name="aadharimg" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       AadharCard Number<input type="text" name="txtaadharnum" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Password<input type="password" name="txtpass" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Gender<br><input type="radio" value="male" name="rdgen" checked="">Male<br>
                             <input type="radio" value="femake" name="rdgen">Female
                   </div>
                   <div class="form-group">
                       AddressLine 1<input type="text" name="txtadd1" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       AddressLine 2<input type="text" name="txtadd2" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Landmark<input type="text" name="txtland" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Pincode<input type="text" name="txtpin" class="form-control input-rounded">
                    </div>
                    <div class="form-group"> 
                     City Name:<select class="form-control input-rounded" name="txtcityname" id="sel1">
                     <?php
                         $result=mysqli_query($conn,"select * from tbl_city") or die(mysqli_error($conn));
                          while ($row=mysqli_fetch_assoc($result)) {
                     ?>
                       <option value="<?php echo $row["city_id"];?>"><?php echo $row["city_name"];?></option>
                     <?php
                        }
                     ?>
                    </select>
                    </div>
                    <div class="form-group">
                       Latitude<input type="text" name="txtlatitude" class="form-control input-rounded" placeholder="Enter Latitude">
                    </div>
                    <div class="form-group">
                      Longitude<input type="text" name="txtlongitude" class="form-control input-rounded" placeholder="Enter Longitude">
                     </div>
                    <div class="form-group mb-0">
                    IsApprove:<select class="form-control" name="isapprove">
                        <option>YES</option>
                        <option>NO</option>
                    </select>
                    </div>
                    <div class="form-group">
                      OTP<input type="text" name="txtotp" class="form-control input-rounded" placeholder="Enter Longitude">
                     </div>
                     <div class="form-group mb-0">
                      IsVerify:<select class="form-control" name="isverify">
                        <option>YES</option>
                        <option>NO</option>
                     </select>
                     </div>
                    <div class="form-group">
                       Blood Group<input type="text" name="txtbg" class="form-control input-rounded" placeholder="enter Faciality ">
                    </div>
                    <div class="form-group">
                       Height<input type="text" name="txtheight" class="form-control input-rounded" placeholder="enter Email">
                    </div>
                 <div class="form-group">
                       Weight<input type="text" name="txtweight" class="form-control input-rounded" placeholder="Enter Website">
                 </div>
                 <div class="form-group row">
                  <div class="col-sm-10">
                  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                  <button type="submit" name="btncancel" class="btn btn-primary">Cancel</button>
              </div>
          </div>
</div>
                    </form>
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
          txtemail:
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
          }
          address2:
          {
            required:true
          }
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
        }
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
          txtemail:
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
          }
          address2:
          {
            required:"Please enter AddressLine 2"
          }
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