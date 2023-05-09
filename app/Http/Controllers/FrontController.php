<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\VArticle;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{

    public function welcome()
    {
        return view('front.home');
    }

    public function listCategorie(Request $request)
    {
        $current_page=$request->query('page');
        $cname="categorie_".strval($current_page);
        $cur_page=intval($current_page);
        $data = Cache::get($cname);
        if($data===null){
            Cache::put($cname,Categorie::paginate(3, ['*'], 'page', $cur_page));
            $data = Cache::get($cname);
        }
        $categorie=$data;
        return view('front.categories',compact('categorie'));
    }

    public function listArticle(Request $request)
    {
        $current_page=$request->query('page');
        $cname="article_front_".strval($current_page);
        $cur_page=intval($current_page);
        $data = Cache::get($cname);
        if($data===null){
            Cache::put($cname,VArticle::paginate(6, ['*'], 'page', $cur_page));
            $data = Cache::get($cname);
        }
        $article=$data;
        // $article=VArticle::paginate(6);
        
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
