<?php 

class UserController extends CI_controller
{
	public function index()
	{
		$this->load->view('user/index');
	}
	
	public function single()
	{
		$this->load->view('user/single-page');
	}

	public function contact()
	{
		$this->load->view('user/contact');
	}

}




 ?>