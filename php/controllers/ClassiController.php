<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ClassiController{
    public function index(Request $request, Response $response, $args){
        $mysqli_connection = new \MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');

        // query per ottenere tutte le classi
        $result = $mysqli_connection->query("SELECT * FROM classi");
        $results = $result->fetch_all(MYSQLI_ASSOC);
        $response->getBody()->write(json_encode($results));

        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }

public function show(Request $request, Response $response, $args){
    $mysqli_connection = new \MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    
    $mioId = $args["id"];
    
    // query per selezionare classe tramite ID
    $result = $mysqli_connection->query("SELECT * FROM classi WHERE id = " . $mioId);
    $results = $result->fetch_all(MYSQLI_ASSOC);
    
    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
}

public function create(Request $request, Response $response, $args){
    $body = json_decode($request->getBody()->getContents(), true);
    $sezione = $body["sezione"];
    $anno = $body["anno"];
    
    $mysqli_connection = new \MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    
    // inserisce nuovo record nella tabella "classi"
    $result = $mysqli_connection->query("INSERT INTO classi (sezione, anno) VALUES ('$sezione', '$anno')");
    
    if($mysqli_connection->affected_rows > 0){
    $results = ["msg" => "ok"];
    $response->getBody()->write(json_encode($results));
    // restituisce 201 (Created)
    return $response->withHeader("Content-type", "application/json")->withStatus(201);
    }
    
    // in caso di errore, restituisce 400 (Bad Request)
    $results = ["msg" => "ko"];
    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(400);
}

public function update(Request $request, Response $response, $args){
    $body = json_decode($request->getBody()->getContents(), true);
    $sezione = $body["sezione"];
    $anno = $body["anno"];
    
    $mysqli_connection = new \MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    
    $mioId = $args["id"];
    
    // aggiornamento della classe con i nuovi valori forniti
    $result = $mysqli_connection->query("UPDATE classi SET sezione = '$sezione', anno = '$anno' WHERE id = " . $mioId);
    
    if($mysqli_connection->affected_rows > 0){
    $results = ["msg" => "ok"];
    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }
    
    $results = ["msg" => "ko"];
    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(400);
}

public function delete(Request $request, Response $response, $args){
    $mysqli_connection = new \MySQLi('my_mariadb', 'root', 'ciccio', 'scuola');
    
    $mioId = $args["id"];
    
    // query per eliminare il record relativo all'ID
    $result = $mysqli_connection->query("DELETE FROM classi WHERE id = " . $mioId);
    
    if($mysqli_connection->affected_rows > 0){
    $results = ["msg" => "ok"];
    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }

    $results = ["msg" => "ko"];
    $response->getBody()->write(json_encode($results));
    return $response->withHeader("Content-type", "application/json")->withStatus(400);
    }
    










}



?>
