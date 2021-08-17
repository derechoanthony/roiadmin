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

		// $formComponent = CreateCompanySubComponent::formComponents($this->mode);
		// echo sizeof($this->formComponent);
		// for($i = 0; $i < sizeof($this->formComponent); $i){
		// 	// echo $this->formComponent[$i];
		// }
		// echo $this->formComponent['title'];
		// if(!empty($this->formComponent)){
			// $title = $this->formComponent['title'];
			// $method = $this->formComponent['method'];
			// $contractAgreement = $this->formComponent['contractAgreement'];
			// $actionButtons = $this->formComponent['actionButtons'];
			// $infoMessage = $this->formComponent['infoMessage'];
			
		// }
		
		
		// if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// 	$curl = curl_init();
		// 	curl_setopt_array($curl, array(
		// 	CURLOPT_URL => 'localhost:8080/company',
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_ENCODING => '',
		// 	CURLOPT_MAXREDIRS => 10,
		// 	CURLOPT_TIMEOUT => 0,
		// 	CURLOPT_FOLLOWLOCATION => true,
		// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 	CURLOPT_CUSTOMREQUEST => 'POST',
		// 	CURLOPT_POSTFIELDS =>'{
		// 		"companyName":"'.$_POST['companyName'].'",
		// 		"companyAlias":"'.$_POST['companyAlias'].'",
		// 		"license":"10",
		// 		"accountContact":"juan dela cruz",
		// 		"contractFiles":"xyz.pdf",
		// 		"accountEmail":"juanDelaCruz@test.com",
		// 		"contractStart":"2017-01-03 08:32:36",
		// 		"contractEnd":"2017-01-03 08:32:36",
		// 		"notes":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
		// 		"token_id":"71478884240498fe0cee81acca4f8c5ecab89e3e7533a701252063af5327f219"
		// 	}',
		// 	CURLOPT_HTTPHEADER => array(
		// 				'token: 71478884240498fe0cee81acca4f8c5ecab89e3e7533a701252063af5327f219',
		// 				'Content-Type: application/json'
		// 			),
		// 	));

		// 		$response = curl_exec($curl);

		// 		curl_close($curl);
		// 		$data = json_decode($response, true);
		// 		// var_dump($data);
		// 		if($data['success']){
					
		// 			header('Location: /admin/?t='.$this->token.'&&q='.Common::$urlQuery['company']['list'].'');
		// 		}else{
		// 			var_dump($response);
		// 		}



		//   }
		//   if ($_SERVER["REQUEST_METHOD"] == "PUT") {
		// 	header('Location: /admin/?t='.$this->token.'&&q='.Common::$urlQuery['company']['list'].'');
		//   }
		
        // return '<div class="clearfix"></div>
        // <div class="row">		
		// 			<div class="col-md-12 col-sm-12 ">
		// 			'.$infoMessage.'
		// 			</div>
        //                   <div class="col-md-8 col-sm-8 ">
        //                       <div class="x_panel">							  
        //                           <div class="x_title">
        //                               <h2>'.$title.'</h2>
        //                               <ul class="nav navbar-right panel_toolbox">
        //                                   <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        //                                   </li>
                                         
        //                                   <li><a class="close-link"><i class="fa fa-close"></i></a>
        //                                   </li>
        //                               </ul>
        //                               <div class="clearfix"></div>
        //                           </div>
        //                           <div class="x_content">
        //                               <br />
                                    //   <form class="form-label-left input_mask" method="'.$method.'" action="'.$_SERVER["REQUEST_URI"].'">
										
									// 	<div class="col-md-6 col-sm-6  form-group has-feedback">
									// 		<input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="companyName" placeholder="Company Name" value="'.$companyName.'">
									// 		<span class="fa fa-institution form-control-feedback left" aria-hidden="true"></span>
									// 	</div>

									// 	<div class="col-md-6 col-sm-6  form-group has-feedback">
									// 		<input type="text" class="form-control" id="inputSuccess3" name="companyAlias"  placeholder="Company Alias" value="'.$companyAlias.'">
									// 		<span class="fa fa-bank form-control-feedback right" aria-hidden="true"></span>
									// 	</div>

									// 	<div class="col-md-6 col-sm-6  form-group has-feedback">
									// 		<input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="License" placeholder="License" value="'.$licenses.'">
									// 		<span class="fa fa-newspaper-o form-control-feedback left" aria-hidden="true"></span>
									// 	</div>

									// 	<div class="col-md-6 col-sm-6  form-group has-feedback">
									// 		<input type="text" class="form-control" id="inputSuccess3" placeholder="Account\'s Contact" value ="-">
									// 		<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
									// 	</div>

									// 	<div class="col-md-6 col-sm-6  form-group has-feedback">
									// 		'.$contractAgreement.'
									// 	</div>

									// 	<div class="col-md-6 col-sm-6  form-group has-feedback">
									// 		<input type="tel" class="form-control" id="inputSuccess5" placeholder="Account\'s Email" value="test@gmail.com">
									// 		<span class="fa fa-paper-plane form-control-feedback right" aria-hidden="true"></span>
									// 	</div>
									// 	<div class="clearfix"></div>
									// 	<div class="col-md-6 col-sm-6  form-group has-feedback">
									// 		<label class="col-form-label col-md-3 col-sm-3 ">Contract Start <span class="required">*</span>
									// 		</label>
									// 		<div class="col-md-9 col-sm-9 ">
									// 			<input class="date-picker form-control" value="'.$contract_start.'" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type=\'date\'" onmouseover="this.type=\'date\'" onclick="this.type=\'date\'" onblur="this.type=\'text\'" onmouseout="timeFunctionLong(this)">
									// 			<script>
									// 				function timeFunctionLong(input) {
									// 					setTimeout(function() {
									// 						input.type = \'text\';
									// 					}, 60000);
									// 				}
									// 			</script>
									// 		</div>
									// 	</div>

									// 	<div class="col-md-6 col-sm-6  form-group has-feedback">
									// 		<label class="col-form-label col-md-3 col-sm-3 ">Contract End <span class="required">*</span>
									// 		</label>
									// 		<div class="col-md-9 col-sm-9 ">
									// 			<input class="date-picker form-control" value ="'.$contract_end.'" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type=\'date\'" onmouseover="this.type=\'date\'" onclick="this.type=\'date\'" onblur="this.type=\'text\'" onmouseout="timeFunctionLong(this)">
									// 			<script>
									// 				function timeFunctionLong(input) {
									// 					setTimeout(function() {
									// 						input.type = \'text\';
									// 					}, 60000);
									// 				}
									// 			</script>
									// 		</div>
									// 	</div>
										
									// 	<div class=" form-group row">
									// 		<label class="col-form-label col-md-3 col-sm-3 ">Notes</label>
									// 		<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" value="'.$notes.'"></textarea>											
									// 	</div>
										
									// 	<div class="ln_solid"></div>
									// 	<div class="form-group row">
									// 		'.$actionButtons.'
									// 	</div>

									// </form>


        //                           </div>
        //                       </div>
        //                   </div>
        //               </div>';

		return '<div class="col-md-12 col-sm-12 ">
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
				<li>
				  <a href="#step-3">
					<span class="step_no">3</span>
					<span class="step_descr">
						Step 3<br />
						<small>Step 3 User Account</small>
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

			  <div id="step-3">
					<div class="offset-2">
						<h2 > User Account</h2>
					</div>
						<div class="x_title ">
							<div class="clearfix"></div>
					</div>
					'.CompanyElements::addUser($this->formComponent).'
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