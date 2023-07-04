<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require '../vendor/autoload.php';
    $conn = new MongoDB\Client("mongodb://localhost:27017");
    $table = $conn->prompter->prompts;
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    } else {        
        header('Location: ../');
    }
    $match = $table->findOne(['id' => intval($id)]);
    $name = null;
    $prompt = null;
    $topics = [];
    $img = '';
    if($match === null){
        $name = 'Does not exist';
        $prompt = 'This prompt might have been deleted';
    } else {
        $name = $match['name'];
        $prompt = $match['prompt'];
        $img = $match['img'];
        $topics = explode(',', $match['topics']);
    }
    ?>
    <title>Prompt</title>
    <style>
        .content {
            display: flex;
            flex-direction: column;
        }
        .topic-pills {
            max-width: 43rem;
        }
    </style>
    <link href="../resources/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../resources/style.css">
    <script src="./script.js" defer></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-secondary-subtle" style="background-color: white !important">
    <div class="navbar-container">
        <a class="navbar-brand" href="../">Prompter</a>
        <form class="d-flex" role="search" method="get" action="../search/index.php">
            <input class="form-control me-2" type="search" placeholder="Search for prompts..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
    <div class="content">
        <div class="content_top border-bottom border-secondary-subtle" style="width: fit-content">
            <h1><?php echo htmlspecialchars($name)?></h1>
            <?php
            $topic_classes = ['Fitness' => 'text-bg-primary', 'Health' => 'text-bg-danger', 'Research' => 'text-bg-success', 'Writing' => 'text-bg-light border border-black', 'Cooking' => 'text-bg-warning', 'Programming' => 'text-bg-info', 'Legal' => 'text-bg-dark', 'Music' => 'text-bg-secondary', 'Relationship' => 'text-bg-pink', 'Buisness' => 'text-bg-brown'];
            ?>
            <div class="topic-pills mb-2">
                <?php
                foreach($topics as $topic){
                    ?>
                    <span class="badge rounded-pill <?php echo $topic_classes[$topic]?>"><?php echo $topic?></span>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="prompt_body mt-4">
            <img src="../images/<?php echo $img?>" style="max-width: 40rem" class="mt-1 mb-1">
            <h5 style="font-weight: normal; max-width: 40rem;" id="prompt_text">
                <?php echo htmlspecialchars($prompt)?>
            </h5>
            <button id="copy-btn" style="display: block" class="mb-5 green-btn" onclick="copyContent()">Copy</button>
            <a href="https://chat.openai.com/" target="_blank">Chat-gpt</a>
            <a href="https://bard.google.com/" target="_blank">Bard</a>
        </div>
    </div>
</body>
</html>