<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-04-13 01:21:47 --> Could not find the language line "attendance"
ERROR - 2017-04-13 01:21:47 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-13 01:21:47 --> Could not find the language line "Sub Category"
ERROR - 2017-04-13 01:21:47 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-13 01:21:49 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 01:22:04 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 01:22:04 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%a%' OR `sma_products`.`image` LIKE '%a%' OR `sma_products`.`code` LIKE '%a%' OR `sma_products`.`name` LIKE '%a%' OR `sma_brands`.`name` LIKE '%a%' OR `sma_categories`.`name` LIKE '%a%' OR `sma_products`.`cost` LIKE '%a%' OR `sma_products`.`price` LIKE '%a%' OR COALESCE(sma_products.quantity, 0) LIKE '%a%' OR `sub_categories`.`name` LIKE '%a%' OR '' LIKE '%a%' OR `sma_products`.`alert_quantity` LIKE '%a%' OR COUNT(sma_purchases.id) LIKE '%a%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC, `name` ASC
 LIMIT 10
ERROR - 2017-04-13 01:22:04 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%a%' OR `sma_products`.`image` LIKE '%a%' OR `sma_products`.`code` LIKE '%a%' OR `sma_products`.`name` LIKE '%a%' OR `sma_brands`.`name` LIKE '%a%' OR `sma_categories`.`name` LIKE '%a%' OR `sma_products`.`cost` LIKE '%a%' OR `sma_products`.`price` LIKE '%a%' OR COALESCE(sma_products.quantity, 0) LIKE '%a%' OR `sub_categories`.`name` LIKE '%a%' OR '' LIKE '%a%' OR `sma_products`.`alert_quantity` LIKE '%a%' OR COUNT(sma_purchases.id) LIKE '%a%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-13 01:22:04 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-13 01:22:20 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 01:22:20 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%33%' OR `sma_products`.`image` LIKE '%33%' OR `sma_products`.`code` LIKE '%33%' OR `sma_products`.`name` LIKE '%33%' OR `sma_brands`.`name` LIKE '%33%' OR `sma_categories`.`name` LIKE '%33%' OR `sma_products`.`cost` LIKE '%33%' OR `sma_products`.`price` LIKE '%33%' OR COALESCE(sma_products.quantity, 0) LIKE '%33%' OR `sub_categories`.`name` LIKE '%33%' OR '' LIKE '%33%' OR `sma_products`.`alert_quantity` LIKE '%33%' OR COUNT(sma_purchases.id) LIKE '%33%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC, `name` ASC
 LIMIT 10
ERROR - 2017-04-13 01:22:21 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%33%' OR `sma_products`.`image` LIKE '%33%' OR `sma_products`.`code` LIKE '%33%' OR `sma_products`.`name` LIKE '%33%' OR `sma_brands`.`name` LIKE '%33%' OR `sma_categories`.`name` LIKE '%33%' OR `sma_products`.`cost` LIKE '%33%' OR `sma_products`.`price` LIKE '%33%' OR COALESCE(sma_products.quantity, 0) LIKE '%33%' OR `sub_categories`.`name` LIKE '%33%' OR '' LIKE '%33%' OR `sma_products`.`alert_quantity` LIKE '%33%' OR COUNT(sma_purchases.id) LIKE '%33%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-13 01:22:21 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-13 01:22:21 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 01:22:21 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%33686%' OR `sma_products`.`image` LIKE '%33686%' OR `sma_products`.`code` LIKE '%33686%' OR `sma_products`.`name` LIKE '%33686%' OR `sma_brands`.`name` LIKE '%33686%' OR `sma_categories`.`name` LIKE '%33686%' OR `sma_products`.`cost` LIKE '%33686%' OR `sma_products`.`price` LIKE '%33686%' OR COALESCE(sma_products.quantity, 0) LIKE '%33686%' OR `sub_categories`.`name` LIKE '%33686%' OR '' LIKE '%33686%' OR `sma_products`.`alert_quantity` LIKE '%33686%' OR COUNT(sma_purchases.id) LIKE '%33686%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC, `name` ASC
 LIMIT 10
