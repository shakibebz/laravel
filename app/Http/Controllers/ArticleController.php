<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));

    }

    public function index()
    {
        //  $articles = DB::table('articles')->get();
        $articles = Article::paginate(6);
        $categories = Category::all();
        return view('articles.index', compact('articles' , 'categories'));

    }

    public function update(Request $request, $id)
    {
        $title = $request->title;
        $body = $request->body;

        DB::table('articles')->where('id', $id)->update(

            ['body' => $body,
                'title' => $title,

            ]
        );
        return redirect('/articles');
    }

    public function edit($id)
    {
        $articles = Article::find($id);
        $categories = Category::all();
        //$article = DB::table('articles')->find($id);
        return view('articles.edit', compact('articles', 'categories'));

    }

    public function store(Request $request)
    {

        $articles = new Article();
        $articles->title = $request->title;
        $articles->status = $request->status;
        $articles->body = $request->body;
        $articles->save();

        //save category//

        $articles->categories()->sync($request->categories);

        //save image//

        $name= 'article-'.$articles->id.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('images'), $name);
        $articles->image= $name;
        $articles->save();
        return back();

        /*    $title = $request->title;
            $body = $request->body;

            DB::table('articles')->insert(

                ['body' => $body,
                    'title' => $title,

                ]
            );*/

    }

    public function destroy($id)
    {
        $articles = Article::find($id)->delete();
        // DB::table('articles')->where('id', $id)->delete();
        return back();
    }

    public function storeCm(Request $request, $articleId)
    {
        $article = Article::find($articleId);
        $article->comments()->create([
            'author' => $request->author,
            'body' => $request->body
        ]);
        $article->save();
        return back();
    }
}
