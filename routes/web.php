<?php

use App\Http\Controllers\Auth\LoginController;


Route::redirect('/home', '/Dashboard');
Auth::routes();

Route::get('/',[LoginController::class,'showLoginForm']);
Route::group(['prefix' => 'User','middleware' => ['auth']], function () {

Route::get('/', 'HomeController@index')->name('home');
Route::get('search', 'HomeController@search')->name('search');
Route::resource('jobs', 'JobController')->only(['index', 'show']);
Route::resource('subscriptions', SubscriptionController::class)->only('store');

Route::get('category/{category}', 'CategoryController@show')->name('categories.show');
Route::get('location/{location}', 'LocationController@show')->name('locations.show');
});


Route::group(['middleware' => ['auth']], function () {

    Route::post('/updateProfile/{id}', 'HomeController@updateProfile')->name('user.updateProfile');
    Route::post('/updateImage/{id}', 'HomeController@updateImage')->name('user.updateImage');
    Route::get('/Contact-Us', 'HomeController@contact_us')->name('ContactUs');
    Route::post('/Contact-Us', 'HomeController@sendContact')->name('send.contact');
    Route::get('/about', function(){
        return view('about'); // Your Blade template name
    });


});
Route::group(['prefix' => 'Dashboard', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('subscriptions', SubscriptionController::class);
    Route::post('subscriptions/send', 'SubscriptionController@send')->name("subscriptions.send");


    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Locations
    Route::delete('locations/destroy', 'LocationsController@massDestroy')->name('locations.massDestroy');
    Route::resource('locations', 'LocationsController');

    // Companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia');
    Route::post('image-upload', 'CompaniesController@imageUploadPost');
    Route::resource('companies', 'CompaniesController');

    // Jobs
    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobsController');

    // applied job
    Route::delete('AppliedJob/destroy', 'AppliedJobController@massDestroy')->name('appliedJob.massDestroy');
    Route::post('AppliedJob/downloadResume', 'AppliedJobController@downloadResume')->name('appliedJob.downloadResume');
    Route::resource('appliedJobs', 'AppliedJobController');
});
