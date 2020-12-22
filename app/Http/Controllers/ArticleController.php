<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Article::all();
        return view('article.index')->with(['list'=>$list, 'modelname'=>'article']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create')->with(['modelname'=>'article']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|unique:articles|max:255',
             'content'=> 'required'
        ]);
        $user = Auth::user();
        $model = $user->articles()->create($request->except('_method', '_token'));
        return redirect()->route('article.edit', [$model]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Article::findOrFail($id);
        return view('article.show')->with(['item'=>$item, 'modelname'=>'article']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Article::findOrFail($id);
        return view('article.edit')->with(['item'=>$item, 'modelname'=>'article']);
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
        (Article::findOrFail($id))->update($request->except('_method', '_token'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();
        return redirect()->back();
    }
}
