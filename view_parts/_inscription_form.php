<?php
/**
 * Created by PhpStorm.
 * User: indatou
 * Date: 2015-12-17
 * Time: 12:25 PM
 */

$in_post = array_key_exists('register',$_POST);//En est en reception

$nom_ok = false;
$nom_msg = '';
if(array_key_exists('nom',$_POST)){
    $nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_MAGIC_QUOTES);
    $nom = filter_var($nom,FILTER_SANITIZE_STRING);

    $nom_ok = (1 === preg_match('/^[A-Za-z]{2,}$/',$nom));
    if(! $nom_ok){
        $nom_msg = 'Le nom doit contener au minimum 2 lettres majuscules ou non';
    }

}

$prenom_ok = false;
$prenom_msg = '';//Message de feedbak validation, affiché sinon vide
if(array_key_exists('prenom',$_POST)){
    $prenom = filter_input(INPUT_POST,'prenom',FILTER_SANITIZE_MAGIC_QUOTES);
    $prenom = filter_var($prenom,FILTER_SANITIZE_STRING);

    $prenom_ok = (1 === preg_match('/^[A-Za-z]{4,}$/',$prenom));

    if(! $prenom_ok) {
        $prenom_msg = 'Le prénom doit contenir au minimum 4 lettres majuscules ou non';

    }
}
$username_ok = false;
$username_msg = '';
if(array_key_exists('nomutilisateur',$_POST)){
    $username = filter_input(INPUT_POST,'nomutilisateur',FILTER_SANITIZE_MAGIC_QUOTES);
    $username = filter_var($username,FILTER_SANITIZE_STRING);

    $username_ok = (1 === preg_match('/^[A-Za-z0-9]{6,}$/',$username));
    if(! $username_ok){
    $username_msg = "Le nom d'utilisateur doit contenir au minimum 6 caractères comprenants des lettres en majuscules ou non et des chiffres";
    }

}

$password_ok = false;
$password_msg = '';
if(array_key_exists('password',$_POST)){
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_MAGIC_QUOTES);
    $password = filter_var($password,FILTER_SANITIZE_STRING);

    $password_ok = (1 === preg_match('/^[A-Za-z]{8,}$/',$password));
    if(! $password_ok){
    $password_msg = 'Le mot de passe doit contenir au minimum 8 caractères comprenants des lettres majuscules ou non';
    }

}

$courriel_ok = false;
$courriel_msg = '';
if(array_key_exists('courriel',$_POST)){
    $courriel = filter_input(INPUT_POST,'courriel',FILTER_SANITIZE_MAGIC_QUOTES);
    $courriel = filter_var($courriel,FILTER_SANITIZE_STRING);
    $courriel = filter_var($courriel,FILTER_VALIDATE_EMAIL);

    $courriel_ok = (false != $courriel);//si le courriel est true alors courriel_ok prend true
    if(! $courriel_ok){
    $courriel_msg = 'Veuillez entrer un courriel valide svp';
    }

}

if($nom_ok & $prenom_ok & $username_ok & $password_ok & $courriel_ok)
{
    header('Location: index.php');
    exit;
}

?>
<form name="inscription" action="inscription.php" method="post" >
    <ul>
        <li class="form"><label class="inscription" for="nom">Nom :</label>
            <input type="text" name="nom" id="nom"
                   class="<?php echo $in_post && !$nom_ok ? 'error' : '' ?>"
                   value="<?php echo array_key_exists('nom',$_POST) ? $_POST['nom'] : ''; ?>"/>
            <span class="msg_erreur"><?php echo $nom_msg ?></span>
        </li>
        <li class="form"><label class="inscription" for="prenom">Prenom :</label>
            <input type="text" name="prenom" id="prenom"
                   class="<?php echo $in_post && !$prenom_ok ? 'error' : '' ?>"
                   value="<?php echo array_key_exists('prenom',$_POST) ? $_POST['prenom'] : ''; ?>"/>
        <span class="msg_erreur"><?php echo $prenom_msg ?></span>
        </li>
        <li class="form"><label class="inscription" for="nomutilisateur">Nom d'utilisateur :</label>
            <input type="text" name="nomutilisateur" id="nomutilisateur"
                   class="<?php echo $in_post && !$username_ok ? 'error' : '' ?>"
                   value="<?php echo array_key_exists('nomutilisateur',$_POST) ? $_POST['nomutilisateur'] : ''; ?>"/>
            <span class="msg_erreur"><?php echo $username_msg ?></span>
        </li>
        <li class="form"><label class="inscription" for="password">Password :</label>
            <input type="password" name="password" id="password"
                   class="<?php echo $in_post && !$password_ok ? 'error' : '' ?>"
                   value=""/>
            <span class="msg_erreur"><?php echo $password_msg ?></span>
        </li>
        <li class="form"><label class="inscription" for="courriel">Courriel :</label>
            <input type="text" name="courriel" id="courriel"
                   class="<?php echo $in_post && !$courriel_ok ? 'error' : '' ?>"
                   value="<?php echo array_key_exists('courriel',$_POST) ? $_POST['courriel'] : ''; ?>"/>
            <span class="msg_erreur"><?php echo $courriel_msg ?></span>
        </li>
       <!-- <li class="formse">
            <label for="sexe">Sexe :</label>
            <label for="garcon">Garçon </label>
            <input type="radio" name="sexe" id="garcon" value="Garcon"/>
            <label for="fille">Fille </label>
            <input type="radio" name="sexe" id="fille" value="Fille"/></li>-->
        <li class="form"><input type="submit" id="submit" name="register" value="Soumettre"/></li>
    </ul>
</form>
