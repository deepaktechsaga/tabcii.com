<?php defined('BASEPATH') OR exit('No direct script access allowed.');    
    /**     
     * @access public 
     */
    // Created by Mithilesh Sah, 08-june-2017.

// get user city,country by user id 

function get_user_city_country($id)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select * from address where user_id ='".$id."'"; 
        $query = $ci->db->query($sql);
        $data = $query->row();
        if($data){return $data->name;}
        else{return NULL;}
}

function get_city_name($id)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select name from cities where id ='".$id."'"; 
        $query = $ci->db->query($sql);
        $data = $query->row();
        if($data){return $data->name;}
        else{return NULL;}
}

function get_country_name($id)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select * from countries where id = '".$id."'"; 
        $query = $ci->db->query($sql);
        $data = $query->row();
        if($data){return $data->name;}
        else{return NULL;}
}

function get_country_code($id)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select sortname from countries where id =$id"; 
        $query = $ci->db->query($sql);
        $data = $query->row();
        return $data->sortname;
}

function get_prop_type($id)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select type_name from job_type where id ='".$id."'"; 
        $query = $ci->db->query($sql);
        $data = $query->row();
        if($data){return $data->type_name;}
        else{return NULL;}
}

function get_c_shortname($name)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select sortname from countries where name =$name"; 
        $query = $ci->db->query($sql);
        $data = $query->row();
        return $data->sortname;
}

function get_state_name($id)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select name from states where id ='".$id."'"; 
        $query = $ci->db->query($sql);
        $data = $query->row();
        if($data){return $data->name;}
        else{return NULL;}
}

function blog_cat_name($id)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select name from article_category where id =$id"; 
        $query = $ci->db->query($sql);
        $data = $query->row();
        return $data->name;
}

function form_applied_status($table,$col1,$va1,$col2,$val2)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select * from $table where $col1 =$va1 and $col2 = $val2"; 
        $query = $ci->db->query($sql);
        $data = $query->num_rows();

        if($data > 0 )
        {
            return 1;
        }
        else
        {
            return 0;
        }  
}

function complete_forms_status($job_id,$login_id)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql1 = "select form_cat_id from forms where job_type_id=$job_id"; 
        $query1 = $ci->db->query($sql1);
        $data1 = $query1->num_rows();
        
        $sql2="select form_id from forms,employee_forms_status where forms.job_type_id=$job_id and employee_forms_status.user_id=$login_id and employee_forms_status.form_id=forms.form_cat_id";
        $query2 = $ci->db->query($sql2);
        $data2 = $query2->num_rows();
                
        if($data1 == $data2 )
        {
            return 1;
        }
        else if($data2==0)
        {
            return 0;
        }
        else if ($data2 < $data1) {
             return 2;
         } 
}


function calculate_time_span($date){

    $seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($date);

        $months     = floor($seconds / (3600*24*30));
        $day        = floor($seconds / (3600*24));
        $hours      = floor($seconds / 3600);
        $mins       = floor(($seconds - ($hours*3600)) / 60);
        $secs       = floor($seconds % 60);

        if($seconds < 60)
            $time = $secs." seconds ago";
        else if($seconds < 60*60 )
            $time = $mins." min ago";
        else if($seconds < 24*60*60)
            $time = $hours." hours ago";
        else if($seconds > 24*60*60)
            $time = $day." day ago";
        else
            $time = $months." month ago";

        return $time;
}

function calculate_work_duration($end,$start){
        
        $secs    ='00';
        $mins       ='00';
        $hours      ='00';

        $seconds    = strtotime($end) - strtotime($start);
        $months     = floor($seconds / (3600*24*30));
        $day        = floor($seconds / (3600*24));
        $hours      = floor($seconds / 3600);
        $mins       = floor(($seconds - ($hours*3600)) / 60);
        $secs       = floor($seconds % 60);

        if($hours==0){$hours="00";}
        if($mins==0){$mins="00";}
        if($hours<=10 && $hours!=0){$hours="0".$hours;}
        if($mins<=10 && $mins!=0){$mins="0".$mins;}
        if($secs<=10 && $secs!=0){$secs="0".$secs;}

        return $hours.":".$mins.":".$secs;
}

