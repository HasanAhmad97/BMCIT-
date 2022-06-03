<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\user\WorkController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Artisan;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::namespace('Admin')->prefix('admin')->middleware('auth')->middleware('check:Admin')->group(function () {
        Route::get('/', 'WorksController@dashbord')->name('work.dashbord');
        Route::get('/works/create', 'WorksController@create')->name('work.create');
        Route::post('/works', 'WorksController@store')->name('work.store');
        Route::get('/works/edit/{id}', 'WorksController@edit')->name('work.edit');
        Route::post('/works/{id}', 'WorksController@update')->name('work.update');
        Route::delete('/works/delete/{id}', 'WorksController@delete')->name('work.delete');
        Route::get('/orders', 'WorksController@indexOrders')->name('work.orders');


        Route::get('/team', 'TeamController@indexTeam')->name('team.index');
        Route::get('/team/create', 'TeamController@create')->name('team.create');
        Route::post('/team', 'TeamController@store')->name('team.store');
        Route::get('/team/edit/{id}', 'TeamController@edit')->name('team.edit');
        Route::post('/team/{id}', 'TeamController@update')->name('team.update');
        Route::delete('/team/delete/{id}', 'TeamController@delete')->name('team.delete');

        Route::get('/motion', 'WorksController@indexMotion')->name('work.Motion');
        Route::get('/logo', 'WorksController@indexLogo')->name('work.logo');
        Route::get('/voice', 'WorksController@indexVoice')->name('work.voice');
        Route::get('/web', 'WorksController@indexWeb')->name('work.web');
        Route::get('/app', 'WorksController@indexApp')->name('work.app');
        Route::get('/ui', 'WorksController@indexUi')->name('work.ui');
        Route::get('/image', 'WorksController@indexImage')->name('work.image');
        Route::post('/ball/{id}', 'WorksController@storeBall')->name('user.ball');
        Route::post('/orderdelet/{id}', 'WorksController@orderDelete')->name('order.delete');
        Route::post('/price/{id}', 'WorksController@storePriceOrder')->name('user.priceOrder');
        Route::get('/indexMessage', 'WorksController@indexMessage')->name('work.indexMessage');


    });


    Route::namespace('user')->prefix('user')->group(function () {

        Route::get('/motion', 'WorkController@indexMotion')->name('user.Motion');
        Route::get('/logo', 'WorkController@indexLogo')->name('user.logo');
        //Route::get('/identity', 'WorkController@indexId')->name('user.identity');
        Route::get('/web', 'WorkController@indexWeb')->name('user.web');
        Route::get('/image', 'WorkController@indexImage')->name('user.image');
        Route::get('/ui', 'WorkController@indexUi')->name('user.ui');
        Route::get('/app', 'WorkController@indexApp')->name('user.app');
        Route::get('/team', 'WorkController@userTeam')->name('user.team');

    });

    Route::post('/message', [App\Http\Controllers\user\WorkController::class, 'storeMessage'])->name('work.storeMessage');

    Route::get('/status', 'PaymentController@status')->name('user.status');

    Route::get('/indexOrders', 'OrderController@index')->name('orders');

    Route::get('/', 'Admin\WorksController@index')->name('user.home');
    Route::post('/', 'FileController@download')->name('user.file');
    Route::post('/logo/{id}', 'FileController@logoDownload')->name('download.logoPdf');

    Route::post('checkout', 'CheckoutController@createOrder')->name('user.checkout')->middleware('auth');;
    Route::get('paypal/return', 'CheckoutController@paypalReturn')->name('paypal.return');
    Route::get('paypal/cancel', 'CheckoutController@paypalCancel')->name('paypal.cancel');
    Auth::routes();

    Route::get('/order', [OrderController::class, 'create'])->name('order.create');//->middleware('auth');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::post('/orderStatus/{id}', [OrderController::class, 'changeStatus'])->name('order.status');//->middleware('auth');
    Route::get('/dataorder', [OrderController::class, 'indexData'])->name('order.data')->middleware('auth');


    Route::get('/admin/notification', 'NotificationController@index')->middleware('auth')->name('notification');
    Route::get('/admin/message', 'NotificationController@indexMessage')->middleware('auth')->name('Message');

    Route::get('storage/{file}', function ($file) {
        return response()->file(storage_path('app/public/' . $file));
    })->where('file', '.*');

    Route::get('/linkstorage', function () {
        Artisan::call('storage:link');
    });

    Route::get('/clear', function () {
        //Artisan::call('config:clear');
        //Artisan::call('cache:clear');
        Artisan::call('route:clear');

        return back();
    });

});

