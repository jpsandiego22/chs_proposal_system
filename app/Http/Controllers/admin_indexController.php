<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\GuzzleException;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Collection;
use PDF;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\encryptionController;
use App\Http\Controllers\integrationController;
use App\Http\Controllers\getoracledetailsController;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Chumper\Zipper\Repositories\RepositoryInterface;
use Exception;
use Illuminate\Filesystem\Filesystem;
use ZipArchive;
use DateTime;
use URL;

class admin_indexController extends Controller 
{
    public function index(Request $request)
    {
        $data['page'] = 'Admin';
        return view('admin.index',['data' => $data]);
    }
    public function loaddata(Request $request)
    {
        $data['product'] = Collect(DB::table('tbl_product')
        ->select('iid','description')
        ->where('status',0)
        ->orderby('description','asc')
        ->get());

        print_r(json_encode($data));
    }
    public function get_agerange(Request $request)
    {
        $iid = $request->input('prod_iid');
        $type = $request->input('insurance');

        $data = Collect(DB::table('tbl_price')
        ->select(DB::Raw('distinct(age_range) as age_range'))
        ->where('tbl_product_iid',$iid)
        ->where('plan_type',$type)
        // ->orderby('iid','asc')
        ->get());


        print_r(json_encode($data));
    }
    public function price_list(Request $request)
    {
        $oid = $request->input('product');
        $insurance = $request->input('insurance');
        $age_range = $request->input('age_range');

        $data = Collect(DB::table('tbl_price')
        ->where('tbl_product_iid',$oid)
        ->where('plan_type',$insurance)
        ->where('age_range',$age_range)
        ->where('mode_of_payment',4)
        ->select(
            'iid',
            'tbl_product_iid',
            'plan_type',
            'age_range',
            'plan_name', 
            DB::raw('CONCAT(\'\', FORMAT(price, 2)) AS contract_price'),
            DB::raw('\'\' as spot_cash'),
            DB::raw('\'\' as annual'),
            DB::raw('\'\' as semi_annual'),
            DB::raw('\'\' as quarterly'),
            DB::raw('\'\' as monthly'))
        ->orderby('price','desc')
        ->get());

        if(count($data) != 0)
        {
            foreach($data as $row)
            {
                $row->contract_price = $row->contract_price 
                        . '<br><a onclick="edit('.$row->iid .')"><b><u><i>UPDATE</i></u></b></a>';

                $spot = Collect(DB::table('tbl_price')
                    ->where('tbl_product_iid',$row->tbl_product_iid)
                    ->where('plan_type',$row->plan_type)
                    ->where('age_range',$row->age_range)
                    ->where('plan_name',$row->plan_name)
                    ->where('mode_of_payment',0)
                    ->select('iid',DB::raw('CONCAT(\'\', FORMAT(price, 2)) AS spot_cash'))
                    ->get());

                if(count($spot) != 0)
                {
                    $row->spot_cash = $spot[0]->spot_cash . '<br><a onclick="edit('.$spot[0]->iid .')"><b><u><i>UPDATE</i></u></b></a>';
                }
                else
                {
                    $row->spot_cash = '0.00';
                }

                $annual = Collect(DB::table('tbl_price')
                    ->where('tbl_product_iid',$row->tbl_product_iid)
                    ->where('plan_type',$row->plan_type)
                    ->where('age_range',$row->age_range)
                    ->where('plan_name',$row->plan_name)
                    ->where('mode_of_payment',3)
                    ->select('iid',DB::raw('CONCAT(\'\', FORMAT(price, 2)) AS annual'))
                    ->get());

                if(count($annual) != 0)
                {
                    $row->annual = $annual[0]->annual. '<br><a onclick="edit('.$annual[0]->iid .')"><b><u><i>UPDATE</i></u></b></a>';
                }
                else
                {
                    $row->annual = '0.00';
                }

                $semi_annual = Collect(DB::table('tbl_price')
                    ->where('tbl_product_iid',$row->tbl_product_iid)
                    ->where('plan_type',$row->plan_type)
                    ->where('age_range',$row->age_range)
                    ->where('plan_name',$row->plan_name)
                    ->where('mode_of_payment',2)
                    ->select('iid',DB::raw('CONCAT(\'\', FORMAT(price, 2)) AS semi_annual'))
                    ->get());

                if(count($semi_annual) != 0)
                {
                    $row->semi_annual = $semi_annual[0]->semi_annual. '<br><a onclick="edit('.$semi_annual[0]->iid .')"><b><u><i>UPDATE</i></u></b></a>';
                }
                else
                {
                    $row->semi_annual = '0.00';
                }

                $quarterly = Collect(DB::table('tbl_price')
                    ->where('tbl_product_iid',$row->tbl_product_iid)
                    ->where('plan_type',$row->plan_type)
                    ->where('age_range',$row->age_range)
                    ->where('plan_name',$row->plan_name)
                    ->where('mode_of_payment',1)
                    ->select('iid',DB::raw('CONCAT(\'\', FORMAT(price, 2)) AS quarterly'))
                    ->get());

                if(count($quarterly) != 0)
                {
                    $row->quarterly = $quarterly[0]->quarterly. '<br><a onclick="edit('.$quarterly[0]->iid .')"><b><u><i>UPDATE</i></u></b></a>';
                }
                else
                {
                    $row->quarterly = '0.00';
                }

                $monthly = Collect(DB::table('tbl_price')
                    ->where('tbl_product_iid',$row->tbl_product_iid)
                    ->where('plan_type',$row->plan_type)
                    ->where('age_range',$row->age_range)
                    ->where('plan_name',$row->plan_name)
                    ->where('mode_of_payment',5)
                    ->select('iid',DB::raw('CONCAT(\'\', FORMAT(price, 2)) AS monthly'))
                    ->get());

                if(count($monthly) != 0)
                {
                    $row->monthly = $monthly[0]->monthly. '<br><a onclick="edit('.$monthly[0]->iid .')"><b><u><i>UPDATE</i></u></b></a>';
                }
                else
                {
                    $row->monthly = '<center>N/A</center>';
                }
            }
        }

        $count = count($data);

        return Datatables::of($data)
		->setTotalRecords($count)
		->addIndexColumn()
        ->escapeColumns([])
        ->make();
    }
    public function get_data(Request $request)
    {
        $iid = $request->input('ref');

        $data = Collect(DB::table('tbl_price')
        ->where('iid',$iid)
        ->select('iid','mode','plan_name',DB::raw('CONCAT(\'\', FORMAT(price, 2)) AS price'),
        DB::Raw('(Select description from tbl_product where iid = tbl_price.tbl_product_iid) as product'))
        ->get());

        $data[0]->iid = encryptionController::encrypt(strval($data[0]->iid));

        print_r(json_encode($data));
    }
    public function proceed_update(Request $request)
    {
        $iid = encryptionController::decrypt($request->input('ref'));
        $new_price = $request->input('new_price');
        // print_r($new_price.'<br>');

        if(is_numeric($new_price) == 1)
        {
            $insert_counselor = DB::table('tbl_price')
            ->where('iid',$iid)
            ->update([
                'price'=> $new_price,  
            ]);

            $data['info'] = "info";
            $data['message'] = "New Price has been set.";
            $data['status'] = "success";
            print_r(json_encode($data));
        }
        else
        {
            $data['info'] = "danger";
            $data['message'] = "Price must be number.";
            $data['status'] = "error";
            print_r(json_encode($data));
        }
    }
}