<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
	<?= link_tag('assets/css/bootstrap.min.css'); ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= base_url('client') ?>">Articles-Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php base_url('login'); ?>">Loggin</a>
      </li>
    </ul>
    <?= form_open('client/search',['class'=>'form-inline my-2 my-lg-0']) ?>
    
      <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    <?= form_close() ?>
    <?= form_error('query') ?>
  </div>
</nav>