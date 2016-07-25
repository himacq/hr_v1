<style>
    .fa{
        cursor: pointer;
    }
</style>
<div class="col-xs-12" id="main">

    <div class="row m-b-20">
        <div class="col-xs-12">
            <h4 class="m-b-20">سجل  الموظفين</h4>
            <table id="example-1" class="table table-hover table-striped table-bordered M-table1" cellspacing="0" width="100%">
                <thead>
                <tr>
<!--                    <th>#</th>-->
                    <th>الرقم الوظيفي</th>
                    <th>اسم الموظف</th>
                    <th>الهوية/ الجواز</th>
                    <th>بريد إلكتروني</th>
                    <th>جوال</th>
                    <th>الهاتف</th>
                    <th>التحكم</th>
                </tr>
                </thead>
                <tbody id="TableCntnt">
                <?php
                $i=1;
                foreach($empData as $row){?>
                    <tr id="tr<?php echo $row->i_emp_number; ?>">
<!--                        <td>--><?php //echo $i;$i++; ?><!--</td>-->
                        <td><?php echo $row->i_emp_number; ?></td>
                        <td><?php echo $row->s_name_ar; ?></td>
                        <td><?php echo $row->s_emp_ssn; ?></td>
                        <td><?php echo $row->s_email; ?></td>
                        <td><?php echo $row->s_jawwal    ; ?></td>
                        <td><?php echo $row->s_tel; ?></td>
                        <td>
                                <span class="fa fa-remove delBtn" title="حذف" id="<?php echo $row->i_emp_number;?>"></span>
                            <a href="<?php echo base_url()?>EditEmp/<?php echo $row->i_emp_number; ?>">
                                <span class="fa fa-edit" title="تعديل" ></span>
                            </a>
                            <span class="fa fa-history" title="السجل الوظيفي"id="<?php echo $row->i_emp_number;?>"></span>
                            <span class="fa fa-calendar" title="الحضور و الإنصراف "id="<?php echo $row->i_emp_number;?>"></span>
                            <span class="fa fa-hotel" title="الإجازات"id="<?php echo $row->i_emp_number;?>"></span>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!--<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>-->
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $("#example-1").dataTable({
            "language": {
                "lengthMenu": "عرض _MENU_ سجلات من الصفحة",
                "zeroRecords": "لا يوجد نتائج للعرض",
                "info": "عرض صفحة _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد نتائج للعرض",
                "infoFiltered": "(تصفية  _MAX_ من إجمالي السجلات)",
                "search": "بحث"
            }
        });
    })
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


    function DelFunction(id){
        $(".alert-info-outline").show();
        var dataArray={'pk_i_id':id};
        console.log("tr"+id)
        $.ajax({
            url: '<?php echo base_url() ?>DeleteEmp',
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
    }
</script>