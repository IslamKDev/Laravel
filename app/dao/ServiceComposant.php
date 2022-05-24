<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ServiceComposant
{
    public function supprimerComposant($id_composant,$id_medicament){
        try{
            $monMedicament = DB::table('constituer')
                ->where('id_composant', '=', $id_composant)
                ->where('id_medicament','=',$id_medicament)
                ->delete();
            return $monMedicament;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getComposant($id_medicament){
        try{
            $mesComposants = DB::table("composant")
                ->select("id_composant","lib_composant")
                ->whereNotIn("id_composant", function($query) use ($id_medicament){
                    $query->from("composant")
                        ->select("constituer.id_composant")
                        ->join('constituer','composant.id_composant','=','constituer.id_composant')
                        ->join('medicament','constituer.id_medicament','=','medicament.id_medicament')
                        ->where('constituer.id_medicament','=',$id_medicament);
                })
                ->get();
            return $mesComposants;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function insertComposant($id_medicament,$id_composant, $qte_composant){
        try{
            DB::table('constituer')->insert(
                [
                    'id_medicament'=>$id_medicament,
                    'id_composant' => $id_composant,
                    'qte_composant'=> $qte_composant
                ]
            );
        }catch (QueryException $e){
            throw new MonException($e -> getMessage(),5);
        }
    }

    public function getUnComposant($id_medicament,$id_composant){
        try{
            $unComposant = DB::table("constituer")
                ->select()
                ->where('id_medicament','=',$id_medicament)
                ->where('id_composant','=',$id_composant)
                ->get();
            return $unComposant;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function modifComposant($id_medicament,$id_composant, $qte_composant){
        try{
            DB::table('constituer')
                ->where('id_medicament','=',$id_medicament)
                ->where('id_composant','=',$id_composant)
                ->update([
                    'qte_composant'=> $qte_composant
                ]);

        }catch (QueryException $e){
            throw new MonException($e -> getMessage(),5);
        }
    }
}
