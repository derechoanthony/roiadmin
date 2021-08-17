<?php
namespace App\View\Pages;
use App\View\Template\Main;

class pageNotFound {
    public function __construct(){
        
    }
  public  function get404Page() {
    $arg = [
            'library'=>'404',
            'content'=>'<div class="container body">
                            <div class="main_container">
                              <!-- page content -->
                              <div class="col-md-12">
                                <div class="col-middle">
                                  <div class="text-center text-center">
                                    <h1 class="error-number">403</h1>
                                    <h2>Access denied</h2>
                                    <p>Full authentication is required to access this resource.
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <!-- /page content -->
                            </div>
                          </div>'];
    $template = new Main($arg);

    return $template->getTemplate();
  }
  
}