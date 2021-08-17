<?php
namespace App\Config;
// require __DIR__ . '/vendor/autoload.php';
use App\Config\Common;

use Firebase\JWT\jwt;

class CFG {
    public function __construct($request){
        $this->request = $request;
    }
  public  function getConfig() {
      switch ($this->request['request']){
            case 'url':
                return self::setURL($this->request['token']);
            break;
            case 'jwt':
                return $this->decryptToken();
            break;
            default:
                return 0;
            break;
      }
  }

  private  function decryptToken(){
      $key = Common::$data['key'];
      $token = $this->request['token'];
      $decoded = JWT::decode($token,$key, array('HS256'));
      return (array) $decoded;

  }


  private static function setURL($token){
    $data = array('token'=>$token);
    $queryString =  http_build_query($data);
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else
        $link = "http";
    
    // Here append the common URL characters.
    $link .= "://";
    
    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];
    
    // Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];
    // echo $_SERVER['REQUEST_URI'];
    
      return $link.'?'.$queryString;
  }
  
}