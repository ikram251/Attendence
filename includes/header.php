<?php
// this includes the session file . This file contains code that starts/resume a session.
//by having it hearder file, it includes on every page , allows session capabilities to be used every page across the website.
include_once 'includes/session.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Attendance-<?php echo $title ?></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
          <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
        </svg>
        <i class="bi bi-door-open-fill"></i>
        <a class="navbar-brand" href="index.php">IKR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewrecords.php">View Attendees</a>
            </li>
          </ul>
            <form d-flex>
                <?php 
                  if(!isset($_SESSION['userid'])){
                ?>
                <button class="btn btn-warning" type="submit"><a class="nav-link active" aria-current="page" href="login.php">Login</a></button>
                <?php } else { ?>
                  <span text-white>Hello <?php echo $_SESSION['username'] ?>! </span></a>
                  <button class="btn btn-warning" type="submit"><a class="nav-item nav-link" href="logout.php">Logout</a></button>
                <?php } ?>
            </form>

        </div>
      </div>
</nav>
    <div class="container">