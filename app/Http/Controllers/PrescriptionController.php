<?php

namespace App\Http\Controllers;

use App\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator()->make($request->input(),
            array('patientName'=> 'required', 'patientAge' => 'required', 'patientGender' => 'required'));
        if ($validator->fails())
        {
            return Redirect::to('prescription')->withErrors($validator);
        }
        $prescription = new Prescription();
        $prescription->doctors_id = random_int(1,5);
        $prescription->patients_id = random_int(1,3);
        $prescription->medicine = $request->input('medicine');
        $prescription->diagnosis = $request->input('diagnosis');
        $prescription->advice = $request->input('advice');
        $prescription->symptoms = $request->input('symptoms');
        if($prescription->save()){
          return Redirect::back()->with('success', "prescription added");
        }
        return "error";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription, $id)
    {
        //
        $data = $prescription->find($id);
//        return $data;
        return view('edit-prescription')->with('prescription', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
