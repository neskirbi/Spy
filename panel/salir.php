<?php

session_start();

// Destruir todas las variables de sesión.
$_SESSION = array();
session_destroy();

?>
<script type="text/javascript">
	location.href =window.location.origin;
</script>