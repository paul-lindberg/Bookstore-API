<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initializing our api
include_once('../core/initialize.php');

//instantiation of post
$post = new Book($db);

//post query
$result = $post->read();

//var_dump($result);
$num = $result->rowCount();

if($num > 0) {
    $post_arr = array();
    $post_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        //process each row into the post data
        extract($row);
        $post_item = array(
            'id' => $id,
            'name' => $name
        );
        $post_arr['data'][] = $post_item;
    }
    //convert to JSON and then output
    echo json_encode($post_arr);
} else {
    echo json_encode(array('message' => 'No posts found.'));
}