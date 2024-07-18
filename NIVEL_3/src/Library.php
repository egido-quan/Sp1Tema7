<?php
namespace App;


class Library {

    public array $books = []; //la pongo public para que el tester pueda acceder

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function deleteBook(string $isbn):void {
        $pos = $this->findBook($isbn);
            if ($pos == -1) {
                echo "<br>Este libro no está en la librería<br>";
            } else {
                array_splice($this->books, $pos, 1);
                echo "<br>Libro eliminado de la biblioteca<br>";
            } 
    }

    public function findBiggerThanBook(int $num_pages): array {
        $big_books = [];
        for ($i=0; $i < count($this->books); $i++) {
            if ($this->books[$i]->getNumPages() >= $num_pages) {
                $big_books[] = $this->books[$i];
            }
        }
        return $big_books;
    }
    
    public function findBook(string $isbn): int {
        $pos = -1;
        for ($i=0; $i < count($this->books); $i++) {
            if ($this->books[$i]->getIsbn() === $isbn) {
                return $i;
            }
        }
        return $pos;
    }

}