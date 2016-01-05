<?php
/**
 * Created by PhpStorm.
 * User: indatou
 * Date: 2015-12-17
 * Time: 12:25 PM
 */

$nom_ok = false;

if(array_key_exists('nom',$_POST)){
    $nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_MAGIC_QUOTES);
    $nom = filter_var($nom,FILTER_SANITIZE_STRING);

    $nom_ok = (1 === preg_match('/^[A-Za-z]{2,}$/',$nom));
    var_dump($nom_ok);
}

$prenom_ok = false;

if(array_key_exists('prenom',$_POST)){
    $prenom = filter_input(INPUT_POST,'prenom',FILTER_SANITIZE_MAGIC_QUOTES);
    $prenom = filter_var($nom,FILTER_SANITIZE_STRING);

    $prenom_oknom_ok = (1 === preg_match('/^[A-Za-z]{4,}$/',$prenom));
    var_dump($prenom_ok);
}
$username_ok = false;

if(array_key_exists('nomutilisateur',$_POST)){
    $username = filter_input(INPUT_POST,'nomutilisateur',FILTER_SANITIZE_MAGIC_QUOTES);
    $username = filter_var($username,FILTER_SANITIZE_STRING);

    $username_ok = (1 === preg_match('/^[A-Za-z0-9]{6,}$/',$username));
    var_dump($username_ok);
}

$password_ok = false;

if(array_key_exists('password',$_POST)){
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_MAGIC_QUOTES);
    $password = filter_var($password,FILTER_SANITIZE_STRING);

    $password_ok = (1 === preg_match('/^[A-Za-z]{8,}$/',$password));
    var_dump($password_ok);
}

$courriel_ok = false;

if(array_key_exists('courriel',$_POST)){
    $courriel = filter_input(INPUT_POST,'courriel',FILTER_SANITIZE_MAGIC_QUOTES);
    $courriel = filter_var($courriel,FILTER_SANITIZE_STRING);
    $courriel = filter_var($courriel,FILTER_VALIDATE_EMAIL);

    $courriel_ok = (false != $courriel);//si le courriel est true alors courriel_ok prend true
    var_dump($courriel_ok);
}

if($nom_ok & $prenom_ok & $username_ok & $password_ok & $courriel_ok)
{
    header('Location: index.php');
    exit;
}

?>
<form action="inscription.php" method="post">
    <ul>
        <li class="form"><label class="inscription" for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php echo array_key_exists('nom',$_POST) ? $_POST['nom'] : ''; ?>"/></li>
        <li class="form"><label class="inscription" for="prenom">Prenom :</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo array_key_exists('prenom',$_POST) ? $_POST['prenom'] : ''; ?>"/></li>
        <li class="form"><label class="inscription" for="nomutilisateur">Nom d'utilisateur :</label>
            <input type="text" name="nomutilisateur" id="nomutilisateur" value="<?php echo array_key_exists('nomutilisateur',$_POST) ? $_POST['nomutilisateur'] : ''; ?>"/></li>
        <li class="form"><label class="inscription" for="password">Password :</label>
            <input type="password" name="password" id="password" value=""/></li>
        <li class="form"><label class="inscription" for="courriel">Courriel :</label>
            <input type="text" name="courriel" id="courriel" value="<?php echo array_key_exists('courriel',$_POST) ? $_POST['courriel'] : ''; ?>"/></li>
       <!-- <li class="formse">
            <label for="sexe">Sexe :</label>
            <label for="garcon">Garçon </label>
            <input type="radio" name="sexe" id="garcon" value="Garcon"/>
            <label for="fille">Fille </label>
            <input type="radio" name="sexe" id="fille" value="Fille"/></li>-->
        <li class="form"><input type="submit" id="submit" name="submit" value="Soumettre"/></li>
    </ul>
</form>
