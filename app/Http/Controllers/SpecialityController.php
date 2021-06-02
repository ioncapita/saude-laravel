<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('specialities.index', ['specialities' => Speciality::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = $this->validateInputs($input);

        if($validator->fails()){
            return redirect()->route('specialities.index')->withErrors($validator->errors());
        }

        $speciality = new Speciality();
        $speciality->name = $input['name'];
        $speciality->save();

        return redirect()->route('specialities.index')->with("message", "Especialidade $speciality->id inserida com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
        var_dump($speciality);
        return view('specialities.show', ["speciality" => $speciality]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $speciality)
    {
        return view('specialities.edit', ["speciality" => $speciality]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speciality $speciality)
    {
        $input = $request->all();
        $validator = $this->validateInputs($input);

        if($validator->fails()){
            return redirect()->route('specialities.index')->withErrors($validator->errors());
        }

        $speciality->name = $input['name'];
        try{
            $speciality->save();
        }catch(Exception $e){
            return redirect()->route('specialities.index')->withErrors("Ocorreu um erro!");
        }

        return redirect()->route('specialities.index')->with("message", "Especialidade $speciality->id inserida com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speciality $speciality)
    {
        Speciality::destroy($speciality->id);
        return redirect()->route('specialities.index')->with('message', "Especialidade eliminada com sucesso!");
    }

    private function validateInputs($input){

        $rules = [
            'name' => 'required',
        ];

        return Validator::make($input, $rules);
    }
}
