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

Route::get('/unauthorized', function () {
    $title = 'Unauthorized';
    return view('errorpages.401', compact('title'));
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('academy', 'HomeController@academy')->name('academy');
Route::get('forum-qa', 'HomeController@forum_qa')->name('forum-qa');
Route::get('blog', 'HomeController@blog')->name('blog');
Route::get('job', 'HomeController@job')->name('job');
Route::get('event', 'HomeController@event')->name('event');
Route::get('partnership', 'HomeController@partnership')->name('partnership');

Route::resource('academy/class', 'AcademyController',  [
    'names' => 'courses',
    'uses' => ['index', 'show']
]);


Route::get('login', 'AuthController@login_page')->name('login');
Route::post('login', 'AuthController@login_post')->name('login');
Route::get('register', 'AuthController@register_page')->name('register');
Route::post('register', 'AuthController@register_post')->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::post('change-password', 'AuthController@change_password')->name('change_password');

    // Route Admin
    Route::group(['middleware' => 'checkRole:1'], function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::resource('team', 'Admin\TeamController',  [
                'names' => 'team',
                'except' => ['show']
            ]);
            Route::resource('faq', 'Admin\FaqController',  [
                'names' => 'faq',
                'except' => ['create', 'edit', 'show']
            ]);
            Route::resource('contact', 'Admin\ContactController',  [
                'names' => 'contact',
                'uses' => ['index', 'update']
            ]);
            Route::resource('bank', 'Admin\RekeningBankController',  [
                'names' => 'bank',
                'except' => ['create', 'edit', 'show']
            ]);

            Route::resource('academy', 'Admin\AcademyController',  [
                'names' => 'academy',
            ]);
            Route::resource('academy/kategory', 'Admin\KategoryAcademyController',  [
                'names' => 'kategory.academy',
                'except' => ['index', 'show', 'create', 'edit']
            ]);
            Route::resource('academy/fasilitas', 'Admin\FasilitasAcademyController',  [
                'names' => 'fasilitas.academy',
                'except' => ['index', 'show', 'create', 'edit']
            ]);
            Route::resource('academy/tools', 'Admin\ToolsAcademyController',  [
                'names' => 'tools.academy',
                'uses' => ['store', 'destroy']
            ]);
            Route::resource('academy/technology', 'Admin\TechnologyAcademyController',  [
                'names' => 'technology.academy',
                'uses' => ['store', 'destroy']
            ]);
            Route::resource('academy/{id}/silabus', 'Admin\SilabusAcademyController',  [
                'names' => 'academy.silabus',
                'except' => ['index']
            ]);
            Route::get('academy/{id}/{silabu}/materi', 'Admin\SilabusAcademyController@select_materi')->name('select.materi');
            Route::delete('materi/{id}', 'Admin\SilabusAcademyController@delete_materi')->name('delete.materi');

            Route::resource('silabus/{id}/artikel', 'Admin\ArtikelMateriController',  [
                'names' => 'artikel.materi',
                'uses' => ['store', 'show', 'edit', 'update']
            ]);
            Route::resource('silabus/{id}/vidio', 'Admin\VidioMateriController',  [
                'names' => 'vidio.materi',
                'uses' => ['store', 'show', 'edit', 'update']
            ]);
            Route::resource('silabus/{id}/kuis', 'Admin\KuisMateriController',  [
                'names' => 'kuis.materi',
                'uses' => ['store', 'show', 'edit', 'update']
            ]);
            Route::post('kuis', 'Admin\KuisMateriController@store_kuis')->name('store.kuis');

            Route::resource('silabus/{id}/submission', 'Admin\SubmissionMateriController',  [
                'names' => 'submission.materi',
                'uses' => ['store', 'show', 'edit', 'update']
            ]);

            Route::resource('peserta', 'Admin\PendaftaranPesertaController',  [
                'names' => 'peserta',
                'uses' => ['index', 'update']
            ]);
        });
    });

    // Route Member
    Route::group(['middleware' => 'checkRole:2'], function () {
        Route::group(['prefix' => 'member'], function () {
            Route::resource('profile', 'Member\ProfileController',  [
                'names' => 'profile',
                'uses' => ['index', 'show']
            ]);
            Route::get('settings', 'Member\SettingsProfileController@index')->name('settings.index');
            Route::post('settings/profile', 'Member\SettingsProfileController@profile')->name('settings.profile');
            Route::post('settings/personal', 'Member\SettingsProfileController@personal')->name('settings.personal');
            Route::resource('orders', 'Member\PesananController',  [
                'names' => 'orders',
                'uses' => ['index', 'show', 'destroy', 'update']
            ]);

            Route::get('academy/class/{id}/register', 'AcademyController@register')->name('register.academy');
            Route::post('academy/class/{id}/register', 'AcademyController@store_register')->name('store_register.academy');

            Route::post('kirimjawaban', 'Member\ModulAcademyController@kirim_jawaban')->name('modul.kirim_jawaban');
           
            Route::group(['middleware' => 'checkJenisKelas', 'checkTipePembaca'], function () {
                Route::get('academy/class/{id}', 'Member\ModulAcademyController@index')->name('modul.index');
            });
        });
    });
});
