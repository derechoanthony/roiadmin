<?php
namespace App\View;

use App\View\Pages\Company;
use App\View\Pages\User;
use App\View\Pages\pageNotFound;
use App\Config\CFG;
use App\Config\Common;

use Firebase\JWT\JWT;



class Main {
  
  public $message = "Hello im in Index.";
  public function __construct($data){
    $this->company ="stest";
    $this->Session = $data;
  }

  public  function getMainPage() {
    $cfg = new CFG(['token'=>$_GET['q'],'request'=>Common::$data['q']]);
    $conf_data = $cfg->getConfig();
    $conf_data['token'] = $_GET['t'];
    $page = Common::getUriArgs();
    
    if($this->Session){

      if($conf_data['page']==$page['page']['company']){
        return self::companyPage($conf_data);
      }
      
      
    }else{
      return self::page_404();
    }    
  }

  private static function companyPage($args){
    $company = new Company($args);
    return $company->getCompanyPage();
  }

  private static function userPage(){
    $user = new User();
    return $user->getUserPage();
  }

  private static function page_404(){
    $page_404 = new pageNotFound();
    return $page_404->get404Page();
  }
  
}