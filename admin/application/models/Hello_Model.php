<?php
class Hello_Model extends CI_Model 
{
	function saverecords($title,$heading,$sub_heading,$image,$now)
	{
		$query="insert into homepage_slider values('','$title','$heading','$sub_heading', '$image','$now')";
		$this->db->query($query);
	}
	function displayrecords()
	{
		$query=$this->db->query("select * from homepage_slider"); 
		return $query->result_array();
	}
	function savesettings($data,$id)
	{
		$query=$this->db->where('id',$id)->update('settings',$data);
		return $query;
	}
	function displaysettings()
	{
		$query=$this->db->query("select * from settings");
		return $query->result_array();
	}
	public function db_update($data,$id)
	{
	    $this->db->where('id', $id);       
	    $this->db->update('homepage_slider', $data);
	}
	public function updateblog($data,$id)
	{
	    $this->db->where('id', $id);       
	    $this->db->update('blog', $data);
	}
	function saveproducts($data)
	{
		$query=$this->db->insert('products',$data);
		return $query;
	}
	function displayproducts()
	{
		$query=$this->db->query("select * from products");
		return $query->result_array();
	}
	public function getbrands()
	{
		$brands = $this->db->get('brand')->result_array();
		return $brands;
	}
	public function getpackage()
	{
		$package = $this->db->get('package_type')->result_array();
		return $package;
	}
	public function updateproduct($data,$id)
	{
		$this->db->where('id', $id);       
    	$this->db->update('products', $data);
	}
	function displaybrands()
	{
		$query=$this->db->query("select * from brand");
		return $query->result_array();
	}
	public function updatebrand($data,$id)
	{

		$this->db->where('id',$id)->update('brand', $data);
	}
	public function addbrands($data)
	{
		$query=$this->db->insert('brand',$data);
		return $query;
	}
	public function saveblogs($data)
	{
		$query=$this->db->insert('blog', $data);
		return $query;
	}
	function displaytype()
	{
		$query=$this->db->query("select * from package_type");
		return $query->result_array();
	}
	public function addtype($data)
	{
		$query=$this->db->insert('package_type',$data);
		return $query;
	}
	public function updatetype($data,$id)
	{
		$this->db->where('id', $id);       
    	$this->db->update('package_type', $data);
	}
	public function displayorders()
	{
		$this->db->select('orders.date, 
		orders.id,
	    orders.order_total,
	    orders.shipping_phone,
	    orders.shipping_street_address,
	    orders.shipping_city,
	    orders.shipping_state,
	    orders.shipping_country,
	    orders.shipping_zip,
	    orders.order_status,
	    users.first_name AS user_first_name, 
	    users.last_name AS user_last_name');
	    $this->db->from('orders');
	    $this->db->where('order_status','0');
		$this->db->join('users', 'users.id = orders.customer_id');
		$this->db->order_by('orders.date DESC');
	    $query=$this->db->get();
		return $query->result_array();
	}
	public function displayorders2()
	{
		$this->db->select('orders.date, 
		orders.id,
	    orders.order_total,
	    orders.shipping_phone,
	    orders.shipping_street_address,
	    orders.shipping_city,
	    orders.shipping_state,
	    orders.shipping_country,
	    orders.shipping_zip,
	    orders.order_status,
	    users.first_name AS user_first_name, 
	    users.last_name AS user_last_name');
	    $this->db->from('orders');
	    $this->db->where('order_status','2');
		$this->db->join('users', 'users.id = orders.customer_id');
		$this->db->order_by('orders.date DESC');
	    $query=$this->db->get();
		return $query->result_array();
	}
	public function displayorders3()
	{
		$this->db->select('orders.date, 
		orders.id,
	    orders.order_total,
	    orders.shipping_phone,
	    orders.shipping_street_address,
	    orders.shipping_city,
	    orders.shipping_state,
	    orders.shipping_country,
	    orders.shipping_zip,
	    orders.order_status,
	    users.first_name AS user_first_name, 
	    users.last_name AS user_last_name');
	    $this->db->from('orders');
	    $this->db->where('order_status','1');
		$this->db->join('users', 'users.id = orders.customer_id');
		$this->db->order_by('orders.date DESC');
	    $query=$this->db->get();
		return $query->result_array();
	}

	public function getorder($id)
	{
		//print_r(id);die();
		$this->db->select('orders.date, 
		orders.id,
	    orders.order_total,
	    orders.shipping_cost,
	    orders.shipping_phone,
	    orders.shipping_street_address,
	    orders.shipping_city,
	    orders.shipping_state,
	    orders.shipping_country,
	    orders.shipping_zip,
	    orders.order_status,
	    users.first_name AS user_first_name, 
	    users.last_name AS user_last_name,
	    users.email,
	    users.company,
	    users.state,
	    users.address AS user_address,
	    users.city AS user_city,
	    users.country AS user_country,
	    users.zip_code AS user_zip_code,
	   


	    ');
	    $this->db->from('orders');
	   //$this->db->from('order_detail');
	    $this->db->join('users', 'users.id = orders.customer_id','left');
	    //$this->db->join('order_detail', 'orders.id = order_detail.order_id ','left');

        //$this->db->join('products', 'products.id = order_detail.product_id','left');

	    $this->db->where('orders.id',$id);

	  $query= $this->db->get()->row_array();
	      return $query;
	 
		
	}
	public function getorder2($id)
	{
		
		$this->db->select('
	    products.image AS products_image,
	    products.name AS products_name,
	    order_detail.qty AS products_quality,
	    order_detail.price AS products_price');

		$this->db->from('orders');
	 
	 
	    $this->db->join('order_detail', 'orders.id = order_detail.order_id ','left');

        $this->db->join('products', 'products.id = order_detail.product_id','left');

	    $this->db->where('orders.id',$id);

	    return $this->db->get()->result_array();
		//print_r($query);die();
	}

	public function updateorderstatus($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('orders',$data);
	}
	public function displayprofile()
	{
		$query=$this->db->query("select * from admin ");
		return $query->result_array();
	}
	public function updateprofile($data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('admin',$data);
	}
}