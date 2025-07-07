<?php
require_once "DB.php";
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$queryHandler = new QueryHandler(true);

switch($data['action']){
    case 'test':
        $response = $queryHandler->verifyCredentials($data['username'], $data['password']);
        if ( $response )
            try{
                $user = new UserSession($response[2],$response[1],[]);
                echo true;
            }catch(error){
                echo $error;
            }
        else
            echo $response;
    break;
    case 'closeSession':
        try{
            $user = new UserSession('','',[]);
            $user->endSession();
            echo true;
        }catch(error){
            echo $error;
        }
}


?>