<?php
	class Register_model extends CI_Model {
		 public function insert($data)
        {	
                $this->username    = $data['username']; 
                $this->password  = $data['password'];
                $this->address  = $data['address'];
               $success = $this->db->insert('register', $this); 
			   if(isset($success))
			   {
				echo "Inserted Successfully";
			   }
        }
		public function edit_record($id)
		{					$query = $this->db->select(['*'])
											->from('register')
											->where( ['id' => $id] )
											->get();
				return $query->result();
		}
		public function update($data)
		{
			 $this->db->where('id', $data['id']);
			$this->db->update('register	', $data);
			echo "Record updated"; 	
		}
		public function delete($id)
		{
			  $this->db->where('id', $id);
				$this->db->delete('register');
				echo "recored deleted";
		}
		public function get_data($table)
		{
		$query = $this->db->get($table);
		return $query;
		} 
		public function set_invoice_details($data)
		{
			 $query = $this->db->insert('invoice_details', $data);
			 return $query;
		}
		public function set_customer_sign($data)
		{
			 $query = $this->db->insert('customer_sign', $data);  
			  return $query;
		}
		public function set_individual_details($data)
		{
			 $query = $this->db->insert('individual_details', $data);  
			  return $query;
		}
		public function set_detils_of_old_ac($data)
		{
			 $query = $this->db->insert('details_of_old_ac', $data);  
			  return $query;
		}
		public function set_detils_of_new_ac($data)
		{
			 $query = $this->db->insert('details_of_new_ac', $data);  
			  return $query;
		}
}