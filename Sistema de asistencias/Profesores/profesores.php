<?php

    session_start();

    $rowuser = $_SESSION['rowuser'];
    $rowprofesor = $_SESSION['rowprofesor'];

    echo $rowprofesor['nombre'].$rowprofesor['apellido'].$rowprofesor['dni'].$rowprofesor['legajo'];