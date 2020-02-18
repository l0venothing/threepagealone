<?php 
class Llistelangues {
  
    function __construct() {
         $this->ci =& get_instance();
    }
 
    public function initPagination($base_url,$total_rows,$uri_segment,$limit){
        $config['per_page']          = 80;
        $config['uri_segment']       = $uri_segment;
        $config['base_url']          = $base_url;
        $config['total_rows']        = $total_rows;
        $config['use_page_numbers']  = TRUE;
        
        $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination pagination-sm">';
        $config['full_tag_close'] 	= '</ul></nav></div>';
        $config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] 	= '</span></li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] 	= '</span></li>';
        $config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close']     = '</span></li>';
        $config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] 	= '</span></li>';
        $config['last_link']            = '&rsaquo;&rsaquo;';
        $config['first_link']           = '&lsaquo;&lsaquo;';
        
        $this->ci->pagination->initialize($config);
        return $config;    
    }
    
}