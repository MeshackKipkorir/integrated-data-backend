<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenders;
use App\Http\Resources\TendersResource;

class tendersApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return TendersResource::collection(Tenders::all());
    }

    public function featured($id)
    {
        //
        return TendersResource::collection(Tenders::take($id)->get());
    }
    public function singleTender($id)
    {
        //
        return Tenders::find($id);
    }

    public function filterTenders($keyword){
        return Tenders::where('type',$keyword)->get();
    }

    public function latestTenders(){
        return Tenders::orderBy('created_at','desc')->take(5)->get();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
