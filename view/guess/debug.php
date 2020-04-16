<?php

namespace Anax\View;

/**
 * Template file to render a view with content.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?>
<hr>
<pre>
SESSION
<?= var_dump($_SESSION) ?>
POST
<?= var_dump($_POST) ?>
GET
<?= var_dump($_GET) ?>
</pre>
<hr>
