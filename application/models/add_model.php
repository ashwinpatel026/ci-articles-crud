<?php 
   Class Add_model extends CI_Model { 
	
      Public function __construct() 
      { 
         parent::__construct(); 
      }

      Public function get_data()
      {
      	$this->db->select('*');
      	$this->db->from('tbl_employee');
      	$all = $this->db->get()->result_array();
      	return $all;
      }

      Public function add_all_data($data)
      {
      	
      	$name = $data['name'];
      	$email = $data['email'];
      	$gender = $data['gender'];
      	$hobby = $data['hobby'];
      	$city = $data['city'];

      	$ins = $this->db->insert('tbl_employee',['name'=>$name,'email'=>$email,'gender'=>$gender,'hobby'=>$hobby,'city'=>$city]);
      	return $ins;

      }

      Public function add_row_data($id)
      {
      	$this->db->select('*');
      	$this->db->from('tbl_employee');
      	$this->db->where('id',$id);
      	$all = $this->db->get()->row_array();
      	return $all;
      }

      Public function update_record($data)
      {
      	$name = $data['name'];
      	$email = $data['email'];
      	$gender = $data['gender'];
      	$hobby = $data['hobby'];
      	$city = $data['city'];
      	$id = $data['id'];
      	$this->db->where('id',$id);
      	$ins = $this->db->update('tbl_employee',['name'=>$name,'email'=>$email,'gender'=>$gender,'hobby'=>$hobby,'city'=>$city]);
      	return $ins;
      }

   } 
?> 