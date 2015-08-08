<?php 

require('function/url.php'); 
require('template.php');

// jika ada request, lakukan decode short url dan redirect ke url asli
$urlGet = htmlentities(mysql_real_escape_string($_GET["decode"]));
$decodeUrl = decodeUrl($urlGet);
if ($decodeUrl) {
	$clicked = $decodeUrl['clicked'] + 1;
	// update jumlah klik untuk url tersebut.
	updateClicked($decodeUrl['id'], $clicked);
	header("location:".$decodeUrl['long_url']."");
}

?>

<!DOCTYPE html>
	<html lang="en">
	<?php getMeta(); ?>
	<body>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<center>
					<div class="card-panel grey lighten-4" style="width:800px">
						<h2><img src="images/cickourl.png" width="40%"></h2>
						<br><br>
						<div class="row">
							<div class="input-field col s12">
					        	<input class="validate grey lighten-4" type="text" name="url" id="url" placeholder="Put your long URL here" style="width:650px;">
					        </div>
				      		<div class="input-field col s12">
								<button id="shorten" class="waves-effect waves-light btn-large grey"><i class="material-icons left">done</i> Short it!</button>
							</div>
						</div>	
						<img src="images/ajax-loader.gif" style="display:none" id="loading">
						<div id="short_url"></div>
						<div class="row">
							<?php getFooter(); ?>
						</div>
					</div>
					</center>
				</div>
			</div>
		</div>
	</body>
</html>