function extract_time($date_time_mix)
{
    $date = new DateTime($date_time_mix);
    return $date->format('m-d-Y');
}

function extract_date($date_time_mix)
{
    $date = new DateTime($date_time_mix);
    return $date->format('m-d-Y');
}


// manage dashboard redirect on based user ID

function go_dashboard($user_id)
{
    $ci= & get_instance();
    $ci->load->database();
    $ci->db->select('user_role_id');
    $ci->db->where('id',$user_id);
    $query =$ci->db->get('user');
    $data = $query->row();  

    if($query->num_rows() > 0)
    {
        if($data->user_role_id == 2)
        {
            return 'admin/dashboard';
        }
        if($data->user_role_id == 4)
        {
            return 'customer/dashboard';
        }
        if($data->user_role_id == 5)
        {
            return 'employer/dashboard';
        }
        if($data->user_role_id == 6)
        {
            return 'employee/dashboard';
        }

    }
    else
    {
        echo "Exceptional Error! Please conatct to your developer";
    }
    
}


/********************************************* RJ  ************************************************/

function get_single_col($table,$col1,$val1,$col2)
{
    $ci= & get_instance();
    $ci->load->database();
    $ci->db->select($col2);
    $ci->db->where($col1,$val1);
    $query=$ci->db->get($table);
    $count=$query->num_rows();
    $data = $query->row();  
    if($count > 0)
    {
        return $data->$col2; 
    }
    else
    {
        return "None";
    }
}
function assigned_job_counter($table,$col1,$val1)
{
    $ci= & get_instance();
    $ci->load->database();
    $ci->db->select("*");
    $ci->db->where($col1,$val1);
    $query=$ci->db->get($table);
    $count=$query->num_rows();
    if($count > 0)
    {
        return $count; 
    }
    else
    {
        return 0;
    } 
}


function assigned_job_counter_c2($table,$col1,$val1,$col2,$val2)
{
    $ci= & get_instance();
    $ci->load->database();
    $ci->db->select("*");
    $ci->db->where($col1,$val1);
    $ci->db->where($col2,$val2);
    $query=$ci->db->get($table);
    $count=$query->num_rows();
    if($count > 0)
    {
        return $count; 
    }
    else
    {
        return 0;
    } 
}

function job_counter($table,$col1,$val1,$status='')
{
    $status_param_string = '';
    if(!empty($status))
    {
      if($status = 'active')
       {
        $status_param_string =' and is_active=1';
       }
      elseif ($status = 'inactive') 
       {
        $status_param_string =' and is_active=0';   
       }
    }
    

        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select * from $table where $col1 = '$val1' " .$status_param_string.""; 
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        if($data > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }  
        

}

// col1 = condition column 1 , val1= value for condition1 , col2 = status column name , val2 = value for status column
function count_task_status($table,$col1,$val1,$col2,$val2)
{
    $ci= & get_instance();
    $ci->load->database();
    $ci->db->select("*");
    $ci->db->where($col1,$val1);
    $ci->db->where($col2,$val2);
    $query=$ci->db->get($table);
    $count=$query->num_rows();
    if($count > 0)
    {
        return $count; 
    }
    else
    {
        return 0;
    } 
}

function get_signature($table,$col1,$val1,$col2)
{
    $ci= & get_instance();
    $ci->load->database();
    $ci->db->select($col2);
    $ci->db->where($col1,$val1);
    $query=$ci->db->get($table);
    $count=$query->num_rows();
    $data = $query->row();  
    if($count > 0)
    {
        $path="upload/signature/".$data->$col2;
        if(!file_exists($path))
        {
         return $data->$col2;     
        }
        else
        { 
         return base_url().$path;
        }  
    }
    else
    {
        return NULL;
    }
}

