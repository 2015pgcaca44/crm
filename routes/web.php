<?php
use App\User;
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

Route::get('/', function () {
    return view('welcome');
});

 Auth::routes();
// Route::middleware('auth', 'isAdmin')->namespace('admin')->group(function(){
// 	Route::get('admin/users', 'UsersController@index')->name('admin.users');
// });

//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register','Auth\RegisterController@create');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('logout/{user_id}', 'LogoutController@logout');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard', 'ChartController@index')->name('dashboard');
Route::get('charts', 'ChartController@index')->name('chart.index');

// admin section//
Route::get('user_list', 'UsersController@index');
Route::post('insert_users','UsersController@store');
Route::get('delete_users/{id}','UsersController@delete');
Route::post('edit_users','UsersController@update');
Route::get('user_status/{id}','UsersController@change_status');

Route::get('tasks', 'TasksController@index');
Route::get('tasks_pending', 'TasksController@pending');
Route::get('tasks_completed', 'TasksController@completed');
Route::post('tasks_insert','TasksController@update');
// Route::put('tasks_update/{}', 'TasksController@update');
Route::get('searching/{search}','TasksController@index');
Route::delete('tasks_delete/{client_id}', 'TasksController@delete');

Route::get('client_tasks', 'TasksController@client_tasks');
Route::get('client_tasks_pending', 'TasksController@client_tasks_pending');
Route::get('client_tasks_completed', 'TasksController@client_tasks_completed');
Route::post('assign_task', 'TasksController@assign_task');
Route::get('get_assign_task', 'TasksController@assign_task_index');

Route::get('leads_admin', 'LeadsController@index');
Route::post('/import_excel_leads', 'LeadsController@import');
Route::get('leads_admin_business', 'LeadsController@index_business')->name('admin.leads_admin_business');;
Route::get('leads_clients', 'LeadsController@client_leads');
Route::get('leads_admin/{id}', 'LeadsController@showleads');
Route::post('insert_leads','LeadsController@store');

//Route::delete('tasks_delete/{id}', 'TasksController@delete');
Route::get('fblogin', 'LeadsController@fblogin');
Route::get('callback', 'LeadsController@fbcallback');
Route::get('leadgen', 'LeadsController@leadgen');
Route::get('profile', 'LeadsController@fbprofile');

Route::get('clients_list', 'ClientsController@index')->name('admin.clients_list');
Route::get('clients_list_business', 'ClientsController@index_business')->name('admin.clients_list');
//Route::get('clients_list/{clients}', 'ClientsController@show');
Route::get('add_clients','ClientsController@client_form');
Route::post('insert_client','ClientsController@store');
Route::post('edit_client','ClientsController@update');
Route::delete('clients/{client_id}', 'ClientsController@delete');

Route::get('sales_list', 'SalesController@index')->name('admin.sales_list');
Route::get('add_sales','SalesController@sales_form');
Route::get('add_sales_client','SalesController@client_sales_form');
Route::post('insert_sales','SalesController@store');
Route::get('client_sales_list', 'SalesController@client_sales')->name('admin.client_sales_list');
Route::post('insert_sales_client','SalesController@store_client');
Route::post('edit_sales/{id}','SalesController@update');
// user section
// Route::get('task_list/{client_id}', 'TasklistController@index');
// Route::get('completed/{client_id}', 'TasklistController@completed');
// Route::get('leads_user/{client_id}', 'LeadsController@indexuser');
Route::get('completed-task', 'TaskListController@completed')->name('completed');
Route::get('leads_user', 'LeadsController@indexuser')->name('leads_user');
Route::get('leads_user', 'LeadsController@indexuser')->name('leads_user');
