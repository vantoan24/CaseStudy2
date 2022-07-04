<?php
session_start();
include './db.php';
$controller = $_REQUEST['controller'];
$action = $_REQUEST['action'];
switch($controller){
    case 'Note':
    include_once './Controllers/NotesController.php';
    $objController = new NoteController();
    break; 
    case 'Notetype':
    include_once './Controllers/NotetypeController.php';
    $objController = new NotetypeController();
    break; 
    case 'Admin':
    $objController = new AdminController();
    include_once './Controllers/UserController.php';
    break; 
    default:
    $objController = new NotetypeController();
    include_once './Controllers/NotetypeController.php';
}

switch ($action){
    case 'index':
         $objController->index();
         break;
    //   
    case 'add':
        $objController->add();
        break;
    //
    case 'edit':
        $objController->edit();
        break;
    //
    case 'delete':
        $objController->delete();
        break;
    case 'show':
        $objController->show();
        break;
    case 'search':
        $objController->search();
        break;
    // case 'pageno':
    //     $objController->page();
    //     break;
     
    // case 'sortasc':
    //     $objController->sort_asc();
    //     break;
    default:
        $objController->index();
        break;
}