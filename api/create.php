<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With');

//initializing our api
include_once('../core/initialize.php');

//instantiation of post
$post = new Book($db);

$data = json_decode(file_get_contents('php://input'));
$post->name = $data->name;

if ($post->create()) {
    echo json_encode(array('message' => 'Post created successfully.'));
} else {
    echo json_encode(array('message' => 'Failed to create post.'));
}

