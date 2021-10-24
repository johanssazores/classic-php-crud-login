<!DOCTYPE html>
<html lang="en">
<head>
  <title>Meal System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>

<nav class="shadow1 navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="/">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      Weekly Meal Plan
    </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="monday.php">Monday</a></li>
        <li><a class="dropdown-item" href="tuesday.php">Tuesday</a></li>
        <li><a class="dropdown-item" href="wednesday.php">Wednesday</a></li>
        <li><a class="dropdown-item" href="thursday.php">Thursday</a></li>
        <li><a class="dropdown-item" href="friday.php">Friday</a></li>
        <li><a class="dropdown-item" href="saturday.php">Saturday</a></li>
        <li><a class="dropdown-item" href="sunday.php">Sunday</a></li>
      </ul>
      </div>

      <li class="nav-item">
        <a class="nav-link" href="healthy-recipes.php">Healthy-Recipes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>

    </ul>
  </div>
</nav>
