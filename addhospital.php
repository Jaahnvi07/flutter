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
                                    $cat=implode(",",$_POST["txtcateid"]); 


                                    $result = mysqli_query($conn,"insert into tbl_hospital (category_id,hospital_name,description,address1,address2,landmark,pincode,city_id,contact_no1,contact_no2,lattitude,longtitude,is_active,image,facility,email,website) values ('".$cat."','".$_POST["txthname"]."','".$_POST["txtdes"]."','".$_POST["txtadd1"]."','".$_POST["txtadd2"]."','".$_POST["txtlandmark"]."','".$_POST["txtpin"]."','".$_POST["txtcityname"]."','".$_POST["txtno1"]."','".$_POST["txtno2"]."','".$_POST["txtlatitude"]."','".$_POST["txtlongitude"]."','".$_POST["isactive"]."','".$newname."','".$_POST["txtfacility"]."','".$_POST["txtmail"]."','".$_POST["txtwebsite"]."')") or die(mysqli_error($conn));
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
           						  Category :<select class="form-control input-rounded" multiple="multiple" name="txtcateid[]" id="sel1" >
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
           						 HospitalName<input type="text" id="txthname"  name="txthname" class="form-control input-rounded" onBlur='checkhname()'>
                       <span class="error" id="lblhname"></span>
           					</div>
           					<div class="form-group">
           						 Description<input type="text" name="txtdes" class="form-control input-rounded">
           					</div>
           					<div class="form-group">
           						 Address1<input type="text" name="txtadd1" class="form-control input-rounded">
           					</div>
                    <div class="form-group">
                       Address2<input type="text" name="txtadd2" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Landmark<input type="text" name="txtlandmark" id="txtlandmark" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Pincode<input type="text" name="txtpin" class="form-control input-rounded">
                    </div>
                   <div class="form-group"> 
                     City Name:<select class="form-control input-rounded" name="txtcityname" id="sel1" >
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
                       ContactNo1<input type="text" name="txtno1" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       ContactNo2<input type="text" name="txtno2" class="form-control input-rounded">
                    </div>
                 <div class="form-group">
                       Latitude<input type="text" id="txtlatitude" name="txtlatitude" class="form-control input-rounded">
                 </div>
                   <div class="form-group">
                      Longitude<input type="text" id="txtlongitude" name="txtlongitude" class="form-control input-rounded">
                   </div>
              <div class="form-group mb-0">
                 IsActive:<select class="form-control" name="isactive">
                   <option>YES</option>
                   <option>NO</option>
                 </select>
           			 <div class="form-group">
                    Image:<input type="file" name="himage" class="form-control input-rounded" >
                 </div>
                 <div class="form-group">
                       Facility<input type="text" name="txtfacility" class="form-control input-rounded">
                    </div>
                    <div class="form-group">
                       Email<input type="email" name="txtmail" class="form-control input-rounded">
                    </div>
                 <div class="form-group">
                       Website<input type="text" name="txtwebsite" class="form-control input-rounded">
                 </div>
                 <div class="form-group row">
                	<div class="col-sm-10">
                	<button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-primary">Submit</button>
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
            },
            txtpin:
            {
                required:true
            },
            txtfacility:
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
                required:"Please enter Faciality"
            },
           txtmail:
            {
                required:"please enter Email"
            },
            txtwebsite:
            {
                required:"please enter Website"
            },
            txtpin:
            {
                required:"Please enter Pincode"
            },
            txtfacility:
            {
              required:"Please enter Facility"
            }
        }
      });
  </script>
  <script>
    function checkhname()
    {
      var hname=$("#txthname").val();
      $.ajax({
        url:'checkhname.php',
        type:'post',
        data:{hname:hname},
        datatype:"JSON",
        success: function(res)
        {
          if(res.trim()=="true")
          {
            $("#lblhname").html("This hospitalname already exist");
            $('#btnsubmit').attr("disabled",true);
          }else
          {
            $("#lblhname").html("");
            $('#btnsubmit').attr("disabled",false);
          }
        }
      });
    }
  </script>
</body>


<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>