<?php

class Admin extends CI_Controller
{	
	public function __construct()
        {
                parent::__construct();
               $this->load->helper('url');
				$this->load->helper('form');
				$this->load->helper('file');
					 $this->load->helper('download');
				$this->load->model('register_model'); 
        }

	public function index()
	{	
		$this->load->view('home');
	}
	
	public function check()
	{
		if($_POST['submit']=="Login")
		{
			$this->load->view('login');
		}
		elseif ($_POST['submit']=="Register")
		{
			$this->load->view('register');
		}
	}
	
	public function register()
	{
		$this->load->view('register');
	}
	public function insert()
	{	
		unset($_POST['submit']);
		$data=array( 
			'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'address' => addslashes($this->input->post('address')),
          );
		$this->load->model('register_model'); 
		$this->register_model->insert($data);
		
	}
	
	public function edit()
	{
		$id = $this->uri->segment(3);
		$this->load->model('register_model'); 
		$result = $this->register_model->edit_record($id);
		$data['result'] = $result;
        $this->load->view('edit', array('data' => $data));
		
	}
	public function update()
	{
			//print_r($_POST);
			$this->load->model('register_model'); 
		$this->register_model->update($_POST);
	}
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('register_model'); 
		$result = $this->register_model->delete($id);
		redirect('admin');
	}
	function get_report(){
		 $name = 'name-'.time().'.csv';
	$table = $this->input->post('table');
    $this->load->dbutil(); 
    $delimiter = ","; 
    $newline = "\r\n";
    $filename = $name;  
$report = $this->register_model->get_data($table);
    $data = $this->dbutil->csv_from_result($report, $delimiter, $newline);
    if ( ! write_file(APPPATH. $name, $data))
    {
       echo 'Unable to write the file';
    }
    else 
   {
     force_download($name, $data);
   }
	
		

}
 public function set_invoice_details()
 {
	 if($_POST)
	 {
		$result = $this->register_model->set_invoice_details($_POST);
		if(isset($result))
		{
			$res['status'] = 'Data inserted successfully';
			echo $output = json_encode($res);
		}
	 }
	 else
	 {
			$res['status'] = 'Data Failed to Insert.';
			echo $output = json_encode($res);
	 }
	 
 }
  public function set_individual_details()
 {
	 if($_POST)
	 {
		$result = $this->register_model->set_individual_details($_POST);
		if(isset($result))
		{
			$res['status'] = 'Data inserted successfully';
			echo $output = json_encode($res);
		}
	 }
	 else
	 {
			$res['status'] = 'Data Failed to Insert.';
			echo $output = json_encode($res);
	 }
	 
 }
   public function set_details_of_old_ac()
 {
	 if($_POST)
	 {
		$result = $this->register_model->set_detils_of_old_ac($_POST);
		if(isset($result))
		{
			$res['status'] = 'Data inserted successfully';
			echo $output = json_encode($res);
		}
	 }
	 else
	 {
			$res['status'] = 'Data Failed to Insert.';
			echo $output = json_encode($res);
	 }
	 
 }
     public function set_details_of_new_ac()
 {
	 if($_POST)
	 {
		$result = $this->register_model->set_detils_of_new_ac($_POST);
		if(isset($result))
		{
			$res['status'] = 'Data inserted successfully';
			echo $output = json_encode($res);
		}
	 }
	 else
	 {
			$res['status'] = 'Data Failed to Insert.';
			echo $output = json_encode($res);
	 }
	 
 }
    public function set_customer_sign()
 {
	 if($_POST)
	 {
		$result = $this->register_model->set_customer_sign($_POST);
		if(isset($result))
		{
			$res['status'] = 'Data inserted successfully';
			echo $output = json_encode($res);
		}
	 }
	 else
	 {
			$res['status'] = 'Data Failed to Insert.';
			echo $output = json_encode($res);
	 } 
	 
 }
}

?>