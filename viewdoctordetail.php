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
    <title>View Doctor Detail - Admin</title>
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
                  <h4 class="card-title"> Doctor Detail</h4>
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

                                         $result=mysqli_query($conn,"select d.*,c.city_name from tbl_doctor as d left join tbl_city as c on d.city_id=c.city_id where doc_id='".$id."'") or die(mysqli_error($conn));
                                          while($item=mysqli_fetch_assoc($result))
                                          {
                                     ?>  
                      <form method="post" id="form1" enctype="multipart/form-data">
                        <table id="example3" class="display table-responsive-lg">
                          <div class="row">
                       <div class="col-6" class="form-group"><b> Name </b></div>
                       <div class="col-6" class="form-group">
                              <?php echo $item["name"]; ?>
                        </div>
                      
                    <div  class="col-6" class="form-group">
                      <b> Contact </b>
                    </div>
                    <div  class="col-6" class="form-group">
                       <?php echo $item["contact"]; ?>
                    </div>
                    <div class="col-6" class="form-group">
                      <b> Email </b>
                      </div>
                      <div class="col-6" class="form-group">
                      <?php echo $item["email"]; ?>
                    </div>
                    <div class="col-6" class="form-group">
                      <b> UserName </b>
                      </div>
                      <div class="col-6" class="form-group">
                       <?php echo $item["username"]; ?>
                   </div>
              
                    <div class="col-6" class="form-group">
                      <b> Profile Pic </b>
                    </div>
                    <div class="col-6" class="form-group">
                      <a target="_blank" href="uploads/doctor/<?php echo $item["profile_photo"]; ?>">
                                    <img width="100" height="100" src="uploads/doctor/<?php echo $item["profile_photo"]; ?>">
                                </a>

                    </div>
                    <div class="col-6" class="form-group">
                      <b> Qualification  </b>
                    </div>
                    <div class="col-6" class="form-group">
                      <?php echo $item["qualification"]; ?>"
                    </div>
                    <div class="col-6" class="form-group">
                       <b>Experience </b>
                       </div>
                       <div class="col-6" class="form-group">
                        <?php echo $item["exp"]; ?>
                    </div>
                    <div class="col-6" class="form-group">
                       <b>About Doctor </b> 
                       </div>
                       <div class="col-6" class="form-group">
                        <?php echo $item["about_doctor"]; ?>
                    </div>
                    <div class="col-6" class="form-group">
                       <b>AddressLine1  </b>
                       </div>
                       <div class="col-6" class="form-group">
                       <?php echo $item["address1"]; ?>
                    </div>
                    <div class="col-6" class="form-group">
                       <b>AddressLine2 </b> 
                       </div>
                       <div class="col-6" class="form-group">
                        <?php echo $item["address2"]; ?>
                    </div>
                    <div class="col-6" class="form-group">
                       <b>Landmark </b> 
                       </div>
                       <div class="col-6" class="form-group">
                       <?php echo $item["landmark"]; ?>
                    </div>
                    <div class="col-6" class="form-group">
                       <b>City Name</b> 
                       </div>
                       <div class="col-6" class="form-group">
                        <?php echo $item["city_name"]; ?>
                       
                    </div>
                  <!-- <div class="col-6" class="form-group">
                                           <b>City Name </b>
                                         </div>
                                         <div class="col-6" class="form-group">
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
                                            </div> -->
                    <div class="col-6" class="form-group">
                     <b>  Pincode </b>
                     </div>
                     <div class="col-6" class="form-group">
                      <?php echo $item["pincode"]; ?>
                    </div>
                     <div class="col-6" class="form-group mb-0">
                      <b>Is Active</b>
                    </div><br><div class="col-6" class="form-group">
                                            <?php echo $item["is_active"]; ?>
                                          
                             </div>
                             <div  class="form-group mb-0 col-6">
                      <b>  Is Block</b>
                    </div><br><div class="col-6 form-group">
                                            <?php echo $item["is_block"]; ?>
                             </div>                  
                             </div><br>
                             </div>
                  </div>

                
              </table>
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
  <!--<script>
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
  </script>-->
</body>
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>