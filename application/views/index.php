<?php 
date_default_timezone_set('Asia/Jerusalem');
	$timeHours=date('h');
	$timeminits=date('i');
	//$timeHours+=2;
	if($timeHours>12)
		$timeHours-=12;
?>
<script>
	var currentHours=<?php echo $timeHours; ?>;
	var currentMinutes=<?php echo $timeminits; ?>;
	var currentSeconds=<?php echo date('s'); ?>;
</script>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
<title>نظام إدارة الموارد البشرية</title>
<meta name="description" content="Marino, Admin theme, Dashboard theme, AngularJS Theme">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="favicon.ico">
<!--[if IE]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="<?php echo base_url()?>bower_components/jquery/dist/jquery.js"></script>
<!-- global stylesheets -->
<link rel="stylesheet" href="<?php echo base_url()?>styles/bootstrap.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/1.0.0/css/flag-icon.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>styles/main.css">

	<link rel="stylesheet" href="<?php echo base_url()?>bower_components/chartist/dist/chartist.min.css" />
    
<link rel="stylesheet" href="<?php echo base_url()?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" />
    
    
    
	<link rel="stylesheet" href="<?php echo base_url()?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" />
    
	<link rel="stylesheet" href="<?php echo base_url()?>bower_components/sweetalert2/dist/sweetalert2.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>styles/portlet.css">
    <link rel="stylesheet" href="<?php echo base_url()?>styles/panel.css">
    <link rel="stylesheet" href="<?php echo base_url()?>styles/modal.css">
    <link rel="stylesheet" href="<?php echo base_url()?>styles/select2/dist/css/select2.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>styles/select2/dist/css/select2-rtl.css"> -->

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"> -->

    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/datatables/plugins/bootstrap/DT_bootstrap_rtl.css"/> -->


    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap-timepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>js/bootstrap-timepicker.js">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>styles/custom.css">
