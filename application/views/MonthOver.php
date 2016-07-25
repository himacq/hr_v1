<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
            <h4 class="M-title"> سجل الساعات الإضافية و المخصومة </h4> 
        </div>
    </div>
   
   <div class="row m-b-20">
    				<div class="col-xs-12">		
                        <!-- <h3> Responsive table </h3>	      -->
    			       <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>الإسم</th>
                                        <th colspan="2" ><?php echo $userdata['s_name_ar'] ?></th>
                                        <th>رقم الهوية</th>
                                        <th><?php echo $userdata['s_emp_ssn'] ?></th>
                                        <th>الرقم الوظيفي</th>
                                        <th><?php echo $userdata['pk_i_id'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>اليوم</th>
                                        <th>التاريخ</th>
                                        <th>بداية الدوام</th>
                                        <th>نهاية الدوام</th>
                                        <th>فرق حضور</th>
                                        <th>فرق إنصراف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;
								foreach($attend as $row){ ?>
                                    <tr >
                                        <th scope="row"><?php echo $i;$i++; ?></th>
                                        <td><?php echo $row['dayname'] ?></td>
                                        <td><?php echo $row['dt_today'] ?></td>
                                        <td><?php echo $row['dt_entry_date'] ?></td>
                                        <td><?php echo $row['dt_leave_date'] ?></td>
                                        <td><?php echo $row['come_diff'] ?></td>
                                        <td><?php echo $row['go_diff']  ?></td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>                
    			</div>
</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
	<script src="<?php echo base_url(); ?>bower_components/chartist/dist/chartist.min.js"></script>
<script>
</script>				