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

class MedicamentController extends Controller
{
    public function getMedicamentsOffert()
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unServiceMedicament = new ServiceMedicament();
            $mesMedicaments = $unServiceMedicament->getMedicamentsOffert();
            return view('vues/listeMedicamentsOffert', compact('mesMedicaments', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = -$e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
    }

    public function suppMedicamentOffert($id_medicament, $id_rapport)
    {
        $unServiceMedicament = new ServiceMedicament();
        try {
            $unServiceMedicament->deleteMedicament($id_medicament, $id_rapport);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        } finally {
            return redirect('medicament/getlisteMedicamentOffert');
        }
    }


    public function getFamille()
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unServiceMedicament = new ServiceMedicament();
            $mesFamilles = $unServiceMedicament->getFamille();
            return view('vues/selectFamille', compact('mesFamilles', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = -$e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }

    }

    public function getMedicamentsFamille($id_famille)
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unServiceMedicament = new ServiceMedicament();
            $mesMedicamentsFamille = $unServiceMedicament->getMedicamentsFamille($id_famille);
            $maFamille = $unServiceMedicament->getUneFamille($id_famille);
            return view('vues/listeMedicamentFamille', compact('mesMedicamentsFamille', 'maFamille', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = -$e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }

    }

    public function getMedicaments()
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unServiceMedicament = new ServiceMedicament();
            $mesMedicaments = $unServiceMedicament->getMedicaments();
            return view('vues/listeMedicaments', compact('mesMedicaments', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = -$e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }

    }


    public function getComposantMedicament($id_medicament)
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unServiceMedicament = new ServiceMedicament();
            $mesComposants = $unServiceMedicament->getComposantMedicament($id_medicament);
            $monMedicament = $unServiceMedicament->getUnMedicament($id_medicament);
            return view('vues/listeComposantMedicament', compact('mesComposants', 'monMedicament', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = -$e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }

    }

    public function getFormModifMedicament($id_medicament, $id_rapport)
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unServiceMedicament = new ServiceMedicament();
            $qteMedicament = $unServiceMedicament->getUnMedicamentRapport($id_medicament, $id_rapport);
            $monMedicament = $unServiceMedicament->getUnMedicament($id_medicament);
            return view('vues/modifMedicamentOffert', compact('qteMedicament', 'monMedicament', 'id_rapport', 'id_medicament', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = -$e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
    }

    public function modifMedicamentOffert()
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $id_medicament = Request::input('id_medicament');
            $id_rapport = Request::input('id_rapport');
            $qte_rapport = Request::input('quantite_medicament');
            $unServiceComposant = new ServiceMedicament();
            $unServiceComposant->modifRapport($id_medicament, $id_rapport, $qte_rapport);
            return redirect('medicament/getlisteMedicamentOffert');
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
    }

}
