# cicko_url
Simple URL Shortener.

# INSTALL

1. Buat database dengan nama 'url_shortener', ubah Konfigurasi database di db.php. sesuaikan dengan konfigurasi MySQL milik anda.
2. Ubah domain tempat source ini disimpan di function/url.php

Pada bagian ini :
'''
function getDomain() {
	$domain = 'http://localhost/url';
	return $domain;
}
'''

Ubah sesuai dengan domain anda.