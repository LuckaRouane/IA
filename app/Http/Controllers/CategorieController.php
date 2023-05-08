<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use Throwable;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Cache;

class CategorieController extends Controller
{
    public function listBO(Request $request)
    {
        if(AdminController::isLogged()){
            // $categorie = Categorie::paginate(3);
            $current_page=$request->query('page');
            $cname="categorie_".strval($current_page);
            $cur_page=intval($current_page);
            $data = Cache::get($cname);
            if($data===null){
                Cache::put($cname,Categorie::paginate(3, ['*'], 'page', $cur_page));
                $data = Cache::get($cname);
            }
            $categorie=$data;
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
            
            Cache::forget('all_categorie');
            $ar=Categorie::all();
            $ac=count($ar);
            $aci=intval($ac/6);
            if($aci>1){
                for ($i=1; $i <=$aci ; $i++) { 
                    $cname="categorie_".strval($i);
                    Cache::forget($cname);
                }
            }else{
                Cache::forget('categorie_1');
            }

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
            Cache::forget('categorie');
            return AdminController::acceuil();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


}
