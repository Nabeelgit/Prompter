<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a prompt</title>
    <link href="../resources/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../resources/style.css">
    <style>
        .content {
            display: block;
        }
        .topic-pills {
            max-width: 43rem;
        }
    </style>
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
        <ul>
            <li>To add inputs that need to be filled in the prompt use [$name of item]</li>
        </ul>
        <form class="mt-2 flex">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Name of prompt..." style="max-width: 40rem">
        </div>
        <h4>Choose topic:</h4>
        <div class="topics-choice mb-3">
            <div class="chosen mb-2">
                
            </div>
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
        <div class="mb-3" style="max-width: 40rem">
            <label for="formFile" class="form-label">Upload an image: </label>
            <input class="form-control" type="file" id="formFile" accept=".jpg,.png,.webp">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Type prompt..." id="floatingTextarea2" style="height: 100px; width: 40rem;"></textarea>
            <label for="floatingTextarea2">Type your prompt...</label>
        </div>
        <button type="button" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</body>
</html>