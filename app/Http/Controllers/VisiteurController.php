<?php

namespace App\Http\Controllers;


use App\dao\ServiceFrais;
use App\dao\ServiceLogin;
use App\Metier\Visiteur;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Request;
use App\Exceptions\MonException;
use App\dao\ServiceVisiteur;
use Illuminate\Support\Facades\Session;

class VisiteurController extends Controller
{
    public function getLogin()
    {
        try {
            $erreur = "";
            return view('vues/formLogin', compact('erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }
    }

    public function signIn()
    {
        try {
            $login = Request::input('login');
            $pwd = Request::input('pwd');
            $unVisiteur = new ServiceVisiteur();
            $connected = $unVisiteur->login($login, $pwd);
            if ($connected) {
                return view('home');
            }elseif (Session::get('mdp') == 'false' ){
                Session::put('mdp','');
                $erreur = "Login ou mot de passe inconnu";
                return view('vues/formLogin', compact('erreur'));
            }elseif (Session::get('type') != 'A'){
                $erreur = "Vous n'êtes pas administrateur";
                return view('vues/formLogin', compact('erreur'));
            }else {
                $erreur = "Login ou mot de passe inconnu";
                return view('vues/formLogin', compact('erreur'));
            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }
    }

    public function signOut()
    {
        $unVisiteur = new ServiceVisiteur();
        $unVisiteur->logout();
        return view('home');
    }


}
