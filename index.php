<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';

$mysql_db = 'ajax';

$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass) ;

class ServerException extends Exception{
	public function showSpecific(){
		return 'Error thrown on line '.$this->getLine(). ' in '.$this->getFile();
	}
}
class DatabaseException extends Exception{
	public function showSpecific(){
		return 'Error thrown on line '.$this->getLine(). ' in '.$this->getFile();
	}
}

try{
	
	if (!@$link){
		
		throw new ServerException();
		
	} else if (!@mysqli_select_db($link, $mysql_db)){
		
		throw new DatabaseException();
		
	} else {
		echo 'Connected.';
	}
	
} catch (ServerException $ex) {
	
	echo $ex->showSpecific();
	
} catch (DatabaseException $ex) {
	
	echo $ex->showSpecific();
	
}

?> 
