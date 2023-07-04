<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prompter</title>
    <link href="../resources/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../resources/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-secondary-subtle" style="background-color: white !important">
  <div class="navbar-container">
    <a class="navbar-brand" href="../">Prompter</a>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="../create">Create a prompt</a>
        </li>
    </ul>
      <form class="d-flex" role="search" method="get" action="./">
        <input class="form-control me-2" type="search" placeholder="Search for prompts..." aria-label="Search" name="q">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  <div class="content">
    <div class="prompts-display">
        <?php
        $search = null;
        if(isset($_GET['q'])){
            $search = $_GET['q'];
        } else {
            header('Location: ../');
        }
        require '../vendor/autoload.php';
        $conn = new MongoDB\Client("mongodb://localhost:27017");
        $table = $conn->prompter->prompts;

        $match = $table->find(['$text' => ['$search' => $search]]);
        $topic_classes = ['Fitness' => 'text-bg-primary', 'Health' => 'text-bg-danger', 'Research' => 'text-bg-success', 'Writing' => 'text-bg-light border border-black', 'Cooking' => 'text-bg-warning', 'Programming' => 'text-bg-info', 'Legal' => 'text-bg-dark', 'Music' => 'text-bg-secondary', 'Relationship' => 'text-bg-pink', 'Buisness' => 'text-bg-brown'];
        $i = 0;
        foreach($match as $prompt){
          ?>
          <a class="prompt" href="../prompt/?id=<?php echo $prompt['id']?>">
            <div class="top">
                <div class="prompt-image-div">
                    <img src="../images/<?php echo $prompt['img']?>" class="prompt-image">
                </div>
                <div class="prompt-top-text">
                    <h3><?php echo htmlspecialchars($prompt['name'])?></h3>
                    <div class="prompt-topics">
                        <?php
                        $topics = explode(',', $prompt['topics']);
                        foreach($topics as $topic){
                          ?>
                            <span class="badge rounded-pill <?php echo $topic_classes[$topic]?>"><?php echo $topic?></span>
                          <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <p class="prompt-desc">
              <?php echo htmlspecialchars($prompt['prompt'])?>
            </p>
          </a>
          <?php
          $i++;
        }
        if($i === 0){
            ?>
            <h3>No results found...</h3>
            <?php
        }
        ?>
    </div>
  </div>
</body>
</html>