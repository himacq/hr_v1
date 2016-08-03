
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">


<div class="row m-b-20">
    <div class="col-xs-12">
        <h4 class="m-b-20">ارشيف الرسائل</h4>
       <table id="example-1" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>الوقت </th>
                    <th>التكلفة</th>
                    <th>المستلم</th>
                    <th>اسم المرسل</th>
                    <th>الرسالة</th>
                </tr>
            </thead>
           	<tbody id="TableCntnt">
                   <?php 
                   foreach($smsLogs as $row){?> 
            	<tr id="tr<?php echo $row->id ?>">
                    <td><?php echo $row->date_sent ?></td>
                    <td><?php echo $row->amount ?></td>
                    <td><?php echo $row->rec ?></td>
                    <td><?php echo $row->sender ?></td>
                    <td><?php echo $row->sms_text ?></td>
    
                </tr><?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
           
<script>
(function() {
    'use strict';

    $(function() {

  
        $('#example-1').DataTable();

    });

})();
</script>
				