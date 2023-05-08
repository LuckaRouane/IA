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

class ArticleController extends Controller
{
    
    public static function getSlug($title)
    {
        return Str::slug($title);
    }

    public function toForm()
    {
        if(AdminController::isLogged()){
            $categorie = Categorie::all();
            return view('article_form', compact('categorie'));
        }else{
            return view('login');
        }
    }

    public function toFormWithError($erreur)
    {
        if(AdminController::isLogged()){
            $categorie = Categorie::all();
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
            $success="Insertion de l'article \"".strval($request->resume)."\" réussi";
            return AdminController::acceuilWithSuccess($success);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function toList()
    {
        if(AdminController::isLogged()){
            $article=VArticle::paginate(6);
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
            $categorie=Categorie::all();
            return view('admin_article_update', compact('article','categorie'));
        }else{
            return view('login');
        }
    }

    public function updateFormSuccess($idarticle, $success)
    {
        if(AdminController::isLogged()){
            $article=VArticle::where('idarticle','=',$idarticle)->first();
            $categorie=Categorie::all();
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
