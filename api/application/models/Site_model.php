<?php	

if(!defined('BASEPATH')) exit('direct access not allowed');

class Site_model extends CI_Model
{

function __construct()
{
	parent::__construct();		
}

// login methods
public function do_login($table_name,$field1,$val1,$field2,$val2)
  {
    $this->db->select('*');
    $this->db->where($field1,$val1);
    $this->db->where($field2,$val2);
    //$this->db->where('a_active',1);
    $query = $this->db->get($table_name);
    
    if($query->num_rows() > 0)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }

}

public function do_login_c2($table_name,$field1,$val1,$field2,$val2)
{
    $this->db->select('*');
    $this->db->where($field1,$val1);
    $this->db->where($field2,$val2);    

    $query = $this->db->get($table_name);
    
    if($query->num_rows() > 0)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
}

public function do_login_c3($table_name,$field1,$val1,$field2,$val2,$field3,$val3)
{
    $this->db->select('*');
    $this->db->where($field1,$val1);
    $this->db->where($field2,$val2);
    $this->db->where($field3,$val3);

    $query = $this->db->get($table_name);
    
    if($query->num_rows() > 0)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
}

public function do_login_c4($table_name,$field1,$val1,$field2,$val2,$field3,$val3,$field4,$val4)
{
    $this->db->select('*');
    $this->db->where($field1,$val1);
    $this->db->where($field2,$val2);
    $this->db->where($field3,$val3);
    $this->db->where($field4,$val4);

    $query = $this->db->get($table_name);
    
    if($query->num_rows() > 0)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
}

function check_exist_data_c1($table_name,$field1,$val1)
{
    $this->db->select('*');
    $this->db->where($field1,$val1);        
    $query = $this->db->get($table_name);
    
    if($query->num_rows() > 0)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }  
}

// get single row based on 1 condition
function get_row_c1($table_name,$col1,$val1)
{ 
  $this->db->where($col1,$val1);
  $query = $this->db->get($table_name);
  return $query->row();  
}

// get single row based on 2 condition
function get_row_c2($table_name,$col1,$val1,$col2,$val2)
{ 
  $this->db->where($col1,$val1);
  $this->db->where($col2,$val2);
  $query = $this->db->get($table_name);
  return $query->row();  
}

// get single row based on 4 condition
function get_row_c4($table_name,$col1,$val1,$col2,$val2,$col3,$val3,$col4,$val4)
{ 
  $this->db->where($col1,$val1);
  $this->db->where($col2,$val2);
  $this->db->where($col3,$val3);
  $this->db->where($col4,$val4);
  $query = $this->db->get($table_name);
  return $query->row();  
}

// get all rows
function get_rows($table_name)
{
	$query = $this->db->get($table_name);
	return $query->result_array();	
}
// get single row based on 3 condition
function get_rows_c3_order_by($table_name,$col1,$val1,$col2,$val2,$col3,$val3,$order_col,$order_val)
{ 
  $this->db->where($col1,$val1);
  $this->db->where($col2,$val2);
  $this->db->where($col3,$val3);
  $this->db->order_by($order_col,$order_val);
  $query = $this->db->get($table_name);
  return $query->result_array();  
}

// get all rows on condition 1
function get_rows_c1($table_name,$col1,$val1)
{ 
  $this->db->where($col1,$val1);
  $query = $this->db->get($table_name);
  return $query->result_array();  

}
// get all rows on condition 1 order by
function get_rows_c1_order_by($table,$col1,$val1,$order_col,$order_col_val)
{
  $this->db->select('*');
  $this->db->where($col1,$val1);
  $this->db->order_by($order_col,$order_col_val);
  $query=$this->db->get($table);
  return $query->result_array();

}

// get rows order by col_condition | col_value
function get_rows_order_by($table_name,$col,$val)
{ 
  $this->db->order_by($col,$val);  
  $query = $this->db->get($table_name);
  return $query->result_array();  
}

// get rows by limit
function get_rows_by_limit($table_name,$col,$val,$limit,$offset)
{ 
  $this->db->order_by($col,$val);  
  $this->db->limit($limit, $offset);
  $query = $this->db->get($table_name);
  return $query->result_array();  
}

