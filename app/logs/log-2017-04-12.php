<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-04-12 08:01:55 --> Could not find the language line "attendance"
ERROR - 2017-04-12 08:01:55 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 08:03:12 --> Could not find the language line "attendance"
ERROR - 2017-04-12 08:03:12 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 08:04:30 --> Could not find the language line "attendance"
ERROR - 2017-04-12 08:04:30 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 08:07:18 --> Could not find the language line "attendance"
ERROR - 2017-04-12 08:07:18 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 14:19:08 --> Query error: Table 'mypos798_mypossoft_v2.sma_companies' doesn't exist - Invalid query: SELECT *
FROM `sma_companies`
WHERE `group_name` = 'customer'
ORDER BY `id` DESC
 LIMIT 5
ERROR - 2017-04-12 14:19:08 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/models/Db_model.php 75
ERROR - 2017-04-12 14:19:13 --> Query error: Table 'mypos798_mypossoft_v2.sma_companies' doesn't exist - Invalid query: SELECT *
FROM `sma_companies`
WHERE `group_name` = 'customer'
ORDER BY `id` DESC
 LIMIT 5
ERROR - 2017-04-12 14:19:13 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/models/Db_model.php 75
ERROR - 2017-04-12 14:22:00 --> Query error: Table 'mypos798_mypossoft_v2.sma_products' doesn't exist - Invalid query: SELECT SUM(qty*price) as stock_by_price, SUM(qty*cost) as stock_by_cost
        FROM (
            Select sum(COALESCE(sma_warehouses_products.quantity, 0)) as qty, price, cost
            FROM sma_products
            JOIN sma_warehouses_products ON sma_warehouses_products.product_id=sma_products.id
            GROUP BY sma_warehouses_products.id ) a
ERROR - 2017-04-12 14:22:00 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/models/Db_model.php 136
ERROR - 2017-04-12 14:23:49 --> Could not find the language line "attendance"
ERROR - 2017-04-12 14:23:49 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 14:23:59 --> Could not find the language line "attendance"
ERROR - 2017-04-12 14:23:59 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 14:23:59 --> Could not find the language line "Sub Category"
ERROR - 2017-04-12 14:23:59 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-12 14:24:01 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 14:24:12 --> Could not find the language line "attendance"
ERROR - 2017-04-12 14:24:12 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 14:24:44 --> Could not find the language line "attendance"
ERROR - 2017-04-12 14:24:44 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 14:24:55 --> Could not find the language line "attendance"
ERROR - 2017-04-12 14:24:55 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 14:25:03 --> Could not find the language line "attendance"
ERROR - 2017-04-12 14:25:03 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:21:30 --> Could not find the language line "attendance"
ERROR - 2017-04-12 21:21:30 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:21:34 --> Could not find the language line "attendance"
ERROR - 2017-04-12 21:21:34 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:21:34 --> Could not find the language line "Sub Category"
ERROR - 2017-04-12 21:21:34 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-12 21:21:35 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:21:44 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:22:07 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 22774144 bytes) /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 400
ERROR - 2017-04-12 21:22:07 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:22:15 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:22:22 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:22:39 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:22:39 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%bel%' OR `sma_products`.`image` LIKE '%bel%' OR `sma_products`.`code` LIKE '%bel%' OR `sma_products`.`name` LIKE '%bel%' OR `sma_brands`.`name` LIKE '%bel%' OR `sma_categories`.`name` LIKE '%bel%' OR `sma_products`.`cost` LIKE '%bel%' OR `sma_products`.`price` LIKE '%bel%' OR COALESCE(sma_products.quantity, 0) LIKE '%bel%' OR `sub_categories`.`name` LIKE '%bel%' OR '' LIKE '%bel%' OR `sma_products`.`alert_quantity` LIKE '%bel%' OR COUNT(sma_purchases.id) LIKE '%bel%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC
 LIMIT 50
