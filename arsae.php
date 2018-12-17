<?php
use Buchin\SearchTerm\SearchTerm;

define('ARSAE_SERVER', 'http://www.wordpress.test');

function arsae()
{
	if(SearchTerm::isCameFromSearchEngine()){
		$ref = SearchTerm::setReferer(null);

		if(empty($ref)){
			return false;
		}

		$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		$path = [
			'arsae' => urlencode($url),
			'arsae_ref' => urlencode($ref)
		];

		header('Location: ' . ARSAE_SERVER . '?' . http_build_query($path)); 
		die;
	}
}