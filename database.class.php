<?php

/**
* Database Connection
*
*/
class DB {

	protected static $instance;

	protected function __construct() {}

    /**
     * Creating Instance
     */
	public static function getInstance() {

		if(empty(self::$instance)) {

			$db_info = array(
				"db_host" => "localhost",
				"db_port" => "3306",
				"db_user" => "kaveri_groups",
				"db_pass" => "Q0ru2@123",
				"db_name" => "kaveri_api",
				"db_charset" => "UTF-8");

			try {
				self::$instance = new PDO("mysql:host=".$db_info['db_host'].';port='.$db_info['db_port'].';dbname='.$db_info['db_name'], $db_info['db_user'], $db_info['db_pass']);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);  
				self::$instance->query('SET NAMES utf8');
				self::$instance->query('SET CHARACTER SET utf8');

			} catch(PDOException $error) {
				echo $error->getMessage();
			}

		}

		return self::$instance;
	}

    /**
     * Set encoding
     */
	public static function setCharsetEncoding() {
		if (self::$instance == null) {
			self::connect();
		}

		self::$instance->exec(
			"SET NAMES 'utf8';
			SET character_set_connection=utf8;
			SET character_set_client=utf8;
			SET character_set_results=utf8");
    }
    
    // Begin Transection 
    public static function beginTransaction() {
		return self::$instance->beginTransaction();
    }
    

    // Commit
    public static function commit() {
		return self::$instance->commit();
    }    

    // Excecute
    public  static function exec($statement) {
    	return self::$instance->exec($statement);
    }

    public  static function getAttribute($attribute) {
    	return self::$instance->getAttribute($attribute);
    }
}

?>