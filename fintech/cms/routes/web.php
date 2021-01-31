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
// Route::domain(env('APP_Domain'))->group(function () {
    Route::namespace('Frontend')->name('visitor.')->group(function(){
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/events', 'EventController@index')->name('events');
        Route::get('/aboutus', 'AboutUsController@index')->name('aboutus');
        Route::get('/services', 'ServiceController@index')->name('services');
        Route::get('/components', 'AboutUsController@components')->name('components');
        Route::get('/contactus', 'ContactUsController@index')->name('contactus');
        Route::post('/contactus', 'ContactUsController@store')->name('contactus.post');
        Route::get('product/{product}', 'ProductController@show')->name('product.get');
        Route::get('board-of-directors', 'BodController@index')->name('bod.get');
        Route::get('blogs', 'BlogController@index')->name('blogs');
        Route::get('blog/{slug}', 'BlogController@show')->name('blog.show');

        // Route::get('/linkstorage', function () {
        //     $targetFolder = base_path().'/storage/app/public';
        //     $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
        //     symlink($targetFolder, $linkFolder);
        // });
    });
// });
// Route::domain('backend.'.env('APP_Domain'))->group(function () {
    Route::group(['prefix' => 'admin-panel'], function () {
        Auth::routes();
    });

    /**
     * Auth Routes
     */
    // Authentication Routes...
    // Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
    // Route::post('/', 'Auth\LoginController@login');
    // Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    // Registration Routes...
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'Auth\RegisterController@register');
    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.update');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    /**
     * End Auth Routes
     */
    Route::namespace('Backend')->name('admin.')->group(function(){
        Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
            Route::get('', 'DashboardController@index')->name('dashboard');

            /**
             * Site Settings
             */
            Route::get('/setting', 'SettingController@index')->name('settings.get');
            Route::post('/setting', 'SettingController@store')->name('settings.post');

            /**
             * Home Page
             */
            Route::get('/homepage', 'HomeController@index')->name('home.get');
            Route::post('/herosetup', 'HomeController@heroSetup')->name('home.herosetup.post');
            Route::post('/featuredsetup', 'HomeController@featuredSetup')->name('home.featuredsetup.post');
            Route::post('/overviewsetup', 'HomeController@overviewSetup')->name('home.overviewsetup.post');
            Route::post('/funfactssetup', 'HomeController@funFactsSetup')->name('homefunfacts.post');
            Route::post('/accountsetup', 'HomeController@accountSetup')->name('accountsetup.post');
            
            /**
             * Page Slider
             */
            Route::get('/pageslider', 'HomeController@pageSlider')->name('pageslider.get');
            Route::post('/pageslider', 'HomeController@pageSliderStore')->name('pageslider.post');
            
            /**
             * Events Page
             */
            Route::get('/events', 'EventController@index')->name('events.get');
            Route::post('/events', 'EventController@store')->name('events.post');

            /**
             * About Us Page
             */
            Route::get('/aboutus', 'AboutUsController@index')->name('aboutus.get');
            Route::get('/aboutus#about', 'AboutUsController@index')->name('aboutus.about');
            Route::get('/aboutus#mission', 'AboutUsController@index')->name('aboutus.mission');
            Route::get('/aboutus#vision', 'AboutUsController@index')->name('aboutus.vision');
            Route::get('/aboutus#values', 'AboutUsController@index')->name('aboutus.values');
            Route::get('/aboutus#goals', 'AboutUsController@index')->name('aboutus.goals');
            Route::post('/aboutus', 'AboutUsController@store')->name('aboutus.post');
            Route::get('/aboutus/{id}', 'AboutUsController@edit')->name('aboutus.patch');
            Route::patch('/aboutus/{id}', 'AboutUsController@update')->name('aboutus.update');
            Route::post('/bullets', 'AboutUsController@bullets')->name('bullets.post');
            // Route::post('/herosetup', 'HomeController@heroSetup')->name('home.herosetup.post');
            // Route::post('/featuredsetup', 'HomeController@featuredSetup')->name('home.featuredsetup.post');
            // Route::post('/overviewsetup', 'HomeController@overviewSetup')->name('home.overviewsetup.post');
            // Route::post('/funfactssetup', 'HomeController@funFactsSetup')->name('homefunfacts.post');
            // Route::post('/accountsetup', 'HomeController@accountSetup')->name('accountsetup.post');

            /**
             * Services Page
             */
            Route::get('/services', 'ServiceController@index')->name('services.get');
            Route::delete('/services/{id}', 'ServiceController@destroy')->name('services.delete');
            Route::post('/homeservices', 'ServiceController@homeServicesStore')->name('homeservices.post');
            Route::get('/services/create', 'ServiceController@create')->name('services.create.get');
            Route::post('/services/create', 'ServiceController@store')->name('services.create.post');
            Route::post('/services/section', 'ServiceController@sectionStore')->name('services.section.post');
            Route::get('/services/edit/{id}', 'ServiceController@edit')->name('services.edit.get');
            Route::patch('/services/edit/{id}', 'ServiceController@update')->name('services.edit.patch');

             /**
             * Products Page
             */
            Route::get('/products', 'ProductController@index')->name('products.get');
            Route::delete('/products/{id}', 'ProductController@destroy')->name('products.delete');
            // Route::post('/homeservices', 'ProductController@homeServicesStore')->name('homeservices.post');
            Route::get('/products/create', 'ProductController@create')->name('products.create.get');
            Route::post('/products/create', 'ProductController@store')->name('products.create.post');
            Route::get('/products/edit/{id}', 'ProductController@edit')->name('products.edit.get');
            Route::patch('/products/edit/{id}', 'ProductController@update')->name('products.edit.patch');


            /**
             * Contact Us Page
             */
            Route::get('/contactus', 'ContactUsController@index')->name('contactus.get');
            // Route::delete('/contactus/{id}', 'ContactUsController@destroy')->name('contactus.delete');
            Route::post('/contactus', 'ContactUsController@homeContactUs')->name('homecontactus.post');
            // Route::get('/contactus/create', 'ContactUsController@create')->name('contactus.create.get');
            // Route::post('/contactus/create', 'ContactUsController@store')->name('contactus.create.post');
            // Route::get('/contactus/edit/{id}', 'ContactUsController@edit')->name('contactus.edit.get');
            // Route::patch('/contactus/edit/{id}', 'ContactUsController@update')->name('contactus.edit.patch');

            /**
             * Portfolio Page
             */
            Route::get('/portfolio', 'PortfolioController@index')->name('portfolio.get');
            Route::delete('/portfolio/{id}', 'PortfolioController@destroy')->name('portfolio.delete');
            Route::post('/homeportfolio', 'PortfolioController@homePortfolioStore')->name('homeportfolio.post');
            Route::get('/portfolio/create', 'PortfolioController@create')->name('portfolio.create.get');
            Route::post('/portfolio/create', 'PortfolioController@store')->name('portfolio.create.post');
            Route::get('/portfolio/edit/{id}', 'PortfolioController@edit')->name('portfolio.edit.get');
            Route::patch('/portfolio/edit/{id}', 'PortfolioController@update')->name('portfolio.edit.patch');

            /**
             * Info Page
             */
            Route::get('/info', 'InfoController@index')->name('info.get');
            // Route::delete('/info/{id}', 'InfoController@destroy')->name('info.delete');
            Route::post('/info', 'InfoController@homeInfo')->name('homeinfo.post');
            // Route::get('/info/create', 'InfoController@create')->name('info.create.get');
            // Route::post('/info/create', 'InfoController@store')->name('info.create.post');
            // Route::get('/info/edit/{id}', 'InfoController@edit')->name('info.edit.get');
            // Route::patch('/info/edit/{id}', 'InfoController@update')->name('info.edit.patch');

            /**
             * Board Of Directors Page
             */
            Route::get('/boardofdirectors', 'BodController@index')->name('bod.get');
            Route::delete('/boardofdirectors/{id}', 'BodController@destroy')->name('bod.delete');
            Route::get('/boardofdirectors/create', 'BodController@create')->name('bod.create.get');
            Route::post('/boardofdirectors/create', 'BodController@store')->name('bod.create.post');
            Route::get('/boardofdirectors/edit/{id}', 'BodController@edit')->name('bod.edit.get');
            Route::patch('/boardofdirectors/edit/{id}', 'BodController@update')->name('bod.edit.patch');

            /**
             * Blog Page
             */
            Route::get('/blogs', 'BlogController@index')->name('blog.get');
            Route::delete('/blogs/{id}', 'BlogController@destroy')->name('blog.delete');
            Route::get('/blogs/create', 'BlogController@create')->name('blog.create.get');
            Route::post('/blogs/create', 'BlogController@store')->name('blog.create.post');
            Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('blog.edit.get');
            Route::patch('/blogs/edit/{id}', 'BlogController@update')->name('blog.edit.patch');

            /**
             * Profile Settings
             */
            Route::get('/{user}', 'ProfileController@index')->name('profile.get');
            Route::post('/{user}', 'ProfileController@store')->name('profile.post');



        });
    });
// });
