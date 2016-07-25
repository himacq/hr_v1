
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
            <!-- <h4 class="M-title"> صفحة المجموعات
            </h4>  -->
            <div class="portlet box green m-b-30">               
                <div class="portlet-title">
                    <div class="caption"><i class="icon-cogs"></i>مغادرة وعودة الموظف</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
               <div class="portlet-body">
                    <form class="form-horizontal" id="formData" method="post" onsubmit="return false;">
                        <div class="row">   
                            <div class="col-sm-5 col-sm-offset-1" >  
                                <!-- <div class="form-group floating-labels">
                                    <label for="marital_status">الموظف</label>
                                    <select name="fk_i_mstatus_cd" class="c-select" id="marital_status">
                                        <option value=""></option> 
                                        <?php for($i=1;$i<5;$i++)
                                        {?>
                                        <option value="<?php echo $i?>"><?php echo 'الموظف '.$i ?></option>
                                        <?php }?>
                                    </select>  
                                                                                   
                                </div> -->
                              <div class=" floating-labels M-select2-containe">
                                <h6 for="marital_status" class="M-labelTitle">الموظف</h6>
                                <select  name="fk_i_mstatus_cd" id="marital_status" class="M-select2 c-select" >
                                  <option value=""></option> 
                                    <?php for($i=1;$i<5;$i++)
                                    {?>
                                    <option value="<?php echo $i?>"><?php echo 'الموظف '.$i ?></option>
                                    <?php }?>
                                </select>                                             
                              </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-3 col-sm-offset-1">
                                <div class="form-group floating-labels">
                                    <label for="dt_dob_date">من</label>
                                    <input id="dt_dob_date" type="text" class="form-control date"  name="dt_dob_date" readonly="readonly">                                                      
                                    <p class="error-block hidden"></p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="form-group floating-labels">
                                    <label for="dt_dob_date">إلى</label>
                                    <input id="dt_dob_date" type="text" class="form-control date"  name="dt_dob_date" readonly="readonly">                                                      
                                    <p class="error-block hidden"></p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3" style="padding-top: 35px;">                                
                                <label class="c-input c-checkbox" >
                                    <input type="checkbox" id="backReasonInput"><span class="c-indicator c-indicator-success"></span>  <span class="c-input-text"> مغادرة نهائية </span> 
                                </label>                               
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-sm-5 col-sm-offset-1" >
                                <div class="form-group floating-labels">
                                    <label for="s_name_en">سبب المغادرة</label>
                                    <input id="s_name_en"  type="text" name="s_name_en">
                                </div>
                            </div>
                            <div class="col-sm-5 backReason" >  
                                <div class="form-group floating-labels">
                                    <label for="s_name_en">سبب العودة</label>
                                    <input id="s_name_en"  type="text" name="s_name_en">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-sm-5 col-sm-offset-1 backReasonStatus" >  
                                <div class="form-group floating-labels">
                                    <label for="marital_status">حالة العودة</label>
                                    <select name="fk_i_mstatus_cd" class="c-select" id="marital_status">
                                        <option value=""></option> 
                                        <?php for($i=1;$i<5;$i++)
                                        {?>
                                        <option value="<?php echo $i?>"><?php echo 'option '.$i ?></option>
                                        <?php }?>
                                    </select>                                                 
                                </div>
                            </div>
                            
                        </div>
                        
                         <div class="form-group row m-t-15">
                            <div class=" col-sm-12 text-center">
                                <button type="submit" class="btn btn-success M-success-btn">حفظ</button>
                            </div>
                        </div> 
                    </form>
               </div>
            </div>
        </div>
      
    </div>
    
    

    <div class="row m-b-20">
        <div class="col-xs-12">
            <h4 class="m-b-20">حركة المغادرة والعودة</h4>
           <table id="example-1" class="table table-hover table-striped table-bordered M-table1" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>من</th>
                        <th>إلى</th>
                        <th>مغادرة نهائية</th>
                        <th>سبب المغادرة</th>
                        <th>سبب العودة</th>
                        <th>حالة العودة</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody id="TableCntnt">
                       <?php for($i=0;$i<6;$i++){?>                     
                    <tr id="tr<?php echo $i ?>">
                        <td><?php echo $i ?></td>
                        <td><?php echo '01-01-2222 ' ?></td>
                        <td><?php echo '01-01-2222 ' ?></td>
                        <td><?php echo 'لا ' ?></td>
                        <td><?php echo 'سبب المغادرة '.$i ?></td>
                        <td><?php echo 'سبب العودة '.$i ?></td>
                        <td><?php echo 'حالة العودة '.$i ?></td>
                        <td>
                          <a class="btn btn-danger delBtn" id="<?php echo $i?>">
                            <span class="fa fa-remove"></span>
                          </a>
                          <a class="btn btn-warning editBtn" id="<?php echo $i ?>">
                            <span class="fa fa-edit"></span>
                          </a>
                          <?php if( ($i % 2) == 0){ ?>
                          <a class="btn btn-info disableBtn" id="<?php echo $i ?>">
                          <?php }else{ ?>
                          <a class="btn btn-success disableBtn" id="<?php echo $i ?>">
                          <?php } ?>
                            <span class="fa fa-ban"></span>
                          </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script>
$(document).ready(function(){
    
    
        $("#formData").validate({
            rules: {
                s_name_ar: {
                    required: true,
                    minlength: 3
                },
                s_name_en: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                s_name_ar: {
                    required: 'الحقل مطلوب',
                    minlength: 'يجب إدخال 3 حروف على الأقل'
                },
                s_name_en: {
                    required: 'الحقل مطلوب',
                    minlength: 'يجب إدخال 3 حروف على الأقل'
                }
            },
            
            submitHandler: function() {
                $(".alert-info-outline").show();
                var formData = new FormData($("#formData")[0]);
                $.ajax({
                    url: '<?php echo base_url() ?>AddConstantDet',
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
                                +'<td>'+$("#s_name_ar").val()+'</td>'
                                +'<td>'+$("#s_name_en").val()+'</td>'
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

    setTimeout(function() {
        // $(".form-group.floating-labels").removeClass("is-empty");
        $(".form-group.floating-labels").each(function() {
          var val = $(this).find('input').val();
          var val2 = $(this).find('select').val();

            //is-empty
            if (val || val2) {
                $(this).removeClass('is-empty');
            }
        });
    }, 500);
    $("#backReasonInput").on('change',function(){
        if($(this).is(':checked'))
        $(".backReason , .backReasonStatus").hide();  // checked
    else
        $(".backReason , .backReasonStatus").show();  // unchecked
    });
    
    
});
/*$(".forms-basic").on('submit', function(e) {
                $('.forms-basic .form-group.floating-labels label.error').parent().addClass('has-error');
                $('.forms-basic .form-group.floating-labels .error-block').hide();
            });*/
</script>              

                