<?php

class M_jawaban extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('jawaban');
    }

    public function jawaban_siswa($where, $table)
    {
        // $result = $this->db->select('jawaban.*,quiz.* ,materi.nama_mapel')
        // ->join('quiz', 'quiz.id = jawaban.id_quiz')
        // ->join('materi', 'quiz.id_materi = materi.id')
        //         ->group_by('jawaban.id_quiz') 
        // ->get_where($table, $where)
        // ->result();
        $result = $this->db->select('jawaban.*, quiz.*, materi.nama_mapel')
    ->join('quiz', 'quiz.id = jawaban.id_quiz')
    ->join('materi', 'quiz.id_materi = materi.id')
    ->group_by('jawaban.id_quiz') 
    ->order_by('jawaban.id', 'desc') // Adding order_by clause
    ->get_where($table, $where)
    ->result();

        // Mengembalikan hasil query
        return $result;
    }
    
    public function jawaban_all()
    {
        $result = $this->db->select('jawaban.*,quiz.* ,materi.nama_mapel,siswa.nama')
        ->join('quiz', 'quiz.id = jawaban.id_quiz')
        ->join('siswa', 'siswa.id = jawaban.id_siswa')
        ->join('materi', 'quiz.id_materi = materi.id')
               // ->group_by('jawaban.id_quiz')  // Adding GROUP BY clause
        ->get('jawaban')
        ->result();

        // Mengembalikan hasil query
        return $result;
    }


    public function detail_jawaban($id = null)
    {
        $query = $this->db->get_where('jawaban', array('id' => $id))->row();
        return $query;
    }

    public function delete_jawaban($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_jawaban($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
