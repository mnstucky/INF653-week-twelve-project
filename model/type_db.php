<?php

class TypeDB
{
    public static function get_type_by_id($typeId)
    {
        $db = Database::getDB();
        $query = 'SELECT type FROM types WHERE id = :typeid';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeid', $typeId);
        $statement->execute();
        $typeArray = $statement->fetch();
        $statement->closeCursor();
        return $typeArray['type'];
    }

    public static function get_types()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM types';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    public static function add_type($type_name)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO types (type) VALUES (:typename)';
        $statement = $db->prepare($query);
        $statement->bindValue(':typename', $type_name);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function delete_type($typeId)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM types WHERE id = :typeid';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeid', $typeId);
        $statement->execute();
        $statement->closeCursor();
    }
}
