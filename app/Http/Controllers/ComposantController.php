<?php

namespace App\Http\Controllers;


use App\Metier\Visiteur;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Request;
use App\Exceptions\MonException;
use App\dao\ServiceVisiteur;
use App\dao\ServiceMedicament;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceComposant;

class ComposantController extends Controller
{
    public function supprimerComposant($id_composant,$id_medicament){
        if ((Session::get('id') > 0)){
            try {
                $erreur = Session::get('erreur');
                Session::forget('erreur');
                $unServiceComposant = new ServiceComposant();
                $unServiceComposant->supprimerComposant($id_composant,$id_medicament);
            } catch (MonException $e) {
                $monErreur = $e->getMessage();
                return view('vues/pageErreur', compact('monErreur'));
            } catch (Exception $e) {
                $monErreur = -$e->getMessage();
                return view('vues/pageErreur', compact('monErreur'));
            } finally {
                return view('home');
            }
        }
    }

    public function getFormComposant($id_medoc){
        try {
            $erreur = Session::get('erreur');
            $id_medicament = $id_medoc;
            Session::forget('erreur');
            $unServiceComposant = new ServiceComposant();
            $mesComposants = $unServiceComposant->getComposant($id_medicament);
            return view('vues/formComposant', compact('id_medicament','mesComposants', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = -$e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
    }

    public function addComposant()
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $id_medicament = Request::input('id_medicament');
            $id_composant = Request::input('id_composant');
            $qte_composant = Request::input('qte_composant');
            $unServiceComposant = new ServiceComposant();
            $unServiceComposant->insertComposant($id_medicament,$id_composant, $qte_composant);
            $unServiceMedicament = new ServiceMedicament();
            $mesComposants = $unServiceMedicament->getComposantMedicament($id_medicament);
            $monMedicament = $unServiceMedicament->getUnMedicament($id_medicament);
            return view('vues/listeComposantMedicament', compact('mesComposants','monMedicament', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
    }

    public function getFormModifComposant($id_medoc,$id_compo){
        try {
            $erreur = Session::get('erreur');
            $id_medicament = $id_medoc;
            $id_composant = $id_compo;
            Session::forget('erreur');
            $unServiceComposant = new ServiceComposant();
            $unComposant = $unServiceComposant->getUnComposant($id_medicament,$id_composant);
            return view('vues/formModifQuantiteComposant', compact('id_medicament','id_composant','unComposant', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = -$e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
    }

    public function modifComposant()
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $id_medicament = Request::input('id_medicament');
            $id_composant = Request::input('id_composant');
            $qte_composant = Request::input('qte_composant');
            $unServiceComposant = new ServiceComposant();
            $unServiceComposant->modifComposant($id_medicament,$id_composant, $qte_composant);
            $unServiceMedicament = new ServiceMedicament();
            $mesComposants = $unServiceMedicament->getComposantMedicament($id_medicament);
            $monMedicament = $unServiceMedicament->getUnMedicament($id_medicament);
            return view('vues/listeComposantMedicament', compact('mesComposants','monMedicament', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
    }
}
