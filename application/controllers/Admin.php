<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('welcome/admin');
        }
    }
    
    public function jawaban_quiz(){
        $this->load->model('m_jawaban');
        $data['jawaban'] = $this->m_jawaban->jawaban_all();
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

         $this->load->view('admin/jawaban_quiz',$data);

    }
    
    public function autofill() {

        // Return the result as JSON
        $nama_guru = $_GET['nama_guru'];
        $this->load->model('m_guru');

        $query = $this->m_guru->detail_guru_mapel($nama_guru);

        header('Content-Type: application/json');
        echo json_encode(['nama_mapel' => $query->nama_mapel]);
        

    }



    public function index()
    {
         if ($this->session->userdata('role') == 'guru') {
        // Redirect to the admin page if an admin is already logged in
        redirect('/guru');
    }
     if ($this->session->userdata('role') == 'siswa') {
        // Redirect to the admin page if an admin is already logged in
        redirect('/user');
    }
        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('admin/index');
    }

    public function about_developer()
    {
        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('admin/about_developer');
    }

    public function about_learnify()
    {
        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('admin/about_learnify');
    }

    // Management Siswa

    public function data_siswa()
    {
        $this->load->model('m_siswa');

        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_siswa->tampil_data()->result();
        $this->load->view('admin/data_siswa', $data);
    }

    // Management Quiz
    public function data_quiz(){
        $this->load->model('m_quiz');

        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_quiz->tampil_data();
        $this->load->view('admin/data_quiz', $data);
    }

    // tambah quiz
    public function tambah_quiz()
    {
        $admin = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('id_materi', 'Materi', 'required', [
            'required' => 'Harap isi kolom materi.'
        ]);
        //  var_dump($_POST);die;
        if ($this->form_validation->run() == false) {
                    $this->load->model('m_materi');
                    $data['materi'] = $this->m_materi->tampil_data()->result();
            $this->load->view('admin/add_quiz',$data);
        } else {
           

            $data = [
                'id_materi' => htmlspecialchars($this->input->post('id_materi', true)),
                'user_pembuat'=>$admin['username'],
                'pertanyaan' => htmlspecialchars($this->input->post('pertanyaan', true)),
                 'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                'pilihan_a' => htmlspecialchars($this->input->post('pilihan_a', true)),
                'pilihan_b' => htmlspecialchars($this->input->post('pilihan_b', true)),
                'pilihan_c' => htmlspecialchars($this->input->post('pilihan_c', true)),
                'pilihan_d' => htmlspecialchars($this->input->post('pilihan_d', true)),
                'jawaban_benar' => htmlspecialchars($this->input->post('jawaban_benar', true)),
                'pembahasan' => htmlspecialchars($this->input->post('pembahasan', true)),
            ];
            
           // Attempt to insert data into the 'quiz' table
$insert_result = $this->db->insert('quiz', $data);


            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('admin/data_quiz'));
        }
    }

    // update_quiz
    public function update_quiz($id){
        $this->load->model('m_quiz');
        $where = array('quiz.id' => $id);
        $data['user'] = $this->m_quiz->update_quiz($where, 'quiz');
        $this->load->view('admin/update_quiz', $data);
    }
    //quiz_edit
    public function quiz_edit()
    {
        $this->load->model('m_quiz');

        $id = $this->input->post('id');
        $id_materi = $this->input->post('id_materi');
        $pertanyaan = $this->input->post('pertanyaan');
        $kelas = $this->input->post('kelas');
        $pilihan_a = $this->input->post('pilihan_a');
        $pilihan_b = $this->input->post('pilihan_b');
        $pilihan_c = $this->input->post('pilihan_c');
        $pilihan_d = $this->input->post('pilihan_d');
        $jawaban_benar = $this->input->post('jawaban_benar');
        $pembahasan = $this->input->post('pembahasan');

        $data = array(
            'pertanyaan' => $pertanyaan,
            'kelas' => $kelas,
            'pilihan_a' => $pilihan_a,
            'pilihan_b' => $pilihan_b,
            'pilihan_b' => $pilihan_b,
            'pilihan_c' => $pilihan_c,
            'pilihan_d' => $pilihan_d,
            'jawaban_benar' => $jawaban_benar,
            'pembahasan' => $pembahasan,
        );

        $where = array(
            'id' => $id,
        );

        $this->m_quiz->update_data($where, $data, 'quiz');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_quiz');
    }
    


    public function detail_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('id' => $id);
        $detail = $this->m_siswa->detail_siswa($id);
        $data['detail'] = $detail;
        $this->load->view('admin/detail_siswa', $data);
    }

    public function update_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('id' => $id);
        $data['user'] = $this->m_siswa->update_siswa($where, 'siswa')->result();
        $this->load->view('admin/update_siswa', $data);
    }

    public function user_edit()
    {
        $this->load->model('m_siswa');

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $gambar = $_FILES['image']['name'];

        $data = array(
            'nama' => $nama,
            'email' => $email,
        );

        $config['allowed_types'] = 'jpg|png|gif|jfif';
        $config['max_size'] = '4096';
        $config['upload_path'] = './assets/profile_picture';

        $this->load->library('upload', $config);
        //berhasil
        if ($this->upload->do_upload('image')) {
            $gambarLama = $data['user']['image'];
            if ($gambarLama != 'default.jpg') {
                unlink(FCPATH . '/assets/profile_picture/' . $gambarLama);
            }
            $gambarBaru = $this->upload->data('file_name');
            $this->db->set('image', $gambarBaru);
        } else {
            echo $this->upload->display_errors();
        }

        $where = array(
            'id' => $id,
        );

        $this->m_siswa->update_data($where, $data, 'siswa');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_siswa');
    }

    public function delete_siswa($id)
    {
        $this->load->model('m_siswa');
        $where = array('id' => $id);
        $this->m_siswa->delete_siswa($where, 'siswa');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('admin/data_siswa');
    }

    //hapus quiz
    public function delete_quiz($id)
    {
        $this->load->model('m_quiz');
        $this->load->model('m_jawaban'); // Load model untuk tabel 'jawaban'
          // Hapus terlebih dahulu data dari tabel 'jawaban' yang merujuk pada quiz dengan ID yang akan dihapus
            $where_jawaban = array('id_quiz' => $id);
            $this->m_jawaban->delete_jawaban($where_jawaban, 'jawaban');
        
            // Setelah itu, hapus data dari tabel 'quiz'
            $where_quiz = array('id' => $id);
            $this->m_quiz->delete_quiz($where_quiz, 'quiz');
        
            // Set flashdata untuk memberi tahu pengguna bahwa penghapusan berhasil
            $this->session->set_flashdata('quiz-delete', 'berhasil');
        
            // Redirect pengguna ke halaman admin/data_quiz setelah penghapusan
            redirect('admin/data_quiz');
    }

    // manajemen guru

    public function data_guru()
    {
        $this->load->model('m_guru');
        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_guru->tampil_data()->result();
        $this->load->view('admin/data_guru', $data);
    }

    public function detail_guru($nip)
    {
        $this->load->model('m_guru');
        $where = array('nip' => $nip);
        $detail = $this->m_guru->detail_guru($nip);
        $data['detail'] = $detail;
        $this->load->view('admin/detail_guru', $data);
    }

    public function update_guru($nip)
    {
        $this->load->model('m_guru');
        $where = array('nip' => $nip);
        $data['user'] = $this->m_guru->update_guru($where, 'guru')->result();
        $this->load->view('admin/update_guru', $data);
    }

    public function guru_edit()
    {
        $this->load->model('m_guru');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');

        $data = array(
            'nip' => $nip,
            'nama_guru' => $nama,
            'email' => $email,

        );

        $where = array(
            'nip' => $nip,
        );

        $this->m_guru->update_data($where, $data, 'guru');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_guru');
    }

    public function update_materi($id)
    {
        $this->load->model('m_materi');
        $where = array('id' => $id);
        $data['user'] = $this->m_materi->update_materi($where, 'materi')->result();
        $this->load->view('admin/update_materi', $data);
    }

    public function materi_edit()
    {
        $this->load->model('m_materi');

        $id = $this->input->post('id');
        $nama_guru = $this->input->post('nama_guru');
        $nama_mapel = $this->input->post('nama_mapel');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'nama_guru' => $nama_guru,
            'nama_mapel' => $nama_mapel,
            'deskripsi' => $deskripsi,

        );

        $where = array(
            'id' => $id,
        );

        $this->m_materi->update_data($where, $data, 'materi');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/data_materi');
    }

    public function delete_guru($nip)
    {
        $this->load->model('m_guru');
        $where = array('nip' => $nip);
        $this->m_guru->delete_guru($where, 'guru');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('admin/data_guru');
    }

    public function add_guru()
    {
        $this->form_validation->set_rules('nip', 'Nip', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom NIP.',
            'min_length' => 'NIP terlalu pendek.',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[guru.email]', [
            'is_unique' => 'Email ini telah digunakan!',
            'required' => 'Harap isi kolom email.',
            'valid_email' => 'Masukan email yang valid.',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom nAMA.',
            'min_length' => 'Nama terlalu pendek.',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'required' => 'Harap isi kolom Password.',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('guru/registration');
        } else {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nama_guru' => htmlspecialchars($this->input->post('nama', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama_mapel' => htmlspecialchars($this->input->post('mapel', true)),
            ];

            $this->db->insert('guru', $data);

            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('admin/data_guru'));
        }
    }

    //manajemen materi

    public function data_materi()
    {
        $this->load->model('m_materi');

        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_materi->tampil_data()->result();
        $this->load->view('admin/data_materi', $data);
    }

    public function delete_materi($id)
    {
        $this->load->model('m_materi');
        $where = array('id' => $id);
        $this->m_materi->delete_materi($where, 'materi');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('admin/data_materi');
    }

    public function tambah_materi()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[1]', [
            'required' => 'Harap isi kolom deskripsi.',
            'min_length' => 'deskripsi terlalu pendek.',
        ]);
        if ($this->form_validation->run() == false) {
             $this->load->model('m_guru');
              $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();


        $data['guru'] = $this->m_guru->tampil_data()->result();
            $this->load->view('admin/add_materi',$data);
            
        } else {
            
            if($_POST['jenis_file'] == 'video'){
                  $upload_video = $_FILES['video'];
                    $video = null;
                     $foto = null;
                    if ($upload_video) {
                        $config1['allowed_types'] = 'mp4|mkv|mov';
                        $config1['max_size'] = '0';
                        $config1['upload_path'] = './assets/materi_video';
        
                        $this->load->library('upload', $config1);
        
                        if ($this->upload->do_upload('video')) {
                            $video = $this->upload->data('file_name');
                        } else {
                            $this->upload->display_errors();
                        }
                    }else{
                        $video = null;
                    }
            }else{
                $upload_foto = $_FILES['foto'];
            $foto = null;
             $video = null;
            if ($upload_foto['size'] > 0) { // Check if a file is selected
                    $config['upload_path'] = FCPATH . 'assets/materi_video';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 0;
                
                    $this->load->library('upload', $config);
                    
        
                        if ($this->upload->do_upload('foto')) {
                            $foto = $this->upload->data('file_name');
                        } else {
                            $this->upload->display_errors();
                        }
                } else {
                   $foto = null;
                }
            }
            

          

            

            
            
            $data = [
                'nama_guru' => htmlspecialchars($this->input->post('nama_guru', true)),
                'nama_mapel' => htmlspecialchars($this->input->post('nama_mapel', true)),
                'video' => $video,
                'foto' => $foto,
                'link_ppt'=>htmlspecialchars($this->input->post('link_ppt', true)),
                'jenis_file'=>htmlspecialchars($this->input->post('jenis_file', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            ];
            // var_dump($data);die;


            $this->db->insert('materi', $data);
            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('admin/data_materi'));
        }
    }
}
