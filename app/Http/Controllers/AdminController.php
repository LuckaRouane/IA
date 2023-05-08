<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Throwable;
use App\Models\VNombreArticleParPage;

class AdminController extends Controller
{
    public static function isLogged()
    {
        try{
            if(Session::get('id_admin')!=null){
                return true;
            }
        }catch(\Throwable $th){
            return false;
        }
        return false;
    }

    public static function toStringArray($splitter,$tab)
    {
        $v="";
        $count=0;
        foreach($tab as $t){
            if($count==0){
                $v=$t;
            }else{
                $v=strval($v)."".strval($splitter)."".strval($t);
            }
            $count++;
        }
        return $v;
    }

    public static function acceuil()
    {
        if(AdminController::isLogged()){
            $nbrarticleparpage = VNombreArticleParPage::all();
            $nombrearticle=[];
            $nomcategorie=[];
            foreach($nbrarticleparpage as $n){
                array_push($nombrearticle, $n->nombrearticle);
                array_push($nomcategorie, $n->nom);
            }
            $nbrarticle=AdminController::toStringArray(";",$nombrearticle);
            $ncategorie=AdminController::toStringArray(";",$nomcategorie);
            return view('admin_acceuil',compact('nbrarticle','ncategorie'));
        }else{
            return view('login');
        }
    }

    public static function acceuilWithSuccess($success)
    {
        if(AdminController::isLogged()){
            $nbrarticleparpage = VNombreArticleParPage::all();
            $nombrearticle=[];
            $nomcategorie=[];
            foreach($nbrarticleparpage as $n){
                array_push($nombrearticle, $n->nombrearticle);
                array_push($nomcategorie, $n->nom);
            }
            $nbrarticle=AdminController::toStringArray(";",$nombrearticle);
            $ncategorie=AdminController::toStringArray(";",$nomcategorie);
            return view('admin_acceuil',compact('success','nbrarticle','ncategorie'));
        }else{
            return view('login');
        }
    }

    public function toAcceuil()
    {
        if(AdminController::isLogged()){
            $nbrarticleparpage = VNombreArticleParPage::all();
            $nombrearticle=[];
            $nomcategorie=[];
            foreach($nbrarticleparpage as $n){
                array_push($nombrearticle, $n->nombrearticle);
                array_push($nomcategorie, $n->nom);
            }
            $nbrarticle=AdminController::toStringArray(";",$nombrearticle);
            $ncategorie=AdminController::toStringArray(";",$nomcategorie);
            return view('admin_acceuil',compact('nbrarticle','ncategorie'));
        }else{
            return view('login');
        }
    }

    public function deconnect()
    {
        Session::forget('id_admin');
        return view('login');
    }


    
}
