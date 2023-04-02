<?php
    if (isset($_POST['confirmar'])) {
        $matricula = $_POST['matricula'];
    }    

    include 'sicea.php';

    confirmarEvasao($matricula);

?>