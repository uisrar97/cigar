<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Homepage extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
		$this->load->model('Common_model');
		require_once APPPATH.'/libraries/SimpleXLSX.php';
	}
	public function index()
	{
		$data['getslider']= $this->db->get('homepage_slider')->row_array();
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['seo']= $this->db->where('type', 'Home')->get('seo')->row_array();
		
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		// $this->db->select("brand.*,  products.*");
		// $this->db->from("products");
		// $this->db->join("brand","brand.id = products.brand_id","left");
		// $this->db->where("products.featured",1);
		// $data['featuredProducts'] = $this->db->limit(8)->get()->result_array();


		$this->db->select('*');
		$this->db->from('products a'); 
		$this->db->join('brand b', 'b.id=a.brand_id', 'left');
		$this->db->join('product_detail c', 'c.product_id=a.id', 'left');
		$this->db->where('a.featured',1);
		$data['featuredProducts'] = $this->db->limit(8)->get()->result_array();

		$this->db->select('*');
		$this->db->from('products a'); 
		$this->db->join('brand b', 'b.id=a.brand_id', 'left');
		$this->db->join('product_detail c', 'c.product_id=a.id', 'left');
		$data['ourProducts'] = $this->db->order_by('a.id', 'RANDOM')->limit(8)->get()->result_array();
		$data['cartdata'] = $cartdata;

		$data['policies'] = $this->db->get('policies')->result_array();
		// $data['product_detail'] = $this->db->get()->row_array();
		//$data['featuredProducts'] = $this->db->order_by('id','RANDOM')->limit(8)->get('products')->result_array();
		$data['page_content'] = 'homepage/homepage';

		// echo "<pre>";
		// print_r($data['getsettings']);
		// exit;

		$this->load->view('main_view',$data);
	}
	public function productlisting($sorting='', $sortby='',$orderby='',$start='')
	{
		/* $this->load->library('pagination');

		$config['base_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/cigar/product_detail/productlisting';
		$config['total_rows'] = 200;
		$config['per_page'] = 16;

		$this->pagination->initialize($config);

		echo $this->pagination->create_links();
		*/
		$data['seo']['meta_title']= 'Products';
		$data['seo']['meta_description']= 'Products';
	
		$data['getslider']= $this->db->get('homepage_slider')->row_array();
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		
		if(!empty($sorting))
		{
			if($sorting != 'sort-by')
			{
				$pricelimit = explode('-', $sorting);
				$this->db->select("brand.*,  products.*");
				$this->db->from("brand");
				$this->db->join("products","products.brand_id = brand.id","left");
				$this->db->where('price_cigar >=', $pricelimit[0]);
				$this->db->where('price_cigar <=', $pricelimit[1]);
				$data['products'] = $this->db->get()->result_array();
			}
			else
			{
				if($sortby == 'price')
				{
					if($orderby == 'asc')
					{
						$this->db->order_by('price_cigar','ASC');
					}
					if($orderby == 'desc')
					{
						$this->db->order_by('price_cigar','DESC');
					}
				}
				if($sortby == 'name')
				{
					if($orderby == 'asc')
					{
						$this->db->order_by('name','ASC');
					}
					if($orderby == 'desc')
					{
						$this->db->order_by('name','DESC');
					}
				}
				if($sortby == 'date')
				{
					if($orderby == 'desc')
					{
						$this->db->order_by('products.id','DESC');
					}
				}
				if(!empty($start))
				{
					$pricelimit = explode('-', $start);
					$this->db->where('price_cigar >=', $pricelimit[0]);
					$this->db->where('price_cigar <=', $pricelimit[1]);
				}
				$this->db->select("brand.*,  products.*");
				$this->db->from("brand");
				$this->db->join("products","products.brand_id = brand.id","left");
				$data['products'] = $this->db->limit(20)->get()->result_array();
				$data['total_products'] = count($data['products']);
			}

		}
		else
		{
			
			$this->db->select("brand.*,  products.*");
			$this->db->from("brand");
			$this->db->join("products","products.brand_id = brand.id","left");
			
			$data['products'] = $this->db->limit(20)->get()->result_array();
			$data['total_products'] = count($data['products']);
		}	

		$data['heading'] = 'Cigars Collections';
		// $data['products'] = $this->db->limit(20)->get('products')->result_array();
		$data['page_content'] = 'product_detail/productlisting';

		

		$this->load->view('main_view',$data);
	}
	public function brands($slug = '', $sorting='', $sortby='',$orderby='',$start='')
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		if(!empty($slug) )
		{
			if($slug != 'sort-by')
			{
				$pricelimit = explode('-', $slug);
				if(is_numeric($pricelimit[0]) && is_numeric($pricelimit[1]))
				{
					$this->db->where('products.price_cigar >=', $pricelimit[0]);
					$this->db->where('products.price_cigar <=', $pricelimit[1]);
				}
				else
				{
					if($sorting != 'sort-by')
					{
						$pricelimit = explode('-', $sorting);
						if(is_numeric($pricelimit[0]) && is_numeric($pricelimit[1]))
						{
							$this->db->where('price_cigar >=', $pricelimit[0]);
							$this->db->where('price_cigar <=', $pricelimit[1]);
						}	
					}
					else
					{
						if($sortby == 'price')
						{
							if($orderby == 'asc')
							{
								$this->db->order_by('price_cigar','ASC');
							}
							if($orderby == 'desc')
							{
								$this->db->order_by('price_cigar','DESC');
							}
						}
						if($sortby == 'name')
						{
							if($orderby == 'asc')
							{
								$this->db->order_by('name','ASC');
							}
							if($orderby == 'desc')
							{
								$this->db->order_by('name','DESC');
							}
						}
						if($sortby == 'date')
						{
							if($orderby == 'desc')
							{
								$this->db->order_by('products.id','DESC');
							}
						}
						if(!empty($start))
						{
							$pricelimit = explode('-', $start);
							$this->db->where('price_cigar >=', $pricelimit[0]);
							$this->db->where('price_cigar <=', $pricelimit[1]);
						}
					}
				$this->db->where("brand.brand_slug", $slug);
				}
			}
			else
			{
				if($sorting == 'price')
				{
					if($sortby == 'asc')
					{
						$this->db->order_by('price_cigar','ASC');
					}
					if($sortby == 'desc')
					{
						$this->db->order_by('price_cigar','DESC');
					}
				}
				if($sorting == 'name')
				{
					if($sortby == 'asc')
					{
						$this->db->order_by('name','ASC');
					}
					if($sortby == 'desc')
					{
						$this->db->order_by('name','DESC');
					}
				}
				if($sorting == 'date')
				{
					if($sortby == 'desc')
					{
						$this->db->order_by('products.id','DESC');
					}
				}
				if(!empty($orderby))
				{
					$pricelimit = explode('-', $orderby);
					$this->db->where('price_cigar >=', $pricelimit[0]);
					$this->db->where('price_cigar <=', $pricelimit[1]);
				}
			}
		}
		$this->db->select("brand.*,  products.*");
		$this->db->from("brand");
		$this->db->join("products","products.brand_id = brand.id","left");
		$data['products'] = $this->db->limit(20)->get()->result_array();
		if(!empty($data['products']))
		{
			$data['brand_id'] = $data['products'][0]['brand_id'];
			$data['total_products'] = $this->db->where('brand_id',$data['brand_id'])->get('products')->num_rows();
		}
		else
		{
			$data['total_products'] = 0;
		}
		//$data['total_products'] = count($data['products']);
		$data['policies'] = $this->db->get('policies')->result_array();
		if(!empty($slug) && $slug != 'sort-by')
		{
			$data['heading'] = $data['products'][0]['brand_name'];
		}
		else
		{
			$data['heading'] = 'All Brands';
		}
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['page_content'] = 'product_detail/productlisting';
		
		// echo "<pre>";
		// print_r($data['products']);
		// print_r($data['brand_id']);
		// exit;
		$x = $this->db->where('brand_slug', $slug)->get('brand')->row_array();
		$y = $this->db->where('type', 'Home')->get('seo')->row_array();
		$data['seo']['meta_description']= $y['meta_description'];
		$data['seo']['meta_title']= $x['brand_name'] ;
		
		// echo "<pre>";
		// print_r($data['seo']['meta_title']);
		// exit;
		$this->load->view('main_view',$data);
	}
	public function seacrhlist()
	{
		// $data['getsettings']= $this->db->get('settings')->row_array();
		// $data['displaybrands']=$this->db->get('brand')->result_array();
		$keyword = $this->input->get('keyword');
		$this->db->like('brand_name', $keyword);
		$data['brands'] = $this->db->limit(5)->get('brand')->result_array();
		$this->db->like('name', $keyword);
		$data['products'] = $this->db->limit(5)->get('products')->result_array();
		$data['list_view'] = $this->load->view('list',$data,TRUE);
		$data['policies'] = $this->db->get('policies')->result_array();

		if(count($data) > 0)
		{
			echo json_encode(['condition'=>'success','data'=>$data]);
		}
		else
		{
			echo json_encode(['condition'=>'error','data'=>""]);
		}
	}
	public function searchresult()
	{
		$data['seo']['meta_title']= 'Search';
		$y = $this->db->where('type', 'Home')->get('seo')->row_array();
		$data['seo']['meta_description']= $y['meta_description'];
		$keyword = $this->input->post('keyword');
		$this->db->like('brand_name', $keyword);
		$data['brands'] = $this->db->get('brand')->result_array();
		
		$this->db->like('name', $keyword);
		$this->db->select("brand.*,  products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
		$data['products'] = $this->db->get()->result_array();

		$data['keyword'] = $keyword;

		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();

		$data['page_content'] = 'search';

		// echo "<pre>";
		// print_r($data);
		// exit;
		$this->load->view('main_view',$data);
	}
	public function browsebyprice()
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['policies'] = $this->db->get('policies')->result_array();
		$posteddata = $this->input->post();
		$data = $this->db->where('price_cigar BETWEEN "'.$posteddata['start']. '" and "'. $posteddata['end'] .'"')->get('products')->result_array();
		if(count($data) > 0)
		{
			echo json_encode(['condition'=>'success','data'=>$data]);
		}
		else
		{
			echo json_encode(['condition'=>'error','data'=>""]);
		}
	}
	// public function sorting($sortby='')
	// {
	// 	 $posteddata =  $this->input->post();
	// 	if($sortby == 1){
	// 		$data['sorting'] = $this->db->limit(20)->order_by('price_cigar','ASC')->get('products')->result_array();
	// 	}
	// 	if($sortby == 2){
	// 		$data['sorting'] = $this->db->limit(20)->order_by('price_cigar','DESC')->get('products')->result_array();
	// 	}
	// 	if($sortby == 3){
	// 		$data['sorting'] = $this->db->limit(20)->order_by('name','ASC')->get('products')->result_array();
	// 	}
	// 	if($sortby == 4){
	// 		$data['sorting'] = $this->db->limit(20)->order_by('id','DESC')->get('products')->result_array();
	// 	}


	// 	// $data['view'] = $this->load->view('ajaxview',$data,True);

	// 	if(count($data) > 0){
	// 		echo json_encode(['condition'=>'success','data'=>$data]);
	// 	}else{
	// 		echo json_encode(['condition'=>'error','data'=>""]);
	// 	}
	// }
	
	//Products loaded through brands page
	public function ajaxloadmoreproducts($value='')
	{
		$postdata = $this->input->post();
		$this->db->select("brand.*,  products.*");
		$this->db->from("brand");
		$this->db->join("products","products.brand_id = brand.id","left");
		$this->db->where("products.brand_id",$postdata['brand_id']);
		$data['products'] = $this->db->limit(20,$postdata['last_id'])->get()->result_array();
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter']= count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		$data['product_view'] = $this->load->view('product_detail/list',$data,TRUE);
		if(count($data) > 0)
		{
			echo json_encode(['condition'=>'success','data'=>$data]);
		}
		else
		{
			echo json_encode(['condition'=>'error','data'=>""]);
		}
	}
	//Products loaded through all Cigars page
	public function ajaxloadmoreproducts2($value='')
	{
		$postdata = $this->input->post();
		$this->db->select("brand.*,  products.*");
		$this->db->from("brand");
		$this->db->join("products","products.brand_id = brand.id","left");
		
		$data['products'] = $this->db->limit(20,$postdata['last_id'])->get()->result_array();
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter']= count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		$data['product_view'] = $this->load->view('product_detail/list',$data,TRUE);
		if(count($data) > 0)
		{
			echo json_encode(['condition'=>'success','data'=>$data]);
		}
		else
		{
			echo json_encode(['condition'=>'error','data'=>""]);
		}
	}
	public function product_detail($slug="")
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();

		$this->db->select("brand.*,package_type.*, products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
		$this->db->join("package_type","package_type.id = products.package_type_id","left");
		$this->db->where("products.product_slug",$slug);
		$data['product_detail'] = $this->db->get()->row_array();

		$y = $this->db->where('type', 'Home')->get('seo')->row_array();

		$data['seo']['meta_title']= $data['product_detail']['name'];
		$data['seo']['meta_description']= $y['meta_description'] ;
		// echo "<pre>";
		// print_r($data['cartdata']);
		// exit;
		// $data['product_detail']= $this->db->where('product_slug',$slug)->get('products')->row_array();
		$this->db->select("brand.*, products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
		$this->db->where("brand.id",$data['product_detail']['brand_id']);
		$data['relatedproducts'] = $this->db->limit(4)->get()->result_array();
		$data['page_content'] = 'product_detail/product_detail';
		$this->load->view('main_view',$data);
	}
	public function cartlisting($value='')
	{
		$data['seo']['meta_title']= 'Cart';
		$data['seo']['meta_description']= 'Cart';
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['cartdata']  = $this->cart->contents();
		
		$data['counter'] = count($data['cartdata']);
		$brands = array();
		$ids = array();
		
		if(!empty($data['cartdata']))
		{
			foreach($data['cartdata'] as $val)
			{
				array_push($brands, $val['brand']);
				array_push($ids, $val['id']);
			}
			$this->db->select("brand.*,  products.*");
			$this->db->from("products");
			$this->db->join("brand","brand.id = products.brand_id","left");
			$this->db->where_in("brand.brand_name",$brands);
			$this->db->where_not_in("products.id",$ids);
			$data['recommendedProducts'] = $this->db->order_by('products.id', 'RANDOM')->limit(4)->get()->result_array();
		}
		
		$data['policies'] = $this->db->get('policies')->result_array();
		$total =  0;
		foreach ($data['cartdata'] as $key => $value)
		{
			$total = $total +  $value['subtotal'];
		}
		$data['total']=  $total;
		$data['page_content'] = 'homepage/cart';
		// echo "<pre>";
		// print_r($data['cartdata']);
		// exit;
		$this->load->view('main_view',$data);
	}
	public function updateCartItem()
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['cartdata']  = $this->cart->contents();
		$data['policies'] = $this->db->get('policies')->result_array();
		$postdata = $this->input->post();
		foreach($postdata['cart'] as $id => $cart)
		{
			$rowid = $cart['rowid'];
            $qty = $cart['qty'];
            $data = array(
				'rowid'   => $rowid,
				'qty'     => $qty
			);
			$this->cart->update($data);
		}
		if ($this->cart->update($data))
		{
        	redirect('cart');    
    	}
	}
	public function addtoCart($value='')
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['policies'] = $this->db->get('policies')->result_array();
		$postedCart  =$this->input->post();
		/*echo "<pre>";
			print_r($postedCart);
			exit;*/
		
		$productname = $this->trim_special_char($postedCart['name']);
		$data = array(
			'id'=>$postedCart['id'],
			'name' => $productname,
			'qty' => $postedCart['qty-0'],
			'size'=> '',
			'price'=>$postedCart['price'],
			'image'=>  $postedCart['image'],
			'brand'=> $postedCart['brand']
		);
		 
		$cartdatainsertion = $this->cart->insert($data);
		if($cartdatainsertion)
		{
			$data['cartdata'] = $cartdata;
		}
		// echo "<pre>";
		// print_r($data['cartdata']);
		// exit;
		 redirect('cart');
	}
	public function remove($id)
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['policies'] = $this->db->get('policies')->result_array();
		if ($id==="all")
		{
			$update  =$this->cart->destroy();
		}
		else
		{
			$data = array(
				'rowid'   => $id,
				'qty'     => 0
			);
			$update =  $this->cart->update($data);
		}
		redirect('cart');
	}
	public function trim_special_char($text)
    {
    	$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['policies'] = $this->db->get('policies')->result_array();
        $str = str_replace("(", '_:', $text);
        $str = str_replace(")", ':_', $str);
        $str = str_replace("/", '_slash', $str);
        $str = str_replace("+", '_plus', $str);
        $str = str_replace("&", '_and', $str);
        $str = str_replace("'", '_ss', $str);
        $str = str_replace("x", '_X', $str);
        $str = str_replace('"', '_cot', $str);

        return $str;
	}
	public function checkout()
	{
		$data['seo']['meta_title']= 'Checkout';
		$y = $this->db->where('type', 'Home')->get('seo')->row_array();
		$data['seo']['meta_description']= $y['meta_description'];
		
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		$total =  0;
		foreach ($data['cartdata'] as $key => $value)
		{
			$total = $total +  $value['subtotal'];
		}
		$data['total']=  $total;

		$data['page_content'] = 'checkout';
		$this->load->view('main_view',$data);
	}
	//For Guest Checkout
    public function checkout1()
	{
		$data['seo']['meta_title']= 'Checkout';
		$y = $this->db->where('type', 'Home')->get('seo')->row_array();
		$data['seo']['meta_description']= $y['meta_description'];
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		$total =  0;
		foreach ($data['cartdata'] as $key => $value)
		{
			$total = $total +  $value['subtotal'];
		}
		$data['total']=  $total;

		$data1['guest'] = 1;
		$this->session->set_userdata($data1);

		$data['page_content'] = 'checkout';
		$this->load->view('main_view',$data);
	}
	public function checkoutProcess($value='')
	{
		if($this->input->post() && !empty($this->input->post()))
		{
			$postdata  = $this->input->post();
			// echo "<pre>";
			// print_r($postdata);
			// print_r($_SESSION);
			// exit;
			if($postdata['billing_email'])
			{
				$isuserExist = $this->db->where('email',$postdata['billing_email'])->count_all_results('users');
				if(!$isuserExist > 0)
				{
					$userdata = array(
						'first_name' => $postdata['billing_firstname'], 
						'last_name' => $postdata['billing_lastname'],
						//'username' => $postdata['username'],
						'email' => $postdata['billing_email'],
						//'password' => $postdata['pass'],
						'contact' => $postdata['billing_phone'],
						'address' => $postdata['billing_address'],
						'apt' => $postdata['billing_address2'],
						'city' => $postdata['billing_city'], 
						'country' => $postdata['billing_country'], 
						'state' => $postdata['billing_state'], 
						'zip_code' => $postdata['billing_zip'], 
						'company' => $postdata['billing_company'], 
						'created_date' => date('Y-m-d H:i:s') 
					);
					$createUser = $this->db->insert('users',$userdata); 
					$insert_user_id =  $this->db->insert_id();
				}
				else
				{
					$createUser = $this->db->where('email',$postdata['billing_email'])->get('users')->row_array();
					$insert_user_id =  $createUser['id'];
				}
				if($insert_user_id)
				{
					$orderdata =  array(
						'customer_id' => $insert_user_id, 
						'billing_street_address' => $postdata['billing_address'], 
						'billing_city' => $postdata['billing_city'], 
						'billing_state' => $postdata['billing_state'], 
						'billing_country' => $postdata['billing_country'], 
						'billing_zip' => $postdata['billing_zip'], 
						'billing_phone' => $postdata['billing_phone'], 
						'customer_comment'=>$postdata['comment'],
						'date' => date('Y-m-d H:i:s')
					);
					if($postdata['sameasbilling_radio'] == 'billing')
					{
						$orderdata['customer_email'] = $postdata['billing_email'];
						$orderdata['shipping_phone'] = $postdata['billing_phone'];
						$orderdata['shipping_city'] = $postdata['billing_city'];
						$orderdata['shipping_street_address'] = $postdata['billing_address'];
						$orderdata['shipping_apt'] = $postdata['billing_address2'];
						$orderdata['shipping_state'] = $postdata['billing_state'];
						$orderdata['shipping_country'] = $postdata['billing_country'];
						$orderdata['shipping_zip'] = $postdata['billing_zip'];
					}
					if($postdata['sameasbilling_radio'] == 'shipping')
					{
						$orderdata['customer_email'] = $postdata['billing_email'];
						$orderdata['shipping_phone'] = $postdata['shipping_phone'];
						$orderdata['shipping_city'] = $postdata['shipping_city'];
						$orderdata['shipping_street_address'] = $postdata['shipping_street_address'];
						$orderdata['shipping_apt'] = $postdata['shipping_address2'];
						$orderdata['shipping_state'] = $postdata['shipping_state'];
						$orderdata['shipping_country'] = $postdata['shipping_country'];
						$orderdata['shipping_zip'] = $postdata['shipping_zip'];
					}
					$orderdata['order_total'] = $postdata['grandtotal'];
					$orderdata['shipping_cost'] = $postdata['shipping'];

					
					$createOrder = $this->db->insert('orders',$orderdata); 
					$order_id = $this->db->insert_id();
				}
				else
				{
					echo 'Somethingwentrong';
				}
				if($order_id)
				{
					$cartData = $this->cart->contents();
					foreach ($cartData as $key => $value)
					{
						$order_detail = array(
							'order_id' => $order_id, 
							'product_id' => $value['id'], 
							'qty' => $value['qty'], 
							'size' => $value['size'], 
							'price' => $value['price'], 
						);
						$place_order = $this->db->insert('order_detail',$order_detail); 
					}
				}
				else
				{
					echo 'Something Went Wrong';
				}
				$this->cart->destroy();
				//redirect('checkout');
				// $data['getsettings']= $this->db->get('settings')->row_array();
				// $data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
				// $data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
				// $data['policies'] = $this->db->get('policies')->result_array();
				// $cartdata = $this->cart->contents();
				// $data['counter'] = count($cartdata);
				// $data['cartdata'] = $cartdata;
				// $data['page_content'] = 'homepage/homepage';
				// $this->load->view('main_view',$data);
				redirect('index');
			}
		}
	}
	public function aboutus()
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['policies'] = $this->db->get('policies')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['seo']= $this->db->where('type', 'aboutus')->get('seo')->row_array();

		// $data['products'] = $this->db->limit(20)->get('products')->result_array();
		$data['page_content'] = 'aboutus';
		$this->load->view('main_view',$data);
	}
	public function myaccount()
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['policies'] = $this->db->get('policies')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['page_content'] = 'homepage/homepage';
		$this->load->view('main_view',$data);
	}
	public function blogs()
	{
		$data['seo']= $this->db->where('type', 'blogs')->get('seo')->row_array();

		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['policies'] = $this->db->get('policies')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['blogs'] = $this->Common_model->blogs();
		
		// echo "<pre>";
		// print_r($data['blogs']);
		// exit;
		
		$data['page_content'] = 'blog/blog';
		$this->load->view('main_view',$data);
	}
	public function blogdetail($title_slug='')
	{
		// echo "<pre>";
		// print_r($title_slug);
		// exit;
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['brand']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		$data['blogs'] = $this->db->where('title_slug',$title_slug)->get('blog')->row_array();
		$data['seo']['meta_title']= $data['blogs']['title'];
		$y = $this->db->where('type', 'Home')->get('seo')->row_array();
		$data['seo']['meta_description']= $y['meta_description'];

		$data['page_content'] = 'blog/blogsdetail';
		
		$this->load->view('main_view',$data);
	}
	public function allbrand()
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['brand']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		$data['page_content'] = 'brand';
		$data['seo']= $this->db->select('meta_description')->where('type', 'Home')->get('seo')->row_array();
		$data['seo']['meta_title']= 'Brands';

		$this->load->view('main_view',$data);
	}
	public function bestseller()
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['brand']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		$this->db->select("brand.*,  products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
		$this->db->where("products.featured",1);
		$data['featuredProducts'] = $this->db->get()->result_array();
		$data['page_content'] = 'best_seller';

		$this->load->view('main_view',$data);
	}
	public function newsletter()
	{
		$data = $this->input->post();
		$subscribe = $data['subscribe'];
		unset($data['subscribe']);
		// print_r($data);
		// exit;
		if($subscribe == 1)
		{
			$this->db->insert('newsletter',$data);
		}
		elseif($subscribe == 0)
		{
			$this->db->delete('newsletter', array('email' => $data['email']));
		}
	}
	public function faqs()
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['policies'] = $this->db->get('policies')->result_array();
		$data['brand']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;

		$data['faqs'] = $this->db->get('faqs')->result_array();
		$data['f_count'] = $this->db->get('faqs')->num_rows();
		$data['seo']= $this->db->where('type', 'faqs')->get('seo')->row_array();
		// if($data['f_count'])
		// {
		// 	$data['faqs'] = array("No FAQs yet","No FAQs yet");
		// }
		// else
		// {
		// 	$data['faqs'] = $faqs;
		// }
		
		// echo "<pre>";
		// print_r($data);
		// exit;

		$data['page_content'] = 'FAQs';

		$this->load->view('main_view',$data);
	}
	/*
		public function integrity_policy()
		{
			$data['getsettings']= $this->db->get('settings')->row_array();
			$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
			$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
			$data['brand']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
			$cartdata = $this->cart->contents();
			$data['counter'] = count($cartdata);
			$data['cartdata'] = $cartdata;
			
			$data['page_content'] = 'integritypolicy';

			$this->load->view('main_view',$data);
		}
	*/
	public function policy($slug)
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['brand']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();

		$data['policy'] = $this->db->where('title_slug',$slug)->get('policies')->row_array();
		$data['seo']= $this->db->select('meta_description')->where('type', 'Home')->get('seo')->row_array();
		$data['seo']['meta_title']= $data['policy']['policy_name'];
		
		// print_r($data['seo']['meta_title']);
		// exit;
		
		$data['page_content'] = 'policy';

		$this->load->view('main_view',$data);
	}
	public function contact()
	{
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['brand']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['seo']= $this->db->where('type', 'contactus')->get('seo')->row_array();
		$data['policies'] = $this->db->get('policies')->result_array();
		
		$data['page_content'] = 'contact';

		$this->load->view('main_view',$data);
	}
	public function send_message()
	{
		$data = $this->input->post();
		// echo "<pre>";
		// print_r($data);
		// exit;
		if($this->db->insert('contact_us',$data))
		{
			redirect('contact-us');
		}
		else
		{
			redirect('contact-us');
		}
	}
	public function loginuser()
	{
 		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['brand']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		$y = $this->db->where('type', 'Home')->get('seo')->row_array();

		$data['seo']['meta_title']= 'Sign In';
		$data['seo']['meta_description']= $y['meta_description'] ;

        $data['page_content'] = 'loginuser';

		$this->load->view('main_view',$data);
	}
	public function registerationuser()
	{
 		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['brand']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		$y = $this->db->where('type', 'Home')->get('seo')->row_array();

		$data['seo']['meta_title']= 'Registattion';
		$data['seo']['meta_description']= $y['meta_description'] ;

        $data['page_content'] = 'registrationuser';
        $this->load->view('main_view',$data);
		
	}
	public function saveuser()
	{
		$data = $this->input->post();
		$this->db->insert('users',$data);
		redirect('userlogin');
	}
	public function checkoutinfo()
	{
		$y = $this->db->where('type', 'Home')->get('seo')->row_array();
	    $data['seo']['meta_title']= 'Checkout';
		$data['seo']['meta_description']= $data['seo']['meta_description']= $y['meta_description'] ;
 		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$data['brand']=$this->db->order_by('brand_name','ASC')->get('brand')->result_array();
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata'] = $cartdata;
		$data['policies'] = $this->db->get('policies')->result_array();
		$total =  0;
		$this->db->select("brand.*,  products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
			
		$data['recommendedProducts'] = $this->db->order_by('products.id', 'RANDOM')->limit(2)->get()->result_array();

		foreach ($data['cartdata'] as $key => $value)
		{
			$total = $total +  $value['subtotal'];
			if($total<800 && $total!=0)
            {
				$shipping=49.00;
                $data['total']=  $shipping+$total;
            }
            else
            {
                $shipping=0.00;
                $data['total']=  $total;
        	}                
		}
        $data['page_content'] = 'checkoutinfo';

		$this->load->view('main_view',$data);
	}
	public function cigars()
	{
		$y = $this->db->where('type', 'Home')->get('seo')->row_array();
	    $data['seo']['meta_title']= 'Cigars';
		$data['seo']['meta_description']= $y['meta_description'] ;
		$data['getslider']= $this->db->get('homepage_slider')->row_array();
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['cartdata'] = $cartdata;
		$data['counter'] = count($cartdata);
		
		$this->db->select("brand.*,  products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
		$data['cigars'] = $this->db->order_by('products.name','ASC')->limit(20)->get()->result_array();

		$data['policies'] = $this->db->get('policies')->result_array();
		$data['page_content'] = 'cigars';

		$this->load->view('main_view',$data);
		
	}
	public function validate()
	{
		$data = $this->input->post();
		$username = $data['email'];

		$this->db->where("email='$username' OR username='$username'");
		$this->db->where('password',$data['password']);
		$admin_login = $this->db->get('users')->row();
		if(!empty($admin_login))
        {
            $data1 = array(
                'id'=>$admin_login->id,
                'first_name'=>$admin_login->first_name,
                'last_name'=>$admin_login->last_name,
                'username'=>$admin_login->username,
            	'email'=>$admin_login->email,
            	'contact'=>$admin_login->contact,
            	'apt'=>$admin_login->apt,
            	'address'=>$admin_login->address,
            	'shipping_address'=>$admin_login->shipping_address,
            	'city'=>$admin_login->city,
            	'country'=>$admin_login->country,
            	'state'=>$admin_login->state,
            	'zip_code'=>$admin_login->zip_code,
            	'company'=>$admin_login->company,
            	'loggedin' => TRUE
        	);
              
			$this->session->set_userdata($data1);
			
			print json_encode(['res'=>'yes']);
			exit;
			// echo "<pre>";
			// print_r($this->session->userdata());
			// exit;
			// redirect('index');
			// $this->index();
    	}
	    else
	    {
	        if(empty($admin_login))
	        {
	            print json_encode("no");
	        }
	    }
	}
    public function logout()
    {
		$data = array('id',
		'first_name',
		'last_name',
		'username',
		'email',
		'contact',
		'apt',
		'address',
		'shipping_address',
		'city',
		'country',
		'state',
		'zip_code',
		'company',
		'loggedin');
    	$this->session->sess_destroy($data);
    		
    	redirect('index');
	}
	public function destroy_cart()
	{
		$chk = $this->cart->destroy();
		// echo "<pre>";
		// print_r($chk);
		// exit;
		if(empty($chk))
		{
			print json_encode(['res'=>'yes']);
			redirect('index');
		}
		else
		{
			print json_encode(['res'=>'no']);
		}
	}
	public function userprofile()
	{
		$data['getslider']= $this->db->get('homepage_slider')->row_array();
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['cartdata'] = $cartdata;
		$data['counter'] = count($cartdata);
		$id=$this->session->userdata('id');
		$data['old_pass'] = $this->db->where('id',$id)->select('password')->get('users')->row_array();
		// print_r($data['old_pass']);
		// exit;
		$this->db->select("brand.*,  products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
		$data['cigars'] = $this->db->order_by('products.name','ASC')->limit(20)->get()->result_array();

		$data['policies'] = $this->db->get('policies')->result_array();
		$data['page_content'] = 'userprofile';
  		$id = $this->session->userdata('id');
  		//print_r($id);
        $data['displayorder']=$this->Common_model->displayorders($id);
        $y = $this->db->where('type', 'Home')->get('seo')->row_array();

		$data['seo']['meta_title']= 'Profile';
		$data['seo']['meta_description']= $y['meta_description'] ;
        //echo '<pre>';print_r($data['displayorder']);exit;
		$this->load->view('main_view',$data);
	}
	public function changepassword()
	{
		$password = $this->input->post('password');
		
		$id =  $this->input->post('id');
		$update=$this->update_records('users', array('password'=>$password), array('id'=>$id));
		
		if($update)
		{
			// $this->session->unset_userdata('password');
			//  $this->session->set_userdata('password',$password);

			print json_encode(['res'=>'yes']);
		}
		else
		{
			print json_encode(['res'=>'no']);
		}
	}
	public function update_records($table, $data, $where)
	{
		$this->db->where($where);

        $update = $this->db->update($table, $data);

		  // echo $this->db->last_query();exit;

        // $affectedRows = $this->db->affected_rows();

		// echo $affectedRows;exit;

		if($update)
		{
			return true;

		}
		else
		{
			return false;
		}

    }
    public function orderview($order_id="")
	{
		$order_id = base64_decode($order_id);
		
		$data['getslider']= $this->db->get('homepage_slider')->row_array();
		$data['getsettings']= $this->db->get('settings')->row_array();
		$data['displaybrands']=$this->db->get('brand')->result_array();
		$data['cigarnames']=$this->db->order_by('name','ASC')->get('products')->result_array();
		$cartdata = $this->cart->contents();
		$data['cartdata'] = $cartdata;
		$data['counter'] = count($cartdata);
		$id=$this->session->userdata('id');
		
	
		$this->db->select("brand.*,  products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
		$data['cigars'] = $this->db->order_by('products.name','ASC')->limit(20)->get()->result_array();

		$data['policies'] = $this->db->get('policies')->result_array();
		$data['page_content'] = 'orderview';

		$y = $this->db->where('type', 'Home')->get('seo')->row_array();
		$data['seo']['meta_title']= 'Profile';
		$data['seo']['meta_description']= $y['meta_description'] ;
	   	// $data['displayorder']=$this->Common_model->displayorders($id);
	    $data['displayorder2']=$this->Common_model->displayorders2($order_id);
		// print_r($data['displayorder2']);
		// exit;
		$this->load->view('main_view',$data);
	}
	public function site_map()
	{
		$data['blogs'] = $this->Common_model->blogs();
		$data['displaybrands']=$this->db->get('brand')->result_array();
        $data['cigarnames']=$this->db->get('products')->result_array();
        $data['policies'] = $this->db->get('policies')->result_array();
		$data['faqs'] = $this->db->get('faqs')->result_array();
		
		$this->load->view('sitemap',$data);
	}
}
