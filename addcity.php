<?php 
session_start();
if(!isset($_SESSION["islogin"]))
{
    echo"<script>window.location='index.php';</script>";
}
?>
<?php 
include 'connection.php';?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Add City - Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
        <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
        <div class="content-body">
        <div class="row">
                    	<div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add City</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                	<?php
                                	if(isset($_POST["btnsubmit"]))
                                	{
                                		//$cityname = $_POST["txtcityname"];
                                	//	$result = mysqli_query($conn,"insert into tbl_city (city_name) values ('$cityname')") or die(mysqli_error($conn));
                                		$result = mysqli_query($conn,"insert into tbl_city (city_name,state_id) values ('".$_POST["txtcityname"]."','".$_POST["state_id"]."')") or die(mysqli_error($conn));
                                		if($result==true)
                                		{
                                			?>
                                			<div class="alert alert-success alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" 	stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
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
                                    <form method="post" id="form2">
                                        <div class="form-group">
                                       City name :
                                           <input type="text" id="txtcityname" name="txtcityname" class="form-control input-rounded" onBlur='checkcityname()'> 
                                           <span class="error" id="lblcname"></span>         
                                            </div>
                                            <div class="form-group">
                                           <label>State Name:</label>
                                                <select class="form-control input-rounded" name="state_id">
                                                    <?php
                                                        $result=mysqli_query($conn,"select * from tbl_state") or die(mysqli_error($conn));
                                                          while($row=mysqli_fetch_assoc($result))
                                                         {
                                                     ?>
                                                    <option value="<?php echo $row["state_id"]; ?>"><?php echo $row["state_name"]; ?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-primary">Cancel</button>
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

   
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
  <script>
      $('#form2').validate({

        rules:
        {
            txtcityname:
            {
                required:true
            }
        },
        messages:
        {
            txtcityname:
            {
                required:"Please enter name"
            }
        }
      });
  </script>

    <script>
        function checkcityname()
        {
          var cname=$("#txtcityname").val();
          $.ajax({
            url:'checkcityname.php',
            type:'post',
            data:{cname:cname},
            datatype:"JSON",
            success: function(res)
            {
              if(res.trim()=="true")
              {
                $("#lblcname").html("This city already exist");
                $('#btnsubmit').attr("disabled",true);
              }else
              {
                $("#lblcname").html("");
                $('#btnsubmit').attr("disabled",false);
              }
            }
          });
        }
      </script>

</body>
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>