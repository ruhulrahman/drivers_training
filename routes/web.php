<?php
Auth::routes();
//Admin Controller==========================================================
Route::get('/', 'AdminController@index');
Route::get('/admin-dashboard/', 'AdminController@admin_dashboard');
Route::middleware('admin')->group(function(){
	//Get Methods Routing Below
	Route::get('/add-new-driver', 'AdminController@add_new_driver');
	Route::match(['get', 'post'],'/search-driver', 'AdminController@search_driver');
	Route::match(['get', 'post'],'/timing-search', 'AdminController@timing_search');
	Route::get('/total-drivers-list', 'AdminController@total_drivers_list');
	Route::get('/driver-details/{id}', 'AdminController@driver_details');
	Route::get('/edit-driver-info/{id}', 'AdminController@edit_driver_info');
	Route::get('/driver-exam-listed/{id}', 'AdminController@driver_exam_listed');
	Route::get('/delete-driver-info/{id}', 'AdminController@delete_driver_info');
	Route::match(['get', 'post'],'/timing-search-total-list', 'AdminController@timing_search_total_list');
	Route::get('/drivers-list-by-date-searrch/{dl_type}', 'AdminController@drivers_list_by_date_searrch');
	Route::get('/add-new-user', 'AdminController@add_new_user');
	Route::get('/add-new-office', 'AdminController@add_new_office');
	Route::get('/total-users-list', 'AdminController@total_users_list');
	Route::get('/office-list', 'AdminController@office_list');
	Route::get('/user-details/{id}', 'AdminController@user_details');

	Route::get('/edit-user-info/{id}', 'AdminController@edit_user_info');
	Route::get('/delete-user-info/{id}', 'AdminController@delete_user_info');

	Route::get('/edit-office-info/{id}', 'AdminController@edit_office_info');
	Route::get('/delete-office-info/{id}', 'AdminController@delete_office_info');

	Route::get('/success', 'AdminController@success');
	Route::get('/total-prof-driver', 'AdminController@total_prof_driver');
	Route::get('/total-nonprof-driver', 'AdminController@total_nonprof_driver');
	Route::get('/light-class-driver', 'AdminController@light_class_driver');
	Route::get('/light-and-mtrcycle-driver', 'AdminController@light_mtrcycle_driver');
	Route::get('/total-medium-driver', 'AdminController@total_medium_driver');
	Route::get('/total-heavy-driver', 'AdminController@total_heavy_driver');
	Route::get('/total-psv-driver', 'AdminController@total_psv_driver');
	Route::get('/total-new-driver', 'AdminController@total_new_driver');
	Route::get('/total-renew-driver', 'AdminController@total_renew_driver');
	Route::get('/prof-driver-search-by-date/{start_dt}/{end_dt}', 'AdminController@prof_driver_search');
	Route::get('/nonprof-driver-search/{start_dt}/{end_dt}', 'AdminController@nonprof_driver_search');
	Route::get('/light-driver-search/{start_dt}/{end_dt}', 'AdminController@light_driver_search');
	Route::get('/lightmotorcycle-driver-search/{start_dt}/{end_dt}', 'AdminController@lightmotorcycle_driver_search');
	Route::get('/medium-driver-search/{start_dt}/{end_dt}', 'AdminController@medium_driver_search');
	Route::get('/heavy-driver-search/{start_dt}/{end_dt}', 'AdminController@heavy_driver_search');
	Route::get('/psv-driver-search/{start_dt}/{end_dt}', 'AdminController@psv_driver_search');
	Route::get('/new-driver-search/{start_dt}/{end_dt}', 'AdminController@new_driver_search');
	Route::get('/renew-driver-search/{start_dt}/{end_dt}', 'AdminController@renew_driver_search');
	Route::get('/total-driver-search/{start_dt}/{end_dt}', 'AdminController@total_driver_search');

	Route::get('/export_pdf', 'PdfController@export_pdf');




	//Listed Drivers Managing Route==============
	Route::get('/total-listed-drivers', 'ListedDriverController@total_listed_drivers');
	Route::get('/driver-exam-unlisted/{id}', 'ListedDriverController@driver_exam_unlisted');
	Route::match(['get', 'post'],'/search-listed-driver', 'ListedDriverController@search_listed_driver');
	Route::match(['get', 'post'],'/listed-drivers-search-withdate', 'ListedDriverController@listed_drivers_search_withdate');
	Route::match(['get', 'post'],'/listed-search-count', 'ListedDriverController@listed_search_count');
	Route::get('/listed-prof-driver-search/{start_dt}/{end_dt}', 'ListedDriverController@listed_prof_driver_search');
	Route::get('/listed-nonprof-driver-search/{start_dt}/{end_dt}', 'ListedDriverController@listed_nonprof_driver_search');
	Route::get('/listed-light-driver-search/{start_dt}/{end_dt}', 'ListedDriverController@listed_light_driver_search');
	Route::get('/listed-lightmotorcycle-driver-search/{start_dt}/{end_dt}', 'ListedDriverController@listed_lightmotorcycle_driver_search');
	Route::get('/listed-medium-driver-search/{start_dt}/{end_dt}', 'ListedDriverController@listed_medium_driver_search');
	Route::get('/listed-heavy-driver-search/{start_dt}/{end_dt}', 'ListedDriverController@listed_heavy_driver_search');
	Route::get('/listed-psv-driver-search/{start_dt}/{end_dt}', 'ListedDriverController@listed_psv_driver_search');
	Route::get('/listed-new-driver-search/{start_dt}/{end_dt}', 'ListedDriverController@listed_new_driver_search');
	Route::get('/listed-renew-driver-search/{start_dt}/{end_dt}', 'ListedDriverController@listed_renew_driver_search');
	Route::get('/listed-total-driver-search/{start_dt}/{end_dt}', 'ListedDriverController@listed_total_driver_search');
	Route::get('/driver-training-certificate/{id}', 'ListedDriverController@training_certificate');



	//Unlisted Drivers Managing Route==============
	Route::get('/total-unlisted-drivers', 'UnlistedDriverController@total_unlisted_drivers');
	Route::get('/driver-exam-unlisted/{id}', 'UnlistedDriverController@driver_exam_unlisted');
	Route::match(['get', 'post'],'/search-unlisted-driver', 'UnlistedDriverController@search_unlisted_driver');
	Route::match(['get', 'post'],'/unlisted-drivers-search-withdate', 'UnlistedDriverController@unlisted_drivers_search_withdate');
	Route::match(['get', 'post'],'/unlisted-search-count', 'UnlistedDriverController@unlisted_search_count');
	Route::get('/unlisted-prof-driver-search/{start_dt}/{end_dt}', 'UnlistedDriverController@unlisted_prof_driver_search');
	Route::get('/unlisted-nonprof-driver-search/{start_dt}/{end_dt}', 'UnlistedDriverController@unlisted_nonprof_driver_search');
	Route::get('/unlisted-light-driver-search/{start_dt}/{end_dt}', 'UnlistedDriverController@unlisted_light_driver_search');
	Route::get('/unlisted-lightmotorcycle-driver-search/{start_dt}/{end_dt}', 'UnlistedDriverController@unlisted_lightmotorcycle_driver_search');
	Route::get('/unlisted-medium-driver-search/{start_dt}/{end_dt}', 'UnlistedDriverController@unlisted_medium_driver_search');
	Route::get('/unlisted-heavy-driver-search/{start_dt}/{end_dt}', 'UnlistedDriverController@unlisted_heavy_driver_search');
	Route::get('/unlisted-psv-driver-search/{start_dt}/{end_dt}', 'UnlistedDriverController@unlisted_psv_driver_search');
	Route::get('/unlisted-new-driver-search/{start_dt}/{end_dt}', 'UnlistedDriverController@unlisted_new_driver_search');
	Route::get('/unlisted-renew-driver-search/{start_dt}/{end_dt}', 'UnlistedDriverController@unlisted_renew_driver_search');
	Route::get('/unlisted-total-driver-search/{start_dt}/{end_dt}', 'UnlistedDriverController@unlisted_total_driver_search');



	//Report Methods Routing Below=============================
	Route::match(['get', 'post'],'/listed-report', 'ReportController@listed_report');
	Route::match(['get', 'post'],'/unlisted-report', 'ReportController@unlisted_report');
	Route::match(['get', 'post'],'/mutual-report', 'ReportController@mutual_report');



	//Post Methods Routing below---------------------
	Route::post('/create-new-driver', 'AdminController@create_new_driver');
	Route::post('/update-driver', 'AdminController@update_driver');
	Route::post('/create-new-user', 'AdminController@create_new_user');
	Route::post('/create-new-office', 'AdminController@create_new_office');
	Route::post('/udpate-user', 'AdminController@update_user');
	Route::post('/udpate-office', 'AdminController@update_office');
	Route::get('/add-image', 'AdminController@add_image');

	//Route::get('/upload-image-page/{id}', 'AdminController@upload_image_page');
	Route::get('/slip-exam-date-view/{id}', 'AdminController@slip_exam_date_view');
	Route::get('/invoice/{id}', 'AdminController@invoice');

	Route::match(['post', 'get'],'/upload-image', 'AdminController@upload_image');
	Route::match(['get', 'post'],'/saveImageToDatabase', 'WebcamController@saveImageToDatabase');



    Route::get('/division-view', 'LocationController@division_view');
    Route::get('/division-edit/{id}', 'LocationController@division_edit');
    Route::get('/division-delete/{id}', 'LocationController@division_delete');

    Route::get('/district-view', 'LocationController@district_view');
    Route::get('/district-edit/{id}', 'LocationController@district_edit');
    Route::get('/district-delete/{id}', 'LocationController@district_delete');

    Route::get('/tana-view', 'LocationController@tana_view');
    Route::get('/tana-edit/{id}', 'LocationController@tana_edit');
    Route::get('/tana-delete/{id}', 'LocationController@tana_delete');

    Route::get('/divisions/{id}', 'LocationController@divisions');
    Route::get('/districts/{id}', 'LocationController@districts');
    Route::get('/tanas/{id}', 'LocationController@tanas');
    
    //Post methods============
    Route::post('/division-create', 'LocationController@division_create');
    Route::post('/division-update', 'LocationController@division_update');

    Route::post('/district-create', 'LocationController@district_create');
    Route::post('/district-update', 'LocationController@district_update');

    Route::post('/tana-create', 'LocationController@tana_create');
    Route::post('/tana-update', 'LocationController@tana_update');

    Route::match(['get', 'post'],'/find-place', 'LocationController@find_place');
});
Route::get('/logout-admin', 'AdminController@logoutAdmin');
Route::post('/admin-login', 'AdminController@AdminLogin');


//===============================================================================
//Super Admin Controller==========================================================
Route::get('/super/', 'SuperAdminController@index');
Route::get('/super-dashboard/', 'SuperAdminController@super_dashboard');
Route::get('/logout-super', 'SuperAdminController@logoutSuper');
Route::post('/super-admin-login/', 'SuperAdminController@superAdminLogin');


Route::middleware('superadmin')->group(function(){
	//Super Admin Controller==========================================================
	Route::post('/select-ajax', ['as'=>'select-ajax','uses'=>'SuperAdminController@selectAjax']);

	Route::get('/circle-create-page', 'SuperAdminController@circle_create_page');
});
	//for create location
	Route::get('/division/{id}', 'SuperAdminController@division');
	Route::get('/district/{id}', 'SuperAdminController@district');
	Route::get('/thana/{id}', 'SuperAdminController@thana');
