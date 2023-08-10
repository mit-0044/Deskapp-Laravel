<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Faker\Core\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::get();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country = DB::table('country')->get();
        return view('employees.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreEmployeeRequest $req)
    {
        do {
            $refrence_id = mt_rand(1000000000, 9999999999);
        } while (Employee::where('emp_id', $refrence_id)->exists());

        $ext = $req->file('emp_image')->getClientOriginalExtension();
        $req->file('emp_image')->storeAs('public/emp_images', $refrence_id . '.' . $ext, 'local');
        Employee::create([
            'emp_id' => $refrence_id,
            'emp_fname' => $req->emp_fname,
            'emp_midname' => $req->emp_midname,
            'emp_surname' => $req->emp_surname,
            'emp_email' => $req->emp_email,
            'emp_mobile' => $req->emp_mobile,
            'emp_gender' => $req->emp_gender,
            'emp_blood_group' => $req->emp_blood_group,
            'emp_dob' => $req->emp_dob,
            'emp_adharcard' => $req->emp_adharcard,
            'emp_pancard' => strtoupper($req->emp_pancard),
            'emp_emr_name_1' => $req->emp_emr_name_1,
            'emp_emr_mobile_1' => $req->emp_emr_mobile_1,
            'emp_emr_relationship_1' => $req->emp_emr_relationship_1,
            'emp_emr_name_2' => $req->emp_emr_name_2,
            'emp_emr_mobile_2' => $req->emp_emr_mobile_2,
            'emp_emr_relationship_2' => $req->emp_emr_relationship_2,
            'emp_address_line_1' => $req->emp_address_line_1,
            'emp_address_line_2' => $req->emp_address_line_2,
            'emp_country' => $req->emp_country,
            'emp_state' => $req->emp_state,
            'emp_city' => $req->emp_city,
            'emp_pincode' => $req->emp_pincode,
            'emp_image' => 'storage/emp_images/' . $refrence_id . '.' . $ext,
        ]);

        return redirect(route('employee.index'))->with('add', 'Application has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $emp = Employee::where('emp_id', '=', $employee->emp_id)->get();
        $country = DB::table('country')->get();
        $state = DB::table('state')->where('countryid', '=', $emp[0]->emp_country)->get();
        $city = DB::table('city')->where('stateid', '=', $emp[0]->emp_state)->get();
        $employee = $emp;
        return view('employees.edit', compact(['employee', 'country', 'state', 'city']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $req, Employee $employee)
    {
        if ($oldImage = $req->emp_image) {
            Storage::disk('public')->delete($oldImage);
            $ext = $employee->file('emp_image')->getClientOriginalExtension();
            Employee::where('emp_id', '=', $employee->emp_id)->update([
                'emp_image' => 'storage/emp_images/' . $employee->emp_id . '.' . $ext,
            ]);
        }
        Employee::where('emp_id', '=', $employee->emp_id)->update([
            'emp_fname' => $req->emp_fname,
            'emp_midname' => $req->emp_midname,
            'emp_surname' => $req->emp_surname,
            'emp_email' => $req->emp_email,
            'emp_mobile' => $req->emp_mobile,
            'emp_gender' => $req->emp_gender,
            'emp_blood_group' => $req->emp_blood_group,
            'emp_dob' => $req->emp_dob,
            'emp_adharcard' => $req->emp_adharcard,
            'emp_pancard' => $req->emp_pancard,
            'emp_emr_name_1' => $req->emp_emr_name_1,
            'emp_emr_mobile_1' => $req->emp_emr_mobile_1,
            'emp_emr_relationship_1' => $req->emp_emr_relationship_1,
            'emp_emr_name_2' => $req->emp_emr_name_2,
            'emp_emr_mobile_2' => $req->emp_emr_mobile_2,
            'emp_emr_relationship_2' => $req->emp_emr_relationship_2,
            'emp_address_line_1' => $req->emp_address_line_1,
            'emp_address_line_2' => $req->emp_address_line_2,
            'emp_country' => $req->emp_country,
            'emp_state' => $req->emp_state,
            'emp_city' => $req->emp_city,
            'emp_pincode' => $req->emp_pincode,
        ]);
        return redirect(route('employee.index'))->with('update', 'Employee details have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
