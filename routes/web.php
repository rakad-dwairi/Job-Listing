<?php

use App\Http\Controllers\Auth\LoginController;


Route::redirect('/home', '/Dashboard');
Auth::routes();

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/', [LoginController::class, 'showLoginForm']);

Route::group(['prefix' => 'Profile', 'middleware' => ['auth']], function () {

    Route::get('/', 'ProfileUserController@index')->name('profile');
  

});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/UserDashoard', 'ProfileUserController@UserDashoard')->name('UserDashoard');
  

});




    Route::group(['prefix' => 'User', 'middleware' => ['auth']], function () {

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
    Route::get('/about', function () {
        return view('about'); // Your Blade template name
    });
    Route::get('/positions', 'PositionsController@index');
});
Route::group(['prefix' => 'Dashboard', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home')->middleware("checkAdmin");

    Route::resource('subscriptions', SubscriptionController::class);
    Route::post('subscriptions/send', 'SubscriptionController@send')->name("subscriptions.send");


    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy')->middleware("checkAdmin");
    Route::resource('permissions', 'PermissionsController')->middleware("checkAdmin");

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy')->middleware("checkAdmin");
    Route::resource('roles', 'RolesController')->middleware("checkAdmin");

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy')->middleware("checkAdmin");
    Route::resource('users', 'UsersController')->middleware("checkAdmin");

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy')->middleware("checkAdmin");
    Route::resource('categories', 'CategoriesController')->middleware("checkAdmin");

    // Locations
    Route::delete('locations/destroy', 'LocationsController@massDestroy')->name('locations.massDestroy');
    Route::resource('locations', 'LocationsController');

    // Companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy')->middleware("checkAdmin");
    Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia')->middleware("checkAdmin");
    Route::post('image-upload', 'CompaniesController@imageUploadPost')->middleware("checkAdmin");
    Route::resource('companies', 'CompaniesController')->middleware("checkAdmin");

    // Jobs
    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy')->middleware("checkAdmin");
    Route::resource('jobs', 'JobsController');

    // applied job
    Route::delete('AppliedJob/destroy', 'AppliedJobController@massDestroy')->name('appliedJob.massDestroy')->middleware("checkAdmin");
    Route::post('AppliedJob/downloadResume', 'AppliedJobController@downloadResume')->name('appliedJob.downloadResume')->middleware("checkAdmin");
    Route::resource('appliedJobs', 'AppliedJobController');
});