function get_rows_limit($table_name,$col,$val,$limit,$offset)
{   
  $this->db->order_by($col,$val);  
  $this->db->limit($limit, $offset);
  $query = $this->db->get($table_name);
  return $query->result_array();  
}

// pass parameter into this function (table_name, cond_col_name, cond_col_val, order_col_name, order_col_val, number_of_rows, page_no)
function get_rows_limit_c1($table_name,$col_c1,$col_c1_val,$col,$val,$limit,$offset)
{ 
  $this->db->where($col_c1,$col_c1_val);
  $this->db->order_by($col,$val);  
  $this->db->limit($limit, $offset);
  $query = $this->db->get($table_name);
  return $query->result_array();  
}

// get rows by limit on condition 2
function get_rows_limit_c2($table_name,$col_c1,$col_c1_val,$col_c2,$col_c2_val,$col,$val,$limit,$offset)
{ 
  $this->db->where($col_c1,$col_c1_val);
  $this->db->where($col_c2,$col_c2_val);
  $this->db->order_by($col,$val);  
  $this->db->limit($limit, $offset);
  $query = $this->db->get($table_name);
  return $query->result_array();  
}
// get rows using two condition with order by
function get_rows_c2_order_by($table,$col1,$val1,$col2,$val2,$order_col,$order_col_val)
{
  $this->db->select('*');
  $this->db->where($col1,$val1);
  $this->db->where($col2,$val2);
  $this->db->order_by($order_col,$order_col_val);
  $query=$this->db->get($table);
  return $query->result_array();
}

// rows count | return no of rows 
public function row_count($table_name) {       
  return $this->db->count_all($table_name);
}

// rows count on condition 1 column | return no of rows 
public function row_count_c1($table_name,$col1,$val1) {
      $this->db->where($col1,$val1);
      $query= $this->db->get($table_name);
      return $query->num_rows();
}

// save data and return TRUE|FALSE
function save_data($table_name,$data)
{
    $this->db->insert($table_name, $data);
    if ($this->db->affected_rows() > 0) 
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
}

// update row on 1 column condition
function update_row_c1($table_name,$col1,$val1,$data)
{  
  $this->db->where($col1,$val1);
  $this->db->update($table_name,$data);
    if ($this->db->affected_rows() > 0) 
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
}

// update row on 2 column condition
function update_row_c2($table_name,$col1,$val1,$col2,$val2,$data)
{  
  $this->db->where($col1,$val1);
  $this->db->where($col2,$val2);
  $this->db->update($table_name,$data);
    if ($this->db->affected_rows() > 0) 
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
}

/*
********************************************************
*   Join Query By Mithilesh Sah
********************************************************
*/



// get rows left join with c1
public function get_row_join_c1($table1,$table2,$common_col,$col_c1,$col_c1_val)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'left');    
  $this->db->where($col_c1,$col_c1_val);
  $query = $this->db->get();
  return $query->row();  
}

//get rows inner join single row on one column condition 

public function get_row_inner_join_c1($table1,$table2,$common_col,$col_c1,$col_c1_val)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $this->db->where($col_c1,$col_c1_val);
  $query = $this->db->get();
  return $query->row();  
}
// get rows inner join multiple row on two column condition 
public function get_row_inner_join_c2($table1,$table2,$common_col,$col_c1,$col_c1_val,$col_c2,$col_c2_val)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $this->db->where($col_c1,$col_c1_val);
  $this->db->where($col_c2,$col_c2_val);
  $query = $this->db->get();
  return $query->row();  
}

//get rows inner join multiple row on one column condition 

public function get_rows_inner_join_c1($table1,$table2,$common_col,$col_c1,$col_c1_val)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $this->db->where($col_c1,$col_c1_val);
  $query = $this->db->get();
  return $query->result_array();  
}
//get rows inner join multiple row on one column condition order by
public function get_rows_inner_join_c1_order($table1,$table2,$common_col,$col_c1,$col_c1_val,$order_col,$order_val)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $this->db->where($col_c1,$col_c1_val);
  $this->db->order_by($order_col,$order_val); 
  $query = $this->db->get();
  return $query->result_array();  
}