function dateConvert($date,$format)
{
    $date = new DateTime($date);
    return $date->format($format);
}

function get_name($date,$seprater,$posoition,$get_one)
{
    
    if($get_one=="month")
    {
     $temp=explode($seprater,$date);
     switch($temp[$posoition])
     {
        
     case '01':
           return "Jan";
           break;
     case '02':
           return "Feb";
           break;
     case '03':
           return "Mar";
           break; 
     case '04':
           return "Apr";
     case '05':
           return "Mar";
           break;
     case '06':
           return "Jun";
           break;
     case '07':
           return "Jul";
           break;                            
     case '08':
           return "Aug";
           break;
     case '09':
           return "Sept";
           break;
     case '10':
           return "Oct";
           break;
     case '11':
           return "Nov";
           break;
     case '12':
           return "Dec";
           break;                        
     }
    }
    else if($get_one=="day")
    {
        $temp=explode($seprater, $date); 
        return $temp[$posoition]; 
    }
    else if($get_one=="day")
    {

    }
}


function get_state($country_id)
{
    $ci= & get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('country_id',$country_id);
    $query=$ci->db->get('states');
    $count=$query->num_rows();
    if($count > 0)
    {
        return $query->result();
    }
    else
    {
        return 0;
    }
}

function get_city($state_id)
{
    $ci= & get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->where('state_id',$state_id);
    $query=$ci->db->get('cities');
    $count=$query->num_rows();
    if($count > 0)
    {
        return $query->result();
    }
    else
    {
        return 0;
    }
}

function check_status($val1,$val2)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select * from job_status where employee_id = '$val1' and job_type_id = '$val2' "; 
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        if($data > 0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
}

//////////////////////////......Optimazation is required of this section.....///////////////////
function stna_verification_confirmation($employee_id)
{

        $ci=& get_instance();
        $ci->load->database(); 
        $sum=0;
        $sql = "select form_cat_id from forms where job_type_id=1"; 
        $query = $ci->db->query($sql);
        $required_forms = $query->num_rows();

        $sql="select * from form_i_9 where employee_id=$employee_id and verification_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;
        $sql="select * from driver_licence where employee_id=$employee_id and dl_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from social_security_card where employee_id=$employee_id and sc_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from us_resident_card where employee_id=$employee_id and us_r_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from education_certificate where employee_id=$employee_id and cert_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from cpr_first_aid where employee_id=$employee_id and cpr_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from employement_agreement where employee_id=$employee_id and agree_approval=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from w_4_form where employee_id=$employee_id and w_4_approval=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from auto_insurance where employee_id=$employee_id and insu_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from aide_job_description where employee_id=$employee_id and ajd_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from hha_competency where employee_id=$employee_id and hha_comp_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from hha_training_schedule where employee_id=$employee_id and approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from hha_self_assessment where employee_id=$employee_id and h_self_asse_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from stna_certificate where employee_id=$employee_id and stna_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        if($sum==$required_forms)
        {
            return 1;
        }
        else
        {
            return 0;
        }

}

function contractor_verification_confirmation($employee_id)
{

        $ci=& get_instance();
        $ci->load->database(); 
        $sum=0;
        $sql = "select form_cat_id from forms where job_type_id=7"; 
        $query = $ci->db->query($sql);
        $required_forms = $query->num_rows();

        $sql="select * from form_i_9 where employee_id=$employee_id and verification_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;
        $sql="select * from driver_licence where employee_id=$employee_id and dl_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from social_security_card where employee_id=$employee_id and sc_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from us_resident_card where employee_id=$employee_id and us_r_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from w_9_form where employee_id=$employee_id and w_9_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        if($sum==$required_forms)
        {
            return 1;
        }
        else
        {
            return 0;
        }

}

