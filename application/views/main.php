<div class="row main_currentTime">
	<div align="center" class="sub-title">
		<span style="color: #900;">الوقت الحالي: </span>
		<span id="clock">07:10:41</span>
        <input type="hidden" name="clc" id="clc" />
    </div>
</div>
<div class="row attendanceAndLeave_btns">
    <div class="col-lg-2 col-sm-1"></div>
    <div class="col-lg-4 col-sm-5" align="center">
    <?php if(sizeof($attend)>0){?>    
        <button type="button" class="btn btn-lg btn-success m-r-5">
            <i class="btn-icon fa fa-sign-in fa-2x"></i>حضور الساعة <br /><?php $dateparser=explode(' ',$attend[0]->dt_entry_date); echo $dateparser[1]; ?>
        </button>
    <?php }
	else {?> 
    	<button type="button" class="btn btn-lg btn-info m-r-5 btn_Comming">
    	<!-- fa-arrow-left -->
            <i class="btn-icon fa fa-sign-in fa-2x"></i>تسجيل حضور
        </button>
	<?php }?>
    </div>
    <div class="col-lg-4 col-sm-5" align="center">
    <?php if((sizeof($attend)>0 && $attend[0]->dt_leave_date=='') || sizeof($attend)==0){?>  
        <button type="button" class="btn btn-lg btn-danger m-r-5 btn_Leave">
        <!-- fa-arrow-right -->
            <i class="btn-icon fa fa-sign-out fa-2x"></i>تسجيل انصراف
        </button>
    <?php }
	else{?>
	<button type="button" class="btn btn-lg btn-success m-r-5">
            <i class="btn-icon fa fa-sign-out fa-2x"></i>انصراف الساعة <br /><?php $dateparser=explode(' ',$attend[0]->dt_leave_date); echo $dateparser[1]; ?>
        </button>	
	<?php }?>
    </div>
    <div class="col-lg-2 col-sm-1"></div>
</div>
<script src="<?php echo base_url()?>js/clock.js"></script>
<script>
$(document).ready(function(){
	updateClock();
	
	$(".btn_Comming").on('click',function(){
			$(".alert-info-outline").show();
			$(this).html('<i class="btn-icon fa fa-sign-in fa-2x"></i> حضور الساعة: <br />'+$("#clock").html()+'')
			$.ajax({
				url: '<?php echo base_url() ?>ApplyAttend',
				type: 'POST',
				//data: formData,
				dataType:"json",
				async: false,
				success: function (data) {
					if(data.status.success){	
						$(".alert-danger-outline").hide();
						$(".alert-success-outline").show();
						$("#successMsg").text(data.status.msg)
					}
					else {
						$(".alert-success-outline").hide();
						$(".alert-danger-outline").show();
						$("#dangerMsg").text(data.status.msg)
					}
				$(this).removeClass('btn_Comming');
				},
				cache: false,
				contentType: false,
				processData: false
			});
			$(".alert-info-outline").hide();
	});
	
	$(".btn_Leave").on('click',function(){
			$(".alert-info-outline").show();
			$(this).html('<i class="btn-icon fa fa-sign-out fa-2x"></i> حضور الساعة <br />'+$("#clock").html()+'')
			$.ajax({
				url: '<?php echo base_url() ?>ApplyLeave',
				type: 'POST',
				//data: formData,
				dataType:"json",
				async: false,
				success: function (data) {
					if(data.status.success){	
						$(".alert-success").show();
						$("#successMsg").text(data.status.msg)
					}
					else {
						$(".alert-danger").show();
						$("#dangerMsg").text(data.status.msg)
					}
				$(this).removeClass('btn_Leave');
				},
				cache: false,
				contentType: false,
				processData: false
			});
			$(".alert-info-outline").hide();
			$(this).html('<i class="btn-icon fa fa-sign-out fa-2x"></i> إنصراف الساعة <br />'+$("#clock").html()+'')
	});
});
</script>


