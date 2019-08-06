<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Waiting_For_Approval"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Manpower_Requisition"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Recruitment_Approval"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Employees"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Bills"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Documents"
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Doc_Mov."
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "File_Exp."
ERROR - 2019-06-27 06:31:55 --> Could not find the language line "Man._Req."
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:31:58 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:32:06 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:32:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%2021%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_document' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%2021%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:32:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%2021%'
GROUP BY `sma_documents`.`id`' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%2021%'
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:32:06 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:34:52 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:34:57 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:34:58 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:35:02 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:35:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%2021%' OR `sma_documents`.`year` LIKE '%2021%' OR `sma_documents`.`status' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%2021%' OR `sma_documents`.`name` LIKE '%2021%' OR `sma_documents`.`reference_no` LIKE '%2021%' OR `sma_documents`.`address` LIKE '%2021%' OR `sma_documents`.`instrument` LIKE '%2021%' OR `sma_documents`.`instrument_no` LIKE '%2021%' OR `sma_banks`.`name` LIKE '%2021%' OR `sma_brands`.`name` LIKE '%2021%' OR  LIKE '%2021%' OR `sma_documents`.`year` LIKE '%2021%' OR `sma_documents`.`status` LIKE '%2021%' OR `sma_documents`.`credit_limit` LIKE '%2021%' OR `sma_documents`.`total_cheque` LIKE '%2021%' )
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:35:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%2021%' OR `sma_documents`.`year` LIKE '%2021%' OR `sma_documents`.`status' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%2021%' OR `sma_documents`.`name` LIKE '%2021%' OR `sma_documents`.`reference_no` LIKE '%2021%' OR `sma_documents`.`address` LIKE '%2021%' OR `sma_documents`.`instrument` LIKE '%2021%' OR `sma_documents`.`instrument_no` LIKE '%2021%' OR `sma_banks`.`name` LIKE '%2021%' OR `sma_brands`.`name` LIKE '%2021%' OR  LIKE '%2021%' OR `sma_documents`.`year` LIKE '%2021%' OR `sma_documents`.`status` LIKE '%2021%' OR `sma_documents`.`credit_limit` LIKE '%2021%' OR `sma_documents`.`total_cheque` LIKE '%2021%' )
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:35:02 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:35:14 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:35:22 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:35:24 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:35:31 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:36:04 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:36:09 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:36:10 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:36:23 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:36:24 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:36:29 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:37:43 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:38:07 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:38:17 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:38:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%2%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%2%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:38:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%2%'
GROUP BY `sma_documents`.`id`' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%2%'
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:38:17 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:38:18 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:38:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%20%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%20%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:38:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%20%'
GROUP BY `sma_documents`.`id`' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%20%'
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:38:18 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:38:58 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:38:59 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:39:05 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:39:09 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:39:36 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:42:54 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:42:58 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:43:02 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:43:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%2020%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_document' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%2020%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:43:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%2020%'
GROUP BY `sma_documents`.`id`' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%2020%'
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:43:02 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:43:58 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:43:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%2%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%2%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:43:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%2%'
GROUP BY `sma_documents`.`id`' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%2%'
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:43:58 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:43:59 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:44:11 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:44:16 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:44:22 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:44:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%200%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%200%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:44:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%200%'
GROUP BY `sma_documents`.`id`' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%200%'
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:44:22 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:44:26 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:48:09 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:48:10 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:48:19 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:48:20 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:50:39 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:50:44 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:50:45 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:51:14 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:51:41 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:51:42 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:52:25 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:52:31 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:52:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%2021%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_document' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%2021%'
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:52:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE =  '%2021%'
GROUP BY `sma_documents`.`id`' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE  LIKE =  '%2021%'
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:52:31 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:52:42 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:52:47 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:52:52 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:52:55 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:53:40 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:53:41 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:53:46 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:53:50 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:54:21 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:54:24 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:54:27 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:54:30 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:54:31 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:54:33 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:54:35 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:56:03 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:56:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%In %' OR `sma_documents`.`year` LIKE '%In %' OR `sma_documents`.`status` ' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%In %' OR `sma_documents`.`name` LIKE '%In %' OR `sma_documents`.`reference_no` LIKE '%In %' OR `sma_documents`.`address` LIKE '%In %' OR `sma_documents`.`instrument` LIKE '%In %' OR `sma_documents`.`instrument_no` LIKE '%In %' OR `sma_banks`.`name` LIKE '%In %' OR `sma_brands`.`name` LIKE '%In %' OR  LIKE '%In %' OR `sma_documents`.`year` LIKE '%In %' OR `sma_documents`.`status` LIKE '%In %' OR `sma_documents`.`credit_limit` LIKE '%In %' OR `sma_documents`.`total_cheque` LIKE '%In %' )
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:56:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%In %' OR `sma_documents`.`year` LIKE '%In %' OR `sma_documents`.`status` ' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%In %' OR `sma_documents`.`name` LIKE '%In %' OR `sma_documents`.`reference_no` LIKE '%In %' OR `sma_documents`.`address` LIKE '%In %' OR `sma_documents`.`instrument` LIKE '%In %' OR `sma_documents`.`instrument_no` LIKE '%In %' OR `sma_banks`.`name` LIKE '%In %' OR `sma_brands`.`name` LIKE '%In %' OR  LIKE '%In %' OR `sma_documents`.`year` LIKE '%In %' OR `sma_documents`.`status` LIKE '%In %' OR `sma_documents`.`credit_limit` LIKE '%In %' OR `sma_documents`.`total_cheque` LIKE '%In %' )
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:56:03 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:56:07 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:56:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%In%' OR `sma_documents`.`year` LIKE '%In%' OR `sma_documents`.`status` LI' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%In%' OR `sma_documents`.`name` LIKE '%In%' OR `sma_documents`.`reference_no` LIKE '%In%' OR `sma_documents`.`address` LIKE '%In%' OR `sma_documents`.`instrument` LIKE '%In%' OR `sma_documents`.`instrument_no` LIKE '%In%' OR `sma_banks`.`name` LIKE '%In%' OR `sma_brands`.`name` LIKE '%In%' OR  LIKE '%In%' OR `sma_documents`.`year` LIKE '%In%' OR `sma_documents`.`status` LIKE '%In%' OR `sma_documents`.`credit_limit` LIKE '%In%' OR `sma_documents`.`total_cheque` LIKE '%In%' )
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:56:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%In%' OR `sma_documents`.`year` LIKE '%In%' OR `sma_documents`.`status` LI' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%In%' OR `sma_documents`.`name` LIKE '%In%' OR `sma_documents`.`reference_no` LIKE '%In%' OR `sma_documents`.`address` LIKE '%In%' OR `sma_documents`.`instrument` LIKE '%In%' OR `sma_documents`.`instrument_no` LIKE '%In%' OR `sma_banks`.`name` LIKE '%In%' OR `sma_brands`.`name` LIKE '%In%' OR  LIKE '%In%' OR `sma_documents`.`year` LIKE '%In%' OR `sma_documents`.`status` LIKE '%In%' OR `sma_documents`.`credit_limit` LIKE '%In%' OR `sma_documents`.`total_cheque` LIKE '%In%' )
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:56:07 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:56:10 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:56:13 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:56:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%D%' OR `sma_documents`.`year` LIKE '%D%' OR `sma_documents`.`status` LIKE' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%D%' OR `sma_documents`.`name` LIKE '%D%' OR `sma_documents`.`reference_no` LIKE '%D%' OR `sma_documents`.`address` LIKE '%D%' OR `sma_documents`.`instrument` LIKE '%D%' OR `sma_documents`.`instrument_no` LIKE '%D%' OR `sma_banks`.`name` LIKE '%D%' OR `sma_brands`.`name` LIKE '%D%' OR  LIKE '%D%' OR `sma_documents`.`year` LIKE '%D%' OR `sma_documents`.`status` LIKE '%D%' OR `sma_documents`.`credit_limit` LIKE '%D%' OR `sma_documents`.`total_cheque` LIKE '%D%' )
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:56:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%D%' OR `sma_documents`.`year` LIKE '%D%' OR `sma_documents`.`status` LIKE' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%D%' OR `sma_documents`.`name` LIKE '%D%' OR `sma_documents`.`reference_no` LIKE '%D%' OR `sma_documents`.`address` LIKE '%D%' OR `sma_documents`.`instrument` LIKE '%D%' OR `sma_documents`.`instrument_no` LIKE '%D%' OR `sma_banks`.`name` LIKE '%D%' OR `sma_brands`.`name` LIKE '%D%' OR  LIKE '%D%' OR `sma_documents`.`year` LIKE '%D%' OR `sma_documents`.`status` LIKE '%D%' OR `sma_documents`.`credit_limit` LIKE '%D%' OR `sma_documents`.`total_cheque` LIKE '%D%' )
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:56:13 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:56:13 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:56:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%Dha%' OR `sma_documents`.`year` LIKE '%Dha%' OR `sma_documents`.`status` ' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%Dha%' OR `sma_documents`.`name` LIKE '%Dha%' OR `sma_documents`.`reference_no` LIKE '%Dha%' OR `sma_documents`.`address` LIKE '%Dha%' OR `sma_documents`.`instrument` LIKE '%Dha%' OR `sma_documents`.`instrument_no` LIKE '%Dha%' OR `sma_banks`.`name` LIKE '%Dha%' OR `sma_brands`.`name` LIKE '%Dha%' OR  LIKE '%Dha%' OR `sma_documents`.`year` LIKE '%Dha%' OR `sma_documents`.`status` LIKE '%Dha%' OR `sma_documents`.`credit_limit` LIKE '%Dha%' OR `sma_documents`.`total_cheque` LIKE '%Dha%' )
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:56:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%Dha%' OR `sma_documents`.`year` LIKE '%Dha%' OR `sma_documents`.`status` ' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%Dha%' OR `sma_documents`.`name` LIKE '%Dha%' OR `sma_documents`.`reference_no` LIKE '%Dha%' OR `sma_documents`.`address` LIKE '%Dha%' OR `sma_documents`.`instrument` LIKE '%Dha%' OR `sma_documents`.`instrument_no` LIKE '%Dha%' OR `sma_banks`.`name` LIKE '%Dha%' OR `sma_brands`.`name` LIKE '%Dha%' OR  LIKE '%Dha%' OR `sma_documents`.`year` LIKE '%Dha%' OR `sma_documents`.`status` LIKE '%Dha%' OR `sma_documents`.`credit_limit` LIKE '%Dha%' OR `sma_documents`.`total_cheque` LIKE '%Dha%' )
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:56:14 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:56:16 --> Could not find the language line "Status_Update"
ERROR - 2019-06-27 06:56:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%Dhaka%' OR `sma_documents`.`year` LIKE '%Dhaka%' OR `sma_documents`.`stat' at line 5 - Invalid query: SELECT `sma_documents`.`id` as `id`, `sma_documents`.`name` as `nam`, `sma_documents`.`reference_no` as `ref`, `sma_documents`.`address`, `sma_documents`.`instrument`, `sma_documents`.`instrument_no`, `sma_banks`.`name` as `c_name`, `sma_brands`.`name` as `b_name`, `sma_documents`.`year` as `years`, `sma_documents`.`status`, `sma_documents`.`credit_limit`, `sma_documents`.`total_cheque`
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%Dhaka%' OR `sma_documents`.`name` LIKE '%Dhaka%' OR `sma_documents`.`reference_no` LIKE '%Dhaka%' OR `sma_documents`.`address` LIKE '%Dhaka%' OR `sma_documents`.`instrument` LIKE '%Dhaka%' OR `sma_documents`.`instrument_no` LIKE '%Dhaka%' OR `sma_banks`.`name` LIKE '%Dhaka%' OR `sma_brands`.`name` LIKE '%Dhaka%' OR  LIKE '%Dhaka%' OR `sma_documents`.`year` LIKE '%Dhaka%' OR `sma_documents`.`status` LIKE '%Dhaka%' OR `sma_documents`.`credit_limit` LIKE '%Dhaka%' OR `sma_documents`.`total_cheque` LIKE '%Dhaka%' )
GROUP BY `sma_documents`.`id`
ORDER BY `ref` ASC, `sma_documents`.`address` ASC
 LIMIT 20
