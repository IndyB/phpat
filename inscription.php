<?php
require_once '_defines.php';
require_once  'data/_main_data.php';
$site_data[PAGE_ID] = 'Inscription';
require_once 'view_parts/_page_base.php';

?>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<div id="main">
<?php
require_once 'view_parts/_inscription_form.php';
?>
</div>
<?php
require_once 'view_parts/_page_bottom.php';
?>

