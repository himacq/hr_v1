
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
            <div class="portlet box blue m-b-30">               
                <div class="portlet-title">
                    <div class="caption"><i class="icon-cogs"></i>الإجازات السنوية</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
               <div class="portlet-body">
                    <form class="form-horizontal" id="formData" method="post" onsubmit="return false;">
                        <div class="row">   
                            <div class="col-sm-6 col-sm-offset-1" >
                                <div class="form-group floating-labels">
                                    <label for="s_year">العام</label>
                                    <input id="s_year" type="text" name="s_year" value="2016">
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

                        </div>
                        <div class="row">   
                            <div class="col-sm-6 col-sm-offset-1" >  
                                <div class="form-group floating-labels">
                                    <label for="marital_status">نوع الإجازة</label>
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
                            <div class=" col-sm-10 col-sm-offset-1">
                                <button type="submit" class="btn btn-success M-success-btn">حفظ</button>
                            </div>
                        </div> 
                    </form>
               </div>
            </div>
        </div>
        <div class="col-xs-12 col-xl-6 " style="display: none;">
            <!-- BEGIN POPOVERS PORTLET-->            
            <div class="portlet box green">
              <div class="portlet-title">
                 <div class="caption"><i class="icon-cogs"></i>Panels</div>
                 <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                 </div>
              </div>
              <div class="portlet-body">
                 <h4 class="block">Basic Panels</h4>
                 <div class="panel panel-default">
                    <div class="panel-heading">Panel heading without title</div>
                    <div class="panel-body">
                       Panel content
                    </div>
                 </div>
                 <div class="panel panel-default">
                    <div class="panel-heading">
                       <h3 class="panel-title">Panel title</h3>
                    </div>
                    <div class="panel-body">
                       Panel content
                    </div>
                 </div>
                 <div class="panel panel-default">
                    <div class="panel-body">
                       Panel content
                    </div>
                    <div class="panel-footer">Panel footer</div>
                 </div>
                 <div class="clearfix">
                    <h4 class="block">Contextual Panels</h4>
                    <div class="panel panel-default">
                       <div class="panel-heading">
                          <h3 class="panel-title">Primary Panel</h3>
                       </div>
                       <div class="panel-body">
                          Panel content
                       </div>
                    </div>
                    <div class="panel panel-primary">
                       <div class="panel-heading">
                          <h3 class="panel-title">Primary Panel</h3>
                       </div>
                       <div class="panel-body">
                          Panel content
                       </div>
                    </div>
                    <div class="panel panel-success">
                       <div class="panel-heading">
                          <h3 class="panel-title">Success Panel</h3>
                       </div>
                       <div class="panel-body">
                          Panel content
                       </div>
                    </div>
                    <div class="panel panel-info">
                       <div class="panel-heading">
                          <h3 class="panel-title">Info Panel</h3>
                       </div>
                       <div class="panel-body">
                          Panel content
                       </div>
                    </div>
                    <div class="panel panel-warning">
                       <div class="panel-heading">
                          <h3 class="panel-title">Warning Panel</h3>
                       </div>
                       <div class="panel-body">
                          Panel content
                       </div>
                    </div>
                    <div class="panel panel-danger">
                       <div class="panel-heading">
                          <h3 class="panel-title">Danger Panel</h3>
                       </div>
                       <div class="panel-body">
                          Panel content
                       </div>
                    </div>
                 </div>
                 <div class="clearfix">
                    <h4 class="block">With Tables</h4>
                    <div class="panel panel-success">
                       <!-- Default panel contents -->
                       <div class="panel-heading">
                          <h3 class="panel-title">Panel Title</h3>
                       </div>
                       <div class="panel-body">
                          <p>Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                       </div>
                       <!-- Table -->
                       <table class="table">
                          <thead>
                             <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                             </tr>
                          </thead>
                          <tbody>
                             <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                             </tr>
                             <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                             </tr>
                             <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                             </tr>
                          </tbody>
                       </table>
                    </div>
                 </div>
                 <div class="clearfix">
                    <h4 class="block">With List Groups</h4>
                    <div class="panel panel-warning">
                       <!-- Default panel contents -->
                       <div class="panel-heading">
                          <h3 class="panel-title">Panel Title</h3>
                       </div>
                       <div class="panel-body">
                          <p>Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                       </div>
                       <!-- List group -->
                       <ul class="list-group">
                          <li class="list-group-item">Cras justo odio <span class="badge badge-default">3</span></li>
                          <li class="list-group-item">Dapibus ac facilisis in <span class="badge badge-success">11</span></li>
                          <li class="list-group-item">Morbi leo risus <span class="badge badge-danger">new</span></li>
                          <li class="list-group-item">Porta ac consectetur ac <span class="badge badge-warning">4</span></li>
                          <li class="list-group-item">Vestibulum at eros <span class="badge badge-info">3</span></li>
                          <li class="list-group-item">Vestibulum at eros</li>
                       </ul>
                    </div>
                 </div>
              </div>
            </div>
        </div>
    </div>

    <div class="row m-b-20">
        <div class="col-xs-12">
            <h4 class="m-b-20">الإجازات السنوية</h4>
           <table id="example-1" class="table table-hover table-bordered M-table1" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>السنة</th>
                        <th>من</th>
                        <th>إلى</th>
                        <th>نوع الإجازة</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody id="TableCntnt">
                       <?php for($i=0;$i<6;$i++){?> 
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo '2016'?></td>
                        <td><?php echo '01-01-2016'?></td>
                        <td><?php echo '01-06-2016'?></td>
                        <td><?php echo 'إجازة '.$i ?></td>
                        <td>
                          <a class="btn btn-danger delBtn" id="<?php echo $i?>">
                            <span class="fa fa-remove"></span>
                          </a>
                          <?php if( ($i % 2) == 0){ ?>
                          <a class="btn btn-info disableBtn" id="<?php echo $i ?>">
                          <?php }else{ ?>
                          <a class="btn btn-success disableBtn" id="<?php echo $i ?>">
                          <?php } ?>
                            <span class="fa fa-ban"></span>
                          </a>
                        </td>
                    </tr><?php } ?>
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
    
});
/*$(".forms-basic").on('submit', function(e) {
                $('.forms-basic .form-group.floating-labels label.error').parent().addClass('has-error');
                $('.forms-basic .form-group.floating-labels .error-block').hide();
            });*/
</script>              

                