<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function __construct()
	{
		//call CodeIgniter's default Constructor
		parent::__construct();
		
		//load database libray manually
		$this->load->database();
		
		//load Model
		$this->load->model('Hello_Model');

		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('login.php');	
	}
	public function loginadmin()
  	{
		$this->load->view('login');
  	}
    public function login_validation()
  	{
	    // exit;
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('username','username','required');
	    $this->form_validation->set_rules('password','password','required');
	    if($this->form_validation->run())
	    {
			$postdata=$this->input->post();
            $username=$postdata['username'];
			$password=$postdata['password'];
			$this->db->where('username',$username);
			$this->db->where('password',$password);
        	$query=$this->db->get('admin')->row_array();
          	$sessiondata = array
            (
               'id' =>$query['id'] ,
			   'username' =>$query['username'],
			   'first_name' =>$query['first_name'],
			   'last_name' =>$query['last_name']
            );
          	$this->session->set_userdata($sessiondata);
			if($query)
			{
				redirect('dashboard');
            	//print_r($query); die();
			}
			else
			{
				redirect('login');
            }          
	    }
		else
		{
			redirect('login');
		}
  	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	function dashboard()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['page_content']='dashboard';
		$this->load->view('welcome_message',$data);
	}
	function settings()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['page_content']='settings';
		$this->load->view('welcome_message',$data);
	}
	function homepagelisting()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['displayrecords']=$this->Hello_Model->displayrecords();
		$data['page_content']='listing';
		$this->load->view('welcome_message',$data);
	}
	function homepage()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['page_content']='homepage';
		$this->load->view('welcome_message',$data);
	}
	function savedata()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		//Check whether user upload picture
		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path'] = 'uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['image']['name'];
             
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
                
			if($this->upload->do_upload('image'))
			{
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
			}
			else
			{
                $picture = '';
            }
		}
		else
		{
            $picture = '';
        }
        //Check submit button 
		if($this->input->post('save'))
		{
			//get form's data and store in local varable
			$now = date("Y-m-d H:i:s");
			$postdata=$this->input->post();
			$t=$postdata['title'];
			$h=$postdata['heading'];
			$s=$postdata['sub_heading']; 
			
			$this->Hello_Model->saverecords($t,$h,$s,$picture,$now);	
		}
		echo "Records Saved Successfully";
		redirect('homepagelisting');
	}
	function savesettings()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data = [];       
		$postdata = $this->input->post();
		
		if($this->input->post())
		{
			//get form's data and store in local varable
			$data = array(
				'application_name' => $postdata['appName'], 
				// 'site_title' => $postdata['sitetitle'], 
				// 'home_title' => $postdata['hometitle'], 
				// 'site_description' => $postdata['sitedescription'], 
				// 'keywords' => $postdata['keywords'], 
				'facebook_url' => $postdata['facebookurl'], 
				'twitter_url' => $postdata['twitterurl'], 
				'google_url' => $postdata['googleurl'], 
				'instagram_url' => $postdata['instagramurl'], 
				'pinterest_url' => $postdata['pinteresturl'], 
				// 'linkedin_url' => $postdata['linkedinurl'], 
				// 'vk_url' => $postdata['vkurl'], 
				'optional_url_button_name' => $postdata['oubn'], 
				'about_footer' => $postdata['aboutfooter'], 
				'contact_text' => $postdata['contacttext'], 
				'contact_address' => $postdata['address'], 
				'contact_email' => $postdata['email'],
				'contact_phone' => $postdata['phone'],
				'copyright' => $postdata['copyright'], 
				'created_at' => date("Y-m-d H:i:s"),
			);
		}
		if(!empty($_FILES['header_logo']['name']))
		{
            $config['upload_path'] = 'uploads/settings';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['header_logo']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
			if (!$this->upload->do_upload('image'))
			{
    			$error = array('error' => $this->upload->display_errors());
			}
			else
			{
    			$upload_data=$this->upload->data();
    			$header_logo=$upload_data['file_name'];
			}
			$data['header_logo'] = $header_logo;
        }
		$id=$postdata['id'];
		
		//call saverecords method of Hello_Model and pass variables as parameter
		$this->Hello_Model->savesettings($data,$id);		
		redirect('settings');
		
	}
	function editslider($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getslider']= $this->db->where('id',$id)->get('homepage_slider')->row_array();
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['page_content']='editslider';
		$this->load->view('welcome_message',$data);
	}
	//Slider Update Function
	function update()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data = [];       
		$postdata = $this->input->post();
		if($this->input->post())
		{
			//get form's data and store in local varable
			$data = array(
				'title' => $postdata['title'], 
				'heading' => $postdata['heading'], 
				'sub_heading' => $postdata['sub_heading']
			);
		}
		if(!empty($_FILES['image']['name']))
		{
            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['image']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
			if (!$this->upload->do_upload('image'))
			{
    			$error = array('error' => $this->upload->display_errors());
			}
			else
			{
    			$upload_data=$this->upload->data();
    			$image=$upload_data['file_name'];
			}
			$data['image'] = $image;
        }
        $id=$postdata['id'];
		$this->Hello_Model->db_update($data,$id);
		redirect('homepagelisting');	
	}
	function deletelist($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$image = $this->db->where('id', $id)->get('homepage_slider')->row_array();
		$this->db->where('id', $id);
		unlink("uploads/".$image['image']);
		$this->db->delete('homepage_slider');
		redirect('homepagelisting');
	}
	function products()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['displayproducts']=$this->Hello_Model->displayproducts();
		$data['page_content']='products';
		$this->load->view('welcome_message',$data);
	}
	function addproducts()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['brands']=$this->Hello_Model->getbrands();
		$data['package']=$this->Hello_Model->getpackage();
		$data['page_content']='addproducts';
		$this->load->view('welcome_message',$data);
	}
	function saveproducts()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		//Check whether user upload picture
		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path'] = 'uploads/products';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['image']['name'];
                
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
              
			if($this->upload->do_upload('image'))
			{
				$uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
			}
			else
			{
				$image = '';
            }
		}
		else
		{
			$image = '';
        }
		$postdata = $this->input->post();
		//Check submit button 
		if($this->input->post())
		{
			//check for featured checkbox
			$featured = $this->input->post('featured');
			if (is_null($featured))
			{
				$featured='0';
			}
			else
			{
				$featured='1';
			}
			//get form's data and store in local varable
			$slug = $this->slug_generator($postdata['name'],"products", "product_slug");
			$data = array(
				'brand_id' => $postdata['brandid'],
				'name' => $postdata['name'],
				'featured' => $featured,
				'number_of_packaging' => $postdata['number_of_packaging'],
				'product_slug' => $slug,
				'package_type_id' => $postdata['packagetype'],
				'price_package' => $postdata['price_package'], 
				'price_cigar' => $postdata['price_cigar'],
				'quantity_ordered' => $postdata['quantity_ordered'],
				'order_value' => $postdata['order_value'], 
				'created_date' => date("Y-m-d H:i:s"),
			);
			//call saverecords method of Hello_Model and pass variables as parameter
			$this->Hello_Model->saveproducts($data);
		}
		echo "Records Updated Successfully";
		redirect('products');
	}
	function deleteproduct($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$image = $this->db->where('id', $id)->get('products')->row_array();
		$this->db->where('id', $id);
		unlink("uploads/products/".$image['image']);
		$this->db->delete('products');
		redirect('products');
	}
	function editproduct($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['getproduct']= $this->db->where('id',$id)->get('products')->row_array();
		$data['brands']=$this->Hello_Model->getbrands();
		$data['package']=$this->Hello_Model->getpackage();
		$data['page_content']='editproduct';
		$this->load->view('welcome_message',$data);
	}
	function updateproduct()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data = [];       
		$postdata = $this->input->post();
		if($this->input->post())
		{
			//get form's data and store in local varable
			$data = array(
				'brand_id' => $postdata['brandid'],
				'name' => $postdata['name'],
				'featured' => $featured,
				'number_of_packaging' => $postdata['number_of_packaging'],
				'package_type_id' => $postdata['packagetype'],
				'price_package' => $postdata['price_package'], 
				'price_cigar' => $postdata['price_cigar'],
				'quantity_ordered' => $postdata['quantity_ordered'],
				'order_value' => $postdata['order_value'], 
				'created_date' => date("Y-m-d H:i:s"),
			);
		}
		if(!empty($_FILES['image']['name']))
		{
            $config['upload_path'] = 'uploads/products';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['image']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
			if (!$this->upload->do_upload('image'))
			{
    			$error = array('error' => $this->upload->display_errors());
			}
			else
			{
    			$upload_data=$this->upload->data();
    			$image=$upload_data['file_name'];
			}
			$data['image'] = $image;
        }
        $id=$postdata['id'];
		$this->Hello_Model->updateproduct($data,$id);
		redirect('products');
	}
	function brands()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['displaybrands']=$this->Hello_Model->displaybrands();
		$data['page_content']='brands';
		$this->load->view('welcome_message',$data);
	}
	function editbrand($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['getbrand'] = $this->db->where('id',$id)->get('brand')->row_array();
		$data['page_content'] = 'editbrand';
		$this->load->view('welcome_message',$data);
	}
	function updatebrand($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data = [];       
		$postdata = $this->input->post();
		$slug = $this->slug_generator($postdata['brand_slug'],"brand","brand_slug");
		if($this->input->post())
		{
			//get form's data and store in local varable
			$data = array(
				'brand_name' => $postdata['brand_name'],
				'brand_slug' => $slug,
				'created_date' => date("Y-m-d H:i:s"),
			);
		}
		if(!empty($_FILES['image']['name']))
		{
            $config['upload_path'] ='uploads/brand';
            $config['allowed_types'] ='jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['image']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
			if (!$this->upload->do_upload('image'))
			{
    			$error = array('error' => $this->upload->display_errors());
			}
			else{
    			$upload_data=$this->upload->data();
    			$image=$upload_data['file_name'];
			}
			$data['image'] = $image;
		}
		/* print_r($data);
		exit;*/
		$update = $this->db->where('id',$id)->update('brand', $data);
			
		redirect('brands');
	}
	function addbrands()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['page_content']='addbrands';
		$this->load->view('welcome_message',$data);
	}
	function deletebrand($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$this->db->where('id', $id);
		$this->db->delete('brand');
		redirect('brands');
	}
	function savebrands()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$postdata = $this->input->post();
		//Check submit button
		$slug = $this->slug_generator($postdata['brand_name'], "brand", "brand_slug");
		if($this->input->post())
		{
			//get form's data and store in local varable
			$data = array(
				'brand_name' => $postdata['brand_name'],
				'brand_slug' => $slug,
				'created_date' => date("Y-m-d H:i:s"),
			);
		}
		if(!empty($_FILES['image']['name']))
		{
            $config['upload_path'] = 'uploads/brand';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['image']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
			if (!$this->upload->do_upload('image'))
			{
    			$error = array('error' => $this->upload->display_errors());
			}
			else
			{
    			$upload_data=$this->upload->data();
    			$image=$upload_data['file_name'];
			}
			$data['image'] = $image;
		}
		//call saverecords method of Hello_Model and pass variables as parameter
		$this->Hello_Model->addbrands($data);
			
		echo "Records Updated Successfully";
		redirect('brands');
	}
	function packagetype()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['displaytype']=$this->Hello_Model->displaytype();
		$data['page_content']='packagetype';
		$this->load->view('welcome_message',$data);
	}
	function addtype()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['page_content']='addtype';
		$this->load->view('welcome_message',$data);
	}
	function savetype()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$postdata = $this->input->post();
		$slug = $this->slug_generator($postdata['type_slug'], "package_type", "type_slug");
		//Check submit button 
		if($this->input->post())
		{
			//get form's data and store in local varable
			$data = array(
				'type_name' => $postdata['type_name'],
				'type_slug' => $slug,
				'created_date' => date("Y-m-d H:i:s"),
			);
			//call saverecords method of Hello_Model and pass variables as parameter
			$this->Hello_Model->addtype($data);
		}
		echo "Records Updated Successfully";
		redirect('packagetype');
	}
	function edittype($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['gettype'] = $this->db->where('id',$id)->get('package_type')->row_array();
		$data['page_content'] = 'edittype';
		$this->load->view('welcome_message',$data);
	}
	function update_type($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$postdata = $this->input->post();
		$slug = $this->slug_generator($postdata['type_slug'], "package_type", "type_slug");
		if($this->input->post())
		{
			//get form's data and store in local varable
			$data = array(
				'type_name' => $postdata['type_name'],
				'type_slug' => $slug,
				'created_date' => date("Y-m-d H:i:s"),
			);
		}		
		$this->Hello_Model->updatetype($data,$id);
		redirect('index');
	}
	function deletetype($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect(base_url().'index');
		}
		$this->db->where('id', $id);
		$this->db->delete('package_type');
		redirect('packagetype');		
	}
	//cancel order
	function cancel()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();

		$data['displayorder']=$this->Hello_Model->displayorders2();
		$data['page_content']='cancel';
		$this->load->view('welcome_message',$data);
	}
	function editcancelstatus($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
	
		$data['getprofile']= $this->db->get('admin')->row_array();
		
		$data['getorder']= $this->Hello_Model->getorder($id);
		$data['getorder2']= $this->Hello_Model->getorder2($id);
		//print_r($data['getorder2']); die();
		$data['page_content'] = 'cancelstatus';
		$this->load->view('welcome_message',$data);
	}
	//comleted order
	function completed()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();

		$data['displayorder']=$this->Hello_Model->displayorders3();
		$data['page_content']='completed';
		$this->load->view('welcome_message',$data);
	}
	function editcompletedstatus($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
	
		$data['getprofile']= $this->db->get('admin')->row_array();
		
		$data['getorder']= $this->Hello_Model->getorder($id);
		$data['getorder2']= $this->Hello_Model->getorder2($id);
		//print_r($data['getorder2']); die();
		$data['page_content'] = 'completedstatus';
		$this->load->view('welcome_message',$data);
	}
	//pending  orders
	function orders()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();

		$data['displayorder']=$this->Hello_Model->displayorders();
		
		$data['page_content']='orders';
		$this->load->view('welcome_message',$data);
	}
	function editorderstatus($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
	
		$data['getprofile']= $this->db->get('admin')->row_array();
		
		$data['getorder']= $this->Hello_Model->getorder($id);
		$data['getorder2']= $this->Hello_Model->getorder2($id);
		//print_r($data['getorder2']); die();
		// print_r($data['getorder']);
		// exit;
		
		$data['page_content'] = 'orderstatus';
		$this->load->view('welcome_message',$data);
	}
	public function updateorderstatus()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$postdata = $this->input->post();

		$this->Hello_Model->updateorderstatus($postdata);
		echo json_encode(['condition'=>'success']);
		//$this->orders();
	}
	function deleteorder($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$this->db->where('id', $id);
		$this->db->delete('orders');
		redirect('orders');
	}
	public function blogs()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['displayblogs']= $this->db->get('blog')->result_array();
		$data['page_content']='blogs';
		$this->load->view('welcome_message',$data);
	}
	public function addblogs()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['page_content']='addblogs';
		$this->load->view('welcome_message',$data);
	}
	public function saveblogs()
	{		
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		if(!empty($_FILES['image']['name']))
		{
			$config['upload_path'] = 'uploads/blogs/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['image']['name'];
                
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
                
			if($this->upload->do_upload('image'))
			{
            	$uploadData = $this->upload->data();
                $image = $uploadData['file_name'];
			}
			else
			{
                $image = '';
            }
		}
		else
		{
            $image = '';
        }
        $postdata = $this->input->post();
        $featured = $this->input->post('featured');
		if (is_null($featured))
		{
			$featured='0';
		}
		else
		{
			$featured='1';
		}
        //Check submit button 
		if($this->input->post('save'))
		{
			//get form's data and store in local varable
			$postdata=$this->input->post();
			$data = array(
				'title' => $postdata['title'] ,
				'description' => $postdata['description'] ,
				'image' => $image ,
				'featured' => $featured ,
				'date' => $postdata['date'] , 
			);
			$data['title_slug'] = $this->slug_generator($data['title'], "blog", "title_slug");

			// echo "<pre>";
			// print_r($data);
			// exit;
	   		 
			$this->Hello_Model->saveblogs($data);	
		}
		echo "Records Saved Successfully";
		redirect('blogs');
	}
	public function editblog($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['getblogs']= $this->db->where('id',$id)->get('blog')->row_array();
		$data['page_content']='editblog';
		$this->load->view('welcome_message',$data);
	}
	public function updateblog($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data = [];       
		$postdata = $this->input->post();
		if(!empty($_FILES['image']['name']))
		{
            $config['upload_path'] = 'uploads/blogs/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['image']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
			if (!$this->upload->do_upload('image'))
			{
    			$error = array('error' => $this->upload->display_errors());
			}
			else
			{
    			$upload_data=$this->upload->data();
    			$image=$upload_data['file_name'];
			}
			$data['image'] = $image;
        }
		if($this->input->post())
		{
        	$featured = $postdata['featured'];
			if (is_null($featured))
			{
				$featured='0';
			}
			else
			{
				$featured='1';
			}
			//get form's data and store in local varable
			$data = array(
				'title' => $postdata['title'] ,
				'description' => $postdata['description'] ,
				'image' => $image ,
				'featured' => $featured ,
				'date' => $postdata['date'] , 
			);
			$data['title_slug'] = $this->slug_generator($data['title'], "blog", "title_slug");
			
			// echo "<pre>";
			// print_r($data);
			// exit;
		}
        $id=$postdata['id'];
		$this->Hello_Model->updateblog($data,$id);
		redirect('blogs');	
	}
	function deleteblog($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$this->db->where('id', $id);
		$this->db->delete('blog');
		redirect('blogs');		
	}
	public function slug_generator($title, $table, $column) 
	{
        // $title = strtolower(preg_replace('/[^a-zA-Z0-9- ]/', '', $title)); //Removes special characters
		// $title = str_replace (" ", "-", trim(preg_replace("/ {2,}/", " ", $title)));
		// $title = str_replace ("%", "-",$title );
		// $title = str_replace ("´", "-",$title );
		// $title = str_replace ("ä", "a",$title );
		// $title = str_replace ("ö", "o",$title );
		// $title = str_replace ("å", "a",$title );
		// $title = str_replace (",", "-",$title );
		// $title = str_replace ("ò", "o",$title );
		// $check_string = preg_replace('/-+/', '-', $title);
		
		$check_string = $this->postslug($title);
        $i = 1;
        $slug = "";
		while($i > 0)
		{
            $this->db->where($column, $check_string);
            $data = $this->db->count_all_results($table);
			if($data > 0)
			{
                $check_string = $title."-".$i;
			}
			else
			{
                $slug = $check_string;
                break;
            }
            $i++;
        }
        return $slug;
	}
	function remove_accent($str)
	{
		$a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ','~','!','@','#','$','%','^','&','*','(',')','+','|','}','{','"',':','?','>','<','`','=',']','[',',',';','/','.',',');
		$b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-');
		return str_replace($a, $b, $str);
	}
	function postslug($str)
	{
		return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),array('', '-', ''), $this->remove_accent($str)));
	}
	function profile()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getslider']= $this->db->get('homepage_slider')->row_array();
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['page_content']='profile';
		$this->load->view('welcome_message',$data);
	}
	public function updateprofile($id)
	{
		/*	if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect(base_url().'index');
		}
		$data = [];       
		$postdata = $this->input->post();
		if(!empty($_FILES['profile_image']['name'])){
            $config['upload_path'] = 'uploads/profile';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['profile_image']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('profile_image')){
    			$error = array('error' => $this->upload->display_errors());
			}
			else{
    			$upload_data=$this->upload->data();
    			$profile_image=$upload_data['file_name'];
			}
			
        }
        if($this->input->post()){
			//get form's data and store in local varable
			$data = array(
				'first_name' => $postdata['first_name'] ,
					'last_name' => $postdata['last_name'] ,
					'username' => $postdata['username'] ,
					'password' => $postdata['password'] ,
					'email' => $postdata['email'] ,
					'contact' => $postdata['contact'],
					'address' => $postdata['address'],
					'profile_image' => $postdata['profile_image']
			);
		}
		$data['profile_image'] = $profile_image;
        $id=$postdata['id'];
		$this->Hello_Model->updateprofile($data,$id);
		redirect('profile');*/


		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data = [];       
		$postdata = $this->input->post();
		if($this->input->post())
		{
			//get form's data and store in local varable
			$data = array(
				'first_name' => $postdata['first_name'] ,
				'last_name' => $postdata['last_name'] ,
				'username' => $postdata['username'] ,
				'password' => $postdata['password'] ,
				'email' => $postdata['email'] ,
				'contact' => $postdata['contact'],
				'address' => $postdata['address'],
			);
		}
		if(!empty($_FILES['profile_image']['name']))
		{
            $config['upload_path'] = 'uploads/profile';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['profile_image']['name'];
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
			if (!$this->upload->do_upload('profile_image'))
			{
    			$error = array('error' => $this->upload->display_errors());
			}
			else
			{
    			$upload_data=$this->upload->data();
    			$profile_image=$upload_data['file_name'];
			}
			
        }
        $data['profile_image'] = $profile_image;
        $id=$postdata['id'];
		$this->Hello_Model->updateprofile($data,$id);
		redirect('profile');		
	}
	public function policies()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['policies']= $this->db->get('policies')->result_array();
		$data['page_content']='policy_list';
		$this->load->view('welcome_message',$data);
	}
	public function add_policy()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['brands']=$this->Hello_Model->getbrands();
		$data['package']=$this->Hello_Model->getpackage();
		$data['page_content']='addpolicy';
		$this->load->view('welcome_message',$data);
	}
	public function savepolicy()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$postdata = $this->input->post();
		
		if(!empty($postdata))
		{
			//get form's data and store in local varable
			$data = array(
				'policy_name' => $postdata['policy_name'], 
				'content' => $postdata['content']
			);
		}
		$data['title_slug'] = $this->slug_generator($postdata['policy_name'], "policies", "title_slug");
		
		$this->db->insert('policies',$data);		
		
		redirect('policies');
	}
	public function editpolicy($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['getpolicy']= $this->db->where('id',$id)->get('policies')->row_array();
		$data['page_content']='editpolicy';

		// echo "<pre>";
		// print_r($data);
		// exit;
		$this->load->view('welcome_message',$data);
	}
	public function updatepolicy()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$postdata = $this->input->post();
		$policy= $this->db->where('id',$postdata['id'])->get('policies')->row_array();
		
		if(!empty($postdata))
		{
			//get form's data and store in local varable
			$data = array(
				'policy_name' => $postdata['policy_name'], 
				'content' => $postdata['content']
			);
		}

		if($policy['policy_name'] != $postdata['policy_name'])
		{
			$data['title_slug'] = $this->slug_generator($postdata['policy_name'], "policies", "title_slug");
		}

		// echo "<pre>";
		// print_r($data);
		// exit;
		
		$this->db->where('id', $postdata['id']);
		$this->db->update('policies',$data);		
		
		redirect('policies');
	}
	public function deletepolicy($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$this->db->where('id', $id);
		$this->db->delete('policies');
		redirect('policies');
	}
	public function faqs()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['faqs']= $this->db->get('faqs')->result_array();
		$data['page_content']='faqs_list';
		$this->load->view('welcome_message',$data);
	}
	public function add_faqs()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['brands']=$this->Hello_Model->getbrands();
		$data['package']=$this->Hello_Model->getpackage();
		$data['page_content']='addfaqs';
		$this->load->view('welcome_message',$data);
	}
	public function savefaqs()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$postdata = $this->input->post();
		
		if(!empty($postdata))
		{
			//get form's data and store in local varable
			$data = array(
				'title' => $postdata['title'], 
				'detail' => $postdata['detail']
			);
		}
		$data['title_slug'] = $this->slug_generator($postdata['title'], "faqs", "title_slug");
		
		$this->db->insert('faqs',$data);		
		
		redirect('faqs');
	}
	public function edit_faqs($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['getfaqs']= $this->db->where('id',$id)->get('faqs')->row_array();
		$data['page_content']='editfaqs';

		// echo "<pre>";
		// print_r($data);
		// exit;
		$this->load->view('welcome_message',$data);
	}
	public function updatefaqs()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$postdata = $this->input->post();
		$faqs= $this->db->where('id',$postdata['id'])->get('faqs')->row_array();
		
		if(!empty($postdata))
		{
			//get form's data and store in local varable
			$data = array(
				'title' => $postdata['title'], 
				'detail' => $postdata['detail']
			);
		}

		if($faqs['title'] != $postdata['title'])
		{
			$data['title_slug'] = $this->slug_generator($postdata['title'], "faqs", "title_slug");
		}

		// echo "<pre>";
		// print_r($data);
		// exit;
		
		$this->db->where('id', $postdata['id']);
		$this->db->update('faqs',$data);		
		
		redirect('faqs');
	}
	public function deletefaqs($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$this->db->where('id', $id);
		$this->db->delete('faqs');
		redirect('faqs');
	}
	public function contact()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['contact']= $this->db->get('contact_us')->result_array();
		$data['page_content']='contact_list';
		$this->load->view('welcome_message',$data);
	}
	public function view_message()
	{
		$data = $this->input->post();
		$data['message']= $this->db->where('id',$data['id'])->get('contact_us')->row_array();

		echo json_encode(['res'=>"yes",'data'=>$data['message']]);
		// echo "<pre>";
		// print_r($data);
		// exit;
	}
	public function deletemessage($id)
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$this->db->where('id', $id);
		$this->db->delete('contact_us');
		redirect('contact');
	}
	public function seo()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['seo']= $this->db->get('seo')->result_array();
		$data['page_content']='seo';
		$this->load->view('welcome_message',$data);
	}
	public function addseo()
	{
		if(!$this->session->userdata('id'))
		{
			$this->session->set_flashdata('err_message', '- You have to login to access this page.');
			redirect('index');
		}
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['page_content']='addseo';
		$this->load->view('welcome_message',$data);
	}
	public function saveseo()
	{
		$data = $this->input->post();
		$data['title_slug'] = $this->slug_generator($data['meta_title'], "seo", "title_slug");

		$this->db->insert('seo',$data);

		redirect('seo');
	}
	public function editseo($id)
	{
		$data = $this->db->where('id',$id)->get('seo')->row_array();
		$data['getprofile']= $this->db->get('admin')->row_array();
		$data['page_content']='editseo';
		
		// echo "<pre>";
		// print_r($data);
		// exit;
		
		$this->load->view('welcome_message',$data);
	}
	public function updateseo()
	{
		$data = $this->input->post();
		$data['title_slug'] = $this->slug_generator($data['meta_title'], "seo", "title_slug");
		$this->db->where('id', $data['id']);
		$this->db->update('seo',$data);
		// echo "<pre>";
		// print_r($data);
		// exit;
		redirect('seo');
	}
	public function ckblogupload()
	{
		$base_url = base_url();
		if(isset($_FILES['upload']['name']))
		{
			 $file = $_FILES['upload']['tmp_name'];
			 $file_name = $_FILES['upload']['name'];
			 $file_name_array = explode(".", $file_name);
			 $extension = end($file_name_array);
			 $new_image_name = rand() . '.' . $extension;
			 chmod('upload', 0777);
			 $allowed_extension = array("jpg", "gif", "png");
			 if(in_array($extension, $allowed_extension))
			 {
			  move_uploaded_file($file, 'uploads/blogs/' . $new_image_name);
			  $function_number = $_GET['CKEditorFuncNum'];
			  $url = $base_url.'/uploads/blogs/' . $new_image_name;
			  $message = '';
			  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
			 }
		}
	}
	public function ckfaqsupload()
	{
		$base_url = base_url();
		if(isset($_FILES['upload']['name']))
		{
			 $file = $_FILES['upload']['tmp_name'];
			 $file_name = $_FILES['upload']['name'];
			 $file_name_array = explode(".", $file_name);
			 $extension = end($file_name_array);
			 $new_image_name = rand() . '.' . $extension;
			 chmod('upload', 0777);
			 $allowed_extension = array("jpg", "gif", "png");
			 if(in_array($extension, $allowed_extension))
			 {
			  move_uploaded_file($file, 'uploads/faqs/' . $new_image_name);
			  $function_number = $_GET['CKEditorFuncNum'];
			  $url = $base_url.'/uploads/faqs/' . $new_image_name;
			  $message = '';
			  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
			 }
		}
	}
	public function ckpolicyupload()
	{
		$base_url = base_url();
		if(isset($_FILES['upload']['name']))
		{
			 $file = $_FILES['upload']['tmp_name'];
			 $file_name = $_FILES['upload']['name'];
			 $file_name_array = explode(".", $file_name);
			 $extension = end($file_name_array);
			 $new_image_name = rand() . '.' . $extension;
			 chmod('upload', 0777);
			 $allowed_extension = array("jpg", "gif", "png");
			 if(in_array($extension, $allowed_extension))
			 {
			  move_uploaded_file($file, 'uploads/policy/' . $new_image_name);
			  $function_number = $_GET['CKEditorFuncNum'];
			  $url = $base_url.'/uploads/policy/' . $new_image_name;
			  $message = '';
			  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
			 }
		}
	}

	// For Cleaning Brand & Product Slugs Manually
	// function temp()
	// {
	// 	$this->db->select("id, product_slug");
	// 	$products = $this->db->get('products')->result_array();

	// 	$this->db->select("id, brand_slug");
	// 	$brands = $this->db->get('brand')->result_array();

	// 	foreach($products as $val)
	// 	{
	// 		$d['product_slug'] = $this->postslug($val['product_slug']);
	// 		$this->db->where('id', $val['id']);
	// 		$this->db->update('products', $d);
	// 	}
	// 	foreach($brands as $val)
	// 	{
	// 		$d['brand_slug'] = $this->postslug($val['brand_slug']);
	// 		$this->db->where('id', $val['id']);
	// 		$this->db->update('brand', $d);
	// 	}
	// }

}