<?php
namespace Ordrs;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '../generated-conf/config.php';

use Orders\Api;

$req_type = $_SERVER["REQUEST_METHOD"];
switch ($req_type) {
  case 'GET':
      $api_client = new Api();
      $api_client->get_orders($_REQUEST);
      break;
  case 'POST':
      $api_client = new Api();
      $api_client->create_order($_REQUEST);
      break;
  case 'PATCH':
      $api_client = new Api();
      $api_client->update_order($_REQUEST);
      break;

  default:
    echo "Undefined Operation";
    break;
}
?>
