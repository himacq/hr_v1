<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['ElecFingerPrint'] = "welcome";
$route['404_override'] = 'welcome';


$route['login'] = 'c_general/login';
$route['AjaxLogin'] = 'c_general/AjaxLogin';
$route['logout'] = 'c_general/logout';


$route['ApplyAttend'] = 'c_user/ApplyAttend';
$route['ApplyLeave'] = 'c_user/ApplyLeave';
$route['EmpMonthMoves'] = "c_user/EmpMonthMoves";
$route['EmpExtraHours'] = "c_user/EmpExtraHours";


$route['ConstantDetails'] = 'c_admin/ConstantDetails';
$route['AddConstant'] = 'c_admin/AddConstant';
$route['getConstant'] = 'c_admin/getConstant';
$route['getConstDetails/(:num)'] = 'c_admin/getConstDetails/$1';
$route['AddConstantDet'] = 'c_admin/AddConstantDet';

$route['NewEmp'] = 'c_admin/NewEmp';
$route['CompProfile'] = 'c_admin/CompProfile';

$route['JobTitles'] = 'c_admin/JobTitles';
$route['AddJobTitle'] = 'c_admin/AddJobTitle';
$route['GetJobTitle'] = 'c_admin/GetJobTitle';
$route['UpdateJobTitle'] = 'c_admin/UpdateJobTitle';
$route['DeleteJobTitle'] = 'c_admin/DeleteJobTitle';

$route['getArch'] = 'c_admin/getArch';
$route['AddArch'] = 'c_admin/AddArch';
$route['GetArchChild/(:num)'] = 'c_admin/GetArchChild/$1';
$route['GetSingleArch'] = 'c_admin/GetSingleArch';
$route['UpdateArch'] = 'c_admin/UpdateArch';

$route['NewJobForEmp'] = 'c_admin/NewJobForEmp';
$route['AddEmployee'] = 'c_admin/AddEmployee';
$route['UpdateEmployee'] = 'c_admin/UpdateEmployee';
$route['EmployeeFilter'] = 'c_admin/EmployeeFilter';
$route['DeleteEmp'] = 'c_admin/DeleteEmp';
$route['AjaxEmpAttendance'] = 'c_admin/AjaxEmpAttendance';
$route['EmpAttendance(:any)'] = 'c_admin/EmpAttendance/$1';
$route['EditEmp/(:any)'] = 'c_admin/EditEmp/$1';

$route['WorkGroup'] = 'c_admin/WorkGroup';
$route['AddWorkGroup'] = 'c_admin/AddWorkGroup';
$route['getWorkGroupDetails/(:num)'] = 'c_admin/getWorkGroupDetails/$1';
$route['AddWorkGroupDet'] = 'c_admin/AddWorkGroupDet';

$route['AddCompProfile'] = 'c_admin/AddCompProfile';


/****************** Ibrahim Routs ************************/
$route['SmsGroups'] = 'c_sms/groups';
$route['AddSmsGroup'] = 'c_sms/add_group';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