// get rows inner join multiple row on two column condition 
public function get_rows_inner_join_c2($table1,$table2,$common_col,$col_c1,$col_c1_val,$col_c2,$col_c2_val)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $this->db->where($col_c1,$col_c1_val);
  $this->db->where($col_c2,$col_c2_val);
  $query = $this->db->get();
  return $query->result_array();  
}


//get rows inner join multiple row on two column condition order by
public function get_rows_inner_join_c2_order($table1,$table2,$common_col,$col_c1,$col_c1_val,$col_c2,$col_c2_val,$order_col,$order_val)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $this->db->where($col_c1,$col_c1_val);
  $this->db->where($col_c2,$col_c2_val);
  $this->db->order_by($order_col,$order_val); 
  $query = $this->db->get();
  return $query->result_array();  
}

//get rows inner join multiple row on two column condition order by
public function get_rows_inner_join_c2_order_limit($table1,$table2,$common_col,$col_c1,$col_c1_val,$col_c2,$col_c2_val,$order_col,$order_val,$limit,$offset)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $this->db->where($col_c1,$col_c1_val);
  $this->db->where($col_c2,$col_c2_val);
  $this->db->order_by($order_col,$order_val); 
  $this->db->limit($limit, $offset);
  $query = $this->db->get();
  return $query->result_array();  
}
// get rows inner join multiple row on two column condition with limit, offset
public function get_rows_inner_limit_c2($table1,$table2,$common_col,$col_c1,$col_c1_val,$col_c2,$col_c2_val,$limit,$offset)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $this->db->where($col_c1,$col_c1_val);
  $this->db->where($col_c2,$col_c2_val);
  $this->db->order_by($col_c1,$col_c1_val);  
  $this->db->limit($limit, $offset);
  $query = $this->db->get();
  return $query->result_array();  
}

// get rows inner join multiple row on one column condition limit, order, offset
public function get_rows_inner_limit_order_c1($table1,$table2,$common_col,$col_c1,$col_c1_val,$order_col,$order,$limit,$offset)
{
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $this->db->where($col_c1,$col_c1_val);
  $this->db->order_by($order_col,$order);  
  $this->db->limit($limit, $offset);
  $query = $this->db->get();
  return $query->result_array();
}

// get rows inner join multiple rows on three column condition order by, limit, offset
public function get_rows_inner_join_c3($table1,$table2,$common_col,$col_c1,$col_c1_val,$col_c2,$col_c2_val,$order_col,$order_col_val,$limit,$offset)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $this->db->where($col_c1,$col_c1_val);
  $this->db->where($col_c2,$col_c2_val);
  $this->db->order_by($order_col,$order_col_val);  
  $this->db->limit($limit, $offset);
  $query = $this->db->get();
  return $query->result_array();  
}


// get rows inner join without condition 

public function get_rows_inner_join($table1,$table2,$common_col)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $common_col,'inner');      
  $query = $this->db->get();
  return $query->result_array();  
}

// get rows join 2 tables 
public function get_rows_join_c1($table1,$table2,$col_val,$order_col,$order_col_val,$limit,$offset)
{ 
  $this->db->select('*');
  $this->db->from($table1);
  $this->db->join($table2, $col_val);  
  $this->db->order_by($order_col,$order_col_val);  
  $this->db->limit($limit, $offset);
  $query = $this->db->get();
  return $query->result_array();  
}

// delete one row on one column condition
function delete_row_c1( $table_name,$col1,$val1 )
{
  //delete record  
  $this->db->where($col1,$val1);
  $this->db->delete($table_name);
    if ($this->db->affected_rows() > 0) 
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
}

// delete multiple rows on one column condition
function delete_rows_c1( $table_name,$col1,$val1,$col2,$val2 )
{ 
  $this->db->where($col1,$val1);
  $this->db->where($col2,$val2);
  $this->db->delete($table_name);
    if ($this->db->affected_rows() > 0) 
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
}

}

?>