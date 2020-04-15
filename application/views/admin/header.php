<!DOCTYPE html>
<html>
<head>
	<title>Article List</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#">Admin Panel</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		<?php if ($this->session->userdata('id')) { ?>
		<li>
			<a href="<?= base_url('admin/logout'); ?>" class="btn btn-danger" >Logout</a>
		</li>
		<?php } ?>

		<!-- <div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Login</a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="text" placeholder="Search">
		      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
		    </form>
		</div> -->
	</nav>