<?php
namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\Library;
use App\Book;
use App\Genre;

class LibraryTest extends TestCase {


    public function testAddBook() {
        $library = new Library();
        $book = new Book("El Quijote", "Cervantes", "9788437633770", Genre::Adventures, 462);
        $library->addBook($book);

        //El libro se debe haber añadido en la posición 0 de la librería
        $this->assertEquals($book, $library->books[0]);
    }

    public function testFindBook() {
        $library = new Library();
        $book1 = new Book("El Quijote", "Cervantes", "9788437633770", Genre::Adventures, 462);
        $library->addBook($book1);
        $book2 = new Book("El Médico", "Noah Gordon", "9780449214268", Genre::Sci_Fi, 800);
        $library->addBook($book2);

        //El libro del siguiente ISBN debe estar en la posición 1
        $this->assertEquals(1, $library->findBook("9780449214268"));
    }


    public function testDeleteBook() {
        $library = new Library();
        $book1 = new Book("El Quijote", "Cervantes", "9788437633770", Genre::Adventures, 462);
        $library->addBook($book1);
        $book2 = new Book("El Médico", "Noah Gordon", "9780449214268", Genre::Sci_Fi, 800);
        $library->addBook($book2);
        $library->deleteBook("9788437633770");

        //Tras borrar el libro de ISBN 9788437633770 (Quijote) sólo debe quedar El Médico ($book2)
        $this->assertEquals($book2, $library->books[0]);
    }

    public function testFindBiggerThanBook() {
        $library = new Library();
        $book1 = new Book("El Quijote", "Cervantes", "9788437633770", Genre::Adventures, 462);
        $library->addBook($book1);
        $book2 = new Book("El Médico", "Noah Gordon", "9780449214268", Genre::Sci_Fi, 800);
        $library->addBook($book2);

        //Si buscamos los libros de más de 300 páginas nos debe devolver el array entero  
        //Uso asserTrue para variar      
        $this->assertTrue($library->books === $library->findBiggerThanBook(300));

        //Si buscamos los libros de más de 500 páginas nos debe devolver 
        //un array con solamente El Médico ($book2)
        $booksBigger = [];
        $booksBigger = $library->findBiggerThanBook(500);
        $this->assertEquals($book2, $booksBigger[0]);
    }

}