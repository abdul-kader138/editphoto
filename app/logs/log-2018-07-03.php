<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-07-03 23:48:36 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:48:36 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:49:38 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:49:38 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:49:59 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:49:59 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:50:27 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:50:27 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:50:42 --> Query error: Column 'employee_id' cannot be null - Invalid query: INSERT INTO `sma_employees` (`employee_id`, `designation_id`, `company_id`, `operator_id`, `package_id`, `email`, `mobile_number`, `ceiling_amount`, `name`, `service_start_date`, `active`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2018-07-03 23:50:42 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:50:42 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:50:45 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:50:45 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:50:46 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `sma_company`.`name` as `c_name`, `sma_operators`.`name` as `po_name`, `sma_packages`.`name` as `p_name`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
LEFT JOIN `sma_designations` ON `sma_employees`.`designation_id`=`sma_designations`.`id`
ORDER BY `name` ASC, `c_name` ASC
 LIMIT 10
ERROR - 2018-07-03 23:50:46 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-03 23:57:12 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:57:12 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:57:12 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `company_id`, `operator_id`, `package_id`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
LEFT JOIN `sma_designations` ON `sma_employees`.`designation_id`=`sma_designations`.`id`
ORDER BY `name` ASC, `company_id` ASC
 LIMIT 10
ERROR - 2018-07-03 23:57:12 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-03 23:57:37 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:57:37 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:57:38 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `company_id`, `operator_id`, `package_id`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
LEFT JOIN `sma_packages` ON `sma_employees`.`package_id`=`sma_packages`.`id`
ORDER BY `name` ASC, `company_id` ASC
 LIMIT 10
ERROR - 2018-07-03 23:57:38 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-03 23:57:46 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:57:46 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:57:47 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `company_id`, `operator_id`, `package_id`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
LEFT JOIN `sma_operators` ON `sma_employees`.`operator_id`=`sma_operators`.`id`
ORDER BY `name` ASC, `company_id` ASC
 LIMIT 10
ERROR - 2018-07-03 23:57:47 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-03 23:57:55 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:57:55 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:58:53 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:58:53 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:58:54 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name`, `company_id`, `operator_id`, `package_id`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
ORDER BY `name` ASC, `company_id` ASC
 LIMIT 10
ERROR - 2018-07-03 23:58:54 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-07-03 23:59:11 --> Could not find the language line "Employee"
ERROR - 2018-07-03 23:59:11 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-07-03 23:59:11 --> Query error: Column 'name' in field list is ambiguous - Invalid query: SELECT `sma_employees`.`id` as `id`, `employee_id`, `name` as `nam`, `company_id`, `operator_id`, `package_id`, `mobile_number`, `ceiling_amount`, `active`
FROM `sma_employees`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
ORDER BY `nam` ASC, `company_id` ASC
 LIMIT 10
ERROR - 2018-07-03 23:59:11 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
