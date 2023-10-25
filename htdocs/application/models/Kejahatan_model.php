<?php
class Kejahatan_model extends CI_Model
{
    public function dashboard()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_role', 'users.id_role = user_role.id_role');
        $this->db->where('username', $this->session->userdata('username'));
        return $this->db->get()->row_array();
    }

    public function add_kejahatan()
    {
        $data = [
            'kejahatan'  => $this->input->post('kejahatan', true),
        ];

        $this->db->insert('tb_kejahatan', $data);
    }
    // 
    public function update_kejahatan()
    {
        $id = $this->input->post('id', true);
        $data = [
            'kejahatan'  => $this->input->post('kejahatan', true),

        ];
        $this->db->where('id_kejahatan', $id);
        $this->db->update('tb_kejahatan', $data);
    }

    public function delete_kejahatan($id_kejahatan)
    {
        $this->db->where('id_kejahatan', $id_kejahatan);
        $this->db->delete('tb_kejahatan');
    }


    // ============================TAMBAH DATA KEJAHATA ===========================

    public function show_kejahatan()
    {
        return $this->db->get('tb_kejahatan')->result_array();
    }

    public function add_data_kejahatan()
    {
        $data = [
            'tgl_kejadian' => $this->input->post('tgl_kejadian', true),
            'id_kejahatan' => $this->input->post('kejahatan', true),
            'jumlah_kejahatan' => $this->input->post('jumlah_kejahatan', true)
        ];
        $this->db->insert('tb_data_kejahatan', $data);
    }

    public function update_data_kejahatan()
    {
        $id = $this->input->post('id', true);
        $data = [
            'tgl_kejadian' => $this->input->post('tgl_kejadian', true),
            'id_kejahatan' => $this->input->post('kejahatan', true),
            'jumlah_kejahatan' => $this->input->post('jumlah_kejahatan', true)
        ];
        $this->db->where('id_data_kejahatan', $id);
        $this->db->update('tb_data_kejahatan', $data);
    }

    public function delete_data_kejahatan($id_data_kejahatan)
    {
        $this->db->where('id_data_kejahatan', $id_data_kejahatan);
        $this->db->delete('tb_data_kejahatan');
    }
}
