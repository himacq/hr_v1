
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
            <h4 class="M-title"> التحكم بمجموعات العمل</h4>
        </div>
    </div>
    <div class="row m-b-30">
        <div class="col-xs-12 col-xl-12">
            <form class="form-horizontal" id="formData" method="post" onsubmit="return false;">
                <div class="row">	
                    <div class="col-sm-5" >
                        <div class="form-group floating-labels">
                            <label for="s_name">الإسم عربي</label>
                            <input id="s_name" type="text" name="s_name">
                        </div>
                    </div>

                </div>
                 <div class="form-group row">
                    <div class="col-sm-offset-1 col-sm-10" align="center">
                        <button type="submit" class="btn btn-success">حفظ</button>
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
        <h4 class="m-b-20">قائمة مجموعات العمل</h4>
       <table id="example-1" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المجموعة </th>
                    <th>تفاصيل</th>
                </tr>
            </thead>
           	<tbody id="TableCntnt">
                   <?php foreach($workgroupData as $row){?>
            	<tr>
                    <td><?php echo $row->pk_i_id ?></td>
                    <td><?php echo $row->s_name ?></td>
                    <td>
						<a href="getWorkGroupDetails/<?php echo $row->pk_i_id ?>">
                        	<span class="fa fa-list-ul"></span>
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
				s_name: {
					required: true,
					minlength: 3
				},
			},
			messages: {
				s_name: {
					required: 'الحقل مطلوب',
					minlength: 'يجب إدخال 3 حروف على الأقل'
				},
			},
			
			submitHandler: function() {
				$(".alert-info-outline").show();
				var formData = new FormData($("#formData")[0]);
				$.ajax({
					url: '<?php echo base_url() ?>AddWorkGroup',
					type: 'POST',
					data: formData,
					dataType:"json",
					async: false,
					success: function (data) {
						if(data.status.success){	
							$(".alert-danger-outline").hide();
							$(".alert-success-outline").show();
							$("#successMsg").text(data.status.msg)
							$("#TableCntnt").append('<tr>'
								+'<td>'+data.id+'</td>'
								+'<td>'+$("#s_name").val()+'</td>'
								+'<td>'
									+'<a href="getWorkGroupDetails/'+data.id+'">'
										+'<span class="fa fa-list-ul"></span>'
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

	$("#formData").on('submit',function(){
		
	});
	
	
});
/*$(".forms-basic").on('submit', function(e) {
				$('.forms-basic .form-group.floating-labels label.error').parent().addClass('has-error');
				$('.forms-basic .form-group.floating-labels .error-block').hide();
			});*/
</script>              

				