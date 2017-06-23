<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Bussiness;

use Illuminate\Support\Facades\DB;

class BInformes {

    //put your code here
    public function GetInformeDocumentos($hdffiltersaAsociado, $hdffiltersPagaduria, $hdffiltersDocumento, $hdffiltersano, $hdffiltersMes) {

        if (empty($hdffiltersaAsociado) and empty($hdffiltersPagaduria)
                and empty($hdffiltersDocumento) and empty($hdffiltersano) and empty($hdffiltersMes)) {
            /* $informe = DB::select('SELECT a.id as id_archivo, a.Nombre as nombre_archivo'
              . ' ,a_t.mes as mes, a_t.ano as ano'
              . ' , t.Nombre+\' \'  + t.Apellidos as nombreAsociado , t.NumeroId as NumeroId'
              . ' , t.TipoDoc, p.nombre as nombrePagaduria, MONTHNAME(STR_TO_DATE(a_t.mes,\'%m\')) as mesName'
              . ' FROM archivodigital.archivo as a '
              . ' inner join archivodigital.archivo_terceros as a_t on a.id= a_t.archivo_id'
              . ' inner join archivodigital.tercero as t on t.id=a_t.tercero_id'
              . ' left outer join archivodigital.pagaduria as p on p.id= a_t.pagaduria_id; ');
             */
            return null;
        } else {


            $where = ' where 1=1';


            if (!empty($hdffiltersaAsociado)) {

                $where = $where . " and  t.id=" . $hdffiltersaAsociado;
            }
            if (!empty($hdffiltersPagaduria)) {

                $where = $where . " and  a_t.pagaduria_id=" . $hdffiltersPagaduria;
            }
            if (!empty($hdffiltersDocumento)) {

                $where = $where . " and  a_t.tipodocumento_id=" . $hdffiltersDocumento;
            }
            if (!empty($hdffiltersano)) {

                $where = $where . " and  a_t.ano=" . $hdffiltersano;
            }
            if (!empty($hdffiltersMes)) {

                $where = $where . " and  a_t.mes=" . $hdffiltersMes;
            }
            $informe = DB::select('SELECT a.id as id_archivo, a.Nombre as nombre_archivo'
                            . ' ,a_t.mes as mes, a_t.ano as ano'
                            . ' ,t.id as ter_id, concat( t.Nombre,\' \' , t.Apellidos) as nombreAsociado , t.NumeroId as NumeroId'
                            . ' , t.TipoDoc, p.nombre as nombrePagaduria, descmes as mesName'
                            . ' FROM archivodigital.archivo as a '
                            . ' inner join archivodigital.archivo_terceros as a_t on a.id= a_t.archivo_id'
                            . ' inner join archivodigital.tercero as t on t.id=a_t.tercero_id'
                            . ' left outer join archivodigital.pagaduria as p on p.id= a_t.pagaduria_id '
                            . ' left outer join archivodigital.meses as mestabla on id_mes=mes '
                            . ' left outer join archivodigital.tipodocumento as td on td.id= a_t.tipodocumento_id '
                            . $where . ' order by t.id desc,a_t.ano asc,a_t.mes asc ;');


            return $informe;
        }
    }

    public function GetFiltersInfo($token, $type) {
        if ($type == "Asociado") {
            $btercero = new BTercero();
            $terceros = $btercero->GetTercerobyNombreIdentnoFilter($token);
            return $terceros;
        }
        if ($type == "Pagaduria") {
            $bpagaduria = new BPagaduria();
            $pagaduria = $bpagaduria->GetPagaduriaByNombreFilter($token);
            return $pagaduria;
        }
        if ($type == "Documento") {
            $bTipoDocumento = new BTipoDocumento();
            $tipoDOcumento = $bTipoDocumento->GetTipoDocumentoByTipo($token);
            return $tipoDOcumento;
        }
        if ($type == "Año") {
            $result = DB::select('select ano as id, ano as tag ,\'R\' as tipo from archivodigital.archivo_terceros'
                            . ' where ano<>0'
                            . ' group by ano');
            return $result;
        }
        if ($type == "Mes") {
            $sql = 'select mes as id    ,descmes as tag ,\'R\' as tipo from archivodigital.archivo_terceros'
                    . ' inner join archivodigital.meses as mestabla on id_mes=mes '
                    . ' where mes<>0 and mes is not null group by descmes,mes';
            $result = DB::select($sql);
            return $result;
        } else {
            return null;
        }
    }

}
