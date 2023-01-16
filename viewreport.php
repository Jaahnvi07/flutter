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


<!-- Mirrored from jobie.dexignzone.com/xhtml/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>View Report - Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
    <?php 
include 'header.php';
?>
<div class="content-body">
            <div class="container-fluid">
				<div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Charts</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">ChartJS</a></li>
					</ol>
                </div>
<div class="row">
                    <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Category wise Hospital</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="pie_chart"></canvas>
                                    </div>
                                </div>
                            </div>
         </div>
                <div class="row">
                            <div class="col-lg-12 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">     </h4>
                  <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>
                                      #
                                    </th>
                                    <th>
                                      Category Name
                                    </th>
                                    <th>
                                      Total Hospital
                                    </th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $count=1;
                                 
                                  $result1=mysqli_query($conn,"select * from tbl_category")or die(mysqli_error($conn));
                                  while($item=mysqli_fetch_assoc($result1))
                                  {
                                    
                                  ?>
                                  <tr>
                                    <td>
                                      <?php echo $count;$count++; ?>
                                    </td>
                                    <td>
                                      <?php
                                      $result2=mysqli_query($conn,"select * from tbl_category");
                                       echo $item["category_name"]; 
                                       $x=$item["category_id"];
                                      ?>
                                    </td>
                                    <td>
                                      <?php
                                      $result=mysqli_query($conn,"select * from tbl_hospital where category_id='".$x."'");
                                      $n=0;
                                        while(mysqli_fetch_assoc($result))
                                        {
                                          $n=$n+1;
                                        }
                                        echo $n;
                                      ?>
                                    </td>
                                    
                                  </tr>
                                  <?php
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                </div>
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Doctor's Hospital</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="pie_chart1"></canvas>
                                    </div>
                                </div>
                            </div>
         </div>
         <div class="row">
                            <div class="col-lg-12 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">     </h4>
                  <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>
                                      #
                                    </th>
                                    <th>
                                      Doctor Name
                                    </th>
                                    <th>
                                      Total Hospital
                                    </th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $count=1;
                                 
                                  $result1=mysqli_query($conn,"select * from tbl_doctor")or die(mysqli_error($conn));
                                  while($item=mysqli_fetch_assoc($result1))
                                  {
                                    
                                  ?>
                                  <tr>
                                    <td>
                                      <?php echo $count;$count++; ?>
                                    </td>
                                    <td>
                                      <?php
                                      $result2=mysqli_query($conn,"select * from tbl_doctor");
                                       echo $item["name"]; 
                                       $x=$item["doc_id"];
                                      ?>
                                    </td>
                                    <td>
                                      <?php
                                      $result=mysqli_query($conn,"select * from tbl_doc_hosp where doc_id='".$x."'");
                                      $n=0;
                                        while(mysqli_fetch_assoc($result))
                                        {
                                          $n=$n+1;
                                        }
                                        echo $n;
                                      ?>
                                    </td>
                                    
                                  </tr>
                                  <?php
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                </div>
              </div>
            </div>
            </div>
            
        </div>
       
                                        
                                
            <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
    
    <script>
       
          if(jQuery('#pie_chart').length > 0 ){
            //pie chart
            const pie_chart = document.getElementById("pie_chart").getContext('2d');
            // pie_chart.height = 100;
            new Chart(pie_chart, {
                type: 'pie',
                data: {
                    defaultFontFamily: 'Poppins',
                    datasets: [{
                        data: [
                        <?php
                         $result=mysqli_query($conn,"select *,(select count(*) from tbl_hospital where category_id=tbl_category.category_id) as totalhospital from tbl_category") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>
                        <?php echo $row["totalhospital"]; ?>, 
                    <?php } ?>
                        ],
                        borderWidth: 0, 
                        backgroundColor: [
                            "rgba(64, 24, 157, .9)",
                            "rgba(64, 24, 157, .7)",
                            "rgba(64, 24, 157, .5)",
                            "rgba(0,0,0,0.07)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(64, 24, 157, .9)",
                            "rgba(64, 24, 157, .7)",
                            "rgba(64, 24, 157, .5)",
                            "rgba(0,0,0,0.07)"
                        ]

                    }],
                    labels: [
                        <?php
                         $result=mysqli_query($conn,"select * from tbl_category") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>
                        "<?php echo $row["category_name"]; ?>",
                    <?php } ?>
                    ]
                },
            });
        }
    </script>
    <script>
       
          if(jQuery('#pie_chart1').length > 0 ){
            //pie chart
            const pie_chart1 = document.getElementById("pie_chart1").getContext('2d');
            // pie_chart.height = 100;
            new Chart(pie_chart1, {
                type: 'pie',
                data: {
                    defaultFontFamily: 'Poppins',
                    datasets: [{
                        data: [
                        <?php
                         $result=mysqli_query($conn,"select *,(select count(*) from tbl_doc_hosp where doc_id=tbl_doctor.doc_id) as totalhospital from tbl_doctor") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>
                        <?php echo $row["totalhospital"]; ?>, 
                    <?php } ?>
                        ],
                        borderWidth: 0, 
                        backgroundColor: [
                            "rgba(64, 24, 157, .9)",
                            "rgba(64, 24, 157, .7)",
                            "rgba(64, 24, 157, .5)",
                            "rgba(0,0,0,0.07)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(64, 24, 157, .9)",
                            "rgba(64, 24, 157, .7)",
                            "rgba(64, 24, 157, .5)",
                            "rgba(0,0,0,0.07)"
                        ]

                    }],
                    labels: [
                        <?php
                         $result=mysqli_query($conn,"select * from tbl_doctor") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>
                        "<?php echo $row["name"]; ?>",
                    <?php } ?>
                    ]
                },
            });
        }
    </script>
    
</body>
</html>