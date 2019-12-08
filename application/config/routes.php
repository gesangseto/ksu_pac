<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Login and Logout
$route['Login'] = 'Login';
$route['Logout'] = 'Logout';
// Dashboard
$route['Dashboard'] = 'Dashboard';
// Permission
$route['Permission'] = 'Permission';
$route['Permission/Create'] = 'Permission/create';
$route['Permission/Update'] = 'Permission/update';
// User System
$route['User_Admin'] = 'User_Admin';
$route['User_Admin/Create'] = 'User_Admin/create';
$route['User_Admin/Update'] = 'User_Admin/update';
$route['User_Admin/Delete'] = 'User_Admin/delete';
// Mapping
$route['Mapping'] = 'Mapping';
$route['Mapping/Create'] = 'Mapping/create';
$route['Mapping/Update'] = 'Mapping/update';
$route['Mapping/Delete'] = 'Mapping/delete';
// SDM USER
$route['User_Sdm'] = 'User_Sdm';
$route['User_Sdm/Create'] = 'User_Sdm/create';
$route['User_Sdm/Update'] = 'User_Sdm/update';
$route['User_Sdm/Delete'] = 'User_Sdm/delete';
// Absence
$route['Absence_Sdm'] = 'Absence_Sdm';
$route['Absence_Sdm/Create'] = 'Absence_Sdm/create';
$route['Absence_Sdm/Update'] = 'Absence_Sdm/update';
$route['Absence_Sdm/Delete'] = 'Absence_Sdm/delete';
// Customer
$route['Customer'] = 'Customer';
$route['Customer/Create'] = 'Customer/create';
$route['Customer/Update'] = 'Customer/update';
$route['Customer/Delete'] = 'Customer/delete';
// Project
$route['Project'] = 'Project';
$route['Project/Create'] = 'Project/create';
$route['Project/Update'] = 'Project/update';
$route['Project/Delete'] = 'Project/delete';
