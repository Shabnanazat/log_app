 <?php

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

// Route::get('/', function () {
//     return view('website.welcome');
// });

Route::group(['prefix' => '', 'as' => 'website.', 'namespace' => 'Website'], function () {
  
        Route::get('/','BlogController@index');
        Route::get('/','BlogController@index')->name('home');
  
});
Route::group(['prefix' => '/admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    //All the admin routes will be defined here...

    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');
    
        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    
    });  
    

    Route::group(['middleware'=>'auth:admin'], function () {
      Route::get('/','HomeController@index');
      Route::get('/home','HomeController@index')->name('home');
    });

  });

  Route::group(['prefix' => '/user', 'as' => 'user.', 'namespace' => 'User'], function () {
    //All the user routes will be defined here...

    Route::namespace('Auth')->group(function(){
        
      //Login Routes
      Route::get('/login','LoginController@showLoginForm')->name('login');
      Route::post('/login','LoginController@login');
      Route::post('/logout','LoginController@logout')->name('logout');

      Route::get('/register','RegisterController@showRegisterForm')->name('register');
      Route::post('/register','RegisterController@registerUser');
  
      //Forgot Password Routes
      Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
      Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  
      //Reset Password Routes
      Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
      Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
  
  });

  Route::group(['middleware'=>'auth:user'], function () {
    
    Route::get('/','HomeController@index');
    Route::get('/home','HomeController@index')->name('home');
    Route::get('/edit-profile','HomeController@editProfile')->name('edit_profile');
    Route::post('/edit-profile','HomeController@editProfilePost')->name('edit_profile_post');
    Route::get('/change-password','HomeController@changePassword')->name('change.password');
    Route::post('/change-password','HomeController@changePasswordPost')->name('change.password.post');
  
  }); 


   });

   Route::group(['middleware'=>'auth:admin'], function () {
    
    Route::get('/','HomeController@index');
    Route::get('/home','HomeController@index')->name('home');
    Route::get('/edit-profile','HomeController@editProfile')->name('edit_profile');
    Route::post('/edit-profile','HomeController@editProfilePost')->name('edit_profile_post');
    Route::get('/change-password','HomeController@changePassword')->name('change.password');
    Route::post('/change-password','HomeController@changePasswordPost')->name('change.password.post');
  });

  Route::group(['prefix'=>'categories','as'=>'categories.'], function () {
    Route::get('/','Admin\CategoryController@index')->name('index');
    Route::get('/create','Admin\CategoryController@create')->name('create');
    Route::post('/store','Admin\CategoryController@store')->name('store');
    Route::get('/edit{id}','Admin\CategoryController@edit')->name('edit');
    Route::post('/update','Admin\CategoryController@update')->name('update');
    Route::post('/destroy{id}','Admin\CategoryController@destroy')->name('destroy');
  });
  Route::group(['prefix'=>'blogs','as'=>'blogs.','namespace'=>'User'],function (){
    Route::get('/','BlogController@index')->name('index');
    Route::get('/create','BlogController@create')->name('create');
    Route::post('/store','BlogController@store')->name('store');
    Route::get('/edit/{id}','BlogController@edit')->name('edit');
    Route::post('/update','BlogController@update')->name('update');
    Route::post('/destroy/{id}','BlogController@delete')->name('destroy');
  });

  Route::get('home','Website\FrontendController@index')->name('home');
  Route::get('blog','Website\FrontendController@blog')->name('blog.web');
  Route::get('blog-details/{id}','Website\FrontendController@details')->name('blog.details');
  Route::get('contact-us','Website\FrontendController@contactUs')->name('contact');
  Route::post('contact-submit','Website\FrontendController@contactSubmit')->name('contact.submit');



  
  