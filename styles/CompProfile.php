<?php $comp=$compdata[0]; ?>
<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
             <h4 class="M-title"> الملف التعريفي للشركة</h4> 
        </div>
    </div>
    <div class="col-xs-12">			     
        <div class="bs-nav-tabs nav-tabs-danger">
            <form name="form" class="forms-basic" id="EmpFrm">
                <div class="row">
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels has-focus">
                            <label for="s_name_ar">اسم المؤسسة عربي</label>
                            <input id="s_name_ar" autocomplete="off" type="text" name="s_name_ar" value="<?php echo $comp->s_name_ar ?>">
                            <p class="error-block hidden with-errors"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_name_en">اسم المؤسسة إنجليزي</label>
                            <input id="s_name_en" autocomplete="off" type="text" name="s_name_en" value="<?php echo $comp->s_name_en ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>
            </div>
                <div class="row">				                                
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_system_ar">اسم النظام عربي</label>
                            <input id="s_system_ar" autocomplete="off" type="text" name="s_system_ar" value="<?php echo $comp->s_system_ar ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>			                               
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                           <label for="s_system_en">اسم النظام إنجليزي</label>
                           <input id="s_system_en" type="text" class="form-control"  name="s_system_en" value="<?php echo $comp->s_system_en ?>">	
                        </div>		
                	</div>								                
                </div>
                <div class="row">
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_address_ar">عنوان المؤسسة عربي</label>
                            <input id="s_address_ar" type="text" class="form-control"  name="s_address_ar" value="<?php echo $comp->s_address_ar ?>">				                                        
                            <p class="error-block hidden"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_address_en">عنوان المؤسسة إنجليزي</label>
                            <input id="s_address_en" autocomplete="off" type="text" name="s_address_en" value="<?php echo $comp->s_address_en ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_email">بريد إلكتروني</label>
                            <input id="s_email" autocomplete="off" type="email" name="s_email" value="<?php echo $comp->s_email ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_url">رابط المؤسسة</label>
                            <input id="s_url" autocomplete="off" type="text" name="s_url" value="<?php echo $comp->s_url ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-xl-6">
                        <label for="s_logo">شعار المؤسسة</label> 
                        <input id="s_logo" autocomplete="off" type="file" name="s_logo">
                            <p class="error-block hidden"></p>		                       
                    </div>
                </div>
             <div class=" m-b-15 ">
                    <button type="submit" class="btn btn-primary" >
                        <i class="btn-icon fa fa-check"></i> حفظ
                    </button>
                </div> 
            </form>
        </div>
    </div>                
</div>

 <script>
$(document).ready(function(){
	
	
		$("#EmpFrm").validate({
			rules: {
				s_name_ar: {
					required: true,
					minlength: 3
				},
				s_name_en: {
					required: true,
					minlength: 3
				},
				s_system_ar: {
					required: true,
					minlength: 3,
				},
				s_system_en: {
					required: true,
					minlength: 3,
				},
				s_address_ar: {
					required: true,
					minlength: 3,
				},
				s_address_en: {
					required: true,
					minlength: 3,
				},
				s_email: {
					required: true,
					email: true
				},
				s_url: {
					required: true,
					url: true,
				},
				s_logo: {
					required: true, 
				},
			},
			messages: {
				s_name_ar: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل لا يقل عن 3 حروف'
				},
				s_name_en: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل لا يقل عن 3 حروف'
				},
				s_system_ar: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل لا يقل عن 3 حروف',
				},
				s_system_en: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل لا يقل عن 3 حروف',
				},
				s_address_ar: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل لا يقل عن 3 حروف',
				},
				s_address_en: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل لا يقل عن 3 حروف',
				},
				s_email: {
					required: 'هذا الحقل مطلوب',
					email: 'أدخل صيغة بريد إلكتروني'
				},
				s_url: {
					required: 'هذا الحقل مطلوب',
					url: 'أدخل صيفة رابط',
				},
				s_logo: {
					required: 'هذا الحقل مطلوب', 
				},
			},
			
			submitHandler: function() {
				$(".alert-info-outline").show();
				var formData = new FormData($("#EmpFrm")[0]);
				$.ajax({
					url: '<?php echo base_url() ?>AddCompProfile',
					type: 'POST',
					data: formData,
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
					},
					cache: false,
					contentType: false,
					processData: false
				});
				$(".alert-info-outline").hide();
			}
		});

	$("#formData").on('submit',function(){
		
	});
	
	
});
/*$(".forms-basic").on('submit', function(e) {
				$('.forms-basic .form-group.floating-labels label.error').parent().addClass('has-error');
				$('.forms-basic .form-group.floating-labels .error-block').hide();
			});*/
</script>