
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
            <h4 class="M-title"> اضافة افراد جهات الاتصال</h4> 
        </div>
    </div>
    <div class="row m-b-30">
        <div class="col-xs-12 col-xl-12">
            <form class="form-horizontal" id="formData" method="post" onsubmit="return false;">
                <div class="row">	
                    <div class="col-sm-5" >
                        <div class="form-group floating-labels">
                            <label for="s_name_ar">الاسم  </label>
                            <input id="name" type="text" name="name">
<input type="hidden" name="member_id" id="member_id" />
                        </div>
                    </div>
                    <div class="col-sm-5" >
                        <div class="form-group floating-labels">
                            <label for="s_name_ar">رقم الجوال  </label>
                            <input id="mobile" type="text" name="mobile">

                        </div>
                    </div>
                    <div class="col-sm-5" >
                        <div class="form-group floating-labels">
                            <select id="group_id" name="group_id">
               <option value="0">المجموعة</option>          

                                <?php 
                   foreach($myGroups as $row){?> 
                                <option value="<?php echo $row->group_id ?>"><?php echo $row->group_name ?></option>          
                   <?php } ?>
                            </select>

                        </div>
                    </div>

                </div>
                 <div class="form-group row">
                    <div class="col-sm-offset-1 col-sm-10" align="center">
                        <button type="submit" class="btn btn-success" id="save">حفظ</button>
                        <button type="button" class="btn btn-info" id="update" style="display:none">تعديل</button>
                    </div>
                </div> 
            </form>
        </div>
        
    </div>
    <div class="row m-b-20">
    </div>
</div>


<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
            <h4 class="M-title"> استيراد افراد جهات الاتصال</h4> 
        </div>
    </div>
    <div class="row m-b-30">
        <div class="col-xs-12 col-xl-12">
            <form class="form-horizontal"  enctype="multipart/form-data" id="formData2" method="post" action="<?php echo base_url() ?>/SmsUploadContacts" >
                <div class="row">	
                    <div class="col-sm-5" >
                        <div class="form-group floating-labels">
                            <div class="col-md-9">
                                               
                                       
                                                   
                                             <span class="help-block error_msg30" style="font-family: Tahoma !important; font-size: 13px;"> 
                                                يجب أن يكون الملف المراد رفعه بامتداد  .xls ويتكون من الحقول التالية بالترتيب : رقم الجوال  - الإسم كامل.
                                            </span>
                                            <span class="help-block error_msg30" style="font-family: Tahoma !important; font-size: 13px;"> 
                                                يجب تعبئة رقم الجوال كاملا بمقدمة 059000000 او بمقدمة الدولة 972590000000
                                            </span>
                                           <span class="help-block error_msg30" style="font-family: Tahoma !important; font-size: 13px;"> 
                                                يمكنك استخدام ملف النموذج المرفق لاستخدامه لاستيراد جهات الاتصال  <a href="/template.xls"> ملف النموذج </a>
                                            </span>
                                            <br>
                                            
                                             <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-group">
                                                <span class="btn default btn-file">
                                                    <input type="file" name="userfile" class="default " id="file2upload">
                                                </span>
<!--                                                <input id="upload_btn" type="submit"  class="btn purple default "  value="تحميل المف"  />-->
                                            </div>
                                        </div>
                                        </div>
                        </div>
                    </div>

                    <div class="col-sm-5" >
                        <div class="form-group floating-labels">
                            <select id="excel_group_id" name="excel_group_id">
               <option value="0">المجموعة</option>          

                                <?php 
                   foreach($myGroups as $row){?> 
                                <option value="<?php echo $row->group_id ?>"><?php echo $row->group_name ?></option>          
                   <?php } ?>
                            </select>

                        </div>
                    </div>

                </div>
                 <div class="form-group row">
                    <div class="col-sm-offset-1 col-sm-10" align="center">
                        <button type="submit" class="btn btn-success" id="save_excel">تحميل</button>
                    </div>
                </div> 
            </form>
        </div>
        
    </div>
    <div class="row m-b-20">
    </div>
</div>

