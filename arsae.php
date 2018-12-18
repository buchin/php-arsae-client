<?php
use Buchin\SearchTerm\SearchTerm;

function arsae($server = 'http://kerenbgt.com')
{
	if(SearchTerm::isCameFromSearchEngine()){
		$ref = SearchTerm::setReferer(null);

		if(empty($ref)){
			return false;
		}

		$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		$path = [
			'arsae' => urlencode($url),
			'arsae_ref' => urlencode($ref),
			'arsae_url' => urlencode(arsae_url())
		];

		header('Location: ' . $server . '?' . http_build_query($path)); 
		die;
	}
}

function arsae_url()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
	$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	return $url;
}