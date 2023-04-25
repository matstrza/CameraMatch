<?php

// Class dedicated to the connection and connection configuration to the database.

class Db {
    private static $db = null;
    
    public static function getDb() {
        if(isset(self::$db)) {
            return self::$db;
        } else {
            return self::connect();
        }
    }
    
    protected static function connect () {
        try {
             
            $data = parse_ini_file("./.ini", $process_sections = true);
            $host = $data ['host'];
            $name = $data ['name'];
            $user = $data ['user'];
            $pass = $data ['pass'];
            $type = $data ['type'];
            self::$db = new PDO(
            "$type:host=$host;port=3306;dbname=$name",
            "$user",
            "$pass"
            );  
            return self::$db;
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getErrorMessage();
            die();
        }
    }
}