<?php
require('../model/db_connect.php');
require('../model/vehicle_db.php');
require('../model/make_db.php');
require('../model/type_db.php');
require('../model/class_db.php');
require('../model/admin_db.php');

session_start();

$makes = get_makes();
$types = get_types();
$classes = get_classes();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
}

if (!isset($sortMethod)) {
    $sortMethod = filter_input(INPUT_GET, 'sortMethod');
}

switch ($action) {
    case 'list_vehicles':
        $makeId = filter_input(INPUT_GET, 'makeId', FILTER_VALIDATE_INT);
        $typeId = filter_input(INPUT_GET, 'typeId', FILTER_VALIDATE_INT);
        $classId = filter_input(INPUT_GET, 'classId', FILTER_VALIDATE_INT);
        include('./controller/vehicles.php');
        break;
    case 'show_add_vehicle_form':
        include('./controller/vehicles.php');
        break;
    case 'add_vehicle':
        $new_vehicle_make = filter_input(INPUT_POST, 'new_vehicle_make', FILTER_VALIDATE_INT);
        $new_vehicle_type = filter_input(INPUT_POST, 'new_vehicle_type', FILTER_VALIDATE_INT);
        $new_vehicle_class = filter_input(INPUT_POST, 'new_vehicle_class', FILTER_VALIDATE_INT);
        $new_vehicle_year = filter_input(INPUT_POST, 'new_vehicle_year', FILTER_VALIDATE_INT);
        $new_vehicle_model = filter_input(INPUT_POST, 'new_vehicle_model');
        $new_vehicle_price = filter_input(INPUT_POST, 'new_vehicle_price', FILTER_VALIDATE_INT);
        include('./controller/vehicles.php');
        break;
    case 'delete_vehicle':
        $vehicle_id_to_delete = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
        include('./controller/vehicles.php');
        break;
    case 'show_types_form':
        include('./controller/types.php');
        break;
    case 'add_type':
        $new_type = filter_input(INPUT_POST, 'new_type');
        include('./controller/types.php');
        break;
    case 'delete_type':
        $type_id_to_delete = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        include('./controller/types.php');
        break;
    case 'show_makes_form':
        include('./controller/makes.php');
        break;
    case 'add_make':
        $new_make = filter_input(INPUT_POST, 'new_make');
        include('./controller/makes.php');
        break;
    case 'delete_make':
        $make_id_to_delete = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        include('./controller/makes.php');
        break;
    case 'show_classes_form':
        include('./controller/classes.php');
        break;
    case 'add_class':
        $new_class = filter_input(INPUT_POST, 'new_class');
        include('./controller/classes.php');
        break;
    case 'delete_class':
        $class_id_to_delete = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        include('./controller/classes.php');
        break;
    case 'login':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        include('./controller/admin.php');
        break;
    case 'logout':
        include('./controller/admin.php');
        break;
    case 'show_login':
        include('./controller/admin.php');
        break;
    case 'show_register':
        include('./controller/admin.php');
        break;
    case 'register':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $confirm_password = filter_input(INPUT_POST, 'confirm_password');
        include('./controller/admin.php');
        break;

}
