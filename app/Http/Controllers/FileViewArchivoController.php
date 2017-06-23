<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileViewArchivoController extends Controller {

    //
    public function GetFile(Request $request) {
        $file = $request->input('file');
        // create new imagick object from image.jpg
        //$file = "F:\proyectos_pp/ESCANER/100.tif";


        $im = new \Imagick($file);
// change format to png
//        $im->setImageFormat("png");
// output the image to the browser as a png
        header("Content-Type: image/png");
        echo $im;

// or you could output the image to a file:
//$im->writeImage( "F:\proyectos_pp\ESCANER\_100.jpg" );
    }

    public function GetFileByID(Request $request) {
        $file = $request->input('file');
        $archivoobj = \App\Archivo::find($file);
        // create new imagick object from image.jpg
        //$file = "F:\proyectos_pp/ESCANER/100.tif";
        $dirend = config('app.dest_file');
       
        $im = new \Imagick($dirend . $archivoobj->RutaGuardado);

// change format to png
//        $im->setImageFormat("png");
// output the image to the browser as a png
        header("Content-Type: image/png");
        echo $im;

// or you could output the image to a file:
//$im->writeImage( "F:\proyectos_pp\ESCANER\_100.jpg" );
    }

    public function DownLoadFile(Request $request) {
        $file = $request->input('file');


        $headers = array(
            'Content-Type: application/pdf',
        );

        $filenew = $this->remove_word($file);
        if ($file != $filenew) {
            rename(utf8_decode($file), $filenew);
        }
        $info = pathinfo($filenew);
        return response()->download($filenew, 'filename' . '.' . $info['extension'], $headers);

// or you could output the image to a file:
//$im->writeImage( "F:\proyectos_pp\ESCANER\_100.jpg" );
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

    public function DownLoadFileByID(Request $request) {
        $file = $request->input('file');
        $archivoobj = \App\Archivo::find($file);

        $dirend = config('app.dest_file');
         
        $headers = array(
            'Content-Type: image/png',
        );


        return response()->download($dirend."/" . $archivoobj->RutaGuardado,  $archivoobj->Nombre, $headers);

// or you could output the image to a file:
//$im->writeImage( "F:\proyectos_pp\ESCANER\_100.jpg" );
    }

}
