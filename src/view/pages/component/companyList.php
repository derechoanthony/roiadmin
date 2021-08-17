<?php
namespace App\View\Pages\Component;

use App\Config\Common;

class CompanyList{
  private static $info=[
    "title"=>"List of Company"];
    public function __construct($request){
      $this->token = $request['token'];
	
		  $this->page = $request['page'];
    }
    public function CompanyListTemplate(){
      $form ="";
      
        $form .= ' <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>'.self::$info['title'].'</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                  <div class="col-sm-12">
          <div class="card-box table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Contact No.</th>
                  <th>Date of Registration</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>


              <tbody>
              ';
            
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => 'localhost:8080/api/v0/company/all',
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'GET',
                  CURLOPT_HTTPHEADER => array(
                    'token: 71478884240498fe0cee81acca4f8c5ecab89e3e7533a701252063af5327f219'
                  ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                $data = json_decode($response, true);

                // foreach ($data['data'][0] as $value=>$k) {
                //   var_dump($k['companyName'], true);
                // }
                for ( $index = 0; $index < count($data['data'][0]); $index++) {
                  $element = $data['data'][0][$index];
                  // var_dump($element['company_name']);
                  $form .='<tr>
                            <td>'.$element['company_name'].'</td>
                            <td>-</td>
                            <td>'.$element['created_dt'].'</td>
                            <td>Active</td>
                            <td class="action-btn">
                              <a style="display:none;" href="/admin/?t='.$this->token.'&&q='.Common::$urlQuery['company']['update'].'&&id='.$element['company_id'].'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit </a> 
                              <a style="display:none;" href="/admin/?t='.$this->token.'&&q='.Common::$urlQuery['company']['preview'].'&&id='.$element['company_id'].'" type="button" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> Preview </a> 
                              <a  style="display:none;" href="/admin/?t='.$this->token.'&&q='.Common::$urlQuery['company']['delete'].'&&id='.$element['company_id'].'" type="button" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete </a> 
                            </td>
                          </tr>';
                }
                // var_dump($data['data'][0]);
                
          $form .='
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
        </div>
      </div>';
      return $form;
    }
}