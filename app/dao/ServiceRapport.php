<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ServiceRapport
{
    public function getRapports(){
        try{
            $monMedicament = DB::table('rapport_visite')
                ->Select('praticien.nom_praticien','date_rapport','bilan','motif','rapport_visite.id_rapport')
                ->join('praticien','rapport_visite.id_praticien','=','praticien.id_praticien')
                ->get();
            return $monMedicament;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function insertRapportVisite($id_praticien,$id_visiteur, $dateRapport, $bilan, $motif){
        try{
            DB::table('rapport_visite')->insert(
                [
                    'id_praticien'=>$id_praticien,
                    'id_visiteur' => $id_visiteur,
                    'date_rapport'=> $dateRapport,
                    'bilan' => $bilan,
                    'motif' => $motif
                ]
            );
        }catch (QueryException $e){
            throw new MonException($e -> getMessage(),5);
        }
    }
}
