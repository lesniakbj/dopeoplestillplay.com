<?php
class Statics extends CI_Controller {

        public function viewpage($page = 'home')
	{
	        if ( ! file_exists(APPPATH.'/views/statics/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }
	
	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        $data['css'] = 'css/statics/'.$page.'.css';
	
	        $this->load->view('templates/header', $data);
	        $this->load->view('statics/'.$page, $data);
	        $this->load->view('templates/footer', $data);
	}
}