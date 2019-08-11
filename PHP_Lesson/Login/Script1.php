<?php
require_once "../../vendor/autoload.php";
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$secret_key = "YOUR_SECRET_KEY";
$issuer_claim = "THE_ISSUER"; // this can be the servername
$audience_claim = "THE_AUDIENCE";
$issuedat_claim = time(); // issued at
$notbefore_claim = $issuedat_claim + 10; //not before in seconds
$expire_claim = $issuedat_claim + 60*60; // expire time in seconds
$token = array(
    "iss" => $issuer_claim,
    "aud" => $audience_claim,
    "iat" => $issuedat_claim,
    "nbf" => $notbefore_claim,
    "exp" => $expire_claim,
    "data" => array(
        "firstname" => $_POST["user"],
        "lastname" => $_POST["password"],
));
http_response_code(200);

//$jwt = JWT::encode($token, $secret_key);
/*echo json_encode(
    array(
        "message" => "Successful login.",
        "jwt" => $jwt,
        "email" => $email,
        "expireAt" => $expire_claim
    ));*/

$decoded = JWT::decode("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUSEVfSVNTVUVSIiwiYXVkIjoiVEhFX0FVRElFTkNFIiwiaWF0IjoxNTY1NDIxOTMwLCJuYmYiOjE1NjU0MjE5NDAsImV4cCI6MTU2NTQyNTUzMCwiZGF0YSI6eyJmaXJzdG5hbWUiOiJhc2QiLCJsYXN0bmFtZSI6ImFzZCJ9fQ.s0ddYmY07G_ImpoNJvdS5mxQE8FqoTkjtBFI06VazE8", $secret_key, array('HS256'));

echo json_encode($decoded);
?>