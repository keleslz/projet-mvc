<?php 
    require_once '../lib/functions.php';
    require_once ROOT .'class/session/Session.php'; 
    require_once ROOT .'class/model/UserModel.php'; 


$session = new Session();
$userModel = new UserModel();

$id = $session->get('_userStart');
$name = $userModel->findName($id)[0];

require_once ROOT .'partials/header.php'; 
?>

<h1>Accueil</h1>


<h2>Bienvenue <span style="text-decoration:underline"><?= ucfirst($name) ?></span></h2>

<?php require_once ROOT .'partials/footer.php'; ?>