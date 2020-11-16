<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Psckjobs;
use App\Http\Resources\jobsResource;

class JobsApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return jobsResource::collection(Psckjobs::all());
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
    public function singleJob($id)
    {
        //
        return Psckjobs::find($id);
    }

    public function filterJobs($keyword)
    {
        return Psckjobs::where('department',$keyword)->get();
    }

    public function latestJobs(){
        return Psckjobs::orderBy('created_at','desc')->take(5)->get();
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
