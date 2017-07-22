<?php

	class Login_model extends CI_Model {
	
		 public function login($data)
        {	
			
			
                $username = $data['username']; 
                $password  = $data['password'];
                $query = $this->db->query("SELECT * FROM register;");
				$result = $query->result();
				
				foreach ($result as $user)
				{
						if($user->username == $username && $user->password == $password)
						{
							$flag=1;
						}
						
				}
								
				
               
			   if(isset($flag))
			   {
				echo "Login Successful";
				$this->session->set_userdata('name',$username);
			   }
			else{
				echo "Invalid Username Password";
			}
				
        }
		
		public function allrecords()
		{
			$query = $this->db->query("SELECT * FROM register;");
				$result = $query->result();
				return $result;
		}

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

}