<div class='page'>
<?php

session_start();

unset($_SESSION['username']);

session_destroy();

echo "
<script>
    document.location = 'index.php'
</script>";


?>



</div>