<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Traits\ApiResponser;
use App\Models\hotels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\city;
use Illuminate\Support\Facades\Validator;

class HotelsController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        // return hotels::all();
        $hotels= hotels::with('city')->get();
        return  $this->success($hotels,$message='Hotels');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data= array();
        $data['Hotel_name'] = $request->Hotel_name;
        $data['city_id'] = $request->city_id ;
        $data['Total_price'] = $request->Total_price ;
        $data['rating'] = $request->rating ;
        $data['type'] = $request->type ;
        $data['facilities']= $request->facilities ;
        $data['owner_name']= $request->owner_name ;
        $data['email']= $request->email ;
        $data['password']= bcrypt(request('password'));
        $data['phone_number']= $request->phone_number ;
        $data['number_of_rooms']= $request->number_of_rooms ;
        $data['image']= $request->image ;
        $data['application_documents']= $request->application_documents ;


        $insert = DB::table('hotels')->insert($data);
        return  $this->success($data,$message='Hotels');

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
     * @param  \App\Models\hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function show(hotels $hotels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function edit(hotels $hotels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hotels $hotels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hotels  $hotels
     * @return \Illuminate\Http\Response
     */
    public function destroy(hotels $hotels)
    {
        //
    }
}
