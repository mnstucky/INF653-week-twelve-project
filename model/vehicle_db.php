<?php

class VehicleDB
{
    public static function get_all_vehicles($sortMethod)
    {
        $db = Database::getDB();
        if ($sortMethod == 'year') {
            $query = 'SELECT * FROM vehicles ORDER BY year DESC';
        } else {
            $query = 'SELECT * FROM vehicles ORDER BY price DESC';
        }
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    public static function get_vehicles_by_make($makeId, $sortMethod)
    {
        $db = Database::getDB();
        if ($sortMethod == 'year') {
            $query = 'SELECT * FROM vehicles WHERE make_id = :makeid ORDER BY year DESC';
        } else {
            $query = 'SELECT * FROM vehicles WHERE make_id = :makeid ORDER BY price DESC';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':makeid', $makeId);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    public static function get_vehicles_by_type($typeId, $sortMethod)
    {
        $db = Database::getDB();
        if ($sortMethod == 'year') {
            $query = 'SELECT * FROM vehicles WHERE type_id = :typeid ORDER BY year DESC';
        } else {
            $query = 'SELECT * FROM vehicles WHERE type_id = :typeid ORDER BY price DESC';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':typeid', $typeId);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    public static function get_vehicles_by_class($classId, $sortMethod)
    {
        $db = Database::getDB();
        if ($sortMethod == 'year') {
            $query = 'SELECT * FROM vehicles WHERE class_id = :classid ORDER BY year DESC';
        } else {
            $query = 'SELECT * FROM vehicles WHERE class_id = :classid ORDER BY price DESC';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':classid', $classId);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    public static function add_vehicle($makeId, $typeId, $classId, $year, $model, $price)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO vehicles (make_id, type_id, class_id, year, model, price) VALUES (:makeId, :typeId, :classId, :year, :model, :price)';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeId', $makeId);
        $statement->bindValue(':typeId', $typeId);
        $statement->bindValue(':classId', $classId);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function delete_vehicle($vehicle_id_to_delete)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM vehicles WHERE vehicleid = :vehicle_id_to_delete';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id_to_delete', $vehicle_id_to_delete);
        $statement->execute();
        $statement->closeCursor();
    }
}
