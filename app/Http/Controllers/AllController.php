<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\categorieArticle;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Info;
use App\Models\Tag;
use Illuminate\Http\Request;


class AllController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function rooms()
    {
        return view('template.pages.rooms');
    }
    public function team()
    {
        return view('template.pages.team');
    }
    public function gallery()
    {
        // dd(Gallery::first()->categories);
        $gallery = Gallery::all();
        return view('template.pages.gallery', compact("gallery"));
    }
    public function contact()
    {
        $infos = Info::first();
        return view('template.pages.contact', compact("infos"));
    }


    //for blog pages --------
    public function blog()
    {
        $blog = Article::all();
        $tag = Tag::all();
        $categoryArticle = categorieArticle::all();
        $blogLast = Article::latest()->take(3)->get();
        return view("template.pages.blog",compact("tag","categoryArticle", "blog", "tag", "blogLast"));
    }

    // LOGIQUE pour la barre de recherche
    public function search(Request $request)
    {

        $data = $request->data;
        $blog= Article::where('title', 'like', "%$data%")
                ->get();

    // $blog = Article::all();
    $tag = Tag::all();
    $categoryArticle = categorieArticle::all();
    $blogLast = Article::latest()->take(3)->get();

    return view("template.pages.blog",compact("blog","tag","categoryArticle","blogLast"));

    }
    public function searchCategorie($id)
    {
        $blog = Article::where("categorie_article_id",$id)->get();
        $tag = Tag::all();
        $categoryArticle = categorieArticle::all();
        $blogLast = Article::latest()->take(3)->get();


        // dd($projetTout);
        return view("template.pages.blog",compact("categoryArticle","blog","tag","blogLast"));
    }

    public function tagCategorie($id)
    {

        $tagiD = Tag::find($id);
        $blog = $tagiD->articles;
        $tag = Tag::all();
        $categoryArticle = categorieArticle::all();
        $blogLast = Article::latest()->take(3)->get();


        // dd($projetTout);
        return view("template.pages.blog",compact("categoryArticle","blog","tag","blogLast"));
    }
    public function blogPost($id)
    {
       $blog = Article::find($id);
       // dd($projetTout);
       $comment = Comment::all();

       return view("template.pages.blogpost",compact("blog","comment"));
    }

}


