<?php

function utf8conv2charset($utf8str, $charset='BIG5'){

mb_regex_encoding($charset); // 宣告 要進行 regex 的多位元編碼轉換格式 為 $charset

mb_substitute_character('long'); // 宣告 缺碼字改以U+16進位碼為標記取代

$utf8str = mb_convert_encoding($utf8str, $charset, 'UTF-8');

$utf8str = preg_replace('/U\+([0-9A-F]{4})/e', '"&#".intval("\\1",16).";"', $utf8str); // 將U+16進位碼標記轉換為UnicodeHTML碼

return $utf8str;

}

print_r (utf8conv2charset("嘩中文呀", "BIG5"));

/*
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	//Create connection
	$connn = pg_connect( "host=51.38.65.250 dbname=ffdb1 user=postgres password=209066 port=5432" );
	//Try change given_name
	$sql = pg_query( "UPDATE player_characters SET given_name = '' WHERE account_name = 'matcha1337'" );

	if (pg_affected_rows($sql) > 0) {
		echo ("UPDATE success.");
	} else {
		echo ("UPDATE fail.");
	}*/



?>