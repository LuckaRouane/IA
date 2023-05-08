<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\VArticle;
use App\Http\Controllers\ArticleController;

class FrontController extends Controller
{

    public function welcome()
    {
        return view('front.home');
    }

    public function listCategorie()
    {
        $categorie = Categorie::paginate(3);
        return view('front.categories',compact('categorie'));
    }

    public function listArticle()
    {
        $article=VArticle::paginate(6);
        $titres=[];
        foreach($article as $a){
            array_push($titres, ArticleController::getSlug($a->resume));
        }
        return view('front.articles',compact('article','titres'));
    }

    public function ficheArticle($idarticle,$titre)
    {
        $article=VArticle::where('idarticle','=',$idarticle)->first();
        return view('front.ficheArticle',compact('article','titre'));
    }

    

}
