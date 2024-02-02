<?php

class M_materi extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('materi');
    }

    public function belajar($id = null)
    {
        $query = $this->db->get_where('materi', array('id' => $id))->row();
        return $query;
    }

    public function detail_materi($id = null)
    {
        $query = $this->db->get_where('materi', array('id' => $id))->row();
        return $query;
    }

    public function delete_materi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_materi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function matematika_x()
    {
        $mapel = 'Matematika';
        $kelas = 'X';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function matematika_xi()
    {
        $mapel = 'Matematika';
        $kelas = 'XI';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function matematika_xii()
    {
        $mapel = 'Matematika';
        $kelas = 'XII';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function ipa_x()
    {
        $mapel = 'IPA';
        $kelas = 'X';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function ipa_xi()
    {
        $mapel = 'IPA';
        $kelas = 'XI';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function ipa_xii()
    {
        $mapel = 'IPA';
        $kelas = 'XII';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function indo_x()
    {
        $mapel = 'Bahasa Indonesia';
        $kelas = 'X';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function indo_xi()
    {
        $mapel = 'Bahasa Indonesia';
        $kelas = 'XI';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function indo_xii()
    {
        $mapel = 'Bahasa Indonesia';
        $kelas = 'XII';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function inggris_x()
    {
        $mapel = 'Bahasa Inggris';
        $kelas = 'X';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function inggris_xi()
    {
        $mapel = 'Bahasa Inggris';
        $kelas = 'XI';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function inggris_xii()
    {
        $mapel = 'Bahasa Inggris';
        $kelas = 'XII';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function agama_x()
    {
        $mapel = 'Pendidikan Agama Islam';
        $kelas = 'X';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function agama_xi()
    {
        $mapel = 'Pendidikan Agama Islam';
        $kelas = 'XI';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }

    public function agama_xii()
    {
        $mapel = 'Pendidikan Agama Islam';
        $kelas = 'XII';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
    
    public function biologi_x()
    {
        $mapel = 'Biologi';
        $kelas = 'X';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
    
      public function biologi_xi()
    {
        $mapel = 'Biologi';
        $kelas = 'XI';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
      public function biologi_xii()
    {
        $mapel = 'Biologi';
        $kelas = 'XII';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
    //kimia_x
     public function kimia_x()
    {
        $mapel = 'Kimia';
        $kelas = 'X';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
    
      public function kimia_xi()
    {
        $mapel = 'Kimia';
        $kelas = 'XI';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
      public function kimia_xii()
    {
        $mapel = 'Kimia';
        $kelas = 'XII';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
    
    //fisika_x
     public function fisika_x()
    {
        $mapel = 'Fisika';
        $kelas = 'X';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
    
      public function fisika_xi()
    {
        $mapel = 'Fisika';
        $kelas = 'XI';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
      public function fisika_xii()
    {
        $mapel = 'Fisika';
        $kelas = 'XII';
        $this->db->where('kelas', $kelas);
        $this->db->where('nama_mapel', $mapel);
        return $this->db->get('materi');
    }
    
}
