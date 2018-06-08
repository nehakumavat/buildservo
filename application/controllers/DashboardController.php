<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function dashboard()
	{
            if(!$this->session->userdata('logged_in')){
                $this->session->set_flashdata('access_denied', 'Session Expired...Please Login...');
                redirect('LoginController/index', 'refresh');
            }else{
                $data['user_details']=$this->session->userdata();
                $this->load->view('includes/header');
                $this->load->view('includes/sidebar');
                $this->load->view('dashboard',$data);
                $this->load->view('includes/footer');
            }
	}
}
