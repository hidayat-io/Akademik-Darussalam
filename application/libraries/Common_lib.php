<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_lib{

    var $CI;

    public function __construct(){

        $CI =& get_instance();
        $CI->load->database();
    }

    function build_sidemenu(){

    	$CI =& get_instance();

    	$active_menu 	= $CI->session->userdata('active_menu');
    	$uid 			= $CI->session->userdata('logged_in')['uid'];
    	$string_menu 	= '';
 
    	$main_menu_data = $this->look_up_menu(0,$uid);

    	if($main_menu_data!=null){

    		foreach ($main_menu_data as $r) {
    			
    			$url 	= base_url().$r->url;
    			$icon  	= $r->icon;
    			$title 	= $r->nama_modul;

    			$string_menu .= '<li class="nav-item">
                                <a href="'.$url.'" class="nav-link nav-toggle">
                                    <i class="'.$icon.'"></i>
                                    <span class="title">'.$title.'</span>';

                //child menu
                $child_menu 	= $this->build_child_menu($r->modul_id,$uid);

                if($child_menu!='') $string_menu .= '<span class="arrow "></span>';

                $string_menu 	.= "</a>";
                $string_menu 	.= $child_menu;
                //end child menu

				$string_menu .= '</li>';

    		}
    	}

    	echo $string_menu;
    }

    function build_child_menu($parent_modul,$user_id,$string_child_menu=''){

    	$CI =& get_instance();

    	$child_menu = $this->look_up_menu($parent_modul,$user_id);

    	if($child_menu!=null){

    		$string_child_menu .= '<ul class="sub-menu">';

    		foreach ($child_menu as $r) {
    			
    			$url 	= base_url().$r->url;
    			$icon  	= $r->icon;
    			$title 	= $r->nama_modul;

    			
    			$string_child_menu .= '<li class="nav-item">
                                <a href="'.$url.'" class="nav-link nav-toggle">
                                    <i class="'.$icon.'"></i>
                                    <span class="title">'.$title.'</span>';

                //child menu
                $child_sub_menu 	= $this->build_child_menu($r->modul_id,$user_id,$string_child_menu);
                $string_child_menu .= $child_sub_menu;

                if($child_sub_menu!='') $string_child_menu .= '<span class="arrow "></span>';
                //end child menu
                
				$string_child_menu .= '</a></li>';
				
    		}

    		$string_child_menu .= '</ul>';

    		return $string_child_menu;
    	}
    	else{

    		return '';
    	}
    }

    function look_up_menu($parent_modul,$user_id){

    	$CI =& get_instance();

    	$sql = "SELECT DISTINCT u.user_id,gdu.group_id,mdl.* FROM `user` u
					INNER JOIN group_daftar_user gdu 
						ON u.user_id = gdu.user_id
					INNER JOIN group_hak_akses gha
						ON gdu.group_id=gha.group_id
					INNER JOIN modul mdl
						ON gha.modul_id=mdl.modul_id
				WHERE mdl.parent = '".$parent_modul."' AND u.user_id='".$user_id."'
				ORDER BY mdl.parent,mdl.sequence";

		return $CI->db->query($sql)->result();
    }

    function encrypt_string($param){

    	$CI =& get_instance();

    	$id 	= $param;
    	$id 	= explode('#', $id); //each variable separated with #
    	$var 	= array();

    	for($i=0;$i<count($id);$i++){

    		array_push($var, $id[$i]);
    	}

		$json 		= json_encode($var);
		$encrypted 	= $CI->encrypt->encode($json, 'iosoft'); //encryption key must be same to decrypt
		$base64 	= base64_encode($encrypted);
		return $base64;
    }

   	function cek_aktif($active,$current){

		if($active==$current){

			return "class='active'";
		}
	}
}
