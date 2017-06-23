<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model {

    //
    protected $table = 'archivo';

    public function GetTypeIcon() {
        $ext = explode('.', $this->Nombre);
        $size = sizeof($ext);
        $Icon = 'fa fa-file-o';
        
        switch ($ext[$size - 1]) {
            case 'doc':
                $Icon = "fa-file-word-o";
                break;
             case 'jpg':
                $Icon = 'fa fa-file-image-o';
                break;
             case 'gif':
                $Icon = 'fa fa-file-image-o';
                break;
             case 'png':
                $Icon = 'fa fa-file-image-o';
                break;
             case 'tif':
                $Icon = 'fa fa-file-image-o';
                break;
            case 'docx':
                $Icon = 'fa fa-file-image-o';
                break;
            case 'xls':
                $Icon = 'fa fa-file-excel-o';
            case 'xlsx':
                $Icon = 'fa fa-file-excel-o';
            case 'pdf':
                $Icon = 'fa-file-pdf-o';
            case 'zip':
                $Icon = 'fa fa-file-archive-o';
                break;
            default :
                $Icon = 'folderitem fa fa-folder-o';
        }
        return $Icon;
    }

}
