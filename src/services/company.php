<?php
namespace App\Services;
use App\Config\Common;

class Company {
    function apiCall($mode){
        switch($mode) {
            case Common::$data['mode']['entry']:
               return "API CALL FOR SUB COMPONENT";
                break;
            default:
                return "mode not set";
                break;


        }
        return "test";
    }
}