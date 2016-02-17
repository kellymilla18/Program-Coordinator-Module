<?php

class Program extends CI_Model {
    public function addProgram($data) {
        $this->db->insert('program', $data);
    }
 
    public function getPrograms() {
        $query = $this->db->get('program');
        $data = array();
        foreach($query->result() as $row)
            $data[$row->program_id] = $row->program_name;
        return $data;
    }
    
    public function getProgramID($program_code) {
        $this->db->where('program_code', $program_code);
        return $this->db->get('program')->row->program_id;
    }
}