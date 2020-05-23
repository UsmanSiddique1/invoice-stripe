<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\Customer;

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

Route::get('/send-email', function(){
	Mail::to('invoice@dermrxpharmacy.com')->send(new Customer());
	return new Customer();
});

Route::get('/', 'StripePaymentController@payForm');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');



Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('checkuser');

Route::middleware(['checkadmin'])->group(function () {

Route::post('register_team', 'AdminController@register_team')->name('register.team');


Route::get('/editteam/{id}', 'AdminController@edit_team')->name('edit.team');
Route::post('update_team', 'AdminController@update_team')->name('update.team');


Route::get('/admin-dashboard', 'AdminController@dashboard')->name('admin.dashboard');
Route::get('/allteam', 'AdminController@allTeam')->name('admin.allteam');

Route::get('billers','AdminController@allbillers')->name('billers');
Route::post('/add_biller', 'AdminController@addBiller')->name('add_biller');
Route::post('/update_biller', 'AdminController@updateBiller')->name('update_biller');
Route::get('/biller/{id}', 'AdminController@delBiller')->name('del_biller');

Route::get('services','AdminController@allServices')->name('services');
Route::post('/addservice', 'AdminController@addService')->name('addservice');
Route::post('/update_service', 'AdminController@updateService')->name('update_service');
Route::get('/service/{id}', 'AdminController@delService')->name('del_service');


Route::get('/all_customers', 'AdminController@all_customers')->name('all_customers');
Route::post('/updateverification', 'AdminController@updateverification')->name('updateverification');

Route::post('/zipsearch', 'StripePaymentController@zipsearch')->name('zipsearch');

});
Route::get('/team-dashboard', 'TeamController@all_customers')->name('all_customers')->middleware('checkteam');