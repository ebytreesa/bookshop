<?php

Route::get('/','HomeController@index');
Route::get('/home/{name}','HomeController@showNav');
Route::get('/home/{cname}/{sname}','HomeController@showSubNav');

Route::get('/home/product/{id}','HomeController@showProduct');

Route::group(array('before' => 'csrf'), function(){
		Route::post('/home/product/{id}', array('uses' => 'HomeController@postAddToCart', 'as' =>'addToCart'));
		
	});

Route::group(array('before' => 'guest'), function(){
	Route::get('/login','UserController@login');
	Route::get('/register','UserController@register');
	
	Route::group(array('before' => 'csrf'), function(){
		Route::post('/login', array('uses' => 'UserController@postLogin', 'as' =>'postLogin'));
		Route::post('/register', array('uses' => 'UserController@postRegister', 'as' =>'postRegister'));
	});
});

Route::group(array('before' => 'auth'), function(){
	Route::get('/profile','UserController@profile');
	Route::get('/profile/deleteCart/{id}', 'UserController@deleteCart');
	Route::get('/editProfile','UserController@editProfile');
	Route::get('/deleteProfile','UserController@deleteProfile');
	Route::get('/logout','UserController@logout');

	Route::group(array('before' => 'csrf'), function(){	
		Route::post('/editProfile', array('uses' => 'UserController@postEditProfile', 'as' =>'postEditProfile'));
	
 	});

 	Route::group(array('before' => 'admin'), function(){
 		Route::get('/admin','AdminController@admin');
 		Route::get('/admin/listUsers','AdminController@listUsers');
 		Route::get('/admin/deleteUser/{id}','AdminController@deleteUser'); 		

 		Route::get('/admin/addProduct','AdminController@addProduct');
 		Route::get('/admin/listProducts','AdminController@listProducts');
 		Route::get('/admin/editProduct/{id}','AdminController@editProduct');
 		Route::get('/admin/deleteProduct/{id}','AdminController@deleteProduct'); 		

 		Route::group(array('before' => 'csrf'), function(){	

		Route::post('/admin/addProduct', array('uses' => 'AdminController@postAddProduct', 'as' =>'postAddProduct'));
		Route::post('/editProduct/{id}', array('uses' => 'AdminController@postEditProduct', 'as' =>'postEditProduct'));

			
 		});

 	});
});