<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $params['title'] = 'Kelola Produk ';

        $this->load->view('admin/header', $params);
        $this->load->view('produk/produk');
        $this->load->view('admin/footer');
    }

    public function tambah_produk()
    {
        $params['title'] = 'Tambah Produk Baru';

        $this->load->view('admin/header', $params);
        $this->load->view('produk/tambah_produk');
        $this->load->view('admin/footer');
    }

    public function kategori()
    {
        $params['title'] = 'Kelola Kategori Produk';

        $this->load->view('admin/header', $params);
        $this->load->view('produk/kategori');
        $this->load->view('admin/footer');
    }

    
}