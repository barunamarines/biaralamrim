<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi extends CI_Controller {

    public function index()
    {
        $ambil = $this->db->get('donasi');

        $data = array();
        $data['d'] = $ambil;

        $this->load->view('Admin/donasiV/donasi', $data);
    }

    public function tambah_contentD()
    {
        $this->load->view('Admin/donasiV/tambah_donasi');
    }

    public function input_contentD()
    {
        $judul_donasi = $this->input->post('judul_donasi');
        $jumlah_terkumpul = $this->input->post('jumlah_terkumpul');
        $jumlah_semula = $this->input->post('jumlah_semula');
        $jumlah_bar = $this->input->post('jumlah_bar');
        $jumlah_donasi = $this->input->post('jumlah_donasi');
        $sisa_hari = $this->input->post('sisa_hari');
        $deskripsi_donasi = $this->input->post('deskripsi_donasi');
        $gambar_donasi = $_FILES['gambar_donasi'];
        if ($gambar_donasi = ''){}else{
            $config['upload_path'] = './assets/images/Donasi';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar_donasi')){
                echo "Upload Gagal"; die();
            }else{
                $gambar_donasi = $this->upload->data('file_name');
            }
        }

        $data = array(
            'judul_donasi' => $judul_donasi,
            'jumlah_terkumpul' => $jumlah_terkumpul,
            'jumlah_semula' => $jumlah_semula,
            'jumlah_bar' => $jumlah_bar,
            'jumlah_donasi' => $jumlah_donasi,
            'sisa_hari' => $sisa_hari,
            'gambar_donasi' => $gambar_donasi,
            'deskripsi_donasi' => $deskripsi_donasi
        );

        $this->Biara_m->input_D($data);
        Redirect('AdminC/Donasi/Donasi');
    }

    public function edit_donasi($id_donasi)
    {
        $b['data_donasi'] = $this->Biara_m->get_donasi($id_donasi);
        $this->load->view('Admin/DonasiV/edit_donasi', $b);
    }

    public function inputDonasi_edit()
    {
        $judul_donasi = $this->input->post('judul_donasi');
        $jumlah_terkumpul = $this->input->post('jumlah_terkumpul');
        $jumlah_semula = $this->input->post('jumlah_semula');
        $jumlah_bar = $this->input->post('jumlah_bar');
        $jumlah_donasi = $this->input->post('jumlah_donasi');
        
        $sisa_hari = $this->input->post('sisa_hari');
        $id_donasi = $this->input->post('id_donasi');
        $deskripsi_donasi = $this->input->post('deskripsi_donasi');
        $gambar_donasi = $_FILES['gambar_donasi'];
        if ($gambar_donasi = ''){}else{
            $config['upload_path'] = './assets/images/Donasi';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2000;

            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar_donasi')){
                echo "Upload Gagal"; die();
            }else{
                $gambar_donasi = $this->upload->data('file_name');
            }
        }

        $where = array(
            'id_donasi' => $id_donasi
        );

        $data = array(
        'judul_donasi' => $judul_donasi, 
        'jumlah_terkumpul' => $jumlah_terkumpul,
        'jumlah_semula' => $jumlah_semula,
        'jumlah_bar' => $jumlah_bar,
        'jumlah_donasi' => $jumlah_donasi,
        
        'sisa_hari' => $sisa_hari,
        'gambar_donasi' => $gambar_donasi,
        'deskripsi_donasi' => $deskripsi_donasi
        
            );

        $this->Biara_m->inputDonasi_update($where, $data);

        Redirect('AdminC/Donasi/Donasi');
    }

    public function hapus_donasi()
    {
        $id['id_donasi'] = $this->input->post('donasi_hapus');

        $this->db->delete('donasi', array('id_donasi' => $id['id_donasi']));

         Redirect('AdminC/Donasi/Donasi');
    }
}
