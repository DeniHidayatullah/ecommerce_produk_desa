<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
	public function index(){
		if(!isset($_SESSION["isMasok"])){
			redirect("admin/login");
			exit;
		}else{
			$data['title'] = "Dashboard";
			$this->load->view('admin/header',$data);
			$this->load->view('admin/dashboard');
			$this->load->view('admin/footer');
		}
	}
	
	public function login(){
		if(isset($_POST["username"])){
			redirect("404_nf");
		}else{
			$this->load->view("admin/login");
		}
	}
	public function auth(){
		if(isset($_POST["username"])){
			//$this->session->sess_destroy();

			$this->db->where("username",$_POST["username"]);
			$db = $this->db->get("admin");
			
			if($db->num_rows() > 0){
				foreach($db->result() as $r){
					if($_POST["pass"] == $this->func->decode($r->password)){
						$this->session->set_userdata("isMasok",true);
						$this->session->set_userdata("usrid",$r->id);
						$this->session->set_userdata("level",$r->level);
						
						echo json_encode(array("success"=>true,"name"=>$_POST["username"]));
					}else{
						echo json_encode(array("success"=>false));
					}
				}
			}else{
				echo json_encode(array("success"=>false));
			}
		}else{
			echo json_encode(array("success"=>false));
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("admin/login");
	}
}