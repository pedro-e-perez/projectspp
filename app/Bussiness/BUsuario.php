<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author pedro_2
 */
namespace  App\Bussiness;
class BUsuario {
    //put your code here
    public function createPassword($pwr)
    {
        return md5($pwr);
        
    }
}
