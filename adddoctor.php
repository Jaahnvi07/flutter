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
    <title>Add Doctor - Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <?php
include 'header.php';
?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
        <div class="row">
        	<div class="container-fluid">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Add Doctor</h4>
	            </div>
	        	<div class="card-body">
	                <div class="basic-form">
                    <?php
                                  if(isset($_POST["btnsubmit"]))
                                  {


                                    $ext = pathinfo($_FILES["profilepic"]["name"],PATHINFO_EXTENSION);
                                    $newname = time().rand(1111,9999).time().rand(1111,9999).".".$ext;
                                    move_uploaded_file($_FILES["profilepic"]["tmp_name"],"uploads/doctor/".$newname);


                                    $result = mysqli_query($conn,"insert into tbl_doctor (name, contact, email, username, password, profile_photo, qualification, exp, about_doctor, address1, address2, landmark, city_id, pincode, is_active, is_block) values ('".$_POST["txtname"]."','".$_POST["txtcon"]."','".$_POST["txtemail"]."','".$_POST["txtuname"]."','".$_POST["txtpass"]."','".$newname."','".$_POST["txtqual"]."','".$_POST["txtexp"]."','".$_POST["txtabout"]."','".$_POST["txtadd1"]."','".$_POST["txtadd2"]."','".$_POST["txtlandmark"]."','".$_POST["city_id"]."','".$_POST["txtpin"]."','".$_POST["isactive"]."','".$_POST["isblock"]."')") or die(mysqli_error($conn));
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
           						 Name<input type="text" name="txtname" class="form-control input-rounded">
           					</div>
                    <div class="form-group">
                       Contact<input type="text" name="txtcon" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Email<input type="email" name="txtemail" class="form-control input-rounded">
                    </div>
           					<div class="form-group">
           						 UserName<input type="text" id="txtuname" name="txtuname" class="form-control input-rounded" onBlur='checkuname()'>
                       <span class="error" id="lbluname"></span>
           					</div>
           					<div class="form-group">
           						 Password<input type="password" name="txtpass" class="form-control input-rounded">
           					</div>
           					<div class="form-group">
           						 Profile Pic<input type="file" name="profilepic" class="form-control input-rounded">
           					</div>
                    <div class="form-group">
                       Qualification<input type="text" name="txtqual" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Experience<input type="text" name="txtexp" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       About Doctor<input type="text" name="txtabout" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       AddressLine1<input type="text" name="txtadd1" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       AddressLine2<input type="text" name="txtadd2" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Landmark<input type="text" name="txtlandmark" id="txtlandmark" class="form-control input-rounded">
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
                       Pincode<input type="text" name="txtpin" class="form-control input-rounded">
                    </div>
           					 <div class="form-group mb-0">
           					 	Is Active<br>
                                            <select class="form-control" name="isactive">
                                            	<option>Yes</option>
                                            	<option>No</option>
                                            </select>
                                          
                             </div>
                             <div class="form-group mb-0">
           					 	Is Block<br>
                                            <select class="form-control" name="isblock">
                                            	<option>Yes</option>
     	                                       	<option>No</option>
                                            </select>
                             </div>                  
                             </div><br>
                             <div class="form-group">
                             	<div class="col-sm-8">
                             		<button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-primary">Submit</button>
                             		<button type="reset" name="btncancel" class="btn btn-primary">Cancel</button>
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
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyClJ7bohWjfhtUsd71UVKXfsu48-Wq5O5s&sensor=false&amp;libraries=places" type="text/javascript"></script>
 <script type="text/javascript">
    function initialize() {
        var address = (document.getElementById('txtlandmark'));
     var options = {
         componentRestrictions: {country: "IN"}
      };
        var autocomplete = new google.maps.places.Autocomplete(address,options);
        autocomplete.setTypes(['geocode']);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
        }
        /*********************************************************************/
        /* var address contain your autocomplete address *********************/
        /* place.geometry.location.lat() && place.geometry.location.lat() ****/
        /* will be used for current address latitude and longitude************/
        /*********************************************************************/
        document.getElementById('txtlatitude').value = place.geometry.location.lat();
        document.getElementById('txtlongitude').value = place.geometry.location.lng();
        });
    
  }
   google.maps.event.addDomListener(window, 'load', initialize);
</script>
 
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
          },
          txtpin:
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
          txtpin:
          {
            required:"Please enter Pincode"
          }
        }
      });
  </script>
  <script>
    function checkuname()
    {
      var uname=$("#txtuname").val();
      $.ajax({
        url:'checkuname.php',
        type:'post',
        data:{uname:uname},
        datatype:"JSON",
        success: function(res)
        {
          if(res.trim()=="true")
          {
            $("#lbluname").html("This username already exist");
            $('#btnsubmit').attr("disabled",true);
          }else
          {
            $("#lbluname").html("");
            $('#btnsubmit').attr("disabled",false);
          }
        }
      });
    }
  </script>
</body>
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>