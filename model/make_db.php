<?php

class MakeDB
{
    public static function get_make_by_id($makeId)
    {
        $db = Database::getDB();
        $query = 'SELECT make FROM makes WHERE id = :makeid';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeid', $makeId);
        $statement->execute();
        $makeArray = $statement->fetch();
        $statement->closeCursor();
        return $makeArray['make'];
    }

    public static function get_makes()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM makes';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    public static function add_make($make_name)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO makes (make) VALUES (:makename)';
        $statement = $db->prepare($query);
        $statement->bindValue(':makename', $make_name);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function delete_make($makeId)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM makes WHERE id = :makeid';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeid', $makeId);
        $statement->execute();
        $statement->closeCursor();
    }
}
