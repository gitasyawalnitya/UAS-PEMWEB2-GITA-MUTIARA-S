<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'title'=>'required',
                'body'=>'required',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        $validate['user_id'] = Auth::user()->id;
        $image = $request->file('image');
        $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('images', $imageName, 'public');
        $validate['image'] = $imagePath;

        $article = new Article();
        $article->create($validate);
        return redirect(route('articles'))->with('success', 'Create new article is success.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate(
            [
                'title'=>'required',
                'body'=>'required',
                'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $validate['user_id'] = Auth::user()->id;

        $article = Article::find($id);

        if ($request->file('image')) {
            Storage::delete('public/'.$article->image);

            $image = $request->file('image');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images', $imageName, 'public');
            $validate['image'] = $imagePath;
        }

        $article->update($validate);
        return redirect(route('articles'))->with('success', 'Create new article is success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        Storage::delete('public/'.$article->image);
        $article->delete();

        return redirect(route('articles'))->with('success', 'Delete article is success.');
    }

    public function pdf($id)
    {
        $data = Article::find($id);
        $pdf = Pdf::loadView('articles.pdf', compact('data'));
        return $pdf->download('article.pdf');
    }
}
