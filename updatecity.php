<?php 
session_start();
if(!isset($_SESSION["islogin"]))
{
    echo"<sccript>window.location='index.php';</script>";
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
    <title>Update City - Admin</title>
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
                                <h4 class="card-title">Update City</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                  <?php
                                  if(isset($_POST["btnsubmit"]))
                                  {
                                    //$cityname = $_POST["txtcityname"];
                                  //  $result = mysqli_query($conn,"insert into tbl_city (city_name) values ('$cityname')") or die(mysqli_error($conn));
                                         $id=my_simple_crypt($_GET["updateid"],'d');
                                    $result = mysqli_query($conn,"update tbl_city set city_name='".$_POST["txtcityname"]."', state_id='".$_POST["txtstateid"]."'where city_id ='".$id."'") or die(mysqli_error($conn));
                                    if($result==true)
                                    {
                                      echo"<script>window.location='viewcity.php';</script>";
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
                                         $result=mysqli_query($conn,"select * from tbl_city where city_id='".$id."'") or die(mysqli_error($conn));
                                          while($item=mysqli_fetch_assoc($result))
                                          {
                                   ?>
                                    <form method="post" id="form2">
                                        <div class="form-group">
                                       City name :
                                           <input value="<?php echo $item["city_name"]; ?>" type="text" id="txtcityname" name="txtcityname" class="form-control input-rounded" onBlur='checkcityname()'> 
                                           <span class="error" id="lblcname"></span>          
                                            </div>
                                            <div class="form-group">
                                           <label>State Name:</label>
                                                <select name="txtstateid" class="form-control input-rounded" >
                                                    <?php
                                                        $result=mysqli_query($conn,"select * from tbl_state") or die(mysqli_error($conn));
                                                          while($row=mysqli_fetch_assoc($result))
                                                         {
                                                     ?>
                                                    <option <?php if($item["state_id"]==$row["state_id"]) {?> selected <?php } ?> value="<?php echo $row["state_id"]; ?>"><?php echo $row["state_name"]; ?></option>
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

   
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
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
</body>
<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>