<?php

include ("apiCall.php");

/*
* return top books given a genre
*/

class TopBooks {

	function getBooks($genre) {
		$books = array();
		$api = new API();
		$xmlResponse = $api->getPage('https://www.goodreads.com/search.xml?key=qWxJU2Tbp5dKEN9d7XfiA&search[genre]&q=' . $genre);
		$allBooks = $xmlResponse->search->results->work;
		foreach ($allBooks as $book) {
			$books[] = $book->best_book->title;
		}
	
		return $books;
	}
	
}

$topBooks = new TopBooks();
print_r($topBooks->getBooks('fiction'));