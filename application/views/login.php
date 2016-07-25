<!DOCTYPE html>
<html dir="rtl" lang="ar">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>الأقصى</title>

    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url() ?>css/bootstrap-arabic.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/font-awesome.min.css" rel="stylesheet">
    
    <!-- <link href="css/animate.css" rel="stylesheet"> -->
    <!-- style -->
    <link href="<?php echo base_url() ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/responsive.css" rel="stylesheet">

    <!-- scripts -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script src="<?php echo base_url() ?>js/jquery-2.1.0.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    
    <!--  <script src="js/scripts.js"></script> -->

    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <div class="body-warp">
            <div class="login-container clearfix">
                <div class="logo-container">
                    <a href="">
                        <img src="<?php echo base_url() ?>images/logo.png">
                        <p>قناة الأقصى الفضائية</p>
                    </a>
                </div>
                <div class="form-container">
                    <h3 class="form-title">
                        نظام إدارة الموارد البشرية <br> وشؤون الموظفين
                    </h3>
                    <form name="form" id="LoginFrm" class="form" onClick="return false;">
                    	<div class="M-error-msg">
                    		<div class="alert alert-danger" style="display:none">
                    			البريد المدخل غير مسجل مسبقا.
                    		</div>
                    	</div>
                        <div class="M-input">
                            <input type="text" placeholder="اسم المستخدم" id="email" name="email">
                        </div>
                        <div class="M-input">
                            <input type="password" placeholder="كلمة المرور" id="password" type="password" name="password">
                        </div>
                        <div class="M-button">
                            <button type="submit" class="btn">دخـــول</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
$(document).ready(function(e) {
    $(".close").on('click',function(){
		//e.preventDefault();
		$(this).parent().hide();
	});
	
	$('.btn').click(function(e) {
			var formData = new FormData($("#LoginFrm")[0]);
			$.ajax({
				url: '<?php echo base_url() ?>AjaxLogin',
				type: 'POST',
				data: formData,
				dataType:"json",
				async: false,
				success: function (data) {
					console.log(data.status)
					if(data.status.success){	
						$(".alert").removeClass("alert-danger").addClass(".alert-success").show().text(data.status.msg);
						setTimeout(function(){
						  self.location='<?php echo base_url() ?>';
						}, 2000);
					}
					else {
						$(".alert").removeClass("alert-success").addClass(".alert-danger").show().text(data.status.msg);
					}
					return false;
				},
				cache: false,
				contentType: false,
				processData: false
			});
			return false;
		});
});
</script>
</body>
</html>
