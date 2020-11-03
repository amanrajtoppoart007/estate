<?php
use Illuminate\Support\Facades\Route;
Route::get('/home', 'Tenant\DashboardController@index')->name('tenant.dashboard');
Route::post('/get/property/unit/list', 'Tenant\CommonController@get_property_units')->name('tenant.get.unit.list');
Route::prefix('maintenance')->group(function () {
Route::get('/list', 'Tenant\MaintenanceController@index')->name('tenant.maintenance.list');
Route::get('/create', 'Tenant\MaintenanceController@create')->name('tenant.maintenance.create');
Route::post('/store', 'Tenant\MaintenanceController@store')->name('tenant.maintenance.store');
Route::post('/fetch', 'Tenant\MaintenanceController@fetch')->name('tenant.maintenance.fetch');
Route::get('/view/{id}', 'Tenant\MaintenanceController@view')->name('tenant.maintenance.view');

});
Route::prefix('Rent')->group(function () {
Route::get('/index', 'Tenant\RentController@index')->name('tenant.rent.index');

});
