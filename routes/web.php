<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

/**
 * user after login routes
 */
Route::get('/home', 'User\HomeController@index')->name("user.home");
Route::get('/profile', 'User\UserController@profile')->name("profile");
Route::post('/favorite/store', 'User\UserController@store_favorite')->name("favorite.store");
/**
 * end user after login routes
 */
/***
 *front end agent routes
 */
Route::get('/agent/list', 'Guest\AgentController@search')->name('agent.search');
Route::get('/view/agent/detail/{id}', 'Guest\AgentController@view')->name('view.agent.detail');
/*
 *frontend end agent routes
 */
Route::any('/auth/check', 'Guest\AjaxController@check_auth')->name("check.user.auth.status");

Route::get('/', 'Guest\GuestController@index')->name("guest.home");
Route::get('/buy', 'Guest\GuestController@buy');
Route::post('/bookingRequest/store', 'Guest\BookingRequestController@store')->name('bookingRequest.store');
Route::any('get/property/listing/map', 'Guest\SearchController@map_search_api')->name('get.property.listing.map');
Route::post('search/property/listing', 'Guest\SearchController@web_api_search')->name('search.property.listing');
Route::get('property/search', 'Guest\SearchController@search')->name('property.search');
Route::post('property/search', 'Guest\SearchController@search')->name('property.search');
Route::get('property/view/{unit_code}', 'Guest\GuestController@propertyView')->name('property.listing.detail');
Route::get('property/search/state/{id}/{name}', 'Guest\SearchController@search')->name('property.search.state');
Route::get('/contact', 'Guest\GuestController@contact')->name('contact');
Route::get('/about-us', 'Guest\GuestController@about')->name('about-us');
Route::get('/how-it-work', 'Guest\GuestController@how_it_work')->name('how-it-work');

Route::get('faq', 'Guest\GuestController@faq')->name('faq');
Route::get('terms-conditions', 'Guest\GuestController@terms')->name('terms-conditions');
Route::post('fetch/cities', 'Guest\AjaxController@get_cities_list')->name('fetch.cities');
Route::post('fetch/states', 'Guest\AjaxController@get_state_list')->name('fetch.states');
Route::post('send/contact-request', 'Guest\AjaxController@send_contact_request')->name('send.contact-request');


Route::post('calculate/endDate', 'Common\CalculationController@getEndDate')->name('calculate.endDate');
Route::get('get/document/{filename}', 'Common\ImageController@view_doc')->name('get.doc');
Route::get('view/rent/breakdown/{encoded_string}', 'Guest\RentBreakDownController@view')->name('guest.view.rent.breakdown');
Route::post('get/breakdown/config/items', 'Common\CommonController@get_breakdown_constants')->name('get.breakdown.constants');

Route::post('/agent/enquiry/store', 'Guest\AgentController@store_enquiry')->name('agent.enquiry.store');
Auth::routes();
Route::prefix('master')->group(function () {
    Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');

    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route::get('/dashboard', 'Admin\DashboardController@index2')->name('admin.dashboard');
    Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login.submit');
//forgot password routes
    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('admin.password.reset');

});
Route::prefix('tenant')->group(function () {
    Route::get('/', 'TenantAuth\LoginController@showLoginForm')->name('tenant.login');
    Route::get('/login', 'TenantAuth\LoginController@showLoginForm')->name('tenant.login');
    Route::post('/login', 'TenantAuth\LoginController@login')->name('tenant.login.submit');
    Route::get('/home', 'Tenant\DashboardController@index')->name('tenant.dashboard');
//forgot password routes
    Route::post('/password/email', 'TenantAuth\ForgotPasswordController@sendResetLinkEmail')->name('tenant.password.email');
    Route::get('/password/reset', 'TenantAuth\ForgotPasswordController@showLinkRequestForm')->name('tenant.password.request');
    Route::post('/password/reset', 'TenantAuth\ResetPasswordController@reset');
    Route::post('/logout', 'TenantAuth\LoginController@logout')->name('tenant.logout');
    Route::get('/password/reset/{token}', 'TenantAuth\ResetPasswordController@showResetForm')->name('tenant.password.reset');
});
Route::prefix('owner')->group(function () {
    Route::get('/', 'OwnerAuth\LoginController@showLoginForm')->name('owner.login');
    Route::get('/login', 'OwnerAuth\LoginController@showLoginForm')->name('owner.login');
    Route::post('/login', 'OwnerAuth\LoginController@login')->name('owner.login.submit');
    Route::post('/logout', 'OwnerAuth\LoginController@logout')->name('owner.logout');
    Route::get('/home', 'Owner\DashboardController@index')->name('owner.dashboard');
//forgot password routes
    Route::post('/password/email', 'OwnerAuth\ForgotPasswordController@sendResetLinkEmail')->name('owner.password.email');
    Route::get('/password/reset', 'OwnerAuth\ForgotPasswordController@showLinkRequestForm')->name('owner.password.request');
    Route::post('/password/reset', 'OwnerAuth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'OwnerAuth\ResetPasswordController@showResetForm')->name('owner.password.reset');
});


Route::prefix('master')->group(function () {
    Route::post('fetch-all-task', 'Admin\TaskController@fetch_all_task')->name('admin.task.fetch');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
});

Route::post('/get/property/unit/list', 'Common\CommonController@get_property_units')->name('get.unit.list');
Route::post('/get/vacant/unit/list', 'Common\CommonController@get_vacant_units')->name('get.vacant.unit.list');
Route::post('/get/city/list/via/country', 'Common\CommonController@get_country_city_list')->name('get.country.city.list');
