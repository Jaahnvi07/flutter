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
                                  if(isset($_POST["btnsubmit"]))
                                  {


                                    $ext = pathinfo($_FILES["profilepic"]["name"],PATHINFO_EXTENSION);
                                    $newname = time().rand(1111,9999).time().rand(1111,9999).".".$ext;
                                    move_uploaded_file($_FILES["profilepic"]["tmp_name"],"uploads/profile/".$newname);

                                    $id=my_simple_crypt($_GET["updateid"],'d');

                                    $result = mysqli_query($conn,"update tbl_admin set admin_name='".$_POST["txtname"]."', username='".$_POST["txtuname"]."', password='".$_POST["txtpass"]."', email='".$_POST["txtmail"]."', contact='".$_POST["txtcon"]."', profile_pic='".$newname."', usertype='".$_POST["usertype"]."', is_block='".$_POST["isblock"]."' where login_id='".$id."'") or die(mysqli_error($conn));
                                    if($result==true)
                                    {
                                      echo"<script>window.location='viewadmin.php';</script>";
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

                                         $result=mysqli_query($conn,"select * from tbl_admin where login_id='".$id."'") or die(mysqli_error($conn));
                                          while($item=mysqli_fetch_assoc($result))
                                          {
                                   ?>


	                    <form method="post" id="form1" enctype="multipart/form-data">
           					<div class="form-group">
           						 Name<input value="<?php echo $item["admin_name"]; ?>" type="text" name="txtname" class="form-control inputput-rounded">
           					</div>
           					<div class="form-group">
           						 UserName<input value="<?php echo $item["username"]; ?>" id="txtuname" type="text" name="txtuname" class="form-control input-rounded" onBlur='checkusername()'>
                       <span class="error" id="lbluser"></span>
           					</div>
           					<div class="form-group">
           						 Password<input value="<?php echo $item["password"]; ?>" type="password" name="txtpass" class="form-control input-rounded">
           					</div>
                    <div class="form-group">
                       E-mail<input value="<?php echo $item["email"]; ?>" type="email" name="txtmail" class="form-control input-rounded">
                    </div>
           					<div class="form-group">
           						 Contact<input value="<?php echo $item["contact"]; ?>" type="text" name="txtcon" class="form-control input-rounded">
           					</div>
           					<div class="form-group">
           						 Profile Pic<input value="<?php echo $item["profile_pic"]; ?>" type="file" name="profilepic" class="form-control input-rounded">
           						 <a target="_blank" href="uploads/profile/<?php echo $item["profile_pic"]; ?>">
                                    <img width="100" height="100" src="uploads/profile/<?php echo $item["profile_pic"]; ?>">
                                </a>
           					</div>

           					 <div class="form-group mb-0">
           					 	User Type<br>
                                            <select class="form-control" name="usertype">
                                            	<option>Super</option>
                                            	<option>Sub</option>
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
  <script>
    function checkusername()
    {
      var uname=$("#txtuname").val();
      $.ajax({
        url:'checkusername.php',
        type:'post',
        data:{uname:uname},
        datatype:"JSON",
        success: function(res)
        {
          if(res.trim()=="true")
          {
            $("#lbluser").html("This username already exist");
            $('#btnsubmit').attr("disabled",true);
          }else
          {
            $("#lbluser").html("");
            $('#btnsubmit').attr("disabled",false);
          }
        }
      });
    }
  </script>

 <!-- <script>
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
  </script> -->
</body>
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>