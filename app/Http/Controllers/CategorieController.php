<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use Throwable;
use App\Http\Controllers\ArticleController;

class CategorieController extends Controller
{
    public function listBO()
    {
        if(AdminController::isLogged()){
            $categorie = Categorie::paginate(3);
            $titres=[];
            foreach($categorie as $c){
                array_push($titres, ArticleController::getSlug($c->nom));
            }
            return view('admin_categorie_list', compact('categorie','titres'));
        }else{
            return view('login');
        }
    }

    public function toForm()
    {
        if(AdminController::isLogged()){
            return view('categorie_form');
        }else{
            return view('login');
        }
    }

    public function toFormWithError($erreur)
    {
        if(AdminController::isLogged()){
            return view('categorie_form',compact('erreur'));
        }else{
            return view('login');
        }
    }

    public function save(Request $request)
    {
        if($request->nom==null) return $this->toFormWithError("Nom requis");
        if($request->description==null) return $this->toFormWithError("Description requis");
        try {
            DB::beginTransaction();
            $categorie = new Categorie();
            $categorie->nom=$request->nom;
            $categorie->description=$request->description;
            $categorie->save();
            DB::commit();
            $success="Insertion de la catégorie \"".strval( $request->nom)."\" réussie";
            return AdminController::acceuilWithSuccess($success);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function toupdate($idcategorie,$titre)
    {
        if(AdminController::isLogged()){
            $categorie = Categorie::where('idcategorie','=',$idcategorie)->first();
            return view('categorie_modif',compact('categorie','titre'));
        }else{
            return view('login');
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $categorie = Categorie::where('idcategorie','=',$request->idcategorie)->first();
            $categorie->nom=$request->nom;
            $categorie->description=$request->description;
            $categorie->update();
            DB::commit();
            return AdminController::acceuil();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


}
