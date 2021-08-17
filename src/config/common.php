<?php
namespace App\Config;

class Common {
    public function __construct(){
       
    }
    public static function getUriArgs() {
       return  [
            "token"=>$_SESSION["Id"],
            "request"=>'url',
            "query"=>"token",
            "page"=>[
                "company"=>"93c731f1c3a84ef05cd54d044c379eaa",
            ],
        ];
    } 
    // public static $commonVariables = $this->getUriArgs();
    public static $data = [
                        "q"=>"jwt",
                        "key" => "the-roi-shop",
                        "mode"=>[
                            "entry"=>"1043bfc77febe75fafec0c4309faccf1",
                            "update"=>"3ac340832f29c11538fbe2d6f75e8bcc",
                            "preview"=>"5ebeb6065f64f2346dbb00ab789cf001",
                            "list"=>"10ae9fc7d453b0dd525d0edf2ede7961",
                            "delete"=>"099af53f601532dbd31e0ea99ffdeb64"
                        ]
                            ];
    public static $urlQuery = [
        "company"=>[
            "entry"=>'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYWdlIjoiOTNjNzMxZjFjM2E4NGVmMDVjZDU0ZDA0NGMzNzllYWEiLCJtb2RlIjoiMTA0M2JmYzc3ZmViZTc1ZmFmZWMwYzQzMDlmYWNjZjEifQ.UzXo7SDrx1odE7iYOMzzArhrw3OOJyOB9x_iUeQKSYA',
            "list"=>'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYWdlIjoiOTNjNzMxZjFjM2E4NGVmMDVjZDU0ZDA0NGMzNzllYWEiLCJtb2RlIjoiMTBhZTlmYzdkNDUzYjBkZDUyNWQwZWRmMmVkZTc5NjEifQ.om9N0W2NLA54YV0qGkvn52opmZDOE0d1z-O4GAQjBhI',
            "update"=>'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYWdlIjoiOTNjNzMxZjFjM2E4NGVmMDVjZDU0ZDA0NGMzNzllYWEiLCJtb2RlIjoiM2FjMzQwODMyZjI5YzExNTM4ZmJlMmQ2Zjc1ZThiY2MifQ.AWcBud-GPLyV0oOViZdK6z0SpJhmY_vL_QnMoFl8XVU',
            "preview"=>'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYWdlIjoiOTNjNzMxZjFjM2E4NGVmMDVjZDU0ZDA0NGMzNzllYWEiLCJtb2RlIjoiNWViZWI2MDY1ZjY0ZjIzNDZkYmIwMGFiNzg5Y2YwMDEifQ.-p0bq1boCNV-46Y0qwSbgQimSqlk4aBsZqzEtY2TCdI',
            "delete"=>'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYWdlIjoiOTNjNzMxZjFjM2E4NGVmMDVjZDU0ZDA0NGMzNzllYWEiLCJtb2RlIjoiMDk5YWY1M2Y2MDE1MzJkYmQzMWUwZWE5OWZmZGViNjQifQ.E8n-_hoSgz9sUGohLgZ0meviS_MlN222PNxzbQR1rU4'
        ]
        ];
    public static $directory = [
        "asset"=>[
            "css"=>'../admin/src/assets/css',
            "js"=>'../admin/src/assets/js',
            'img'=>'../admin/src/assets/images',
        ]
        ];
  
}