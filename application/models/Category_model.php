<?php 

class Category_model extends CI_Model
{
	protected $table = 'category';
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
	* Function get_category
	* Use for get the records from table with pagignation values
	* @param int $limit
	* @param int $start 
	* @return returns the desired result
	*/
	public function get_category($limit, $start) {
	    $this->db->limit($limit, $start);
	    $query = $this->db->get($this->table);
	    return $query->result();
	}

	/**
	* Function insert_item
	* Use for the store the information into the table
	*/
	public function insert_item()
	{
		$data = array(
		    'name' => $this->input->post('name'),
		    'file_name' => $this->input->post('file_name'),
		);
		return $this->db->insert($this->table, $data);
	}

	/**
	* Function find_item
	* Use for the find the records from table
	* @param int $id
	* @return record 
	*/
	public function find_item($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    /**
    * Function update_item
    * use for the update the record from db
    */
    public function update_item($id)
    {
    	$date = new DateTime;
    	$date = $date->format('Y-m-d H:i:s');
    	
    	$data = ['name' => $this->input->post('name'),
    	'updated_at' => $date
    	];
    	if($id==0) 
    	    return $this->db->insert($this->table, $data);
    	else
    	    return $this->db->where('id',$id)->update($this->table, $data);
    }
    
    /**
    * Function delete_item
    * Use for the delete data
    */
    public function delete_item($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }

}
?>