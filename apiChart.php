<?php
include_once "core.php";

use Classes\Apis\Api;
use Classes\Coachs\Coach;

$chartType = isset($_GET['chart']) ? $_GET['chart'] : null;

if ($chartType == 'bar') {
    $api = new Api();
    $response = $api->chart();
} elseif ($chartType == 'pie') {
    $coach = new Coach;
    $coachs = $coach->getAllCoache();
    $coachsActifs = $coach->getActifUsers('coach');
    $clientsActifs = $coach->getActifUsers('client');
    $coachsInActif = count($coachs);
    $response = array("nb_client" => $clientsActifs->clients, "nb_coach_inAct" => $coachsInActif, "nb_coach_act" => $coachsActifs->coachs);
} else {
    $response = array('error' => 'Type de graphique non valide');
}

header('Content-Type: application/json');
echo json_encode($response);
