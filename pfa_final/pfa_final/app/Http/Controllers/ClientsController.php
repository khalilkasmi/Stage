<?php

namespace App\Http\Controllers;

use App\models\client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
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
            'first_name'=>'required',
            'last_name'=>'required',
            'identity_card'=>'required|min:7|max:7',
            'birth_date'=>'required|before:01/01/1998',
            'driver_licence_date'=>'required|before:01/01/2017',
            'avatar_path'=>'required',
            'driver_licence_path'=>'required',
            'identity_card_path'=>'required'
        ],[
            'birth_date.before' => 'You must be over 21.',
            'driver_licence_date.before' => 'You should have at least 2 years of driving experience.'
        ]);


            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $identity_card = $request->input('identity_card');
            $birth_date = $request->input('birth_date');
            $driver_licence_date =  $request->input('driver_licence_date');
            $user_id = $request->input('user_id');

            $request->file('avatar_path')->move(public_path('/images/'.$identity_card.'/'),$request->file('avatar_path')->getClientOriginalName());
            $avatar_path = '\\images\\'.$identity_card.'\\'.$request->file('avatar_path')->getClientOriginalName();

        $request->file('driver_licence_path')->storeAs('images/'.$identity_card.'/',$identity_card.'_driver_licence'.$request->file('driver_licence_path')->getClientOriginalName(),'khalil');
        $driver_licence_path = 'images\\'.$identity_card.'_driver_licence___'.$request->file('driver_licence_path')->getClientOriginalName();

        //$request->file('identity_card_path')->move(public_path('images/'.$identity_card,$identity_card.'identity_card'),$request->file('identity_card_path')->getClientOriginalName());
        $request->file('identity_card_path')->storeAs('images/'.$identity_card.'/',$identity_card.'_identity_card_path'.$request->file('identity_card_path')->getClientOriginalName(),'khalil');
        $identity_card_path = 'images\\'.$identity_card.'_identity_card_path___'.$request->file('identity_card_path')->getClientOriginalName();

        $data = array('first_name'=>$first_name,
                            'last_name'=>$last_name,
                            'identity_card'=>$identity_card,
                            'birth_date'=>$birth_date,
                            'driver_licence_date'=>$driver_licence_date,
                            'avatar_path'=>$avatar_path,
                            'driver_licence_path'=>$driver_licence_path,
                            'identity_card_path'=>$identity_card_path,
                            'user_id'=>$user_id,
                            'created_at'=>now(),
                            'updated_at'=>now()

        );

            DB::table('clients')->insert($data);
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
        $client = client::find($id);
        return view('Client.client_show')->with('client',$client);
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
