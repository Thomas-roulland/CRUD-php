<?php 

require_once "../BDD/db.php";
require_once "function.php";



$cmd_connect = connect('groups');
$cmd = create("Organization", $_POST);
if(isset($_POST['name']) and isset($_POST['domain']) and isset($_POST['aliases']) and !empty($_POST['name'])) {
try {
    if(connect('groups')->exec($cmd) == 1) {
        ?> <h1 class='success'><i class='fas fa-check'></i> Organisation ajoutée <br></h1>
    <?php }
} catch(\PDOException $e) {
?>
    <h1 class='error'><i class='fas fa-times'></i> Impossible d'ajouter l'organisation</h1>
<?php }
}


$cmd_connect1 = connect('groups');
$cmd1 = create("User", $_POST);
if(isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['idOrganization']) and !empty($_POST['firstname'])) {
try {
    if(connect('groups')->exec($cmd1) == 1) {
        ?> <h1 class='success'><i class='fas fa-check'></i> User ajoutée <br></h1>
    <?php }
} catch(\PDOException $e) {
?>
    <h1 class='error'><i class='fas fa-times'></i> Impossible d'ajouter l'organisation</h1>
<?php }
}


if($_GET['id'])
$id=$_GET['id'];
$cmd_connect1 = connect('user');
$cmd1 = Delete("user", $id);

    try {
    if(connect('groups')->exec($cmd1) == 1) {
        ?> <h1 class='success'><i class='fas fa-check'></i> Suppression réussi <br></h1>
        <?php }
    }catch(\PDOException $e) {
    ?>
    <h1 class='error'><i class='fas fa-times'></i> Impossible de supprimer</h1>
    <?php }
  



if($_GET['id'])
$id=$_GET['id'];
$cmd_connect1 = connect('groups');
$cmd1 = Delete("Organization", $id);

    try {
    if(connect('groups')->exec($cmd1) == 1) {
        ?> <h1 class='success'><i class='fas fa-check'></i> Suppression réussi <br></h1>
        <?php }
    }catch(\PDOException $e) {
    ?>
    <h1 class='error'><i class='fas fa-times'></i> Impossible de supprimer</h1>
    <?php }


$page=$_GET['page'];
if($page==1){
    header('location:../index.php?page=1');
}else{
    header('location:../index.php?page=2');
}
    

