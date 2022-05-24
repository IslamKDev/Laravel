<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ServiceMedicament
{
    public function getMedicamentsOffert(){
        try{
            $lesMedicaments = DB::table('offrir')
                ->Select()
                ->join('medicament','offrir.id_medicament','=','medicament.id_medicament')
                ->get();
            return $lesMedicaments;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function deleteMedicament($id_medicament,$id_rapport){
        try{
            DB::table('offrir')
                ->where('id_medicament', '=', $id_medicament)
                ->where('id_rapport', '=', $id_rapport)
                ->delete();

        }catch (QueryException $e){
            throw new MonException($e -> getMessage(),5);
        }
    }

    public function getFamille(){
        try{
            $mesFamilles = DB::table('famille')
                ->Select()
                ->get();
            return $mesFamilles;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getUneFamille($id_famille)
    {
        try {
            $maFamille = DB::table('famille')
                ->Select()
                ->where('id_famille', '=', $id_famille)
                ->get();
            return $maFamille;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getMedicamentsFamille($id_famille){
        try{
            $mesMedicamentsFamille = DB::table('medicament')
                ->Select()
                ->where('id_famille', '=',$id_famille)
                ->get();
            return $mesMedicamentsFamille;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getMedicaments(){
        try{
            $mesMedicaments = DB::table('medicament')
                ->Select()
                ->get();
            return $mesMedicaments;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getComposantMedicament($id_medicament){
        try{
            $mesComposants = DB::table('constituer')
                ->Select('composant.lib_composant','composant.id_composant','constituer.id_medicament','constituer.qte_composant')
                ->join('composant','constituer.id_composant','=','composant.id_composant')
                ->where('constituer.id_medicament', '=', $id_medicament)
                ->get();
            return $mesComposants;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getUnMedicament($id_medicament){
        try{
            $monMedicament = DB::table('medicament')
                ->Select('nom_commercial','id_medicament')
                ->where('id_medicament', '=', $id_medicament)
                ->get();
            return $monMedicament;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getUnMedicamentRapport($id_medicament,$id_rapport){
        try{
            $monMedicament = DB::table('offrir')
                ->Select('qte_offerte')
                ->where('id_medicament', '=', $id_medicament)
                ->where('id_rapport', '=', $id_rapport)
                ->get();
            return $monMedicament;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function modifRapport($id_medicament,$id_rapport, $qte_rapport){
        try{
            DB::table('offrir')
                ->where('id_medicament','=',$id_medicament)
                ->where('id_rapport','=',$id_rapport)
                ->update([
                    'qte_offerte'=> $qte_rapport
                ]);

        }catch (QueryException $e){
            throw new MonException($e -> getMessage(),5);
        }
    }

}
