<?php

class Database{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;

	
	public $link;
	public $error;
	
	public function __construct(){
		$this -> connectDB();
	}
	
	private function connectDB(){
		$this ->link = new mysqli($this ->host , $this ->user, $this ->pass , $this ->dbname);
		
		if(!$this ->link){
			!$this ->error ="connection fail".!$this ->link ->connect_error;
			return false;
		}
	}
	
	//select or read data
	
	public function select($query){
		$result = $this ->link ->query($query) or die($this ->link ->error.__LINE__);	
		if($result ->num_rows >0){
			return $result;
		}else{
			return false;
		}
	}
	
	// insert data
	
	public function insert($query){
		$insert_raw = $this ->link ->query($query) or die($this ->link ->error.__LINE__);
		if($insert_raw){
			header("location:index.php?msg=".urlencode('data inserted successfully.'));
		}else{
			die("error :(".$this->link->errno.")".$this->link->error);
		}
	}
	
	//update data
	
	public function update($query){
		$update_raw = $this ->link ->query($query) or die($this ->link ->error.__LINE__);
		if($update_raw){
			header("location:index.php?msg=".urlencode('data updated successfully.'));
		}else{
			die("error :(".$this->link->errno.")".$this->link->error);
		}
	}
		
	//delete data
	
	public function deleteData($query){
		$delete_raw = $this ->link ->query($query) or die($this ->link ->error.__LINE__);
		if($delete_raw){
			header("location:index.php?msg=".urlencode('data deleted successfully.'));
		}else{
			die("error :(".$this->link->errno.")".$this->link->error);
		}
	}
}