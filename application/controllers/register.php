<?php
class Register extends CI_Controller {
function __construct()
{
parent::__construct();
$this->load->library(array('form_validation'));
$this->load->model(array('CI_encrypt'));
$this->load->helper(array('form', 'url','recaptcha'));
}

function index(){
if($this->CI_auth->check_logged()=== true)
redirect(base_url().'member_area/');

$data['title'] = 'CodeIgniter Registration System';
$data['menu_top'] = $this->CI_menu->menu_top();
$sub_data['captcha_return'] ='';
$sub_data['cap_img'] = $this ->CI_captcha->make_captcha();
if($this->input->post('submit')) {
$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
$this->form_validation->set_rules('username', 'User name', 'trim|required|alpha_dash|min_length[3]|max_length[20]|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[20]|matches[passconf]|xss_clean');
$this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|min_length[3]|max_length[20]|xss_clean');
$this->form_validation->set_rules('email', 'Email',  'trim|required|min_length[3]|max_length[30]|valid_email');
$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
$this->form_validation->set_rules('terms', 'Terms of Sevices', 'trim|required|xss_clean');
$this->form_validation->set_rules('captcha', 'Captcha', 'required');

// Set Custom messages
//$this->form_validation->set_message('required', 'Your custom message here');


if ($this->form_validation->run() == FALSE){
$data['body']  = $this->load->view('register_view', $sub_data, true);
}
else{
if($this->CI_captcha->check_captcha()==TRUE){
$name = $this->input->post('name');
$username = $this->input->post('username');
$password = $this->input->post('password');
$email = $this->input->post('email');
$country = $this->input->post('country');
$address = $this->input->post('address');
$gender = $this->input->post('gender');
$terms = $this->input->post('terms');
$check_query = "SELECT * FROM `users` WHERE `username`='$username' OR `email`='$email'";
$query = $this->db->query($check_query);
if ($query->num_rows() > 0){
$sub_data['captcha_return'] = 'username or email address you entered is already used by another, please change<br/>';
$data['body']  = $this->load->view('register_view', $sub_data, true);
}
else{
$rand_salt = $this->CI_encrypt->genRndSalt();
$encrypt_pass = $this->CI_encrypt->encryptUserPwd( $this->input->post('password'),$rand_salt);
$input_data = array(
'name' => $name,
'username' => $username,
'email' => $email,
'password' => $encrypt_pass,
'country' => $country,
'address' => $address,
'gender' => $gender,
'salt' => $rand_salt
);
if($this->db->insert('users', $input_data)){
$data['body']  = "Registration success, please login<br/>";
}
else
$data['body']  = "error on query";
}
}
else{
$sub_data['captcha_return'] = "The characters you entered didn't match the word verification. Please try again. <br/>";
$data['body']  = $this->load->view('register_view', $sub_data, true);
}
}

}
else{
$data['body']  = $this->load->view('register_view', $sub_data, true);
}
$this->load->view('_output_html', $data);

}
}
?>