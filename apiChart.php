<?php

include_once "core.php";

use Classes\Apis\Api;
use Classes\Coachs\Coach;

if ($_GET['chart'] == 'bar') {
    $api = new Api();
    $respons = $api->chart();

    header('Content-Type: application/json');
    echo json_encode($respons);
}

if ($_GET['chart'] == 'pie') {
    $coach = new Coach;
    $coachs = $coach->getAllCoache();
    $coachsActifs = $coach->getActifUsers('coach');
    $clientsActifs = $coach->getActifUsers('client');
    $coachsInActif = count($coachs);
    $respons = array("nb_client" => $clientsActifs->clients , "nb_coach_inAct" => $coachsInActif , "nb_coach_act" => $coachsActifs->coachs);

    header('Content-Type: application/json');
    echo json_encode($respons);
}