ERROR - 2017-04-12 21:22:39 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%bel%' OR `sma_products`.`image` LIKE '%bel%' OR `sma_products`.`code` LIKE '%bel%' OR `sma_products`.`name` LIKE '%bel%' OR `sma_brands`.`name` LIKE '%bel%' OR `sma_categories`.`name` LIKE '%bel%' OR `sma_products`.`cost` LIKE '%bel%' OR `sma_products`.`price` LIKE '%bel%' OR COALESCE(sma_products.quantity, 0) LIKE '%bel%' OR `sub_categories`.`name` LIKE '%bel%' OR '' LIKE '%bel%' OR `sma_products`.`alert_quantity` LIKE '%bel%' OR COUNT(sma_purchases.id) LIKE '%bel%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-12 21:22:39 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-12 21:22:40 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:22:40 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%belki%' OR `sma_products`.`image` LIKE '%belki%' OR `sma_products`.`code` LIKE '%belki%' OR `sma_products`.`name` LIKE '%belki%' OR `sma_brands`.`name` LIKE '%belki%' OR `sma_categories`.`name` LIKE '%belki%' OR `sma_products`.`cost` LIKE '%belki%' OR `sma_products`.`price` LIKE '%belki%' OR COALESCE(sma_products.quantity, 0) LIKE '%belki%' OR `sub_categories`.`name` LIKE '%belki%' OR '' LIKE '%belki%' OR `sma_products`.`alert_quantity` LIKE '%belki%' OR COUNT(sma_purchases.id) LIKE '%belki%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC
 LIMIT 50
ERROR - 2017-04-12 21:22:40 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%belki%' OR `sma_products`.`image` LIKE '%belki%' OR `sma_products`.`code` LIKE '%belki%' OR `sma_products`.`name` LIKE '%belki%' OR `sma_brands`.`name` LIKE '%belki%' OR `sma_categories`.`name` LIKE '%belki%' OR `sma_products`.`cost` LIKE '%belki%' OR `sma_products`.`price` LIKE '%belki%' OR COALESCE(sma_products.quantity, 0) LIKE '%belki%' OR `sub_categories`.`name` LIKE '%belki%' OR '' LIKE '%belki%' OR `sma_products`.`alert_quantity` LIKE '%belki%' OR COUNT(sma_purchases.id) LIKE '%belki%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-12 21:22:40 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-12 21:22:40 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:22:40 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%belkin%' OR `sma_products`.`image` LIKE '%belkin%' OR `sma_products`.`code` LIKE '%belkin%' OR `sma_products`.`name` LIKE '%belkin%' OR `sma_brands`.`name` LIKE '%belkin%' OR `sma_categories`.`name` LIKE '%belkin%' OR `sma_products`.`cost` LIKE '%belkin%' OR `sma_products`.`price` LIKE '%belkin%' OR COALESCE(sma_products.quantity, 0) LIKE '%belkin%' OR `sub_categories`.`name` LIKE '%belkin%' OR '' LIKE '%belkin%' OR `sma_products`.`alert_quantity` LIKE '%belkin%' OR COUNT(sma_purchases.id) LIKE '%belkin%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC
 LIMIT 50
ERROR - 2017-04-12 21:22:41 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%belkin%' OR `sma_products`.`image` LIKE '%belkin%' OR `sma_products`.`code` LIKE '%belkin%' OR `sma_products`.`name` LIKE '%belkin%' OR `sma_brands`.`name` LIKE '%belkin%' OR `sma_categories`.`name` LIKE '%belkin%' OR `sma_products`.`cost` LIKE '%belkin%' OR `sma_products`.`price` LIKE '%belkin%' OR COALESCE(sma_products.quantity, 0) LIKE '%belkin%' OR `sub_categories`.`name` LIKE '%belkin%' OR '' LIKE '%belkin%' OR `sma_products`.`alert_quantity` LIKE '%belkin%' OR COUNT(sma_purchases.id) LIKE '%belkin%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-12 21:22:41 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-12 21:23:19 --> Could not find the language line "attendance"
ERROR - 2017-04-12 21:23:19 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:23:19 --> Could not find the language line "Sub Category"
ERROR - 2017-04-12 21:23:19 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-12 21:23:20 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:23:27 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:23:27 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%belkin%' OR `sma_products`.`image` LIKE '%belkin%' OR `sma_products`.`code` LIKE '%belkin%' OR `sma_products`.`name` LIKE '%belkin%' OR `sma_brands`.`name` LIKE '%belkin%' OR `sma_categories`.`name` LIKE '%belkin%' OR `sma_products`.`cost` LIKE '%belkin%' OR `sma_products`.`price` LIKE '%belkin%' OR COALESCE(sma_products.quantity, 0) LIKE '%belkin%' OR `sub_categories`.`name` LIKE '%belkin%' OR '' LIKE '%belkin%' OR `sma_products`.`alert_quantity` LIKE '%belkin%' OR COUNT(sma_purchases.id) LIKE '%belkin%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC, `name` ASC
 LIMIT 10
