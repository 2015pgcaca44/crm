<?php
require __DIR__ . '/vendor/autoload.php';

use FacebookAds\Object\Page;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;

$access_token = '<ACCESS_TOKEN>';
$app_secret = '<APP_SECRET>';
$app_id = '<APP_ID>';
$id = '<PAGE_ID>';

$api = Api::init($app_id, $app_secret, $access_token);
$api->setLogger(new CurlLogger());

$fields = array(
);
$params = array(
  'subscribed_fields' => 'leadgen',
);
echo json_encode((new Page($id))->createSubscribedApp(
  $fields,
  $params
)->exportAllData(), JSON_PRETTY_PRINT);

?>