<?php
$rec=$userData[0];
?>
<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
             <h4 class="M-title"> إضافة بيانات موظف </h4> 
        </div>
    </div>
    <div class="col-xs-12">			     
        <div class="bs-nav-tabs nav-tabs-danger">
            <form name="form" class="forms-basic" id="EmpFrm">
                <div class="row">
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="i_emp_number">الرقم الوظيفي (غير قابل للتعديل)</label>
                            <input id="i_emp_number" autocomplete="off" readonly type="text" name="i_emp_number" required data-error="الاسم مطلوب"value="<?php echo $rec->i_emp_number; ?>">
                            <p class="error-block hidden with-errors"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_name_ar">الإسم عربي</label>
                            <input id="s_name_ar" autocomplete="off" type="text" name="s_name_ar" required data-error="الاسم مطلوب"value="<?php echo $rec->s_name_ar; ?>">
                            <p class="error-block hidden with-errors"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_name_en">الإسم إنجليزي</label>
                            <input id="s_name_en" autocomplete="off" type="text" name="s_name_en" value="<?php echo $rec->s_name_en; ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>
                </div>
                <div class="row">				                                
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_emp_ssn">رقم الهوية/ الجواز</label>
                            <input id="s_emp_ssn" autocomplete="off" type="text" name="s_emp_ssn" value="<?php echo $rec->s_emp_ssn; ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>			                               
                    <div class="col-xs-12 col-xl-6">
                     <div class="form-group floating-labels">
                        <label for="Sex">الجنس</label>
                        <select name="fk_i_gender_cd" class="c-select" id="Sex">
                            <option value=""></option>
                            <?php foreach($genderData as $row)
                            {?>
                            <option value="<?php echo $row->pk_i_id ?>" <?php echo  $rec->fk_i_gender_cd==$row->pk_i_id?"selected":"";?>><?php echo $row->s_name_ar ?></option>
                            <?php }?>
                        </select>
                        </div>		
                    </div>								                
                </div>
                <div class="row">
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="dt_dob_date">تاريخ الميلاد</label>
                            <input id="dt_dob_date" type="text" class="form-control date"  name="dt_dob_date" readonly="readonly" value="<?php echo $rec->dt_dob_date; ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_place_of_birth">مكان الميلاد</label>
                            <input id="s_place_of_birth" autocomplete="off" type="text" name="s_place_of_birth" value="<?php echo $rec->s_place_of_birth; ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_password">كلمة المرور</label>
                            <input id="s_password" autocomplete="off" type="password" name="s_password"  value="<?php echo $rec->s_password; ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-xl-6">
                        <div class="form-group floating-labels">
                            <label for="s_email">البريد الإلكتروني</label>
                            <input id="s_email" autocomplete="off" type="email" name="s_email" value="<?php echo $rec->s_email; ?>">
                            <p class="error-block hidden"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                                <div class="col-xs-12 col-xl-6">				                            
                                    <div class="form-group floating-labels">
                                        <label for="marital_status">الحالة الإجتماعية</label>
                                        <select name="fk_i_mstatus_cd" class="c-select" id="marital_status">
                                            <option value=""></option> 
                                            <?php foreach($mstatusData as $row)
                                            {?>
                                            <option value="<?php echo $row->pk_i_id ?>"<?php echo  $rec->fk_i_mstatus_cd==$row->pk_i_id?"selected":"";?>><?php echo $row->s_name_ar ?></option>
                                            <?php }?>
                                        </select>							                      
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-xl-6">				                            
                                    <div class="form-group floating-labels">
                                        <label for="marital_status">حالة الموظف</label>
                                        <select name="fk_i_emp_status" class="c-select" id="marital_status">
                                            <option value=""></option>
                                             <?php foreach($jstatusData as $row)
                                            {?>
                                            <option value="<?php echo $row->pk_i_id ?>"<?php echo  $rec->fk_i_emp_status==$row->pk_i_id?"selected":"";?>><?php echo $row->s_name_ar ?></option>
                                            <?php }?>
                                        </select>							                      
                                    </div>
                                </div>
                            </div>
                <div class="row">
                                <div class="col-xs-12 col-xl-6">				                            
                                    <div class="form-group floating-labels">
                                        <label for="marital_status">المدينة</label>
                                        <select name="fk_i_city_cd" class="c-select" id="marital_status">
                                            <option value=""></option>
                                             <?php foreach($cityData as $row)
                                            {?>
                                            <option value="<?php echo $row->pk_i_id ?>"<?php echo  $rec->fk_i_city_cd==$row->pk_i_id?"selected":"";?>><?php echo $row->s_name_ar ?></option>
                                            <?php }?>
                                        </select>							                      
                                    </div>
                                </div>
                                <div class="col-xs-12 col-xl-6">
                                    <div class="form-group floating-labels">
                                        <label for="s_address">العنوان</label>
                                        <input id="s_address" type="text" name="s_address" value="<?php echo $rec->s_address; ?>">
                                        <p class="error-block hidden"></p>
                                    </div>
                                </div>
                            </div>
                <div class="row">
                                <div class="col-xs-12 col-xl-6">
                                    <div class="form-group floating-labels">
                                        <label for="s_jawwal">جوال</label>
                                        <input id="s_jawwal" autocomplete="off" type="text" name="s_jawwal" value="<?php echo $rec->s_jawwal; ?>">
                                        <p class="error-block hidden"></p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-xl-6">
                                    <div class="form-group floating-labels">
                                        <label for="s_tel">هاتف</label>
                                        <input id="s_tel" autocomplete="off" type="text" name="s_tel" value="<?php echo $rec->s_tel; ?>">
                                        <p class="error-block hidden"></p>
                                    </div>
                                </div>
                            </div>
                <div class="row">
                                <div class="col-xs-12 col-xl-6">
                                    <div class="form-group floating-labels">
                                        <label for="fk_i_nationality_cd">الجنسية</label>
                                        <input id="fk_i_nationality_cd" autocomplete="off" type="text" name="fk_i_nationality_cd" value="<?php echo $rec->fk_i_nationality_cd; ?>">
                                        <p class="error-block hidden"></p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-xl-6">
                                    <h6 class="m-b-15 m-t-15">صورة شخصية </h6>
                                    <input id="s_emp_image" autocomplete="off" type="file" name="s_emp_image">
                                    <input id="s_emp_image1" autocomplete="off" type="hidden" name="s_emp_image1" value="<?php echo $rec->s_emp_image;?>">
                                    <?php if(strlen($rec->s_emp_image)>0){
                                        ?>
                                        <a href="<?php echo base_url()."uploads/".$rec->s_emp_image?>" target="_blank"><span class="fa fa-download"></span> </a>
                                    <?php
                                    }?>
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
				s_emp_ssn: {
					required: true,
					minlength: 5,
					maxlength: 9
				},
				fk_i_gender_cd: {
					required: true
				},
				dt_dob_date: {
					required: true
				},
				s_place_of_birth: {
					required: true,
					minlength: 3
				},
				s_password: {
					required: true,
					minlength: 8
				},
				s_email: {
					required: true,
					email: true
				},
				fk_i_mstatus_cd: {
					required: true,
				},
				fk_i_emp_status: {
					required: true,
				},
				fk_i_city_cd: {
					required: true,
				},
				s_address: {
					required: true,
					minlength: 5
				},
				s_jawwal: {
					required: true,
					minlength: 10,
					maxlength: 10
				},
				s_tel: {
					required: true,
					minlength: 9,
					maxlength: 9
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
				s_emp_ssn: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل لا يقل عن 5 حروف',
					maxlength: 'طول الحقل لا يزيد عن 9 حروف'
				},
				fk_i_gender_cd: {
					required: 'هذا الحقل مطلوب'
				},
				dt_dob_date: {
					required: 'هذا الحقل مطلوب'
				},
				s_place_of_birth: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل لا يقل عن 3 حروف'
				},
				s_password: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل لا يقل عن 8 حروف'
				},
				s_email: {
					required: 'هذا الحقل مطلوب',
					email: true
				},
				fk_i_mstatus_cd: {
					required: 'هذا الحقل مطلوب',
				},
				fk_i_emp_status: {
					required: 'هذا الحقل مطلوب',
				},
				fk_i_city_cd: {
					required: 'هذا الحقل مطلوب',
				},
				s_address: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل لا يقل عن 5 حروف'
				},
				s_jawwal: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل 10 حروف',
					maxlength: 'طول الحقل 10 حروف'
				},
				s_tel: {
					required: 'هذا الحقل مطلوب',
					minlength: 'طول الحقل 9 حروف',
					maxlength: 'طول الحقل 9 حروف'
				},
			},
			
			submitHandler: function() {
               // alert('Hi')
				$(".alert-info-outline").show();
				var formData = new FormData($("#EmpFrm")[0]);
				$.ajax({
					url: '<?php echo base_url() ?>UpdateEmployee',
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


    setTimeout(function() {
        $(".form-group.floating-labels").removeClass("is-empty");
    }, 500);
});
/*$(".forms-basic").on('submit', function(e) {
				$('.forms-basic .form-group.floating-labels label.error').parent().addClass('has-error');
				$('.forms-basic .form-group.floating-labels .error-block').hide();
			});*/
</script>