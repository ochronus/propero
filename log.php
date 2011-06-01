<?php
require_once('propero_config.php');

$mongo_db = new Mongo(PROPERO_MONGODB_URI);
$coll = $mongo_db->selectCollection(PROPERO_MONGO_DB, 'propero_log');

$url = $_REQUEST['url'];
$timing = json_decode($_REQUEST['timing'], true);

$data = array();
$data['timing'] = $timing;
$data['time'] = time();
$data['url'] = $url;

$coll->insert($data);

?>