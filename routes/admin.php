<?php
use Illuminate\Support\Facades\Route;

Route::get('/home', 'Admin\DashboardController@index')->name('master.dashboard');
////Accounting routes
Route::prefix('accounting')->group(function () {

}); ////////Accounting routes end -----------//------------- Accounting routes end
///////Tenant routes
Route::get('pw-gen', 'Admin\UserController@pw_gen');
Route::prefix('tenant')->group(function () {
    Route::get('list', 'Admin\TenantController@index')->name('tenant.list');
    Route::get('create', 'Admin\TenantController@create')->name('tenant.create');
    Route::post('store', 'Admin\TenantController@store')->name('tenant.store');
    Route::get('view/{id}', 'Admin\TenantController@show')->name('tenant.view');
    Route::get('edit/{id}', 'Admin\TenantController@edit')->name('tenant.edit');
    Route::post('update/{id}', 'Admin\TenantController@update')->name('tenant.update');
    Route::post('delete', 'Admin\TenantController@destroy')->name('tenant.delete');
    Route::post('all-tenant-fetch', 'Admin\TenantController@fetch_all_tenants_table')->name('tenant.table.all');
    Route::post('fetch', 'Admin\TenantController@fetch')->name('fetch.tenants');
    Route::get('allot/property/{id}', 'Admin\TenantController@property_allot')->name('tenant.allot.property');
    Route::get('renewal-list', 'Admin\TenantController@renewal_list')->name('tenancy.renewal.list');
    Route::post('get/citywise/property/list', 'Admin\TenantController@getPropertyList')->name('citywise.property.list');
    Route::post('get/propertyUnitType/list', 'Admin\TenantController@getPropertyUnitTypes')->name('get.propertyUnitTypes.list');
    Route::post('get/getPropertyUnit/list', 'Admin\TenantController@getPropertyUnit')->name('get.getPropertyUnit.list');
    Route::post('allot/property', 'Admin\TenantController@allotPropertyToTenant')->name('allot.property');
    Route::post('changeStatus', 'Admin\TenantController@changeStatus')->name('tenant.changeStatus');
    Route::get('tenant-remove-request', 'Admin\PropertyAllotmentController@tenant_remove_request')->name('tenant.remove.req');
});
Route::prefix('allot-property')->group(function () {
    Route::get('tenant/{id}', 'Admin\PropertyAllotmentController@index')->name('tenant.allot.property');
    Route::get('tenant/{id}/property/unit/{property_unit_id}', 'Admin\PropertyAllotmentController@index')->name('tenant.allot.property.unit');
    Route::get('detail/tenant/{id}/allotment/{allotmentId}', 'Admin\PropertyAllotmentController@view')->name('allotment.detail');
    Route::post('get/citywise/property/list', 'Admin\PropertyAllotmentController@getPropertyList')->name('citywise.property.list');
    Route::post('get/propertyUnitType/list', 'Admin\PropertyAllotmentController@getPropertyUnitTypes')->name('get.propertyUnitTypes.list');
    Route::post('get/getPropertyUnit/list', 'Admin\PropertyAllotmentController@getPropertyUnit')->name('get.getPropertyUnit.list');
    Route::post('allot/property', 'Admin\PropertyAllotmentController@allotProperty')->name('allot.property');
    Route::get('renewal-breakdown/{id}', 'Admin\PropertyAllotmentController@renewal_break_down')->name('tenancy.renew.breakdown');
    Route::post('fetch-renewal', 'Admin\TenantController@fetch_renewal')->name('tenant.renewal.fetch');
    Route::post('breakdown-save-send', 'Admin\PropertyAllotmentController@teanancy_breakdown_save_send')->name('tenancy.breakdown.save.send');
    Route::post('renewal-tenancy', 'Admin\PropertyAllotmentController@renewTenancy')->name('tenancy.renewal.post');
    Route::get('renewal-tenancy-breakdown-pdf/{breakdown}', 'Admin\PropertyAllotmentController@breakdown_pdf_view')->name('renewal.breakdown.pdf');
    Route::post('store-evict', 'Admin\PropertyAllotmentController@store_eviction')->name('store.eviction');
    Route::post('store-moveout', 'Admin\PropertyAllotmentController@store_moveout')->name('store.moveout');
    Route::post('fetch-all-remove-req', 'Admin\PropertyAllotmentController@fetch_all_removal_req')->name('fetch.remove.req');
    Route::post('update-remove-req', 'Admin\PropertyAllotmentController@store_remove_action')->name('update.remove.actions');

});
/****************************Sale Property Controller ************************/
Route::prefix('buyer')->group(function () {
    Route::get('list', 'Admin\BuyerController@index')->name('buyer.list');
    Route::get('create', 'Admin\BuyerController@create')->name('buyer.create');
    Route::post('fetch', 'Admin\BuyerController@fetch')->name('buyer.fetch');
    Route::post('store', 'Admin\BuyerController@store')->name('buyer.store');
    Route::get('edit/{id}', 'Admin\BuyerController@edit')->name('buyer.edit');
    Route::post('update/{id}', 'Admin\BuyerController@update')->name('buyer.update');
    Route::post('changeStatus', 'Admin\BuyerController@changeStatus')->name('buyer.changeStatus');
});
/****************************Sale Property Controller ************************/
Route::prefix('sales')->group(function () {
    Route::get('property/sales/list', 'Admin\SalePropertyController@index')->name('propertySales.list');
    Route::get('buyers/list', 'Admin\SalePropertyController@buyer_list')->name('propertySales.buyer.list');
    Route::post('property/sales/fetch', 'Admin\SalePropertyController@fetch')->name('propertySales.fetch');
    Route::get('property/buyer/{id}', 'Admin\SalePropertyController@create')->name('buyer.sale.property');
    Route::get('detail/buyer/{id}/allotment/{allotmentId}', 'Admin\SalePropertyController@view')->name('sale.detail');
    Route::post('get/citywise/property/list', 'Admin\SalePropertyController@getPropertyList')->name('sale.citywise.getPropertyListForSale');
    Route::post('get/propertyUnitType/list', 'Admin\SalePropertyController@getPropertyUnitTypes')->name('sale.getPropertyUnitTypes');
    Route::post('get/getPropertyUnit/list', 'Admin\SalePropertyController@getPropertyUnit')->name('sale.getPropertyUnits');
    Route::post('allot/property', 'Admin\SalePropertyController@allotProperty')->name('sale.property');
    Route::post('get/unit/detail', 'Admin\SalePropertyController@getPropertyUnitDetail')->name('sale.getPropertyUnitDetails');
    Route::post('get/property/owner/detail', 'Admin\SalePropertyController@getPropertyOwnerDetail')->name('sale.getPropertyOwnerDetail');
    Route::post('book/property', 'Admin\SalePropertyController@book_property')->name('sale.bookProperty');
    Route::get('property/booking/detail/{id}', 'Admin\SalePropertyController@show')->name('sale.bookingDetail.view');
    Route::post('upload/documents', 'Admin\SalePropertyController@upload_docs')->name('sale.upload.docs');
    Route::post('complete/property/sale', 'Admin\SalePropertyController@completePropertySell')->name('complete.property.sell');
});
/********************** owner listing**************/
Route::prefix('owner')->group(function () {
    Route::get('list', 'Admin\OwnerController@index')->name('owner.list');
    Route::post('fetch', 'Admin\OwnerController@fetch')->name('owner.fetch');
    Route::post('changeStatus', 'Admin\OwnerController@changeStatus')->name('owner.changeStatus');
    Route::get('create', 'Admin\OwnerController@create')->name('owner.create');
    Route::get('edit/{id}', 'Admin\OwnerController@edit')->name('owner.edit');
    Route::post('store', 'Admin\OwnerController@store')->name('owner.store');
    Route::post('update/{id}', 'Admin\OwnerController@update')->name('owner.update');
    Route::post('delete', 'Admin\OwnerController@destroy')->name('owner.delete');
    Route::get('view/{id}', 'Admin\OwnerController@view')->name('owner.view');
    Route::post('get/property/units', 'Admin\OwnerController@get_property_units')->name('owner.get.property.units');
    Route::post('allot/unit/', 'Admin\OwnerController@allot_unit')->name('owner.allot.property.unit');
});

