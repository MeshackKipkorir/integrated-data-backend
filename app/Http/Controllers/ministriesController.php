<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministries;
class ministriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  view('dashboard.ministries.ministries',['ministriesArticles' => Ministries::paginate(12),'articlesCount'=>Ministries::count()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.ministries.create');
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
        $ministriesArticles = new Ministries();
        $this->validate($request,[
          'title' =>'required',
          'excerpt'=>'required',
          'content'=>'required'
        ]);

        $ministriesArticles->title = request('title');
        $ministriesArticles->excerpt = request('excerpt');
        $ministriesArticles->content = request('content');

        $ministriesArticles->Save();
        return redirect()->route('ministries');
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
        return view('dashboard.ministries.edit',['article' => Ministries::find($id),'articlesCount'=> Ministries::count()]);
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

        $ministriesArticles = Ministries::find($id);

        $ministriesArticles->title = $request->input('title');
        $ministriesArticles->excerpt = $request->input('excerpt');
        $ministriesArticles->content = $request->input('content');
        $ministriesArticles->save();
        return redirect()->route('ministries');
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
        Ministries::find($id)->delete();
        return redirect()->route('ministries');
    }
}
