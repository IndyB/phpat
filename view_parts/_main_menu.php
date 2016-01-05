<?php
$menu_data = array(
    'Accueil' => 'index.php',
    'Contact' => 'contact.php',
    'Inscription' => 'inscription.php',
    'Dashboard' => 'dashboard.php',
);



echo '<ul>';

    foreach($menu_data as $key => $value)
    {
    echo '<li class="menu"><a href="'.$value.'">'.$key.'</a></li>' ;
    }

echo '</ul>';