/********************** developer listing**************/
Route::prefix('developer')->group(function () {
    Route::get('list', 'Admin\DeveloperController@index')->name('developer.list');
    Route::post('fetch', 'Admin\DeveloperController@fetch')->name('developer.fetch');
    Route::post('changeStatus', 'Admin\DeveloperController@changeStatus')->name('developer.changeStatus');
    Route::get('create', 'Admin\DeveloperController@create')->name('developer.create');
    Route::get('edit/{id}', 'Admin\DeveloperController@edit')->name('developer.edit');
    Route::post('store', 'Admin\DeveloperController@store')->name('developer.store');
    Route::post('update/{id}', 'Admin\DeveloperController@update')->name('developer.update');
    Route::get('view/{id}', 'Admin\DeveloperController@view')->name('developer.view');
    Route::post('delete', 'Admin\DeveloperController@destroy')->name('developer.delete');
});
/********************** Agent listing**************/
Route::prefix('agent')->group(function () {
    Route::get('index', 'Admin\AgentController@index')->name('agent.index');
    Route::get('list', 'Admin\AgentController@agentList')->name('agent.list');
    Route::post('fetch', 'Admin\AgentController@fetch')->name('agent.fetch');
    Route::post('changeStatus', 'Admin\AgentController@changeStatus')->name('agent.changeStatus');
    Route::get('create', 'Admin\AgentController@create')->name('agent.create');
    Route::get('edit/{id}', 'Admin\AgentController@edit')->name('agent.edit');
    Route::post('store', 'Admin\AgentController@store')->name('agent.store');
    Route::post('update/{id}', 'Admin\AgentController@update')->name('agent.update');
    Route::get('view/{id}', 'Admin\AgentController@view')->name('agent.view');
    Route::post('delete', 'Admin\AgentController@destroy')->name('agent.delete');

    Route::get('/type/company/create', 'Admin\AgentController@create_company_type_agent')->name('agent.type.company.create');
});
/********************** Agent listing**************/
Route::prefix('employee')->group(function () {
    Route::get('list', 'Admin\EmployeeController@index')->name('employee.list');
    Route::post('fetch', 'Admin\EmployeeController@fetch')->name('employee.fetch');
    Route::post('changeStatus', 'Admin\EmployeeController@changeStatus')->name('employee.changeStatus');
    Route::get('create', 'Admin\EmployeeController@create')->name('employee.create');
    Route::get('edit/{id}', 'Admin\EmployeeController@edit')->name('employee.edit');
    Route::post('store', 'Admin\EmployeeController@store')->name('employee.store');
    Route::post('update/{id}', 'Admin\EmployeeController@update')->name('employee.update');
    Route::post('show', 'Admin\EmployeeController@show')->name('employee.show');
    Route::post('delete', 'Admin\EmployeeController@destroy')->name('employee.delete');
});
/********************** Attendance listing**************/
Route::prefix('attendance')->group(function () {
    Route::get('search', 'Admin\AttendanceController@search')->name('attendance.search');
    Route::any('attendance', 'Admin\AttendanceController@attendance')->name('generate.attendance');
    Route::any('edit/attendance', 'Admin\AttendanceController@edit_attendance')->name('edit.individual.attendance');
    Route::get('list', 'Admin\AttendanceController@index')->name('attendance.list');
    Route::post('fetch', 'Admin\AttendanceController@fetch')->name('attendance.fetch');
    Route::post('changeStatus', 'Admin\AttendanceController@changeStatus')->name('attendance.changeStatus');
    Route::get('create', 'Admin\AttendanceController@create')->name('attendance.create');
    Route::get('edit/{id}', 'Admin\AttendanceController@edit')->name('attendance.edit');
    Route::post('store', 'Admin\AttendanceController@store')->name('attendance.store');
    Route::post('update/{id}', 'Admin\AttendanceController@update')->name('attendance.update');
    Route::post('show', 'Admin\AttendanceController@show')->name('attendance.show');
    Route::post('delete', 'Admin\AttendanceController@destroy')->name('attendance.delete');
});
/*------------property related routes------*/
Route::prefix('property')->group(function () {
    Route::get('list', 'Admin\PropertyController@index')->name('property.list');
    Route::post('fetch', 'Admin\PropertyController@fetch')->name('property.fetch');
    Route::get('view/{id}', 'Admin\PropertyController@view')->name('property.view');
    Route::get('create', 'Admin\PropertyController@create')->name('property.create');
    Route::post('changeStatus', 'Admin\PropertyController@changeStatus')->name('property.changeStatus');
    Route::post('store', 'Admin\PropertyController@store')->name('property.store');
    Route::get('{id}/edit', 'Admin\PropertyController@edit')->name('property.edit');
    Route::post('update/{id}', 'Admin\PropertyController@update')->name('property.update');
    Route::post('delete', 'Admin\PropertyController@destroy')->name('property.delete');
    Route::get('allotted', 'Admin\PropertyController@allotted_property')->name('property.allotted');
    Route::post('gen-prop-code', 'Admin\AdminCommonController@generate_property_code')->name('property.code.gen');
    Route::get('property-settings', 'Admin\PropertyController@property_setting')->name('admin.property.setting');
    Route::get('fetch-property-select2', 'Admin\AjaxController@select2_get_property')->name('select2.property');
    Route::post('fetch-property-for-select2', 'Admin\AjaxController@select2_get_property')->name('select2.property.post');
    Route::post('fetch-unit-by-prop', 'Admin\AjaxController@get_units_by_porperty')->name('select.units.by.prop');
    Route::post('fetch/alloted/property', 'Admin\PropertyAllotmentController@fetch_alloted_properties')->name('fetch.allocated.properties');
});
/*------------property unit routes------*/
Route::prefix('propertyUnit')->group(function(){
 Route::get('list', 'Admin\PropertyUnitController@index')->name('property.unit.list');
 Route::post('fetch', 'Admin\PropertyUnitController@fetch')->name('property.unit.fetch');
 Route::get('view/{id}', 'Admin\PropertyUnitController@view')->name('property.unit.view');
 Route::post('show', 'Admin\PropertyUnitController@show')->name('property-unit.view');
 Route::post('store', 'Admin\PropertyUnitController@store')->name('property.unit.store');
 Route::post('detail', 'Admin\PropertyUnitController@property_unit_detail')->name('property.unit.detail');
 Route::post('get/client/list', 'Admin\PropertyUnitController@get_client')->name('client.fetch');
 Route::post('get/allotment/link', 'Admin\PropertyUnitController@get_allotment_link')->name('link.unit.allotment');
 Route::post('update', 'Admin\PropertyUnitController@update')->name('property-unit.update');
});
/*------------property unit type routes------*/
Route::prefix('propertyUnitType')->group(function(){
 Route::post('show', 'Admin\PropertyUnitTypeController@show')->name('property.unit.type.view');
 Route::post('delete', 'Admin\PropertyUnitTypeController@destroy')->name('property.unit.type.delete');
});
Route::prefix('feature')->group(function () {
    Route::get('list', 'Admin\FeatureController@index')->name('feature.list');
    Route::get('create', 'Admin\FeatureController@create')->name('feature.create');
    Route::post('store', 'Admin\FeatureController@store')->name('feature.store');
    Route::post('update', 'Admin\FeatureController@update')->name('feature.update');
    Route::post('show', 'Admin\FeatureController@show')->name('feature.show');
    Route::post('delete', 'Admin\FeatureController@destroy')->name('feature.delete');
});
Route::prefix('propertyType')->group(function () {
    Route::get('list', 'Admin\PropertyTypeController@index')->name('propertyType.list');
    Route::get('create', 'Admin\PropertyTypeController@create')->name('propertyType.create');
    Route::post('store', 'Admin\PropertyTypeController@store')->name('propertyType.store');
    Route::post('fetch', 'Admin\PropertyTypeController@fetch')->name('propertyType.fetch');
    Route::post('changeStatus', 'Admin\PropertyTypeController@changeStatus')->name('propertyType.changeStatus');
    Route::post('update', 'Admin\PropertyTypeController@update')->name('propertyType.update');
    Route::post('show', 'Admin\PropertyTypeController@show')->name('propertyType.show');
    Route::post('delete', 'Admin\PropertyTypeController@destroy')->name('propertyType.delete');
});

