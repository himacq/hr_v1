
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
            <h4 class="M-title"> مجموعات جهات الاتصال </h4> 
        </div>
    </div>
    <div class="row m-b-30">
        <div class="col-xs-12 col-xl-12">
            <form class="form-horizontal" id="formData" method="post" onsubmit="return false;">
                <div class="row">	
                    <div class="col-sm-5" >
                        <div class="form-group floating-labels">
                            <label for="s_name_ar">اسم المجموعة </label>
                            <input id="name" type="text" name="name">
                            <input type="hidden" name="group_id" id="group_id" />

                        </div>
                    </div>
                    <div class="col-sm-5">
						<div class="form-group floating-labels">
                          <label class="c-input c-checkbox">
                              <input type="checkbox" id="published" name="published" value="1">
            <span class="c-indicator c-indicator-warning"></span>  <span class="c-input-text"> متاحة للجميع </span> 
        </label>
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

<div class="row m-b-20">
    <div class="col-xs-12">
        <h4 class="m-b-20">قائمة المجموعات</h4>
       <table id="example-1" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المجموعة</th>
                    <th>متاحة للجميع</th>
                    <th>التحكم</th>
                </tr>
            </thead>
           	<tbody id="TableCntnt">
                   <?php 
                   foreach($groups as $row){?> 
            	<tr id="tr<?php echo $row->group_id ?>">
                    <td><?php echo $row->group_id ?></td>
                    <td><?php echo $row->group_name ?></td>
                    <td><?php echo ($row->published?"متاحة":"غير متاحة"); ?></td>
                    <td>
						<a class="btn btn-danger delBtn" id="<?php echo $row->group_id ?>">
                        	<span class="fa fa-remove"></span>
                        </a>
						<a class="btn btn-warning editBtn" id="<?php echo $row->group_id ?>">
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
				
			},
			messages: {
				name: {
					required: 'الحقل مطلوب',
					minlength: 'يجب إدخال 3 حروف على الأقل'
				},
				
			},
			
			submitHandler: function() {
				$(".alert-info-outline").show();
				var formData = new FormData($("#formData")[0]);
				$.ajax({
					url: '<?php echo base_url() ?>AddSmsGroup',
					type: 'POST',
					data: formData,
					dataType:"json",
					async: false,
					success: function (data) {
						if(data.status.success){
                                                    var published="غير متاحة";
                                                    if($("#published").is(':checked'))
                                                        published="متاحة";
							$(".alert-danger-outline").hide();
							$(".alert-success-outline").show();
							$("#successMsg").text(data.status.msg)
							$("#TableCntnt").append('<tr id="tr'+data.id+'">'
								+'<td>'+data.id+'</td>'
								+'<td>'+$("#name").val()+'</td>'
                                                                +'<td>'+published+'</td>'
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
					url: '<?php echo base_url() ?>GetSmsGroup/'+$(this).attr('id'),
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
							$("#name").val(data.groupData[0].group_name)
							
                                                        if(data.groupData[0].published==1)
                                                            $("#published").prop('checked', true);
                                                        else
                                                             $("#published").prop('checked', false);
                                                        
							$("#group_id").val(data.groupData[0].group_id)
							
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
					url: '<?php echo base_url() ?>UpdateSmsGroup',
					type: 'POST',
					data: formData,
					dataType:"json",
					async: false,
					success: function (data) {
						if(data.status.success){
                                                    var published="غير متاحة";
                                                    if($("#published").is(':checked'))
                                                        published="متاحة";
                                                    
							$(".alert-danger-outline").hide();
							$(".alert-success-outline").show();
							$("#save").show();
							$("#update").hide();
							$("#successMsg").text(data.status.msg);
							console.log("tr"+$("#id").val())
							$("#tr"+$("#group_id").val()).children().first().html($("#group_id").val());
							$("#tr"+$("#group_id").val()).children().first().next().html($("#name").val());

							$("#tr"+$("#group_id").val()).children().first().next().next().html(published);
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
		$(".alert-info-outline").show();
		
		$.ajax({
			url: '<?php echo base_url() ?>DeleteSmsGroup/'+id,
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

				