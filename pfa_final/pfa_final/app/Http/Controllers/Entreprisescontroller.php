<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Entreprisescontroller extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'company_name'=>'required',
            'land_line'=>'required|min:10|max:10',
            'description'=>'required',
            'adress'=>'required',
            'logo_path'=>'required'
        ]);


        //$request->file('logo_path')->move(public_path('images'),$request->file('logo_path')->getClientOriginalName());
        //$logo_path = 'images'.'\\'.$request->file('logo_path')->getClientOriginalName();







        $company_name = $request->input('company_name');
        $land_line = $request->input('land_line');
        $description = $request->input('description');
        $user_id = $request->input('user_id');
        $adress = $request->input('adress');

        //$request->file('logo_path')->move(public_path('images/'.$company_name.'/'),$request->file('logo_path')->getClientOriginalName());
       // $logo_path = 'images\\'.$company_name.'\\'.$request->file('logo_path')->getClientOriginalName();


        $request->file('logo_path')->move(public_path('images/'.$company_name.'/'),$request->file('logo_path')->getClientOriginalName());
        $logo_path = 'images\\'.$company_name.'\\'.$request->file('logo_path')->getClientOriginalName();



        $request->file('extra_docs')->move(public_path('Enterprises_files_to_check/'.$company_name.'/'),$request->file('extra_docs')->getClientOriginalName());
        $extra_docs = 'Enterprises_files_to_check\\'.$company_name.'\\'.$request->file('extra_docs')->getClientOriginalName();



        $data = array('company_name'=> $company_name,'land_line'=>$land_line,'description'=>$description,'logo_path'=>$logo_path,'adress'=>$adress,'user_id'=>$user_id,'extra_docs'=>$extra_docs,'created_at'=>now(),'updated_at'=>now());

        DB::table('entreprises')->insert($data);

        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
