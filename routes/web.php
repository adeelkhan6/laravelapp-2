<?php

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
use App\Notifications\SubscriptionRenewelFailed;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

app()->singleton('App\example', function() {
    return new \App\example;

// app()->bind('example', function() {
//     return new \App\example;
});



Route::get('/', function () {

  
    // $request->session()->put('foobar', 'baz');
    // return $request->session()->get('foobar');

    // dd(app('App\example'));
    // dd(app('example'), app('example'));
    // dd(app(Filesystem::class));
    // return session('foobar', 'A default');
    // session(['name' => 'Jeffery Ways']);
    flash('Your project has been Produced.');

    return redirect('home');
});

/*

    GET /projects (index)
    GET /projects/create (create)
    GET /projects/1 (show)
    POST /projects (store)
    GET /projects/1/edit (edit)
    PATCH /projects/1 (update)
    DELETE /projects/1 (destroy)

    

*/

Route::resource('projects', 'ProjectsController');
Route::post('/projects/{project}/tasks','ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');


Route::post('/completed-task/{task}','CompletedTasksController@store');
Route::delete('/completed-task/{task}','CompletedTasksController@destroy');

// Route::get('/projects', 'ProjectsController@index');
// Route::get('/projects/create', 'ProjectsController@create');
// Route::get('/projects/{project}', 'ProjectsController@show');
// Route::post('/projects', 'ProjectsController@store');
// Route::get('/projects/{project}/edit', 'ProjectsController@edit');
// Route::patch('/projects/{project}', 'ProjectsController@update');
// Route::delete('/projects/{project}', 'ProjectsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




// Route::get('/', function () {
    
//     $user = App\User::first();
//     $user->notify(new SubscriptionRenewelFailed);
//     return 'Done';
// });
