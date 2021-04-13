<?php
require('./model/db_connect.php');
require('./model/vehicle_db.php');
require('./model/make_db.php');
require('./model/type_db.php');
require('./model/class_db.php');

$makes = MakeDB::get_makes();
$types = TypeDB::get_types();
$classes = ClassDB::get_classes();

if (!isset($sortMethod)) {
    $sortMethod = filter_input(INPUT_GET, 'sortMethod');
}

if (!isset($makeId)) {
    $makeId = filter_input(
        INPUT_GET,
        'makeId',
        FILTER_VALIDATE_INT
    );
}
if (!isset($typeId)) {
    $typeId = filter_input(
        INPUT_GET,
        'typeId',
        FILTER_VALIDATE_INT
    );
}
if (!isset($classId)) {
    $classId = filter_input(
        INPUT_GET,
        'classId',
        FILTER_VALIDATE_INT
    );
}
if ($makeId == NULL || $makeId == FALSE) {
    if ($typeId == NULL || $typeId == FALSE) {
        if ($classId == NULL || $classId == FALSE) {
            $vehicles = VehicleDB::get_all_vehicles($sortMethod);
        } else {
            $vehicles = VehicleDB::get_vehicles_by_class($classId, $sortMethod);
        }
    } else {
        $vehicles = VehicleDB::get_vehicles_by_type($typeId, $sortMethod);
    }
} else {
    $vehicles = VehicleDB::get_vehicles_by_make($makeId, $sortMethod);
}
include('./view/vehicle_list.php');