function office_staff_verification_confirmation($employee_id)
{

        $ci=& get_instance();
        $ci->load->database(); 
        $sum=0;
        $sql = "select form_cat_id from forms where job_type_id=5"; 
        $query = $ci->db->query($sql);
        $required_forms = $query->num_rows();

        $sql="select * from form_i_9 where employee_id=$employee_id and verification_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;
        $sql="select * from driver_licence where employee_id=$employee_id and dl_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from social_security_card where employee_id=$employee_id and sc_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from us_resident_card where employee_id=$employee_id and us_r_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from education_certificate where employee_id=$employee_id and cert_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from cpr_first_aid where employee_id=$employee_id and cpr_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from employement_agreement where employee_id=$employee_id and agree_approval=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from w_4_form where employee_id=$employee_id and w_4_approval=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

       
        if($sum==$required_forms)
        {
            return 1;
        }
        else
        {
            return 0;
        }

}  


function driver_verification_confirmation($employee_id)
{

        $ci=& get_instance();
        $ci->load->database(); 
        $sum=0;
        $sql = "select form_cat_id from forms where job_type_id=6"; 
        $query = $ci->db->query($sql);
        $required_forms = $query->num_rows();

        $sql="select * from form_i_9 where employee_id=$employee_id and verification_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;
        $sql="select * from driver_licence where employee_id=$employee_id and dl_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from social_security_card where employee_id=$employee_id and sc_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from us_resident_card where employee_id=$employee_id and us_r_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from education_certificate where employee_id=$employee_id and cert_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from cpr_first_aid where employee_id=$employee_id and cpr_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from employement_agreement where employee_id=$employee_id and agree_approval=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from w_4_form where employee_id=$employee_id and w_4_approval=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from auto_insurance where employee_id=$employee_id and insu_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        if($sum==$required_forms)
        {
            return 1;
        }
        else
        {
            return 0;
        }

}


function lpn_rn_verification_confirmation($employee_id)
{

        $ci=& get_instance();
        $ci->load->database(); 
        $sum=0;
        $sql = "select form_cat_id from forms where job_type_id=3"; 
        $query = $ci->db->query($sql);
        $required_forms = $query->num_rows();

        $sql="select * from form_i_9 where employee_id=$employee_id and verification_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;
        $sql="select * from driver_licence where employee_id=$employee_id and dl_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from social_security_card where employee_id=$employee_id and sc_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from us_resident_card where employee_id=$employee_id and us_r_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from education_certificate where employee_id=$employee_id and cert_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from cpr_first_aid where employee_id=$employee_id and cpr_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from employement_agreement where employee_id=$employee_id and agree_approval=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from w_4_form where employee_id=$employee_id and w_4_approval=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from competency_rnlpn where employee_id=$employee_id and form_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;

        $sql="select * from rn_lpn_JD where employee_id=$employee_id and rn_lpn_JD_approval_status=1";
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        $sum=$sum+$data;
       
        if($sum==$required_forms)
        {
            return 1;
        }
        else
        {
            return 0;
        }

}

//////////////////////////......Optimazation is required of this section.....///////////////////