ERROR - 2017-04-13 01:22:21 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%33686%' OR `sma_products`.`image` LIKE '%33686%' OR `sma_products`.`code` LIKE '%33686%' OR `sma_products`.`name` LIKE '%33686%' OR `sma_brands`.`name` LIKE '%33686%' OR `sma_categories`.`name` LIKE '%33686%' OR `sma_products`.`cost` LIKE '%33686%' OR `sma_products`.`price` LIKE '%33686%' OR COALESCE(sma_products.quantity, 0) LIKE '%33686%' OR `sub_categories`.`name` LIKE '%33686%' OR '' LIKE '%33686%' OR `sma_products`.`alert_quantity` LIKE '%33686%' OR COUNT(sma_purchases.id) LIKE '%33686%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-13 01:22:21 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-13 01:22:35 --> Could not find the language line "attendance"
ERROR - 2017-04-13 01:22:35 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-13 01:22:35 --> Could not find the language line "Sub Category"
ERROR - 2017-04-13 01:22:35 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-13 01:22:37 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 01:22:59 --> Could not find the language line "attendance"
ERROR - 2017-04-13 01:22:59 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-13 01:22:59 --> Could not find the language line "Sub Category"
ERROR - 2017-04-13 01:22:59 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-13 01:23:02 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 01:33:53 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 01:33:54 --> Query error: Invalid use of group function - Invalid query: SELECT sma_products.id as productid, sma_products.image as image, sma_products.code as code, sma_products.name as name, sma_brands.name as brand, sma_categories.name as cname, sma_products.cost as cost, sma_products.price as price, COALESCE(sma_products.quantity, 0) as quantity, sub_categories.name as subcat, '' as rack, sma_products.alert_quantity, COUNT(sma_purchases.id) as count
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%3368%' OR `sma_products`.`image` LIKE '%3368%' OR `sma_products`.`code` LIKE '%3368%' OR `sma_products`.`name` LIKE '%3368%' OR `sma_brands`.`name` LIKE '%3368%' OR `sma_categories`.`name` LIKE '%3368%' OR `sma_products`.`cost` LIKE '%3368%' OR `sma_products`.`price` LIKE '%3368%' OR COALESCE(sma_products.quantity, 0) LIKE '%3368%' OR `sub_categories`.`name` LIKE '%3368%' OR '' LIKE '%3368%' OR `sma_products`.`alert_quantity` LIKE '%3368%' OR COUNT(sma_purchases.id) LIKE '%3368%' )
GROUP BY `sma_products`.`id`
ORDER BY `code` ASC, `name` ASC
 LIMIT 10
ERROR - 2017-04-13 01:33:54 --> Query error: Invalid use of group function - Invalid query: SELECT *
FROM `sma_products`
LEFT JOIN `sma_categories` ON `sma_products`.`category_id`=`sma_categories`.`id`
LEFT JOIN `sma_units` ON `sma_products`.`unit`=`sma_units`.`id`
LEFT JOIN `sma_brands` ON `sma_products`.`brand`=`sma_brands`.`id`
LEFT JOIN `sma_categories` as `sub_categories` ON `sma_products`.`subcategory_id`=`sub_categories`.`id`
LEFT JOIN `sma_purchase_items` ON `sma_products`.`id`=`sma_purchase_items`.`product_id`
LEFT JOIN `sma_purchases` ON `sma_purchases`.`id`=`sma_purchase_items`.`purchase_id`
WHERE (`sma_products`.`id` LIKE '%3368%' OR `sma_products`.`image` LIKE '%3368%' OR `sma_products`.`code` LIKE '%3368%' OR `sma_products`.`name` LIKE '%3368%' OR `sma_brands`.`name` LIKE '%3368%' OR `sma_categories`.`name` LIKE '%3368%' OR `sma_products`.`cost` LIKE '%3368%' OR `sma_products`.`price` LIKE '%3368%' OR COALESCE(sma_products.quantity, 0) LIKE '%3368%' OR `sub_categories`.`name` LIKE '%3368%' OR '' LIKE '%3368%' OR `sma_products`.`alert_quantity` LIKE '%3368%' OR COUNT(sma_purchases.id) LIKE '%3368%' )
GROUP BY `sma_products`.`id`
ERROR - 2017-04-13 01:33:54 --> Severity: Error --> Call to a member function num_rows() on boolean /home/mypos798/public_html/mypossoft_v2/app/libraries/Datatables.php 438
ERROR - 2017-04-13 01:50:30 --> Could not find the language line "attendance"
ERROR - 2017-04-13 01:50:30 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-13 01:50:30 --> Could not find the language line "Sub Category"
ERROR - 2017-04-13 01:50:30 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-13 01:50:33 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 02:38:50 --> Could not find the language line "attendance"
ERROR - 2017-04-13 02:38:50 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-13 02:38:50 --> Could not find the language line "Sub Category"
ERROR - 2017-04-13 02:38:50 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-13 02:39:00 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 08:13:16 --> Could not find the language line "attendance"
ERROR - 2017-04-13 08:13:16 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-13 08:13:17 --> Could not find the language line "Sub Category"
ERROR - 2017-04-13 08:13:17 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-13 08:13:21 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 08:18:55 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 08:19:00 --> Could not find the language line "attendance"
ERROR - 2017-04-13 08:19:00 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-13 08:19:00 --> Could not find the language line "purchase_count"
ERROR - 2017-04-13 08:19:00 --> Could not find the language line "Sub Category"
ERROR - 2017-04-13 08:19:00 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-13 08:19:16 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 08:19:28 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:26:48 --> Could not find the language line "attendance"
ERROR - 2017-04-13 11:26:48 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-13 11:26:54 --> Could not find the language line "attendance"
ERROR - 2017-04-13 11:26:54 --> Could not find the language line "Time Schedule Report"
ERROR - 2017-04-13 11:26:54 --> Could not find the language line "purchase_count"
ERROR - 2017-04-13 11:26:54 --> Could not find the language line "Sub Category"
ERROR - 2017-04-13 11:26:54 --> Could not find the language line "Purchase_Count"
ERROR - 2017-04-13 11:26:56 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:27:13 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:27:30 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:27:34 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:27:38 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:27:49 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:27:52 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:27:57 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:28:00 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:28:03 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:28:15 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:28:17 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:28:50 --> Could not find the language line "Purchase History"
ERROR - 2017-04-13 11:29:29 --> Could not find the language line "Purchase History"
