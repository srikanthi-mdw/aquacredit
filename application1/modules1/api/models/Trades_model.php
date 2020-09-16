<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
	 * Author:Ramakrishna
*/
error_reporting(1);
//ini_set('memory_limit', '100M');

class Trades_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
       	$this->load->library('session');
       	$this->load->database();
	}
	
	function gettradername($bid="")
	{
		$data = $this->db->get_where("traders", ['td_id' => $bid])->row_array();
		return json_encode(array('status'=>'success','data' => $data));	
	}

	function getusername($bid="")
	{
		$data = $this->db->get_where("users", ['user_id' => $bid])->row_array();
		return json_encode(array('status'=>'success','data' => $data));	
	}

	function updateTrade($lid,$posts)
	{
		$query = $this->db->update('trade', $posts, array('id'=>$lid));
		if($query)
		{
			return json_encode(array('status'=>'success'));
		}else{
			return json_encode(array('status'=>'fail'));
		}		
	}
	function insertTradeActivity($lid,$posts)
	{
		$data = $this->db->insert('trade_actual_details',$posts);
		
		if($data)
		{
			$insert_id = $this->db->insert_id();
			return json_encode(array('status' => 'success','insert_id' => $insert_id));
		}else{
			return json_encode(array('status' => 'fail'));
		}	
	}
	function updateTradeActivity($laid,$posts)
	{
		$data = $this->db->update('trade_actual_details', $posts, array('id'=>$laid));
		
		if($data)
		{
			return json_encode(array('status'=>'success'));
		}else{
			return json_encode(array('status'=>'fail'));
		}
	}

	function getTradeDetails($lid)
	{
		//$this->db->from('loan_details');
		$this->db->select('trade.*,users.user_name,traders.trader_type,traders.full_name,traders.contact_person,traders.firm_name,user_crop_details.crop_location');
		$this->db->join('users', 'users.user_id = trade.userid','left');
		$this->db->join('traders', 'traders.td_id = trade.trader_id','left');
		$this->db->join('user_crop_details', 'user_crop_details.cd_id = trade.location','left');
		$query = $this->db->get_where("trade", ['trade.id' => $lid])->row_array();		
		return(json_encode(array('status'=>'success','data'=>$query)));
	}
	
	function getTradesdata($bid = "")
	{	
		if($bid!='')
		{
			$this->db->where("firm_name LIKE '%$bid%' ");
		}
		
		$data = $this->db->get('traders')->result();
       		
		return json_encode(array('status'=>'success','data' => $data));
		
	}
	function tradeAnalytics()
	{
		$response = array();
		$query = $this->db->query("SELECT *,(select count(id) from trade) as tot_rec,(select SUM(gtotal) from trade where status = '1') as tot_amt,(select SUM(final_count) from trade where status = '1') as tot_count FROM trade");
		//echo $this->db->last_query();
        if($query->num_rows()>0)
        {
            $data = $query->row_array(); 
			$response = json_decode(json_encode($data),true);	
        }
		return $response;
	}

	function getUsersdata($bid = "")
	{
		$sub = '';
		if($bid!='')
		{
			$sub = "AND user_name LIKE '%".$bid."%' ";
		}

		$this->db->where("user_type='FARMER' $sub ");
		$data = $this->db->get('users')->result();
       		
		return json_encode(array('status'=>'success','data' => $data));
		
	}

	function getSearchUsers($skey,$ttype)
	{
		$sub = '';
		if($ttype=='guest')
		{
			$sub = 'AND typeofuser=1';
		}
		else
		{
			$sub = 'AND typeofuser=0';
		}
		$this->db->select('user_id,user_type,user_code,user_name,mobile');
		$this->db->where("(user_name LIKE '%$skey%' OR mobile LIKE '%$skey%') $sub  ");

		$query = $this->db->get('users')->result();
		//echo $this->db->last_query();exit;
		$response = json_decode(json_encode($query), true);
		foreach($response as $row)
		{
			if($row["user_type"] == "FARMER"){

				$img_path = 'http://3.7.44.132/aquacredit/assets/images/f_1.png';

				$data[] = array("user_id"=>$row['user_id'],"value"=>$row['user_name'],"label"=>$row['user_name'],"usercode"=>$row['user_code'],"user_type"=>$row["user_type"],"img"=>$img_path,"mobile"=>$row['mobile']);
				
			}
			
		}
		
		return json_encode($data);
	}

	function getSearchTrader($skey)
	{
		$this->db->select('td_id,trader_code,firm_name,full_name,mobile_no,trader_type,contact_person');
		$this->db->where("full_name LIKE '%$skey%' OR mobile_no LIKE '%$skey%' OR firm_name LIKE '%$skey%' ");
		$query = $this->db->get('traders')->result();
		//echo $this->db->last_query();exit;
		$response = json_decode(json_encode($query), true);
		foreach($response as $row)
		{
				$img_path = 'http://3.7.44.132/aquacredit/assets/images/f_1.png';
				if($row['trader_type']=='Agent')
				{
					$tra = $row['full_name'];
				}
				else
				{
					$tra = $row['firm_name'].' ( '.$row['contact_person'].' )';
				}

				$data[] = array("user_id"=>$row['td_id'],"value"=>$tra,"label"=>$tra,"usercode"=>$row['trader_code'],"img"=>$img_path,"user_type"=>$row['trader_type']);
		}
		
		return json_encode($data);
	}

	function trades_search($limit,$start,$def_search,$search,$col,$dir,$searchValue,$month,$user,$trader,$status,$fromdate,$todate)    
    {
		if($col == 0){ $col = "id";}

		if($search != ""){ $where .= " AND (id LIKE '%".$search."%' OR traders.firm_name LIKE '%".$search."%' OR traders.contact_person LIKE '%".$search."%' OR traders.full_name LIKE '%".$search."%' OR users.user_name LIKE '%".$search."%')"; }

		if($status != ""){
			
			//$str_status = implode(",",$status);$where .= " AND status IN ($str_status)";
			if(count($status) == 1){ $where .= " AND trade.status IN ('$status[0]')"; }
			else if(count($status)>1){
				$where .= " AND trade.status IN ('$status[0]','$status[1]')";
			}
			
		}

		if($month != "")
		{
			/*if($status == ""){
				$where .= " AND trade.status <> '2'";				
			}*/
			if($month == "m"){
				//This month
				$where .= " AND (MONTH(trade.trade_date) = MONTH(CURRENT_DATE()) AND YEAR(trade.trade_date) = YEAR(CURRENT_DATE())) ";
			}else if($month == "1m")
			{
				$where .= " AND (trade.trade_date >= last_day(now()) + interval 1 day - interval 1 month) ";
			}else if($month == "3m")
			{
				$where .= " AND (trade.trade_date >= last_day(now()) + interval 1 day - interval 3 month) ";
			}else if($month == "6m")
			{
				$where .= " AND (trade.trade_date >= last_day(now()) + interval 1 day - interval 6 month) ";
			}else if($month == "1y")
			{
				$where .= " AND (trade.trade_date < DATE_SUB(NOW(),INTERVAL 1 YEAR)) ";
			}
			else if($month == "custom")
			{
				$from_date = date('Y-m-d',strtotime($fromdate));
				$to_date = date('Y-m-d',strtotime($todate));
				$where .= " AND (CAST(trade.trade_date as DATE) BETWEEN '$from_date' AND '$to_date')";
			}
		}

		
		$orderby = 'order by id desc';
		$response = array();

		//$query = $this->db->query("SELECT * FROM trade where 1=1 $where Order by $col $dir limit $start,$limit");
		
		$query = $this->db->query("SELECT trade.*,users.user_name,traders.firm_name,traders.full_name,traders.contact_person FROM trade LEFT JOIN users ON users.user_id = trade.userid LEFT JOIN traders ON traders.td_id = trade.trader_id where 1=1 $where $orderby limit $start,$limit");
		
		//echo $this->db->last_query();exit;
        if($query->num_rows()>0)
        {
            $data = $query->result(); 
			$response = json_decode(json_encode($data),true);
        }
         return $response;		
	}
	
	
	
	// Insert brand
	function insert($posts)
	{
		$data = $this->db->insert('trade',$posts);
		
		if($data)
		{
			$insert_id = $this->db->insert_id();
			return json_encode(array('status' => 'success','insert_id' => $insert_id));
		}else{
			return json_encode(array('status' => 'fail'));
		}
	}

	function userinsert($posts)
	{
		$data = $this->db->insert('users',$posts);
		
		if($data)
		{
			$insert_id = $this->db->insert_id();
			return json_encode(array('status' => 'success','insert_id' => $insert_id));
		}else{
			return json_encode(array('status' => 'fail'));
		}
	}
	public function deleteTradeactual($bid,$lid)
	{
		$tt = $this->db->query("select *from trade_actual_details where id='".$bid."' ")->row_array();
	
		
		$this->db->select('trade.*');
		$query1 = $this->db->get_where("trade", ['trade.id' => $lid])->row_array();	

		

		 $gtotal = $query1['gtotal']-$tt['company_amount'];
		 $company_fprice = $query1['company_fprice']-$tt['company_amount'];
		 $farmer_fprice = $query1['farmer_fprice']-$tt['farmer_amount'];
		 $company_fweight = $query1['company_fweight']-$tt['company_weight'];
		 $farmer_fweight = $query1['farmer_fweight']-$tt['farmer_weight'];
		 $final_count = $query1['final_count']-$tt['count'];

				$posts = array(
					'gtotal' => $gtotal,
					'company_fprice' => $company_fprice,
					'farmer_fprice' => $farmer_fprice,
					'company_fweight' => $company_fweight,
					'farmer_fweight' => $farmer_fweight,
					'final_count' => $final_count			
				);
			$queryd = $this->db->update('trade', $posts, array('id'=>$lid));

		if($queryd)
		{	
			$response = $this->db->delete('trade_actual_details', array('id'=>$bid));
			if($response)
			{
				$this->db->select('trade.*,users.user_name,traders.firm_name,user_crop_details.crop_location');
				$this->db->join('users', 'users.user_id = trade.userid','left');
				$this->db->join('traders', 'traders.td_id = trade.trader_id','left');
				$this->db->join('user_crop_details', 'user_crop_details.cd_id = trade.location','left');
				$query = $this->db->get_where("trade", ['trade.id' => $lid])->row_array();	

				return(json_encode(array('status'=>'success','data'=>$query)));

			}else{
				return json_encode(array("status"=>"fail"));
			}
		}
	}
	
	public function deleteTrade($bid)
	{
		$response = $this->db->delete('trade', array('id'=>$bid));
		if($response)
		{
			return json_encode(array("status"=>"success"));
		}else{
			return json_encode(array("status"=>"fail"));
		}	
	}
	function getTradeactualDetails($uid = "")
	{
		$data = $this->db->get_where("trade_actual_details", ['trade_id' => $uid])->result();
		return json_encode(array('status'=>'success','data' => $data));
	}

}//Main function ends here
?>