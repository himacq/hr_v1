<div class="sidebar-inner-wrapper">
        <div class="sidebar-1">
            <div class="profile">
                <button data-click="toggle-sidebar" type="button" class="btn btn-white btn-outline no-border close-sidebar"> <i class="fa fa-close"></i> 
                </button>
                <div class="profile-image">
                    <img class="img-circle img-fluid" src="<?php echo base_url().$userdata['s_emp_image']?>">
                </div>
                <!--<div class="social-media">
                    <button type="button" class="btn btn-facebook btn-circle m-r-5"><i class="fa fa-facebook color-white"></i> 
                    </button>
                    <button type="button" class="btn btn-twitter btn-circle m-r-5"><i class="fa fa-twitter color-white"></i> 
                    </button>
                    <button type="button" class="btn btn-google btn-circle m-r-5"><i class="fa fa-google color-white"></i> 
                    </button>
                </div>-->
                <div class="profile-toggle">
                    <button data-click="toggle-profile" type="button" class="btn btn-white btn-outline no-border"> <i class="pull-right fa fa-caret-down icon-toggle-profile"></i> 
                    </button>
                </div>
                <div class="profile-title"><?php echo $userdata['s_name_ar']?></div>
                <div class="profile-subtitle"><?php echo $userdata['s_email']?></div>
            </div>
            <div class="sidebar-nav">
                <div class="sidebar-section account-links">
                    <div class="section-title">حسابي</div>
                    <ul class="list-unstyled section-content">
                        <li>
                            <a class="sideline"> <i class="zmdi zmdi-account-circle md-icon pull-left"></i>  <span class="title">الملف الشخصي</span> 
                            </a>
                        </li>
                        <li>
                            <a class="sideline"> <i class="zmdi zmdi-sign-in md-icon pull-left"></i>  <span class="title">Logout</span> 
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-section">
                    <div class="section-title">القائمة الرئيسية</div>
                <?php foreach($userMenu as $row){ ?>
                    <ul class="l1 list-unstyled section-content">
                        <li>
                            <a class="sideline" data-id="dashboards<?php echo $row->pk_i_id ?>" data-click="toggle-section"> 
                            	<i class="pull-right fa fa-caret-down icon-dashboards"></i>  
                                <i class="zmdi zmdi-view-dashboard md-icon pull-left"></i>  
                                <span class="title"><?php echo $row->s_function_title; ?></span> 
                            </a>
                            <ul class="list-unstyled section-dashboards<?php echo $row->pk_i_id ?> l2">
                            <?php foreach($userSubMenu as $row1){
								if($row1->fk_i_parent_id==$row->pk_i_id){ ?>
                                <li>
                                    <a class="sideline" href="<?php echo base_url() ?><?php echo $row1->s_function_url; ?>"> 
                                    	<span class="title"><?php echo $row1->s_function_title; ?></span> 
                                    </a>
                                </li>
                			<?php }
							 }?>
                            </ul>
                        </li>
                    </ul>
                <?php }?>
                </div>
            </div>
        </div>
    </div>