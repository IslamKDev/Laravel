<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ServiceVisiteur
{
    public function login($login, $pwd)
    {
        $connected = false;
        try {
            $visiteur = DB::table('visiteur')
                ->select()
                ->where('login_visiteur', '=', [$login])
                ->first();
            if ($visiteur) {
                $temp=Hash::make($pwd);
                if($visiteur->type_visiteur == 'A'){
                    if (Hash::check($pwd,$visiteur->pwd_visiteur)) {
                        Session::put('id', $visiteur->id_visiteur);
                        Session::put('type', $visiteur->type_visiteur);
                        $connected = true;
                    }else{
                        Session::put('mdp','false');
                    }
                }else{
                    if (Hash::check($pwd,$visiteur->pwd_visiteur)) {
                        Session::put('type', $visiteur->type_visiteur);
                    }else{
                        Session::put('mdp','false');
                    }
                }
            }
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
        return $connected;
    }

    public function logout()
    {
        Session::put('id', 0);
    }

    public function listeVisiteur($id, $montant, $periode)
    {
        try {
            $visiteurs = DB::table('visiteur')
                ->select('visiteur.id_visiteur', 'nom_visiteur', 'prenom_visiteur', 'ville_visiteur')
                ->join('frais', 'visiteur.id_visiteur', '=', 'frais.id_visiteur')
                ->where('id_laboratoire', '=', [$id])
                ->where('frais.anneemois', '=', [$periode])
                ->where('frais.montantvalide', '>', [$montant])
                ->get();
            return $visiteurs;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }


}
