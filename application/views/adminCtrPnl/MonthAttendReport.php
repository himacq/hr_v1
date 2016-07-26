<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
            <h4 class="M-title"> تفصيل حركة الموظف الشهرية </h4> 
        </div>
    </div>
    <div class="row m-b-30">
        <div class="col-xs-12 col-xl-12">
            <form class="form-horizontal ">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">بيانات الموظف</label>
                    <div class="col-sm-10">
                        <select  name="i_emp_number" id="i_emp_number" class="col-sm-12 M-select2 c-select" >
                            <?php foreach($empData as $row){?>
                            <option value="<?php echo $row->i_emp_number; ?>" "<?php echo $selectedempData[0]->i_emp_number==$row->i_emp_number?"selected":"";?>" ><?php echo $row->s_name_ar; ?></option>
                            <?php }?>
                        </select>

                    </div>
<!--                    <div class="col-sm-5">-->
<!--                        <input type="text" class="form-control" placeholder="باستخدام الاسم..">-->
<!--                    </div>-->
<!--                    <div class="col-sm-5">-->
<!--                        <input type="text" class="form-control" placeholder="باستخدام رقم الهوية...">-->
<!--                    </div>-->

                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">التاريخ</label>
                    <div class="col-sm-2">
                        <select id="month" name="month" class="form-control">
                            <?php for($i=1;$i<=12;$i++){?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select id="year" name="year" class="form-control">
                            <?php for($i=2016;$i<=date('Y');$i++){?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-info Disp" >عرض</button>
                    </div>
                </div>
               
            </form>
        </div>
        
    </div>
   <!-- <div class="row m-b-20">
            <div class="col-xs-7">
                <div class="f-w-300">Market share</div>
                <p>This week</p>
            </div>
            <div class="col-xs-5">
                <div class="dropdown pull-right m-0">
                    <a class="btn no-bg dropdown-toggle no-after" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i> 
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-scale from-right"> <a class="dropdown-item">This week</a>  <a class="dropdown-item">This month</a>  <a class="dropdown-item">This year</a>  <a class="dropdown-item">Today</a> 
                    </div>
                </div>
                <button class="btn no-bg pull-right m-0"> <i class="fa fa-cog" id="icon-322"></i> 
                </button>
            </div>
        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-xs-12 col-lg-6">-->
<!--                <div class="series-a-danger series-b-info series-c-success series-d-warning" style="height:250px">-->
<!--                    <div id="analytics-pie-chart-4" class="ct-chart">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xs-12 col-lg-6">-->
<!--                <ul class="list-unstyled">-->
<!--                    <li> <span class="label  AttendDay label-rounded color-white"> </span>  <span>حضور</span> -->
<!--                    </li>-->
<!--                    <li> <span class="label VacationDate label-rounded color-white"> </span>  <span>عطلة رسمية</span> -->
<!--                    </li>-->
<!--                    <li> <span class="label EmpVacationDate label-rounded color-white"> </span>  <span>إجازة موظف</span> -->
<!--                    </li>-->
<!--                    <li> <span class="label LateDay label-rounded color-white"> </span>  <span>أيام تأخير</span> -->
<!--                    </li>-->
<!--                    <li> <span class="label NotRegisteredDay label-rounded color-white"> </span>  <span>غير مدخل</span> -->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
    
    </div>
   <div class="row m-b-20">
    				<div class="col-xs-12">		
                        <!-- <h3> Responsive table </h3>	      -->
    			       <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>الإسم</th>
                                        <th colspan="2" id="s_name_ar" ><?php echo $selectedempData[0]->s_name_ar ?></th>
                                        <th>رقم الهوية</th>
                                        <th id="s_emp_ssn"><?php echo $selectedempData[0]->s_emp_ssn ?></th>
                                        <th>الرقم الوظيفي</th>
                                        <th id="i_emp_number"><?php echo $selectedempData[0]->i_emp_number ?></th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>اليوم</th>
                                        <th>التاريخ</th>
                                        <th>بداية الدوام</th>
                                        <th>نهاية الدوام</th>
                                        <th>حالة اليوم</th>
                                        <th>مكان التسجيل</th>
                                    </tr>
                                </thead>
                                <tbody id="tblCntnt">
                                <?php $i=1;
								$AttendDay=0;
								$VacationDate=0;
								$EmpVacationDate=0;
								$LateDay=0;
								$NotRegisteredDay=0;
								foreach($attend as $row){ ?>
                                    <tr <?php if($row['dayname']=="الجمعة" || $row['s_type']==3){ echo 'class="VacationDate"'; $VacationDate++;} 
									else if($row['s_type']==2){  echo 'class="EmpVacationDate"';$VacationDate++;} 
									 else if($row['s_type']==1 && $row['fk_i_extra_cd']==25){ echo 'class="LateDay"';$LateDay++;} 
									 else if($row['s_type']==1 ){ echo 'class="AttendDay"';$AttendDay++;} 
									 else if($row['s_type']==4 ) {echo 'class="NotRegisteredDay"';$NotRegisteredDay++;}  ?> >
                                        <th scope="row"><?php echo $i;$i++; ?></th>
                                        <td><?php echo $row['dayname'] ?></td>
                                        <td><?php echo $row['dt_today'] ?></td>
                                        <td><?php echo $row['dt_entry_date'] ?></td>
                                        <td><?php echo $row['dt_leave_date'] ?></td>
                                        <td><?php echo $row['s_name_ar'] ?></td>
                                        <td><?php echo $row['fk_i_source_cd']  ?></td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>                
    			</div>
</div>
<!--	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>-->
<!--	<script src="--><?php //echo base_url(); ?><!--bower_components/chartist/dist/chartist.min.js"></script>-->
<script>/*
function chartistPieChart4() {
    var data = {
        series: [<?php echo $AttendDay ?>, <?php echo $VacationDate  ?>, <?php echo $EmpVacationDate  ?>, <?php echo $LateDay  ?>,<?php echo $NotRegisteredDay  ?>]
    };
    var options = {
        donut: true,
		donutWidth: 20,
  startAngle: 270,
  total:  //<?php echo$AttendDay +$VacationDate+$EmpVacationDate+$LateDay+$NotRegisteredDay  ?>
    };
    new Chartist.Pie('#analytics-pie-chart-4', data, options);
};

chartistPieChart4() */
    $(document).ready(function(){
        $(".Disp").on('click',function(){
            i_emp_number=$("#i_emp_number").val();
            selectedMonth=$("#month").val();
            selectedYear=$("#year").val();
            $(".alert-info-outline").show();
            var dataArray={'i_emp_number':i_emp_number,'selectedMonth':selectedMonth,'selectedYear':selectedYear};
            $.ajax({
                url: '<?php echo base_url() ?>AjaxEmpAttendance',
                type: 'POST',
                data: dataArray,
                dataType:"json",
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
        })
    })
</script>				