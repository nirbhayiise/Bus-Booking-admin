<?php
	include 'database/dbconfig.php';
	
	class user
	{
	public $db;
	
	public function __construct(){
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if(mysqli_connect_errno()) {
	echo "Error: Could not connect to database.";
	exit;
	}
	}
	
	/*** for login process ***/
	public function check_login($ADMIN_USERID, $ADMIN_PASSWORD){
		
	$sql2="SELECT * from access_users WHERE ADMIN_USERID='$ADMIN_USERID' AND ADMIN_PASSWORD='$ADMIN_PASSWORD'";

	//checking if the username is available in the table
	$result = mysqli_query($this->db,$sql2);
	$user_data = mysqli_fetch_array($result);
	$count_row = $result->num_rows;
	
	if ($count_row == 1) {
	// this login var will use for the session thing
	$_SESSION['login'] = true;
	$_SESSION['username'] = $user_data['ADMIN_USERID'];
	return true;
	}
	else{
	return false;
	}
	}
	/*** starting the session ***/
	public function get_session(){
	return $_SESSION['login'];
	}
	
	public function user_logout() {
	$_SESSION['login'] = FALSE;
	session_destroy();
	}
	//Fare
	public function add_fare($fare_base_fare,$fare_city_id){
	$sql1="INSERT INTO fare SET fare_base_fare='$fare_base_fare',fare_city_id='$fare_city_id',status='1'";
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
	return $result;
	}
	public function list_fare()
	{
	$sql3="SELECT f.*,c.city_name As cityName FROM fare f,city c WHERE f.fare_city_id=c.city_id";
	$res = mysqli_query($this->db,$sql3);
	  return $res;
	}
	public function edit_fare($id)
	{
	$sql3="SELECT f.*,c.city_name As cityName FROM fare f,city c WHERE f.fare_city_id=c.city_id AND fare_id='$id'";
	$res = mysqli_query($this->db,$sql3);
	return $res;
	}
	public function update_fare($id,$fare_base_fare,$fare_city_id){
		
	$sql1="UPDATE fare SET fare_base_fare='$fare_base_fare',fare_city_id='$fare_city_id' WHERE fare_id =".$id ;
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot Updated");
	return $result;
	}
	public function delete_fare($table,$id)
	{
		$sql3= "DELETE FROM $table WHERE fare_id=".$id;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	}
	//end fare
	//Bus
	public function add_bus($bus_name,$bus_number,$totalSeats){
	$sql1="INSERT INTO bus SET bus_name='$bus_name',bus_number='$bus_number',totalSeats='$totalSeats',bus_status='1'";
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
	return $result;
	}
	public function list_bus()
	{
	$sql3="SELECT * FROM bus";
	$res = mysqli_query($this->db,$sql3);
	  return $res;
	}
	public function edit_bus($id)
	{
	$sql3="SELECT * FROM bus WHERE bus_id='$id'";
	$res = mysqli_query($this->db,$sql3);
	return $res;
	}
	public function update_bus($id,$bus_name,$bus_number){
		
	$sql1="UPDATE bus SET bus_name='$bus_name',bus_number='$bus_number',totalSeats='$totalSeats' WHERE bus_id =".$id ;
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot Updated");
	return $result;
	}
	public function delete_bus($table,$id)
	{
		$sql3= "DELETE FROM $table WHERE bus_id=".$id;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	}
	

    public function getPickUpPointAll($id,$src,$des)
	{

	$sql3="SELECT * FROM bus_route where bus_id='$id' and bus_source='$src' and bus_dest='$des'";

	$result = mysqli_query($this->db,$sql3);


	  return $result ;
	}

	//End Bus
	//city
	public function add_city($city_name){
	$sql1="INSERT INTO city SET city_name='$city_name',city_status='1'";
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
	return $result;
	}
	public function list_city()
	{
	$sql3="SELECT * FROM city";
	$res = mysqli_query($this->db,$sql3);
	  return $res;
	}
	
	public function getBusList()
	{
	$sql3="SELECT * FROM bus";
	$res = mysqli_query($this->db,$sql3);
	  return $res;
	}
	
	public function edit_city($id)
	{
	$sql3="SELECT * FROM city WHERE city_id='$id'";
	$res = mysqli_query($this->db,$sql3);
	return $res;
	}
	public function update_city($id,$city_name){
		
	$sql1="UPDATE user SET city_name='$city_name' WHERE city_id =".$id ;
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot Updated");
	return $result;
	}
	public function delete_city($table,$id)
	{
		$sql3= "DELETE FROM $table WHERE city_id=".$id;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	}
	//end city
	//user
	public function add_user($u_name,$u_mob,$u_add,$u_pin){
		
	$sql1="INSERT INTO user SET u_name='$u_name',u_mob='$u_mob',u_add='$u_add',u_pin='$u_pin',u_status='1'";
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
	return $result;
	}
	public function list_user()
	{
	$sql3="SELECT * FROM user";
	$res = mysqli_query($this->db,$sql3);
	  return $res;
	}
	public function edit_user($id)
	{
	$sql3="SELECT * FROM user WHERE u_id='$id'";
	$res = mysqli_query($this->db,$sql3);
	return $res;
	}
	public function update_user($id,$u_name,$u_mob,$u_add,$u_pin){
		
	$sql1="UPDATE user SET u_name='$u_name',u_mob='$u_mob',u_add='$u_add',u_pin='$u_pin'WHERE u_id =".$id ;
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot Updated");
	return $result;
	}
	public function delete_user($table,$id)
	{
		$sql3= "DELETE FROM $table WHERE u_id=".$id;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	}
	//end user
	//Tour Package
	
	public function add_tour_pkg($pkg_passenger,$pkg_from,$pkg_to,$pkg_date){

	$sql1="INSERT INTO package SET pkg_passenger='$pkg_passenger',pkg_from='$pkg_from',pkg_to='$pkg_to',pkg_date='$pkg_date',pkg_status='1'";
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
	return $result;
	}
	public function list_tour_pkg()
	{
	$sql3="SELECT * FROM package";
	$res = mysqli_query($this->db,$sql3);
	  return $res;
	}
	public function edit_tour_pkg($id)
	{
	$sql3="SELECT * FROM package WHERE pkg_id='$id'";
	$res = mysqli_query($this->db,$sql3);
	return $res;
	}
	public function update_tour_package($id,$pkg_passenger,$pkg_from,$pkg_to,$pkg_date)
	 {
		$sql3= "UPDATE package SET pkg_passenger='$pkg_passenger',pkg_from='$pkg_from',pkg_to='$pkg_to',pkg_date='$pkg_date' WHERE pkg_id =".$id ;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	 }
	 public function delete_tour_package($table,$id)
	 {
		$sql3= "DELETE FROM $table WHERE pkg_id=".$id;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	 }
	//End Tour package

    
	
     // Add Routes

	public function addBusRoute($busSource,$busDes,$busPickup,$BusId,$source_time,$des_time){
	$sql1="INSERT INTO bus_route SET bus_source='$busSource',bus_dest='$busDes',bus_pickup='$busPickup',bus_id='$BusId',source_time='$source_time',des_time='$des_time',route_state='1'";
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
	return $result;
	}
	  public function listRoutes()
	{
	/*$sql3="SELECT  * From bus_route GROUP BY bus_id";*/
	$sql3="SELECT  * From bus_route GROUP BY bus_source,bus_dest";
	$res = mysqli_query($this->db,$sql3);
	  return $res;
	}
	 public function delete_busRoute($table,$id)
	 {
		$sql3= "DELETE FROM $table WHERE route_id=".$id;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	 }
	//end Bus route
	
	//Ticket Booking
	public function add_ticket_booking($b_passanger_name,$b_mob,$b_from,$b_to,$b_date,$b_date_of_jry,$b_fare,$b_dist,$b_bus_id){

	$sql1="INSERT INTO ticket_booking SET b_passanger_name='$b_passanger_name',b_mob='$b_mob',b_from='$b_from',b_to='$b_to',b_date='$b_date',b_date_of_jry='$b_date_of_jry',b_fare='$b_fare',b_dist='$b_dist',b_bus_id='$b_bus_id',b_status='1'";
	$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
	return $result;
	}
	public function list_ticket_booking()
	{
	$sql3="SELECT * FROM ticket_booking";
	$res = mysqli_query($this->db,$sql3);
	  return $res;
	}
	public function edit_ticket_booking($id)
	{
	$sql3="SELECT * FROM ticket_booking WHERE b_id='$id'";
	$res = mysqli_query($this->db,$sql3);
	return $res;
	}
	public function update_ticket_booking($id,$b_passanger_name,$b_mob,$b_from,$b_to,$b_date,$b_date_of_jry,$b_fare,$b_dist,$b_bus_id)
	 {
		$sql3= "UPDATE ticket_booking SET b_passanger_name='$b_passanger_name',b_mob='$b_mob',b_from='$b_from',b_to='$b_to',b_date='$b_date',b_date_of_jry='$b_date_of_jry',b_fare='$b_fare',b_dist='$b_dist',b_bus_id='$b_bus_id' WHERE b_id =".$id ;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	 }
	 public function delete_ticket_booking($table,$id)
	 {
		$sql3= "DELETE FROM $table WHERE b_id=".$id;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	 }
	//end Ticket Booking
	
	//view feedback
	public function view_feedback()
	{
	$sql3="SELECT * FROM feedback";
	$res = mysqli_query($this->db,$sql3);
	  return $res;
	}
	public function delete_viewFeedback($table,$id)
	{
		$sql3= "DELETE FROM $table WHERE feed_id=".$id;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	}
	 //end
	 
	//view Cancellation
	public function view_cancellation()
	{
	$sql3="SELECT c.*,u.u_name As uname FROM cancellation c,user u WHERE c.cancel_uid=u.u_id";
	$res = mysqli_query($this->db,$sql3);
	  return $res;
	}
	public function delete_cancellation($table,$id)
	{
		$sql3= "DELETE FROM $table WHERE cancel_id=".$id;
		$res = mysqli_query($this->db,$sql3);
		return $res;
	}
	//end
	 
	}//class closing
	
?>