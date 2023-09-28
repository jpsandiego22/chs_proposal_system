<?php
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Chumper\Zipper\Repositories\RepositoryInterface;
use App\Http\Controllers\encryptionController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\applicationlistController;


Route::get('/', function () {
    $data['page'] = 'Generate';
    return view('index',['data' => $data]);
});

Route::get('get_product', ['as'   => 'get_product','uses' =>'productController@get_product']);
Route::get('get_plan', ['as'   => 'get_plan','uses' =>'productController@get_plan']);
Route::get('get_counselor_details', ['as'   => 'get_counselor_details','uses' =>'productController@get_counselor_details']);
Route::get('new_entry', ['as'   => 'new_entry','uses' =>'productController@new_entry']);

Route::get('proposal_pdf/{id}', ['as'   => 'proposal_pdf','uses' =>'pdfController@output']);

Route::get('login', ['as'   => 'login','uses' =>'logController@login']);
Route::get('submit_login', ['as'   => 'submit_login','uses' =>'logController@submit_login']);
Route::get('newuser', ['as'   => 'newuser','uses' =>'logController@add_user']);

Route::group(['middleware' => 'applicationsession'],function(){
    Route::get('admin_index', ['as'   => 'admin_index','uses' =>'admin_indexController@index']);
    Route::get('loaddata', ['as'   => 'loaddata','uses' =>'admin_indexController@loaddata']);
    Route::get('price_list', ['as'   => 'price_list','uses' =>'admin_indexController@price_list']);
    Route::get('get_agerange', ['as'   => 'get_agerange','uses' =>'admin_indexController@get_agerange']);
    Route::get('get_data', ['as'   => 'get_data','uses' =>'admin_indexController@get_data']);
    Route::get('proceed_update', ['as'   => 'proceed_update','uses' =>'admin_indexController@proceed_update']);
});

