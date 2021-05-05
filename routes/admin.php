<?php

Route::get('Admin',  function(){
    return redirect()->route('admin.login');
});

Route::group(['namespace' => 'Auth'], function(){
    # Login Routes
    Route::get('login',     'LoginController@showLoginForm')->name('login');
    Route::post('login',    'LoginController@login');
    Route::post('logout',   'LoginController@logout')->name('logout');

});

Route::group(['middleware' => 'auth:admin'],function (){

    # dashboard
    Route::get('/dashboard',                'DashboardController@index')->name('dashboard');

    # admin update password
    Route::get('change-password',           'DashboardController@changePassword')->name('change-password');
    Route::patch('update-password',         'DashboardController@updatePassword')->name('update-password');

    # designation
    Route::group(['prefix' => 'designation', 'as' => 'designation.'],function (){
        Route::get('/',                     'DesignationController@index')->name('index');
        Route::post('store',                'DesignationController@store')->name('store');
        Route::get('edit',                  'DesignationController@edit')->name('edit');
        Route::post('update',               'DesignationController@update')->name('update');
        Route::post('delete',               'DesignationController@delete')->name('delete');
        Route::patch('change-status',       'DesignationController@changeStatus')->name('change_status');
    });

    # department
    Route::group(['prefix' => 'department', 'as' => 'department.'],function (){
        Route::get('/',                     'DepartmentController@index')->name('index');
        Route::post('store',                'DepartmentController@store')->name('store');
        Route::get('edit',                  'DepartmentController@edit')->name('edit');
        Route::post('update',               'DepartmentController@update')->name('update');
        Route::post('delete',               'DepartmentController@delete')->name('delete');
        Route::patch('change-status',       'DepartmentController@changeStatus')->name('change_status');
    });

    # employee
    Route::group(['prefix' => 'employee', 'as' => 'employee.'],function (){
        Route::get('/',                     'EmployeeController@index')->name('index');
        Route::post('store',                'EmployeeController@store')->name('store');
        Route::get('edit',                  'EmployeeController@edit')->name('edit');
        Route::get('add',                   'EmployeeController@create')->name('add');
        Route::get('edits/{id}',            'EmployeeController@edits')->name('edits');
        Route::post('update',               'EmployeeController@update')->name('update');
        Route::post('delete',               'EmployeeController@delete')->name('delete');
        Route::get('view/{id}',             'EmployeeController@view')->name('view');
        Route::patch('change-status',       'EmployeeController@changeStatus')->name('change_status');
    });

});

?>