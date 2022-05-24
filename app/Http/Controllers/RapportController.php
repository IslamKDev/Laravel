<?php

namespace App\Http\Controllers;


use App\dao\ServicePraticien;
use App\dao\ServiceRapport;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Request;
use App\Exceptions\MonException;
use App\dao\ServiceVisiteur;
use App\dao\ServiceMedicament;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceComposant;

class RapportController extends Controller
{
    public function getRapportVisite()
    {
        if ((Session::get('id') > 0)) {
            try {
                $erreur = Session::get('erreur');
                Session::forget('erreur');
                $unRapportService = new ServiceRapport();
                $mesRapports = $unRapportService->getRapports();
                return view('vues/listeRapports', compact('mesRapports', 'erreur'));
            } catch (MonException $e) {
                $monErreur = $e->getMessage();
                return view('vues/pageErreur', compact('monErreur'));
            } catch (Exception $e) {
                $monErreur = -$e->getMessage();
                return view('vues/pageErreur', compact('monErreur'));
            }
        }
    }

    public function getFormRapport()
    {
        if ((Session::get('id') > 0)) {
            try {
                $erreur = Session::get('erreur');
                Session::forget('erreur');
                $unRapportPraticien = new ServicePraticien();
                $mesPraticiens = $unRapportPraticien->getPraticien();
                return view('vues/formRapportVisite', compact('mesPraticiens', 'erreur'));
            } catch (MonException $e) {
                $monErreur = $e->getMessage();
                return view('vues/pageErreur', compact('monErreur'));
            } catch (Exception $e) {
                $monErreur = -$e->getMessage();
                return view('vues/pageErreur', compact('monErreur'));
            }
        }
    }

    public function addRapport()
    {
        try {
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $id_visiteur = Session::get('id');
            $id_praticien = Request::input('id_praticien');
            $dateRapport = Request::input('date_rapport');
            $bilan = Request::input('bilan');
            $motif = Request::input('motif');
            $unServiceRapport = new ServiceRapport();
            $unServiceRapport->insertRapportVisite($id_praticien, $id_visiteur, $dateRapport, $bilan, $motif);
            $mesRapports = $unServiceRapport->getRapports();
            return view('vues/listeRapports', compact('mesRapports', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
    }
}
