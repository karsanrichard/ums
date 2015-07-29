<?php
/**
* 
*/
class MY_Model extends CI_Model
{
	
	function __construct()
	{
		
	}
    
    public function active_services($status=1)
    {
        $sql = "SELECT 
                * 
            FROM 
                `categories`
            WHERE `status` = '$status'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;
    }
    
    public function active_subjects($status=1)
    {
        $sql = "SELECT 
                * 
            FROM 
                `subject`
            WHERE `status` = '$status'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;
    }
    
    public function active_pages($status=1)
    {
        $sql = "SELECT 
                * 
            FROM 
                `page_numbers`
            WHERE `status` = '$status'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;
    }
    
    public function active_urgency($status=1)
    {
        $sql = "SELECT 
                * 
            FROM 
                `time_urgency`
            WHERE `status` = '$status'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;
    }
    
    public function active_academic($status=1)
    {
        $sql = "SELECT 
                * 
            FROM 
                `academic_level`
            WHERE `status` = '$status'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;
    }
    
    public function active_language($status=1)
    {
        $sql = "SELECT 
                * 
            FROM 
                `language`
            WHERE `status` = '$status'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;
    }
    
    public function active_reference($status=1)
    {
        $sql = "SELECT 
                * 
            FROM 
                `ref_style`
            WHERE `status` = '$status'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;
    }
    
    public function get_countries()
    {
        $sql = "SELECT * FROM `countries`";
        
        $result = $this->db->query($sql);
        $result = $result->result_array();
        
        return $result;
    }
    
    public function get_countries_available($status=1)
    {
         $sql = "SELECT * FROM `countries` WHERE `status` = '1'";
        
        $result = $this->db->query($sql);
        $result = $result->result_array();
        
        return $result;
    }

    function get_category($categories)
    {
      $sql = "SELECT 
                * 
            FROM 
                `categories`
            WHERE `id` = '$categories'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;

    }

    function get_subject($subject)
    {
     
      $sql = "SELECT 
                      * 
                  FROM 
                      `subject`
                  WHERE `id` = '$subject'";
            
            $result = $this->db->query($sql);
            $result = $result->result_array();
      
      return $result;

    }

    function get_pages($pages)
    {
      
      $sql = "SELECT 
                * 
            FROM 
                `page_numbers`
            WHERE `id` = '$pages'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;
    }

    function get_urgency($urgency)
    {
      $sql = "SELECT 
                * 
            FROM 
                `time_urgency`
            WHERE `id` = '$urgency'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;

    }

    function get_ref_style($ref_style)
    {
      $sql = "SELECT 
                * 
            FROM 
                `ref_style`
            WHERE `id` = '$ref_style'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;
    }

    function get_academic($academic)
    {
   
      $sql = "SELECT 
                * 
            FROM 
                `academic_level`
            WHERE `id` = '$academic'";
      
      $result = $this->db->query($sql);
      $result = $result->result_array();
      
      return $result;

    }

}

?>