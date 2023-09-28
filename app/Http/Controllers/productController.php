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


class productController extends Controller 
{
    public function get_product(Request $request)
    {
        $get_product = Collect(DB::table('tbl_product')
        ->select('iid','description')
        ->where('status',0)
        ->orderby('iid','desc')
        ->get());

        if(count($get_product) != 0)
        {
            $data['status'] = "success";
            $data['data'] = $get_product;
            print_r(json_encode($data));
        }
        else
        {
            $data['status'] = "error";
            $data['message'] = 'No product record.';
            print_r(json_encode($data));
        }
       
    }
    public function get_plan(Request $request)
    {
        $iid = $request->input('iid');

        $table = '<label class="form-label">Please choose a Plan Name <span>*</span></label>';
        $table .= '<div style="overflow-x:auto;">
                <table style="width:100%;overflow-x: auto;" class="table table-bordered">';
        
       
        // FIRST LINE
        // SECOND LINE
        $first_col = '<tr style="background-color:#BEC1C8;">';
        $second_col = '<tr style="background-color:#DEDCDB;border:1px solid #FF5900;">';
        $third_col = "";

        $get_plan = Collect(DB::table('tbl_coverage')
        ->select(DB::raw('distinct(plan_name) as plan_name'),
            DB::Raw('(Select max(year) from tbl_coverage as ac where ac.tbl_product_iid =  tbl_coverage.tbl_product_iid) as year'))
            ->where('tbl_product_iid', $iid)
            ->orderby('plan_name','asc')
            ->get());

        if(count($get_plan) != 0)
        {   
            $first_col .="<td valign='middle' align='center' style='border:2px solid #FF5900; padding:7px' nowrap><b><small>Plan Name /<br>No. of Units</small></b></td>";
            $second_col .="<td valign='middle' align='center' style='border:2px solid #FF5900;' nowrap><font color='#190B7B'><b><small>Contract<br>Year</small></b></font></td>";
            foreach($get_plan as $row)
            {
                $first_col .="<td width='auto' colspan='2'  align='center' style='font-family: \"Proxima Medium\";vertical-align: middle;border:2px solid #FF5900; padding:5px'>
                            <input type='radio' name='plan_name' value='".$row->plan_name."' required> ".$row->plan_name."</td>";

                $second_col .="<td valign='top' align='center' style='padding:5px;border:2px solid #FF5900;border-right:1px solid #BEC1C8'nowrap><font color='#190B7B'><b><small>Max<br>Coverage<br>per Year</small></b></font></td>";
                $second_col .="<td valign='top' align='center' style='padding:5px;border:2px solid #FF5900;border-left:1px solid #BEC1C8'nowrap><font color='#190B7B'><b><small>Max Daily<br>Room<br>Rate</small></b></font></td>";
               
                // FIRST LINE
                // SECOND LINE  
            }
            // THIRD
            for($i=1; $i <= $get_plan[0]->year;$i++)
            {
                $third_col .= '<tr style="background-color:white;border:1px solid #FF5900">';
                
                if($i==$get_plan[0]->year)
                {
                    $third_col .= "<td valign='middle' align='center' style='border:1px solid #BEC1C8;border-left:2px solid #FF5900;border-right:2px solid #FF5900;border-bottom:2px solid #FF5900;' nowrap><font color='black'><small> Year ".$i."</small></font></td>";
                } 
                else
                {
                    $third_col .= "<td valign='middle' align='center' style='border:1px solid #BEC1C8;border-left:2px solid #FF5900;border-right:2px solid #FF5900;' nowrap><font color='black'><small> Year ".$i."</small></font></td>";
                }
                foreach($get_plan as $row)
                {
                    $get_coverate = Collect(DB::table('tbl_coverage')
                    ->where('plan_name', $row->plan_name)
                    ->where('tbl_product_iid', $iid)
                    ->where('year', $i)
                    ->select('plan_name', 'year', DB::Raw('FORMAT(max_coverage,2) as max_coverage'), DB::Raw('FORMAT(room_rate,2) as room_rate'))
                    ->orderby('year', 'asc')
                    ->orderby('iid', 'asc')
                    ->get());

                    if(count($get_coverate) != 0)
                    {
                        foreach($get_coverate as $t_row)
                        {
                            if($i==$get_plan[0]->year)
                            {
                                $third_col .="<td valign='top' align='center' style='padding:7px;border:1px solid #BEC1C8;border-left:2px solid #FF5900 ;border-bottom:2px solid #FF5900;'nowrap><font color='black'><small>".$t_row->max_coverage."</small></font></td>";
                                $third_col .="<td valign='top' align='center' style='padding:7px;border:1px solid #BEC1C8;border-right:2px solid #FF5900;border-bottom:2px solid #FF5900;'nowrap><font color='black'><small>".$t_row->room_rate."</small></font></td>";
                            }
                            else
                            {
                                $third_col .="<td valign='top' align='center' style='padding:7px;border:1px solid #BEC1C8;border-left:2px solid #FF5900'nowrap><font color='black'><small>".$t_row->max_coverage."</small></font></td>";
                                $third_col .="<td valign='top' align='center' style='padding:7px;border:1px solid #BEC1C8;border-right:2px solid #FF5900;'nowrap><font color='black'><small>".$t_row->room_rate."</small></font></td>";
                            }
                        }
                    }
                }
                $third_col .= '</tr>';
            }
            // THIRD
        }
        $first_col .= '</tr>';
        $second_col .= '</tr>';
        $table .= $first_col .$second_col . $third_col.'</table></div>';
        $table .= '<center style="margin-top:10px"><label class="form-label">You may scroll the table left and right to see the other details.</label><center>';
        
        $data['table'] = $table;
        $data['product'] =  Collect(DB::table('tbl_product')
            ->where('iid', $iid)
            ->select('type')
            ->get())[0];
        print_r(json_encode($data));
    }
    public function get_counselor_details(Request $request)
    {
        $code = $request->input('code');


        $get_hc = json_decode(encryptionController::get_hc($code),true);

        if($get_hc['status'] == 'success')
        {

            $body = str_replace('<HTML><body>','',$get_hc['data']); 
            $body = str_replace('</body></html>','',$body); 
            $decrypted = encryptionController::decrypt($body);
            $list = str_replace('\r\n','',$decrypted);
            $data['data'] = explode(",",str_replace('"','',$list));
            $data['data']= $data['data'];
            $data['status'] = 'success';
            $data['info'] = 'success';
            
            print_r(json_encode($data));
        }
        else
        {
            $data['status'] = $get_hc['status'];
            $data['info'] = $get_hc['info'];
            $data['message'] = $get_hc['message'];
            print_r(json_encode($data));
        }
    }
    public function new_entry(Request $request)
    {
        $product_iid = $request->input('product_iid');
        $plan_type_iid = $request->input('plan_type_iid');
        $plan_name = $request->input('plan_name');
        $payor_name = $request->input('payor_name');
        $kiddie_name = $request->input('kiddie_name');
        $gender = $request->input('gender');
        $date_of_birth = $request->input('date_of_birth');
        $text_age = $request->input('text_age');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $address3 = $request->input('address3');

        $check_age = Collect(DB::table('tbl_product')
            ->where('iid',$product_iid)
            ->select('type','age_limit')
            ->get());
        
        $a = 0;
        if(count($check_age) != 0)
        {
            if($check_age[0]->type == 1)
            {
                 // KIDDIE
                if(intval($text_age) == 0)
                {
                    
                    $current_date = date_create(date('Y-m-d'));
                    $birthdate=date_create($date_of_birth);
                    if($current_date < $birthdate)
                    {
                        $a = 1;
                        $data['status'] = "error";
                        $data['message'] = "Invalid date of birth.";
                        $data['info'] = "danger";
                        print_r(json_encode($data));
                    }
                    else
                    {
                        $diff=date_diff($current_date,$birthdate);
                        if(intval($diff->format("%a")) <= 30 )
                        {
                            $a = 1;
                            $data['status'] = "error";
                            $data['message'] = "Eligible age is from 31 days to less than 7 yrs. old only.";
                            $data['info'] = "danger";
                            print_r(json_encode($data));
                        }
                    }
                }
                elseif(intval($text_age) >= 7)
                {
                    $a = 1;
                    $data['status'] = "error";
                    $data['message'] = "Eligible age is from 31 days to less than 7 yrs. old only.";
                    $data['info'] = "danger";
                    print_r(json_encode($data));
                }
            }
            
            if($check_age[0]->type == 0)
            {
               // CORE 
               if($product_iid == 9 || $product_iid == 10 || $product_iid == 11)
               {
                   if(intval($text_age) <= 6 && $plan_type_iid == 1 || $text_age >= 71 && $plan_type_iid == 1)
                   {
                       $a = 1;
                       $data['status'] = "error";
                       $data['message'] = "Eligible age is from 7 to 70 yrs. old only.";
                       $data['info'] = "danger";
                       print_r(json_encode($data));
                   }
                   elseif(intval($text_age) <= 17 && $plan_type_iid == 0 || $text_age >= 70 && $plan_type_iid == 0)
                   {
                       $a = 1;
                       $data['status'] = "error";
                       $data['message'] = "Eligible age is from 18 to 69 yrs. old only.";
                       $data['info'] = "danger";
                       print_r(json_encode($data));
                   }
                }

                elseif($product_iid == 1) //MAX
                {
                    if(intval($text_age) <= 6 && $plan_type_iid == 1 || $text_age >= 66 && $plan_type_iid == 1)
                    {
                        $a = 1;
                        $data['status'] = "error";
                        $data['message'] = "Eligible age is from 7 to 65 yrs. old only.";
                        $data['info'] = "danger";
                        print_r(json_encode($data));
                    }
                    elseif(intval($text_age) <= 17 && $plan_type_iid == 0 || $text_age >= 66 && $plan_type_iid == 0)
                    {
                        $a = 1;
                        $data['status'] = "error";
                        $data['message'] = "Eligible age is from 18 to 65 yrs. old only.";
                        $data['info'] = "danger";
                        print_r(json_encode($data));
                    }
                }
                elseif($product_iid == 3 || $product_iid == 4 || $product_iid == 5) // ULTRA
                {
                    if(intval($text_age) <= 6 && $plan_type_iid == 1 || $text_age >= 61 && $plan_type_iid == 1)
                    {
                        $a = 1;
                        $data['status'] = "error";
                        $data['message'] = "Eligible age is from 7 to 60 yrs. old only.";
                        $data['info'] = "danger";
                        print_r(json_encode($data));
                    }
                    elseif(intval($text_age) <= 17 && $plan_type_iid == 0 || $text_age >= 61 && $plan_type_iid == 0)
                    {
                        $a = 1;
                        $data['status'] = "error";
                        $data['message'] = "Eligible age is from 18 to 60 yrs. old only.";
                        $data['info'] = "danger";
                        print_r(json_encode($data));
                    }
                }
                elseif($product_iid == 2) //SUPREME
                {
                    if(intval($text_age) <= 6 && $plan_type_iid == 1 || $text_age >= 66 && $plan_type_iid == 1)
                    {
                        $a = 1;
                        $data['status'] = "error";
                        $data['message'] = "Eligible age is from 7 to 65 yrs. old only.";
                        $data['info'] = "danger";
                        print_r(json_encode($data));
                    }
                    elseif(intval($text_age) <= 17 && $plan_type_iid == 0 || $text_age >= 66 && $plan_type_iid == 0)
                    {
                        $a = 1;
                        $data['status'] = "error";
                        $data['message'] = "Eligible age is from 18 to 65 yrs. old only.";
                        $data['info'] = "danger";
                        print_r(json_encode($data));
                    }
                }
            }
        }
        else
        {
            $a = 1;
            $data['status'] = "error";
            $data['message'] = "Something went wrong. Please try again.";
            $data['info'] = "danger";
            print_r(json_encode($data));
        }

        if($a==0)
        {
            // $check_if_price_exit = Collect(DB::table('tbl_price')
            // ->where('tbl_product_iid',$product_iid)
            // ->where('plan_name',$plan_name)
            // ->where('plan_type',$plan_type_iid)
            // ->whereRaw('LOCATE(\'day\', age_range) <> 0')
            // ->whereRaw('? BETWEEN age_range_from AND age_range_to',[$text_age])
            // ->OrWhere('tbl_product_iid',$product_iid)
            // ->where('plan_name',$plan_name)
            // ->where('plan_type',$plan_type_iid)
            // ->whereRaw('LOCATE(\'day\',age_range) = 0')
            // ->whereRaw('age_range_from <= TO_DAYS(?) - TO_DAYS(?)',[date_create('now')->format('Y-m-d'),$date_of_birth])
            // ->where('age_range_to',$text_age)
            // ->get());

            
            // print_r(json_encode($check_if_price_exit));exit;

            // if(count($check_if_price_exit) != 0)
            // {
                $current_date = date_create(date('Y-m-d'));
                
                $insert_client = DB::table('tbl_client_information')
                ->insertGetId([
                    'payor_name'=> $payor_name,  
                    'kiddie_name'=> $kiddie_name, 
                    'gender'=> $gender, 
                    'date_of_birth'=> $date_of_birth, 
                    'age'=> $text_age, 
                    'address1'=> $address1, 
                    'address2'=> $address2, 
                    'address3'=> $address3, 
                    'product_iid'=> $product_iid, 
                    'plan_name'=> $plan_name, 
                    'insurance_coverability'=> $plan_type_iid, 
                    'date_created' => $current_date,
                ]);
        
                $counselor_title = $request->input('counselor_title');
                $counselor_firstname = $request->input('counselor_firstname');
                $counselor_middleinitial = $request->input('counselor_middleinitial');
                $counselor_lastname = $request->input('counselor_lastname');
                $counselor_designation = $request->input('counselor_designation');
                $counselor_number_daytime = $request->input('counselor_number_daytime');
                $counselor_number_nighttime = $request->input('counselor_number_nighttime');
                $counselor_branch = $request->input('counselor_branch');
        
                if($counselor_firstname && $counselor_middleinitial && $counselor_lastname)
                {
                    if($insert_client)
                    {
                        $insert_counselor = DB::table('tbl_counselor')
                        ->insertGetId([
                            'tbl_client_information_iid'=> $insert_client,  
                            'title'=> $counselor_title,  
                            'fname'=> $counselor_firstname,  
                            'mname'=> $counselor_middleinitial,  
                            'lname'=> $counselor_lastname,  
                            'designation'=> $counselor_designation,  
                            'daytime_contact'=> $counselor_number_daytime,  
                            // 'nighttime_contact'=> $counselor_number_nighttime,  
                            'branch'=> $counselor_branch, 
                        ]);
                    }
                }
    
                $data_result['status'] = "success";
                $data_result['message'] = "Client Information Form has been successfully saved.";
                $data_result['info'] = "info";
$data_result['id'] = $insert_client;
                $data_result['url'] = url('/').'/proposal_pdf/'.$insert_client;
                print_r(json_encode($data_result));
            // }
            // else
            // {
            //     $data_result['status'] = "error";
            //     $data_result['message'] = "No record found based to the information you provided.";
            //     $data_result['info'] = "danger";
            //     print_r(json_encode($data_result));
            // }
            
        }
    }
}