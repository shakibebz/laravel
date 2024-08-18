<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use http\Env\Response;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $articles = Article::orderBy('id', 'DESC')->paginate(2);
        return response()->json($articles, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $this->getValidationFactory()->make($request->all(),
            [
                'body' => 'required',
                'image' => 'required|mimes:jpeg,png'
            ]);

        if ($validation->fails()) {
            return \response()->json(['message' => 'Invalid Data'], 400);
        }

        $articles = new Article();
        $articles->title = $request->title;
        $articles->body = $request->body;


        if($articles->save())
        {
            $articles->categories()->sync($request->categories);

           $name= 'article-'.$articles->id.'.'.$request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path('images'), $name);
            $articles->image= $name;
            $articles->save();


            return \response(['message' => 'saved successfully'], 200);
        }

        else
            return 'Not Saved!';

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);
        if (!$article) {
            return \response()->json(['message' => 'Not Found'], 200);
        }
        $data =
            [
                'id' => $article->id,
                'title' => $article->title,
                'categories' => $article->categories,
                'comments' => $article->comments
            ];
        return response()->json($data, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $this->getValidationFactory()->make($request->all(),
            [
                'body' => 'required'
            ]);

        if ($validation->fails()) {
            return \response()->json(['message' => 'Invalid Data'], 400);
        }

        $articles = Article::find($id);
        $articles->title = $request->title;
        $articles->body = $request->body;

        if($articles->save())
        {
            $articles->categories()->sync($request->categories);
            return \response(['message' => 'saved successfully'], 200);
        }

        else
            return 'Not Saved!';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::find($id)->delete;
        return \response(['message' => 'Deleted successfully'], 200);
    }

    public function storeCm(Request $request, $articleId)
    {

        $article = Article::find($articleId);
        $article->comments()->create([
            'author' => $request->author,
            'body' => $request->body
        ]);
        $article->save();
        return \response(['message' => 'CM saved successfully'], 200);
    }
}
