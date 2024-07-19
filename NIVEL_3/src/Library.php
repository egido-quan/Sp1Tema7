<?php
namespace App;


class Library {

    public array $books = []; //la pongo public para que el tester pueda acceder

    
    public function addBook(Book $book) {
        $pos = $this->findPosIsbn($book->getIsbn());
        if ($pos == -1) {
            $this->books[] = $book;
            echo "<br>El libro ha sido añadido a la librería<br>";
        } else {
            echo "<br>El libro ya existe en la librería<br>";
        }
    }

    public function deleteBook(string $isbn):void {
        $pos = $this->findPosIsbn($isbn);
            if ($pos == -1) {
                echo "<br>Este libro no está en la librería<br>";
            } else {
                array_splice($this->books, $pos, 1);
                echo "<br>Libro eliminado de la biblioteca<br>";
            } 
    }

    public function findBookByTitle(string $title):array {
        $booksToFind = [];
        for ($i=0; $i < count($this->books); $i++) {
            if ($this->books[$i]->getTitle() === $title) {
                $booksToFind [] = $this->books[$i];
            }
        }
        return $booksToFind;
    }

    public function findBookByGenre(string $genre):array {
        $booksToFind = [];
        for ($i=0; $i < count($this->books); $i++) {
            if ($this->books[$i]->getGenre() === Genre::from($genre)) {
                $booksToFind [] = $this->books[$i];
            }
        }
        return $booksToFind;
    }

    public function findBookByWriter(string $writer):array {
        $booksToFind = [];
        for ($i=0; $i < count($this->books); $i++) {
            if ($this->books[$i]->getWriter() === $writer) {
                $booksToFind [] = $this->books[$i];
            }
        }
        return $booksToFind;
    }

    public function findBookByIsbn(string $isbn) {
        $pos = $this->findPosIsbn($isbn);
        if ($pos == -1) {
            echo "<br>Este libro no está en la librería<br>";
        } else {
            return $this->books[$pos];
        } 
}


    public function findBiggerThanBook(int $num_pages): array {
        $booksToFind = [];
        for ($i=0; $i < count($this->books); $i++) {
            if ($this->books[$i]->getNumPages() >= $num_pages) {
                $booksToFind[] = $this->books[$i];
            }
        }
        return $booksToFind;
    }
    
    public function findPosIsbn(string $isbn): int {
        $pos = -1;
        for ($i=0; $i < count($this->books); $i++) {
            if ($this->books[$i]->getIsbn() === $isbn) {
                return $i;
            }
        }
        return $pos;
    }

}