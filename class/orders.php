<?php

class Orders
{

	private $pref;	
	
     public function __construct(){ 
		
		global $table_prefix;
		$this->pref = $table_prefix;
  
		//Новое соединение с базой
		$this->db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Error alta " . mysqli_error($folder)); 
		mysqli_set_charset($this->db,"utf8");
		
	}
   
   public function addOrder($data){
	
		
		$project_name = trim($_POST["project_name"]);
		$admin_email  = "support@huntingworld.com";
		$form_subject = trim($_POST["form_subject"]);
	
		$tour_name = trim($_POST["tour_name"]);
		$tour_link = trim($_POST["tour_link"]);
		
		$name_client = trim($_POST["name_client"]);
		$phone_client = trim($_POST["phone_client"]);
		$email_client = trim($_POST["email_client"]);
		
		$name_contact = trim($_POST["name_contact"]);
		$phone_contact = trim($_POST["phone_contact"]);
		$email_contact = trim($_POST["email_contact"]);
		$address_contact = trim($_POST["address_contact"]);
		
		$date_tour = trim($_POST["date_tour"]);
		$summa_tour = trim($_POST["summa_tour"]);
		$summa_tour_eger = trim($_POST["summa_tour_eger"]);
		$summa_tour_avto = trim($_POST["summa_tour_avto"]);
		
		//$tour_hunters = (int)$_POST['tour_hunters'];
		
		$inclusion = trim($_POST["inclusion"]);
		$yslov_money = trim($_POST["tour_yslov_money"]);
		
		$ivolga = "ivolga";
		$themes_admin = "Новое бронирование тура";
		$themes_contact = "Новое бронирование тура на Ivolga";
		$themes_client = "Бронирование охоты";
		
		$tour_hunters = trim($_POST["tour_hunters"]);
		$tour_gost = trim($_POST["tour_gost"]);
		$tour_trof = trim($_POST["tour_trof"]);
			
		$sql = 'INSERT INTO '.$this->pref.'orders SET
						`orders_id` = "",
						`date` = "'.date('Y-m-d H:i:s').'",
						`project_name` = "'.$data['project_name'].'",
						`form_subject` = "'.$data['form_subject'].'",
						`tour_name` = "'.$data['tour_name'].'",
						`tour_link` = "'.$data['tour_link'].'",
						`name_client` = "'.$data['name_client'].'",
						`phone_client` = "'.$data['phone_client'].'",
						`email_client` = "'.$data['email_client'].'",
						`name_contact` = "'.$data['name_contact'].'",
						`phone_contact` = "'.$data['phone_contact'].'",
						`email_contact` = "'.$data['email_contact'].'",
						`address_contact` = "'.$data['address_contact'].'",
						`date_tour` = "'.$data['date_tour'].'",
						`summa_tour` = "'.$data['summa_tour'].'",
						`summa_tour_eger` = "'.$data['summa_tour_eger'].'",
						`summa_tour_avto` = "'.$data['summa_tour_avto'].'",
						`tour_hunters` = "'.$data['tour_hunters'].'",
						`tour_gost` = "'.$data['tour_gost'].'",
						`tour_trof` = "'.$data['tour_trof'].'"
				';
		$this->db->query($sql) or die('class Orders <br>'.$sql);
		
		$id = $this->db->insert_id;
		
		return $id;
		
	}
   
	public function dellOrder($order_id){
	
		$sql = 'DELETE FROM '.$this->pref.'orders WHERE `orders_id`="'.$order_id.'"';
		$this->db->query($sql) or die('class Orders <br>'.$sql);
		
	}
	
	public function getOrders(){
	
		$sql = 'SELECT * FROM '.$this->pref.'orders ORDER BY `date` DESC';
		$r = $this->db->query($sql) or die('class Orders <br>'.$sql);
		
		$return = array();
		
		while($row = $r->fetch_assoc()){
			
			$return[$row['orders_id']] = $row;
			
		}
		
		return $return;
    
   }
}
?>