<?php
$menu_data = array(
    'Accueil' => 'index.php',
    'Contact' => 'contact.php',
    'Inscription' => 'inscription.php',
    'Dashboard' => 'dashboard.php',
);


?>
<ul>
    <?php
    foreach($menu_data as $key => $value)
    {
    echo '<li><a href="'.$value.'">'.$key.'</a></li>' ;
    }
    ?>
</ul>
