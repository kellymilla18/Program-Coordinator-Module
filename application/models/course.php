<?php

class Course extends CI_Model {
    public function getCourses() {
        $courses = $this->db->get('course');
        return $courses->result();
    }
    
    public function getPrerequisites($course_id) {
        $this->db->where('course_id', $course_id);
        $prereq = $this->db->get('prerequisite');
        return $prereq->result();
    }
}