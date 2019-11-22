<?php 

$domain = 'ru';

	//Src изображения продукта
function src_img_DB() {
	global $domain, $row;
	$src = "http://boge." . $domain . "/images/public/search-product/" . $row['image'];
}

	//URL продукта
function url_DB() {
	global $domain, $row;
	$url = "http://boge." . $domain . "/" . $row['url'] . ".html";
}