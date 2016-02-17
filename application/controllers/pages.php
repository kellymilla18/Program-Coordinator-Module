<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
    
	public function index() {
        redirect(base_url("index.php/pages/home"));
	}
    
    public function home() {
        $this->load->view('home');
    }

    public function graph() {
        $this->load->view('graph');
    }
    
    public function addProgram() {
        $this->load->view('addprogram');
    }
    
    public function addProgramAttempt() {
        $data['program_id'] = $this->input->post('program-id');
        $data['program_name'] = $this->input->post('program-name');
        $this->program->addProgram($data);
        redirect(base_url("index.php/pages/home"));
    }
    
    public function programs() {
        $data['programs'] = $this->program->getPrograms();
        $this->load->view('viewprograms', $data);
    }
    
    public function CoursesJSON() {
        $data = array();
        $courses = $this->course->getCourses();
        $x = 0;
        foreach($courses as $row) {
            $data[$x]['id'] = $row->course_id;
            $data[$x]['title'] = $row->course_code;
            $data[$x]['label'] = $row->course_name;
            $parents = $this->course->getPrerequisites($row->course_id);
            $y = 0;
            foreach($parents as $parent)
                $data[$x]['parents'][$y++] = $parent->course_id_pre;
            $x++;
        }
        echo json_encode($data);
    }
}
