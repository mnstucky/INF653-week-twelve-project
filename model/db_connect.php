<?php
class Database
{
    private static $dsn = 'mysql:host=pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=ly1qha9dduvntk37';
    private static $username = 'tw73mwrxxzzv6dam';
    private static $password = 'qos03u1dnafuy1jm';
    private static $db;

    private function __construct()
    {
    }

    public static function getDB()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            } catch (PDOException $e) {
                $db_error_msg = $e->getMessage();
                include('../view/error.php');
                exit();
            }
        }
        return self::$db;
    }
}
