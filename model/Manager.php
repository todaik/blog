<?php
class Manager
{

	protected function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE=>pdo::ERRMODE_EXCEPTION));
	    return $db;
	}
}