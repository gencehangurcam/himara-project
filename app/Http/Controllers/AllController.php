<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Carousel;
use App\Models\categorieArticle;
use App\Models\categorieRoom;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Info;
use App\Models\Room;
use App\Models\Service;
use App\Models\Tag;
use App\Models\tagRoom;
use App\Models\Team;
use App\Models\Video;
use Illuminate\Http\Request;


class AllController extends Controller
{
    public function home()
    {
        $categories = categorieRoom::all();
        $serviceAll = Service::all();
        $roomAll = Room::all();
        // $categoryRoom = categorieRoom::all();
        $imageAll = Gallery::all();
        $blogAll = Article::all();
        $infoAll = Info::first();
        $video = Video::first();
        $carousel = Carousel::all();
        $comments = Comment::inRandomOrder()->take(9)->get();

        return view("home", compact("serviceAll", "roomAll", "imageAll", "blogAll", "infoAll", "video", "carousel", 'comments',"categories"));
    }
    public function rooms()
    {
        return view('template.pages.rooms');
    }
    public function team()
    {

        $team = Team::where("fonction_id","!=",1)->latest()->take(8)->get();
        $houseKeeper = Team::where("fonction_id",1)->first();

        return view('template.pages.team',compact("team","houseKeeper"));
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
    public function videosDisplay()
    {
        $video = Video::first();
        return view("admin.video.index", compact("video"));
    }

    public function reservRoom()
    {
        $categories = categorieRoom::all();
        $offers = Room::inRandomOrder()->take(3)->get();
        return view("pages.bookingform", compact('categories', 'offers'));
    }

    public function roomslist()
    {
        // $roomListAll = Room::all();
        $tagRoom = tagRoom::all();
        $categoryRoom = categorieRoom::all();
        $roomListAll = Room::orderBy("created_at","desc")->paginate(2);

        return view("pages.roomslist", compact("roomListAll", "tagRoom", "categoryRoom"));
    }

}


