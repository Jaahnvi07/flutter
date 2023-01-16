
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
    <title>User</title>
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
                  <h4 class="card-title"> User Detail </h4>
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

                                         $result=mysqli_query($conn,"select u.*,c.city_name from tbl_userr as u left join tbl_city as c on u.city_id=c.city_id where user_id='".$id."'") or die(mysqli_error($conn));
                                          while($item=mysqli_fetch_assoc($result))
                                          {
                                   ?>
                      <form method="post" id="form1" enctype="multipart/form-data">
                   <div class="col-6 form-group">
                      <b> First Name </b></div>
                      <div class="col-6 form-group">
                      <?php echo $item["fname"]; ?>
                    </div>
                <div class="col-6 form-group">
                      <b> Middle Name </b></div>
                      <div class="col-6 form-group">
                      <?php echo $item["mname"]; ?>
                    </div>
                    <div class="col-6 form-group">
                       <b> Last Name  </b></div>
                       <div class="col-6 form-group">
                       <?php echo $item["lname"]; ?>
                    </div>
             <div class="col-6 form-group">
                       <b> Mobile Number </b></div>
                       <div class="col-6 form-group">
                       <?php echo $item["contact"]; ?>
                    </div>
            <div class="col-6 form-group">
                       <b>Email </b></div>
                       <div class="col-6 form-group">
                       <?php echo $item["email"]; ?>
                    </div>
                 <div class="col-6 form-group">
                       <b>Birth Date  </b></div>
                       <div class="col-6 form-group">
                       <?php echo $item["bdate"]; ?>
                    </div>
                    <div class="col-6 form-group">
                       <b>AadharCard Photo  </b></div>
                       <div class="col-6 form-group">
                       <?php echo $item["aadharcard_photo"]; ?>
                    </div>
            
                    <div class="col-6 form-group">
                      <b> Gender </b></div>
                    <div class="col-6 form-group">
                      <?php echo $item["gender"]; ?>
                      
                   </div>
                   <div  class="col-6" class="form-group">
                      <b> Address Line 1  </b></div>
                      <div  class="col-6" class="form-group">
                      <?php echo $item["address1"]; ?>
                    </div>
                 <div  class="col-6" class="form-group">
                       <b>Address Line 2  </b></div>
                       <div  class="col-6" class="form-group">
                       <?php echo $item["address2"]; ?>
                    </div>
                    <div  class="col-6" class="form-group">
                     <b>  Landmark </b></div>
                     <div  class="col-6" class="form-group">
                     <?php echo $item["landmark"]; ?>
                    </div>
                      <div  class="col-6" class="form-group">
                       <b>Pincode </b></div>
                          <div  class="col-6" class="form-group">
                       <?php echo $item["pincode"]; ?>
                    </div>
                        <div class="col-6" class="form-group">
                       <b>City Name</b> 
                       </div>
                       <div class="col-6" class="form-group">
                        <?php echo $item["city_name"]; ?>
                       
                    </div>
               <div  class="col-6" class="form-group">
                       <b>Latitude </b></div>
                       <div  class="col-6" class="form-group">
                       <?php echo $item["lattitude"]; ?>
                       
                    </div>
                 <div  class="col-6" class="form-group">
                     <b> Longitude </b></div>
                     <div  class="col-6" class="form-group">
                     <?php echo $item["longtitude"]; ?>
                     </div>
                    <div class="col-6" class="form-group mb-0">
                    <b>IsApprove </b></div>
                    <div  class="col-6" class="form-group">
                       <?php echo $item["is_approve"]; ?>
                    </select>
                    </div>
                   <div  class="col-6" class="form-group">
                     <b> OTP </b></div>
                      <div  class="col-6" class="form-group">
                     <?php echo $item["otp"]; ?>
                     </div>
                     <div class="col-6" class="form-group mb-0">
                      <b> IsVerify </b></div>
                      <div  class="col-6" class="form-group">
                      <?php echo $item["is_approve"]; ?>
                     </div>
                   <div  class="col-6" class="form-group">
                       <b>Blood Group </b></div>
                       <div  class="col-6" class="form-group">
                       <?php echo $item["bloodgroup"]; ?>
                    </div>
                    <div  class="col-6" class="form-group">
                      <b> Height </b></div>
                      <div  class="col-6" class="form-group">
                      <?php echo $item["height"]; ?>
                    </div>
              <div  class="col-6" class="form-group">
                      <b> Weight </b></div>
                      <div  class="col-6" class="form-group">
                      <?php echo $item["weight"]; ?>
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
  <!--<script>
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
  </script>-->
</body>


<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>