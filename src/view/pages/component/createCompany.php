<?php
namespace App\View\Pages\Component;
use App\Config\Common;
use App\Services\Company;
use App\View\Pages\Component\SubComponent\CompanyElements;

// use App\View\Template\Main;

class CreateCompany extends Company
{
    
    public function __construct($request)
    {
		$this->token = $request['token'];	
		$this->page = $request['page'];
		$this->mode = $request['mode'];
		$this->formComponent = CompanyElements::formComponents($this->mode);
	
    }
    public function newCompanyTemplate()
    {
		// $companyName =$companyAlias= $licenses=$contract_end=$notes="";
		$this->apiCall($this->mode);
		$form = "";
		$form .= CompanyElements::notification();

		return $form.'<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
		  <div class="x_title">
			<h2>Company <small>Form</small></h2>
			
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">


			<!-- Smart Wizard -->
			
			<div id="wizard" class="form_wizard wizard_horizontal">
			  <ul class="wizard_steps">
				<li>
				  <a href="#step-1">
					<span class="step_no">1</span>
					<span class="step_descr">
						Step 1<br />
						<small>Step 1 Comapany Info</small>
					</span>
				  </a>
				</li>
				<li>
				  <a href="#step-2">
					<span class="step_no">2</span>
					<span class="step_descr">
						Step 2<br />
						<small>Step 2 Company Template</small>
					</span>
				  </a>
				</li>
				
				
			  </ul>
			  <div id="step-1">
			  <div class="offset-2">
			 	 <h2 > Comapany Info</h2>
			  </div>
			  	<div class="x_title ">
					<div class="clearfix"></div>
				</div>
			  '.CompanyElements::companyInfoForm($this->formComponent).'
			  </div>

			  <div id="step-2">				
				<div class="offset-2">
					<h2 > Company Template</h2>
				</div>
					<div class="x_title ">
						<div class="clearfix"></div>
				</div>
				'.CompanyElements::companyTemplate().'
				
			  </div>

			  
			  
			</div>
			<!-- End SmartWizard Content -->
			<!-- Tabs -->
			
			<!-- End SmartWizard Content -->
		  </div>
		</div>
	  </div>';
    }
}