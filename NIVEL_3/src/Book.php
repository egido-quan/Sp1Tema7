<?php
namespace App;
use App\Genre;

class Book {


    private string $title;
    private string $writer;
    private string $isbn;
    private Genre $genre;
    private int $num_pages;

    function __construct(string $title, string $writer, string $isbn, Genre $genre, int $num_pages) {
        $this->title = $title;
        $this->writer = $writer;
        $this->isbn = $isbn;
        $this->genre = $genre;
        $this->num_pages = $num_pages;
    }

    public function getTitle(): string {
        return $this->title;
    }
    public function getWriter(): string {
        return $this->writer;
    }
    public function getIsbn(): string {
        return $this->isbn;
    }
    public function getGenre(): Genre {
        return $this->genre;
    }
    public function getNumPages(): int {  
        return $this->num_pages;
    }

    public function toString() {
        return "Book info:<br>" .
        "Title: " . $this->title ."<br>".
        "Writer: " . $this->writer ."<br>".
        "ISBN: " . $this->isbn ."<br>".
        "Genre: " . $this->genre ."<br>".
        "Page qty: " . $this->num_pages."<br>";
    }

}
