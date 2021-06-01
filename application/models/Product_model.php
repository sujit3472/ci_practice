<?php 

class Product_model extends CI_Model
{
	protected $table = 'product';
	function __construct()
	{
		parent::__construct();	
	}

	/**
	* Function get_count
	* Use for get the count from the table
	*/
	public function get_count() {
	    return $this->db->count_all($this->table);
	}

	/**
	* Function get_product
	* Use for get the records from table with pagignation values
	* @param int $limit
	* @param int $start 
	* @return returns the desired result
	*/
	public function get_product($limit, $start) {
	    $this->db->limit($limit, $start);
		$this->db->select('product.name as product_name, category.name as category_name, product.created_at as product_created_date, product.id as product_id');
	    $this->db->from($this->table);
	    $this->db->join('category', 'category.id = product.category_id');
	    $query = $this->db->get();
	    
	    return $query->result();
	}

	/**
	* Function insert_product
	* Use for the store the information into the table
	*/
	public function insert_product()
	{
		$data = array(
		    'name' 		  => $this->input->post('name'),
		    'category_id' => $this->input->post('category_id'),
		);
		return $this->db->insert($this->table, $data);
	}

	/**
	* Function find_product
	* Use for the find the records from table
	* @param int $id
	* @return record 
	*/
	public function find_product($id)
    {
        $this->db->select('product.name as product_name, category.name as category_name, product.created_at as product_created_date, product.id as product_id, category.id as category_id ');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id = product.category_id');
        $this->db->where('product.id', $id);
        $query = $this->db->get();
        return $query->result_array();
            
    }

    /**
    * Function update_product
    * use for the update the record from db
    */
    public function update_product($id)
    {
    	$date = new DateTime;
    	$date = $date->format('Y-m-d H:i:s');
    	
    	$data = ['name' => $this->input->post('name'),
    		'updated_at' => $date,
    		'category_id' => $this->input->post('category_id'),
    	];
    	if($id==0) 
    	    return $this->db->insert($this->table, $data);
    	else
    	    return $this->db->where('id',$id)->update($this->table, $data);
    }
    
    /**
    * Function delete_product
    * Use for the delete data
    */
    public function delete_product($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }

    /**
   	* Function get_category_list
   	* Use for the get the category list
    */
    public function get_category_list()
    {
    	$query = $this->db->get('category');
    	return $query->result();
    }
}
?>