ERROR - 2019-06-27 06:56:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%Dhaka%' OR `sma_documents`.`year` LIKE '%Dhaka%' OR `sma_documents`.`stat' at line 5 - Invalid query: SELECT *
FROM `sma_documents`
LEFT JOIN `sma_brands` ON `sma_documents`.`commission_id`=`sma_brands`.`id`
LEFT JOIN `sma_banks` ON `sma_documents`.`instrument_bank`=`sma_banks`.`id`
WHERE (`sma_documents`.`id` LIKE '%Dhaka%' OR `sma_documents`.`name` LIKE '%Dhaka%' OR `sma_documents`.`reference_no` LIKE '%Dhaka%' OR `sma_documents`.`address` LIKE '%Dhaka%' OR `sma_documents`.`instrument` LIKE '%Dhaka%' OR `sma_documents`.`instrument_no` LIKE '%Dhaka%' OR `sma_banks`.`name` LIKE '%Dhaka%' OR `sma_brands`.`name` LIKE '%Dhaka%' OR  LIKE '%Dhaka%' OR `sma_documents`.`year` LIKE '%Dhaka%' OR `sma_documents`.`status` LIKE '%Dhaka%' OR `sma_documents`.`credit_limit` LIKE '%Dhaka%' OR `sma_documents`.`total_cheque` LIKE '%Dhaka%' )
GROUP BY `sma_documents`.`id`
ERROR - 2019-06-27 06:56:16 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\admin_app\app\libraries\Datatables.php 438
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Employee"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Guard"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "File_Manager"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "File_Manager_New"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "HR"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "List_Manpower_Requisition"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Add_Manpower_Requisition"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "List_Recruitment_Approval"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Add_Recruitment_Approval"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Approver_Setup"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Address"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Instrument"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Instrument_No"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Bank"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Commission_Type"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Year"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Status"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Credit_Limit"
ERROR - 2019-06-27 06:56:53 --> Could not find the language line "Total_Cheque"
ERROR - 2019-06-27 06:56:54 --> Could not find the language line "Status_Update"
