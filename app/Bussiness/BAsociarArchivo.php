<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Bussiness;

use Storage;
use Illuminate\Support\Facades\DB;

class BAsociarArchivo {

    //put your code here
    public function GetFilesPath($Path) {
        $Archivos = array();

        $directorio = $Path;
        $ficheros1 = scandir($directorio);

        foreach ($ficheros1 as $nameFile) {
            $nameFile = trim($nameFile);
            if ($nameFile != '.' and $nameFile != '..') {


                $arch = new \App\Archivo();
                $arch->Nombre = utf8_encode($nameFile);
                $arch->RutaGuardado = $Path . "/" . utf8_encode($nameFile);
                array_push($Archivos, $arch);
            }
        }
        return $Archivos;
    }

    public function AsociarArchivo($archivo, $idAsociado, $ano, $mes, $idPagaduria) {

        $asociado = \App\Tercero::find($idAsociado);
        $archivoobj = new \App\Archivo();
        $archivo = $this->Renamefile($archivo);
        $dirend = config('app.dest_file');

        $info = pathinfo($archivo);

        if (!is_dir($dirend . "/" . $asociado->NumeroId)) {
            mkdir($dirend . "/" . $asociado->NumeroId, 0777);
        }

        $archivoobj->Nombre = $info['basename'];
        $archivoobj->Extension = $info['extension'];
        $archivoobj->NombreGuardado = $this->guid();
        $archivoobj->RutaGuardado = $asociado->NumeroId . '/' . $archivoobj->NombreGuardado . "." . $archivoobj->Extension;
        $this->MoveFile(utf8_decode($archivo), $archivoobj->RutaGuardado);
        $size = filesize(utf8_decode($dirend . $archivoobj->RutaGuardado));
        $archivoobj->Tamano = $size;
        $archivoobj->save();

        $archivotercero = new \App\ArchivoTercero();
        $archivotercero->archivo_id = $archivoobj->id;
        $archivotercero->tercero_id = $asociado->id;
        $archivotercero->mes = $mes;
        $archivotercero->ano = $ano;
        $archivotercero->pagaduria_id = $idPagaduria;
        $archivotercero->save();
    }

    public function UpdateAsociarArchivo($archivotercero) {

        $asociado = \App\Tercero::find($archivotercero->tercero_id);

        
        $archivoobj = \App\Archivo::find($archivotercero->archivo_id);

        $dirend = config('app.dest_file');

       

        if (!is_dir($dirend . "/" . $asociado->NumeroId)) {
            mkdir($dirend . "/" . $asociado->NumeroId, 0777);
        }

        $ruta = $asociado->NumeroId . '/' . $archivoobj->NombreGuardado . "." . $archivoobj->Extension;
        $this->MoveFile($dirend.$archivoobj->RutaGuardado, $ruta);
        $archivoobj->RutaGuardado=$ruta;
        $archivoobj->save();
        $archivotercero->save();
    }

    public function Renamefile($file) {
        $filenew = $this->remove_word($file);
        if ($file != $filenew) {
            if (file_exists($filenew) == false) {
                rename(utf8_decode($file), $filenew);
            }
        }

        return $filenew;
    }

    function remove_word($haystack) {
        // sanitize input strings
        $unwanted_array = array('Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
            'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
            'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y');
        $str = strtr($haystack, $unwanted_array);
        // If the word wasn't found, return $haystack as-is
        return $str;
    }

    public function MoveFile($oldFile, $newFile) {
        $dirend = config('app.dest_file');
        if (copy($oldFile, $dirend . $newFile)) {
            unlink($oldFile);
        }
    }

    function guid() {
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        } else {
            mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45); // "-"
            $uuid = chr(123)// "{"
                    . substr($charid, 0, 8) . $hyphen
                    . substr($charid, 8, 4) . $hyphen
                    . substr($charid, 12, 4) . $hyphen
                    . substr($charid, 16, 4) . $hyphen
                    . substr($charid, 20, 12)
                    . chr(125); // "}"
            return $uuid;
        }
    }

    public function GetArchivoByID($id) {
        $where = ' where 1=1 and a.id=' . $id;
        $informe = DB::select('SELECT a.id as id_archivo, a.Nombre as nombre_archivo'
                        . ' ,a_t.mes as mes, a_t.ano as ano'
                        . ' ,t.id as ter_id, concat( t.Nombre,\' \' , t.Apellidos) as nombreAsociado , t.NumeroId as NumeroId'
                        . ' , t.TipoDoc, p.nombre as nombrePagaduria, p.id pagaduria_id, descmes as mesName'
                        . ',td.nombre NombreTipoDoc, td.id idtipodoc'
                        . ' FROM archivodigital.archivo as a '
                        . ' inner join archivodigital.archivo_terceros as a_t on a.id= a_t.archivo_id'
                        . ' inner join archivodigital.tercero as t on t.id=a_t.tercero_id'
                        . ' left outer join archivodigital.pagaduria as p on p.id= a_t.pagaduria_id '
                        . ' left outer join archivodigital.meses as mestabla on id_mes=mes '
                        . ' left outer join archivodigital.tipodocumento as td on td.id= a_t.tipodocumento_id '
                        . $where . ' order by t.id desc,a_t.ano asc,a_t.mes asc ;');
        if (count($informe) >= 1) {
            $informe = $informe[0];
        }

        return $informe;
    }

}
