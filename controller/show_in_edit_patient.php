<?php

require_once '../conection/conection.php';

if (session_status() !== PHP_SESSION_NONE) {
    require_once '../model/show_date_edit_perfil_patient.php';
}
