<?php
namespace App\View\template;

use App\Config\Common;

class library {
    public function __construct(){
        
    }
  public static function getLibraries() {
    $css_directory = Common::$directory['asset']['css'];
    $js_directory = Common::$directory['asset']['js'];
    return  ['css'=>[
                      '404' => '<!-- Bootstrap -->
                                  <link href="'.$css_directory.'/bootstrap.min.css" rel="stylesheet">
                                  <!-- Font Awesome -->
                                  <link href="'.$css_directory.'/font-awesome.min.css" rel="stylesheet">
                                  <!-- NProgress -->
                                  <link href="'.$css_directory.'/nprogress.css" rel="stylesheet">
                                  <!-- Custom Theme Style -->
                                  <link href="'.$css_directory.'/custom.min.css" rel="stylesheet">',
                      'forms' => '<!-- Bootstrap -->
                                  <link href="'.$css_directory.'/bootstrap.min.css" rel="stylesheet">
                                  <!-- Font Awesome -->
                                  <link href="'.$css_directory.'/font-awesome.min.css" rel="stylesheet">
                                  <!-- NProgress -->
                                  <link href="'.$css_directory.'/nprogress.css" rel="stylesheet">
                                  <!-- iCheck -->
                                  <link href="'.$css_directory.'/green.css" rel="stylesheet">
                                  <!-- bootstrap-wysiwyg -->
                                  <link href="'.$css_directory.'/prettify.min.css" rel="stylesheet">
                                  <!-- Select2 -->
                                  <link href="'.$css_directory.'/select2.min.css" rel="stylesheet">
                                  <!-- Switchery -->
                                  <link href="'.$css_directory.'/switchery.min.css" rel="stylesheet">
                                  <!-- starrr -->
                                  <link href="'.$css_directory.'/starrr.css" rel="stylesheet">
                                  <!-- bootstrap-daterangepicker -->
                                  <link href="'.$css_directory.'/daterangepicker.css" rel="stylesheet">                                
                                  <!-- Custom Theme Style -->
                                  <link href="'.$css_directory.'/custom.min.css" rel="stylesheet">
                                  ',
                        'dynamicTable' => '<!-- Bootstrap -->
                                        <link href="'.$css_directory.'/jquery.dataTables.min.css">
                                        <link href="'.$css_directory.'/bootstrap.min.css" rel="stylesheet">
                                        <!-- Font Awesome -->
                                        <link href="'.$css_directory.'/font-awesome.min.css" rel="stylesheet">
                                        <!-- NProgress -->
                                        <link href="'.$css_directory.'/nprogress.css" rel="stylesheet">
                                        <!-- iCheck -->
                                        <link href="'.$css_directory.'/green.css" rel="stylesheet">
                                        <!-- Datatables -->
                                        
                                        <link href="'.$css_directory.'/dataTables.bootstrap.min.css" rel="stylesheet">
                                        <link href="'.$css_directory.'/buttons.bootstrap.min.css" rel="stylesheet">
                                        <link href="'.$css_directory.'/fixedHeader.bootstrap.min.css" rel="stylesheet">
                                        <link href="'.$css_directory.'/responsive.bootstrap.min.css" rel="stylesheet">
                                        <link href="'.$css_directory.'/scroller.bootstrap.min.css" rel="stylesheet">
                                
                                        <!-- Custom Theme Style -->
                                        <link href="'.$css_directory.'/custom.min.css" rel="stylesheet">
                                        <link href="'.$css_directory.'/main.css" rel="stylesheet">
                                        '
                      
                      ],
              'js'=>[
                      '404'=>'<!-- jQuery -->
                              <script src="'.$js_directory.'/jquery.min.js"></script>
                              <!-- Bootstrap -->
                              <script src="'.$js_directory.'/bootstrap.bundle.min.js"></script>
                              <!-- FastClick -->
                              <script src="'.$js_directory.'/fastclick.js"></script>
                              <!-- NProgress -->
                              <script src="'.$js_directory.'/nprogress.js"></script>                
                              <!-- Custom Theme Scripts -->
                              <script src="'.$js_directory.'/custom.min.js"></script>',
                      'forms' => '<!-- jQuery -->
                                <script src="'.$js_directory.'/jquery.min.js"></script>
                            <!-- Bootstrap -->
                                <script src="'.$js_directory.'/bootstrap.bundle.min.js"></script>
                            <!-- FastClick -->
                                <script src="'.$js_directory.'/fastclick.js"></script>
                            <!-- NProgress -->
                                <script src="'.$js_directory.'/nprogress.js"></script>
                            <!-- bootstrap-progressbar -->
                                <script src="'.$js_directory.'/bootstrap-progressbar.min.js"></script>
                            <!-- iCheck -->
                                <script src="'.$js_directory.'/icheck.min.js"></script>
                            <!-- bootstrap-daterangepicker -->
                                <script src="'.$js_directory.'/moment.min.js"></script>
                                <script src="'.$js_directory.'/daterangepicker.js"></script>
                            <!-- bootstrap-wysiwyg -->
                                <script src="'.$js_directory.'/bootstrap-wysiwyg.min.js"></script>
                                <script src="'.$js_directory.'/jquery.hotkeys.js"></script>
                                <script src="'.$js_directory.'/prettify.js"></script>
                            <!-- jQuery Tags Input -->
                                <script src="'.$js_directory.'/jquery.tagsinput.js"></script>
                            <!-- Switchery -->
                                <script src="'.$js_directory.'/switchery.min.js"></script>
                            <!-- Select2 -->
                                <script src="'.$js_directory.'/select2.full.min.js"></script>
                            <!-- Parsley -->
                                <script src="'.$js_directory.'/parsley.min.js"></script>
                            <!-- Autosize -->
                                <script src="'.$js_directory.'/autosize.min.js"></script>
                            <!-- jQuery autocomplete -->
                                <script src="'.$js_directory.'/jquery.autocomplete.min.js"></script>
                            <!-- starrr -->
                                <script src="'.$js_directory.'/starrr.js"></script>
                            <!-- Custom Theme Scripts -->
                                <script src="'.$js_directory.'/custom.min.js"></script>
                            <!-- jQuery Smart Wizard -->
                                <script src="'.$js_directory.'/bootstrap-show-password.min.js"></script>
                                <script src="'.$js_directory.'/jquery.smartWizard.js"></script>
                                <script src="'.$js_directory.'/jquery.autocomplete.min.js"></script>
                                <script src="'.$js_directory.'/modules/helper.js"></script>
                                <script src="'.$js_directory.'/modules/company.module.js"></script>
                                <script src="'.$js_directory.'/modules/services/company.js"></script>
                               
                            ',
                    'dynamicTable'=>'<!-- jQuery -->
                                <script src="'.$js_directory.'/jquery.min.js"></script>
                                <!-- Bootstrap -->
                                <script src="'.$js_directory.'/bootstrap.bundle.min.js"></script>
                                <!-- FastClick -->
                                <script src="'.$js_directory.'/fastclick.js"></script>
                                <!-- NProgress -->
                                <script src="'.$js_directory.'/nprogress.js"></script>
                                <!-- iCheck -->
                                <script src="'.$js_directory.'/icheck.min.js"></script>
                                <!-- Datatables -->
                                <script src="'.$js_directory.'/jquery.dataTables.min.js"></script>
                                <script src="'.$js_directory.'/dataTables.bootstrap.min.js"></script>
                                <script src="'.$js_directory.'/dataTables.buttons.min.js"></script>
                                <script src="'.$js_directory.'/buttons.bootstrap.min.js"></script>
                                
                                <script src="'.$js_directory.'/buttons.flash.min.js"></script>
                                <script src="'.$js_directory.'/buttons.html5.min.js"></script>
                                <script src="'.$js_directory.'/buttons.print.min.js"></script>
                                <script src="'.$js_directory.'/dataTables.fixedHeader.min.js"></script>
                                
                                <script src="'.$js_directory.'/dataTables.keyTable.min.js"></script>
                                <script src="'.$js_directory.'/dataTables.responsive.min.js"></script>
                                <script src="'.$js_directory.'/responsive.bootstrap.js"></script>
                                <script src="'.$js_directory.'/dataTables.scroller.min.js"></script>
                                <script src="'.$js_directory.'/jszip.min.js"></script>
                                <script src="'.$js_directory.'/pdfmake.min.js"></script>
                                <script src="'.$js_directory.'/vfs_fonts.js"></script>
                                
                                <!-- Custom Theme Scripts -->
                                <script src="'.$js_directory.'/custom.min.js"></script>
                                <script src="'.$js_directory.'/companyModule.js"></script>
                                '
              ]
            ];
  }
  
}