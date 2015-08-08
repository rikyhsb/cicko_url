<?php

/**
 * Application Name : Cicko-URL
 * Script Name : url.php
 * Description : Script ini adalah function yang digunakan untuk save, filter, dan decode URL yang panjang
 * Author : El Cicko - riky.hasibuan@gmail.com
**/

require ("db.php");

/*
 * method ini adalah konfigurasi untuk nama domain tempat script ini berjalan 
 * silahkan ubah bagian ini, sesuaikan dengan nama domain kamu
 */
function getDomain() {
	$domain = 'http://localhost/url';
	return $domain;
}

// method ini untuk menyimpan log query sql jika terdapat error query
function safe_query($query = "") {
	if(empty($query)){return false;}
	$result = mysql_query($query);
	if ($result) {
	  return $result;
	} else {
	  $log = fopen("failquery.log", "ab");
	  $recDate = date("d-m-Y H:i");
	  $loginfo = "[$recDate] query failed: errorno=".mysql_errno().";error=".mysql_error().";\nquery=".$query."\n";
	  fwrite($log, $loginfo);
	  fclose($log);
	  return FALSE;
	}
}

// method ini digunakan untuk memfilter url
function isValidURL($url) {
	return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}

/**
 * method ini untuk generate short url dan melakukan pengecekan di database.
 * jika short url sudah ada di database, maka script ini akan melakukan generate ulang.
 */
function generateUrl() {
	while(1) {
		$id = rand(100000,999999);
		$shortUrl = base_convert($id,20,36);
		if (checkUrl($shortUrl)) {
			return $shortUrl;
			exit;
		} else {
			continue;
		}
	}
}

// method ini digunakan untuk check url apakah url sudah ada di database atau belum.=
function checkUrl($shortUrl) {
	$query = "SELECT * FROM `url` WHERE `short_url` = '".$shortUrl."'";
	$result = safe_query($query);
	if (mysql_num_rows($result) == 0) {
		return TRUE;
	} else {
		return FALSE;
	}
}

// input url ke database
function addUrl($urlInput, $shortUrl) {
    $query = "INSERT INTO `url` (`long_url`, `short_url`) VALUE ('".$urlInput."', '".$shortUrl."')";
	$result = safe_query($query);
	if ($result && (mysql_affected_rows()>0))
		return TRUE;
	else
		return FALSE;
}

// mengambil long url berdasarkan short url
function decodeUrl($urlGet) {
	$query = "SELECT * FROM `url` WHERE `short_url` = '".$urlGet."' LIMIT 0,1";
	$result = safe_query($query);
	if(($result) && (mysql_num_rows($result) > 0)) {
		$data = $row = mysql_fetch_assoc($result);
		return $data;
	} else {
		return FALSE;
	}
}

// update statistik jumlah url yang diklik
function updateClicked($id, $clicked) {
    $query = "UPDATE `url` SET `clicked` = '".$clicked."' WHERE `id` = '".$id."'";
	$result = safe_query($query);
	if ($result && (mysql_affected_rows()>0))
		return TRUE;
	else
		return FALSE;
}