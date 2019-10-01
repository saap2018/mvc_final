<?php

	require_once("../models/modelo.php");
    $services = new Parametros();
    $datos = $services->getParametros();
    require_once("../views/vista.php");
?>