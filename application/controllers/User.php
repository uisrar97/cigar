<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
		//$this->load->helper('common_helper');
		$this->_request_type = file_get_contents("php://input");
	}
	public function signup(){
		$data=json_decode($this->_request_type); 
		//if (!empty($this->token) && in_array($this->token, $this->TOKENS)) {
			if (!empty($data) && !empty($data->fullname) && !empty($data->email) && !empty($data->password)) {
				$this->db->where("email_address", $data->email);
				$query = $this->db->count_all_results('users');
		        if($query > 0) {
					echo json_encode(['condition'=>'error','message'=>'Email already exist.']);
		        }else {
		            $userdata = array(
						'first_name' => $data->fullname,
						'email_address' => $data->email,
						'password' => $data->password,
						'date_created' => date('Y-m-d H:i:s'),
					);
					$insertUserData  = $this->Common_model->insert_data('users', $userdata,'yes');
					$where = array('id'=>$insertUserData,);
					$getUser_info  = $this->Common_model->select_data_row('users', $where);
					if($getUser_info){
						$sessionData = array(
							'user_id' => $getUser_info['id'],
							'username' => $getUser_info['first_name'],
						);
						
						$session = $this->session->set_userdata($sessionData);
						echo json_encode(['condition'=>'success','message'=>'User inserted','data'=>$getUser_info]);
					}else{
						echo json_encode(['condition'=>'error','message'=>'Somethin went wrong.']);
					}
		        }
				//$chkUser=$this->Profile_model->chkUsername($data->userName);
			}else{
				echo json_encode(['condition'=>'error','message'=>'Some values are missing please fill all required fields.']);
			}
		/*}else{
			echo json_encode(['status'=>false,'message'=>'Token mismatch.']);
		}*/
	}
	public function login(){
		$data=json_decode($this->_request_type); 
		//if (!empty($this->token) && in_array($this->token, $this->TOKENS)) {
			if (!empty($data) && !empty($data->email) &&  !empty($data->password)) {
				$where =  array('email_address' => $data->email, 'password'=>$data->password);
				$user_info  = $this->Common_model->select_data_row('users', $where);
				if($user_info){
					$sessionData = array(
						'user_id' => $user_info['id'],
						'username' => $user_info['first_name'],
					);
					$session = $this->session->set_userdata($sessionData);
					echo json_encode(['condition'=>'success','message'=>'UserLogin','data'=>$user_info ]);
					exit;
				}else{
					echo json_encode(['condition'=>'error','message'=>'incorrect email or password']);
					exit;
				}
				//$chkUser=$this->Profile_model->chkUsername($data->userName);
			}else{
				echo json_encode(['condition'=>'error','message'=>'Some values are missing please fill all required fields.']);
			}
		/*}else{
			echo json_encode(['status'=>false,'message'=>'Token mismatch.']);
		}*/
	}
	public function getSessionData(){
		if (!empty($this->session->userdata('user_id'))) {
			$session = $this->session->userdata();
			echo json_encode(['condition'=>'login','data'=>$session]);
		}else{
			echo json_encode(['condition'=>'not-login','data'=>""]);
		}	
	}

	public function logout(){
		$response=array();
		$this->session->sess_destroy();
		$response['statusCode'] = '200';
		echo json_encode($response);
	}

	public function validate_email(){
		$email = $this->input->post('email');
        $this->db->where("email_address", $email);
        $query = $this->db->count_all_results('users');
        if ($query > 0) {
			echo "false";
        } else {
            echo "true";
        }
	}

	public function check_login()
    {
        if (!$this->session->userdata('user_id')) {
            echo json_encode(['condition'=>'not-login']);
        } else {
            echo json_encode(['condition'=>'login']);
        }
    }
}