Route::prefix('ajax')->group(function () {
    Route::post('/states', 'Admin\AjaxController@get_state_list')->name('ajax.get.states');
    Route::post('/cities', 'Admin\AjaxController@get_cities_list')->name('ajax.get.cities');
    Route::post('/image/delete', 'Admin\AjaxController@deletePropertyImages')->name('ajax.delete.image');
});

//Department Routes
Route::prefix('department')->group(function() {
    Route::get('list','Admin\DepartmentController@index')->name('department.list');
    Route::post('fetch','Admin\DepartmentController@fetch')->name('department.fetch');
    Route::post('store','Admin\DepartmentController@store')->name('department.store');
    Route::post('update','Admin\DepartmentController@update')->name('department.update');
    Route::post('show','Admin\DepartmentController@show')->name('department.show');
    Route::post('delete','Admin\DepartmentController@destroy')->name('department.delete');
    Route::post('changeStatus','Admin\DepartmentController@changeStatus')->name('department.changeStatus');
});
//Department Routes
Route::prefix('salary')->group(function() {
    Route::get('list','Admin\SalaryController@index')->name('salary.sheet.list');
    Route::any('create/salary-sheet','Admin\SalaryController@createSalarySheet')->name('create.salary.sheet');
    Route::post('generate/salary-sheet','Admin\SalaryController@generateSalarySheet')->name('generate.salary.sheet');
    Route::post('fetch','Admin\SalaryController@fetch')->name('salary.fetch');
    Route::post('store','Admin\SalaryController@store')->name('salary.store');
    Route::get('edit/salary-sheet/{id}', 'Admin\SalaryController@editSalarySheet')->name('salary.edit');
    Route::post('update/salary-sheet/{id}','Admin\SalaryController@updateSalarySheet')->name('update.salary.sheet');
    Route::get('show/wps-sheet/{id}','Admin\SalaryController@show_wps_sheet')->name('salary.wps-sheet.show');
    Route::get('export/excel/wps-sheet/{id}','Admin\SalaryController@exportWpsSheet')->name('salary.wps-sheet.export');
    Route::post('delete','Admin\SalaryController@destroy')->name('salary.delete');
    Route::post('changeStatus','Admin\SalaryController@changeStatus')->name('salary.changeStatus');
});