ERROR - 2017-04-12 21:23:27 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%belkin%' OR `sma_products`.`image` LIKE '%belkin%' OR `sma_products`.`code` LIKE '%belkin%' OR `sma_products`.`name` LIKE '%belkin%' OR `sma_brands`.`name` LIKE '%belkin%' OR `sma_categories`.`name` LIKE '%belkin%' OR `sma_products`.`cost` LIKE '%belkin%' OR `sma_products`.`price` LIKE '%belkin%' OR COALESCE(sma_products.quantity, 0) LIKE '%belkin%' OR `sub_categories`.`name` LIKE '%belkin%' OR '' LIKE '%belkin%' OR `sma_products`.`alert_quantity` LIKE '%belkin%' OR COUNT(sma_purchases.id) LIKE '%belkin%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-12 21:23:27 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-12 21:25:38 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:25:38 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%belkin %' OR `sma_products`.`image` LIKE '%belkin %' OR `sma_products`.`code` LIKE '%belkin %' OR `sma_products`.`name` LIKE '%belkin %' OR `sma_brands`.`name` LIKE '%belkin %' OR `sma_categories`.`name` LIKE '%belkin %' OR `sma_products`.`cost` LIKE '%belkin %' OR `sma_products`.`price` LIKE '%belkin %' OR COALESCE(sma_products.quantity, 0) LIKE '%belkin %' OR `sub_categories`.`name` LIKE '%belkin %' OR '' LIKE '%belkin %' OR `sma_products`.`alert_quantity` LIKE '%belkin %' OR COUNT(sma_purchases.id) LIKE '%belkin %' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC, `name` ASC
 LIMIT 10
ERROR - 2017-04-12 21:25:39 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%belkin %' OR `sma_products`.`image` LIKE '%belkin %' OR `sma_products`.`code` LIKE '%belkin %' OR `sma_products`.`name` LIKE '%belkin %' OR `sma_brands`.`name` LIKE '%belkin %' OR `sma_categories`.`name` LIKE '%belkin %' OR `sma_products`.`cost` LIKE '%belkin %' OR `sma_products`.`price` LIKE '%belkin %' OR COALESCE(sma_products.quantity, 0) LIKE '%belkin %' OR `sub_categories`.`name` LIKE '%belkin %' OR '' LIKE '%belkin %' OR `sma_products`.`alert_quantity` LIKE '%belkin %' OR COUNT(sma_purchases.id) LIKE '%belkin %' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-12 21:25:39 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-12 21:25:41 --> Could not find the language line "attendance"
ERROR - 2017-04-12 21:25:41 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:25:44 --> Could not find the language line "attendance"
ERROR - 2017-04-12 21:25:44 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:25:48 --> Could not find the language line "attendance"
ERROR - 2017-04-12 21:25:48 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:25:48 --> Could not find the language line "Sub Category"
ERROR - 2017-04-12 21:25:48 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-12 21:25:49 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:25:59 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:25:59 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%i%' OR `sma_products`.`image` LIKE '%i%' OR `sma_products`.`code` LIKE '%i%' OR `sma_products`.`name` LIKE '%i%' OR `sma_brands`.`name` LIKE '%i%' OR `sma_categories`.`name` LIKE '%i%' OR `sma_products`.`cost` LIKE '%i%' OR `sma_products`.`price` LIKE '%i%' OR COALESCE(sma_products.quantity, 0) LIKE '%i%' OR `sub_categories`.`name` LIKE '%i%' OR '' LIKE '%i%' OR `sma_products`.`alert_quantity` LIKE '%i%' OR COUNT(sma_purchases.id) LIKE '%i%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC, `name` ASC
 LIMIT 10
