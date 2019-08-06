<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-04-22 00:00:46 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:00:46 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:00:47 --> Query error: Unknown column 'sale_items.product_id' in 'on clause' - Invalid query: SELECT DATE_FORMAT(date, '%Y-%m-%d %T') as date, reference_no, biller, customer, FSI.item_nane as iname, grand_total, paid, (grand_total-paid) as balance, payment_status, sma_sales.id as id
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane from sma_sale_items inner join  sma_products on sale_items.product_id=products.id GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ORDER BY `date` DESC
 LIMIT 10
ERROR - 2018-04-22 00:00:47 --> Query error: Unknown column 'sale_items.product_id' in 'on clause' - Invalid query: SELECT *
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane from sma_sale_items inner join  sma_products on sale_items.product_id=products.id GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ERROR - 2018-04-22 00:00:47 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 438
ERROR - 2018-04-22 00:01:12 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:01:12 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:02:22 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:02:22 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:03:23 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:03:23 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:04:34 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:04:34 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:06:34 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:06:34 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:06:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT J' at line 3 - Invalid query: SELECT DATE_FORMAT(date, '%Y-%m-%d %T') as date, reference_no, biller, customer, FSI.item_nane as iname, grand_total, paid, ((ROUND(grand_total, 2))-(ROUND(paid, 2))) as balance, payment_status, sma_sales.id as id
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id group by sma_sale_items.sales_id  GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ORDER BY `date` DESC
 LIMIT 10
ERROR - 2018-04-22 00:06:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT J' at line 3 - Invalid query: SELECT *
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id group by sma_sale_items.sales_id  GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ERROR - 2018-04-22 00:06:35 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 438
ERROR - 2018-04-22 00:06:50 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:06:50 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:06:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT J' at line 3 - Invalid query: SELECT DATE_FORMAT(date, '%Y-%m-%d %T') as date, reference_no, biller, customer, FSI.item_nane as iname, grand_total, paid, ((ROUND(grand_total, 2))-(ROUND(paid, 2))) as balance, payment_status, sma_sales.id as id
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id group by sma_sale_items.sale_id  GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ORDER BY `date` DESC
 LIMIT 10
ERROR - 2018-04-22 00:06:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT J' at line 3 - Invalid query: SELECT *
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id group by sma_sale_items.sale_id  GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ERROR - 2018-04-22 00:06:51 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 438
ERROR - 2018-04-22 00:11:01 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:11:01 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:11:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT J' at line 3 - Invalid query: SELECT DATE_FORMAT(date, '%Y-%m-%d %T') as date, reference_no, biller, customer, FSI.item_nane as iname, grand_total, paid, ((ROUND(grand_total, 2))-(ROUND(paid, 2))) as balance, payment_status, sma_sales.id as id
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id group by sma_sale_items.sale_id,sma_sale_items.product_id  GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ORDER BY `date` DESC
 LIMIT 10
ERROR - 2018-04-22 00:11:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT J' at line 3 - Invalid query: SELECT *
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id group by sma_sale_items.sale_id,sma_sale_items.product_id  GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ERROR - 2018-04-22 00:11:02 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 438
ERROR - 2018-04-22 00:13:42 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:13:42 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:13:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT J' at line 3 - Invalid query: SELECT DATE_FORMAT(date, '%Y-%m-%d %T') as date, reference_no, biller, customer, FSI.item_nane as iname, grand_total, paid, ((ROUND(grand_total, 2))-(ROUND(paid, 2))) as balance, payment_status, sma_sales.id as id
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id Group By sma_sale_items.sale_id,sma_sale_items.product_id  GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ORDER BY `date` DESC
 LIMIT 10
ERROR - 2018-04-22 00:13:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT J' at line 3 - Invalid query: SELECT *
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id Group By sma_sale_items.sale_id,sma_sale_items.product_id  GROUP BY sma_sale_items.sale_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ERROR - 2018-04-22 00:13:43 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 438
ERROR - 2018-04-22 00:14:28 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:14:28 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:15:05 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:15:05 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:19:11 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:19:11 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:19:12 --> Query error: Unknown column 'FSIac_price' in 'field list' - Invalid query: SELECT DATE_FORMAT(date, '%Y-%m-%d %T') as date, reference_no, biller, sum(FSIac_price) as actual_price, FSI.item_nane as iname, grand_total, paid, ((ROUND(grand_total, 2))-(ROUND(paid, 2))) as balance, payment_status, sma_sales.id as id
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane, sum( sma_sale_items.quantity *  sma_products.cost) as ac_price from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id GROUP BY sma_sale_items.sale_id,sma_sale_items.product_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ORDER BY `date` DESC
 LIMIT 10
