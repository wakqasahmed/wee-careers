<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Careers extends MY_Controller {

        public function options()
        {
            $this->load->view('options_view');
        }
        
        public function add_options($renderData="")
        {
            $config = array(
                           array(
                                 'field'   => 'cv_path', 
                                 'label'   => 'CV Path', 
                                 'rules'   => 'trim|max_length[200]|required|xss_clean'
                              ),
                           array(
                                 'field'   => 'company', 
                                 'label'   => 'Company', 
                                 'rules'   => 'trim|max_length[50]|required|xss_clean'
                              ),
                           array(
                                 'field'   => 'from_email', 
                                 'label'   => 'From Email', 
                                 'rules'   => 'trim|required|valid_email|max_length[100]|xss_clean'
                              ),
                           array(
                                 'field'   => 'to_email', 
                                 'label'   => 'To Email', 
                                 'rules'   => 'trim|required|valid_email|max_length[100]|xss_clean'
                              )                
                        );

            $this->form_validation->set_rules($config);
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('options_view');                        
            }
            else
            {
                //code for setting options in options table starts
                    $this->load->helper('option_helper');

                    try {
                        $options=array(
                            'from_email'      =>   $this->input->post('from_email'), //example: noreply@yourcompany.com
                            'to_email'    =>   $this->input->post('to_email'), //example: you@youremail.com
                            'company' => $this->input->post('company'),
                            'cv_path' => $this->input->post('cv_path')                            
                        );
                        update_option('options',$options);
                        $this->_render('pages/main_view',$renderData);
                    }
                    catch(Exception $e){
                        $this->load->view('options_view');                        
                    }
                //code for setting options in options table ends
            }
        }
    
	public function index($renderData="")
	{
            $this->_render('pages/main_view',$renderData);
	}
        
        public function hiring($renderData="")
        {
            $this->load->model('Career_model');
            $result = $this->Career_model->get_all_positions();            
            
            $this->view_data['positions'] = $result;
            
//            $this->load->view('template/header_view');
            $this->_render('pages/hiring_view', $renderData);            
//            $this->load->view('template/footer_view');
        }
        
        public function apply($position_id = -1, $renderData="")
        {
            $this->load->model('Career_model');
            $result = $this->Career_model->job_positions();                                    
            $this->view_data['job_positions'] = $result;
            $this->view_data['selected_position'] = $position_id;
            
//            echo '<pre>' . print_r($result);
//            $this->load->view('apply_view', $this->view_data);            
            
            $this->view_data['show_upload_msg'] = false;
            
            $this->_render('pages/apply_view', $renderData);                        
            //$this->load->view('pages/apply_view', $this->view_data);            
        }    

        public function post_job($renderData="")
        {
            $this->load->model('Career_model');
            $result = $this->Career_model->get_all_departments();                                    
            $this->view_data['departments'] = $result;

//            echo '<pre>' . print_r($result);
//            $this->load->view('apply_view', $this->view_data);            
            
//            $this->view_data['show_upload_msg'] = false;
            
            $this->_render('pages/jobpost_view', $renderData);                        
            //$this->load->view('pages/jobpost_view', $this->view_data);            
        }        
        
        public function job_applications($renderData="")
        {
            $this->load->model('Career_model');
            $result = $this->Career_model->get_all_applications();            
            
            $this->view_data['applications'] = $result;
            $this->_render('pages/application_view', $renderData);                                    
//            $this->load->view('pages/application_view', $this->view_data);            
        }        
        
        function submit_application($renderData="")
        {
            $this->load->library('user_agent');
            $this->load->model('Career_model');

            $option_data = $this->get_options();            $result = $this->Career_model->job_positions();                                    
            $this->view_data['job_positions'] = $result;            
            $this->view_data['show_upload_msg'] = false;
            $this->view_data['selected_position'] = -1;            
            
            $config = array(
                           array(
                                 'field'   => 'txtFirstName', 
                                 'label'   => 'FirstName', 
                                 'rules'   => 'trim|required|max_length[50]|xss_clean'
                              ),
                           array(
                                 'field'   => 'txtLastName', 
                                 'label'   => 'LastName', 
                                 'rules'   => 'trim|required|max_length[50]|xss_clean'
                              ),                
                           array(
                                 'field'   => 'txtEmail', 
                                 'label'   => 'Email', 
                                 'rules'   => 'trim|required|valid_email|max_length[100]|xss_clean'
                              ),
                           array(
                                 'field'   => 'optGender', 
                                 'label'   => 'Gender', 
                                 'rules'   => 'required|callback_check_gender'
                              ),                
                           array(
                                 'field'   => 'txtNationality', 
                                 'label'   => 'Nationality', 
                                 'rules'   => 'trim|required|max_length[50]|xss_clean'
                              ),                 
                           array(
                                 'field'   => 'txtLocation', 
                                 'label'   => 'Location', 
                                 'rules'   => 'trim|required|max_length[200]|xss_clean'
                              ),
                           /*array(
                                 'field'   => 'lstPositions', 
                                 'label'   => 'Position', 
                                 'rules'   => 'required|callback_check_position'
                              ),*/ 
                           array(
                                 'field'   => 'lstEducation', 
                                 'label'   => 'Education', 
                                 'rules'   => 'required|callback_check_education'
                              ), 
                           array(
                                 'field'   => 'lstExperience', 
                                 'label'   => 'Experience', 
                                 'rules'   => 'required|callback_check_experience'
                              ),                 
                           array(
                                 'field'   => 'txtPhone', 
                                 'label'   => 'Phone', 
                                 'rules'   => 'trim|required|numeric|max_length[50]|xss_clean'//|callback_check_phone'
                              ), 
                           array(
                                 'field'   => 'txtCoverNote', 
                                 'label'   => 'CoverNote', 
                                 'rules'   => 'trim|required|max_length[1000]|xss_clean'
                              )                                
                        );

            $this->form_validation->set_rules($config);
            //$this->form_validation->set_rules('lstPositions', 'Position', 'required|callback_check_position');
            //$this->form_validation->set_rules('optGender', 'Gender', 'required|callback_check_gender');            
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->_render('pages/apply_view', $renderData);                        
//                $this->load->view('pages/apply_view', $this->view_data);            
            }
            else
            {
                    //Upload Code Starts
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'rtf|doc|docx|pdf';
                    $config['max_size']	= '2048';
                    //$config['max_width']  = '1024';
                    //$config['max_height']  = '768';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload())
                    {
                        $error = array('error' => $this->upload->display_errors()); 
                        $this->view_data['error_upload'] = $error;
                        $this->view_data['show_upload_msg'] = true;  
                        
                        $this->_render('pages/apply_view', $renderData);                         
                        //$this->load->view('pages/apply_view', $this->view_data);            
                    }
                    //else
                    //{
                    //        $data = array('upload_data' => $this->upload->data());
                    //}                    
                    //Upload Code Ends                
                    else
                    { 
                    $position_id = $this->input->post('lstPositions');                    
                    $firstname = $this->input->post('txtFirstName');
                    $lastname = $this->input->post('txtLastName');                    
                    $email = $this->input->post('txtEmail');
                    $gender = $this->input->post('optGender');
                    $nationality = $this->input->post('txtNationality');                    
                    $curr_location = $this->input->post('txtLocation');                    
                    $qualification = $this->input->post('lstEducation');
                    $experience = $this->input->post('lstExperience');
                    $phone = $this->input->post('txtPhone');
                    $covernote = $this->input->post('txtCoverNote');                    
                    //$cv_path = array('upload_data' => $this->upload->data());
                    $upload_data = $this->upload->data();
                    $cv_path = $option_data['cv_path'] . $upload_data['file_name'];
                    //$cv_path = 'test.com';
                    
                    $ip_address = $this->input->ip_address();
                    $location = $this->input->post('city') . ', ' . $this->input->post('country');     //implode(', ', $this->_get_location_by_ip($ip_address));                    
                    
                    $this->Career_model->apply($position_id, $firstname, $lastname, $email, $gender, $nationality, $phone, $curr_location, $ip_address, $location, $qualification, $experience, $covernote, $cv_path);                    
                    
                    $this->send_email($this->Career_model->get_position_name_by_id($position_id), $firstname, $lastname, $email, $gender, $nationality, $phone, $curr_location, $ip_address, $location, $qualification, $experience, $covernote, $cv_path); 
                    $this->show_success($lastname . ' ' . $firstname, $gender);
                    }
            }
        }        
        
        function submit_job($renderData="")
        {
            $this->load->library('user_agent');
            $this->load->model('Career_model');

            $result = $this->Career_model->get_all_departments();                                    
            $this->view_data['departments'] = $result; 
            
            $config = array(
                           array(
                                 'field'   => 'txtTitle', 
                                 'label'   => 'Title', 
                                 'rules'   => 'trim|required|max_length[50]|xss_clean'
                              ),
                          array(
                                 'field'   => 'lstDepartment', 
                                 'label'   => 'Department', 
                                 'rules'   => 'required|callback_check_department'
                              ),                
                        array(
                                 'field'   => 'optStatus', 
                                 'label'   => 'Status', 
                                 'rules'   => 'required|callback_check_status'
                              ),                                
                           array(
                                 'field'   => 'txtDescription', 
                                 'label'   => 'Description', 
                                 'rules'   => 'trim|required|max_length[1000]|xss_clean'
                              ),                 
                           array(
                                 'field'   => 'txtNumPositions', 
                                 'label'   => 'Number of Positions', 
                                 'rules'   => 'trim|required|numeric|xss_clean'
                              )                                
                        );

            $this->form_validation->set_rules($config);

            
            if ($this->form_validation->run() == FALSE)
            {
                $this->_render('pages/jobpost_view', $renderData);                        
                //$this->load->view('pages/jobpost_view', $this->view_data);            
            }
            else
            {
                    $department_id = $this->input->post('lstDepartment');                    
                    $title = $this->input->post('txtTitle');
                    $status = $this->input->post('optStatus');                    
                    $description = $this->input->post('txtDescription');
                    $num_of_positions = $this->input->post('txtNumPositions');
                    
                    $ip_address = $this->input->ip_address();
                    $location = $this->input->post('city') . ', ' . $this->input->post('country');                    
                    
                    $this->Career_model->submit_job($department_id, $title, $status, $description, $num_of_positions, $ip_address, $location);                    
                    
                    $this->show_jobpost_success($title);
            }
        }         
        

        /*
        function valid_phone_number_or_empty($value)
        {
                $value = trim($value);
                if (preg_match('/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $value))
                {
                        return preg_replace('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', '($1) $2-$3', $value);
                }
                else
                {
                        return FALSE;
                }
        }
        */        

        
        function get_options() 
        {
            //load our helper,
            //better to autoload it by editing application/config/autoload.php
            $this->load->helper('option_helper');
 
            $return_value=get_option('options');
            return $return_value;
        }        
        
        function send_email($position_id, $firstname, $lastname, $email, $gender, $nationality, $phone, $curr_location, $ip_address, $location, $qualification, $experience, $covernote, $cv_path)
        {
            $this->load->library('email');

            $option_data = $this->get_options();
            
            $this->email->from($option_data['from_email'], $option_data['company'] . ' Careers');            
            $this->email->to($option_data['to_email']); 
 
            $this->email->subject($lastname . ' ' . $firstname, ' applied for '. $position_id . ' position');

            $message = '<html><body>';

            $message .= '<h2>Contacted from: ' . $firstname . '</h2>';

            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($lastname) . ' ' . strip_tags($firstname) . "</td></tr>";
            $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
            $message .= "<tr><td><strong>Gender:</strong> </td><td>" . strip_tags($gender) . "</td></tr>";
            $message .= "<tr><td><strong>Nationality:</strong> </td><td>" . strip_tags($nationality) . "</td></tr>";
            $message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($phone) . "</td></tr>";
            $message .= "<tr><td><strong>Current Location:</strong> </td><td>" . strip_tags($curr_location) . "</td></tr>";
            $message .= "<tr><td><strong>Position Applying for:</strong> </td><td>" . strip_tags($position_id) . "</td></tr>";
            $message .= "<tr><td><strong>Qualification:</strong> </td><td>" . strip_tags($qualification) . "</td></tr>";
            $message .= "<tr><td><strong>Experience:</strong> </td><td>" . strip_tags($experience) . "</td></tr>";
            $message .= "<tr><td><strong>Cover Note:</strong> </td><td>" . strip_tags($covernote) . "</td></tr>";            
            $message .= "<tr><td><strong>Attached CV:</strong> </td><td>" . strip_tags($cv_path) . "</td></tr>";                        

            $message .= "</table>";
            
            $message .= "<p>The message was sent from the IP:" . $ip_address . " having Location: " . $location . "<br>Powered by: <a href='http://www.trixcorp.com'>TrixCorp</a>";
            
            $message .= "</body></html>";            

            $this->email->message($message);	

            $this->email->send();
        }
        
        function show_success($name, $gender, $renderData="")
        {
            $title = '';
            if($gender == 'M')
                $title = 'Mr.';
            else
                $title = 'Miss';
            
            $this->view_data['data'] = 'Thank You, ' . $title . ' ' . $name . ', your application has been received, it will be reviewed shortly.<br> Kindly note: Only shortlisted candidates will be called for an interview.<br>HR Admin, GGI Retail';
            
            $this->_render('pages/success_view', $renderData);                        
            
/*
            $this->load->view('success',$data);            
 */
        }   
        
        function show_jobpost_success($title, $renderData="")
        {
            $this->view_data['data'] = 'Thank You, Job with the title: ' . $title . ' has been posted successfully.';
            $this->_render('pages/success_view', $renderData);                        
        }           
        
        // Custom Validation Functions Starts       

        //Application Form Validation Starts
        /*
        function check_phone()
        {
                $x = $this->input->post('txtPhone');
                if (preg_match('/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $x))
                {
                        $this->form_validation->set_message('check_phone', 'The Phone field is required.');                    
                        return preg_replace('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', '($1) $2-$3', $x);
                }
                else
                {
                        return FALSE;
                }
        } */       
        
        function check_position()
        {  
		/* NOT REQUIRED IF "ANY" is used
           $invalid_selections = array('--Select--');
           $x = $this->input->post('lstPositions');

           if(in_array($x , $invalid_selections))
           {
             $this->form_validation->set_message('check_position', 'The Position field is required.');
             return FALSE;       
           }
           else
           {
             return true;
           }
		   */
        }             

        function check_gender()
        { 
           $valid_selections = array('m','M','f','F');
           $x = $this->input->post('optGender');
           if(in_array($x , $valid_selections))
           {
             return true;
           }
           else
           {
             $this->form_validation->set_message('check_gender', 'The Gender field is required.');
             return FALSE;
           }
        }        

        function check_education()
        { 
           $invalid_selections = array('My highest academic achievement is:');
           $x = $this->input->post('lstEducation');

           if(in_array($x , $invalid_selections))
           {
             $this->form_validation->set_message('check_education', 'The Education field is required.');
             return FALSE;       
           }
           else
           {
             return true;
           }
        }

        function check_experience()
        { 
           $invalid_selections = array('--Select--');
           $x = $this->input->post('lstExperience');

           if(in_array($x , $invalid_selections))
           {
             $this->form_validation->set_message('check_experience', 'The Experience field is required.');
             return FALSE;       
           }
           else
           {
             return true;
           }
        } 
        //Application Form Validation Ends        
        
        //Job Post Form Validation Starts
        function check_status()
        { 
           $valid_selections = array('o','O','f','F');
           $x = $this->input->post('optStatus');
           if(in_array($x , $valid_selections))
           {
             return true;
           }
           else
           {
             $this->form_validation->set_message('check_status', 'The Status field is required.');
             return FALSE;
           }
        }        
        
        function check_department()
        { 
           $invalid_selections = array('--Select--');
           $x = $this->input->post('lstDepartment');

           if(in_array($x , $invalid_selections))
           {
             $this->form_validation->set_message('check_department', 'The Department field is required.');
             return FALSE;       
           }
           else
           {
             return true;
           }
        }         
        //Job Post Form Validation Ends        
        
        // Custom Validation Functions Ends                   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */