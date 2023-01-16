
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
    <title>Add Hospital - Hospital</title>
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
                  <h4 class="card-title">Add Hospital</h4>
              </div>
            <div class="card-body">
                  <div class="basic-form">
                     <?php
                                  if(isset($_POST["btnsubmit"]))
                                  {
                                    //abc.jpg
                                    $ext = pathinfo($_FILES["himage"]["name"],PATHINFO_EXTENSION);// jpg
                                    $newname = time().rand(1111,9999).time().rand(1111,9999).".".$ext;// 561561613343.jpg
                                    move_uploaded_file($_FILES["himage"]["tmp_name"], "uploads/profile/".$newname);
                                    //
                                    $id=my_simple_crypt($_GET["updateid"],'d');
                                    $result = mysqli_query($conn,"update tbl_hospital set category_id='".$_POST["txtcateid"]."',hospital_name='".$_POST["txthname"]."',description='".$_POST["txtdes"]."',address1='".$_POST["txtadd1"]."',address2='".$_POST["txtadd2"]."',landmark='".$_POST["txtlandmark"]."',pincode='".$_POST["txtpin"]."',city_id='".$_POST["txtcityname"]."',contact_no1='".$_POST["txtno1"]."',contact_no2='".$_POST["txtno2"]."',lattitude='".$_POST["txtlatitude"]."',longtitude='".$_POST["txtlongitude"]."',is_active='".$_POST["isactive"]."',image='".$newname."',facility='".$_POST["txtfacility"]."',email='".$_POST["txtmail"]."',website='".$_POST["txtwebsite"]."' where hospital_id='".$id."' ") or die(mysqli_error($conn));
                                     if($result==true)
                                    {
                                      echo"<script>window.location='viewhospital.php';</script>";
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
                                         $result=mysqli_query($conn,"select * from tbl_hospital where hospital_id='".$id."'") or die(mysqli_error($conn));
                                          while($item=mysqli_fetch_assoc($result))
                                          {
                                   ?>
                                      
                      <form method="post" id="form1" enctype="multipart/form-data">
                    <div class="form-group">
                        Category Id:<select class="form-control input-rounded" name="txtcateid" id="sel1" >
                     <?php
                         $result=mysqli_query($conn,"select * from tbl_category") or die(mysqli_error($conn));
                          while ($row=mysqli_fetch_assoc($result)) {
                     ?>
                       <option value="<?php echo $row["category_id"];?>"><?php echo $row["category_name"];?></option>
                     <?php
                      }
                   ?>
                    </select>
                    </div>
                    <div class="form-group">
                       HospitalName<input type="text" value="<?php echo $item["hospital_name"]; ?>"  name="txthname" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Description<input type="text" name="txtdes" value="<?php echo $item["description"]; ?>" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Address1<input type="text" name="txtadd1" value="<?php echo $item["address1"]; ?>" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Address2<input type="text" name="txtadd2" value="<?php echo $item["address2"]; ?>" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Landmark<input type="text" name="txtlandmark" value="<?php echo $item["landmark"]; ?>" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Pincode<input type="text" name="txtpin" value="<?php echo $item["pincode"]; ?>" class="form-control input-rounded">
                    </div>
                   <div class="form-group"> 
                     City Name:<select class="form-control input-rounded" value="<?php echo $item["city_id"]; ?>" name="txtcityname" id="sel1" >
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
                       ContactNo1<input type="text" value="<?php echo $item["contact_no1"]; ?>" name="txtno1" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       ContactNo2<input  value="<?php echo $item["contact_no2"]; ?>" type="text" name="txtno2" class="form-control input-rounded">
                    </div>
                 <div class="form-group">
                       Latitude<input type="text" value="<?php echo $item["lattitude"]; ?>" name="txtlatitude" class="form-control input-rounded">
                 </div>
                   <div class="form-group">
                      Longitude<input type="text" value="<?php echo $item["longtitude"]; ?>" name="txtlongitude" class="form-control input-rounded">
                   </div>
              <div class="form-group mb-0">
                 IsActive:<select class="form-control" value="<?php echo $item["is_active"]; ?>" name="isactive">
                   <option>YES</option>
                   <option>NO</option>
                 </select>
                 <div class="form-group">
                    Image:<input type="file" name="himage" value="<?php echo $item["image"]; ?>" class="form-control input-rounded" >
                    <a target="_blank" href="uploads/profile/<?php echo $row["image"]; ?>">
                                    <img width="100" height="100" src="uploads/doctor/<?php echo $item["image"]; ?>">
                                </a>
                 </div>
                 <div class="form-group">
                       Facility<input type="text" name="txtfacility" value="<?php echo $item["facility"]; ?>" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Email<input type="Email" name="txtmail" value="<?php echo $item["email"]; ?>" class="form-control input-rounded">
                    </div>
                 <div class="form-group">
                       Website<input type="text" value="<?php echo $item["website"]; ?>" name="txtwebsite" class="form-control input-rounded">
                 </div>
                 <div class="form-group row">
                  <div class="col-sm-10">
                  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                  <button type="submit" name="btncancel" class="btn btn-primary">Cancel</button>
              </div>
          </div>
</div>
                    </form>
                  <?php } }?>
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
            Footer start
        ***********************************-->
        
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
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
          txtcateid:
          {
            required:true
          },
          txthname:
          {
            required:true
          },
          txtdes:
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
          txtlandmark:
          {
            required:true
          },
          txtpincode:
            {
                required:true,
                number:true,
                minlength:6,
                maxlength:6
            }, 
          txtno1:
          {
            required:true,
            number:true,
            minlength:10,
            maxlength:10
          },
          txtno2:
          {
            required:true,
            number:true,
            minlength:10,
            maxlength:10
          },
          txtlatitude:
            {
                required:true
            },
            txtlongitude:
            {
                required:true
            },
           himage:
          {
            required:true,
            accept:"image/*"
          },
           txtfaciality:
            {
                required:true
            },
             txtmail:
            {
                required:true
            },
             txtwebsite:
            {
                required:true
            }

        },
        messages:
        {
          txtcateid:
          {
            required:"Please Category Id"
          },

          txhname:
          {
            required:"Please Enter Hospital Name"
          },
          txtdes:
          {
            required:"Please enter Description"
          },
          txtadd1:
            {
                required:"please enter address1"
            },
         txtadd2 :
            {
                required:"please enter address2"
            },
            txtlandmark:
            {
                required:"please enter landmark"
            },
            txtpin:
            {
                required:"please enter pincode",
                number:"only number allowed",
                minlength:"only 6 digits allowed",
                maxlength:"only 6 digits allowed"
            },
            txtno1:
            {
                required:"please enter contact number",
                number:"only numbers allowed",
                minlength:"only 10 digits allowed",
                maxlength:"only 10 digits allowed"
            },
             txtno2:
            {
                required:"please enter contact number",
                number:"only numbers allowed",
                minlength:"only 10 digits allowed",
                maxlength:"only 10 digits allowed"
            },
            txtlatitude:
            {
                required:"please enter lattitude"
            },
            txtlongitude:
            {
                required:"please enterlongtitude"
            },
             himage:
            {
                required:"please enter place picture",
                accept:"please select valid file"
            },
          txtfaciality:
          {
            required:"Please enter Faciality",
          },
           txtmail:
            {
                required:"please enter Email",
            },
            txtwebsite:
            {
                required:"please enter Website",
            }
        }
      });
  </script>
</body>


<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>