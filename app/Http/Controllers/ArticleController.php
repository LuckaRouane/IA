<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Models\Categorie;
use App\Models\Article;
use App\Models\VArticle;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    
    public static function getSlug($title)
    {
        return Str::slug($title);
    }

    public function toForm()
    {
        if(AdminController::isLogged()){
            $data=Cache::get('all_categorie');
            if($data===null){
                Cache::put('all_categorie', Categorie::all());
                $data=Cache::get('all_categorie');
            }
            $categorie=$data;
            // $categorie = Categorie::all();
            return view('article_form', compact('categorie'));
        }else{
            return view('login');
        }
    }

    public function toFormWithError($erreur)
    {
        if(AdminController::isLogged()){
            $data=Cache::get('all_categorie');
            if($data===null){
                Cache::put('all_categorie', Categorie::all());
                $data=Cache::get('all_categorie');
            }
            $categorie=$data;
            // $categorie = Categorie::all();
            return view('article_form',[
                'categorie'=>$categorie,
                'erreur'=>$erreur
            ]);
        }else{
            return view('login');
        }
    }

    public function save(Request $request){
        if($request->resume==null) return $this->toFormWithError("Résumé requis");
        if($request->idcategorie==null) return $this->toFormWithError("Veuillez choisir une catégorie");
        if($request->contenu==null) return $this->toFormWithError("Contenu requis");
        if($request->visuel==null) return $this->toFormWithError("Image requis");
        try {
            DB::beginTransaction();
            $article=new Article();
            $article->resume=$request->resume;
            $article->idcategorie=$request->idcategorie;
            $article->contenu=$request->contenu;
            $article->visuel=$request->visuel;
            $article->save();
            DB::commit();
            Cache::forget('article');
            $success="Insertion de l'article \"".strval($request->resume)."\" réussi";
            return AdminController::acceuilWithSuccess($success);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function toList(Request $request)
    {
        if(AdminController::isLogged()){
            // $article=VArticle::paginate(6);
            $current_page=$request->query('page');
            $cname="article_".strval($current_page);
            $cur_page=intval($current_page);
            $data = Cache::get($cname);
            if($data===null){
                Cache::put($cname,VArticle::paginate(6, ['*'], 'page', $cur_page));
                $data = Cache::get($cname);
            }
            $article=$data;
            $titres=[];
            foreach($article as $a){
                array_push($titres, ArticleController::getSlug($a->resume));
            }
            return view('admin_list_article', compact('article','titres'));
        }else{
            return view('login');
        }
    }

    public function updateForm($idarticle)
    {
        if(AdminController::isLogged()){
            $article=VArticle::where('idarticle','=',$idarticle)->first();
            // $categorie=Categorie::all();
            $data=Cache::get('all_categorie');
            if($data===null){
                Cache::put('all_categorie', Categorie::all());
                $data=Cache::get('all_categorie');
            }
            $categorie=$data;
            return view('admin_article_update', compact('article','categorie'));
        }else{
            return view('login');
        }
    }

    public function updateFormSuccess($idarticle, $success)
    {
        if(AdminController::isLogged()){
            $article=VArticle::where('idarticle','=',$idarticle)->first();
            // $categorie=Categorie::all();
            $data=Cache::get('all_categorie');
            if($data===null){
                Cache::put('all_categorie', Categorie::all());
                $data=Cache::get('all_categorie');
            }
            $categorie=$data;
            return view('admin_article_update', compact('article','categorie','success'));
        }else{
            return view('login');
        }
    }

    public function update(Request $request)
    {
        if($request->resume!=null || $request->idcategorie!=null || $request->contenu!=null || $request->visuel!=null)
        {
            try {
                DB::beginTransaction();
                $article=Article::where('idarticle','=',$request->idarticle)->first();
                if($request->resume!=null) $article->resume=$request->resume;
                if($request->idcategorie!=null) $article->idcategorie=$request->idcategorie;
                if($request->contenu!=null) $article->contenu=$request->contenu;
                if($request->visuel!=null) $article->visuel=$request->visuel;
                $article->update();
                DB::commit();
                //Delete article from cache
                $ar=Article::all();
                $ac=count($ar);
                $aci=intval($ac/6);
                if($aci>1){
                    for ($i=1; $i <=$aci ; $i++) { 
                        $cname="article_".strval($i);
                        $cfrontname="article_front_".strval($i);
                        Cache::forget($cname);
                        Cache::forget($cfrontname);
                    }
                }else{
                    Cache::forget('article_1');
                }

                return $this->updateFormSuccess($request->idarticle, "Modification réussi");
            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }else{
            return $this->updateForm($request->idarticle);
        }
    }


}
