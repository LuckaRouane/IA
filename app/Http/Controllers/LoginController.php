<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminController;

class LoginController extends Controller
{
    
    public function toForm()
    {
        return view('login');
    }

    public function toFormWithError()
    {
        $erreur="Nom ou Mot de passe incorrect";
        return view('login', compact('erreur'));
    }

    public function getIdAdmin($admins){
        $id_admin=0;
        foreach($admins as $a){
            $id_admin=$a->idadmin;
        }
        return $id_admin;
    }

    public function log(Request $request)
    {
        $login_admin = DB::select('select * from Admin where nom=? and mdp=?', [$request->nom, md5($request->mdp)]);
        if($login_admin!=null){
            Session::put('id_admin', $this->getIdAdmin($login_admin));
            return AdminController::acceuil();
        }else{
            return $this->toFormWithError();
        }
    }


}
