<?php
error_reporting(E_ALL);

// namespace and autoloaders
use Khrigo\Face\FaceDetection as FaceDetection;
require_once __DIR__ . '/vendor/autoload.php';

$image = array(
	'url' => 'https://pp.vk.me/c630423/v630423300/25878/bWcvvvZgGoQ.jpg',
);

// detect face
$face = new FaceDetection($image);
$face->setAttributes(['gender'])->getFaces();
