<!DOCTYPE html>
<html>
<head>
	<title>Web front</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-arial-caps/css/bpg-arial-caps.min.css">
	<style type="text/css">
		* {
			font-family: "BPG Arial Caps", sans-serif;
		}
		a {
			text-decoration: none;
			color: #000;
		}
		.news-item img {
			width: 100%;
			height: 120px;
			object-fit: cover;
		}
	</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="/">მთავარი</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link" href="#">სიახლეები</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">ენაზარ ლინკს</a>
	        </li>
	      </ul>
	      <form class="d-flex">
	        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
	        <button class="btn btn-outline-success" type="submit">Search</button>
	      </form>
	    </div>
	  </div>
	</nav>

	<div id="content">
		@yield("content")
	</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>



