
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
            <div class="portlet box green m-b-30">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-cogs"></i>تسكين موظف</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="form-horizontal" id="formData" method="post" onsubmit="return false;">
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1" >
                                <div class="form-group floating-labels">
                                    <label for="marital_status">المسمى الوظيفي</label>
                                    <select name="fk_i_mstatus_cd" class="c-select" id="marital_status">
                                        <option value=""></option>
                                        <?php for($i=1;$i<5;$i++)
                                        {?>
                                            <option value="<?php echo $i?>"><?php echo 'option '.$i ?></option>
                                        <?php }?>
                                        <option value="<?php echo '6'?>" selected><?php echo 'option 6'; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5 " >
                                <div class="form-group floating-labels">
                                    <label for="marital_status">فرع الشركة</label>
                                    <select name="fk_i_mstatus_cd" class="c-select" id="marital_status">
                                        <option value=""></option>
                                        <?php for($i=1;$i<5;$i++)
                                        {?>
                                            <option value="<?php echo $i?>"><?php echo 'الشركة '.$i ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1" >
                                <div class="form-group floating-labels">
                                    <label for="marital_status">نوع العقد</label>
                                    <select name="fk_i_mstatus_cd" class="c-select" id="marital_status">
                                        <option value=""></option>
                                        <?php for($i=1;$i<5;$i++)
                                        {?>
                                            <option value="<?php echo $i?>"><?php echo 'option '.$i ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5 " >
                                <div class="form-group floating-labels">
                                    <label for="marital_status">الدائرة</label>
                                    <select name="fk_i_mstatus_cd" class="c-select" id="marital_status">
                                        <option value=""></option>
                                        <?php for($i=1;$i<5;$i++)
                                        {?>
                                            <option value="<?php echo $i?>"><?php echo 'الشركة '.$i ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1" >
                                <div class="form-group floating-labels">
                                    <label for="marital_status">القسم</label>
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
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1" >
                                <div class="form-group floating-labels">
                                    <label for="dt_dob_date">تاريخ التعيين</label>
                                    <input id="dt_dob_date" type="text" class="form-control date"  name="dt_dob_date" readonly="readonly">
                                    <p class="error-block hidden"></p>
                                </div>
                            </div>
                            <div class="col-sm-5 " >
                                <div class=" floating-labels M-select2-containe">
                                    <h6 for="marital_status" class="M-labelTitle">المدير المباشر</h6>
                                    <select  name="fk_i_mstatus_cd" id="marital_status" class="M-select2 c-select" >
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1" >
                                <div class="form-group floating-labels">
                                    <label for="s_name_ar">رقم الإعلان / المسابقة</label>
                                    <input id="s_name_ar" type="text" name="s_name_ar">
                                    <input id="pk_i_id" name="pk_i_id" type="hidden" value="<?php echo $constantData[0]->pk_i_id; ?>" />
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group floating-labels">
                                    <label for="marital_status">مجموعة العمل</label>
                                    <select name="fk_i_mstatus_cd" class="c-select" id="marital_status">
                                        <option value=""></option>
                                        <?php for($i=1;$i<5;$i++)
                                        {?>
                                            <option value="<?php echo $i?>"><?php echo 'الشركة '.$i ?></option>
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
            <h4 class="m-b-20">حركة تسكين الموظف</h4>
            <table id="example-1" class="table table-hover table-striped table-bordered M-table1" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>المسمى الوظيفي</th>
                    <th>فرع الشركة</th>
                    <th>نوع العقد</th>
                    <th>القسم</th>
                    <th>تاريخ التعيين</th>
                    <th>المدير المباشر</th>
                    <th>رقم الإعلان / المسابقة</th>
                    <th>مجموعة العمل</th>
                    <th>التحكم</th>
                </tr>
                </thead>
                <tbody id="TableCntnt">
                <?php for($i=0;$i<6;$i++){?>
                    <tr id="tr<?php echo $i ?>">
                        <td><?php echo $i ?></td>
                        <td><?php echo 'المسمى الوظيفي '.$i ?></td>
                        <td><?php echo 'فرع الشركة'.$i ?></td>
                        <td><?php echo 'نوع العقد '.$i ?></td>
                        <td><?php echo 'القسم '.$i ?></td>
                        <td><?php echo 'تاريخ التعيين '.$i ?></td>
                        <td><?php echo 'المدير المباشر '.$i ?></td>
                        <td><?php echo 'رقم الإعلان / المسابقة '.$i ?></td>
                        <td><?php echo 'مجموعة العمل '.$i ?></td>
                        <td>
                            <a class="btn btn-danger delBtn" id="<?php echo $i?>">
                                <span class="fa fa-remove"></span>
                            </a>
                            <a class="btn btn-warning editBtn" id="<?php echo $i ?>">
                                <span class="fa fa-edit"></span>
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

$("#example-1").dataTable();
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

                