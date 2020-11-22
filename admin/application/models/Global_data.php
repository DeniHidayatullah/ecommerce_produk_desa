<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem !! ');
class Global_data extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

	function demo(){
		return false;
	}
	function mainsite_url($url){
		$mainsite = "http://localhost/coba/admin/";
		$url = $mainsite.$url;
		return $url;
	}

	function globalset($data){
		if($data != "semua"){
		$this->db->where("field",$data);
		}
		$res = $this->db->get("setting");
		$result = null;
		if($data == "semua"){
			$result = array(null);
			foreach($res->result() as $re){
				$result[$re->field] = $re->value;
			}
			$result = (object)$result;
		}else{
			$result = "";
			foreach($res->result() as $re){
				$result = $re->value;
			}
		}
		return $result;
	}

	function maintenis(){
		//return true;
		return false;
	}

	// PEMBAYARAN
	function getBayar($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("pembayaran");

		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	
	// GET ALAMAT
	function getAlamat($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("alamat");

		if($res->num_rows() > 0){
			if($what == "semua"){
				foreach($res->result() as $key => $value){
					$result[$key] = $value;
				}
				$result = $result[0];
			}else{
				foreach($res->result() as $re){
					$result = $re->$what;
				}
			}
		}else{
			$result = new stdClass();
			$result->nama = "";
			$result->alamat = "";
			$result->judul = "";
			$result->kodepos = "";
			$result->nohp = "";
			$result->idkec = 0;
			$result->usrid = 0;
			$result->status = 0;
		}
		return $result;
	}

	// GET LOKASI
	function getKec($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("kec");

		$result = "kecamatan tidak ditemukan";
		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	function getKab($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("kab");

		$result = "kabupaten tidak ditemukan";
		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			foreach($res->result() as $re){
				if(is_array($what)){
					$result = array();
					for($i=0; $i<count($what); $i++){
						$result[$what[$i]] = $re->$what[$i];
					}
				}else{
					$result = $re->$what;
				}
			}
		}
		return $result;
	}
	function getProv($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("prov");

		$result = "provinsi tidak ditemukan";
		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			foreach($res->result() as $re){
				if(is_array($what)){
					$result = array();
					for($i=0; $i<count($what); $i++){
						$result[$what[$i]] = $re->$what[$i];
					}
				}else{
					$result = $re->$what;
				}
			}
  		}
		return $result;
	}

	// GET WHATSAPP
	function getWasap($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("wasap");

		if($what == "semua"){
			$result = array(0);
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	function getRandomWasap(){
		$this->db->order_by("tgl","ASC");
		$this->db->limit(1);
		$res = $this->db->get("wasap");
		
		$result = 0;
		foreach($res->result() as $r){
			if(substr($r->wasap,0,1) == 0){
				$result = "+62".substr($r->wasap,1);
			}elseif(substr($r->wasap,0,2) == "62"){
				$result = "+".$r->wasap;
			}elseif(substr($r->wasap,0,1) == "+"){
				$result = $r->wasap;
			}
		}
		return $result;
	}

	// GET PRODUK
	function getProduk($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("produk");

		if($what == "semua"){
			$result = array(0);
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	function getFoto($id,$kat){
		$server = base_url('uploads/');
		$this->db->where("idproduk",$id);
		if($kat == "utama"){
			$this->db->where("jenis",1);
		}
		$this->db->limit(1);
		$res = $this->db->get("upload");

		$result = "default.jpg";
		foreach($res->result() as $re){
			$result = $server.'/'.$re->nama;
		}
		return $result;
	}
	function getUpload($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$res = $this->db->get("upload");
		foreach($res->result() as $re){
			$result = $re->$what;
		}
		return $result;
	}
	function getFotoUpload($id,$what,$opo="id"){
		$this->db->where("idproduk",$id);
		if($opo == "utama"){
			$this->db->where("jenis",1);
		}
		$res = $this->db->get("upload");
		foreach($res->result() as $re){
			$result = $re->$what;
		}
		return $result;
	}

	// GET VARIASI PRODUK
	function getVariasi($id,$what,$opo="idproduk"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("produkvariasi");

		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $res->num_rows() > 0 ? $result[0] : null;
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	function getVariasiWarna($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("variasiwarna");

		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	function getVariasiSize($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("variasisize");

		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	function getVariasiList($id,$opo="idproduk"){
		$this->db->where($opo,$id);
		$res = $this->db->get("produkvariasi");

		$warnalis = array();
		$warna = array();
		$stok = array();
		foreach($res->result() as $re){
			$stl = ($re->stok > 0) ? " class='text-primary'" : " class='text-danger'";
			$warnalis[] = $re->warna;
			$warna[$re->warna] = (!isset($warna[$re->warna])) ? $this->getVariasiWarna($re->warna,"nama") : $warna[$re->warna];
			$stok[$re->warna][$re->size] = $this->getVariasiSize($re->size,"nama")." (<b$stl>".$re->stok."</b> pcs), ";
		}

		$warnalis = array_unique($warnalis);
		$warnalis = array_values($warnalis);
		$result = "";
		for($i=0; $i<count($warnalis); $i++){
			$result .= "<i><b>".strtoupper(strtolower($warna[$warnalis[$i]]))."</b></i><br/>";
			$result .= implode("",$stok[$warnalis[$i]]);
			$result .= "<div class='m-b-8'></div>";
		}

		return $result;
	}

	// GET TRANSAKSI
	function getTransaksi($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("transaksi");

		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}

	// GET USERDATA
	function getProfil($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("profil");

		if($what == "semua"){
			$result = array("User tidak ditemukan");
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	function getUser($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("admin");

		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	function getUserdata($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("userdata");

		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	
	/* PLAYLIST */
	function getPlaylist($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("topsong");

		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	function getJmlPesanan(){
		$this->db->where("status<=",1);
		$db = $this->db->get("transaksi");
		
		return $db->num_rows();
	}
	function getJmlPesan(){
		$this->db->where("tujuan",0);
		$this->db->where("baca",0);
		$this->db->group_by("dari");
		$this->db->order_by("id DESC");
		$db = $this->db->get("pesan");
		
		return $db->num_rows();
	}
	
	// GET BLOG
	function getBlog($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("blog");

		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	
	// GET BANK
	function getBank($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("rekeningbank");

		if($what == "semua"){
			$result = array();
			foreach($res->result() as $key => $value){
				$result[$key] = $value;
			}
			$result = $result[0];
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}
	function getRekening($id,$what,$opo="id"){
		$this->db->where($opo,$id);
		$this->db->limit(1);
		$res = $this->db->get("rekening");

		if($what == "semua"){
			$result = array();
      if($res->num_rows() > 0){
  			foreach($res->result() as $key => $value){
  				$result[$key] = $value;
  			}
  			$result = $result[0];
      }
		}else{
			$result = null;
			foreach($res->result() as $re){
				$result = $re->$what;
			}
		}
		return $result;
	}

	// VERIFIKASI
	function sendEmail($tujuan,$judul,$pesan,$subyek,$pengirim=null){
		$data = array(
			"jenis"		=> 1,
			"tujuan"	=> $tujuan,
			"judul"		=> $judul,
			"pesan"		=> $pesan,
			"subyek"	=> $subyek,
			"pengirim"	=> $pengirim,
			"tgl"		=> date("Y-m-d H:i:s"),
			"status"	=> 0
		);
		$this->db->insert("notifikasi",$data);

		return true;
	}
	function sendEmailOK($tujuan,$judul,$pesan,$subyek,$pengirim=null){
		$this->load->library('email');
		$seting = $this->globalset("semua");
		if($seting->email_jenis == 2){
			$config['protocol'] = "smtp";
			$config['smtp_host'] = $seting->email_server;
			$config['smtp_port'] = $seting->email_port;
			$config['smtp_user'] = $seting->email_notif;
			$config['smtp_pass'] = $seting->email_password;
		}
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$this->email->initialize($config);

		$this->email->from($seting->email_notif, $judul);
		$this->email->to($tujuan);
		if($pengirim != null){
		$this->email->cc($pengirim);
		}

		$pesan = $this->load->view("email_template",array("content"=>$pesan),true);
		$this->email->subject($subyek);
		$this->email->message($pesan);

		if($this->email->send()){
		return true;
		}else{
		//show_error($this->email->print_debugger());
		return false;
		}
	}
	public function sendWA($nomer,$pesan){
		$data = array(
			"jenis"		=> 2,
			"tujuan"	=> $nomer,
			"pesan"		=> $pesan,
			"tgl"		=> date("Y-m-d H:i:s"),
			"status"	=> 0
		);
		$this->db->insert("notifikasi",$data);
		
		return true;
	}
	public function sendWAOK($nomer,$pesan){
		$key = $this->globalset("woowa");
		$nomer = intval($nomer);
		$nomer = substr($nomer,0,2) != "62" ? "+62".$nomer : "+".$nomer;
		$url='http://116.203.92.59/api/send_message';
		$data = array(
		"phone_no"	=> $nomer,
		"key"		=> $key,
		"message"	=> $pesan."\n".date("Y/m/d H:i:s")
		);
		$data_string = json_encode($data);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 360);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string))
		);
		$res = curl_exec($ch);
		curl_close($ch);

		if($res == "success"){
			return true;
		}else{
			return false;
		}
	}

	// SEND NOTIF
	function notiftransfer($order_id=null){
		if($order_id != null){
			$bayar = $this->getBayar($order_id,"semua");
			$trx = $this->getTransaksi($bayar->id,"semua","idbayar");
			$alamat = $this->getAlamat($trx->alamat,"semua");
			$usr = $this->getUserdata($bayar->usrid,"semua");
			$diskon = $bayar->diskon != 0 ? "Diskon: <b>Rp ".$this->formUang($bayar->diskon)."</b><br/>" : "";
			$diskonwa = $bayar->diskon != 0 ? "Diskon: *Rp ".$this->formUang($bayar->diskon)."*\n" : "";
			$toko = $this->globalset("semua");

			$rekening = "";
			$rekeningwa = "";
			$this->db->where("usrid",0);
			$rek = $this->db->get("rekening");
			foreach($rek->result() as $res){
				$bank = strtoupper($this->getBank($res->idbank,"nama"));
				$rekening .= "
					<b>".$bank." - ".$res->norek."</b><br/>
					a/n ".$res->atasnama."<br/>
				";
				$rekeningwa .= "
					*".$bank." - ".$res->norek."* \n
					a/n ".$res->atasnama." \n
				";
			}

			$pesan = "
				Halo <b>".$usr->nama."</b><br/>".
				"Terimakasih, sudah membeli produk kami.<br/>".
				"Segera lakukan pembayaran agar pesananmu segera diproses<br/> <br/>".
				"<b>Transfer pembayaran ke rekening berikut</b><br/>".
				$rekening.
				"<br/>".
				"<b>Detail Pesanan</b><br/>".
				"No Invoice: <b>#".$bayar->invoice."</b><br/>".
				"Total Pesanan: <b>Rp ".$this->formUang($bayar->total)."</b><br/>".
				"Ongkos Kirim: <b>Rp ".$this->formUang($trx->ongkir)."</b><br/>".$diskon.
				"Kurir Pengiriman: <b>".strtoupper($trx->kurir." ".$trx->paket)."</b><br/> <br/>".
				"Detail Pengiriman <br/>".
				"Penerima: <b>".$alamat->nama."</b> <br/>".
				"No HP: <b>".$alamat->nohp."</b> <br/>".
				"Alamat: <b>".$alamat->alamat."</b>".
				"<br/> <br/>".
				"Informasi cara pembayaran dan status pesananmu langsung di menu:<br/>".
				"<a href='".$this->mainsite_url("manage/pesanan")."'>PESANANKU &raquo;</a>
			";
			$this->sendEmail($usr->username,$toko->nama,$pesan,"Pesanan");
			$pesan = "
				Halo *".$usr->nama."* \n".
				"Terimakasih, sudah membeli produk kami. \n".
				"Segera lakukan pembayaran agar pesananmu segera diproses \n \n".
				"*Transfer pembayaran ke rekening berikut:* \n".
				$rekeningwa."\n".
				" \n".
				"*Detail Pesanan* \n".
				"No Invoice: *#".$bayar->invoice."* \n".
				"Total Pesanan: *Rp ".$this->formUang($bayar->total)."* \n".
				"Ongkos Kirim: *Rp ".$this->formUang($trx->ongkir)."* \n".$diskon.
				"Kurir Pengiriman: *".strtoupper($trx->kurir." ".$trx->paket)."* \n  \n".
				"Detail Pengiriman  \n".
				"Penerima: *".$alamat->nama."*  \n".
				"No HP: *".$alamat->nohp."*  \n".
				"Alamat: *".$alamat->alamat."*".
				" \n  \n".
				"Informasi cara pembayaran dan status pesananmu langsung di menu: \n".
				"*PESANANKU*
			";
			$this->sendWA($this->getProfil($usr->id,"nohp","usrid"),$pesan);
		}
	}
	function notifsukses($order_id=null){
		if($order_id != null){
			$bayar = $this->getBayar($order_id,"semua");
			$trx = $this->getTransaksi($bayar->id,"semua","idbayar");
			$alamat = $this->getAlamat($trx->alamat,"semua");
			$usr = $this->getUserdata($bayar->usrid,"semua");
			$diskon = $bayar->diskon != 0 ? "Diskon: <b>Rp ".$this->formUang($bayar->diskon)."</b><br/>" : "";
			$diskonwa = $bayar->diskon != 0 ? "Diskon: *Rp ".$this->formUang($bayar->diskon)."*\n" : "";
			$toko = $this->globalset("semua");

			$pesan = "
				Halo <b>".$usr->nama."</b><br/>".
				"Terimakasih, pembayaran untuk pesananmu sudah kami terima.<br/>".
				"Mohon ditunggu, admin kami akan segera memproses pesananmu<br/>".
				"<b>Detail Pesanan</b><br/>".
				"No Invoice: <b>#".$bayar->invoice."</b><br/>".
				"Total Pesanan: <b>Rp ".$this->func->formUang($bayar->total)."</b><br/>".
				"Ongkos Kirim: <b>Rp ".$this->func->formUang($trx->ongkir)."</b><br/>".$diskon.
				"Kurir Pengiriman: <b>".strtoupper($trx->kurir." ".$trx->paket)."</b><br/> <br/>".
				"Detail Pengiriman <br/>".
				"Penerima: <b>".$alamat->nama."</b> <br/>".
				"No HP: <b>".$alamat->nohp."</b> <br/>".
				"Alamat: <b>".$alamat->alamat."</b>".
				"<br/> <br/>".
				"Cek Status pesananmu langsung di menu:<br/>".
				"<a href='".$this->mainsite_url("manage/pesanan")."'>PESANANKU &raquo;</a>
			";
			$this->func->sendEmail($usr->username,$toko->nama." - Pesanan",$pesan,"Pesanan");
			$pesan = "
				Halo *".$usr->nama."* \n".
				"Terimakasih, pembayaran untuk pesananmu sudah kami terima. \n".
				"Mohon ditunggu, admin kami akan segera memproses pesananmu \n".
				"*Detail Pesanan* \n".
				"No Invoice: *#".$bayar->invoice."* \n".
				"Total Pesanan: *Rp ".$this->func->formUang($bayar->total)."* \n".
				"Ongkos Kirim: *Rp ".$this->func->formUang($trx->ongkir)."* \n".$diskon.
				"Kurir Pengiriman: *".strtoupper($trx->kurir." ".$trx->paket)."* \n  \n".
				"Detail Pengiriman  \n".
				"Penerima: *".$alamat->nama."* \n".
				"No HP: *".$alamat->nohp."* \n".
				"Alamat: *".$alamat->alamat."*".
				" \n  \n".
				"Cek Status pesananmu langsung di menu: \n".
				"*PESANANKU*
			";
			$this->func->sendWA($this->func->getProfil($usr->id,"nohp","usrid"),$pesan);
		}
	}
	function notifbatal($order_id=null,$jenis=1){
		if($order_id != null){
			$bayar = $this->getBayar($order_id,"semua");
			$trx = $this->getTransaksi($bayar->id,"semua","idbayar");
			$alamat = $this->getAlamat($trx->alamat,"semua");
			$usr = $this->getUserdata($bayar->usrid,"semua");
			$diskon = $bayar->diskon != 0 ? "Diskon: <b>Rp ".$this->formUang($bayar->diskon)."</b><br/>" : "";
			$diskonwa = $bayar->diskon != 0 ? "Diskon: *Rp ".$this->formUang($bayar->diskon)."*\n" : "";
			$toko = $this->globalset("semua");
			
			if($jenis == 1){
				$alasan = "DIBATALKAN OLEH ADMIN";
			}elseif($jenis == 2){
				$alasan = "DIBATALKAN OLEH PEMBELI";
			}elseif($jenis == 3){
				$alasan = "TELAH MELEWATI BATAS WAKTU JATUH TEMPO PEMBAYARAN";
			}else{
				$alasan = "-";
			}

			$pesan = "
				Halo <b>".$usr->nama."</b><br/>".
				"Pesanan Anda telah dibatalkan<br/>".
				"Status: <br/>".
				"<b>".$alasan."</b><br/>".
				"<br/>".
				"<b>Detail Pesanan</b><br/>".
				"No Invoice: <b>#".$bayar->invoice."</b><br/>".
				"Total Pesanan: <b>Rp ".$this->formUang($bayar->total)."</b><br/>".
				"Ongkos Kirim: <b>Rp ".$this->formUang($trx->ongkir)."</b><br/>".$diskon.
				"Kurir Pengiriman: <b>".strtoupper($trx->kurir." ".$trx->paket)."</b><br/> <br/>".
				"Detail Pengiriman <br/>".
				"Penerima: <b>".$alamat->nama."</b> <br/>".
				"No HP: <b>".$alamat->nohp."</b> <br/>".
				"Alamat: <b>".$alamat->alamat."</b>".
				"<br/> <br/>".
				"Informasi cara pembayaran dan status pesananmu langsung di menu:<br/>".
				"<a href='".$this->mainsite_url("manage/pesanan")."'>PESANANKU &raquo;</a>
			";
			$this->sendEmail($usr->username,$toko->nama,$pesan,"Pesanan Dibatalkan");
			$pesan = "
				Halo *".$usr->nama."* \n".
				"Pesanan Anda telah dibatalkan \n".
				"Status: \n".
				"*".$alasan."* \n".
				" \n".
				"*Detail Pesanan* \n".
				"No Invoice: *#".$bayar->invoice."* \n".
				"Total Pesanan: *Rp ".$this->formUang($bayar->total)."* \n".
				"Ongkos Kirim: *Rp ".$this->formUang($trx->ongkir)."* \n".$diskon.
				"Kurir Pengiriman: *".strtoupper($trx->kurir." ".$trx->paket)."* \n  \n".
				"Detail Pengiriman  \n".
				"Penerima: *".$alamat->nama."*  \n".
				"No HP: *".$alamat->nohp."*  \n".
				"Alamat: *".$alamat->alamat."*".
				" \n  \n".
				"Informasi cara pembayaran dan status pesananmu langsung di menu: \n".
				"*PESANANKU*
			";
			$this->sendWA($this->getProfil($usr->id,"nohp","usrid"),$pesan);
		}
	}

	// USABLE FUNCTION
	function cleanURL($url){
		$string = str_replace(' ', '-', $url);
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
	}
	function encode($string){
		return $this->encryption->encrypt($string);
	}
	function decode($string){
		return $this->encryption->decrypt($string);
	}
	function potong($str,$max,$after=""){
		if(strlen($str) > $max){
			$str = substr($str, 0, $max);
			$str = rtrim($str).$after;
		}
		return $str;
	}
	function formUang($format){
		$result= number_format($format,0,",",".");
		return $result;
	}
	function ubahTgl($format, $tanggal="now", $bahasa="id"){
		$en = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		$id = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		return str_replace($en,$$bahasa,date($format,strtotime($tanggal)));
	}
	function arrEnc($arr,$type="encode"){
		if($type == "encode"){
			$result = base64_encode(serialize($arr));
		}else{
			$result = unserialize(base64_decode($arr));
		}
		return $result;
	}
	function starRating($star=1){
		$star = "<i class='fa fa-star'></i>";
		$staro = "<i class='fa fa-star-o'></i>";
		$starho = "<i class='fa fa-star-half-o'></i>";
		if($star == 1){
			$hasil = $star.$staro.$staro.$staro.$staro;
		}
	}
	function createPagination($rows,$page,$perpage=10,$function="refreshTabel"){
		$tpages = ceil($rows/$perpage);
		$reload = "";
        $adjacents = 2;
		$prevlabel = "&lsaquo;";
		$nextlabel = "&rsaquo;";
		$out = "<div class=\"pagination\">";
		// previous
		if ($page == 1) {
			$out.= "";
		} else {
			$out.="<a href=\"javascript:void(0)\" class='item' onclick=\"".$function."(1)\">&laquo;</a>\n";
			$out.="<a href=\"javascript:void(0)\" class='item' onclick=\"".$function."(".($page - 1).")\">".$prevlabel."</a>\n";
		}
		$pmin=($page>$adjacents)?($page - $adjacents):1;
		$pmax=($page<($tpages - $adjacents))?($page + $adjacents):$tpages;
		for ($i = $pmin; $i <= $pmax; $i++) {
			if ($i == $page) {
				$out.= "<a href=\"javascript:void(0)\" class='item active'>".$i."</a>\n";
			} elseif ($i == 1) {
				$out.= "<a href=\"javascript:void(0)\" class='item' onclick=\"".$function."(".$i.")\">".$i."</a>\n";
			} else {
				$out.= "<a href=\"javascript:void(0)\" class='item' onclick=\"".$function."(".$i.")\">".$i. "</a>\n";
			}
		}

		// next
		if ($page < $tpages) {
			$out.= "<a href=\"javascript:void(0)\" onclick=\"".$function."(".($page + 1).")\" class='item'>".$nextlabel."</a>\n";
		}
		if($page < ($tpages - $adjacents)) {
			$out.= "<a href=\"javascript:void(0)\" onclick=\"".$function."(".$tpages.")\" class='item'>&raquo;</a>\n";
		}
		$out.= "</div>";
		return $out;
	}
}
