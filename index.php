<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

$page = $_GET['page'];

require_once "Controller/Controller.php";

$controller= new Controller();

if(!isset($page)){
    header('Location:index.php?page=user');
}

switch($page){
    case 'user':
        $controller->getAll();
        break;

    case 'showmoviesform':
        $controller->showInsertForm();
        break;
    case 'insertmovie':
        $controller->insertMovie();
        break;
    case 'insertactor':
        $controller->insertActors();
        break;
    case 'showactorsform':
        $controller->showInsertForm2();
        break;
    case 'insertactor':
        $controller->insertActors();
        break;
    case 'showactors':
        $controller->showActors();
        break;
    case 'showmovies':
        $controller->showMovies();
        break;
    case 'deletemovie':
        $controller->deleteMovies();
        break;
    case 'deleteactor':
        $controller->deleteAct();
        break;
    case 'updatemovie':
        $controller->updateMovie();
        break;
    case 'editmovie':
        $controller->editMovie();
        break;
    case 'editactor':
        $controller->editActor();
        break;
    case 'updateactor':
        $controller->updateActor();
        break;
        case 'updatepicture':
        $controller->showPictupt();
        break;
    default:
        die('404');
        break;
}

?>