<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counties;


class countiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.counties.counties',['countiesArticles' => Counties::paginate(12),'articlesCount'=> Counties::count()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.counties.create');
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
        $this->validate($request,
      [
        'title'=>'required',
        'excerpt'=>'required',
        'content'=>'required'
      ]);

      $countiesArticles = new Counties();

      $countiesArticles->title = request('title');
      $countiesArticles->excerpt = request('excerpt');
      $countiesArticles->content = request('content');

      $countiesArticles->save();
      return redirect()->route('counties');
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
        return view('dashboard.counties.edit',['article' => Counties::find($id)]);
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

        $this->validate($request,[
          'title' => 'required',
          'excerpt' => 'required',
          'content' => 'required'
        ]);

        $countiesArticles = Counties::find($id);

        $countiesArticles->title = $request->input('title');
        $countiesArticles->excerpt = $request->input('excerpt');
        $countiesArticles->content = $request->input('content');

        $countiesArticles->save();
        return redirect()->route('counties');

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
        Counties::find($id) -> delete();
        return redirect()->route('counties');
    }
}
