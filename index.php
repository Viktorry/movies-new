<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

$page = $_GET['page'];

require_once "Controller/Controller.php";

$controller= new Controller();
$upl= new UploadVideo();
$uplPic= new UploadPicture();

if(!isset($page)){
    header('Location:index.php?page=showhomepage');
}

switch($page){
    case 'user':
        $controller->getAll();
        break;

    case 'showmoviesform':
        $controller->showInsertForm();
        break;
    case 'showadminspage':
        $controller->showAdminPage();
        break;
    case 'insertmovie':
        $controller->insertMovie();
        break;
    case 'insertgenre':
        $controller->insertGenre();
        break;
    case 'insertactor':
        $controller->insertActors();
        break;
    case 'showactorsform':
        $controller->showActorsInsertForm();
        break;
    case 'showActors':
        $controller->showActortable();
        break;
    case 'showUsers':
        $controller->showUserstable();
        break;
    case 'showMovies':
        $controller->showMovietable();
        break;
    case 'showGenres':
        $controller->showGenretable();
        break;
    case 'showgenres':
        $controller->showGenres();
        break;
    case 'showmovies':
        $controller->showMovies();
        break;
    case 'deletemovie':
        $controller->deleteMovies();
        break;
    case 'deleteactor':
        $controller->deleteActor();
        break;
    case 'deletegenre':
        $controller->deleteActor();
        break;
    case 'updatemovie':
        $controller->updateMovie();
        break;
    case 'updategenre':
        $controller->updateGenres();
        break;
    case 'editmovie':
        $controller->editMovie();
        break;
    case 'editactor':
        $controller->editActor();
        break;
    case 'editgenre':
        $controller->editGenre();
        break;
    case 'updateactor':
        $controller->updateActor();
        break;
    case 'jsonMovies':
        $controller->showMoviesJson();
        break;
    case 'jsonActors':
        $controller->showActorsJson();
        break;
    case 'jsonGenres':
        $controller->showGenresJson();
        break;
    case 'jsonUsers':
        $controller->showUsersJson();
        break;
    case 'updatepicture':
        $controller->showPictupt();
        break;
    case 'showgenresform':
        $controller->showGenresForm();
        break;
    case 'insertagm':
        $controller->insertagm();
        break;
    case 'login':
        $controller->Login();
        break;
    case 'register':
        $controller->Register();
        break;
    case 'logout':
        $controller->Logout();
        break;
    case 'uplvideo':
        $upl->UplVid();
        break;
    case 'uploadpicture':
        $uplPic->UplPic();
        break;
    case 'usershomepage':
        $controller->showUsersHomePage();
        break;
    case 'showhomepage':
        $controller->showHomePage();
        break;
    case 'showadminspage':
        $controller->showAdminPage();
        break;
    case 'showadminshomepage':
        $controller->showAdminsHomePage();
        break;
    default:
        die('404');
        break;
}

?>