//Designation Routes
Route::prefix('designation')->group(function() {
    Route::get('list','Admin\DesignationController@index')->name('designation.list');
    Route::post('fetch','Admin\DesignationController@fetch')->name('designation.fetch');
    Route::post('store','Admin\DesignationController@store')->name('designation.store');
    Route::post('update','Admin\DesignationController@update')->name('designation.update');
    Route::post('show','Admin\DesignationController@show')->name('designation.show');
    Route::post('delete','Admin\DesignationController@destroy')->name('designation.delete');
    Route::post('changeStatus','Admin\DesignationController@changeStatus')->name('designation.changeStatus');
});


/*------------end property releted routes --*/
/////------Task Routes -------------------- Task routes-----------------////
Route::prefix('task')->group(function () {
    Route::get('/', 'Admin\TaskController@index')->name('task.list');
    Route::get('create', 'Admin\TaskController@create')->name('task.create');
    Route::get('show/{id}', 'Admin\TaskController@show')->name('task.show');
    Route::post('update/{id}', 'Admin\TaskController@update')->name('task.update');
    Route::post('store', 'Admin\TaskController@store')->name('task.store');
    Route::post('get/chat/list', 'Admin\TaskController@get_chat_list')->name('task.get.chat.list');
    Route::post('chat/store', 'Admin\TaskController@store_chat')->name('task.chat.store');
    Route::post('fetch', 'Admin\TaskController@fetch')->name('task.fetch');
    Route::post('get/city/list', 'Admin\TaskController@get_city_list')->name('task.get.ciy.list');
    Route::post('get/property/list', 'Admin\TaskController@get_property_list')->name('task.get.property.list');
    Route::post('get/property-unit/list', 'Admin\TaskController@get_property_unit_list')->name('task.get.property_unit.list');
    Route::post('get/user/list', 'Admin\TaskController@get_user_list')->name('task.get.users.list');
    Route::post('get/task/list', 'Admin\TaskController@get_task_list')->name('get.task.list');
    Route::post('generate/code', 'Admin\TaskController@generate_task_code')->name('task.generate.code');
    Route::post('update/task/status', 'Admin\TaskController@taskStatusUpdate')->name('update.task.status');
});
/////----------end Task Routes ---------------------end Task routes-----------------////
/*-----------various small function contrller routes ----*/
Route::prefix('country')->group(function () {
    Route::post('fetch', 'Admin\CountryController@fetch')->name('country.fetch');
    Route::post('changeStatus', 'Admin\CountryController@changeStatus')->name('country.changeStatus');
    Route::get('list', 'Admin\CountryController@index')->name('country.list');
    Route::post('store', 'Admin\CountryController@store')->name('country.store');
    Route::post('update', 'Admin\CountryController@update')->name('country.update');
    Route::post('show', 'Admin\CountryController@show')->name('country.show');
    Route::post('delete', 'Admin\CountryController@destroy')->name('country.delete');
});
Route::prefix('state')->group(function () {
    Route::post('fetch', 'Admin\StateController@fetch')->name('state.fetch');
    Route::post('changeStatus', 'Admin\StateController@changeStatus')->name('state.changeStatus');
    Route::get('list', 'Admin\StateController@index')->name('state.list');
    Route::post('store', 'Admin\StateController@store')->name('state.store');
    Route::post('update', 'Admin\StateController@update')->name('state.update');
    Route::post('show', 'Admin\StateController@show')->name('state.show');
    Route::post('delete', 'Admin\StateController@destroy')->name('state.delete');
});
Route::prefix('city')->group(function () {
    Route::post('fetch', 'Admin\CityController@fetch')->name('city.fetch');
    Route::post('changeStatus', 'Admin\CityController@changeStatus')->name('city.changeStatus');
    Route::get('list', 'Admin\CityController@index')->name('city.list');
    Route::post('store', 'Admin\CityController@store')->name('city.store');
    Route::post('update', 'Admin\CityController@update')->name('city.update');
    Route::post('show', 'Admin\CityController@show')->name('city.show');
    Route::post('delete', 'Admin\CityController@destroy')->name('city.delete');
});
Route::prefix('slider')->group(function () {
    Route::get('list', 'Admin\SliderController@index')->name('slider.list');
    Route::post('store', 'Admin\SliderController@store')->name('slider.store');
    Route::post('update', 'Admin\SliderController@update')->name('slider.update');
    Route::post('show', 'Admin\SliderController@show')->name('slider.show');
    Route::post('delete', 'Admin\SliderController@destroy')->name('slider.delete');
});
Route::prefix('users')->group(function () {
    Route::post('fetch', 'Admin\UserController@fetch')->name('users.fetch');
    Route::post('changeStatus', 'Admin\UserController@changeStatus')->name('users.changeStatus');
    Route::get('list', 'Admin\UserController@index')->name('users.list');
    Route::post('store', 'Admin\UserController@store')->name('users.store');
    Route::post('update', 'Admin\UserController@update')->name('users.update');
    Route::post('show', 'Admin\UserController@show')->name('users.show');
    Route::post('delete', 'Admin\UserController@destroy')->name('users.delete');
});

