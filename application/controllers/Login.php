<?php
class Login extends CI_Controller
{	
	public function __construct()
        {
                parent::__construct();
				
               
        }

	public function index()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('login');
	}
	
	 public function login()
	{	
		
		unset($_POST['submit']);
		$data=array( 
			'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            
			
          );
		$this->load->model('login_model'); 
		$this->login_model->login($data);
		redirect('admin/index');
	} 
	
	public function allrecords()
	{
		$this->load->model('login_model');
		$result = $this->login_model->allrecords();
		//$this->load->view('allrecords',$result);
		
		if(isset($result))
		{
        $data['result'] = $result;
        $this->load->view('allrecords', array('data' => $data));

		} 
		else
			{

			echo "No records";

		}
	}
	
	public function logout()
	{
		unset($_SESSION['name']);
		redirect('admin');
	}
}