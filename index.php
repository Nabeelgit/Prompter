<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prompter</title>
    <link href="./resources/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./resources/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom border-secondary-subtle" style="background-color: white !important">
  <div class="navbar-container">
    <a class="navbar-brand" href="./">Prompter</a>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="./create">Create a prompt</a>
        </li>
    </ul>
      <form class="d-flex" role="search" method="get" action="./search/index.php">
        <input class="form-control me-2" type="search" placeholder="Search for prompts..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  <div class="content">
    <div class="prompts-display">
        <a class="prompt">
            <div class="top">
                <div class="prompt-image-div">
                    <img src="prompter.webp" class="prompt-image">
                </div>
                <div class="prompt-top-text">
                    <h3>Personal trainer</h3>
                    <div class="prompt-topics">
                        <span class="badge rounded-pill text-bg-primary">Fitness</span>
                        <span class="badge rounded-pill text-bg-danger">Health</span>
                        <span class="badge rounded-pill text-bg-success">Research</span>
                    </div>
                </div>
            </div>
            <p class="prompt-desc">
                Embark on an extraordinary fitness journey with the perfect fitness LLM as your guide. Discover personalized guidance tailored to your goals, fitness...
            </p>
        </a>
    </div>
    <div class="topics">
        <h5>Topics</h5>
        <hr width="90rem">
        <div class="topic-pills">
            <span class="badge rounded-pill text-bg-primary">Fitness</span>
            <span class="badge rounded-pill text-bg-danger">Health</span>
            <span class="badge rounded-pill text-bg-success">Research</span>
            <span class="badge rounded-pill text-bg-light border border-black">Writing</span>
            <span class="badge rounded-pill text-bg-warning">Cooking</span>
            <span class="badge rounded-pill text-bg-info">Programming</span>
            <span class="badge rounded-pill text-bg-dark">Legal</span>
            <span class="badge rounded-pill text-bg-secondary">Music</span>
            <span class="badge rounded-pill text-bg-pink">Relationship</span>
            <span class="badge rounded-pill text-bg-brown">Buisness</span>
        </div>
    </div>
  </div>
</body>
</html>