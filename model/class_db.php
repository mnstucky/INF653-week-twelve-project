<?php

class ClassDB
{
    public static function get_class_by_id($classId)
    {
        $db = Database::getDB();
        $query = 'SELECT class FROM classes WHERE id = :classid';
        $statement = $db->prepare($query);
        $statement->bindValue(':classid', $classId);
        $statement->execute();
        $classArray = $statement->fetch();
        $statement->closeCursor();
        return $classArray['class'];
    }

    public static function get_classes()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM classes';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    public static function add_class($class_name)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO classes (class) VALUES (:classname)';
        $statement = $db->prepare($query);
        $statement->bindValue(':classname', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function delete_class($classId)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM classes WHERE id = :classid';
        $statement = $db->prepare($query);
        $statement->bindValue(':classid', $classId);
        $statement->execute();
        $statement->closeCursor();
    }
}
