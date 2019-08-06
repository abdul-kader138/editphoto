<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-07-02 00:02:44 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:02:44 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:38:56 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:38:56 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:38:59 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:38:59 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:39:16 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:39:16 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:40:37 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:40:37 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:41:13 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:41:13 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:41:26 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:41:26 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:41:26 --> Could not find the language line "company_id"
ERROR - 2018-07-02 00:41:26 --> Could not find the language line "operator_id"
ERROR - 2018-07-02 00:41:26 --> Could not find the language line "package_id"
ERROR - 2018-07-02 00:41:26 --> Could not find the language line "mobile_number"
ERROR - 2018-07-02 00:41:49 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:41:49 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:41:49 --> Could not find the language line "company_id"
ERROR - 2018-07-02 00:41:49 --> Could not find the language line "operator_id"
ERROR - 2018-07-02 00:41:49 --> Could not find the language line "package_id"
ERROR - 2018-07-02 00:41:49 --> Could not find the language line "mobile_number"
ERROR - 2018-07-02 00:42:05 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:42:05 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:42:05 --> Could not find the language line "company_id"
ERROR - 2018-07-02 00:42:05 --> Could not find the language line "operator_id"
ERROR - 2018-07-02 00:42:05 --> Could not find the language line "package_id"
ERROR - 2018-07-02 00:42:05 --> Could not find the language line "mobile_number"
ERROR - 2018-07-02 00:47:05 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:47:05 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:47:05 --> Could not find the language line "mobile_number"
ERROR - 2018-07-02 00:47:31 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:47:31 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:50:44 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:50:44 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:50:45 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `sma_company`.`name` as `c_name`, `sma_operators`.`name` as `po_name`, `sma_packages`.`name` as `p_name`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
LEFT JOIN `sma_designations` ON `sma_employees`.`designation_id`=`sma_designations`.`id`
ORDER BY `name` ASC, `c_name` ASC
 LIMIT 10
ERROR - 2018-07-02 00:50:45 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-02 00:52:13 --> Could not find the language line "Employee"
ERROR - 2018-07-02 00:52:13 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 00:52:14 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `sma_company`.`name` as `c_name`, `sma_operators`.`name` as `po_name`, `sma_packages`.`name` as `p_name`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
LEFT JOIN `sma_designations` ON `sma_employees`.`designation_id`=`sma_designations`.`id`
ORDER BY `name` ASC, `c_name` ASC
 LIMIT 10
ERROR - 2018-07-02 00:52:14 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-02 01:00:46 --> Could not find the language line "Employee"
ERROR - 2018-07-02 01:00:47 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 01:00:47 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `sma_company`.`name` as `c_name`, `sma_operators`.`name` as `po_name`, `sma_packages`.`name` as `p_name`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
LEFT JOIN `sma_designations` ON `sma_employees`.`designation_id`=`sma_designations`.`id`
ORDER BY `name` ASC, `c_name` ASC
 LIMIT 10
ERROR - 2018-07-02 01:00:47 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-02 01:11:21 --> Could not find the language line "Employee"
ERROR - 2018-07-02 01:11:21 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 01:11:21 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `sma_company`.`name` as `c_name`, `sma_operators`.`name` as `po_name`, `sma_packages`.`name` as `p_name`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
LEFT JOIN `sma_designations` ON `sma_employees`.`designation_id`=`sma_designations`.`id`
ORDER BY `name` ASC, `c_name` ASC
 LIMIT 10
ERROR - 2018-07-02 01:11:22 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-02 01:12:23 --> Could not find the language line "Employee"
ERROR - 2018-07-02 01:12:23 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 01:12:24 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `sma_company`.`name` as `c_name`, `sma_operators`.`name` as `po_name`, `sma_packages`.`name` as `p_name`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
LEFT JOIN `sma_designations` ON `sma_employees`.`designation_id`=`sma_designations`.`id`
ORDER BY `name` ASC, `c_name` ASC
 LIMIT 10
ERROR - 2018-07-02 01:12:24 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-02 01:13:46 --> Could not find the language line "Employee"
ERROR - 2018-07-02 01:13:46 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 01:13:46 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `sma_company`.`name` as `c_name`, `sma_operators`.`name` as `po_name`, `sma_packages`.`name` as `p_name`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
LEFT JOIN `sma_designations` ON `sma_employees`.`designation_id`=`sma_designations`.`id`
ORDER BY `name` ASC, `c_name` ASC
 LIMIT 10
ERROR - 2018-07-02 01:13:46 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-02 01:56:11 --> Could not find the language line "Employee"
ERROR - 2018-07-02 01:56:11 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 01:56:16 --> Could not find the language line "Employee"
ERROR - 2018-07-02 01:56:16 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 04:40:04 --> Could not find the language line "Employee"
ERROR - 2018-07-02 04:40:04 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 04:40:05 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `sma_company`.`name` as `c_name`, `sma_operators`.`name` as `po_name`, `sma_packages`.`name` as `p_name`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
LEFT JOIN `sma_designations` ON `sma_employees`.`designation_id`=`sma_designations`.`id`
ORDER BY `name` ASC, `c_name` ASC
 LIMIT 10
ERROR - 2018-07-02 04:40:05 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-02 05:13:36 --> Could not find the language line "Employee"
ERROR - 2018-07-02 05:13:36 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-02 05:13:37 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `sma_company`.`name` as `c_name`, `sma_operators`.`name` as `po_name`, `sma_packages`.`name` as `p_name`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
LEFT JOIN `sma_designations` ON `sma_employees`.`designation_id`=`sma_designations`.`id`
ORDER BY `name` ASC, `c_name` ASC
 LIMIT 10
ERROR - 2018-07-02 05:13:37 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
