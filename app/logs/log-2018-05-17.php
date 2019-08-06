<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-05-17 00:00:21 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:00:21 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:00:21 --> Query error: Unknown column 'PSales.totalSale' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_products.cost, sma_products.price, sma_brands.name as brand, sma_categories.name as cname, (COALESCE( PSales.totalSale, 0 ) - COALESCE( PCosts.totalPurchase, 0 )) as Profit, CONCAT(COALESCE( PCosts.balacneQty, 0 ), '__', COALESCE( PCosts.balacneValue, 0 )) as balance, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
GROUP BY `sma_products`.`code`
ORDER BY `sma_products`.`price` DESC, `sma_products`.`cost` DESC
 LIMIT 10
ERROR - 2018-05-17 00:00:22 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 00:00:30 --> Query error: Unknown column 'PSales.totalSale' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_products.cost, sma_products.price, sma_brands.name as brand, sma_categories.name as cname, (COALESCE( PSales.totalSale, 0 ) - COALESCE( PCosts.totalPurchase, 0 )) as Profit, CONCAT(COALESCE( PCosts.balacneQty, 0 ), '__', COALESCE( PCosts.balacneValue, 0 )) as balance, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
GROUP BY `sma_products`.`code`
ERROR - 2018-05-17 00:00:32 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 00:01:29 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:01:29 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:02:51 --> Could not find the language line "Purchase History"
ERROR - 2018-05-17 00:02:53 --> Could not find the language line "Purchase History"
ERROR - 2018-05-17 00:02:54 --> Could not find the language line "Purchase History"
ERROR - 2018-05-17 00:02:55 --> Could not find the language line "Purchase History"
ERROR - 2018-05-17 00:02:57 --> Could not find the language line "Purchase History"
ERROR - 2018-05-17 00:02:59 --> Could not find the language line "Purchase History"
ERROR - 2018-05-17 00:03:07 --> Could not find the language line "Purchase History"
ERROR - 2018-05-17 00:03:10 --> Could not find the language line "Purchase History"
ERROR - 2018-05-17 00:03:27 --> Could not find the language line "Purchase History"
ERROR - 2018-05-17 00:03:29 --> Could not find the language line "Purchase History"
ERROR - 2018-05-17 00:07:17 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:07:17 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:07:42 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:07:42 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:08:03 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:08:03 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:08:44 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:08:44 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:19:31 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:19:31 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:31:21 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:31:22 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:31:53 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:31:53 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:32:10 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:32:10 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:32:33 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:32:33 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:32:44 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:32:44 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:34:30 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:34:30 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:35:42 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:35:42 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:36:46 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:36:46 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:40:42 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:40:42 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:41:52 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:41:52 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:42:49 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:42:49 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:43:24 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:43:24 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:43:38 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:43:38 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:44:10 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:44:10 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:47:18 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:47:18 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:47:49 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:47:49 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:48:47 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:48:47 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:48:56 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:48:56 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:49:22 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:49:22 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:51:48 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:51:48 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:54:47 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:54:47 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:54:58 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:54:58 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:56:19 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:56:19 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:56:30 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:56:31 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:57:01 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:57:01 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:57:09 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:57:09 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:57:28 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:57:28 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:57:39 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:57:39 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:59:45 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:59:45 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:59:46 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_warehouses_products.quantity as qty, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `wp`.`warehouse_id` = '3'
AND `wp`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 00:59:46 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 00:59:56 --> Could not find the language line "attendance"
ERROR - 2018-05-17 00:59:56 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 00:59:57 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_warehouses_products.quantity as qty, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `wp`.`warehouse_id` = '3'
AND `wp`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 00:59:57 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 01:00:04 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:00:04 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:00:09 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:00:09 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:00:18 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:00:18 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:00:18 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_warehouses_products.quantity as qty, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `wp`.`warehouse_id` = '3'
AND `wp`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:00:18 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 01:01:06 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:01:06 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:01:13 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:01:13 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:02:39 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:02:39 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:03:05 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_warehouses_products.quantity as qty, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `wp`.`warehouse_id` = '3'
AND `wp`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:03:05 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 01:03:40 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:03:40 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:03:46 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_warehouses_products.quantity as qty, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `wp`.`warehouse_id` = '3'
AND `wp`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:03:46 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 01:05:51 --> Severity: Parsing Error --> syntax error, unexpected '{' C:\xampp\htdocs\sales_app\app\controllers\Reports.php 4106
ERROR - 2018-05-17 01:07:01 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:07:01 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:07:29 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:07:29 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:07:32 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost, sma_products.price, sma_warehouses_products.quantity as qty, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `wp`.`warehouse_id` = '3'
AND `wp`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:07:32 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 01:09:13 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:09:13 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:09:16 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost, sma_products.price, sma_warehouses_products.quantity as qty, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `wp`.`warehouse_id` = '3'
AND `wp`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:09:16 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 01:10:10 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:10:10 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:11:34 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:11:34 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:11:36 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost, sma_products.price, sma_warehouses_products.quantity as qty, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `wp`.`warehouse_id` = '2'
AND `wp`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:11:36 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 01:13:28 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:13:28 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:13:28 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost, sma_products.price, sma_warehouses_products.quantity as qty1, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `wp`.`warehouse_id` = '2'
AND `wp`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:13:28 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 01:15:20 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:15:20 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:15:20 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost, sma_products.price, sma_warehouses_products.quantity as qty1, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `sma_warehouses_products`.`warehouse_id` = '2'
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:15:20 --> Query error: Unknown column 'sma_warehouses_products.warehouse_id' in 'where clause' - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `sma_warehouses_products`.`warehouse_id` = '2'
GROUP BY `sma_products`.`code`
ERROR - 2018-05-17 01:15:21 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 438
ERROR - 2018-05-17 01:16:15 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:16:15 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:16:16 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost, sma_products.price, sma_warehouses_products.quantity as qty1, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:16:17 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 01:17:18 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:17:18 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:18:12 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:18:12 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:18:13 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost, sma_products.price, sma_warehouses_products.quantity as qty1, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:18:14 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-05-17 01:18:52 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:18:52 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:18:53 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost, sma_products.price, sma_warehouses_products.quantity as qty1, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `sma_warehouses_products`.`warehouse_id` = '2'
AND `sma_warehouses_products`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:18:53 --> Query error: Unknown column 'sma_warehouses_products.warehouse_id' in 'where clause' - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `sma_warehouses_products`.`warehouse_id` = '2'
AND `sma_warehouses_products`.`quantity` !=0
GROUP BY `sma_products`.`code`
ERROR - 2018-05-17 01:18:53 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 438
ERROR - 2018-05-17 01:19:10 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:19:10 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:19:18 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:19:18 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:19:38 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:19:38 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:22:41 --> Query error: Unknown column 'sma_warehouses_products.quantity' in 'field list' - Invalid query: SELECT sma_products.code, sma_products.name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost, sma_products.price, sma_warehouses_products.quantity as qty1, sma_products.alert_quantity, sma_products.id as id
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `sma_warehouses_products`.`warehouse_id` = '3'
AND `sma_warehouses_products`.`quantity` !=0
GROUP BY `sma_products`.`code`
ORDER BY `cname` DESC, `brand` DESC
 LIMIT 10
