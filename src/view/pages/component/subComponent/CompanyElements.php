<?php
namespace App\View\Pages\Component\SubComponent;

use App\Config\Common;
use App\View\Pages\Component\SubComponent\Currency;

class CompanyElements {

	public static function notification(){
		return '<div id="MyPopup" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						&times;</button>
					<h4 class="modal-title">
					</h4>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
				<a href="/admin/?t=359ed500cbfc7ff9a0357f2046d184edae3ec7f9d9d3736b52eb806f9d874b37&&q=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYWdlIjoiOTNjNzMxZjFjM2E4NGVmMDVjZDU0ZDA0NGMzNzllYWEiLCJtb2RlIjoiMTBhZTlmYzdkNDUzYjBkZDUyNWQwZWRmMmVkZTc5NjEifQ.om9N0W2NLA54YV0qGkvn52opmZDOE0d1z-O4GAQjBhI" class="btn btn-danger">
					close</a>
				</div>
			</div>
		</div>
	</div>';
	}
    
    public static function formComponents(string $mode){
        switch ($mode) {
            case Common::$data['mode']['entry']:

				return [
					"title" => 'Create New Company',
					"method" => 'post',
					"contractAgreement" => '<label class="col-form-label col-md-12 col-sm-12 ">Contract and Agreements</label>
										<input class="btn btn-default btn-sm" type="file" id="myfile" name="myfile">',
					"actionButtons" => '<div class="col-md-4 col-sm-4  offset-md-8">
											<button type="submit" class="btn btn-success" onclick="return createCompanyValidation()"><i class="fa fa-save"></i>&nbsp;Save</button>
											<button class="btn btn-primary" type="reset"><i class="fa fa-refresh"></i>&nbsp;Clear</button>
											<button type="submit" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;Exit</button>
										</div>',
					"infoMessage" => ''];

			break;
			case Common::$data['mode']['update']:
				return [
					"title" => 'Update Company Info',
					"method" => 'PUT',				
					"contractAgreement" => '<label class="col-form-label col-md-12 col-sm-12 ">Contract and Agreements</label>
									<input class="btn btn-default btn-sm" type="file" id="myfile" name="myfile">',
				
					"actionButtons" => '<div class="col-md-4 col-sm-4  offset-md-8">
											<a href="#" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</a>
											<button class="btn btn-primary" type="reset"><i class="fa fa-refresh"></i>&nbsp;Clear</button>
											<button type="submit" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;Exit</button>
										</div>',
					"infoMessage" => ''];
			break;
			case Common::$data['mode']['preview']:

				return [
					"title" => 'Company Info',
					"method" => 'get',
				// <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-cloud-download"></i>&nbsp;Download</button>
					"contractAgreement" => '<label class="col-form-label col-md-12 col-sm-12 ">Contract and Agreements</label>															
									<a href="http://www.iitk.ac.in/dosa/Contract%20document.pdf" target="_new" class="btn btn-primary btn-sm"><i class="fa fa-cloud-download"></i>&nbsp;Download</a>
									',
					"actionButtons" => '<div class="col-md-2 col-sm-2  offset-md-10">
											<a href="#" class="btn btn-primary"><i class="fa fa-close"></i>&nbsp;exit</a>
										</div>',
					"infoMessage" => ''];
			break;
			case Common::$data['mode']['delete']:
					return [
						"title" => 'Delete Company Info',
						"method" => 'patch',
						"contractAgreement" => '<label class="col-form-label col-md-12 col-sm-12 ">Contract and Agreements</label>
												<a href="http://www.iitk.ac.in/dosa/Contract%20document.pdf" target="_new" class="btn btn-primary btn-sm"><i class="fa fa-cloud-download"></i>&nbsp;Download</a>',
						"actionButtons" => '<div class="col-md-4 col-sm-4  offset-md-8">
												<button type="button" class="btn btn-success"><i class="fa fa-trash"></i>&nbsp;Delete</button>
												<button type="submit" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;Exit</button>
											</div>',
						"infoMessage" => '<div class="alert alert-danger alert-dismissible " role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
											</button>
											Are you sure you want to delete this company?.
										</div>'];
			break;
            default:
                return [];
                break;
        }
    }
	

	public static function companyInfoForm($obj){
		$form = $companyName = $companyAlias = $licenses = $contract_end = $notes = $contract_start ="";

        if (!empty($obj)) {
            $title = $obj['title'];
            $method = $obj['method'];
            $contractAgreement = $obj['contractAgreement'];
            $actionButtons = $obj['actionButtons'];
            $infoMessage = $obj['infoMessage'];
        }

		$form .='
		
		<form class="form-horizontal form-label-rigth" id="companyRegistration" action="'.$_SERVER["REQUEST_URI"].'" methond="POST" autocomplete="off" enctype="multipart/form-data" onSubmit="return createCompanyValidation(this)">
		
		<div class="form-group row">
		  <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-name">Company Name <span class="required text-danger" >*</span>
		  </label>
		  <div class="col-md-6 col-sm-6 ">
			<input type="text" class="form-control has-feedback-left" id="company-name" name="companyName"  value="'.$companyName.'" required>
			<span class="fa fa-institution form-control-feedback left" aria-hidden="true"></span>
		  </div>
		</div>

		<div class="form-group row">
		  <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-alias">Company Alias <span class="required text-danger">*</span></label>
		  </label>
		  <div class="col-md-6 col-sm-6 ">
			<input type="text" class="form-control has-feedback-left" id="company-alias" name="companyAlias"  value="'.$companyAlias.'" required>
			<span class="fa fa-institution form-control-feedback left" aria-hidden="true"></span>
		  </div>
		</div>

		<div class="form-group row">
		  <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-license"> License </label>
		  </label>
		  <div class="col-md-6 col-sm-6 ">
			<input type="text" class="form-control has-feedback-left" id="company-license" name="License"  value="'.$companyAlias.'">
			<span class="fa fa-newspaper-o form-control-feedback left" aria-hidden="true"></span>
		  </div>
		</div>

		<div class="form-group row">
		  <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-contacts"> Account\'s Contact </label>
		  </label>
		  <div class="col-md-6 col-sm-6 ">
			<input type="text" class="form-control has-feedback-left" id="company-contacts" name="contacts"  value="">
			<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
		  </div>
		</div>

		<div class="form-group row">
		  <label class="col-form-label col-md-3 col-sm-3 label-align" for="company-contacts-email"> Account\'s Email </label>
		  </label>
		  <div class="col-md-6 col-sm-6 ">
			<input type="text" class="form-control has-feedback-left" id="company-contacts-email" name="contactsEmail"  value="">
			<span class="fa fa-paper-plane form-control-feedback left" aria-hidden="true"></span>
		  </div>
		</div>


		<div class="form-group row">
		  <label class="col-form-label col-md-3 col-sm-3 label-align" for=""> Contract and Agreements </label>
		  </label>
		  <div class="col-md-6 col-sm-6 ">
				<input type="file" name="fileupload[]"  id="fileupload"  class="file-upload" />
		  </div>
		</div>

		<div class="form-group row">
		  <label class="col-form-label col-md-3 col-sm-3 label-align" for="contractStart"> Contract Start </label>
		  </label>
		  <div class="col-md-3 col-sm-3 ">
			<input class="date-picker form-control"  id="contractStart" name="contractStart" value="" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type=\'date\'" onmouseover="this.type=\'date\'" onclick="this.type=\'date\'" onblur="this.type=\'text\'" onmouseout="timeFunctionLong(this)">
			<script>
				function timeFunctionLong(input) {
					setTimeout(function() {
						input.type = \'text\';
					}, 60000);
				}
			</script>
		  </div>
		</div>

		<div class="form-group row">
		  <label class="col-form-label col-md-3 col-sm-3 label-align" for="contractEnd"> Contract End </label>
		  </label>
		  <div class="col-md-3 col-sm-3 ">
			<input class="date-picker form-control"  id="contractEnd" name="contractEnd" value="" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type=\'date\'" onmouseover="this.type=\'date\'" onclick="this.type=\'date\'" onblur="this.type=\'text\'" onmouseout="timeFunctionLong(this)">
			<script>
				function timeFunctionLong(input) {
					setTimeout(function() {
						input.type = \'text\';
					}, 60000);
				}
			</script>
		  </div>
		</div>


		<div class="form-group row">
		  <label class="col-form-label col-md-3 col-sm-3 label-align" for="notes"> Notes </label>
		  </label>
		  <div class="col-md-6 col-sm-6 ">
		  		<textarea class="form-control" id="notes" name="notes" rows="3" value=""></textarea>	
		  </div>
		</div>

		';
				return $form;

	}
	public static function companyTemplate(){
		return '
		<div class="form-group row">
			<label class="col-form-label col-md-3 col-sm-3 label-align" for="companytemplate"> Select Existing Template </label>
			</label>
		<div class="col-md-6 col-sm-6 ">
		  
		<div id="searchfield">
			<input type="text" name="currency" class="biginput" id="autocomplete">
		</div>

		</div>
	  </div>

	  <div class="col-md-6 col-sm-6  offset-3">
	  <table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Structure ID</th>
					<th scope="col">Structure Name</th>
					<th scope="col">&nbsp;</th>
				</tr>
  			</thead>
				<tbody id="outputcontent">
							<tr id="prime" style="display: none">
							<th scope="row"></th>
							<td></td>
							<td></td>
							<td></td>
							</tr>
							'.self::rows(8).'
					
				</tbody>
		</table>
	</div>
	 
	  ';
	}

	public static function addUser(){
		return '
		





				<div class="form-group row">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="fname">First Name <span class="required text-danger">*</span></label>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" class="form-control has-feedback-left" id="fname" name="fname"  value="" required>
						<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="lname">Last Name <span class="required text-danger">*</span></label>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" class="form-control has-feedback-left" id="lname" name="lname"  value="" required>
						<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email Address <span class="required text-danger">*</span></label>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" class="form-control has-feedback-left" id="email" name="email"  value="" required>
						<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="pwd">Password </label>
					</label>
					<div class="col-md-6 col-sm-6 ">
					<input class="form-control" type="password" data-toggle="password" id="pwd">
						<p class="text-danger float-right"><b>Note: </b><i>If password isn\'t entered one will automatically be created.</i></p>
					</div>
					
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="mgr">Select Manager</label> </label>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" class="form-control has-feedback-left" id="mgr" name="mgr"  value="" >
						<span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
					</div>
					
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for=""> Currency </label>
					</label>
					<div class="col-md-6 col-sm-6 ">
							'.Currency::getCurrency().'
							<span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">User Permision</label>
					</label>
					<div class="col-md-6 col-sm-6 ">
					<div class="form-group row">
								<div class="col-md-9 col-sm-9 ">
									<div class="checkbox">
										<label>
											<input type="checkbox"  class="flat" checked="checked"> Admin
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" class="flat"> Manger
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" class="flat" > User
										</label>
									</div>
									
									
								</div>
							</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-2 col-sm-2 offset-8">
						<button  class="btn btn-primary" id="adduser">Add User</button>
					</div>
				</div>

				<div class="col-md-6 col-sm-6  offset-3">
					<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">First Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Email Address</th>
									<th scope="col">Currency</th>
									<th scope="col">Permision</th>
									<th scope="col">&nbsp;</th>
								</tr>
							</thead>
								<tbody id="userlist">
											<tr id="prime" style="display: none">
											<th scope="row"></th>
											<td></td>
											<td></td>
											<td></td>
											</tr>
											'.self::rows(3,'userlist').'
									
								</tbody>
						</table>
					</div>
		
				
				';
	}

	public static function rows($count, $type=null){
		$form = "";
		for ($i=0; $i < $count ; $i++) { 
			# code...
			$form .= '<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>';
			$form  .= ($type == "userlist") ? '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>' : '';
			$form .= '</tr>';
		}
		return $form;
	}
}