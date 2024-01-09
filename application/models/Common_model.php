<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model {

// Common Functions Start
    public function select_all_data($tbl_name,$where_array = '',$select_data = '',$is_distinct = '',$order_by = '',$limit= '')
    {
    	if (!empty($select_data)) {
    		$this->db->select($select_data);
    	}
    	if (!empty($is_distinct) && $is_distinct == "yes") {
    		$this->db->distinct();
		}

    	if (!empty($where_array)) {
    		$this->db->where($where_array);
    	}
    	if (!empty($order_by)) {
    		$order = explode("|",$order_by);
    		$this->db->order_by($order[0], $order[1]); 
    		//$this->db->order_by($order[0],$order[1]);
    	}
    	if (!empty($limit)) {
    		$this->db->limit($limit);
    	}
    	
    	return $this->db->get($tbl_name)->result_array();
    }
    public function select_all_data_result($tbl_name,$where_array = '',$select_data = '',$is_distinct = '')
    {
    	if (!empty($select_data)) {
    		$this->db->select($select_data);
    	}
    	if (!empty($is_distinct) && $is_distinct == "yes") {
    		$this->db->distinct();
		}
    	if (!empty($where_array)) {
    		$this->db->where($where_array);
    	}
    	return $this->db->get($tbl_name)->result();
    }
    public function select_data_row($tbl_name,$where_array = '',$select_data = '')
    {
    	if (!empty($select_data)) {
    		$this->db->select($select_data);
    	}
    	if (!empty($where_array)) {
    		$this->db->where($where_array);
    	}
    	return $this->db->get($tbl_name)->row_array();
    }
    public function select_num_rows($tbl_name,$where_array = '')
    {
    	if (!empty($where_array)) {
    		$this->db->where($where_array);
    	}
    	return $this->db->get($tbl_name)->num_rows();
    }
    public function insert_data($tbl_name,$data,$get_id = '')
    {
    	$res = $this->db->insert($tbl_name,$data);
    	if ($get_id == "yes") {
    		return $this->db->insert_id();
    	}else{
    		return $res;
    	}
    }
    public function update_data($tbl_name,$data,$where_array)
    {
    	if (!empty($where_array)) {
    		$this->db->where($where_array);
    	}
    	return $this->db->update($tbl_name,$data);
    }
    public function delete_data($tbl_name,$where_array) 
    {
    	if (!empty($where_array)) {
    		$this->db->where($where_array);
    	}
    	return $this->db->delete($tbl_name);
    }
    public function displaybrand()
    {
        $brands = $this->db->get('brand')->result_array();
        return $brands;
    }
    public function blogs()
    {
        $blog = $this->db->get('blog')->result_array();
        return $blog;
    }
    public function brand()
    {
        $blog = $this->db->get('brand')->result_array();
        return $blog;
    }
   public function blogdetail($id='')
    {
     
            $blog = $this->db->where('id',$id)->get('blog')->row_array();
             
        return $blog;
    }
  public function allbrand()
    {
        $brand = $this->db->get('brand')->result_array();
        return $brand;
    }
    public function displayorders($id)
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
        $this->db->where('customer_id',$id);
        $this->db->order_by('orders.date DESC');
        $this->db->join('users', 'users.id = orders.customer_id');
        $query=$this->db->get();
        return $query->result_array();
    }
    
    public function displayorders2($id){
        $this->db->select('orders.id as order_id,
        orders.order_total,
        orders.date,
        orders.shipping_cost,
        products.image AS products_image,
        products.name AS products_name,
        order_detail.qty AS products_quality,
        order_detail.price AS products_price');
        $this->db->from('orders');
        $this->db->join('order_detail', '  order_detail.order_id = orders.id');
        $this->db->join('products', 'products.id = order_detail.product_id');
        $this->db->where('orders.id',$id);
        return $this->db->get()->result_array();
            //print_r($query);die();
    }


}
