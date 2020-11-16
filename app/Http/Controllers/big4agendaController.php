<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Big4agenda;

class big4agendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('dashboard.big4agenda.big4agenda',['big4agendaArticles' => Big4agenda::paginate(12),'articlesCount'=> Big4agenda::count()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.big4agenda.create');
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
        $big4agendaArticles = new Big4agenda();
        $this->validate($request,[
          'title' =>'required',
          'excerpt'=>'required',
          'content'=>'required'
        ]);

        $big4agendaArticles->title = request('title');
        $big4agendaArticles->excerpt = request('excerpt');
        $big4agendaArticles->content = request('content');

        $big4agendaArticles->Save();
        return redirect()->route('big4agenda');
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
        return view('dashboard.big4agenda.edit',['article'=>Big4agenda::find($id)]);
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
        $this->validate($request,[
          'title' => 'required',
          'excerpt' => 'required',
          'content' => 'required'
        ]);

        $big4agendaArticles = Big4agenda::find($id);

        $big4agendaArticles->title = $request->input('title');
        $big4agendaArticles->excerpt = $request->input('excerpt');
        $big4agendaArticles->content = $request->input('content');

        $big4agendaArticles->save();
        return redirect()->route('big4agenda');
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
        Big4agenda::find($id)->delete();
        return redirect()->route('big4agenda');
    }
}
