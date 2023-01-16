<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
    echo "<script>window.location='index.php';</script>";
}
?>
<?php include 'connection.php'; ?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Doctor Hospital -Add Admin</title>
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
                                <h4 class="card-title">Update DocHos</h4>
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

                                         $result=mysqli_query($conn,"select * from tbl_doc_hosp where dochosp_id='".$id."'") or die(mysqli_error($conn));
                                          while($item=mysqli_fetch_assoc($result))
                                          {
                                   ?>		
                                    <form method="post" id="form1" enctype="multipart/form-data">
                                        <div class="form-group">
                                       <b> Doctor Id : </b><select class="form-control input-rounded" value="<?php echo $item["doc_id"]; ?>" name="docid" id="sel1" >
                                        <?php
                                            $result=mysqli_query($conn,"select * from tbl_doctor") or die(mysqli_error($conn));
                                            while ($row=mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row["doc_id"];?>"><?php echo $row["name"];?></option>
                                        <?php
                                            }
                                        ?>
                                                  </select>
                                        </div>
                                        <div class="form-group">
                                           Hospital Id:<select class="form-control input-rounded" value="<?php echo $item["hospital_id"]; ?>" name="hospid" id="sel1" >
                                        <?php
                                            $result=mysqli_query($conn,"select * from tbl_hospital") or die(mysqli_error($conn));
                                            while ($row=mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row["hospital_id"];?>"><?php echo $row["hospital_name"];?></option>
                                        <?php
                                            }
                                        ?>
                                                  </select>
                                        </div>
                                         <div class="form-group">
                                           <b> Description : </b>
                                            <?php echo $item["des"]; ?>
                                        </div>
                                        <div class="form-group">
                                            <b>Time : </b>
                                            <?php echo $item["time"]; ?>
                                        </div>
                                        <div class="form-group">
                                            <b>Charges : </b>
                                            <?php echo $item["charge"]; ?>
                                        </div>
                                    </form>
                                    <?php
                                        } }
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
</body>


<!-- Mirrored from jobie.dexignzone.com/xhtml/form-element.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:01 GMT -->
</html>