<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pesanan extends CI_Controller {
    public function index(){
		if(!isset($_SESSION["isMasok"])){
			redirect("ngadimin/login");
			exit;
		}else{
			$this->load->view('admin/head',["menu"=>1]);
			$this->load->view('admin/home');
			$this->load->view('admin/foot');
		}
	}
	
	public function off404(){
		$this->load->view('404notfound');
	}
	
	public function keytes(){
		echo $this->func->decode("da9a630587e6a7805e9a31481ef4d8bd138204792e5601b8027bdc600a3adb5ea2a4ebc03abd37127ad3793d12c383526f094ed246aa97dcbc70974e8ea97631W1A+93/KKav7n+Ft03koP3J0f9PTnpD74ohYZaA+WiM=");
	}
	public function updatenow(){
		$this->db->update("produk",["stok"=>100]);
	}

    /* PESANAN */
    public function pesanan(){
		if(!isset($_SESSION["isMasok"])){
			redirect("ngadimin/login");
			exit;
		}
		
		$this->load->view('admin/head',["menu"=>2]);
		$this->load->view('admin/pesanan');
		$this->load->view('admin/foot');
	}
    	/* PRE ORDER */
	public function preorder(){
		if(!isset($_SESSION["isMasok"])){
			redirect("ngadimin/login");
			exit;
		}
		
		if(isset($_GET["load"])){
			$this->load->view('admin/preorderlist');
		}else{
			$this->load->view('admin/head',["menu"=>13]);
			$this->load->view('admin/preorder');
			$this->load->view('admin/foot');
		}
    }

    	/* PESAN */
    public function pesan(){
		if(!isset($_SESSION["isMasok"])){
			redirect("ngadimin/login");
			exit;
		}
		
		if(isset($_GET["load"])){
			$this->load->view('admin/pesanmasuk');
		}else{
			$this->load->view('admin/head',["menu"=>4]);
			$this->load->view('admin/pesan');
			$this->load->view('admin/foot');
		}
	}
}
	