Route::prefix('booking-request')->group(function () {
    Route::get('list', 'Admin\BookingRequestController@index')->name('booking-request.list');
    Route::post('fetch', 'Admin\BookingRequestController@fetch')->name('booking-request.fetch');
});
Route::prefix('system-setting')->group(function () {
    Route::get('/', 'Admin\SystemSettingController@index')->name('settings');
    Route::get('list', 'Admin\SystemSettingController@system_setting')->name('system-setting');
    Route::post('update', 'Admin\SystemSettingController@store_website_setting')->name('system-setting.update');
});
Route::prefix('contact-request')->group(function () {
    Route::get('list', 'Admin\ContactRequestController@index')->name('contact-request.list');
});
Route::prefix('rent-inquiry')->group(function () {
    Route::get('list', 'Admin\RentEnquiryController@index')->name('rentEnquiry.list');
    Route::get('create', 'Admin\RentEnquiryController@create')->name('rentEnquiry.create');
    Route::post('store', 'Admin\RentEnquiryController@store')->name('rentEnquiry.store');
    Route::post('fetch', 'Admin\RentEnquiryController@fetch')->name('rentEnquiry.fetch');
    Route::post('archive', 'Admin\RentEnquiryController@archive')->name('rentEnquiry.archive');
});

Route::prefix('sales-inquiry')->group(function () {
    Route::get('list', 'Admin\SalesEnquiryController@index')->name('salesEnquiry.list');
    Route::get('create', 'Admin\SalesEnquiryController@create')->name('salesEnquiry.create');
    Route::post('store', 'Admin\SalesEnquiryController@store')->name('salesEnquiry.store');
    Route::post('fetch', 'Admin\SalesEnquiryController@fetch')->name('salesEnquiry.fetch');
    Route::post('archive', 'Admin\SalesEnquiryController@archive')->name('salesEnquiry.archive');
});

/*------------maintenance routes ------------------*/
Route::prefix('maintenance')->group(function () {
Route::get('/list', 'Admin\MaintenanceController@index')->name('maintenance.list');
Route::get('/create', 'Admin\MaintenanceController@create')->name('maintenance.create');
Route::post('/store', 'Admin\MaintenanceController@store')->name('maintenance.store');
Route::post('/fetch', 'Admin\MaintenanceController@fetch')->name('maintenance.fetch');
Route::get('/view/{id}', 'Admin\MaintenanceController@view')->name('maintenance.view');
Route::post('/update', 'Admin\MaintenanceController@updateWorkProgress')->name('maintenance.update');

Route::get('/quotation/create', 'Admin\MaintenanceController@create_quotation')->name('maintenance.quotation.create');
});
