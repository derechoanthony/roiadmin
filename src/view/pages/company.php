<?php
namespace App\View\Pages;

use App\View\Template\Main;
use App\View\Pages\Component\CreateCompany;
use App\View\Pages\Component\CompanyList;
use App\Config\Common;

class Company {
    public function __construct($request){
        $this->request = $request;
    }
  public  function getCompanyPage() {

	$mode = $this->request['mode'];
	$arg = array();
	$arg['request'] = $this->request;

	switch ($mode) {
		case Common::$data['mode']['delete']:
		case Common::$data['mode']['preview']:
		case Common::$data['mode']['update']:
		case Common::$data['mode']['entry']:
			$arg['content'] = $this->getNewCompanyTemplate($this->request);
			$arg['library'] = 'forms';
			break;
		
		case Common::$data['mode']['list']:
		default:
			$arg['content'] = $this->getListofCompanyTemplate($this->request);
			$arg['library'] = 'dynamicTable';
		break;
	}

	$template = new Main($arg);
	return $template->getTemplate();
  }
  private function getNewCompanyTemplate($arg){
	$template = new CreateCompany($arg);
	return $template->newCompanyTemplate();
  }

  private function getListofCompanyTemplate($arg){
	  $template = new CompanyList($arg);
	  return $template->CompanyListTemplate();
  }
  
}