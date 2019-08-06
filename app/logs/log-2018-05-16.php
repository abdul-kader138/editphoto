<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-05-16 05:25:46 --> Could not find the language line "attendance"
ERROR - 2018-05-16 05:25:46 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 05:26:05 --> Could not find the language line "attendance"
ERROR - 2018-05-16 05:26:05 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 05:28:24 --> Could not find the language line "attendance"
ERROR - 2018-05-16 05:28:24 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 05:30:28 --> Could not find the language line "attendance"
ERROR - 2018-05-16 05:30:28 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:19:45 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:19:45 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:19:52 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:19:52 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:20:36 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:20:36 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:34:47 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\sales_app\themes\default\views\header.php 809
ERROR - 2018-05-16 23:35:11 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\sales_app\themes\default\views\header.php 809
ERROR - 2018-05-16 23:35:29 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\sales_app\themes\default\views\header.php 809
ERROR - 2018-05-16 23:35:38 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\sales_app\themes\default\views\header.php 809
ERROR - 2018-05-16 23:35:44 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\xampp\htdocs\sales_app\themes\default\views\header.php 809
ERROR - 2018-05-16 23:36:51 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:36:51 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:40:18 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:40:18 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:45:00 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:45:00 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:47:43 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:47:43 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:47:43 --> Could not find the language line "purchase_count"
ERROR - 2018-05-16 23:47:43 --> Could not find the language line "Sub Category"
ERROR - 2018-05-16 23:47:43 --> Could not find the language line "Purchase_Count"
ERROR - 2018-05-16 23:47:44 --> Could not find the language line "Purchase History"
ERROR - 2018-05-16 23:50:05 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:50:05 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:51:05 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:51:05 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:51:05 --> Could not find the language line "purchase_count"
ERROR - 2018-05-16 23:51:05 --> Could not find the language line "Sub Category"
ERROR - 2018-05-16 23:51:05 --> Could not find the language line "Purchase_Count"
ERROR - 2018-05-16 23:51:06 --> Could not find the language line "Purchase History"
ERROR - 2018-05-16 23:55:37 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:55:37 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:56:12 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:56:12 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:56:13 --> Query error: Unknown column 'PSales.totalSale' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_products.cost, sma_products.price, sma_brands.name as brand, sma_categories.name as cname, (COALESCE( PSales.totalSale, 0 ) - COALESCE( PCosts.totalPurchase, 0 )) as Profit, CONCAT(COALESCE( PCosts.balacneQty, 0 ), '__', COALESCE( PCosts.balacneValue, 0 )) as balance, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
GROUP BY `sma_products`.`code`
ORDER BY `sma_products`.`price` DESC, `sma_products`.`cost` DESC
 LIMIT 10
ERROR - 2018-05-16 23:56:14 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-16 23:59:49 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:59:49 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-16 23:59:56 --> Could not find the language line "attendance"
ERROR - 2018-05-16 23:59:56 --> Could not find the language line "Time Schedule Report"
