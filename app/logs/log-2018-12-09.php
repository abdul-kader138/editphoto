<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-09 00:06:21 --> Could not find the language line "Employee"
ERROR - 2018-12-09 00:06:21 --> Could not find the language line "Guard"
ERROR - 2018-12-09 00:06:21 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 00:06:23 --> Could not find the language line "Employee"
ERROR - 2018-12-09 00:06:23 --> Could not find the language line "Guard"
ERROR - 2018-12-09 00:06:23 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 00:06:28 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees`.`company_id`, `sma_employees_payment`.`employee_id` as `employee_ids`, `sma_employees`.`name` as `nam`, `sma_company`.`name` as `c_name`, `sma_employees_payment`.`bank_name`, `sma_employees_payment`.`bank_account`, `sma_employees_payment`.`gross_salary`, `sma_employees_payment`.`payment_payroll` as `payment_payroll`, `sma_employees_payment`.`payment_other`, `sma_employees`.`active` as `actives`
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees_payment`.`employee_id`=`sma_employees`.`employee_id`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
WHERE `id` = '696'
GROUP BY `sma_employees_payment`.`id`
ERROR - 2018-12-09 00:06:28 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 299
ERROR - 2018-12-09 00:06:41 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees`.`company_id`, `sma_employees_payment`.`employee_id` as `employee_ids`, `sma_employees`.`name` as `nam`, `sma_company`.`name` as `c_name`, `sma_employees_payment`.`bank_name`, `sma_employees_payment`.`bank_account`, `sma_employees_payment`.`gross_salary`, `sma_employees_payment`.`payment_payroll` as `payment_payroll`, `sma_employees_payment`.`payment_other`, `sma_employees`.`active` as `actives`
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees_payment`.`employee_id`=`sma_employees`.`employee_id`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
WHERE `id` = '696'
GROUP BY `sma_employees_payment`.`id`
ERROR - 2018-12-09 00:06:41 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 299
ERROR - 2018-12-09 00:06:46 --> Could not find the language line "Employee"
ERROR - 2018-12-09 00:06:46 --> Could not find the language line "Guard"
ERROR - 2018-12-09 00:06:46 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 00:17:35 --> Could not find the language line "Employee"
ERROR - 2018-12-09 00:17:35 --> Could not find the language line "Guard"
ERROR - 2018-12-09 00:17:35 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 00:17:43 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees`.*, `sma_employees_payment`.*
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees_payment`.`employee_id`=`sma_employees`.`employee_id`
LEFT JOIN `sma_company` ON `sma_employees`.`company_id`=`sma_company`.`id`
WHERE `id` = '696'
GROUP BY `sma_employees_payment`.`id`
ERROR - 2018-12-09 00:17:43 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 299
ERROR - 2018-12-09 00:19:43 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*, `sma_employees`.`name` as `nam`
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees_payment`.`employee_id`=`sma_employees`.`employee_id`
WHERE `id` = '696'
GROUP BY `sma_employees_payment`.`id`
ERROR - 2018-12-09 00:19:43 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 299
ERROR - 2018-12-09 00:19:55 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*, `sma_employees`.`name` as `nam`
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees_payment`.`employee_id`=`sma_employees`.`employee_id`
WHERE `id` = '696'
GROUP BY `sma_employees_payment`.`id`
ERROR - 2018-12-09 00:19:55 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 299
ERROR - 2018-12-09 00:20:26 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees_payment`.`employee_id`=`sma_employees`.`employee_id`
WHERE `id` = '696'
GROUP BY `sma_employees_payment`.`id`
ERROR - 2018-12-09 00:20:26 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 299
ERROR - 2018-12-09 00:21:01 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees`.`employee_id`=`sma_employees_payment`.`employee_id`
WHERE `id` = '696'
GROUP BY `sma_employees_payment`.`id`
ERROR - 2018-12-09 00:21:01 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 299
ERROR - 2018-12-09 01:19:13 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees`.`employee_id`=`sma_employees_payment`.`employee_id`
WHERE `id` = '696'
GROUP BY `id`
ERROR - 2018-12-09 01:19:13 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 299
ERROR - 2018-12-09 01:19:21 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:19:21 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:19:21 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:19:38 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees`.`employee_id`=`sma_employees_payment`.`employee_id`
WHERE `id` = '696'
GROUP BY `id`
ERROR - 2018-12-09 01:19:38 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 299
ERROR - 2018-12-09 01:20:34 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees`.`employee_id`=`sma_employees_payment`.`employee_id`
WHERE `id` = '696'
ERROR - 2018-12-09 01:20:34 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 299
ERROR - 2018-12-09 01:22:35 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:22:35 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:22:35 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:22:44 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*
FROM `sma_employees_payment`
LEFT JOIN `sma_employees` ON `sma_employees`.`employee_id`=`sma_employees_payment`.`employee_id`
WHERE `id` = '696'
ERROR - 2018-12-09 01:22:44 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 300
ERROR - 2018-12-09 01:23:33 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*, `sma_employees`.`company_id`
FROM `sma_employees_payment`
LEFT JOIN `sma_employees` ON `sma_employees`.`employee_id`=`sma_employees_payment`.`employee_id`
WHERE `id` = '696'
ERROR - 2018-12-09 01:23:33 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 300
ERROR - 2018-12-09 01:25:12 --> Query error: Unknown column 'sma_employees.company_id' in 'field list' - Invalid query: SELECT `sma_employees_payment`.*, `sma_employees`.`company_id`
FROM `sma_employees_payment`
WHERE `id` = '696'
ERROR - 2018-12-09 01:25:12 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 300
ERROR - 2018-12-09 01:29:39 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:29:39 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:29:39 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:29:41 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:29:41 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:29:41 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:30:58 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:30:58 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:30:58 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:31:02 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*
FROM `sma_employees_payment`
INNER JOIN `sma_employees` ON `sma_employees`.`employee_id`=`sma_employees_payment`.`employee_id`
WHERE `id` = '696'
ERROR - 2018-12-09 01:31:02 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 295
ERROR - 2018-12-09 01:32:05 --> Severity: Parsing Error --> syntax error, unexpected '$q' (T_VARIABLE) C:\xampp\htdocs\admin_app\app\models\Employees_model.php 296
ERROR - 2018-12-09 01:32:17 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*, `sma_employees`.`employee_id`
FROM `sma_employees_payment`
LEFT JOIN `sma_employees` ON `sma_employees`.`employee_id`=`sma_employees_payment`.`employee_id`
WHERE `id` = '696'
ERROR - 2018-12-09 01:32:17 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 297
ERROR - 2018-12-09 01:35:30 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*, `sma_employees`.`employee_id`
FROM `sma_employees_payment`
LEFT JOIN `sma_employees` ON `sma_employees`.`employee_id`=`sma_employees_payment`.`employee_id`
WHERE `id` = '696'
ERROR - 2018-12-09 01:35:30 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 301
ERROR - 2018-12-09 01:36:01 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:36:01 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:36:01 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:36:06 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `sma_employees_payment`.*, `sma_employees`.`employee_id`
FROM `sma_employees_payment`
LEFT JOIN `sma_employees` ON `sma_employees`.`employee_id`=`sma_employees_payment`.`employee_id`
WHERE `id` = '696'
ERROR - 2018-12-09 01:36:30 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\models\Employees_model.php 301
ERROR - 2018-12-09 01:40:29 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:40:29 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:40:29 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:42:15 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:42:15 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:42:15 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:57:13 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:57:13 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:57:13 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:57:19 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:57:19 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:57:19 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:57:22 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:57:22 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:57:22 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:57:22 --> Could not find the language line "Backup_Database"
ERROR - 2018-12-09 01:58:13 --> Could not find the language line "Employee"
ERROR - 2018-12-09 01:58:13 --> Could not find the language line "Guard"
ERROR - 2018-12-09 01:58:13 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 01:58:13 --> Could not find the language line "Backup_Database"
ERROR - 2018-12-09 02:05:49 --> Could not find the language line "Employee"
ERROR - 2018-12-09 02:05:49 --> Could not find the language line "Guard"
ERROR - 2018-12-09 02:05:49 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 02:05:49 --> Could not find the language line "Backup_Database"
ERROR - 2018-12-09 02:05:55 --> Could not find the language line "Employee"
ERROR - 2018-12-09 02:05:55 --> Could not find the language line "Guard"
ERROR - 2018-12-09 02:05:55 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 02:05:55 --> Could not find the language line "Backup_Database"
ERROR - 2018-12-09 02:09:47 --> Could not find the language line "Employee"
ERROR - 2018-12-09 02:09:47 --> Could not find the language line "Guard"
ERROR - 2018-12-09 02:09:47 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 02:09:47 --> Could not find the language line "Backup_Database"
ERROR - 2018-12-09 02:11:41 --> Could not find the language line "Employee"
ERROR - 2018-12-09 02:11:41 --> Could not find the language line "Guard"
ERROR - 2018-12-09 02:11:41 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 02:11:42 --> Could not find the language line "Backup_Database"
ERROR - 2018-12-09 02:12:13 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:20:16 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:21:26 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:21:26 --> Could not find the language line "EBL(Poultry)"
ERROR - 2018-12-09 02:21:26 --> Could not find the language line "EBL(Jessore)"
ERROR - 2018-12-09 02:21:31 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:21:34 --> Could not find the language line "mobile_number"
ERROR - 2018-12-09 02:21:34 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:21:42 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:21:42 --> Could not find the language line "EBL(Poultry)"
ERROR - 2018-12-09 02:21:42 --> Could not find the language line "EBL(Jessore)"
ERROR - 2018-12-09 02:23:11 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:23:47 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:23:47 --> Could not find the language line "EBL(Poultry)"
ERROR - 2018-12-09 02:23:47 --> Could not find the language line "EBL(Jessore)"
ERROR - 2018-12-09 02:29:16 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:29:16 --> Could not find the language line "EBL(Poultry)"
ERROR - 2018-12-09 02:29:16 --> Could not find the language line "EBL(Jessore)"
ERROR - 2018-12-09 02:29:18 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:33:49 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:35:42 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:36:39 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:40:34 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:40:51 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:41:32 --> Could not find the language line "Settings"
ERROR - 2018-12-09 02:44:15 --> Could not find the language line "Settings"
ERROR - 2018-12-09 04:25:03 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:03:54 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:04:06 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:04:14 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:04:38 --> Severity: Error --> Call to undefined method Employees_model::addPayments() C:\xampp\htdocs\admin_app\app\controllers\Employees.php 1373
ERROR - 2018-12-09 05:05:24 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:05:31 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:05:42 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:05:42 --> Could not find the language line "EBL(Poultry)"
ERROR - 2018-12-09 05:05:42 --> Could not find the language line "EBL(Jessore)"
ERROR - 2018-12-09 05:05:49 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:05:51 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:07:06 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_keys() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_diff(): Argument #2 is not an array C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_keys() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_diff(): Argument #1 is not an array C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> ksort() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1562
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1567
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_keys() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_diff(): Argument #2 is not an array C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_keys() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_diff(): Argument #1 is not an array C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> ksort() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1562
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1567
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_keys() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_diff(): Argument #2 is not an array C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_keys() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_diff(): Argument #1 is not an array C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> ksort() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1562
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1567
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_keys() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_diff(): Argument #2 is not an array C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_keys() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> array_diff(): Argument #1 is not an array C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1555
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> ksort() expects parameter 1 to be array, double given C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1562
ERROR - 2018-12-09 05:07:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\admin_app\system\database\DB_query_builder.php 1567
ERROR - 2018-12-09 05:07:48 --> Query error: Column count doesn't match value count at row 2 - Invalid query: INSERT INTO `sma_salary` (`absent_days`, `created_by`, `created_date`, `employee_id`, `end_date`, `gross_absent_deduction`, `gross_holiday_allowance`, `gross_salary`, `holiday_allowance`, `month`, `payment_other`, `payment_other_absent_deduction`, `payment_other_holiday_allowance`, `payment_payroll`, `reference_no`, `start_date`, `year`) VALUES (1,'3','2018-12-09 05:07:18am','PG000351','2018-12-09',0,0,'3500.00',15,'November','1000.00',0,0,'2500.00','2018_November','2018-12-01','2018'), (), (), (), ()
ERROR - 2018-12-09 05:07:48 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:09:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Array' at line 1 - Invalid query: INSERT INTO `sma_salary` () VALUES (1,'3','2018-12-09 05:08:49am','PG000351','2018-12-09',0,0,'3500.00',15,'November','1000.00',0,0,'2500.00','2018_November','2018-12-01','2018'), Array
ERROR - 2018-12-09 05:09:03 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:16:03 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:16:04 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:18:14 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:18:24 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:39:31 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:39:32 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:39:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ' `sma_bills`.`year`
FROM `sma_salary`
GROUP BY `sma_salary`.`month`, `sma_salary' at line 1 - Invalid query: SELECT `sma_salary`.`reference_no` as `id`, `sma_salary`.`month` as `op_name`, `sma_salary`.`year` as `pa_name`, sum(sma_salary.payment_other) as c_amount, round(sum(sma_salary.payment_other_absent_deduction), 2) as u_amount, round(sum(sma_salary.payment_other_holiday_allowance, `sma_bills`.`year`
FROM `sma_salary`
GROUP BY `sma_salary`.`month`, `sma_salary`.`year`, `sma_salary`.`reference_no`
ORDER BY round(sum(sma_salary.payment_other_holiday_allowance DESC, `sma_bills`.`year` DESC
 LIMIT 10
ERROR - 2018-12-09 05:39:32 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-12-09 05:41:02 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:41:02 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:41:02 --> Query error: Unknown column 'sma_bills.year' in 'field list' - Invalid query: SELECT `sma_salary`.`reference_no` as `id`, `sma_salary`.`month` as `op_name`, `sma_salary`.`year` as `pa_name`, sum(sma_salary.payment_other) as c_amount, round(sum(sma_salary.payment_other_absent_deduction), 2) as u_amount, round(sum(sma_salary.payment_other_holiday_allowance), 2) as b_amount, `sma_bills`.`year`
FROM `sma_salary`
GROUP BY `sma_salary`.`month`, `sma_salary`.`year`, `sma_salary`.`reference_no`
ORDER BY `b_amount` DESC
 LIMIT 10
ERROR - 2018-12-09 05:41:02 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 367
ERROR - 2018-12-09 05:41:25 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:41:26 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:45:07 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:45:07 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:46:11 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:46:12 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:46:54 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:46:54 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:47:26 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:47:27 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:47:50 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:47:51 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:48:10 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:48:11 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:48:25 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:48:25 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:48:43 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:48:43 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:48:58 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:48:59 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:49:08 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:49:09 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:57:49 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:57:50 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 05:58:18 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:58:18 --> Could not find the language line "Dues"
ERROR - 2018-12-09 05:59:32 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:59:32 --> Could not find the language line "Dues"
ERROR - 2018-12-09 05:59:58 --> Could not find the language line "Settings"
ERROR - 2018-12-09 05:59:58 --> Could not find the language line "Dues"
ERROR - 2018-12-09 06:00:58 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:00:58 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:00:58 --> Could not find the language line "Dues"
ERROR - 2018-12-09 06:02:57 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:02:57 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:02:57 --> Could not find the language line "Dues"
ERROR - 2018-12-09 06:03:45 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:03:45 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:03:45 --> Could not find the language line "Dues"
ERROR - 2018-12-09 06:04:39 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:04:39 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:04:39 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:04:39 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:04:39 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:04:39 --> Could not find the language line "Dues"
ERROR - 2018-12-09 06:06:06 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:06:06 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:06:06 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:06:06 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:06:06 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:06:06 --> Could not find the language line "Dues"
ERROR - 2018-12-09 06:08:53 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:08:53 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:08:53 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:08:53 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:08:53 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:09:28 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:09:28 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:09:28 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:09:28 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:09:28 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:09:28 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:11:21 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:11:21 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:11:21 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:11:21 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:11:21 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:11:21 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:11:26 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:13:21 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:13:29 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:13:30 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 06:13:32 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:13:32 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:13:32 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:13:32 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:13:32 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:13:32 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:14:23 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:14:23 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:14:23 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:14:23 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:14:23 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:14:23 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:14:47 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:14:47 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:14:47 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:14:47 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:14:47 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:14:47 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:15:06 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:15:06 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:15:06 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:15:06 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:15:06 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:15:06 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:15:26 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:15:26 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:15:26 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:15:26 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:15:26 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:15:26 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:15:58 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:15:58 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:15:58 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:15:58 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:15:58 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:15:58 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:16:05 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:16:41 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:16:41 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 06:16:43 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:16:43 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:16:43 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:16:43 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:16:43 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:16:43 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:17:46 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:17:46 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:17:46 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:17:46 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:17:46 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:17:46 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:27:05 --> Could not find the language line "Dues"
ERROR - 2018-12-09 06:27:05 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\admin_app\themes\default\views\employees\pdf.php 109
ERROR - 2018-12-09 06:28:13 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:28:13 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 06:28:13 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 06:28:13 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 06:28:13 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 06:28:13 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 06:28:15 --> Could not find the language line "Dues"
ERROR - 2018-12-09 06:29:44 --> Could not find the language line "Settings"
ERROR - 2018-12-09 06:30:08 --> Could not find the language line "Dues"
ERROR - 2018-12-09 22:22:28 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:22:28 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:22:28 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:22:35 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:22:35 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:22:35 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:22:36 --> Could not find the language line "bill_details_company"
ERROR - 2018-12-09 22:22:38 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:22:39 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:22:39 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:22:39 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:22:39 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:22:39 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:22:39 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:22:39 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:22:46 --> Could not find the language line "Dues"
ERROR - 2018-12-09 22:24:11 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:24:11 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:24:11 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:24:21 --> Could not find the language line "Dues"
ERROR - 2018-12-09 22:24:53 --> Could not find the language line "Dues"
ERROR - 2018-12-09 22:26:42 --> Could not find the language line "Dues"
ERROR - 2018-12-09 22:27:07 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:27:07 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:27:07 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:27:07 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:27:07 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:27:07 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:27:07 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:27:07 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:27:16 --> Could not find the language line "Dues"
ERROR - 2018-12-09 22:28:09 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:28:09 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:28:09 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:28:09 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:28:12 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:28:38 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:28:38 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:28:38 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:28:38 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:28:38 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:28:38 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:28:38 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:28:38 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:28:40 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:28:40 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:28:40 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:28:40 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:28:40 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:30:09 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:30:09 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:30:09 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:30:09 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:30:09 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:30:09 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:30:09 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:30:10 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:30:11 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:30:11 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:30:11 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:30:11 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:30:11 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:31:08 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:31:08 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:31:08 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:31:08 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:31:08 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:31:08 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:31:08 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:31:08 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:31:10 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:31:10 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:31:11 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:31:11 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:31:11 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:32:33 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:32:33 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:32:33 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:32:33 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:32:33 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:32:33 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:32:33 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:32:33 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:32:34 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:32:35 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:32:35 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:32:35 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:32:35 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:33:35 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:33:35 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:33:35 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:33:35 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:33:35 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:33:35 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:33:35 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:33:35 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:33:39 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:33:39 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:33:39 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:33:39 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:33:39 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:33:39 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:33:39 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:33:39 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:35:18 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:35:18 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:35:18 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:35:18 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:35:18 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:35:18 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:35:18 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:35:18 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:35:42 --> Could not find the language line "Employee"
ERROR - 2018-12-09 22:35:42 --> Could not find the language line "Guard"
ERROR - 2018-12-09 22:35:42 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-12-09 22:35:42 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:35:42 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:35:43 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:35:43 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:35:43 --> Could not find the language line "Grand_Total"
ERROR - 2018-12-09 22:35:44 --> Could not find the language line "Salary_Amount"
ERROR - 2018-12-09 22:35:44 --> Could not find the language line "Absent_Deduction"
ERROR - 2018-12-09 22:35:44 --> Could not find the language line "Holiday_allowance"
ERROR - 2018-12-09 22:35:44 --> Could not find the language line "Total_Amount"
ERROR - 2018-12-09 22:35:44 --> Could not find the language line "Grand_Total"
