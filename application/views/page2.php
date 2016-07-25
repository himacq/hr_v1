<div class="col-xs-12" id="main">
    <div class="row m-b-20">
        <div class="col-xs-12 col-xl-12">
             <h4 class="M-title"> إضافة بيانات موظف </h4> 
        </div>
    </div>
    <div class="col-xs-12">			     
        <div class="bs-nav-tabs nav-tabs-danger">
            <ul class="nav nav-tabs nav-animated-border-from-right">
                <li class="nav-item"> <a ng-href="" class="nav-link active" data-toggle="tab" data-target="#primary-info">البيانات الأساسية</a> 
                </li>
                <li class="nav-item"> <a ng-href="" class="nav-link" data-toggle="tab" data-target="#secondary-info">بيانات ثانوية</a> 
                </li>			                
            </ul>
            <form name="form" class="forms-basic">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane in active" id="primary-info">
                        <div class="row m-b-20">
                            <div class="col-xs-12 col-xl-8">
                                
                                    <div class="row">
                                        <div class="col-xs-12 col-xl-6">
                                            <div class="form-group floating-labels">
                                                <label for="ar_name">الإسم عربي</label>
                                                <input id="ar_name" autocomplete="off" type="text" name="ar_name" required data-error="الاسم مطلوب">
                                                <p class="error-block hidden with-errors"></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-xl-6">
                                            <div class="form-group floating-labels">
                                                <label for="en_name">الإسم إنجليزي</label>
                                                <input id="en_name" autocomplete="off" type="text" name="en_name">
                                                <p class="error-block hidden"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">				                                
                                        <div class="col-xs-12 col-xl-6">
                                            <div class="form-group floating-labels">
                                                <label for="id_number">رقم الهوية</label>
                                                <input id="id_number" autocomplete="off" type="text" name="id_number">
                                                <p class="error-block hidden"></p>
                                            </div>
                                        </div>			                               
                                        <div class="col-xs-12 col-xl-6">
                                            <h6 class="m-b-15 m-t-15">الجنس </h6> 				                      
                                            <div class="c-inputs-stacked msh-inline-radio">
                                                <label class="c-input c-radio">
                                                    <input name="radio-stacked" type="radio"><span class="c-indicator c-indicator-danger"></span>  <span class="c-input-text"> ذكر </span> 
                                                </label>							                  
                                                <label class="c-input c-radio">
                                                    <input name="radio-stacked" type="radio"><span class="c-indicator c-indicator-danger"></span>  <span class="c-input-text"> أنثى </span> 
                                                </label>
                                            </div>
                                        </div>								                
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-xl-6">
                                            <div class="form-group floating-labels">
                                                <label for="date-picker1">تاريخ الميلاد</label>
                                                <input id="date-picker1" type="text" class="form-control"  name="lastname">				                                        
                                                <p class="error-block hidden"></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-xl-6">
                                            <div class="form-group floating-labels">
                                                <label for="birth_place">مكان الميلاد</label>
                                                <input id="birth_place" autocomplete="off" type="text" name="BOD">
                                                <p class="error-block hidden"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-xl-6">
                                            <div class="form-group floating-labels">
                                                <label for="password">كلمة المرور</label>
                                                <input id="password" autocomplete="off" type="password" name="password">
                                                <p class="error-block hidden"></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-xl-6">
                                            <div class="form-group floating-labels">
                                                <label for="confirm-password">تأكيد كلمة المرور</label>
                                                <input id="confirm-password" autocomplete="off" type="password" name="confirm-password">
                                                <p class="error-block hidden"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-xl-6">
                                            <div class="form-group floating-labels">
                                                <label for="email">البريد الإلكتروني</label>
                                                <input id="email" autocomplete="off" type="email" name="email">
                                                <p class="error-block hidden"></p>
                                            </div>
                                        </div>
                                    </div>
                                     <div class=" m-b-15 ">
                                        <button type="submit" class="btn btn-primary" >
                                            <i class="btn-icon fa fa-check"></i> حفظ
                                        </button>
                                    </div>
                            </div>
                        </div>
                        
                    </div>
                    <div role="tabpanel" class="tab-pane" id="secondary-info">
                        <div class="row m-b-20">
                            <div class="col-xs-12 col-xl-8">
                                <div class="row">
                                    <div class="col-xs-12 col-xl-6">				                            
                                        <div class="form-group floating-labels">
                                            <label for="marital_status">الحالة الإجتماعية</label>
                                            <select id="marital_status" class="c-select">
                                                <option value=""></option>
                                                <option value="1">أعزب</option>
                                                <option value="2">متزوج</option>
                                                <option value="3">أرملة</option>
                                            </select>							                      
                                        </div>
                                    </div>
                                     <div class="col-xs-12 col-xl-6">				                            
                                        <div class="form-group floating-labels">
                                            <label for="marital_status">حالة الموظف</label>
                                            <select id="marital_status" class="c-select">
                                                <option value=""></option>
                                                <option value="1">متقاعد</option>
                                                <option value="2">اجازة</option>
                                                <option value="3">يعمل</option>
                                            </select>							                      
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-xl-6">				                            
                                        <div class="form-group floating-labels">
                                            <label for="marital_status">المدينة</label>
                                            <select id="marital_status" class="c-select">
                                                <option value=""></option>
                                                <option value="1">أعزب</option>
                                                <option value="2">متزوج</option>
                                                <option value="3">أرملة</option>
                                            </select>							                      
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-xl-6">
                                        <div class="form-group floating-labels">
                                            <label for="firstname1">العنوان</label>
                                            <input id="firstname1" autocomplete="off" type="text" name="ar_name">
                                            <p class="error-block hidden"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-xl-6">
                                        <div class="form-group floating-labels">
                                            <label for="firstname1">جوال</label>
                                            <input id="firstname1" autocomplete="off" type="text" name="ar_name">
                                            <p class="error-block hidden"></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-xl-6">
                                        <div class="form-group floating-labels">
                                            <label for="firstname1">هاتف</label>
                                            <input id="firstname1" autocomplete="off" type="text" name="lastname">
                                            <p class="error-block hidden"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-xl-6">
                                        <div class="form-group floating-labels">
                                            <label for="firstname1">الجنسية</label>
                                            <input id="firstname1" autocomplete="off" type="text" name="ar_name">
                                            <p class="error-block hidden"></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-xl-6">
                                        <h6 class="m-b-15 m-t-15">صورة شخصية </h6> 
                                        <input id="lastname" autocomplete="off" type="file" name="lastname">		                       
                                    </div>
                                </div>
                                <div class=" m-b-15 ">
                                    <button type="submit" class="btn btn-primary" >
                                        <i class="btn-icon fa fa-check"></i> حفظ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </form>
        </div>
    </div>                
</div>
            