ERROR - 2017-04-12 21:26:00 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%i%' OR `sma_products`.`image` LIKE '%i%' OR `sma_products`.`code` LIKE '%i%' OR `sma_products`.`name` LIKE '%i%' OR `sma_brands`.`name` LIKE '%i%' OR `sma_categories`.`name` LIKE '%i%' OR `sma_products`.`cost` LIKE '%i%' OR `sma_products`.`price` LIKE '%i%' OR COALESCE(sma_products.quantity, 0) LIKE '%i%' OR `sub_categories`.`name` LIKE '%i%' OR '' LIKE '%i%' OR `sma_products`.`alert_quantity` LIKE '%i%' OR COUNT(sma_purchases.id) LIKE '%i%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-12 21:26:00 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-12 21:26:01 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:26:01 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%int%' OR `sma_products`.`image` LIKE '%int%' OR `sma_products`.`code` LIKE '%int%' OR `sma_products`.`name` LIKE '%int%' OR `sma_brands`.`name` LIKE '%int%' OR `sma_categories`.`name` LIKE '%int%' OR `sma_products`.`cost` LIKE '%int%' OR `sma_products`.`price` LIKE '%int%' OR COALESCE(sma_products.quantity, 0) LIKE '%int%' OR `sub_categories`.`name` LIKE '%int%' OR '' LIKE '%int%' OR `sma_products`.`alert_quantity` LIKE '%int%' OR COUNT(sma_purchases.id) LIKE '%int%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC, `name` ASC
 LIMIT 10
ERROR - 2017-04-12 21:26:01 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%int%' OR `sma_products`.`image` LIKE '%int%' OR `sma_products`.`code` LIKE '%int%' OR `sma_products`.`name` LIKE '%int%' OR `sma_brands`.`name` LIKE '%int%' OR `sma_categories`.`name` LIKE '%int%' OR `sma_products`.`cost` LIKE '%int%' OR `sma_products`.`price` LIKE '%int%' OR COALESCE(sma_products.quantity, 0) LIKE '%int%' OR `sub_categories`.`name` LIKE '%int%' OR '' LIKE '%int%' OR `sma_products`.`alert_quantity` LIKE '%int%' OR COUNT(sma_purchases.id) LIKE '%int%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-12 21:26:01 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-12 21:26:01 --> Could not find the language line "Purchase History"
ERROR - 2017-04-12 21:26:01 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%intel%' OR `sma_products`.`image` LIKE '%intel%' OR `sma_products`.`code` LIKE '%intel%' OR `sma_products`.`name` LIKE '%intel%' OR `sma_brands`.`name` LIKE '%intel%' OR `sma_categories`.`name` LIKE '%intel%' OR `sma_products`.`cost` LIKE '%intel%' OR `sma_products`.`price` LIKE '%intel%' OR COALESCE(sma_products.quantity, 0) LIKE '%intel%' OR `sub_categories`.`name` LIKE '%intel%' OR '' LIKE '%intel%' OR `sma_products`.`alert_quantity` LIKE '%intel%' OR COUNT(sma_purchases.id) LIKE '%intel%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC, `name` ASC
 LIMIT 10
ERROR - 2017-04-12 21:26:02 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%intel%' OR `sma_products`.`image` LIKE '%intel%' OR `sma_products`.`code` LIKE '%intel%' OR `sma_products`.`name` LIKE '%intel%' OR `sma_brands`.`name` LIKE '%intel%' OR `sma_categories`.`name` LIKE '%intel%' OR `sma_products`.`cost` LIKE '%intel%' OR `sma_products`.`price` LIKE '%intel%' OR COALESCE(sma_products.quantity, 0) LIKE '%intel%' OR `sub_categories`.`name` LIKE '%intel%' OR '' LIKE '%intel%' OR `sma_products`.`alert_quantity` LIKE '%intel%' OR COUNT(sma_purchases.id) LIKE '%intel%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-12 21:26:02 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-12 21:26:52 --> Could not find the language line "attendance"
ERROR - 2017-04-12 21:26:52 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:26:54 --> Could not find the language line "attendance"
ERROR - 2017-04-12 21:26:54 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:26:57 --> Could not find the language line "attendance"
ERROR - 2017-04-12 21:26:57 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:27:01 --> Could not find the language line "attendance"
ERROR - 2017-04-12 21:27:01 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-12 21:27:01 --> Could not find the language line "Sub Category"
ERROR - 2017-04-12 21:27:01 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-12 21:27:02 --> Could not find the language line "Purchase History"
