<?php
namespace App\View\Template;
use App\View\template\library;
use App\Config\Common;


class Main {
    public function __construct($data){
        $this->template = $data['library'];
        $this->content = $data['content'];
        $this->token = $data['request']['token'];
    }
  public  function getTemplate() {
    $form = "";
    $libraries = library::getLibraries();
    $form .='<!DOCTYPE html>
                <html lang="en">
                  <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <!-- Meta, title, CSS, favicons, etc. -->
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                
                    <title>The ROI Shop | Admin </title>';
    $form .= $libraries['css'][$this->template];
    $form .= '</head>';
    $form .= '<body class="nav-md">';
    if($this->template === '404'){
      $form .= $this->content;
    }else{
      $form .= '<div class="container body">';
      $form .= '<div class="main_container">';
      
      $form .= '<div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                
                <div class="navbar nav_title" style="border: 0;">
                  <a href="#" class="site_title"><img src="'.Common::$directory['asset']['img'].'/logo.png" alt=""> </a>
                </div>

					      <div class="clearfix"></div>
                ';
      $form .= self::profileQuickInfo();
      $form .= $this->sidebarMenu();
      
      $form .= '</div>';
      $form .= '</div>';
      $form .= self::topNavigation();
      //content area
      $form .='<div class="right_col" role="main" >';
      $form .='<div class="">';
      $form .='<div class="clearfix"></div>';
      $form .= $this->content;
      $form .= '</div>';
      $form .= '</div>';
      //end of conetent area
      $form .='</div>';
      $form .='</div>';
      $form .= self::footer();
    }    
    $form .= $libraries['js'][$this->template];
    $form .='</body>';
    $form .='</html>';
    return $form;
  }
  /**
   * profile quick info
   */
  private static function profileQuickInfo(){
    return '<!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="'.Common::$directory['asset']['img'].'/149071.png" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2>John Doe</h2>
                </div>
              </div><br />
            <!-- /menu profile quick info -->';
  }

  /**
   * side menu bar
   */
  private function sidebarMenu(){
    return '<!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3>General</h3>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Company <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/admin/?t='.$this->token.'&&q='.Common::$urlQuery['company']['entry'].'">Create</a></li>
                        <li><a href="/admin/?t='.$this->token.'&&q='.Common::$urlQuery['company']['list'].'">List</a></li>
                      </ul>
                    </li>
                    <!--<li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="form.html">General Form</a></li>
                        <li><a href="form_advanced.html">Advanced Components</a></li>
                        <li><a href="form_validation.html">Form Validation</a></li>
                        <li><a href="form_wizards.html">Form Wizard</a></li>
                        <li><a href="form_upload.html">Form Upload</a></li>
                        <li><a href="form_buttons.html">Form Buttons</a></li>
                      </ul>
                    </li> -->
                   
                    
                  </ul>
                </div>
                

              </div>
              <!-- /sidebar menu -->';
  }

  /**
   * Footer
   */
  private static function footer() {
    return '<!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->';
  }

  /**
   * Top Navigation
   */
  private static function topNavigation(){
    return '<div class="top_nav">
    <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              <img src="'.Common::$directory['asset']['img'].'/149071.png" alt="">John Doe
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="javascript:;"> Profile</a>
              <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>';
  }
  
  
}