<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return $doctors;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = array(array('name'=> 'required|min:5'));
        $validator = Validator()->make(
            $request->input(),
            array('name' => 'required|min:5', 'email' => 'required', 'phone_number' => 'required', 'specialization' => 'required', 'registration' => 'required', 'password' => 'required')
        );
        if ($validator->fails())
        {
            return Redirect::to('signup')->withErrors($validator);
        }

        Doctor::unguard();
        Doctor::create($request->except(('_token')));
        Doctor::reguard();

        return Redirect::to('signup')->with('success', 'Doctor Successfully Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function login(Doctor $doctor){
        return Redirect::to('/prescription');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $doctor = Doctor::find(6);
        $prescriptions = Prescription::where("doctors_id", $doctor->id)->get();
//        return $prescription;
        return view("dashboard")->with(['doctor'=> $doctor, 'prescriptions'=> $prescriptions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
