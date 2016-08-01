
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

<form class="form-horizontal" name="SMSForm" id="SMSForm" method="post" onsubmit="return false;">
<div class="col-xs-12" id="main">


    <div class="col-xs-6" >
        <div class="row m-b-20">
            <div class="col-xs-12 col-xl-12">
                <h4 class="M-title"> محتوى الرسالة </h4> 
            </div>
        </div>
        <div class="row m-b-20">
            <div class="col-xs-12">
                    <div class="row">	
                        <div class="col-sm-10" >
                            <fieldset class="form-group m-b-20">
                                <label>نص الرسالة</label>
                                <textarea  class="form-control" id="TextMessage"  name="Text"></textarea>
                                <input type= hidden name="unicode" value="2">
                            </fieldset>


                        </div>
                        <div class="col-sm-10" >
                            <div class="form-group floating-labels">
                                <INPUT class="help-block" style="border:none" value="حالة الأحرف"  name="InfoCharCounter"  dir="rtl" disabled="disabled" >


                            </div>
                        </div>
                        <div class="col-sm-5" >
                            <div class="form-group floating-labels">
                                <select id="sender_name" name="sender_name">
                                    <option value="0">اسم المرسل</option>          
                                    <?php foreach ($senders as $row) { ?> 
                                        <option value="<?php echo $row->sender_name ?>"><?php echo $row->sender_name ?></option>          
                                    <?php } ?>

                                </select>

                            </div>
                        </div>

                    </div>

            </div>

        </div>

    </div>




    <div class="col-xs-6" >
        <div class="row m-b-20">
            <div class="col-xs-12 col-xl-12">
                <h4 class="M-title"> المرسل لهم</h4> 
            </div>
        </div>
        <div class="row col-xs-12 ">
            <div class="bs-nav-tabs nav-tabs-warning">
                <ul class="nav nav-tabs nav-animated-border-from-left">
                    <li class="nav-item"> <a ng-href="" class="nav-link active" data-toggle="tab" data-target="#nav-tabs-0-1" aria-expanded="true">ادخال رقم</a> 
                    </li>
                    <li class="nav-item"> <a ng-href="" class="nav-link" data-toggle="tab" data-target="#nav-tabs-0-2" aria-expanded="false">مجموعات</a> 
                    </li>
                    <li class="nav-item"> <a ng-href="" class="nav-link" data-toggle="tab" data-target="#nav-tabs-0-3" aria-expanded="false">افراد المجموعات</a> 
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="nav-tabs-0-1" aria-expanded="true">
                        <div class="form-group floating-labels">
                            <label for="s_name_ar">رقم الجوال  </label>
                            <input id="mobile" type="text" name="mobile">

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-offset-1 col-sm-10" align="center">
                                <button type="button" class="btn btn-success" id="add_number">اضافة الى الجهات المستلمة</button>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="nav-tabs-0-2" aria-expanded="false">
                        <div class="form-group floating-labels">
                            <select id="group_id" name="group_id">
                                <option value="0">المجموعة</option>          

                                <?php foreach ($myGroups as $row) { ?> 
                                    <option value="<?php echo $row->group_id ?>"><?php echo $row->group_name ?></option>          
                                <?php } ?>
                            </select>

                        </div>

                        <div class="form-group row">
                            <div class="col-sm-offset-1 col-sm-10" align="center">
                                <button type="button" class="btn btn-success" id="add_group_numbers">اضافة الى الجهات المستلمة</button>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="nav-tabs-0-3" aria-expanded="false">

                        <div class="form-group floating-labels">
                            <select id='members' multiple='multiple' width="100%">

                                <?php foreach ($groupMembers as $row): ?>

                                    <option value="<?php echo $row->member_mobile ?>"><?php echo $row->member_name ?></option>          


                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-offset-1 col-sm-10" align="center">
                                <button type="button" class="btn btn-success" id="add_member_number">اضافة الى الجهات المستلمة</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>



