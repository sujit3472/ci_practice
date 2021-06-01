<?php 
/**
 * 
 */
class Article_model extends CI_model
{
	public function articles()
	{
		$articles = $this->db->get('article')->result_array();
		return $articles;
		/*$articles[0] = "This is 01 dummy title";
		$articles[1] = "This is 02 dummy title";
		$articles[2] = "This is 03 dummy title";
		$articles[3] = "This is 04 dummy title";
		return $articles;*/
	}
	public function example()
	{
		// $users = $this->db->query('select * FROM users')->result_array();]
		$this->db->select('id,name');
		// $this->db->where('id',2);
		$users = $this->db->get('users')->result_array();
		return $users;
	}
	
}

?>