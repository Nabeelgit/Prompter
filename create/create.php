<?php
require '../vendor/autoload.php';
$conn = new MongoDB\Client("mongodb://localhost:27017");
$table = $conn->prompter->prompts;



if(isset($_POST['prompt']) && isset($_FILES['img'])){
    $name = $_POST['name'];
    $img = $_FILES['img'];
    $topics = $_POST['topics'];
    $prompt = $_POST['prompt'];
    $ext = pathinfo($img['name'], PATHINFO_EXTENSION);
    $rand = rand(10000000,100000000);
    while($table->findOne(['img' => "$rand.$ext"]) !== null){
        $rand = rand(10000000,100000000);
    }
    file_put_contents("../images/$rand.$ext", file_get_contents($img["tmp_name"]));
    $doc = array(
        'name' => $name,
        'topics' => $topics,
        'prompt' => $prompt,
        'img' => "$rand.$ext"
    );
    if($table->insertOne($doc)){
        echo '1';
    } else {
        echo '0';
    }
}
?>