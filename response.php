<?php

/**
 * Application Name : Cicko-URL
 * Script Name : decoder.php
 * Description : Script ini digunakan untuk melakukan filter dan menyimpan URL asli sekaligus menampilkan short URL
 * Author : El Cicko - riky.hasibuan@gmail.com
**/

require ('function/url.php'); 

// ambil nama domain
$domain = getDomain();

// kondisi jika url yang diinput kosong
if(($_GET['url'] == "")) {
	echo '<div class="card red accent-1">
			<div class="card-content white-text">
              	<p>Hey ! What are you doing ?</p>
            </div>
          </div>';
// jika url tidak kosong
} elseif($_GET['url'] != "") {
	$urlInput = mysql_real_escape_string($_GET['url']); 
	// jika url tidak valid
	if(!filter_var($urlInput , FILTER_VALIDATE_URL)) {
		echo '<div class="card red accent-1">
			<div class="card-content white-text">
              	<p>This is not a valid URL</p>
            </div>
          </div>';
	// jika url valid
	} else {
		$shortUrl = generateUrl();
		$addUrl = addUrl($urlInput, $shortUrl);
		if ($addUrl) {
			echo '<div class="card light-green">
					<div class="card-content white-text">
		              	<p><a class="white-text" href="'.$domain.'/'.$shortUrl.'" target="_blank">'.$domain.'/'.$shortUrl.'</a></p>
		            </div>
		          </div>';
		} else {
			echo '<div class="card red accent-1">
			<div class="card-content white-text">
              	<p>Unexpected Error</p>
            </div>
          </div>';
		}
	}
}