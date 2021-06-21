<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biara_m extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function input_contact($data)
	{
		$this->db->insert('contact', $data);
		return TRUE;

	}

	public function register_m($data)
	{
		$this->db->insert('register', $data);
		return TRUE;
	}

	public function login_admin($user, $pass)
	{
		$this->db->where('username', $user);
		$this->db->where('password', $pass);

		return $this->db->get('admin')->row();
	}

	public function input_tambah_admin($data)
	{
		$this->db->insert('admin', $data);
		return TRUE;
	}

	// edit admin cara 1
	public function get_all($where = NULL)
	{
		$this->db->order_by('level', 'asc');
		$this->db->order_by('user_id', 'asc');
		
		return $this->db->get_where('admin', $where);
	}

	//INPUT EDIT admin cara 2
	public function input_edit_master_jenis($data, $where)
	{
		// $this->db->where('jenis', $this->input->get('jenis_satu'));
		$this->db->where($where);
		$this->db->update('admin', $data);
		return TRUE;
	}

	// Input edit admin cara 3
	public function edit_data($where)
	{		
	
		// return $this->db->get_where($table,$where);
		$this->db->get_where($where);
		return TRUE;
	}

	//Input edit + update data
	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	// INPUT EDIT ADMIN CARA 4
	public function getById($where, $id)
    {
        // return $this->db->get_where(["admin" => $id])->row();

        // $this->db->select('admin');
		// $this->db->from('admin');
		$this->db->where('user_id',$where, $id);
		$query=$this->db->get('admin')->row();
		return $query;
    }

    // Coba pake jqeury + modal
    public function edit_user_m($data, $where)
	{
		$this->db->where($where);
		$this->db->update('admin', $data);
		return TRUE;
	}

	public function inputberita_baru($data)
	{
		$this->db->insert('tbl_berita', $data);
		return TRUE;

	}

	public function inputArtikel_baru($data)
	{
		$this->db->insert('tbl_artikel', $data);
		return TRUE;
	}

	public function Inputgallery($data)
	{
		$this->db->insert('gallery', $data);
		return TRUE;

	}

	public function input_MB($data)
	{
		$this->db->insert('management_biara', $data);
		return TRUE;
	}

	public function input_SB($data)
	{
		$this->db->insert('sejarah_biara', $data);
		return TRUE;
	}

	public function input_AF($data)
	{
		$this->db->insert('afiliasi', $data);
		return TRUE;
	}

	public function input_SA($data)
	{
		$this->db->insert('silsilah_ajaran', $data);
		return TRUE;
	}

	public function input_TG($data)
	{
		$this->db->insert('tradisi_gelug', $data);
		return TRUE;
	}

	public function input_SP($data)
	{
		$this->db->insert('silsilah_penahbisan', $data);
		return TRUE;
	}

	public function input_G($data)
	{
		$this->db->insert('guru', $data);
		return TRUE;
	}

	public function input_TS($data)
	{
		$this->db->insert('tentang_sangha', $data);
		return TRUE;
	}

	public function input_DW($data)
	{
		$this->db->insert('dharma_work', $data);
		return TRUE;
	}

	public function input_AT($data)
	{
		$this->db->insert('aktivitas_tahunan', $data);
		return TRUE;
	}

	public function input_AH($data)
	{
		$this->db->insert('aktivitas_harian', $data);
		return TRUE;
	}

	public function input_MS($data)
	{
		$this->db->insert('menjadi_sangha', $data);
		return TRUE;
	}

	public function input_NUS($data)
	{
		$this->db->insert('nasihat_untuk_sangha', $data);
		return TRUE;
	}

	public function input_P($data)
	{
		$this->db->insert('persiapan', $data);
		return TRUE;
	}

	public function input_S($data)
	{
		$this->db->insert('silasrama', $data);
		return TRUE;
	}

	public function input_K($data)
	{
		$this->db->insert('kurikulum', $data);
		return TRUE;
	}

	// Testing yang Berhasil cuyy
	public function get_data($idUser){
	    $this->db->select('*');
	    $this->db->where('user_id',$idUser);
	    return $this->db->get('admin')->row();

	}

	public function get_berita($idUser){
	    $this->db->select('*');
	    $this->db->where('id_berita',$idUser);
	    return $this->db->get('tbl_berita')->row();

	}

	public function get_artikel($idArtikel){
	    $this->db->select('*');
	    $this->db->where('id_artikel',$idArtikel);
	    return $this->db->get('tbl_artikel')->row();

	}

	 public function inputArtikel_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('tbl_artikel', $data);
		return TRUE;
	}

	public function inputberita_edit($data, $where)
	{
		$this->db->where($where);
		$this->db->update('tbl_berita', $data);
		return TRUE;
	}

	public function get_dataBerita($idUser){
	    $this->db->select('*');
	    $this->db->where('id_berita',$idUser);
	    return $this->db->get('tbl_berita')->row();

	}

	public function get_dataArtikel($idUser){
	    $this->db->select('*');
	    $this->db->where('id_artikel',$idUser);
	    return $this->db->get('tbl_artikel')->row();

	}

	public function input_tambahJadwal($data)
	{
		$this->db->insert('jadwal_mingguan', $data);
		return TRUE;
	}

	public function get_JM($idUser){
	    $this->db->select('*');
	    $this->db->where('id_JadwalMingguan',$idUser);
	    return $this->db->get('jadwal_mingguan')->row();

	}
	
	public function inputJM_edit($data, $where)
	{
		$this->db->where($where);
		$this->db->update('jadwal_mingguan', $data);
		return TRUE;
	}

	public function get_dataJM($id){
	    $this->db->select('*');
	    $this->db->where('id_JadwalMingguan',$id);
	    return $this->db->get('jadwal_mingguan')->row();

	}

	public function get_dataJB($id){
	    $this->db->select('*');
	    $this->db->where('id_JadwalBulanan',$id);
	    return $this->db->get('jadwal_bulanan')->row();

	}

	public function get_dataJT($id){
	    $this->db->select('*');
	    $this->db->where('id_JadwalTahunan',$id);
	    return $this->db->get('jadwal_tahunan')->row();

	}

	public function get_dataJMG($id){
	    $this->db->select('*');
	    $this->db->where('id_JadwalMendatang',$id);
	    return $this->db->get('jadwal_mendatang')->row();

	}

	public function inputContentSS($data)
	{
		$this->db->insert('home_slideshow', $data);
		return TRUE;

	}

	public function get_SS($id_SS){
	    $this->db->select('*');
	    $this->db->where('id',$id_SS);
	    return $this->db->get('home_slideshow')->row();

	}

	public function inputSS_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('home_slideshow', $data);
		return TRUE;
	}

	public function get_HK($id_HK){
	    $this->db->select('*');
	    $this->db->where('id',$id_HK);
	    return $this->db->get('home_kutipan')->row();

	}

	public function inputHK_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('home_kutipan', $data);
		return TRUE;
	}

	public function get_HL($id_HL){
	    $this->db->select('*');
	    $this->db->where('id',$id_HL);
	    return $this->db->get('home_lainnya')->row();

	}

	public function inputHL_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('home_lainnya', $data);
		return TRUE;
	}

	public function input_D($data)
	{
		$this->db->insert('donasi', $data);
		return TRUE;
	}

	public function get_donasi($id_donasi){
	    $this->db->select('*');
	    $this->db->where('id_donasi',$id_donasi);
	    return $this->db->get('donasi')->row();

	}

	public function inputDonasi_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('donasi', $data);
		return TRUE;
	}

	public function hitungJumlahdataBerita()
	{   
	    $query = $this->db->get('tbl_berita');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function hitungJumlahdataArtikel()
	{   
	    $query = $this->db->get('tbl_artikel');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function get_dataDonasi($idUser)
	{
	    $this->db->select('*');
	    $this->db->where('id_donasi',$idUser);
	    return $this->db->get('donasi')->row();

	}

	// ANGGOTA SANGHA
	public function inputAnggotaSangha_baru($data)
	{
		$this->db->insert('anggota_sangha', $data);
		return TRUE;
	}

	public function get_anggotaSangha($id_anggotaSangha)
	{
	    $this->db->select('*');
	    $this->db->where('id_anggotaSangha', $id_anggotaSangha);
	    return $this->db->get('anggota_sangha')->row();

	}

	public function inputAnggotaSangha_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('anggota_sangha', $data);
		return TRUE;
	}

	// TENTANG BIARA
	public function input_content($data)
	{
		$this->db->insert('tentang_biara', $data);
		return TRUE;
	}

	public function get_TB($id_tb)
	{
	    $this->db->select('*');
	    $this->db->where('id_tentangBiara',$id_tb);
	    return $this->db->get('tentang_biara')->row();

	}

	public function inputTB_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('tentang_biara', $data);
		return TRUE;
	}

	// SEJARAH BIARA
	public function get_SB($id_sb)
	{
	    $this->db->select('*');
	    $this->db->where('id_sejarahBiara', $id_sb);
	    return $this->db->get('sejarah_biara')->row();

	}

	public function inputSB_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('sejarah_biara', $data);
		return TRUE;
	}

	// AFILIASI
	public function get_AF($id_af)
	{
	    $this->db->select('*');
	    $this->db->where('id_afiliasi', $id_af);
	    return $this->db->get('afiliasi')->row();

	}

	public function inputAF_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('afiliasi', $data);
		return TRUE;
	}

	// MANAGEMENT BIARA
	public function get_MB($id_mb)
	{
	    $this->db->select('*');
	    $this->db->where('id_managementBiara', $id_mb);
	    return $this->db->get('management_biara')->row();

	}

	public function inputMB_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('management_biara', $data);
		return TRUE;
	}

	// SILSILAH AJARAN
	public function get_SA($id_sa)
	{
	    $this->db->select('*');
	    $this->db->where('id_silsilahAjaran', $id_sa);
	    return $this->db->get('silsilah_ajaran')->row();

	}

	public function inputSA_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('silsilah_ajaran', $data);
		return TRUE;
	}

	// TRADISI GELUG
	public function get_TG($id_tg)
	{
	    $this->db->select('*');
	    $this->db->where('id_tradisiGelug', $id_tg);
	    return $this->db->get('tradisi_gelug')->row();

	}

	public function inputTG_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('tradisi_gelug', $data);
		return TRUE;
	}

	// Silsilah Penahbisan
	public function get_SP($id_sp)
	{
	    $this->db->select('*');
	    $this->db->where('id_silsilahPenahbisan', $id_sp);
	    return $this->db->get('silsilah_penahbisan')->row();

	}

	public function inputSP_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('silsilah_penahbisan', $data);
		return TRUE;
	}

	// GURU
	public function get_G($id_g)
	{
	    $this->db->select('*');
	    $this->db->where('id_guru', $id_g);
	    return $this->db->get('guru')->row();

	}

	public function inputG_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('guru', $data);
		return TRUE;
	}

	// TENTANG SANGHA
	public function get_TS($id_ts)
	{
	    $this->db->select('*');
	    $this->db->where('id_tentangSangha', $id_ts);
	    return $this->db->get('tentang_sangha')->row();

	}

	public function inputTS_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('tentang_sangha', $data);
		return TRUE;
	}


	// KURIKULUM
	public function get_K($id_k)
	{
	    $this->db->select('*');
	    $this->db->where('id_kurikulum', $id_k);
	    return $this->db->get('kurikulum')->row();

	}

	public function inputK_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('kurikulum', $data);
		return TRUE;
	}

	// DHARMA WORK
	public function get_DW($id_dw)
	{
	    $this->db->select('*');
	    $this->db->where('id_dharmaWork', $id_dw);
	    return $this->db->get('dharma_work')->row();

	}

	public function inputDW_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('dharma_work', $data);
		return TRUE;
	}

	// AKTIVITAS HARIAN
	public function get_AH($id_ah)
	{
	    $this->db->select('*');
	    $this->db->where('id_aktivitasHarian', $id_ah);
	    return $this->db->get('aktivitas_harian')->row();

	}

	public function inputAH_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('aktivitas_harian', $data);
		return TRUE;
	}

	// AKTIVITAS TAHUNAN
	public function get_AT($id_at)
	{
	    $this->db->select('*');
	    $this->db->where('id_aktivitasTahunan', $id_at);
	    return $this->db->get('aktivitas_tahunan')->row();

	}

	public function inputAT_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('aktivitas_tahunan', $data);
		return TRUE;
	}

	// MENJADI SANGHA
	public function get_MS($id_ms)
	{
	    $this->db->select('*');
	    $this->db->where('id_menjadiSangha', $id_ms);
	    return $this->db->get('menjadi_sangha')->row();

	}

	public function inputMS_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('menjadi_sangha', $data);
		return TRUE;
	}

	// NASIHAT UNTUK SANGHA
	public function get_NUS($id_NUS)
	{
	    $this->db->select('*');
	    $this->db->where('id_nasihatuntukSangha', $id_NUS);
	    return $this->db->get('nasihat_untuk_sangha')->row();

	}

	public function inputNUS_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('nasihat_untuk_sangha', $data);
		return TRUE;
	}

	// PERSIAPAN
	public function get_P($id_p)
	{
	    $this->db->select('*');
	    $this->db->where('id_persiapan', $id_p);
	    return $this->db->get('persiapan')->row();

	}

	public function inputP_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('persiapan', $data);
		return TRUE;
	}

	// SILASRAMA
	public function get_S($id_s)
	{
	    $this->db->select('*');
	    $this->db->where('id_silasrama', $id_s);
	    return $this->db->get('silasrama')->row();

	}

	public function inputS_update($where, $data)
	{
		$this->db->where($where);
		$this->db->update('silasrama', $data);
		return TRUE;
	}

	// PROGRAM JADWAL BULANAN
	public function input_tambahJB($data)
	{
		$this->db->insert('jadwal_bulanan', $data);
		return TRUE;
	}

	public function get_JB($id_JB)
	{
	    $this->db->select('*');
	    $this->db->where('id_JadwalBulanan', $id_JB);
	    return $this->db->get('jadwal_bulanan')->row();

	}

	public function inputJB_edit($where, $data)
	{
		$this->db->where($where);
		$this->db->update('jadwal_bulanan', $data);
		return TRUE;
	}

	// PROGRAM JADWAL TAHUNAN
	public function input_tambahJT($data)
	{
		$this->db->insert('jadwal_tahunan', $data);
		return TRUE;
	}

	public function get_JT($id_JT)
	{
	    $this->db->select('*');
	    $this->db->where('id_JadwalTahunan', $id_JT);
	    return $this->db->get('jadwal_tahunan')->row();

	}

	public function inputJT_edit($where, $data)
	{
		$this->db->where($where);
		$this->db->update('jadwal_tahunan', $data);
		return TRUE;
	}

	// PROGRAM JADWAL MENDATANG
	public function input_tambahJMG($data)
	{
		$this->db->insert('jadwal_mendatang', $data);
		return TRUE;
	}

	public function get_JMG($id_JMG)
	{
	    $this->db->select('*');
	    $this->db->where('id_JadwalMendatang', $id_JMG);
	    return $this->db->get('jadwal_mendatang')->row();

	}

	public function inputJMG_edit($where, $data)
	{
		$this->db->where($where);
		$this->db->update('jadwal_mendatang', $data);
		return TRUE;
	}


	// CODING TAG, KOMENTAR, TAG ARTIKEL
	public function ambilTagArtikel ($id_artikel)
	{
		$query = $this->db->query("
			SELECT *
			FROM tag_artikel
			JOIN tag ON tag.id_tag = tag_artikel.id_tag
			WHERE id_artikel = '{$id_artikel}'
		");

		return $query->result();
	}

	public function isiSubkomentar ($komentar, $tabel, $id_tabel)
	{
		$query = $this->db->query("
			SELECT id_komentar, waktu, komentar, name
			FROM komentar
			JOIN register ON register.id = komentar.id_user
			WHERE tabel_induk = '{$tabel}'
			AND id_tabel_induk = '{$id_tabel}'
			AND id_induk_komentar = '{$komentar['id_komentar']}'
		");

		$komentar['subkomentar'] = $query->result_array();

		if (count($komentar['subkomentar']) > 0) {
			// ada subkomentar dari subkomentar
			foreach ($komentar['subkomentar'] as $key => $value) {
				$subkomentar = $this->isiSubkomentar($value, $tabel, $id_tabel);

				$komentar['subkomentar'][$key] = $subkomentar;
			}
		}

		return $komentar;
	}

	public function ambilKomentarArtikel ($id_artikel)
	{
		// ambil data komentar (komentar utama yang tidak membalas komentar lain)
		$query = $this->db->query("
			SELECT id_komentar, waktu, komentar, name
			FROM komentar
			JOIN register ON register.id = komentar.id_user
			WHERE tabel_induk = 'tbl_artikel'
			AND id_tabel_induk = '{$id_artikel}'
			AND id_induk_komentar IS NULL
		");
		$komentar = $query->result_array();

		// perulangan tiap komentar, isi tiap komentar dengan subkomentar (komentar yang membalas komentar lain)
		for ($i=0; $i < count($komentar); $i++) {
			$komentar[$i] = $this->isiSubkomentar($komentar[$i], 'tbl_artikel', $id_artikel);
		}

		return $komentar;
	}

	public function tampilkanKomentar ($komentar, $html = '')
	{
		// html pembuka
		$html .= '
			<li class="comment">
			  <div class="vcard bio">
				 <img src="'.base_url('assets/images/person_1.jpg').'" alt="Image placeholder">
			  </div>
			  <div class="comment-body">
				<h3>'.$komentar['name'].'</h3>
				<div class="meta"><span class="tanggal">'.$komentar['waktu'].'</span></div>
				<p>'.$komentar['komentar'].'</p>
				<p><a href="#" class="reply">Reply</a></p>
			  </div>
	    ';

		// cek apakah ada subkomentar
		if (count($komentar['subkomentar']) > 0) {
			// html pembuka subkomentar
			$html .= '
			  	<ul class="children">
			';

			// perulangan untuk tiap subkomentar
			foreach ($komentar['subkomentar'] as $key => $value) {
				$html = $this->tampilkanKomentar($value, $html);
			}

			//html penutup subkomentar
			$html .= '
				</ul>
			';
		}

		//html penutup komentar
		$html .= '
		  	</li>
		';

		return $html;
	}

	public function hitungJumlahKomentarArtikel($id_artikel)
	{
		$query = $this->db->query("
			SELECT COUNT(*) AS total
			FROM komentar
			WHERE tabel_induk = 'tbl_artikel'
			AND id_tabel_induk = '{$id_artikel}'
		");

		return $query->row('total');
	}

	public function inputKontak($data)
	{
		$this->db->insert('contact', $data);
		return TRUE;
	}

	public function get_gallery($id_gallery){
	    $this->db->select('*');
	    $this->db->where('id_gallery',$id_gallery);
	    return $this->db->get('gallery')->row();

	}

	public function inputGallery_edit($where, $data)
	{
		$this->db->where($where);
		$this->db->update('gallery', $data);
		return TRUE;
	}
	
}
