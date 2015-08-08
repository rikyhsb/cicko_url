<?php

/**
 * Application Name : Cicko-URL
 * Script Name : template.php
 * Description : Script ini digunakan untuk menampilkan layout template
 * Author : El Cicko - riky.hasibuan@gmail.com
**/

// method ini untuk menampilkan header & meta header
function getMeta() {
	?>
	<head>
	    <meta charset="utf-8">
	    <title>Cicko URL</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="Cicko-URL is Free & Fast URL Shortener Services.">
	    <meta name="author" content="El Cicko">
	    <meta name="cicko-url" content="El Cicko [riky.hasibuan@gmail.com]" />
	    <link href="assets/css/materialize.css" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	    <script src="assets/js/jquery.js"></script>
		<script src="assets/js/materialize.min.js"></script>
		<script src="assets/js/url.js"></script>
		<style type="text/css">
		body {
		  position: relative;
		  padding-top: 60px;
		  background-image:url(assets/img/bg_dotted.png);
		}
		</style>
	</head>
	<?php
}

// method ini digunakan untuk menampilkan footer  
function getFooter() {
	?>
	 	<footer>
            <p> Copyright &copy; <?php echo date('Y'); ?> <a class="grey-text" href="http://elcicko.com">elcicko.com</a></p>
        </footer>
	<?php
}