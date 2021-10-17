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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/contact', function () {
    return view('contact');
});*/

Route::get('/task', function () {

 //for retriew db details to task view
    $data=App\Task::all();
    return view('task')->with('tasks1',$data);
});


//route for store data in db from input field
Route::post('/savetask','TaskController@store');

//route for update iscompleted when clicked marl as complted button
Route::get('/markascompleted/{id}','TaskController@updatetaskascompleted');


//route for update the button markasnotcompleted to markascompleted
Route::get('/markasnotcompleted/{id}','TaskController@updatetaskasnotcompleted');

//route for delete task
Route::get('/deletetask/{id}','TaskController@delete');

//route for updatetask
Route::get('/updatetask/{id}','TaskController@updatetaskview');


//route for new update value send to table : use post methov
Route::post('updatetasknew','TaskController@updatenew');



//Route::get('/contac','PageController@contact');


