<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Bussiness;

use DB;

class BTercero {

    //put your code here
    public function GetTercerobyNombreIdentno($token) {


        if (!is_numeric($token)) {

            $terceros = \App\Tercero::where(function($q)use($token) {
                        $q->where('Nombre', 'LIKE', '%' . $token . '%');
                        $q->orWhere('Apellidos', 'LIKE', '%' . $token . '%');
                    })->get();
            return $terceros;
        } else {
            $terceros = \App\Tercero::where('NumeroId', 'like', '%' . $token . '%')->get();

            return $terceros;
        }
    }

    public function GetTercerobyNombreIdentnoFilter($token) {



        if (!is_numeric($token)) {

            $terceros = \App\Tercero::select(DB::raw("CONCAT(Nombre,' ',Apellidos) as tag"), DB::raw("NumeroId as tipo"), DB::raw("id as id"))
                    ->where(function($q)use($token) {
                        $q->where('Nombre', 'LIKE', '%' . $token . '%');
                        $q->orWhere('Apellidos', 'LIKE', '%' . $token . '%');
                    })->get();
                    
            return $terceros;
        } else {
            $terceros = \App\Tercero::select(DB::raw("CONCAT(Nombre,' ',Apellidos) as tag"), DB::raw("NumeroId as tipo"), DB::raw("id as id"))
                    ->where('NumeroId', 'like', '%' . $token . '%')
                    ->get();

            return $terceros;
        }
    }

}
