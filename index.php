<?php
error_reporting(E_ALL);

// namespace and autoloaders
use Khrigo\Face\FaceDetection as FaceDetection;
require_once __DIR__ . '/vendor/autoload.php';

$image = array(
	'url' => '',
);

// detect face
$face = new FaceDetection($image);
$result = $face->setAttributes(['gender'])->getFaces();

die(var_dump($result));
