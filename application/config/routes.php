<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'HomeController/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']='HomeController/login';
$route['logout']='HomeController/logout';
$route['register']='HomeController/register';
$route['home']='HomeController/home';
$route['about-us']='HomeController/about_us';
$route['services']='HomeController/services';
$route['service-details']='HomeController/service_details';
$route['pricing']='HomeController/pricing';
$route['blogs']='HomeController/blogs';
$route['blog-details']='HomeController/blog_details';
$route['contact-us']='HomeController/contact_us';
$route['sitemap']='HomeController/sitemap';
$route['faq']='HomeController/faq';

$route['admin']="LoginController/index";
$route['admin/login']="LoginController/login";
$route['admin/logout']="LoginController/logout";
$route['dashboard']="DashboardController/dashboard";
$route['admin/customers_selected_services']="AdminController/customers_selected_services";
$route['admin/customer_selected_services_view']="AdminController/customer_selected_services_view";
$route['admin/contact_us']="AdminController/contact_us";
$route['admin/contact_delete']="AdminController/contact_delete";
$route['admin/feedback']="AdminController/feedback";

/*Package Routes*/
$route['package']="PackageController/index";
$route['package/add']="PackageController/add";
$route['package/edit']="PackageController/edit";
$route['package/delete']="PackageController/delete";

/*Employee Routes*/
$route['employee']="EmployeeController/index";
$route['employee/add']="EmployeeController/add";
$route['employee/edit']="EmployeeController/edit";
$route['employee/delete']="EmployeeController/delete";

/*Blog Routes*/
$route['blog']="BlogController/index";
$route['blog/add']="BlogController/add";
$route['blog/edit']="BlogController/edit";
$route['blog/delete']="BlogController/delete";

/*Designation Routes*/
$route['designation']="DesignationController/index";
$route['designation/add']="DesignationController/add";
$route['designation/edit']="DesignationController/edit";
$route['designation/delete']="DesignationController/delete";

/*Service Routes*/
$route['service']="ServiceController/index";
$route['service/add']="ServiceController/add";
$route['service/delete']="ServiceController/delete";
$route['service/edit']="ServiceController/edit";
$route['service/service_booking']="ServiceController/service_booking";
$route['service/service_booking_view']="ServiceController/service_booking_view";
$route['service/selected_services']="ServiceController/selected_services";
$route['service/book_service']="ServiceController/book_service";
$route['service/selected_services_view']="ServiceController/selected_services_view";
$route['service/selected_services_cancle']="ServiceController/selected_services_cancle";

/*Customers Routes*/
$route['customer']="CustomerController/index";
$route['customer/add']="CustomerController/add_customer";
$route['customer/delete']="CustomerController/delete";
$route['customer/editprofile']="CustomerController/editprofile";
$route['customer/resetpassword']="CustomerController/resetpassword";
$route['customer/feedback']="CustomerController/feedback";
$route['customer/add_feedback']="CustomerController/add_feedback";
/*Customer Routes*/

/*Customer Group Routes*/
$route['customer-groups']="CustomerController/customer_groups";
$route['add-customer-group']="CustomerController/add_customer_group";
$route['delete-group']="CustomerController/delete_group";
/*Customer Group Routes*/

/*Brand Routes*/
$route['brands']="BrandController/brands";
$route['add-brand']="BrandController/add_brand";
$route['delete-brand']="BrandController/delete_brand";
/*Brand Routes*/

/*Supplier Routes*/
$route['suppliers']="SupplierController/suppliers";
$route['add-supplier']="SupplierController/add_supplier";
$route['delete-supplier']="SupplierController/delete_supplier";
$route['supplier']="SupplierController/supplier";
$route['update-supplier']="SupplierController/update_supplier";
/*Supplier Routes*/

/*Barcode Routes*/
$route['barcodes']="BarcodeController/barcodes";
$route['add-barcode']="BarcodeController/add_barcode";
$route['delete-barcode']="BarcodeController/delete_barcode";
$route['print-barcode']="BarcodeController/print_barcode";
/*Barcode Routes*/

/*Product Routes*/
$route['products']="ProductController/products";
$route['add-product']="ProductController/add_product";
$route['delete-product']="ProductController/delete_product";
/*Product Routes*/

/*Purchase Order Routes*/
$route['purchase-orders']="PurchaseOrderController/purchase_orders";
$route['add-purchase-order']="PurchaseOrderController/add_purchase_order";
$route['add-purchase-order-details']='PurchaseOrderController/add_purchase_order_details';
$route['delete-purchase-order']="PurchaseOrderController/delete_purchase_order";
$route['print-purchase-order/(:any)']="PurchaseOrderController/print_purchase_order/$1";
/*Purchase Order Routes*/

/*Product Stock Routes*/
$route['product-stock']="ProductController/product_stock";
$route['add-product-stock']="ProductController/add_product_stock";
$route['add-product-stock-details']="ProductController/add_product_stock_details";
$route['delete-product-stock']="ProductController/delete_product_stock";
/*Product Stock Routes*/

/*Sales Order Routes*/
$route['sales-orders']="SalesOrderController/sales_orders";
$route['add-sales-order']="SalesOrderController/add_sales_order";
$route['add-sales-order-details']='SalesOrderController/add_sales_order_details';
$route['delete-sales-order']="SalesOrderController/delete_sales_order";
$route['print-sales-order/(:any)']="SalesOrderController/print_sales_order/$1";
$route['get-customer-details']="SalesOrderController/get_customer_details";
$route['get-product-details']="SalesOrderController/get_product_details";
/*Sales Order Routes*/