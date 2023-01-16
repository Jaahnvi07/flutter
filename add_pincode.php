<?php
session_start();
include_once 'check_session.php';
include_once 'connection.php';
$page = "Manage Landmark & Pincode";
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>SR Store - Manage Landmark & Pincode </title>

        <?php include_once './common_css.php'; ?>
        <!-- Datepicker -->
        <link rel="stylesheet" href="./assets/plugin/datepicker/css/bootstrap-datepicker.min.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
		<?php include_once './common_js.php'; ?>
    <body>
        <div class="main-menu">
            <?php include_once './sidemenu.php'; ?>
        </div>
        <!-- /.main-menu -->

        <?php include_once './header.php'; ?>

        <div id="wrapper">
            <div class="main-content">
                <div class="row small-spacing">
                    <div class="col-lg-3 col-xs-12"></div>
                    <div class="col-lg-6 col-xs-12">
					
					  <div id="duperror" class="alert alert-danger" role="alert" style="display:none"> <strong>Oh snap!</strong> Enter Pincode is already exists. please try again </div>
                        
						  <div id="error" class="alert alert-danger" role="alert" style="display:none"> <strong>Oh snap!</strong> something went to wrong. please try again </div>
                              
					  <div id="success" class="alert alert-success" role="alert"  style="display:none"> <strong>Done !</strong>  Pincode Added Succesfully. </div>
                              
                        <div class="box-content card white">
                            <h4 class="box-title">Add Landmark & Pincode Details</h4>
                            <!-- /.box-title -->
                            <div class="dropdown js__drop_down">
                                <a href="view_pincode.php" class="btn btn-info btn-xs waves-effect waves-light">View List</a>
                            </div>
                            <div class="card-content" id="myBox">
                         
                                <form id="myForm" name="myForm" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="add" name="action"/>                
                                    <div class="form-group">
                                        <label for="title">Landmark </label>
                                        <input type="text" class="form-control input-sm" id="txtpincode" name="txtpincode" placeholder="Landmark " value="">
										<input type="hidden" name="txtlat" id="lat" />
										<input type="hidden" name="txtlong" id="long" />
										<span style="color:black"><strong>Ex : Tadwadi,Adajan Surat,395009</strong> </span>
                                    </div>
                                     <div class="form-group">
                                        <label for="title">Deliver Charges</label>
                                        <input type="text" class="form-control input-sm" id="txtdcharge" name="txtdcharge" placeholder="Deliver Charges" value="">
                                    </div>
                                    
                                     <div class="form-group">
                                        <label for="title">Over Weight Charges</label>
                                        <input type="text" class="form-control input-sm" id="txtovercharges" name="txtovercharges" placeholder="Over Weight Charges" value="">
                                    </div>
                                    
                                    <div class="form-group" style="text-align: right;">
                                    <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-success btn-xs waves-effect waves-light"> <i class="fa fa-check-square-o"></i> Submit</button>
                                     <button type="reset"  class="btn btn-danger btn-xs waves-effect waves-light"> <i class="fa fa-refresh"></i>  Reset</button>
                                    </div>
                                </form>
								
                            </div>
                            <!-- /.card-content -->
                        </div>
                        <!-- /.box-content -->
                    </div>
                    <div class="col-lg-2 col-xs-12"></div>
                </div>                
            </div>
            <!-- /.main-content -->
        </div><!--/#wrapper -->
            
        <!-- Validator -->
        <script src="assets/scripts/jquery.validate.js"></script>
        <!-- Datepicker -->
        <script src="./assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="./assets/scripts/main.min.js"></script>
		<script src="assets/scripts/additional-methods.js"></script>
		<script src="assets/scripts/jquery.blockUI.js"></script>
 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyClJ7bohWjfhtUsd71UVKXfsu48-Wq5O5s&sensor=false&amp;libraries=places" type="text/javascript"></script>
 <script type="text/javascript">
    function initialize() {
        var address = (document.getElementById('txtpincode'));
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
        document.getElementById('lat').value = place.geometry.location.lat();
        document.getElementById('long').value = place.geometry.location.lng();
        });
		
  }
   google.maps.event.addDomListener(window, 'load', initialize);
</script>
        <script type="text/javascript">
		function isNumber(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
			}
			return true;
		}


            $(document).ready(function() {
				
					
                $("#lnkpincode").addClass("current");                
            
				
                $("#myForm").validate({
                
                    rules: {
                        txtpincode: "required",
						txtdcharge: "required",
						txtovercharges: "required"
                    
                    },
                    messages: {
                        txtpincode: "Landmark is required",
						txtdcharge: "Deliver Charge is required",
                        txtovercharges: "Over Weight Charge is required"
           
                    }
                });

                $("#btnsubmit").on("click", function() {
                    if (!$("#myForm").valid()) {
                        return false;
                    }
                });

                $("#btnupdate").on("click", function() {
                    if (!$("#myForm").valid()) {
                        return false;
                    }
                });
				
				
				
				
		$("#myForm").on('submit', (function(e) {
		  					$('#myBox').block({
											message: '<img src="assets/images/loader.gif" style="width:35%"/>',
											css: {backgroundColor: 'transparent', border: 'none'}
										}) 
					e.preventDefault();
					if ($("#myForm").valid()) {
					   
						$.ajax({
							url: 'json/pincode.php',
							type: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
							console.log(data);
								var d = JSON.parse(data);
								if (d.msg == "Success") {
								  $("#error").hide(); 
								  $("#success").show(); 
								  $( '#myForm' ).each(function(){
   								 	this.reset();
									});
								 $('#myBox').unblock();
								
								}
								else {
								   $("#error").show();
								    $("#success").hide(); 
									$('#myBox').unblock();
								}
							},
							error: function() {
								 $('#myBox').unblock();
							}
						});
					}
				}));
				
				
            });
		
        </script>
    </body>
</html>