<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initializing our api
include_once('../core/initialize.php');

//instantiation of post
$post = new Book($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();
//$post->id = '1';

$post->read_single();
//if ($post->read_single()) {
    $post_arr = array(
        'id' => $post->id,
        'name' => $post->name
    );

    echo(json_encode($post_arr));
//} else {
//    echo(json_encode(array('message' => sprintf('No post for id %s exists', $post->id))));
//}