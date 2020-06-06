<?php
use Illuminate\Support\Facades\Route;
Route::post('/get/property/unit/list', 'Owner\CommonController@get_property_units')->name('owner.get.unit.list');
Route::prefix('maintenance')->group(function () {
Route::get('/list', 'Owner\MaintenanceController@index')->name('owner.maintenance.list');
Route::get('/create', 'Owner\MaintenanceController@create')->name('owner.maintenance.create');
Route::post('/store', 'Owner\MaintenanceController@store')->name('owner.maintenance.store');
Route::post('/fetch', 'Owner\MaintenanceController@fetch')->name('owner.maintenance.fetch');
Route::get('/view/{id}', 'Owner\MaintenanceController@view')->name('owner.maintenance.view');

});