ERROR - 2018-04-22 00:19:12 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-04-22 00:19:33 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:19:33 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:19:55 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:19:55 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:20:19 --> Could not find the language line "attendance"
ERROR - 2018-04-22 00:20:19 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 00:20:19 --> Could not find the language line "purchase_count"
ERROR - 2018-04-22 00:20:19 --> Could not find the language line "Sub Category"
ERROR - 2018-04-22 00:20:19 --> Could not find the language line "Purchase_Count"
ERROR - 2018-04-22 00:20:20 --> Could not find the language line "Purchase History"
ERROR - 2018-04-22 00:20:25 --> Could not find the language line "Purchase History"
ERROR - 2018-04-22 00:20:27 --> Could not find the language line "Purchase History"
ERROR - 2018-04-22 00:21:18 --> Could not find the language line "Purchase History"
ERROR - 2018-04-22 00:21:20 --> Could not find the language line "Purchase History"
ERROR - 2018-04-22 01:26:20 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:26:20 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:28:02 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:28:02 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:28:02 --> Query error: Unknown column 'FSI.ac_price' in 'field list' - Invalid query: SELECT DATE_FORMAT(date, '%Y-%m-%d %T') as date, reference_no, biller, customer, FSI.item_nane as iname, FSI.ac_price as actual_price, FSI.sl_price as sale_price, ((ROUND(grand_total, 2))-(ROUND(paid, 2))) as balance, payment_status, sma_sales.id as id
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane, sum( sma_sale_items.quantity *  sma_products.cost),sum( sma_sale_items.quantity *  sma_sale_items.net_unit_price) as sl_price from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id GROUP BY sma_sale_items.sale_id,sma_sale_items.product_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ORDER BY `date` DESC
 LIMIT 10
ERROR - 2018-04-22 01:28:03 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-04-22 01:28:40 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:28:40 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:28:41 --> Query error: Unknown column 'FSI.ac_price' in 'field list' - Invalid query: SELECT DATE_FORMAT(date, '%Y-%m-%d %T') as date, reference_no, biller, customer, FSI.item_nane as iname, FSI.ac_price as actual_price, FSI.sl_price as sale_price, ((ROUND(grand_total, 2))-(ROUND(paid, 2))) as balance, payment_status, sma_sales.id as id
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane, sum( sma_sale_items.quantity *  sma_products.cost),sum( sma_sale_items.quantity *  sma_sale_items.net_unit_price) as sl_price from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id GROUP BY sma_sale_items.sale_id,sma_sale_items.product_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ORDER BY `date` DESC
 LIMIT 10
ERROR - 2018-04-22 01:28:41 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-04-22 01:29:52 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:29:52 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:31:38 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:31:38 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:31:39 --> Query error: Unknown column 'FSI.actual_price' in 'field list' - Invalid query: SELECT DATE_FORMAT(date, '%Y-%m-%d %T') as date, reference_no, biller, customer, FSI.item_nane as iname, FSI.actual_price, paid, ((ROUND(grand_total, 2))-(ROUND(paid, 2))) as balance, payment_status, sma_sales.id as id
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane, sum( sma_sale_items.quantity *  sma_products.cost),sum( sma_sale_items.quantity *  sma_sale_items.net_unit_price) as sl_price from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id GROUP BY sma_sale_items.sale_id,sma_sale_items.product_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ORDER BY `date` DESC
 LIMIT 10
ERROR - 2018-04-22 01:31:39 --> Severity: Error --> Call to a member function result_array() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 367
ERROR - 2018-04-22 01:32:18 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:32:18 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:32:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as actual_price),sum( sma_sale_items.quantity *  sma_sale_items.net_unit_price) ' at line 3 - Invalid query: SELECT DATE_FORMAT(date, '%Y-%m-%d %T') as date, reference_no, biller, customer, FSI.item_nane as iname, FSI.actual_price, paid, ((ROUND(grand_total, 2))-(ROUND(paid, 2))) as balance, payment_status, sma_sales.id as id
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane, sum( sma_sale_items.quantity *  sma_products.cost as actual_price),sum( sma_sale_items.quantity *  sma_sale_items.net_unit_price) as sl_price from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id GROUP BY sma_sale_items.sale_id,sma_sale_items.product_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ORDER BY `date` DESC
 LIMIT 10