function job_verification_status($val1,$val2)
{
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select * from job_status where employee_id = '$val1' and job_type_id = '$val2' and confirm_status=1"; 
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        if($data > 0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
}

function employee_verification_status($employee_id)
{
 $ci= & get_instance();
 $ci->load->database();
 $sql="select * from job_status where employee_id ='$employee_id' and confirm_status=1";
 $result=$ci->db->query($sql);
 $data=$result->num_rows();
 if($data != 0 && $data >0)
 {
    return 1;
 }
 else
 {
    return 0;
 }
}


/////////////////////////......Find no. of employee of Employer - active, inactive and total .....//////////////////


function user_counter($employer_id,$user_role_id,$status_param='')
{
    $status_param_string = '';

    if($status_param = 'active')
    {
        $status_param_string =' and active=1';
    }
    elseif ($status_param = 'inactive') {
        $status_param_string =' and active=0';   
    }
    

        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "select * from user where employer_id = '$employer_id' and user_role_id = $user_role_id" .$status_param_string.""; 
        $query = $ci->db->query($sql);
        $data = $query->num_rows();
        if($data > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
}

// this function is using for a specific employer......
function count_enrolled_employees($employer_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $sql="select * from user where employer_id= $employer_id and user_role_id=6";
    $query=$ci->db->query($sql);
    $emp_list=$query->result();
    $enrolled_employee=0;
    foreach ($emp_list as $row) 
    {
      $verification_status=employee_verification_status($row->id);
      if($verification_status==1)
      {
        $enrolled_employee=$enrolled_employee+1;
      }
    }
    return $enrolled_employee;

}

function get_employer_plan($employer_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $sql="select * from employer_plan_history where user_id = $employer_id and is_active=1";
    $query=$ci->db->query($sql);
    if($query->num_rows() > 0)
    {
     return $query->row();
    }
    
}

function get_verified_employees($employer_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $sql="select * from user where employer_id= $employer_id and user_role_id=6";
    $query=$ci->db->query($sql);
    $emp_list=$query->result();
    if($query->num_rows() > 0 )
    {
     $data['verified_emp_list']=array();
     $i=0;
     foreach ($emp_list as $row) 
     {
      $verification_status=employee_verification_status($row->id);
      if($verification_status==1)
      {
       $sql_temp="select * from user,address where user.id=$row->id and address.user_id=user.id";
       $query_temp=$ci->db->query($sql_temp); 
       $data['verified_emp_list'][$i]=$query_temp->row(); 
      }
      $i++;
     }

     return $data;
   }
    return NULL;

}
function get_unverified_employees($employer_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $sql="select * from user where employer_id= $employer_id and user_role_id=6";
    $query=$ci->db->query($sql);
    $emp_list=$query->result();
    if($query->num_rows() > 0 )
    {
     $data['unverified_emp_list']=array();
     $i=0;
     foreach ($emp_list as $row) 
     {
      $verification_status=employee_verification_status($row->id);
      if($verification_status==0)
      {
       $sql_temp="select * from user,address where user.id=$row->id and address.user_id=user.id";
       $query_temp=$ci->db->query($sql_temp); 
       $data['unverified_emp_list'][$i]=$query_temp->row(); 
      }
      $i++;
     }

     return $data;
   }
    return NULL;

}

function payment_counter($employer_id='')
{
 $ci =& get_instance();
 $ci->load->database();
 if($employer_id!='')
    {$employer_id= " where user_id = $employer_id ";}
 $sql="select * from payment_history".$employer_id."";
 $query=$ci->db->query($sql);
 return $query->num_rows();
}

function employee_counter($employer_id='')
{
 $ci =& get_instance();
 $ci->load->database();
 if($employer_id!='')
 {$employer_id= " where user_id = $employer_id ";}
 $sql="select * from user where user_role_id=6 ".$employer_id."";
 $query=$ci->db->query($sql);
 return $query->num_rows();
}
function is_exist_c1($table,$col1,$val1)
{
    $ci =& get_instance();
    $ci->load->database();
    $sql="select * from $table where $col1=$val1";
    $query=$ci->db->query($sql);
    if($query->num_rows() > 0)
        {return true;}
    else
        {return false;}

}

function check_data_existance($data,$replace)
{
 if(empty($data)){ return $replace; }
 else{ return $data; }
}


function upload_file($file,$fieldname,$replace_file_name,$path,$extension='')
{    
   
    $config['upload_path']                           = $path;
    if($extension!=''){ $config['allowed_types']     = $extension;}
    else{               $config['allowed_types']     = '*';}
    $config['file_name']                             = $replace_file_name; 
    $ci =& get_instance();
    $ci->load->library('upload',$config); 
    if($ci->upload->do_upload($fieldname))
      { $data['file_data']=$ci->upload->data(); }
    else { $data['error'] =  $ci->upload->display_errors(); }
    return $data;

}

function get_digital_signature($signature_data)
{
 $path="upload/signature/".$signature_data;
 if(!empty($signature_data))
 {
  if(file_exists($path)){ return $path; }
  else{ return $signature_data;}
 }
 else
 {
    return NULL;
 }
}




