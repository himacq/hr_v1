<style>
	.tree ul,li{
		list-style-type:none;
	}
	.tree div,i{
		padding-left:20px;
	}
i,span{
 cursor:pointer;
}
</style>
<div class="row">
				<div class="col-md-12">
					<div class="portlet red-pink box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>هيكلية المؤسسة
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
                       
							<div id="tree" class="tree-demo">
                             <ul><?php foreach($archData as $row){?>
                                  <li>
                                  	<i class="fa fa-plus-square" id="<?php echo $row['pk_i_id'] ?>"></i>
								  	<a ><?php echo $row['s_name_ar'] ?></a> 
                                  <span class="fa fa-plus" id="add" title="إضافة فرع" onclick="addItem(<?php echo $row['pk_i_id'] ?>)"> </span>
                                  <span class="fa fa-edit" id="edit" title="تعديل" onclick="edit(<?php echo $row['pk_i_id'] ?>)"> </span>
                                  <span class="fa fa-remove" id="del" title="حذف" onclick="del(<?php echo $row['pk_i_id'] ?>)" style="display:none"> </span>                               	 
                                  </li>
                                <?php }?>
							</ul>
							</div>
							
						</div>
					</div>
				</div>
				 
                                
			</div>
            
  <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="post" enctype="multipart/form-data" id="AddSubCat">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">فرع جديد</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-body">
                
                <div class="form-group">
                   <div class="row">	
                    <div class="col-sm-5" >
                        <div class="form-group floating-labels">
                            <label for="s_name_ar">الإسم عربي</label>
                            <input id="s_name_ar" type="text" name="s_name_ar">
                          <input type="hidden" name="pk_i_id" id="pk_i_id" />
                          <input type="hidden" name="fk_i_parent_id" id="fk_i_parent_id" />
                        </div>
                    </div>
                    <div class="col-sm-5">
						<div class="form-group floating-labels">
                            <label for="s_name_en">الإسم إنجليزي</label>
                            <input id="s_name_en"  type="text" name="s_name_en">
                        </div>
                    </div>
                    <div class="col-sm-5">
						<div class="form-group floating-labels">
                            <label for="s_name_en">نوع الفرع</label>
                            <select id="fk_i_type_id" name="fk_i_type_id">
                            <?php foreach($constantDetData as $row){?>
                            	<option value="<?php echo $row->pk_i_id; ?>"><?php echo $row->s_name_ar; ?></option>
                            <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
              </div>
              </div>
              
              
            <div class="modal-footer">
                <button type="submit" id="SaveCaegory" class="btn btn-success">حفظ</button>
                <button type="button" id="EditCategory" class="btn btn-info" style="display:none">تعديل</button>
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">لا</button>
            </div>
               
            </div>
        </form>
      </div>
    </div>
  </div>          
            
<script>

function addItem(id){
	$("#fk_i_parent_id").val(id); 
	document.getElementById("AddSubCat").reset();
	 $(".form-group.floating-labels").removeClass("is-empty");
	$("#addModal").modal('show');
	$("#SaveCaegory").show();
	$("#EditCategory").hide();
	//$('.modal-content').css('width','800');
}
function edit(id){
	document.getElementById("AddSubCat").reset();
	dataString = {'id':id};
	$.ajax({
        url: '<?php echo base_url() ?>GetSingleArch',
        type: 'POST',
		data:  dataString,
		dataType:'json',
        success: function (response) {
			if(response['data'].length>0){
				$("#pk_i_id").val(response['data'][0].pk_i_id);
				$("#s_name_ar").val(response['data'][0].s_name_ar);
				$("#s_name_en").val(response['data'][0].s_name_en);	
				$("#fk_i_parent_id").val(response['data'][0].fk_i_parent_id);		
				$("#fk_i_type_id").val(response['data'][0].fk_i_type_id);
				$("#SaveCaegory").hide();
				$("#EditCategory").show();
				$("#addModal").modal('show');	
				 $(".form-group.floating-labels").removeClass("is-empty");
			}
			else{
            
			}
        }
    });
	return false;
}

function del(id){
	 dataString = {'id':id};
	$.ajax({
        url: '<?php echo base_url() ?>DelStage',
        type: 'POST',
		data:  dataString,
		dataType:'json',
        success: function (response) {
				if(response>0){
					$("#"+id).parent().hide();
				}
				else{
					alert('يوجد بيانات مرتبطة بهذه المرحلة')
				}
        }
    });
	return false;
}
$(document).ready(function(){
	$("#AddSubCat").submit(function(){

    var formData = new FormData($(this)[0]);
	$("#Loader").show();
    $.ajax({
        url: '<?php echo base_url() ?>AddArch',
        type: 'POST',
        data: formData,
		dataType:"json",
        async: false,
        success: function (data) {
			if(data.status.success){	
				$(".alert-danger-outline").hide();
				$(".alert-success-outline").show();
				$("#successMsg").text(data.status.msg)
				setTimeout(function(){
					$("#addModal").modal('hide');
				}, 2000);
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
	$("#Loader").hide();
    return false;});
	$("#EditCategory").click(function(){

	$("#Loader").show();
    var formData = new FormData($("#AddSubCat")[0]);

    $.ajax({
        url: '<?php echo base_url() ?>UpdateArch',
        type: 'POST',
        data: formData,
		dataType:"json",
        async: false,
        success: function (data) {
			if(data.status.success){	
				$(".alert-danger-outline").hide();
				$(".alert-success-outline").show();
				$("#successMsg").text(data.status.msg)
				setTimeout(function(){
					$("#addModal").modal('hide');
				}, 2000);
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
	$("#Loader").hide();

    return false;});

	$("#tree i").on('click',function(){
		var ctrl=$(this);
		if(ctrl.siblings().length==4){
			getChildren(ctrl.attr('id'));
		}
		else{
			$(".childs"+ctrl.attr('id')).toggle();
		}
		return false;
	});
	
});

function getChildren(parent){
	$.ajax({
        url: '<?php echo base_url() ?>GetArchChild/'+parent,
        type: 'POST',
		dataType:'json',
        success: function (response) {
			if(response['data'].length>0){
				var ctlr=$("#"+parent).parent();
				ul='<ul class="childs'+parent+'">'
				for(i=0;i<response['data'].length;i++)
				{
					ul+='<li> <i class="fa fa-plus-square" id="'+response['data'][i]["pk_i_id"]+'"></i> <a >'+response['data'][i]["s_name_ar"]+'</a><span class="fa fa-plus" id="add" title="إضافة فرع" onclick="addItem('+response['data'][i]["pk_i_id"]+')"> </span><span class="fa fa-edit" id="edit" title="تعديل" onclick="edit('+response['data'][i]["pk_i_id"]+')"> </span> <span class="fa fa-remove" id="del" title="حذف" onclick="del('+response['data'][i]["pk_i_id"]+')" style="display:none"> </span>                               	   </li>';
				}
				ul+='</ul>'
				$(ctlr).append(ul);
				
			}
			else
			{
				alert('لا يوجد تصنيفات فرعية');
			}
        }
    });
	return false;

}
</script>