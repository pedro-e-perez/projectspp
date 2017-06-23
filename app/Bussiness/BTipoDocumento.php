<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Bussiness;

use DB;

class BTipoDocumento {

    //put your code here
    public function GetTipoDocumentoByTipo($token) {



        $tipoDocumento = \App\TipoDocumento::select(DB::raw("nombre as tag"), DB::raw("'R' as tipo"), DB::raw("id as id"))
                        ->where(function($q)use($token) {
                            $q->where('nombre', 'LIKE', '%' . $token . '%');
                        })->get();
        return $tipoDocumento;
    }

}