ERROR - 2018-04-22 01:32:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as actual_price),sum( sma_sale_items.quantity *  sma_sale_items.net_unit_price) ' at line 3 - Invalid query: SELECT *
FROM `sma_sales`
LEFT JOIN ( SELECT sale_id, product_id, serial_no, GROUP_CONCAT(CONCAT(sma_sale_items.product_name, '__', sma_sale_items.quantity) SEPARATOR '___') as item_nane, sum( sma_sale_items.quantity *  sma_products.cost as actual_price),sum( sma_sale_items.quantity *  sma_sale_items.net_unit_price) as sl_price from sma_sale_items inner join  sma_products on sma_sale_items.product_id=sma_products.id GROUP BY sma_sale_items.sale_id,sma_sale_items.product_id ) FSI ON `FSI`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
ERROR - 2018-04-22 01:32:18 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\libraries\Datatables.php 438
ERROR - 2018-04-22 01:32:55 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:32:55 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:33:50 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:33:50 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:34:36 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:34:36 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:37:00 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:37:00 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:38:41 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:38:41 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:40:23 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:40:23 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:41:27 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:41:27 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:45:30 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:45:30 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:47:57 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:47:57 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:48:40 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:48:40 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:49:39 --> Could not find the language line "Purchase History"
ERROR - 2018-04-22 01:49:41 --> Could not find the language line "Purchase History"
ERROR - 2018-04-22 01:55:18 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:55:18 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:55:18 --> Could not find the language line "purchase_count"
ERROR - 2018-04-22 01:55:18 --> Could not find the language line "Sub Category"
ERROR - 2018-04-22 01:55:18 --> Could not find the language line "Purchase_Count"
ERROR - 2018-04-22 01:55:19 --> Could not find the language line "Purchase History"
ERROR - 2018-04-22 01:57:31 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:57:31 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:57:31 --> Could not find the language line "purchase_count"
ERROR - 2018-04-22 01:57:31 --> Could not find the language line "Sub Category"
ERROR - 2018-04-22 01:57:31 --> Could not find the language line "Purchase_Count"
ERROR - 2018-04-22 01:57:32 --> Could not find the language line "Purchase History"
ERROR - 2018-04-22 01:57:36 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:57:36 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 01:59:50 --> Could not find the language line "attendance"
ERROR - 2018-04-22 01:59:50 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:00:38 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:00:38 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:01:14 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:01:14 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:01:44 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:01:44 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:01:57 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:01:57 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:18:28 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:18:28 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:19:07 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:19:07 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:20:19 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:20:19 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:21:11 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:21:11 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:21:33 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:21:33 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:22:22 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:22:22 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:22:58 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:22:58 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:25:14 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:25:14 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:26:30 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:26:30 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:26:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '') as iname, grand_total, paid, payment_status
FROM `sma_sales`
LEFT JOIN `sma_s' at line 1 - Invalid query: SELECT date, reference_no, biller, customer, CONCAT(sma_sale_items.product_name, ' (', sma_sale_items.quantity, ') as iname, grand_total, paid, payment_status
FROM `sma_sales`
LEFT JOIN `sma_sale_items` ON `sma_sale_items`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_products` ON `sma_products`.`id`=`sma_sale_items`.`product_id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
GROUP BY `sma_sales`.`id`
ORDER BY `sma_sales`.`date` desc
ERROR - 2018-04-22 02:26:33 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\controllers\Reports.php 1371
ERROR - 2018-04-22 02:26:35 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:26:35 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:27:26 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:27:26 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:27:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '')) as iname, grand_total, paid, payment_status
FROM `sma_sales`
LEFT JOIN `sma_' at line 1 - Invalid query: SELECT date, reference_no, biller, customer, CONCAT(sma_sale_items.product_name, ' (', sma_sale_items.quantity, ')) as iname, grand_total, paid, payment_status
FROM `sma_sales`
LEFT JOIN `sma_sale_items` ON `sma_sale_items`.`sale_id`=`sma_sales`.`id`
LEFT JOIN `sma_products` ON `sma_products`.`id`=`sma_sale_items`.`product_id`
LEFT JOIN `sma_warehouses` ON `sma_warehouses`.`id`=`sma_sales`.`warehouse_id`
GROUP BY `sma_sales`.`id`
ORDER BY `sma_sales`.`date` desc
ERROR - 2018-04-22 02:27:29 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\sales_app\app\controllers\Reports.php 1371
ERROR - 2018-04-22 02:27:31 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:27:31 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:27:59 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:27:59 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:31:54 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:31:54 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:34:24 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:34:24 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:36:19 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:36:19 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:36:19 --> Could not find the language line "purchase_count"
ERROR - 2018-04-22 02:36:19 --> Could not find the language line "Sub Category"
ERROR - 2018-04-22 02:36:19 --> Could not find the language line "Purchase_Count"
ERROR - 2018-04-22 02:36:20 --> Could not find the language line "Purchase History"
ERROR - 2018-04-22 02:36:31 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:36:31 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:37:32 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:37:32 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:38:25 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:38:25 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:40:08 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:40:08 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:42:48 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:42:48 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:42:59 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:42:59 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 02:59:47 --> Could not find the language line "attendance"
ERROR - 2018-04-22 02:59:47 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 03:14:12 --> Could not find the language line "attendance"
ERROR - 2018-04-22 03:14:12 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 03:14:21 --> Could not find the language line "attendance"
ERROR - 2018-04-22 03:14:21 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:54:47 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:54:47 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:54:53 --> Could not find the language line "icpg"
ERROR - 2018-04-22 05:54:54 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:54:54 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:55:29 --> Could not find the language line "icpg"
ERROR - 2018-04-22 05:55:30 --> Could not find the language line "icpg"
ERROR - 2018-04-22 05:55:31 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:55:31 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:55:37 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:55:37 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:55:41 --> Could not find the language line "Total"
ERROR - 2018-04-22 05:55:41 --> Could not find the language line "Product Tax"
ERROR - 2018-04-22 05:55:57 --> Could not find the language line "Tax"
ERROR - 2018-04-22 05:55:57 --> Could not find the language line "Landing Price"
ERROR - 2018-04-22 05:55:57 --> Could not find the language line "Min Selling Price"
ERROR - 2018-04-22 05:56:02 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:56:02 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:56:13 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:56:13 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:56:26 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:56:26 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:56:40 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:56:40 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:57:04 --> Could not find the language line "Total"
ERROR - 2018-04-22 05:57:04 --> Could not find the language line "Product Tax"
ERROR - 2018-04-22 05:57:29 --> Could not find the language line "Tax"
ERROR - 2018-04-22 05:57:29 --> Could not find the language line "Landing Price"
ERROR - 2018-04-22 05:57:29 --> Could not find the language line "Min Selling Price"
ERROR - 2018-04-22 05:57:43 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:57:43 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:57:48 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:57:48 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:57:52 --> Could not find the language line "Total"
ERROR - 2018-04-22 05:57:52 --> Could not find the language line "Product Tax"
ERROR - 2018-04-22 05:58:46 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:58:46 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:58:50 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:58:50 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:58:53 --> Could not find the language line "Total"
ERROR - 2018-04-22 05:58:53 --> Could not find the language line "Product Tax"
ERROR - 2018-04-22 05:59:29 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:59:29 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 05:59:35 --> Could not find the language line "attendance"
ERROR - 2018-04-22 05:59:35 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 06:00:31 --> Could not find the language line "Total"
ERROR - 2018-04-22 06:00:31 --> Could not find the language line "Product Tax"
ERROR - 2018-04-22 06:00:44 --> Could not find the language line "attendance"
ERROR - 2018-04-22 06:00:44 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 06:00:52 --> Could not find the language line "attendance"
ERROR - 2018-04-22 06:00:52 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 06:00:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\sales_app\themes\default\views\pos\settings.php 166
ERROR - 2018-04-22 06:01:28 --> Could not find the language line "icpg"
ERROR - 2018-04-22 06:01:29 --> Could not find the language line "attendance"
ERROR - 2018-04-22 06:01:29 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 06:04:52 --> Could not find the language line "icpg"
ERROR - 2018-04-22 06:04:52 --> Could not find the language line "icpg"
ERROR - 2018-04-22 06:04:53 --> Could not find the language line "attendance"
ERROR - 2018-04-22 06:04:53 --> Could not find the language line "Time Schedule Report"
ERROR - 2018-04-22 06:05:01 --> Could not find the language line "Total"
ERROR - 2018-04-22 06:05:01 --> Could not find the language line "Product Tax"
ERROR - 2018-04-22 07:14:52 --> Could not find the language line "attendance"
ERROR - 2018-04-22 07:14:52 --> Could not find the language line "Time Schedule Report"
