<?php 

$domain = 'localhost';

	//Src изображения продукта
function src_img_DB() {
	global $domain, $row;
	echo "http://boge." . $domain . "/images/public/search-product/" . $row['image'];
}

	//URL продукта
function url_DB() {
	global $domain, $row;
	echo "http://boge." . $domain . "/" . $row['url'] . ".html";
}