<?php

include ("apiCall.php");

/*
* gets the genres of a book (based on which shelves it's on
*/

class Genre {

	function getGenres($bookTitle) {
		$genres = array();
		$api = new API();
		$xmlResponse = $api->getPage('https://www.goodreads.com/book/title.xml?key=qWxJU2Tbp5dKEN9d7XfiA&title=' . $bookTitle);
		$allGenres = $xmlResponse->book->popular_shelves->shelf;
		foreach ($allGenres as $genre) {
			$genres[] = $genre[name];
		}
	
		return $genres;
	}
	
}

$genres = new Genre();
print_r($genres->getGenres('11%2022%2063'));
