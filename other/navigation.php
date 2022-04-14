<?php
    session_start();
    if(!$_SESSION['username']){
      header('location: index.php');
    }
?>

<head>
  <style>
    @media all and (min-width: 992px) {
    .navbar .nav-item .dropdown-menu{ display: none; }
    .navbar .nav-item:hover .nav-link{ color: #fff;  }
    .navbar .nav-item:hover .dropdown-menu{ display: block; }
    .navbar .nav-item .dropdown-menu{ margin-top:0; }
  }
  </style>
</head>

<!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="image/navigation-logo.png" width="290" height="65" style="margin:-10px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav ml-auto">
      <li><a class="nav-item nav-link" href="dashboard.php">Dashboard</a></li>
      <li><a class="nav-item nav-link" href="listofgrantees.php">Grantees</a></li>
      <li><a class="nav-item nav-link" href="attachments.php">Attachments</a></li>
      <li><a class="nav-item nav-link" href="other/logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="image/navigation-logo.png" width="290" height="65" style="margin:-10px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">
<ul class="navbar-nav ml-auto">
	<li class="nav-item"> <a class="nav-link" href="dashboard.php">Dashboard </a> </li>
	<li class="nav-item dropdown">
	   <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">  Lists  </a>
	    <ul class="dropdown-menu">
		    <li><a class="dropdown-item" href="listofgrantees.php"> Grantees</a></li>
		    <li><a class="dropdown-item" href="listofunfinalizerequest.php"> Unfinalize Requests </a></li>
		    <li><a class="dropdown-item" href="applicationdatfilelist.php"> Application DAT Files </a></li>		    
	    </ul>
	</li>
  <li class="nav-item"><a class="nav-link" href="attachments.php"> Attachments </a></li>
  <li class="nav-item"><a class="nav-link" href="other/logout.php"> Sign Out </a></li>
</ul>
  </div> <!-- navbar-collapse.// -->
</nav>