</head>
<body data-layout="empty-layout" data-palette="palette-5" data-direction="rtl" >

    <nav class="navbar navbar-fixed-top navbar-1"><a class="navbar-brand" href="index.html">نظام إدارة الموارد البشرية</a> 
        <!-- <ul class="nav navbar-nav pull-left toggle-layout">
            <li class="nav-item">
                <a class="nav-link" data-click="toggle-layout"> <i class="zmdi zmdi-menu"></i> 
                </a>
            </li>
        </ul> -->
        <!-- <ul class="nav navbar-nav pull-left toggle-fullscreen-mode">
            <li class="nav-item">
                <a class="nav-link" data-click="toggle-fullscreen-mode"> <i class="zmdi zmdi-fullscreen"></i> 
                </a>
            </li>
        </ul> -->
        <ul class="nav navbar-nav pull-right hidden-lg-down navbar-notifications">
            <li class="nav-item">
                <a class="nav-link" data-click="toggle-right-sidebar"> <i class="zmdi zmdi-notifications-active"></i>  <span class="label label-rounded label-danger label-xs">3</span> 
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-right hidden-lg-down navbar-profile">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle no-after" data-toggle="dropdown">
                    <img class="img-circle img-fluid profile-image" src="<?php echo base_url().$userdata['s_emp_image']?>">
                </a>
                <div class="dropdown-menu dropdown-menu-scale from-right dropdown-menu-right">
                    <a class="dropdown-item animated fadeIn" href="email-inbox.html"> <i class="zmdi zmdi-email"></i>  <span class="label label-pill label-danger label-xs pull-right">جديد</span>  <span class="dropdown-text">الوارد</span> 
                    </a>
                    <a class="dropdown-item animated fadeIn" href="pages-profile.html"> <i class="zmdi zmdi-settings-square"></i>  <span class="dropdown-text">الملف الشخصي</span> 
                    </a>
                    <a class="dropdown-item animated fadeIn" href="<?php echo base_url() ?>logout"> <i class="zmdi zmdi-power"></i>  <span class="dropdown-text">تسجيل خروج</span> 
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar-placeholder">
            </div>
            <div class="sidebar-outer-wrapper">
                <?php $this->load->view('menu');?>
            </div>
            
            <div class="col-xs-12 main" id="main">
            <div class="alert alert-info-outline animated fadeIn CustomeAlert" role="alert" style="display:none">
        <button type="button" class="close"  aria-label="Close"> 
            <span aria-hidden="true">×</span>  
            <span class="sr-only">إغلاق</span> 
        </button> 
        <img src="<?php echo base_url()?>images/loading-spinner-default.gif" width="22" height="22"> الرجاء الإنتظار حتى يتم تنفيذ العملية
    </div>
    <div ng-view="" autoscroll="true">
        <div class="row">
            <div class="col-xs-12">
            	<div class="alert alert-success-outline CustomeAlert" role="alert" style="display:none">
                    <button type="button" class="close" aria-label="Close"> 
                        <span aria-hidden="true">×</span>  
                        <span class="sr-only">إغلاق</span> 
                    </button> 
                    <span id="successMsg"></span>
                </div>
            	<div class="alert alert-danger-outline CustomeAlert" role="alert" style="display:none">
                    <button type="button" class="close"  aria-label="Close"> 
                        <span aria-hidden="true">×</span>  
                        <span class="sr-only">إغلاق</span> 
                    </button> 
                    <span id="dangerMsg"></span>
                </div>
            </div>
        </div>
        <?php $this->load->view($subpage);?>
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-xs-12">
                <!--<a href="http://www.batchthemes.com" target="_blank">© 2016. Batch Themes Ltd. </a><a href="http://themeforest.net/item/marino-bootstrap-4-dashboard-ui-kit/15735840" target="_blank">Buy Marino</a>-->
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
    <!-- global scripts -->
	<script src="<?php echo base_url()?>bower_components/jquery/dist/jquery.js"></script>
    <script src="<?php echo base_url()?>bower_components/tether/dist/js/tether.js"></script>
    <script src="<?php echo base_url()?>bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?php echo base_url()?>bower_components/PACE/pace.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.0.0/lodash.min.js"></script>
    <script src="<?php echo base_url()?>scripts/components/jquery-fullscreen/jquery.fullscreen-min.js"></script>
    <script src="<?php echo base_url()?>bower_components/jquery-storage-api/jquery.storageapi.min.js"></script>
    <script src="<?php echo base_url()?>bower_components/wow/dist/wow.min.js"></script>
    <script src="<?php echo base_url()?>scripts/functions.js"></script>
    <script src="<?php echo base_url()?>scripts/colors.js"></script>
    <script src="<?php echo base_url()?>scripts/left-sidebar.js"></script>
    <script src="<?php echo base_url()?>scripts/navbar.js"></script>
    <script src="<?php echo base_url()?>scripts/horizontal-navigation-1.js"></script>
    <script src="<?php echo base_url()?>scripts/horizontal-navigation-2.js"></script>
    <script src="<?php echo base_url()?>scripts/horizontal-navigation-3.js"></script>
    <script src="<?php echo base_url()?>scripts/main.js"></script>
	<script src="<?php echo base_url()?>bower_components/notifyjs/dist/notify.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
	<script src="<?php echo base_url()?>bower_components/chartist/dist/chartist.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url()?>bower_components/d3/d3.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
    <script src="<?php echo base_url()?>scripts/index.js"></script>
    <script src="<?php echo base_url()?>scripts/components/floating-labels.js"></script>
    <script src="<?php echo base_url()?>js/jquery.validate.js"></script>
    <script src="<?php echo base_url()?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <script src="<?php echo base_url()?>bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
    
    <script src="<?php echo base_url()?>js/portlet.js"></script>
    <script src="<?php echo base_url()?>styles/select2/dist/js/select2.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <!-- 
    <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
 -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.js"></script>
</body>
</html>
<script>
$(document).ready(function(){

    


    $(".close").on('click',function(){
		//e.preventDefault();
		console.log('hi');
		$(".close").parent().hide();
	});
	
	 $('input,select').floatingLabels({ });
	 $('.date').datepicker({
            orientation: 'bottom left'
        });
	$(".delBtn").on('click',function(){
			var id=$(this).attr('id')
		swal({
			title: 'رسالة تأكيد',
			text: 'هل تريد بالفعل حذف السجل؟',
			//type: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'نعم',
			cancelButtonText: 'لا',
			closeOnConfirm: false
		}, function() { 
			DelFunction(id)
			swal('تم!', 'تم حذف السجل بنجاح.', 'success');
		});	
	});

    $(".M-select2").select2({
        dir: "rtl"
    });

   
});


</script>