<div class="row m-b-20">
    <div class="col-xs-12">
        <h4 class="m-b-20">قائمة افراد المجموعات</h4>
       <table id="example-1" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم </th>
                    <th>رقم الجوال </th>
                    <th>المجموعة</th>
                    <th>التحكم</th>
                </tr>
            </thead>
           	<tbody id="TableCntnt">
                   <?php 
                  
                   foreach($groupMembers as $row){ ?> 
            	<tr id="tr<?php echo $row->member_id ?>">
                    <td><?php echo $row->member_id ?></td>
                    <td><?php echo $row->member_name ?></td>
                    <td><?php echo $row->member_mobile ?></td>
                    <td><?php echo $row->group_name ?></td>
                    <td>
						<a class="btn btn-danger delBtn" id="<?php echo $row->member_id ?>">
                        	<span class="fa fa-remove"></span>
                        </a>
						<a class="btn btn-warning editBtn" id="<?php echo $row->member_id ?>">
                        	<span class="fa fa-edit"></span>
                        </a>
                    </td>
                </tr><?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script>
$(document).ready(function(){
	
	
		$("#formData").validate({
			rules: {
				name: {
					required: true,
					minlength: 3
				},
                                mobile: {
					required: true,
					minlength: 10,
                                        maxlength: 10,
                                        number:true
				},
				
			},
			messages: {
				name: {
					required: 'الحقل مطلوب',
					minlength: 'يجب إدخال 3 حروف على الأقل'
				},
                                mobile: {
					required: 'الحقل مطلوب',
					minlength: 'يجب إدخال رقم الجوال بصيغة 059XXXXXXX',
                                        maxlength: 'يجب إدخال رقم الجوال بصيغة 059XXXXXXX',
                                        number: 'يجب إدخال رقم الجوال بصيغة 059XXXXXXX',
                                        
				},
				
			},
			
			submitHandler: function() {
				$(".alert-info-outline").show();
				var formData = new FormData($("#formData")[0]);
				$.ajax({
					url: '<?php echo base_url() ?>AddSmsContact',
					type: 'POST',
					data: formData,
					dataType:"json",
					async: false,
					success: function (data) {
						if(data.status.success){
							$(".alert-danger-outline").hide();
							$(".alert-success-outline").show();
							$("#successMsg").text(data.status.msg)
							$("#TableCntnt").append('<tr id="tr'+data.id+'">'
								+'<td>'+data.id+'</td>'
								+'<td>'+$("#name").val()+'</td>'
                                                                +'<td>'+$("#mobile").val()+'</td>'
                                                                +'<td>'+$('#group_id option:selected').text()+'</td>'
								+'<td>'
									+'<a class="btn btn-danger delBtn" id="'+data.id+'">'
										+'<span class="fa fa-remove"></span>'
									+'</a>'
									+'<a class="btn btn-warning editBtn" id="'+data.id+'">'
										+'<span class="fa fa-edit"></span>'
									+'</a>'
								+'</td>'
							+'</tr>')
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

       
        
        $(".editBtn").on('click',function(){
		$(".alert-info-outline").show();
				$.ajax({
					url: '<?php echo base_url() ?>GetSmsContact/'+$(this).attr('id'),
					type: 'POST',
					dataType:"json",
					async: false,
					success: function (data) {
						if(data.status.success){	
							$(".alert-danger-outline").hide();
							$(".alert-success-outline").show();
							$("#save").hide();
							$("#update").show();
							$(".form-group.floating-labels").removeClass("is-empty");
							$("#successMsg").text(data.status.msg);
							$("#name").val(data.contactData[0].member_name)
                                                        $("#mobile").val(data.contactData[0].member_mobile)
                                                        $("#group_id").val(data.contactData[0].group_id)
                                                                                                                
							$("#member_id").val(data.contactData[0].member_id)
							
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
		
	});
	
	$("#update").on('click',function(){
		$(".alert-info-outline").show();
				var formData = new FormData($("#formData")[0]);
				$.ajax({
					url: '<?php echo base_url() ?>UpdateSmsContact',
					type: 'POST',
					data: formData,
					dataType:"json",
					async: false,
					success: function (data) {
						if(data.status.success){
                                                                                                      
							$(".alert-danger-outline").hide();
							$(".alert-success-outline").show();
							$("#save").show();
							$("#update").hide();
							$("#successMsg").text(data.status.msg);
							$("#tr"+$("#member_id").val()).children().first().html($("#member_id").val());
							$("#tr"+$("#member_id").val()).children().first().next().html($("#name").val());
                                                        $("#tr"+$("#member_id").val()).children().first().next().next().html($("#mobile").val());
                                                        $("#tr"+$("#member_id").val()).children().first().next().next().next().html($('#group_id option:selected').text());
							$("#name").val('')
			
							
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
		
	});
	
	
});
/*$(".forms-basic").on('submit', function(e) {
				$('.forms-basic .form-group.floating-labels label.error').parent().addClass('has-error');
				$('.forms-basic .form-group.floating-labels .error-block').hide();
			});*/
			
	function DelFunction(id){

		$.ajax({
			url: '<?php echo base_url() ?>DeleteSmsContact/'+id,
					type: 'POST',
					dataType:"json",
					async: false,
			success: function (data) {
				if(data.status.success){	
					$(".alert-danger-outline").hide();
					$(".alert-success-outline").show();
					$("#successMsg").text(data.status.msg);
					$("#tr"+id).fadeOut();
					$("#tr"+id).remove();
					
				}
				else {
					$(".alert-success-outline").hide();
					$(".alert-danger-outline").show();
					$("#dangerMsg").text(data.status.msg)
				}
			}
		});
		$(".alert-info-outline").hide();
	}
</script>              

				