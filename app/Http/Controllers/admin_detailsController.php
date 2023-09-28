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

class admin_detailsController extends Controller 
{
    public function get_members_info(Request $request)
    {
        $maf_iid = $request->input('maf_iid');
        $type = $request->input('type');

        $relationship = json_decode(encryptionController::relationship(),true);

        $data['member'] = Collect(DB::table('tbl_maf_view')
            ->where('iid',$maf_iid)
            ->select('iid', 
            'identification_number', 
            'customerid', 
            'lastname', 
            'firstname', 
            'suffix', 
            'middlename', 
            'mother_maiden_name', 
            'date_of_birth', 
            'age', 
            DB::Raw('Case When sex = 0 Then \'MALE\'
                        When sex = 1 Then \'FEMALE\'
                        Else \'INVALID VALUE\' END as sex'),
            DB::Raw('Case When civil_status = 1 Then \'SINGLE\'
                        When civil_status = 2 Then \'MARRIED\'
                        When civil_status = 3 Then \'WIDOW/WIDOWER\'
                        When civil_status = 4 Then \'SEPARATED\'
                        Else \'INVALID VALUE\' END as civil_status'),
            'birth_place', 
            'nationality', 
            'acr_no', 
            'weight', 
            'weight_type', 
            'height', 
            'height_type',
            'occupation_profession', 
            'source_of_income',
            'nature_of_work',
            DB::Raw('Case When annual_income = 0 Then \'Less than 150K\'
                        When annual_income = 1 Then \'150K to less than 300K\'
                        When annual_income = 2 Then \'300K to less than 600K\'
                        When annual_income = 3 Then \'600K and above\'
                        Else \'INVALID VALUE\' END as annual_income'),
            'employer_business_name', 
            'business_address_1', 
            'business_address_2', 
            'business_address_3', 
            'business_address_4', 
            'business_address_5', 
            'present_address_1', 
            'present_address_2', 
            'present_address_3', 
            'present_address_4', 
            'present_address_5', 
            'permanent_address_1', 
            'permanent_address_2', 
            'permanent_address_3', 
            'permanent_address_4', 
            'permanent_address_5', 
            'landline_number', 
            'mobile_number', 
            'office_number', 
            'email_address', 
            'id_presented', 
            'id_number', 
            'id_expiry', 
            'philhealth', 
            'sss_gsis', 
            'tax_number')->get());

        $data['member_count'] = count($data['member']);
        if(count($data['member']) !=0)
        {
            foreach($data['member'] as $row)
            {
                $row->lastname = encryptionController::decrypt($row->lastname);
                $row->firstname = encryptionController::decrypt($row->firstname);
                $row->suffix = encryptionController::decrypt($row->suffix);
                $row->middlename  = encryptionController::decrypt($row->middlename);
                $row->mother_maiden_name = encryptionController::decrypt($row->mother_maiden_name);
                $row->birth_place = encryptionController::decrypt($row->birth_place);
                $row->nationality = encryptionController::decrypt($row->nationality);
                $row->acr_no = encryptionController::decrypt($row->acr_no);
                $row->weight = encryptionController::decrypt($row->weight);
                $row->height = encryptionController::decrypt($row->height);
                $row->weight_type = strtolower(encryptionController::decrypt($row->weight_type));
                $row->height_type = strtolower(encryptionController::decrypt($row->height_type));
                $row->occupation_profession = encryptionController::decrypt($row->occupation_profession);
                $row->source_of_income = encryptionController::decrypt($row->source_of_income);
                $row->nature_of_work = encryptionController::decrypt($row->nature_of_work);
                $row->employer_business_name = encryptionController::decrypt($row->employer_business_name);
                $row->business_address_1 = encryptionController::decrypt($row->business_address_1);
                $row->business_address_2 = encryptionController::decrypt($row->business_address_2);
                $row->business_address_3 = encryptionController::decrypt($row->business_address_3);
                $row->business_address_4 = encryptionController::decrypt($row->business_address_4);
                $row->business_address_5 = encryptionController::decrypt($row->business_address_5);
                $row->present_address_1 = encryptionController::decrypt($row->present_address_1);
                $row->present_address_2 = encryptionController::decrypt($row->present_address_2);
                $row->present_address_3 = encryptionController::decrypt($row->present_address_3);
                $row->present_address_4 = encryptionController::decrypt($row->present_address_4);
                $row->present_address_5 = encryptionController::decrypt($row->present_address_5);
                $row->permanent_address_1 = encryptionController::decrypt($row->permanent_address_1);
                $row->permanent_address_2  = encryptionController::decrypt($row->permanent_address_2);
                $row->permanent_address_3  = encryptionController::decrypt($row->permanent_address_3);
                $row->permanent_address_4  = encryptionController::decrypt($row->permanent_address_4);
                $row->permanent_address_5 = encryptionController::decrypt($row->permanent_address_5);
                $row->landline_number = encryptionController::decrypt($row->landline_number);
                $row->mobile_number  = encryptionController::decrypt($row->mobile_number);
                $row->office_number = encryptionController::decrypt($row->office_number);
                $row->email_address = encryptionController::decrypt($row->email_address);
                $row->id_presented = encryptionController::decrypt($row->id_presented);
                $row->id_number = encryptionController::decrypt($row->id_number);
                $row->philhealth = encryptionController::decrypt($row->philhealth);
                $row->sss_gsis = encryptionController::decrypt($row->sss_gsis);
                $row->tax_number = encryptionController::decrypt($row->tax_number);
                $time = strtotime($row->date_of_birth);
                $newformat = date('Y-m-d',$time);
                $row->date_of_birth = $newformat;
    
                $time = strtotime($row->id_expiry);
                $newformat = date('Y-m-d',$time);
                $row->id_expiry = $newformat;
            }
        }

        $data['payor'] = Collect(DB::table('tbl_customer_info')
            ->where('tbl_maf_iid',$maf_iid)
            ->where('cust_type',1)
            ->select('tbl_maf_iid', 
            'customerid', 
            'lastname', 
            'firstname', 
            'suffix', 
            'middlename', 
            'mother_maiden_name', 
            'date_of_birth', 
            'age', 
            DB::Raw('Case When sex = 0 Then \'MALE\'
                        When sex = 1 Then \'FEMALE\'
                        Else \'INVALID VALUE\' END as sex'),
            DB::Raw('Case When civil_status = 1 Then \'SINGLE\'
                        When civil_status = 2 Then \'MARRIED\'
                        When civil_status = 3 Then \'WIDOW/WIDOWER\'
                        When civil_status = 4 Then \'SEPARATED\'
                        Else \'INVALID VALUE\' END as civil_status'),
            'birth_place', 
            'nationality', 
            'acr_no', 
            'weight', 
            'weight_type', 
            'height', 
            'height_type',
            'occupation_profession', 
            'source_of_income',
            'nature_of_work',
            DB::Raw('Case When annual_income = 0 Then \'Less than 150K\'
                        When annual_income = 1 Then \'150K to less than 300K\'
                        When annual_income = 2 Then \'300K to less than 600K\'
                        When annual_income = 3 Then \'600K and above\'
                        Else \'INVALID VALUE\' END as annual_income'),
            'employer_business_name', 
            'business_address_1', 
            'business_address_2', 
            'business_address_3', 
            'business_address_4', 
            'business_address_5', 
            'present_address_1', 
            'present_address_2', 
            'present_address_3', 
            'present_address_4', 
            'present_address_5', 
            'permanent_address_1', 
            'permanent_address_2', 
            'permanent_address_3', 
            'permanent_address_4', 
            'permanent_address_5', 
            'landline_number', 
            'mobile_number', 
            'office_number', 
            'email_address', 
            'id_presented', 
            'id_number', 
            'id_expiry', 
            'philhealth', 
            'sss_gsis', 
            'tax_number',
            'relationship_to_member')->get());

        $data['payor_count'] = count($data['payor']);
        if(count($data['payor']) !=0)
        {
            foreach($data['payor'] as $row)
            {
                $row->lastname = encryptionController::decrypt($row->lastname);
                $row->firstname = encryptionController::decrypt($row->firstname);
                $row->suffix = encryptionController::decrypt($row->suffix);
                $row->middlename  = encryptionController::decrypt($row->middlename);
                $row->mother_maiden_name = encryptionController::decrypt($row->mother_maiden_name);
                $row->birth_place = encryptionController::decrypt($row->birth_place);
                $row->nationality = encryptionController::decrypt($row->nationality);
                $row->acr_no = encryptionController::decrypt($row->acr_no);
                $row->weight = encryptionController::decrypt($row->weight);
                $row->height = encryptionController::decrypt($row->height);
                $row->weight_type = strtolower(encryptionController::decrypt($row->weight_type));
                $row->height_type = strtolower(encryptionController::decrypt($row->height_type));
                $row->occupation_profession = encryptionController::decrypt($row->occupation_profession);
                $row->source_of_income = encryptionController::decrypt($row->source_of_income);
                $row->nature_of_work = encryptionController::decrypt($row->nature_of_work);
                $row->employer_business_name = encryptionController::decrypt($row->employer_business_name);
                $row->business_address_1 = encryptionController::decrypt($row->business_address_1);
                $row->business_address_2 = encryptionController::decrypt($row->business_address_2);
                $row->business_address_3 = encryptionController::decrypt($row->business_address_3);
                $row->business_address_4 = encryptionController::decrypt($row->business_address_4);
                $row->business_address_5 = encryptionController::decrypt($row->business_address_5);
                $row->present_address_1 = encryptionController::decrypt($row->present_address_1);
                $row->present_address_2 = encryptionController::decrypt($row->present_address_2);
                $row->present_address_3 = encryptionController::decrypt($row->present_address_3);
                $row->present_address_4 = encryptionController::decrypt($row->present_address_4);
                $row->present_address_5 = encryptionController::decrypt($row->present_address_5);
                $row->permanent_address_1 = encryptionController::decrypt($row->permanent_address_1);
                $row->permanent_address_2  = encryptionController::decrypt($row->permanent_address_2);
                $row->permanent_address_3  = encryptionController::decrypt($row->permanent_address_3);
                $row->permanent_address_4  = encryptionController::decrypt($row->permanent_address_4);
                $row->permanent_address_5 = encryptionController::decrypt($row->permanent_address_5);
                $row->landline_number = encryptionController::decrypt($row->landline_number);
                $row->mobile_number  = encryptionController::decrypt($row->mobile_number);
                $row->office_number = encryptionController::decrypt($row->office_number);
                $row->email_address = encryptionController::decrypt($row->email_address);
                $row->id_presented = encryptionController::decrypt($row->id_presented);
                $row->id_number = encryptionController::decrypt($row->id_number);
                $row->philhealth = encryptionController::decrypt($row->philhealth);
                $row->sss_gsis = encryptionController::decrypt($row->sss_gsis);
                $row->tax_number = encryptionController::decrypt($row->tax_number);
                $time = strtotime($row->date_of_birth);
                $newformat = date('Y-m-d',$time);
                $row->date_of_birth = $newformat;

                $time = strtotime($row->id_expiry);
                $newformat = date('Y-m-d',$time);
                $row->id_expiry = $newformat;

                foreach($relationship as $rows)
                {
                    if($rows['iid'] == $row->relationship_to_member) 
                    {
                        $row->relationship_to_member = $rows['description'];
                    }
                }
            }
        }

        $data['guardian'] = Collect(DB::table('tbl_customer_info')
            ->where('tbl_maf_iid',$maf_iid)
            ->where('cust_type',2)
            ->select('tbl_maf_iid', 
            'customerid', 
            'lastname', 
            'firstname', 
            'suffix', 
            'middlename', 
            'mother_maiden_name', 
            'date_of_birth', 
            'age', 
            DB::Raw('Case When sex = 0 Then \'MALE\'
                        When sex = 1 Then \'FEMALE\'
                        Else \'INVALID VALUE\' END as sex'),
            DB::Raw('Case When civil_status = 1 Then \'SINGLE\'
                        When civil_status = 2 Then \'MARRIED\'
                        When civil_status = 3 Then \'WIDOW/WIDOWER\'
                        When civil_status = 4 Then \'SEPARATED\'
                        Else \'INVALID VALUE\' END as civil_status'),
            'birth_place', 
            'nationality', 
            'acr_no', 
            'weight', 
            'weight_type', 
            'height', 
            'height_type',
            'occupation_profession', 
            'source_of_income',
            'nature_of_work',
            DB::Raw('Case When annual_income = 0 Then \'Less than 150K\'
                        When annual_income = 1 Then \'150K to less than 300K\'
                        When annual_income = 2 Then \'300K to less than 600K\'
                        When annual_income = 3 Then \'600K and above\'
                        Else \'INVALID VALUE\' END as annual_income'),
            'employer_business_name', 
            'business_address_1', 
            'business_address_2', 
            'business_address_3', 
            'business_address_4', 
            'business_address_5', 
            'present_address_1', 
            'present_address_2', 
            'present_address_3', 
            'present_address_4', 
            'present_address_5', 
            'permanent_address_1', 
            'permanent_address_2', 
            'permanent_address_3', 
            'permanent_address_4', 
            'permanent_address_5', 
            'landline_number', 
            'mobile_number', 
            'office_number', 
            'email_address', 
            'id_presented', 
            'id_number', 
            'id_expiry', 
            'philhealth', 
            'sss_gsis', 
            'tax_number',
            'relationship_to_member')->get());

        $data['guardian_count'] = count($data['guardian']);
        if(count($data['guardian']) !=0)
        {
            foreach($data['guardian'] as $row)
            {
                $row->lastname = encryptionController::decrypt($row->lastname);
                $row->firstname = encryptionController::decrypt($row->firstname);
                $row->suffix = encryptionController::decrypt($row->suffix);
                $row->middlename  = encryptionController::decrypt($row->middlename);
                $row->mother_maiden_name = encryptionController::decrypt($row->mother_maiden_name);
                $row->birth_place = encryptionController::decrypt($row->birth_place);
                $row->nationality = encryptionController::decrypt($row->nationality);
                $row->acr_no = encryptionController::decrypt($row->acr_no);
                $row->weight = encryptionController::decrypt($row->weight);
                $row->height = encryptionController::decrypt($row->height);
                $row->weight_type = strtolower(encryptionController::decrypt($row->weight_type));
                $row->height_type = strtolower(encryptionController::decrypt($row->height_type));
                $row->occupation_profession = encryptionController::decrypt($row->occupation_profession);
                $row->source_of_income = encryptionController::decrypt($row->source_of_income);
                $row->nature_of_work = encryptionController::decrypt($row->nature_of_work);
                $row->employer_business_name = encryptionController::decrypt($row->employer_business_name);
                $row->business_address_1 = encryptionController::decrypt($row->business_address_1);
                $row->business_address_2 = encryptionController::decrypt($row->business_address_2);
                $row->business_address_3 = encryptionController::decrypt($row->business_address_3);
                $row->business_address_4 = encryptionController::decrypt($row->business_address_4);
                $row->business_address_5 = encryptionController::decrypt($row->business_address_5);
                $row->present_address_1 = encryptionController::decrypt($row->present_address_1);
                $row->present_address_2 = encryptionController::decrypt($row->present_address_2);
                $row->present_address_3 = encryptionController::decrypt($row->present_address_3);
                $row->present_address_4 = encryptionController::decrypt($row->present_address_4);
                $row->present_address_5 = encryptionController::decrypt($row->present_address_5);
                $row->permanent_address_1 = encryptionController::decrypt($row->permanent_address_1);
                $row->permanent_address_2  = encryptionController::decrypt($row->permanent_address_2);
                $row->permanent_address_3  = encryptionController::decrypt($row->permanent_address_3);
                $row->permanent_address_4  = encryptionController::decrypt($row->permanent_address_4);
                $row->permanent_address_5 = encryptionController::decrypt($row->permanent_address_5);
                $row->landline_number = encryptionController::decrypt($row->landline_number);
                $row->mobile_number  = encryptionController::decrypt($row->mobile_number);
                $row->office_number = encryptionController::decrypt($row->office_number);
                $row->email_address = encryptionController::decrypt($row->email_address);
                $row->id_presented = encryptionController::decrypt($row->id_presented);
                $row->id_number = encryptionController::decrypt($row->id_number);
                $row->philhealth = encryptionController::decrypt($row->philhealth);
                $row->sss_gsis = encryptionController::decrypt($row->sss_gsis);
                $row->tax_number = encryptionController::decrypt($row->tax_number);
                $time = strtotime($row->date_of_birth);
                $newformat = date('Y-m-d',$time);
                $row->date_of_birth = $newformat;

                $time = strtotime($row->id_expiry);
                $newformat = date('Y-m-d',$time);
                $row->id_expiry = $newformat;

                foreach($relationship as $rows)
                {
                    if($rows['iid'] == $row->relationship_to_member) 
                    {
                        $row->relationship_to_member = $rows['description'];
                    }
                }
            }
        }
        $data['pdd'] = Collect(DB::table('tbl_customer_info')
            ->where('tbl_maf_iid',$maf_iid)
            ->where('cust_type',3)
            ->select('tbl_maf_iid', 
            'customerid', 
            'lastname', 
            'firstname', 
            'suffix', 
            'middlename', 
            'mother_maiden_name', 
            'date_of_birth', 
            'age', 
            DB::Raw('Case When sex = 0 Then \'MALE\'
                        When sex = 1 Then \'FEMALE\'
                        Else \'INVALID VALUE\' END as sex'),
            DB::Raw('Case When civil_status = 1 Then \'SINGLE\'
                        When civil_status = 2 Then \'MARRIED\'
                        When civil_status = 3 Then \'WIDOW/WIDOWER\'
                        When civil_status = 4 Then \'SEPARATED\'
                        Else \'INVALID VALUE\' END as civil_status'),
            'birth_place', 
            'nationality', 
            'acr_no', 
            'weight', 
            'weight_type', 
            'height', 
            'height_type',
            'occupation_profession', 
            'nature_of_work',
            DB::Raw('Case When annual_income = 0 Then \'Less than 150K\'
                        When annual_income = 1 Then \'150K to less than 300K\'
                        When annual_income = 2 Then \'300K to less than 600K\'
                        When annual_income = 3 Then \'600K and above\'
                        Else \'INVALID VALUE\' END as annual_income'),
            'employer_business_name', 
            'business_address_1', 
            'business_address_2', 
            'business_address_3', 
            'business_address_4', 
            'business_address_5', 
            'present_address_1', 
            'present_address_2', 
            'present_address_3', 
            'present_address_4', 
            'present_address_5', 
            'permanent_address_1', 
            'permanent_address_2', 
            'permanent_address_3', 
            'permanent_address_4', 
            'permanent_address_5', 
            'landline_number', 
            'mobile_number', 
            'office_number', 
            'email_address', 
            'id_presented', 
            'id_number', 
            'id_expiry', 
            'philhealth', 
            'sss_gsis', 
            'tax_number',
            'relationship_to_member')->get());

        $data['pdd_count'] = count($data['pdd']);
        if(count($data['pdd']) !=0)
        {
            foreach($data['pdd'] as $row)
            {
                $row->lastname = encryptionController::decrypt($row->lastname);
                $row->firstname = encryptionController::decrypt($row->firstname);
                $row->suffix = encryptionController::decrypt($row->suffix);
                $row->middlename  = encryptionController::decrypt($row->middlename);
                $row->mother_maiden_name = encryptionController::decrypt($row->mother_maiden_name);
                $row->birth_place = encryptionController::decrypt($row->birth_place);
                $row->nationality = encryptionController::decrypt($row->nationality);
                $row->acr_no = encryptionController::decrypt($row->acr_no);
                $row->weight = encryptionController::decrypt($row->weight);
                $row->height = encryptionController::decrypt($row->height);
                $row->weight_type = strtolower(encryptionController::decrypt($row->weight_type));
                $row->height_type = strtolower(encryptionController::decrypt($row->height_type));
                $row->occupation_profession = encryptionController::decrypt($row->occupation_profession);
                $row->nature_of_work = encryptionController::decrypt($row->nature_of_work);
                $row->employer_business_name = encryptionController::decrypt($row->employer_business_name);
                $row->business_address_1 = encryptionController::decrypt($row->business_address_1);
                $row->business_address_2 = encryptionController::decrypt($row->business_address_2);
                $row->business_address_3 = encryptionController::decrypt($row->business_address_3);
                $row->business_address_4 = encryptionController::decrypt($row->business_address_4);
                $row->business_address_5 = encryptionController::decrypt($row->business_address_5);
                $row->present_address_1 = encryptionController::decrypt($row->present_address_1);
                $row->present_address_2 = encryptionController::decrypt($row->present_address_2);
                $row->present_address_3 = encryptionController::decrypt($row->present_address_3);
                $row->present_address_4 = encryptionController::decrypt($row->present_address_4);
                $row->present_address_5 = encryptionController::decrypt($row->present_address_5);
                $row->permanent_address_1 = encryptionController::decrypt($row->permanent_address_1);
                $row->permanent_address_2  = encryptionController::decrypt($row->permanent_address_2);
                $row->permanent_address_3  = encryptionController::decrypt($row->permanent_address_3);
                $row->permanent_address_4  = encryptionController::decrypt($row->permanent_address_4);
                $row->permanent_address_5 = encryptionController::decrypt($row->permanent_address_5);
                $row->landline_number = encryptionController::decrypt($row->landline_number);
                $row->mobile_number  = encryptionController::decrypt($row->mobile_number);
                $row->office_number = encryptionController::decrypt($row->office_number);
                $row->email_address = encryptionController::decrypt($row->email_address);
                $row->id_presented = encryptionController::decrypt($row->id_presented);
                $row->id_number = encryptionController::decrypt($row->id_number);
                $row->philhealth = encryptionController::decrypt($row->philhealth);
                $row->sss_gsis = encryptionController::decrypt($row->sss_gsis);
                $row->tax_number = encryptionController::decrypt($row->tax_number);
                $time = strtotime($row->date_of_birth);
                $newformat = date('Y-m-d',$time);
                $row->date_of_birth = $newformat;

                $time = strtotime($row->id_expiry);
                $newformat = date('Y-m-d',$time);
                $row->id_expiry = $newformat;

                foreach($relationship as $rows)
                {
                    if($rows['iid'] == $row->relationship_to_member) 
                    {
                        $row->relationship_to_member = $rows['description'];
                    }
                }
            }
        }
        $data['pb'] = Collect(DB::table('tbl_customer_info')
            ->where('tbl_maf_iid',$maf_iid)
            ->where('cust_type',4)
            ->select('tbl_maf_iid', 
            'customerid', 
            'lastname', 
            'firstname', 
            'suffix', 
            'middlename', 
            'mother_maiden_name', 
            'date_of_birth', 
            'age', 
            DB::Raw('Case When sex = 0 Then \'MALE\'
                        When sex = 1 Then \'FEMALE\'
                        Else \'INVALID VALUE\' END as sex'),
            DB::Raw('Case When civil_status = 1 Then \'SINGLE\'
                        When civil_status = 2 Then \'MARRIED\'
                        When civil_status = 3 Then \'WIDOW/WIDOWER\'
                        When civil_status = 4 Then \'SEPARATED\'
                        Else \'INVALID VALUE\' END as civil_status'),
            'birth_place', 
            'nationality', 
            'acr_no', 
            'weight', 
            'weight_type', 
            'height', 
            'height_type',
            'occupation_profession', 
            'nature_of_work',
            DB::Raw('Case When annual_income = 0 Then \'Less than 150K\'
                        When annual_income = 1 Then \'150K to less than 300K\'
                        When annual_income = 2 Then \'300K to less than 600K\'
                        When annual_income = 3 Then \'600K and above\'
                        Else \'INVALID VALUE\' END as annual_income'),
            'employer_business_name', 
            'business_address_1', 
            'business_address_2', 
            'business_address_3', 
            'business_address_4', 
            'business_address_5', 
            'present_address_1', 
            'present_address_2', 
            'present_address_3', 
            'present_address_4', 
            'present_address_5', 
            'permanent_address_1', 
            'permanent_address_2', 
            'permanent_address_3', 
            'permanent_address_4', 
            'permanent_address_5', 
            'landline_number', 
            'mobile_number', 
            'office_number', 
            'email_address', 
            'id_presented', 
            'id_number', 
            'id_expiry', 
            'philhealth', 
            'sss_gsis', 
            'tax_number',
            'relationship_to_member')->get());

        $data['pb_count'] = count($data['pb']);
        if(count($data['pb']) !=0)
        {
            foreach($data['pb'] as $row)
            {
                $row->lastname = encryptionController::decrypt($row->lastname);
                $row->firstname = encryptionController::decrypt($row->firstname);
                $row->suffix = encryptionController::decrypt($row->suffix);
                $row->middlename  = encryptionController::decrypt($row->middlename);
                $row->mother_maiden_name = encryptionController::decrypt($row->mother_maiden_name);
                $row->birth_place = encryptionController::decrypt($row->birth_place);
                $row->nationality = encryptionController::decrypt($row->nationality);
                $row->acr_no = encryptionController::decrypt($row->acr_no);
                $row->weight = encryptionController::decrypt($row->weight);
                $row->height = encryptionController::decrypt($row->height);
                $row->weight_type = strtolower(encryptionController::decrypt($row->weight_type));
                $row->height_type = strtolower(encryptionController::decrypt($row->height_type));
                $row->occupation_profession = encryptionController::decrypt($row->occupation_profession);
                $row->nature_of_work = encryptionController::decrypt($row->nature_of_work);
                $row->employer_business_name = encryptionController::decrypt($row->employer_business_name);
                $row->business_address_1 = encryptionController::decrypt($row->business_address_1);
                $row->business_address_2 = encryptionController::decrypt($row->business_address_2);
                $row->business_address_3 = encryptionController::decrypt($row->business_address_3);
                $row->business_address_4 = encryptionController::decrypt($row->business_address_4);
                $row->business_address_5 = encryptionController::decrypt($row->business_address_5);
                $row->present_address_1 = encryptionController::decrypt($row->present_address_1);
                $row->present_address_2 = encryptionController::decrypt($row->present_address_2);
                $row->present_address_3 = encryptionController::decrypt($row->present_address_3);
                $row->present_address_4 = encryptionController::decrypt($row->present_address_4);
                $row->present_address_5 = encryptionController::decrypt($row->present_address_5);
                $row->permanent_address_1 = encryptionController::decrypt($row->permanent_address_1);
                $row->permanent_address_2  = encryptionController::decrypt($row->permanent_address_2);
                $row->permanent_address_3  = encryptionController::decrypt($row->permanent_address_3);
                $row->permanent_address_4  = encryptionController::decrypt($row->permanent_address_4);
                $row->permanent_address_5 = encryptionController::decrypt($row->permanent_address_5);
                $row->landline_number = encryptionController::decrypt($row->landline_number);
                $row->mobile_number  = encryptionController::decrypt($row->mobile_number);
                $row->office_number = encryptionController::decrypt($row->office_number);
                $row->email_address = encryptionController::decrypt($row->email_address);
                $row->id_presented = encryptionController::decrypt($row->id_presented);
                $row->id_number = encryptionController::decrypt($row->id_number);
                $row->philhealth = encryptionController::decrypt($row->philhealth);
                $row->sss_gsis = encryptionController::decrypt($row->sss_gsis);
                $row->tax_number = encryptionController::decrypt($row->tax_number);
                $time = strtotime($row->date_of_birth);
                $newformat = date('Y-m-d',$time);
                $row->date_of_birth = $newformat;

                $time = strtotime($row->id_expiry);
                $newformat = date('Y-m-d',$time);
                $row->id_expiry = $newformat;

                foreach($relationship as $rows)
                {
                    if($rows['iid'] == $row->relationship_to_member) 
                    {
                        $row->relationship_to_member = $rows['description'];
                    }
                }
            }
        }
        $data['ib1'] = Collect(DB::table('tbl_customer_info')
            ->where('tbl_maf_iid',$maf_iid)
            ->where('cust_type',5)
            ->select('tbl_maf_iid', 
            'customerid', 
            'lastname', 
            'firstname', 
            'suffix', 
            'middlename', 
            'mother_maiden_name', 
            'date_of_birth', 
            'age', 
            DB::Raw('Case When sex = 0 Then \'MALE\'
                        When sex = 1 Then \'FEMALE\'
                        Else \'INVALID VALUE\' END as sex'),
            DB::Raw('Case When civil_status = 1 Then \'SINGLE\'
                        When civil_status = 2 Then \'MARRIED\'
                        When civil_status = 3 Then \'WIDOW/WIDOWER\'
                        When civil_status = 4 Then \'SEPARATED\'
                        Else \'INVALID VALUE\' END as civil_status'),
            'birth_place', 
            'nationality', 
            'acr_no', 
            'weight', 
            'weight_type', 
            'height', 
            'height_type',
            'occupation_profession', 
            'nature_of_work',
            DB::Raw('Case When annual_income = 0 Then \'Less than 150K\'
                        When annual_income = 1 Then \'150K to less than 300K\'
                        When annual_income = 2 Then \'300K to less than 600K\'
                        When annual_income = 3 Then \'600K and above\'
                        Else \'INVALID VALUE\' END as annual_income'),
            'employer_business_name', 
            'business_address_1', 
            'business_address_2', 
            'business_address_3', 
            'business_address_4', 
            'business_address_5', 
            'present_address_1', 
            'present_address_2', 
            'present_address_3', 
            'present_address_4', 
            'present_address_5', 
            'permanent_address_1', 
            'permanent_address_2', 
            'permanent_address_3', 
            'permanent_address_4', 
            'permanent_address_5', 
            'landline_number', 
            'mobile_number', 
            'office_number', 
            'email_address', 
            'id_presented', 
            'id_number', 
            'id_expiry', 
            'philhealth', 
            'sss_gsis', 
            'tax_number',
            'relationship_to_member')->get());

        $data['ib1_count'] = count($data['ib1']);
        if(count($data['ib1']) !=0)
        {
            foreach($data['ib1'] as $row)
            {
                $row->lastname = encryptionController::decrypt($row->lastname);
                $row->firstname = encryptionController::decrypt($row->firstname);
                $row->suffix = encryptionController::decrypt($row->suffix);
                $row->middlename  = encryptionController::decrypt($row->middlename);
                $row->mother_maiden_name = encryptionController::decrypt($row->mother_maiden_name);
                $row->birth_place = encryptionController::decrypt($row->birth_place);
                $row->nationality = encryptionController::decrypt($row->nationality);
                $row->acr_no = encryptionController::decrypt($row->acr_no);
                $row->weight = encryptionController::decrypt($row->weight);
                $row->height = encryptionController::decrypt($row->height);
                $row->weight_type = strtolower(encryptionController::decrypt($row->weight_type));
                $row->height_type = strtolower(encryptionController::decrypt($row->height_type));
                $row->occupation_profession = encryptionController::decrypt($row->occupation_profession);
                $row->nature_of_work = encryptionController::decrypt($row->nature_of_work);
                $row->employer_business_name = encryptionController::decrypt($row->employer_business_name);
                $row->business_address_1 = encryptionController::decrypt($row->business_address_1);
                $row->business_address_2 = encryptionController::decrypt($row->business_address_2);
                $row->business_address_3 = encryptionController::decrypt($row->business_address_3);
                $row->business_address_4 = encryptionController::decrypt($row->business_address_4);
                $row->business_address_5 = encryptionController::decrypt($row->business_address_5);
                $row->present_address_1 = encryptionController::decrypt($row->present_address_1);
                $row->present_address_2 = encryptionController::decrypt($row->present_address_2);
                $row->present_address_3 = encryptionController::decrypt($row->present_address_3);
                $row->present_address_4 = encryptionController::decrypt($row->present_address_4);
                $row->present_address_5 = encryptionController::decrypt($row->present_address_5);
                $row->permanent_address_1 = encryptionController::decrypt($row->permanent_address_1);
                $row->permanent_address_2  = encryptionController::decrypt($row->permanent_address_2);
                $row->permanent_address_3  = encryptionController::decrypt($row->permanent_address_3);
                $row->permanent_address_4  = encryptionController::decrypt($row->permanent_address_4);
                $row->permanent_address_5 = encryptionController::decrypt($row->permanent_address_5);
                $row->landline_number = encryptionController::decrypt($row->landline_number);
                $row->mobile_number  = encryptionController::decrypt($row->mobile_number);
                $row->office_number = encryptionController::decrypt($row->office_number);
                $row->email_address = encryptionController::decrypt($row->email_address);
                $row->id_presented = encryptionController::decrypt($row->id_presented);
                $row->id_number = encryptionController::decrypt($row->id_number);
                $row->philhealth = encryptionController::decrypt($row->philhealth);
                $row->sss_gsis = encryptionController::decrypt($row->sss_gsis);
                $row->tax_number = encryptionController::decrypt($row->tax_number);
                $time = strtotime($row->date_of_birth);
                $newformat = date('Y-m-d',$time);
                $row->date_of_birth = $newformat;

                $time = strtotime($row->id_expiry);
                $newformat = date('Y-m-d',$time);
                $row->id_expiry = $newformat;

                foreach($relationship as $rows)
                {
                    if($rows['iid'] == $row->relationship_to_member) 
                    {
                        $row->relationship_to_member = $rows['description'];
                    }
                }
            }
        }
        $data['ib2'] = Collect(DB::table('tbl_customer_info')
            ->where('tbl_maf_iid',$maf_iid)
            ->where('cust_type',6)
            ->select('tbl_maf_iid', 
            'customerid', 
            'lastname', 
            'firstname', 
            'suffix', 
            'middlename', 
            'mother_maiden_name', 
            'date_of_birth', 
            'age', 
            DB::Raw('Case When sex = 0 Then \'MALE\'
                        When sex = 1 Then \'FEMALE\'
                        Else \'INVALID VALUE\' END as sex'),
            DB::Raw('Case When civil_status = 1 Then \'SINGLE\'
                        When civil_status = 2 Then \'MARRIED\'
                        When civil_status = 3 Then \'WIDOW/WIDOWER\'
                        When civil_status = 4 Then \'SEPARATED\'
                        Else \'INVALID VALUE\' END as civil_status'),
            'birth_place', 
            'nationality', 
            'acr_no', 
            'weight', 
            'weight_type', 
            'height', 
            'height_type',
            'occupation_profession', 
            'nature_of_work',
            DB::Raw('Case When annual_income = 0 Then \'Less than 150K\'
                        When annual_income = 1 Then \'150K to less than 300K\'
                        When annual_income = 2 Then \'300K to less than 600K\'
                        When annual_income = 3 Then \'600K and above\'
                        Else \'INVALID VALUE\' END as annual_income'),
            'employer_business_name', 
            'business_address_1', 
            'business_address_2', 
            'business_address_3', 
            'business_address_4', 
            'business_address_5', 
            'present_address_1', 
            'present_address_2', 
            'present_address_3', 
            'present_address_4', 
            'present_address_5', 
            'permanent_address_1', 
            'permanent_address_2', 
            'permanent_address_3', 
            'permanent_address_4', 
            'permanent_address_5', 
            'landline_number', 
            'mobile_number', 
            'office_number', 
            'email_address', 
            'id_presented', 
            'id_number', 
            'id_expiry', 
            'philhealth', 
            'sss_gsis', 
            'tax_number',
            'relationship_to_member')->get());

        $data['ib2_count'] = count($data['ib2']);
        if(count($data['ib2']) !=0)
        {
            foreach($data['ib2'] as $row)
            {
                $row->lastname = encryptionController::decrypt($row->lastname);
                $row->firstname = encryptionController::decrypt($row->firstname);
                $row->suffix = encryptionController::decrypt($row->suffix);
                $row->middlename  = encryptionController::decrypt($row->middlename);
                $row->mother_maiden_name = encryptionController::decrypt($row->mother_maiden_name);
                $row->birth_place = encryptionController::decrypt($row->birth_place);
                $row->nationality = encryptionController::decrypt($row->nationality);
                $row->acr_no = encryptionController::decrypt($row->acr_no);
                $row->weight = encryptionController::decrypt($row->weight);
                $row->height = encryptionController::decrypt($row->height);
                $row->weight_type = strtolower(encryptionController::decrypt($row->weight_type));
                $row->height_type = strtolower(encryptionController::decrypt($row->height_type));
                $row->occupation_profession = encryptionController::decrypt($row->occupation_profession);
                $row->nature_of_work = encryptionController::decrypt($row->nature_of_work);
                $row->employer_business_name = encryptionController::decrypt($row->employer_business_name);
                $row->business_address_1 = encryptionController::decrypt($row->business_address_1);
                $row->business_address_2 = encryptionController::decrypt($row->business_address_2);
                $row->business_address_3 = encryptionController::decrypt($row->business_address_3);
                $row->business_address_4 = encryptionController::decrypt($row->business_address_4);
                $row->business_address_5 = encryptionController::decrypt($row->business_address_5);
                $row->present_address_1 = encryptionController::decrypt($row->present_address_1);
                $row->present_address_2 = encryptionController::decrypt($row->present_address_2);
                $row->present_address_3 = encryptionController::decrypt($row->present_address_3);
                $row->present_address_4 = encryptionController::decrypt($row->present_address_4);
                $row->present_address_5 = encryptionController::decrypt($row->present_address_5);
                $row->permanent_address_1 = encryptionController::decrypt($row->permanent_address_1);
                $row->permanent_address_2  = encryptionController::decrypt($row->permanent_address_2);
                $row->permanent_address_3  = encryptionController::decrypt($row->permanent_address_3);
                $row->permanent_address_4  = encryptionController::decrypt($row->permanent_address_4);
                $row->permanent_address_5 = encryptionController::decrypt($row->permanent_address_5);
                $row->landline_number = encryptionController::decrypt($row->landline_number);
                $row->mobile_number  = encryptionController::decrypt($row->mobile_number);
                $row->office_number = encryptionController::decrypt($row->office_number);
                $row->email_address = encryptionController::decrypt($row->email_address);
                $row->id_presented = encryptionController::decrypt($row->id_presented);
                $row->id_number = encryptionController::decrypt($row->id_number);
                $row->philhealth = encryptionController::decrypt($row->philhealth);
                $row->sss_gsis = encryptionController::decrypt($row->sss_gsis);
                $row->tax_number = encryptionController::decrypt($row->tax_number);
                $time = strtotime($row->date_of_birth);
                $newformat = date('Y-m-d',$time);
                $row->date_of_birth = $newformat;

                $time = strtotime($row->id_expiry);
                $newformat = date('Y-m-d',$time);
                $row->id_expiry = $newformat;

                foreach($relationship as $rows)
                {
                    if($rows['iid'] == $row->relationship_to_member) 
                    {
                        $row->relationship_to_member = $rows['description'];
                    }
                }
            }
        }
        $data['ib3'] = Collect(DB::table('tbl_customer_info')
            ->where('tbl_maf_iid',$maf_iid)
            ->where('cust_type',7)
            ->select('tbl_maf_iid', 
            'customerid', 
            'lastname', 
            'firstname', 
            'suffix', 
            'middlename', 
            'mother_maiden_name', 
            'date_of_birth', 
            'age', 
            DB::Raw('Case When sex = 0 Then \'MALE\'
                        When sex = 1 Then \'FEMALE\'
                        Else \'INVALID VALUE\' END as sex'),
            DB::Raw('Case When civil_status = 1 Then \'SINGLE\'
                        When civil_status = 2 Then \'MARRIED\'
                        When civil_status = 3 Then \'WIDOW/WIDOWER\'
                        When civil_status = 4 Then \'SEPARATED\'
                        Else \'INVALID VALUE\' END as civil_status'),
            'birth_place', 
            'nationality', 
            'acr_no', 
            'weight', 
            'weight_type', 
            'height', 
            'height_type',
            'occupation_profession', 
            'nature_of_work',
            DB::Raw('Case When annual_income = 0 Then \'Less than 150K\'
                        When annual_income = 1 Then \'150K to less than 300K\'
                        When annual_income = 2 Then \'300K to less than 600K\'
                        When annual_income = 3 Then \'600K and above\'
                        Else \'INVALID VALUE\' END as annual_income'),
            'employer_business_name', 
            'business_address_1', 
            'business_address_2', 
            'business_address_3', 
            'business_address_4', 
            'business_address_5', 
            'present_address_1', 
            'present_address_2', 
            'present_address_3', 
            'present_address_4', 
            'present_address_5', 
            'permanent_address_1', 
            'permanent_address_2', 
            'permanent_address_3', 
            'permanent_address_4', 
            'permanent_address_5', 
            'landline_number', 
            'mobile_number', 
            'office_number', 
            'email_address', 
            'id_presented', 
            'id_number', 
            'id_expiry', 
            'philhealth', 
            'sss_gsis', 
            'tax_number',
            'relationship_to_member')->get());

        $data['ib3_count'] = count($data['ib3']);
        if(count($data['ib3']) !=0)
        {
            foreach($data['ib3'] as $row)
            {
                $row->lastname = encryptionController::decrypt($row->lastname);
                $row->firstname = encryptionController::decrypt($row->firstname);
                $row->suffix = encryptionController::decrypt($row->suffix);
                $row->middlename  = encryptionController::decrypt($row->middlename);
                $row->mother_maiden_name = encryptionController::decrypt($row->mother_maiden_name);
                $row->birth_place = encryptionController::decrypt($row->birth_place);
                $row->nationality = encryptionController::decrypt($row->nationality);
                $row->acr_no = encryptionController::decrypt($row->acr_no);
                $row->weight = encryptionController::decrypt($row->weight);
                $row->height = encryptionController::decrypt($row->height);
                $row->weight_type = strtolower(encryptionController::decrypt($row->weight_type));
                $row->height_type = strtolower(encryptionController::decrypt($row->height_type));
                $row->occupation_profession = encryptionController::decrypt($row->occupation_profession);
                $row->nature_of_work = encryptionController::decrypt($row->nature_of_work);
                $row->employer_business_name = encryptionController::decrypt($row->employer_business_name);
                $row->business_address_1 = encryptionController::decrypt($row->business_address_1);
                $row->business_address_2 = encryptionController::decrypt($row->business_address_2);
                $row->business_address_3 = encryptionController::decrypt($row->business_address_3);
                $row->business_address_4 = encryptionController::decrypt($row->business_address_4);
                $row->business_address_5 = encryptionController::decrypt($row->business_address_5);
                $row->present_address_1 = encryptionController::decrypt($row->present_address_1);
                $row->present_address_2 = encryptionController::decrypt($row->present_address_2);
                $row->present_address_3 = encryptionController::decrypt($row->present_address_3);
                $row->present_address_4 = encryptionController::decrypt($row->present_address_4);
                $row->present_address_5 = encryptionController::decrypt($row->present_address_5);
                $row->permanent_address_1 = encryptionController::decrypt($row->permanent_address_1);
                $row->permanent_address_2  = encryptionController::decrypt($row->permanent_address_2);
                $row->permanent_address_3  = encryptionController::decrypt($row->permanent_address_3);
                $row->permanent_address_4  = encryptionController::decrypt($row->permanent_address_4);
                $row->permanent_address_5 = encryptionController::decrypt($row->permanent_address_5);
                $row->landline_number = encryptionController::decrypt($row->landline_number);
                $row->mobile_number  = encryptionController::decrypt($row->mobile_number);
                $row->office_number = encryptionController::decrypt($row->office_number);
                $row->email_address = encryptionController::decrypt($row->email_address);
                $row->id_presented = encryptionController::decrypt($row->id_presented);
                $row->id_number = encryptionController::decrypt($row->id_number);
                $row->philhealth = encryptionController::decrypt($row->philhealth);
                $row->sss_gsis = encryptionController::decrypt($row->sss_gsis);
                $row->tax_number = encryptionController::decrypt($row->tax_number);
                $time = strtotime($row->date_of_birth);
                $newformat = date('Y-m-d',$time);
                $row->date_of_birth = $newformat;

                $time = strtotime($row->id_expiry);
                $newformat = date('Y-m-d',$time);
                $row->id_expiry = $newformat;

                foreach($relationship as $rows)
                {
                    if($rows['iid'] == $row->relationship_to_member) 
                    {
                        $row->relationship_to_member = $rows['description'];
                    }
                }
            }
        }
        $data['get_policy'] = Collect(DB::table('tbl_personal_history')
        ->where('tbl_maf_iid',$maf_iid)
        ->where('type',0)
        ->get());

        $data['policy_count'] = count($data['get_policy']);

        if(count($data['get_policy']) != 0)
        {
            $data['get_policy'][0]->yes_no_1 = encryptionController::decrypt($data['get_policy'][0]->yes_no_1);
            $data['get_policy'][0]->details_1 = encryptionController::decrypt($data['get_policy'][0]->details_1);

            $data['get_policy'][0]->yes_no_2 = encryptionController::decrypt($data['get_policy'][0]->yes_no_2);
            $data['get_policy'][0]->details_2 = encryptionController::decrypt($data['get_policy'][0]->details_2);

            $data['get_policy'][0]->yes_no_3 = encryptionController::decrypt($data['get_policy'][0]->yes_no_3);
            $data['get_policy'][0]->details_3 = encryptionController::decrypt($data['get_policy'][0]->details_3);

            $data['get_policy'][0]->yes_no_4 = encryptionController::decrypt($data['get_policy'][0]->yes_no_4);
            $data['get_policy'][0]->details_4 = encryptionController::decrypt($data['get_policy'][0]->details_4);
        }


        $data['get_payor_guardian'] = Collect(DB::table('tbl_personal_history')
        ->where('tbl_maf_iid',$maf_iid)
        ->where('type',1)
        ->get());

        $data['payor_guardian_count'] = count($data['get_payor_guardian']);

        if(count($data['get_payor_guardian']) != 0)
        {
            $data['get_payor_guardian'][0]->yes_no_1 = encryptionController::decrypt($data['get_payor_guardian'][0]->yes_no_1);
            $data['get_payor_guardian'][0]->details_1 = encryptionController::decrypt($data['get_payor_guardian'][0]->details_1);

            $data['get_payor_guardian'][0]->yes_no_2 = encryptionController::decrypt($data['get_payor_guardian'][0]->yes_no_2);
            $data['get_payor_guardian'][0]->details_2 = encryptionController::decrypt($data['get_payor_guardian'][0]->details_2);

            $data['get_payor_guardian'][0]->yes_no_3 = encryptionController::decrypt($data['get_payor_guardian'][0]->yes_no_3);
            $data['get_payor_guardian'][0]->details_3 = encryptionController::decrypt($data['get_payor_guardian'][0]->details_3);

            $data['get_payor_guardian'][0]->yes_no_4 = encryptionController::decrypt($data['get_payor_guardian'][0]->yes_no_4);
            $data['get_payor_guardian'][0]->details_4 = encryptionController::decrypt($data['get_payor_guardian'][0]->details_4);
        }
        //QUESTIONNAIRE------------------------------------------------------------------------------------------------------
        $data['user_type'] = $request->input('user_type');
        if($data['user_type'] == 0)
        {
            if($type == 0)
            {
                $data['questionnaire'] = Collect(DB::table('tbl_health_answer')
                    ->where('tbl_maf_iid', $maf_iid)
                    ->select('iid',
                    'tbl_maf_iid',
                    'tbl_product_iid',
                    'tbl_product_oracle_oid',
                    'question_number',
                    DB::Raw('Case When question_number < 10 Then 
                        Case When yes_no = 0 Then \'NO\'
                        When yes_no = 1 Then \'YES\'
                        ELSE \'INVALID VALUE\' END
                    When question_number > 9 Then
                        yes_no
                    ELSE \'INVALID VALUE\' END as yes_no'),
                    'details',
                    'type',
                    'no_oracle_oid')
                    ->orderby('question_number','asc')
                    ->get());
    
                $data['questionnaire_count'] = count($data['questionnaire']);
                if(count($data['questionnaire']) != 0)
                {
                    foreach($data['questionnaire'] as $row)
                    {
                        
                        if($row->question_number < 10)
                        {
                            $row->details = encryptionController::decrypt($row->details);
                            if($row->question_number == 9)
                            {
                                $a =  explode("`",$row->details);
                                
                                $data['no_9_last_delivery_date'] = $a[0];
                                $data['no_9_pregnant'] =   str_replace('1','Yes',str_replace('0','No',$a[1]));
                                $data['no_9_months'] = $a[2];
                                $data['no_9_ama'] =  str_replace('1','Yes',str_replace('0','No',$a[3]));
                                $data['detail_9'] = $a[4];
                                
                            }
                        }
                    }
                }
    
                $data['questionnaire_other'] = Collect(DB::table('tbl_health_answer_other')
                    ->where('tbl_maf_iid', $maf_iid)
                    ->select('iid',
                    'tbl_maf_iid',
                    'others',
                    'name_physician',
                    'date_of_last_consultation',
                    'medication')
                    ->get());
    
                $data['questionnaire_other_count'] = count($data['questionnaire_other']);
                if(count($data['questionnaire_other']) != 0)
                {
                    foreach($data['questionnaire_other'] as $row)
                    {
                        $row->others = encryptionController::decrypt($row->others);
                        $row->name_physician = encryptionController::decrypt($row->name_physician);
                        $row->medication = encryptionController::decrypt($row->medication);
                        $time = strtotime($row->date_of_last_consultation);
                        $newformat = date('Y-m-d',$time);
                        $row->date_of_last_consultation = $newformat;
                    }
                }
            }
            else
            {
    
                $data['questionnaire'] = Collect(DB::table('tbl_health_answer')
                ->where('tbl_maf_iid', $maf_iid)
                ->select('iid',
                'tbl_maf_iid',
                'tbl_product_iid',
                'tbl_product_oracle_oid',
                'question_number',
                'yes_no',
                'details',
                'type',
                'no_oracle_oid')
                ->orderby('question_number','asc')
                ->get());
    
                $data['questionnaire_count'] = count($data['questionnaire']);
                if(count($data['questionnaire']) != 0)
                {
                    foreach($data['questionnaire'] as $row)
                    {
                        if($row->question_number < 10)
                        {
                            if($row->question_number < 6)
                            {
                                if($row->question_number == 3)
                                {
                                    $row->details = json_decode(encryptionController::decrypt($row->details),true);
                                }
                                else
                                {
                                    if($row->yes_no == 0)
                                    {
                                        $row->yes_no = "NO";
                                    }
                                    else
                                    {
                                        $row->yes_no = "YES";
                                    }
                                    $row->details = encryptionController::decrypt($row->details);
                                }
                            }
                        }
                        else
                        {
                            $row->details = encryptionController::decrypt($row->details);
                        }
                    }
                }
    
                $data['questionnaire_other'] = Collect(DB::table('tbl_health_answer_other')
                    ->where('tbl_maf_iid', $maf_iid)
                    ->select('iid',
                    'tbl_maf_iid',
                    'others',
                    'name_physician',
                    'date_of_last_consultation',
                    'medication')
                    ->get());
    
                $data['questionnaire_other_count'] = count($data['questionnaire_other']);
                if(count($data['questionnaire_other']) != 0)
                {
                    foreach($data['questionnaire_other'] as $row)
                    {
                        $row->others = encryptionController::decrypt($row->others);
                        $row->name_physician = encryptionController::decrypt($row->name_physician);
                        $row->medication = encryptionController::decrypt($row->medication);
                        $time = strtotime($row->date_of_last_consultation);
                        $newformat = date('Y-m-d',$time);
                        $row->date_of_last_consultation = $newformat;
                    }
                }
                $data['waiver'] = Collect(DB::table('tbl_waiver')
                ->where('tbl_maf_iid', $maf_iid)
                ->select('iid',
                'tbl_maf_iid',
                'waiver1',
                'waiver2',
                'waiver3',
                'waiver4',
                'details_2_3',
                'date_of_last_confinement',
                'name_of_hospital',
                'name_physician',
                'findings')
                ->get());
    
                $data['waiver_count'] = count($data['waiver']);
                if(count($data['waiver']) != 0)
                {
                    foreach($data['waiver'] as $row)
                    {
                        $row->details_2_3 = encryptionController::decrypt($row->details_2_3);
                        $row->name_of_hospital = encryptionController::decrypt($row->name_of_hospital);
                        $row->name_physician = encryptionController::decrypt($row->name_physician);
                        $row->findings = encryptionController::decrypt($row->findings);
                        if($row->date_of_last_confinement)
                        {
                            $time = strtotime($row->date_of_last_confinement);
                            $newformat = date('Y-m-d',$time);
                            $row->date_of_last_confinement = $newformat;
                        }
                    }
                }
    
            }    
        }
        //QUESTIONNAIRE------------------------------------------------------------------------------------------------------
        
        $data['plan_information'] = Collect(DB::table('tbl_maf_view')
        ->where('iid',$maf_iid)
        ->select('iid',
        'tbl_product_iid',
        'contract_provision',
        DB::raw('Case When a_type = 0 Then (select tbl_plan_alias.alias from tbl_plan_alias where tbl_plan_alias.iid = tbl_maf_view.tbl_plan_alias_iid)
                      When a_type = 1 Then Concat(\'PLAN \',plan_name) 
                      Else \'Invalid type\' end as plan_alias'),
        'age',
        'date_of_birth',
        'step',
        'type',
        'plan_name',
        DB::Raw('\'\' as plan'),
        'no_of_units',
        'insurable',
        DB::Raw('Case When insurable = 1 Then \' Not insurable\' When insurable = 0 Then \'Insurable\' else \'Invalid Value\' end as insurance'),
        DB::Raw('FORMAT(1st_yr_max_per_illness,2) as first_yr_max_per_illness'),
        DB::Raw('FORMAT(1st_yr_max_room_rate,2) as first_yr_max_room_rate'),
        DB::Raw('FORMAT(first_payment,2) as first_payment'),
        DB::Raw('(Select description from tbl_payment_option where iid = tbl_maf_view.payment_option) as payment_option'),
        DB::Raw('Case When tbl_bank_iid = 0 Then \'\'
                    Else (Select Concat(bank,\'(\',account_number,\')\') from tbl_bank_account where iid = tbl_maf_view.tbl_bank_iid ) End as bank'),
        DB::Raw('FORMAT(contract_price,2) as contract_price'),
        'spotcash_level',
        DB::Raw('Case When mode_of_payment = 0 Then \'SPOT CASH\'
                      When mode_of_payment = 1 Then \'QUARTERLY\'
                      When mode_of_payment = 2 Then \'SEMI-ANNUAL\'
                      When mode_of_payment = 3 Then \'ANNUAL\'
                      ELSE \'INVALID VALUE\' END as mode_of_payment'),
        'no_of_installments',
        DB::Raw('FORMAT(installment_amount,2) as installment_amount'))
        ->get());

        $data['plan_information_count'] = count($data['plan_information']);

        $data['third_party_determination'] = Collect(DB::table('tbl_third_party_determination')
        ->where('tbl_maf_iid',$maf_iid)
        ->select('tbl_maf_iid',
        DB::Raw('Case When no_1 = 0 Then \'NO\'
                      When no_1 = 1 Then \'YES\'
                      Else \'Invalid Values\' End as no_1'),
        DB::Raw('Case When no_2 = 0 Then \'NO\'
                      When no_2 = 1 Then \'YES\'
                      Else \'Invalid Values\' End as no_2'),
        'lastname',
        'firstname',
        'suffix',
        'middlename',
        'mother_maiden_name',
        'address_1',
        'address_2',
        'address_3',
        'address_4',
        'address_5',
        'relationship_to_policy_or_payor',
        'occupation',
        'nationality',
        'colrottp',
        'sss_gsis',
        'tax_number')
        ->get());

        $data['third_party_determination_count'] = count($data['third_party_determination']);
        
        if(count($data['third_party_determination']) != 0)
        {
            foreach($relationship as $rows)
            {
                if($rows['iid'] == $data['third_party_determination'][0]->relationship_to_policy_or_payor) 
                {
                    $data['third_party_determination'][0]->relationship_to_policy_or_payor = $rows['description'];
                }
            }
            $data['third_party_determination'][0]->lastname = encryptionController::decrypt($data['third_party_determination'][0]->lastname);
            $data['third_party_determination'][0]->firstname = encryptionController::decrypt($data['third_party_determination'][0]->firstname);
            $data['third_party_determination'][0]->suffix = encryptionController::decrypt($data['third_party_determination'][0]->suffix);
            $data['third_party_determination'][0]->middlename = encryptionController::decrypt($data['third_party_determination'][0]->middlename);
            $data['third_party_determination'][0]->mother_maiden_name = encryptionController::decrypt($data['third_party_determination'][0]->mother_maiden_name);
            $data['third_party_determination'][0]->address_1 = encryptionController::decrypt($data['third_party_determination'][0]->address_1);
            $data['third_party_determination'][0]->address_2 = encryptionController::decrypt($data['third_party_determination'][0]->address_2);
            $data['third_party_determination'][0]->address_3 = encryptionController::decrypt($data['third_party_determination'][0]->address_3);
            $data['third_party_determination'][0]->address_4 = encryptionController::decrypt($data['third_party_determination'][0]->address_4);
            $data['third_party_determination'][0]->address_5 = encryptionController::decrypt($data['third_party_determination'][0]->address_5);
            $data['third_party_determination'][0]->occupation = encryptionController::decrypt($data['third_party_determination'][0]->occupation);
            $data['third_party_determination'][0]->nationality = encryptionController::decrypt($data['third_party_determination'][0]->nationality);
            $data['third_party_determination'][0]->colrottp = encryptionController::decrypt($data['third_party_determination'][0]->colrottp);
            $data['third_party_determination'][0]->sss_gsis = encryptionController::decrypt($data['third_party_determination'][0]->sss_gsis);
            $data['third_party_determination'][0]->tax_number = encryptionController::decrypt($data['third_party_determination'][0]->tax_number);
        }


        print_r(json_encode($data));
    }
    public function approved_maf(Request $request)
    {
        $maf_iid = $request->input('maf_iid');
        $type = $request->input('type');
        $user_type = $request->input('user_type');
        $user_iid = $request->input('user_iid');

        //USER TYPE == 0 PIID
        //USER TYPE == 1 FINANCE

        // status == "PIID"
        // status_1 == "Finance"
        // status_2 == "integration"
        if($user_type == 0)
        {
            DB::table('tbl_maf')->where('iid',$maf_iid)->update(['change_by'=> $user_iid,'status'=>1]);
        }
        elseif($user_type == 1)
        {
            DB::table('tbl_maf')->where('iid',$maf_iid)->update(['change_by'=> $user_iid,'status_1'=>1]);
        }
        
        $integrate = integrationController::oramigration($maf_iid);
        
        if($integrate['status'] == "error_eshop")
        {
            $data['message'] = "Application has been approved.";
            $data['status'] = "success";
            print_r(json_encode($data));
        }
        elseif($integrate['status'] == "error")
        {
            print_r(json_encode($integrate));
        }
        else
        {
            print_r(json_encode($integrate));
        }
    }
    public function process_request_maf(Request $request)
    {
        $iid = $request->input('iid');
        $cnslrid = 5;
        // $cnslrid = 115558;
        
        // try
        // {
            $client = new Client();
            $response = $client->request('GET', encryptionController::get_url(0).$cnslrid, ['verify' => false]);
            $response = json_decode($response->getBody(), true);

            if($response['status'] == "success")
            {
                $data['message'] = $response['message'];
                // $data['status'] = $response['status'];
                $data['status'] = "success";

                $maf_number = $response['mafno'];

                $update_maf = DB::table('tbl_maf')
                ->where('iid',$iid)
                ->update([
                    'reference_number_1'=> $maf_number]);
                
                print_r(json_encode($data));

            }
            else
            {
                $data['message'] = $response['message'];
                // $data['status'] = $response['status'];
                $data['status'] = "danger";
                print_r(json_encode($data));
            }
        // }
        // catch (GuzzleException $exception) 
        // {
        //     $responseBody = $exception->getResponse()->getBody(true);
        //     $responsedata = json_decode($responseBody,true);
        
        //     $data['message'] = $responsedata['error'];
        //     $data['status'] = "error";
        //     $data['info'] = "danger";
        
        //     print_r(json_encode($data));
        // }
    }
}