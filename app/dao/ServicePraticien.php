<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ServicePraticien
{
    public function getPraticien(){
        try{
            $mesPraticiens = DB::table('praticien')
                ->Select()
                ->get();
            return $mesPraticiens;
        }catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
}
