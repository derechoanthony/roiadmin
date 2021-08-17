<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addBodyParsingMiddleware();

// This middleware will append the response header Access-Control-Allow-Methods with all allowed methods
$app->add(function (Request $request, RequestHandlerInterface $handler): Response {
    $routeContext = RouteContext::fromRequest($request);
    $routingResults = $routeContext->getRoutingResults();
    $methods = $routingResults->getAllowedMethods();
    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');

    $response = $handler->handle($request);

    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', implode(',', $methods));
    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);

    // Optional: Allow Ajax CORS requests with Authorization header
    // $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');

    return $response;
});

// The RoutingMiddleware should be added after our CORS middleware so routing is performed first
$app->addRoutingMiddleware();

// The routes
$app->get('/api/v0/users', function (Request $request, Response $response): Response {
    $response->getBody()->write('List all users');

    return $response;
});

$app->get('/api/v0/users/{id}', function (Request $request, Response $response, array $arguments): Response {
    $userId = (int)$arguments['id'];
    $response->getBody()->write(sprintf('Get user: %s', $userId));

    return $response;
});

$app->post('/api/v0/users', function (Request $request, Response $response): Response {
    // Retrieve the JSON data
    $parameters = (array)$request->getParsedBody();

    $response->getBody()->write('Create user');

    return $response;
});

$app->delete('/api/v0/users/{id}', function (Request $request, Response $response, array $arguments): Response {
    $userId = (int)$arguments['id'];
    $response->getBody()->write(sprintf('Delete user: %s', $userId));

    return $response;
});

// Allow preflight requests
// Due to the behaviour of browsers when sending a request,
// you must add the OPTIONS method. Read about preflight.
$app->options('/api/v0/users', function (Request $request, Response $response): Response {
    // Do nothing here. Just return the response.
    return $response;
});

// Allow additional preflight requests
$app->options('/api/v0/users/{id}', function (Request $request, Response $response): Response {
    return $response;
});

// Using groups
$app->group('/api/v0/users/{id:[0-9]+}', function (RouteCollectorProxy $group) {
    $group->put('', function (Request $request, Response $response, array $arguments): Response {
        // Your code here...
        $userId = (int)$arguments['id'];
        $response->getBody()->write(sprintf('Put user: %s', $userId));

        return $response;
    });

    $group->patch('', function (Request $request, Response $response, array $arguments): Response {
        $userId = (int)$arguments['id'];
        $response->getBody()->write(sprintf('Patch user: %s', $userId));

        return $response;
    });

    // Allow preflight requests
    $group->options('', function (Request $request, Response $response): Response {
        return $response;
    });
});






// /**
//  * List
//  */
$app->get('/api/v0/company/all', function (Request $request,Response  $response, $args) {
    $sql = "select `company_id`,`company_name`, `company_alias`, `active`, `created_dt`,  `licenses`,   `contract_start`, `contractFiles`,`contract_end`,`notes`, `structures`,`created_dt` from roi_companies;";
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'roi';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($mysqli->connect_errno ) {
       printf("Connect failed: %s<br />", $mysqli->connect_error);
       exit();
    }
    $query = $mysqli->query($sql);
    if ($query) {
        while($obj = $query->fetch_object()){
            $data[]=[
                "company_id"=>$obj->company_id,
                "company_name"=>$obj->company_name,
                "company_alias"=>$obj->company_alias,
                "active"=>$obj->active,
                "created_dt"=>$obj->created_dt,
                "licenses"=>$obj->licenses,
                "contract_start"=>$obj->contract_start,
                "contractFiles"=>$obj->contractFiles,
                "contract_end"=>$obj->contract_end,
                "notes"=>$obj->notes,
                "structures"=>$obj->structures,
            ];
        }
        $response->getBody()->write((string)json_encode(
            ["data"=>[$data],"success"=>"true","message"=>"ok"]));
     }
     if ($mysqli->errno) {
        $response->getBody()->write((string)json_encode(
            ["data"=>[],"success"=>"false","message"=>"Could not insert record into table:  $mysqli->error"]));
     }
     $mysqli->close();
     $response->withHeader('Access-Control-Allow-Origin', '*');
    return $response;
});


//get structures
$app->get('/api/v0/structure/all', function (Request $request,Response  $response, $args) {
    $sql = "select `structure_id`,`structure_title` from roi_company_structures;";
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'roi';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($mysqli->connect_errno ) {
       printf("Connect failed: %s<br />", $mysqli->connect_error);
       exit();
    }
    $query = $mysqli->query($sql);
    if ($query) {
        while($obj = $query->fetch_object()){
            $data[]=[
                "data"=>$obj->structure_id,
                "value"=>$obj->structure_title
            ];
        }
        $response->getBody()->write((string)json_encode(
            ["data"=>[$data],"success"=>"true","message"=>"ok"]));
     }
     if ($mysqli->errno) {
        $response->getBody()->write((string)json_encode(
            ["data"=>[],"success"=>"false","message"=>"Could not insert record into table:  $mysqli->error"]));
     }
     $mysqli->close();
     $response->withHeader('Access-Control-Allow-Origin', '*');
    return $response;
});

$app->run();