<?php

switch ($action) {
    case 'show_types_form':
        include('./view/type_list.php');
        break;
    case 'add_type':
        TypeDB::add_type($new_type);
        header('Location: .?action=show_types_form');
        break;
    case 'delete_type':
        TypeDB::delete_type($type_id_to_delete);
        header('Location: .?action=show_types_form');
        break;
}