<div class="col-xs-12" >
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
            <h4 class="M-title">الجهات المستلمة </h4> 
        </div>
    </div>
    <div class="row m-b-20">

        <div class="col-xs-12">
            
                <div class="row">	
                    <div class="col-sm-10" >
                        <fieldset class="form-group m-b-20">
                            <label>قائمة الارقام المعتمدة</label>
                            <textarea class="form-control" id="rec_numbers"  name="rec_numbers" readonly="readonly"></textarea>
                        </fieldset>


                    </div>
                    <div class="form-group row">
                        <div class="col-sm-offset-1 col-sm-10" align="center">
                            <button type="submit" class="btn btn-success" id="send">ارسال</button>
                            <button type="button" class="btn btn-danger" id="cancle" >الغاء</button>
                        </div>
                    </div>

                </div>

        </div>
    </div>

</div>

</form>




<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>

<script>
$(document).ready(function(){
	
	
		$("#SMSForm").validate({
			rules: {
				rec_numbers: {
					required: true,
					minlength: 10
				},
                                TextMessage: {
					required: true,
					minlength: 3
				},
                                sender_name: {
					required: true,
					
				},
				
			},
			messages: {
				rec_numbers: {
					required: 'الحقل مطلوب',
					minlength: 'يجب ادخال رقم جوال واحد على الاقل'
				},
                                TextMessage: {
					required: 'الحقل مطلوب',
					minlength: 'يجب إدخال 3 حروف على الأقل'
				},
                                sender_name: {
					required: 'الحقل مطلوب',
					
                                        
				},
				
			},
			
			submitHandler: function() {
				$(".alert-info-outline").show();
				var formData = new FormData($("#SMSForm")[0]);
				$.ajax({
					url: '<?php echo base_url() ?>DoSendSms',
					type: 'POST',
					data: formData,
					dataType:"json",
					async: false,
					success: function (data) {
						if(data.status.success){
							$(".alert-danger-outline").hide();
							$(".alert-success-outline").show();
							$("#successMsg").text(data.status.msg)
							
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
                
                });
  $("#add_member_number").click(function () {
                    if ($("#rec_numbers").val() == "") {
                        $("#rec_numbers").val($("#members").val());

                    }
                    else {
                        $("#rec_numbers").val($("#rec_numbers").val() + "," + $("#members").val());
                    }

                    
                });
                
                
                
                
                $("#add_group_numbers").click(function () {
                    $.ajax({
                        url: '<?php echo base_url() ?>AddSmsGroupNumbers/'+$("#group_id").val(),
                        type: 'GET',
                        async: false,
                        success: function (data) {
                           
                             var json_obj = $.parseJSON(data);//parse JSON
            
         
            for (var i in json_obj) 
            {
                if ($("#rec_numbers").val() == "") {
                        $("#rec_numbers").val(json_obj[i].member_mobile);

                    }
                    else {
                        $("#rec_numbers").val($("#rec_numbers").val() + "," + json_obj[i].member_mobile);
                    }
                    
            }
        }
            
                            });

                    
                });

                $("#cancle").click(function () {


                    $("#rec_numbers").val("");
                });

                $("#add_number").click(function () {
                    if ($("#rec_numbers").val() == "") {
                        $("#rec_numbers").val($("#mobile").val());

                    }
                    else {
                        $("#rec_numbers").val($("#rec_numbers").val() + "," + $("#mobile").val());
                    }

                    $("#mobile").val("");
                });


                $("#TextMessage").keyup(function () {
                    updateTextBoxCounter();
                });

                function updateTextBoxCounter() {
                    var unicodeFlag = 0;
                    var extraChars = 0;
                    var msgCount = 0;
                    var tmpChar = "";
                    for (var i = 0; (!unicodeFlag && (i < document.SMSForm.Text.value.length)); i++) {
                        if ((document.SMSForm.Text.value.charAt(i) >= '0') && (document.SMSForm.Text.value.charAt(i) <= '9')) {
                        }
                        else if ((document.SMSForm.Text.value.charAt(i) >= 'A') && (document.SMSForm.Text.value.charAt(i) <= 'Z')) {
                        }
                        else if ((document.SMSForm.Text.value.charAt(i) >= 'a') && (document.SMSForm.Text.value.charAt(i) <= 'z')) {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '@') {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xA3) {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '$') {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xA5) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xE8) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xE9) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xF9) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xEC) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xF2) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xC7) {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '\r') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '\n') {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xD8) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xF8) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xC5) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xE5) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x394) {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '_') {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x3A6) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x393) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x39B) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x3A9) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x3A0) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x3A8) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x3A3) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x398) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x39E) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xC6) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xE6) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xDF) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xC9) {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == ' ') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '!') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '\"') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '#') {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xA4) {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '%') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '&') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '\'') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '(') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == ')') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '*') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '+') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == ',') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '-') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '.') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '/') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == ':') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == ';') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '<') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '=') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '>') {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '?') {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xA1) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xC4) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xD6) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xD1) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xDC) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xA7) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xBF) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xE4) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xF6) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xF1) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xFC) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0xE0) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x391) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x392) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x395) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x396) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x397) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x399) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x39A) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x39C) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x39D) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x39F) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x3A1) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x3A4) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x3A5) {
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x3A7) {
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '^') {
                            extraChars++;
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '{') {
                            extraChars++;
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '}') {
                            extraChars++;
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '\\') {
                            extraChars++;
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '[') {
                            extraChars++;
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '~') {
                            extraChars++;
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == ']') {
                            extraChars++;
                        }
                        else if (document.SMSForm.Text.value.charAt(i) == '|') {
                            extraChars++;
                        }
                        else if (document.SMSForm.Text.value.charCodeAt(i) == 0x20AC) {
                            extraChars++;
                        }
                        else {
                            unicodeFlag = 1;
                        }
                    }
                    if (unicodeFlag == 1) {
                        document.SMSForm.unicode.value = "arabic";
                        msgCount = document.SMSForm.Text.value.length;

                        /*if (msgCount >= 70) {
                         document.SMSForm.Text.value = document.SMSForm.Text.value.substring(0,70);
                         msgCount = 1;
                         }*/


                        if (msgCount <= 70) {
                            msgCount = 1;
                        }
                        else if (msgCount >= 268) {
                            document.SMSForm.Text.value = document.SMSForm.Text.value.substring(0, 268);
                            msgCount = 4;
                        }
                        else {

                            msgCount += (67 - 1);
                            msgCount -= (msgCount % 67);
                            msgCount /= 67;
                        }
                        document.SMSForm.InfoCharCounter.value = "" + " الأحرف العربية: " + "(" + (document.SMSForm.Text.value.length + extraChars) + ")" + " عدد الرسائل:" + "(" + msgCount + ")";
                    }
                    else {
                        document.SMSForm.unicode.value = "english";
                        msgCount = document.SMSForm.Text.value.length + extraChars;

                        /* if (msgCount >= 160) {
                         document.SMSForm.Text.value = document.SMSForm.Text.value.substring(0,160);
                         msgCount = 1;
                         }*/

                        if (msgCount <= 160) {
                            msgCount = 1;
                        }
                        else if (msgCount >= 459) {
                            document.SMSForm.Text.value = document.SMSForm.Text.value.substring(0, 459);
                            msgCount = 3;
                        }

                        else {
                            msgCount += (153 - 1);
                            msgCount -= (msgCount % 153);
                            msgCount /= 153;
                        }
                        document.SMSForm.InfoCharCounter.value = "" + " الأحرف الإنجليزية: " + "(" + (document.SMSForm.Text.value.length + extraChars) + ")" + " عدد الرسائل:" + "(" + msgCount + ")";
                    }
//document.SMSForm.ghf.value = msgCount ;
                }

</script>

