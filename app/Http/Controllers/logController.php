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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Chumper\Zipper\Repositories\RepositoryInterface;
use Exception;
use Illuminate\Filesystem\Filesystem;
use ZipArchive;
use DateTime;
use Illuminate\Support\Facades\Mail;

class logController extends Controller 
{
    public function login(Request $request)
    {
        $data['page'] = 'Login';
        return view('admin.login',['data' => $data]);
    }
    public function submit_login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');


        if($username && $password)
        {
            $check = collect(DB::table('tbl_user')
            ->where('username',$username)
            ->select('password')
            ->get());

            if(count($check)!=0)
            {
                if(password_verify($password,$check[0]->password))
                {
                    session(['type' => 1]);
                    $data['status'] = "success";
                    $data['message'] = "success";
                    $data['info'] = "success";
                    print_r(json_encode($data));
                }
                else
                {
                    $data['message'] = "Invalid Password.";
                    $data['status'] = "error";
                    $data['info'] = "danger";
                    print_r(json_encode($data));
                }
            }
            else
            {
                $data['message'] = "Invalid Username";
                $data['status'] = "error";
                $data['info'] = "danger";
                print_r(json_encode($data));
            }
        }
        else
        {
            $data['message'] = "Dont me!";
            $data['status'] = "error";
            $data['info'] = "danger";
            print_r(json_encode($data));
        }
    }
    public function add_user(Request $request)
    {
        // type = 0 = PIID
        // type = 1 = FINANCE

        // http://localhost/proposal/newuser?name=Jomer P. San Diego Jr.&emp_no=5830&username=jpsd&password=pitikbulag

        // https://caritashealthshield.com.ph/dev/new_proposal/newuser?name=Cherry Rose C. Syjongtian&emp_no=1&username=crcsyjongtian&password=pitikbulag
        
        
        // https://caritashealthshield.com.ph/dev/new_proposal/newuser?name=Maricar E. Garcesn&emp_no=2&username=megarces&password=p455w0rd


        // http://localhost/newuser/resetuser?username=jpsd
        $val = 0;


        if($request->input('name'))
        {
            if($request->input('emp_no'))
            {

                if($request->input('username'))
                {

                    if($request->input('password'))
                    {

                       
                            $get = count(collect(DB::table('tbl_user')
                                ->where('username',$request->input('username'))
                                ->Orwhere('emp_no',$request->input('emp_no'))
                                ->get()));

                            if($get == 0)
                            {

                                $insert_maf = DB::table('tbl_user')
                                ->insertGetId([
                                    'emp_no' => $request->input('emp_no') ,
                                    'name' => $request->input('name'), 
                                    'username' => $request->input('username'),
                                    'password' => password_hash($request->input('password'), PASSWORD_DEFAULT)                                  , 
                                    ]);
                                if($insert_maf)
                                {
                                    // print_r("NEW USER SAVE!");
					                $data['no'] = "100";
                                    $data['header'] = "NEW USER SAVE";
                                    $data['message'] = "New user has been save!";
                            
                                    print_r(json_encode($data));
                                    // return view('error',['data'=>$data]);
                                }
                                else
                                {
					                $data['no'] = "500";
                                    $data['header'] = "Something went wrong!";
                                    $data['message'] = "Error Occur to the system!";
                            
                                    print_r(json_encode($data));
                                // return view('error',['data'=>$data]);
                                }
                            }
                            else
                            {
				                $data['no'] = "500";
                                $data['header'] = "Error!";
                                $data['message'] = "Employee # or Username is already exist!";
                        
                                print_r(json_encode($data));
                                // return view('error',['data'=>$data]);
                            }
                    }
                    else
                    {
                        $val = 1;
                    }
                }
                else
                {
                    $val = 1;
                }
            }
            else
            {
                $val = 1;
            }

        }
        else
        {

            $val = 1;
        }
        if($val != 0)
        {
		    $data['no'] = "505";
            $data['header'] = "Missing Parameter";
            $data['message'] = "Dont Try Me! I Register your IP Address! ";
    
            print_r(json_encode($data));
        }    
    }
    public function resetuser(Request $request)
    {
        
        if($request->input('username'))
        {
            $default_password = $request->input('username') ."".$request->input('emp_no');
            
            $update_status = DB::table('tbl_user')
                ->where('username',$request->input('username'))
                ->update(['password' => encryptionController::encrypt($default_password), 
                'ipadd' => \Request::getClientIp(true)]);

            if($update_status)
            {
                $data['header'] = "RESET USER SUCCESSFULL";
                $data['message'] = "Default password (USERNAME+EMPLOYEE#)";
        
                return view('error',['data'=>$data]);
            }
            else
            {
                $data['header'] = "RESET USER SUCCESSFULL";
                $data['message'] = "No Changes has been made!";
        
                return view('error',['data'=>$data]);
            }
        }
        else
        {
            $data['header'] = "Missing Parameter";
            $data['message'] = "Dont Try Me! I Register your IP Address! ";
    
            return view('error',['data'=>$data]);
        }
    }
}