ERROR - 2018-05-17 01:22:41 --> Query error: Unknown column 'sma_warehouses_products.warehouse_id' in 'where clause' - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_warehouses_products` `wp` ON `sma_products`.`id`=`wp`.`product_id`
WHERE `sma_warehouses_products`.`warehouse_id` = '3'
AND `sma_warehouses_products`.`quantity` !=0
GROUP BY `sma_products`.`code`
ERROR - 2018-05-17 01:22:41 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 438
ERROR - 2018-05-17 01:23:23 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:23:23 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:28:00 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:28:00 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:28:22 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:28:22 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:28:39 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:28:39 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:31:02 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:31:02 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:32:09 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:32:09 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:32:42 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:32:43 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:33:08 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:33:08 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:33:16 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:33:16 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:33:32 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:33:32 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:36:54 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:36:54 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:36:54 --> Could not find the language line "um"
ERROR - 2018-05-17 01:36:54 --> Could not find the language line "um"
ERROR - 2018-05-17 01:37:12 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:37:12 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:37:12 --> Could not find the language line "um"
ERROR - 2018-05-17 01:37:12 --> Could not find the language line "um"
ERROR - 2018-05-17 01:37:54 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:37:54 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:37:54 --> Could not find the language line "um"
ERROR - 2018-05-17 01:37:54 --> Could not find the language line "um"
ERROR - 2018-05-17 01:37:59 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:37:59 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:37:59 --> Could not find the language line "um"
ERROR - 2018-05-17 01:37:59 --> Could not find the language line "um"
ERROR - 2018-05-17 01:38:29 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:38:29 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:38:29 --> Could not find the language line "um"
ERROR - 2018-05-17 01:38:29 --> Could not find the language line "um"
ERROR - 2018-05-17 01:38:41 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:38:41 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:39:29 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:39:29 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:39:29 --> Could not find the language line "um"
ERROR - 2018-05-17 01:39:29 --> Could not find the language line "um"
ERROR - 2018-05-17 01:39:36 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:39:36 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:39:36 --> Could not find the language line "um"
ERROR - 2018-05-17 01:39:36 --> Could not find the language line "um"
ERROR - 2018-05-17 01:40:24 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:40:24 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:40:24 --> Could not find the language line "um"
ERROR - 2018-05-17 01:40:24 --> Could not find the language line "um"
ERROR - 2018-05-17 01:42:03 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:42:03 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:42:03 --> Could not find the language line "um"
ERROR - 2018-05-17 01:42:03 --> Could not find the language line "um"
ERROR - 2018-05-17 01:43:16 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:43:16 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:43:16 --> Could not find the language line "um"
ERROR - 2018-05-17 01:43:16 --> Could not find the language line "um"
ERROR - 2018-05-17 01:54:55 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:54:55 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:54:55 --> Could not find the language line "um"
ERROR - 2018-05-17 01:54:55 --> Could not find the language line "um"
ERROR - 2018-05-17 01:58:46 --> Could not find the language line "attendance"
ERROR - 2018-05-17 01:58:46 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 01:58:46 --> Could not find the language line "um"
ERROR - 2018-05-17 01:58:46 --> Could not find the language line "um"
ERROR - 2018-05-17 01:58:51 --> Could not find the language line "um"
ERROR - 2018-05-17 02:04:03 --> Could not find the language line "attendance"
ERROR - 2018-05-17 02:04:03 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 02:04:03 --> Could not find the language line "um"
ERROR - 2018-05-17 02:04:03 --> Could not find the language line "um"
ERROR - 2018-05-17 02:04:13 --> Could not find the language line "attendance"
ERROR - 2018-05-17 02:04:13 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 02:04:13 --> Could not find the language line "um"
ERROR - 2018-05-17 02:04:13 --> Could not find the language line "um"
ERROR - 2018-05-17 02:04:20 --> Could not find the language line "um"
ERROR - 2018-05-17 02:05:07 --> Could not find the language line "um"
ERROR - 2018-05-17 02:18:43 --> Severity: Warning --> Unknown: Failed to write session data (user). Please verify that the current setting of session.save_path is correct (sessions) Unknown 0
ERROR - 2018-05-17 02:27:06 --> Query error: Duplicate entry 'glnd4vdof5febsbqbrgpc67cgf5nqbhv' for key 'PRIMARY' - Invalid query: INSERT INTO `sma_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('glnd4vdof5febsbqbrgpc67cgf5nqbhv', '::1', 1526538426, '__ci_last_regenerate|i:1526538225;')
ERROR - 2018-05-17 02:27:06 --> Severity: Warning --> Unknown: Failed to write session data (user). Please verify that the current setting of session.save_path is correct (sessions) Unknown 0
ERROR - 2018-05-17 02:29:20 --> Could not find the language line "attendance"
ERROR - 2018-05-17 02:29:20 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 02:29:20 --> Could not find the language line "um"
ERROR - 2018-05-17 02:29:20 --> Could not find the language line "um"
ERROR - 2018-05-17 02:29:27 --> Could not find the language line "um"
ERROR - 2018-05-17 04:40:38 --> Could not find the language line "attendance"
ERROR - 2018-05-17 04:40:38 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 04:47:12 --> Could not find the language line "attendance"
ERROR - 2018-05-17 04:47:12 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 04:47:23 --> Could not find the language line "attendance"
ERROR - 2018-05-17 04:47:23 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 04:47:32 --> Could not find the language line "attendance"
ERROR - 2018-05-17 04:47:32 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 05:09:55 --> Could not find the language line "attendance"
ERROR - 2018-05-17 05:09:55 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 05:09:55 --> Could not find the language line "um"
ERROR - 2018-05-17 05:09:55 --> Could not find the language line "um"
ERROR - 2018-05-17 05:15:24 --> Could not find the language line "attendance"
ERROR - 2018-05-17 05:15:24 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 05:16:50 --> Could not find the language line "attendance"
ERROR - 2018-05-17 05:16:50 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 05:25:26 --> Could not find the language line "attendance"
ERROR - 2018-05-17 05:25:26 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 05:25:49 --> Could not find the language line "attendance"
ERROR - 2018-05-17 05:25:50 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:06:23 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:06:23 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:07:21 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:07:21 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:07:47 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:07:47 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:07:59 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:07:59 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:36:02 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:36:02 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:37:05 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:37:05 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:37:08 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:37:08 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:37:19 --> Could not find the language line "icpg"
ERROR - 2018-05-17 06:37:20 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:37:20 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:37:24 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:37:24 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:37:32 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:37:32 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:37:36 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:37:36 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:38:10 --> Could not find the language line "edit_user_validation_password_label"
ERROR - 2018-05-17 06:38:10 --> Could not find the language line "edit_user_validation_password_confirm_label"
ERROR - 2018-05-17 06:38:11 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:38:11 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:38:24 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:38:31 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:39:53 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:39:53 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:40:01 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:40:02 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:40:04 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:40:04 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:40:11 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:40:11 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-05-17 06:40:24 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:41:30 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:44:32 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:44:39 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:44:52 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:45:35 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:45:41 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:46:30 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:46:35 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:47:20 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:48:22 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:50:08 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:50:17 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:51:26 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:51:48 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:51:53 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:52:04 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:55:02 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:55:16 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:55:21 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:55:43 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:55:43 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sales_app\themes\default\views\reports\expenses.php 162
ERROR - 2018-05-17 06:57:31 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:57:58 --> Could not find the language line "attendance"
ERROR - 2018-05-17 06:57:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sales_app\themes\default\views\reports\expenses.php 162
ERROR - 2018-05-17 07:02:51 --> Could not find the language line "attendance"
ERROR - 2018-05-17 07:02:51 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sales_app\themes\default\views\reports\expenses.php 162
ERROR - 2018-05-17 07:11:24 --> Could not find the language line "attendance"
ERROR - 2018-05-17 07:11:24 --> Could not find the language line "Time Schedule Report"
