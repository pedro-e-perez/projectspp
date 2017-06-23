<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Bussiness;
use DB;

class BPagaduria {

    //put your code here
    public function GetPagaduriaByNombre($token) {
        $pagaduria = \App\Pagaduria::where(function($q)use($token) {
                    $q->where('nombre', 'LIKE', '%' . $token . '%');
                })->get();
        return $pagaduria;
    }

    public function GetPagaduriaByNombreFilter($token) {
        $pagaduria = \App\Pagaduria::select(DB::raw("nombre as tag"), DB::raw("'R' as tipo"), DB::raw("id as id"))
                        ->where(function($q)use($token) {
                            $q->where('nombre', 'LIKE', '%' . $token . '%');
                        })->get();
        return $pagaduria;
    }

}
