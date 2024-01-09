<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Homepage extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
		require_once APPPATH.'/libraries/SimpleXLSX.php';
	}
	public function index()
	{
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$this->db->select("brand.*,  products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
		$this->db->where("products.featured",1);
		$data['featuredProducts'] = $this->db->limit(8)->get()->result_array();
		// $data['product_detail'] = $this->db->get()->row_array();
		//$data['featuredProducts'] = $this->db->order_by('id','RANDOM')->limit(8)->get('products')->result_array();
		$data['page_content'] = 'homepage/homepage';
		$this->load->view('main_view',$data);
	}
	public function productlisting($sorting='', $sortby='',$orderby='',$start=''){
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		// exit;
		if(!empty($sorting)){
			if($sorting != 'sort-by'){
				$pricelimit = explode('-', $sorting);
				$this->db->select("brand.*,  products.*");
				$this->db->from("brand");
				$this->db->join("products","products.brand_id = brand.id","left");
				$this->db->where('price_cigar >=', $pricelimit[0]);
				$this->db->where('price_cigar <=', $pricelimit[1]);
				$data['products'] = $this->db->get()->result_array();
			}else{
				if($sortby == 'price'){
					if($orderby == 'asc'){
						$this->db->order_by('price_cigar','ASC');
					}
					if($orderby == 'desc'){
						$this->db->order_by('price_cigar','DESC');
					}
				}
				if($sortby == 'name'){
					if($orderby == 'asc'){
						$this->db->order_by('name','ASC');
					}
					if($orderby == 'desc'){
						$this->db->order_by('name','DESC');
					}
				}
				if($sortby == 'date'){
					if($orderby == 'desc'){
						$this->db->order_by('products.id','DESC');
					}
				}
				if(!empty($start)){
					$pricelimit = explode('-', $start);
					$this->db->where('price_cigar >=', $pricelimit[0]);
					$this->db->where('price_cigar <=', $pricelimit[1]);
				}
				$this->db->select("brand.*,  products.*");
				$this->db->from("brand");
				$this->db->join("products","products.brand_id = brand.id","left");
				$data['products'] = $this->db->limit(20)->get()->result_array();
			}

		}else{
			$this->db->select("brand.*,  products.*");
			$this->db->from("brand");
			$this->db->join("products","products.brand_id = brand.id","left");
			$data['products'] = $this->db->limit(20)->get()->result_array();
		}

		$data['heading'] = 'Cigars';
		// $data['products'] = $this->db->limit(20)->get('products')->result_array();
		$data['page_content'] = 'product_detail/productlisting';
		$this->load->view('main_view',$data);
	}

	// public function brands(){

	// 	$cartdata = $this->cart->contents();
	// 	$data['counter'] = count($cartdata);
	// 	if(!empty($sortby)){
	// 		if($sortby == 1){
	// 			$this->db->select("brand.*,  products.*");
	// 			$this->db->from("brand");
	// 			$this->db->join("products","products.brand_id = brand.id","left");
	// 			$data['products'] = $this->db->limit(20)->order_by('price_cigar','ASC')->get()->result_array();
	// 		}
	// 		if($sortby == 2){
	// 			$this->db->select("brand.*,  products.*");
	// 			$this->db->from("brand");
	// 			$this->db->join("products","products.brand_id = brand.id","left");
	// 			$data['products'] = $this->db->limit(20)->order_by('price_cigar','DESC')->get()->result_array();
	// 		}
	// 		if($sortby == 3){
	// 			$this->db->select("brand.*,  products.*");
	// 			$this->db->from("brand");
	// 			$this->db->join("products","products.brand_id = brand.id","left");
	// 			$data['products'] = $this->db->limit(20)->order_by('name','ASC')->get()->result_array();
	// 		}
	// 		if($sortby == 4){
	// 			$this->db->select("brand.*,  products.*");
	// 			$this->db->from("brand");
	// 			$this->db->join("products","products.brand_id = brand.id","left");
	// 			$data['products'] = $this->db->limit(20)->order_by('brand.id','DESC')->get()->result_array();
	// 		}

	// 	}else{

	// 		$this->db->select("brand.*,  products.*");
	// 		$this->db->from("brand");
	// 		$this->db->join("products","products.brand_id = brand.id","left");
	// 		$data['products'] = $this->db->limit(20)->get()->result_array();
	// 	}

	// 	$data['heading'] = 'Brands';
	// 	// $data['products'] = $this->db->limit(20)->get('products')->result_array();
	// 	$data['page_content'] = 'product_detail/productlisting';
	// 	$this->load->view('main_view',$data);
	// }

	public function seacrhlist()
	{
		$keyword = $this->input->get('keyword');

		$this->db->like('brand_name', $keyword);
		$data['brands'] = $this->db->limit(5)->get('brand')->result_array();

	
		$this->db->like('name', $keyword);
		$data['products'] = $this->db->limit(5)->get('products')->result_array();

		if(count($data) > 0){
			echo json_encode(['condition'=>'success','data'=>$data]);
		}else{
			echo json_encode(['condition'=>'error','data'=>""]);
		}
	}

	public function browsebyprice()
	{
		$posteddata = $this->input->post();
		$data = $this->db->where('price_cigar BETWEEN "'.$posteddata['start']. '" and "'. $posteddata['end'] .'"')->get('products')->result_array();
		if(count($data) > 0){
			echo json_encode(['condition'=>'success','data'=>$data]);
		}else{
			echo json_encode(['condition'=>'error','data'=>""]);
		}
	}


	// public function sorting($sortby=''){
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

		



	public function ajaxloadmoreproducts($value='')
	{
		$cartdata = $this->cart->contents();
		$data['counter']= count($cartdata);
		$postdata = $this->input->post();
		$data['products'] = $this->db->limit($postdata['rowperpage'], $postdata['row'])->get('products')->result_array();
		if(count($data) > 0){
			echo json_encode(['condition'=>'success','data'=>$data]);
		}else{
			echo json_encode(['condition'=>'error','data'=>""]);
		}
	}

	public function product_detail($slug="")
	{	
		
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$this->db->select("brand.*,package_type.*, products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
		$this->db->join("package_type","package_type.id = products.package_type_id","left");
		$this->db->where("products.product_slug",$slug);
		$data['product_detail'] = $this->db->get()->row_array();
		// $data['product_detail']= $this->db->where('product_slug',$slug)->get('products')->row_array();
		$this->db->select("brand.*, products.*");
		$this->db->from("products");
		$this->db->join("brand","brand.id = products.brand_id","left");
		$this->db->where("brand.id",$data['product_detail']['brand_id']);
		$data['relatedproducts'] = $this->db->limit(8)->get()->result_array();

		$data['page_content'] = 'product_detail/product_detail';
		$this->load->view('main_view',$data);
	}
	public function cartlisting($value='')
	{
		
		$data['cartdata']  = $this->cart->contents();
		$total =  0;
		foreach ($data['cartdata'] as $key => $value) {
			$total = $total +  $value['subtotal'];
		}
		$data['total']=  $total;
		$data['counter'] = count($data['cartdata']);
		$data['page_content'] = 'homepage/cart';
		$this->load->view('main_view',$data);
	}

	public function updateCartItem(){
		$postdata = $this->input->post();
 		foreach($postdata['cart'] as $id => $cart){	
            $rowid = $cart['rowid'];
            $qty = $cart['qty'];
            $data = array(
				'rowid'   => $rowid,
				'qty'     => $qty
			);
			$this->cart->update($data);
		}
    	if ($this->cart->update($data)) {
        	redirect('homepage/cartlisting');    
    	}
	}


	public function addtoCart($value='')
	{
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$postedCart  =$this->input->post();
		$productname = $this->trim_special_char($postedCart['name']);
		$data = array(
			'id'=>$postedCart['id'],
			'name' => $productname,
			'qty' => $postedCart['qty-0'],
			'size'=> '',
			'price'=>$postedCart['price'],
			'image'=>  $postedCart['image'],
		);
		$cartdatainsertion = $this->cart->insert($data);
		if($cartdatainsertion){
			$data['cartdata']  = $this->cart->contents();
		}
		 redirect('homepage/cartlisting');
		
	}

	public function remove($id) {
		if ($id==="all"){
			 $update  =$this->cart->destroy();
		}else{
			$data = array(
				'rowid'   => $id,
				'qty'     => 0
			);
			$update =  $this->cart->update($data);
		}
		redirect('homepage/cartlisting');
		
		
		
	}

	

	 public function trim_special_char($text)
    {
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
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['cartdata']  = $this->cart->contents();
		 $total =  0;
		 foreach ($data['cartdata'] as $key => $value) {
			$total = $total +  $value['subtotal'];
		}
		$data['total']=  $total;

		$this->load->view('checkout',$data);
	}

	public function checkoutProcess($value='')
	{
		if($this->input->post() && !empty($this->input->post()) ){
			$postdata  = $this->input->post();
			if($postdata['billing_email']){
				$isuserExist = $this->db->where('email',$postdata['billing_email'])->count_all_results('users');
				if(!$isuserExist > 0){
					$userdata = array(
						'first_name' => $postdata['billing_firstname'], 
						'last_name' => $postdata['billing_lastname'], 
						'email' => $postdata['billing_email'], 
						'contact' => $postdata[''], 
						'address' => $postdata['billing_address'],
						'shipping_address' => $postdata['billing_address2'],  
						'city' => $postdata['billing_city'], 
						'country' => $postdata['billing_country'], 
						'state' => $postdata['billing_state'], 
						'zip_code' => $postdata['billing_zip'], 
						'company' => $postdata['billing_company'], 
						'created_date' => date('Y-m-d H:i:s') 

					);
					$createUser = $this->db->insert('users',$userdata); 
					$insert_user_id =  $this->db->insert_id();
				}else{
					$createUser = $this->db->where('email',$postdata['billing_email'])->get('users')->row_array();
					$insert_user_id =  $createUser['id'];
				}
				if($insert_user_id){
					$orderdata =  array(
						'user_id' => $insert_user_id, 
						'shipping_address' => $postdata['billing_address'], 
						'created_date' => date('Y-m-d H:i:s')
					);
					$createOrder = $this->db->insert('orders',$orderdata); 
					$order_id = $this->db->insert_id();
 
				}
				else{
					echo 'Somethingwentrong';
				}
				if($order_id){
					$cartData = $this->cart->contents();
					foreach ($cartData as $key => $value) {
						$order_detail = array(
							'order_id' => $order_id, 
							'product_id' => $value['id'], 
							'qty' => $value['qty'], 
							'size' => $value['size'], 
							'price' => $value['price'], 
						);
						$place_order = $this->db->insert('order_detail',$order_detail); 
					}
				}else{
					echo 'Somethingwentrong';
				}
				$this->cart->destroy();
				redirect('homepage/checkout');
			}

		}

	}

	public function contact()
	{
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['page_content'] = 'homepage/homepage';
		$this->load->view('main_view',$data);
	}

	public function aboutus()
	{
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);


		// $data['products'] = $this->db->limit(20)->get('products')->result_array();
		$data['page_content'] = 'aboutus';
		$this->load->view('main_view',$data);
	}

	public function myaccount()
	{
		$cartdata = $this->cart->contents();
		$data['counter'] = count($cartdata);
		$data['page_content'] = 'homepage/homepage';
		$this->load->view('main_view',$data);
	}



	
	
}