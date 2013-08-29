<?php
Class Career_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }        
    
    function apply($position_id, $firstname, $lastname, $email, $gender, $nationality, $phone, $curr_location, $ip_address, $location, $qualification, $experience, $covernote, $cv_path)        
    {
        $data = array(
            'position_id' => $position_id,            
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email ,
            'gender' => $gender,
            'nationality' => $nationality,
            'phone' => $phone,
            'curr_location' => $curr_location,
            'ip_address' => $ip_address,
            'location' => $location,
            'qualification' => $qualification,
            'experience' => $experience,
            'covernote' => $covernote,
            'cv_path' => $cv_path
        );
        
        $query = "INSERT INTO applications (position_id, firstname, lastname, email, gender, nationality, phone, curr_location, ip_address, location, qualification, experience, covernote, cv_path, applied_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now());";
        $result = $this->db->query($query, $data);
    }
    
    function job_applications()
    {
        $query = "SELECT * FROM applications ORDER BY applied_date DESC;";
        return $this->db->query($query);
    }
    
    function job_positions()
    {
        $query = "SELECT * FROM positions WHERE status = 'O' ORDER BY department_id;";
        return $this->db->query($query);
    }
    
    function get_position_name_by_id($position_id)
    {
        if($position_id != 0)
        {
            $data = array(
                'position_id' => $position_id); 
            $query = "SELECT title FROM positions WHERE ID = ?;";
            return $this->db->query($query, $data)->row(0)->title;
        }
        else
            return 'Any';
    }    
    
    function get_all_departments()
    {
        $query = "SELECT * FROM departments ORDER BY title;";
        return $this->db->query($query);
    }
    
    function get_all_positions()
    {
        $query = "SELECT p.ID, p.title, d.title AS 'dept_title', p.status, p.description, p.num_of_positions, p.posted_date FROM positions p LEFT JOIN departments d
                ON p.department_id = d.ID
                ORDER BY p.posted_date DESC;";
        return $this->db->query($query);
    }    

    function get_all_applications()
    {
        $query = "SELECT a.firstname, a.lastname, p.title AS 'position_title', a.email, a.gender, a.nationality, a.phone, a.curr_location, a.qualification, a.experience, a.covernote, a.cv_path, a.ip_address, a.location, a.applied_date FROM applications a LEFT JOIN positions p
                ON a.position_id = p.ID
                ORDER BY a.applied_date DESC;";
        return $this->db->query($query);
    }    
    
    function submit_job($department_id, $title, $status, $description, $num_of_positions, $ip_address, $location)        
    {
        $data = array(
            'department_id' => $department_id,            
            'title' => $title,
            'status' => $status,
            'description' => $description ,
            'num_of_positions' => $num_of_positions,
            'ip_address' => $ip_address,
            'location' => $location
        );
        
        $query = "INSERT INTO positions (department_id, title, status, description, num_of_positions, ip_address, location, posted_date) VALUES (?, ?, ?, ?, ?, ?, ?, now());";
        $result = $this->db->query($query, $data);
    }    
}
?>