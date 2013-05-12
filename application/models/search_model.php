<?php

class Search_model extends CI_Model {

function search_results($keywords){
	
	$returned_result=array();
	$where="";
	
	$keywords=preg_split('/[\s]+/',$keywords);
   
	$total_keywords=count($keywords);
	
	foreach($keywords as $key=>$keyword){
		$where .="`tags` like '%$keyword%'";
		if($key !=($total_keywords -1)){
			$where .="AND";
			}
		}
		$result="select * from topic where $where and statue= 1";
		 if ($result2 = $this->db->query($result)) {
            return $result2;
        } else {
            return false;
        }
}

///////////////////////////////////////////////////////////////

function search_market_results($keywords){
	
	$returned_result=array();
	$where="";
	
	$keywords=preg_split('/[\s]+/',$keywords);
   
	$total_keywords=count($keywords);
	
	foreach($keywords as $key=>$keyword){
		$where .="`name` like '%$keyword%'";
		if($key !=($total_keywords -1)){
			$where .="AND";
			}
		}
		$result="select * from service where $where ";
		 if ($result2 = $this->db->query($result)) {
            return $result2;
        } else {
            return false;
        }
}
	
	
}