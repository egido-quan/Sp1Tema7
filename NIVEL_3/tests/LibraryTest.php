<?php
namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\Library;
use App\Book;
use App\Genre;

class LibraryTest extends TestCase {

    public function generarDatos(): array {
        $datos = [];
        $library = new Library();
        $book1 = new Book("El Quijote", "Cervantes", "9788437633770", Genre::Adventures, 462);
        $library->addBook($book1);
        $book2 = new Book("El Médico", "Noah Gordon", "9780449214268", Genre::Sci_Fi, 800);
        $library->addBook($book2);
        $book3 = new Book("Los hombres que no amaban a las mujeres", "Stieg Larsson", "9788423343218", Genre::Crime, 398);
        $library->addBook($book3);
        $datos = [$library, $book1, $book2, $book3];
        return $datos;

    }

    public function testAddBook() {
        $data = $this->generarDatos();

        //Los libros se deben haber añadido en las posiciones 0, 1 y 2 de la librería
        $this->assertEquals($data[1], $data[0]->books[0]);
        $this->assertEquals($data[2], $data[0]->books[1]);
        $this->assertEquals($data[3], $data[0]->books[2]);

        //Si intento añadir un libro que ya exite no lo debería hacer
        //Es decir, el array debería seguir siendo de 3 libros
        $data[0]->addBook($data[2]);
        $this->assertEquals(3, count($data[0]->books));
    }

    public function testFindPosIsbn() {
        $data = $this->generarDatos();

        //Los libros con los siguientes ISBN deben estar en la posiciones 1 y 2
        $this->assertEquals(1, $data[0]->findPosIsbn("9780449214268"));
        $this->assertEquals(2, $data[0]->findPosIsbn("9788423343218"));
    }

    public function testFindBookByTitle() {
        $data = $this->generarDatos();

         //Los libros con los siguientes títulos deben estar en la posiciones 0 del 
         //resultado de la búsqueda (pues solo hay un libro con esos títulos)

        $booksElQuijote = [];
        $booksElQuijote = $data[0]->findBookByTitle("El Quijote");       
        $this->assertEquals($data[1], $booksElQuijote[0]);

        $booksElMedico = [];
        $booksElMedico = $data[0]->findBookByTitle("El Médico");
        $this->assertEquals($data[2], $booksElMedico[0]);
    }

    public function testFindBookByGenre() {
        $data = $this->generarDatos();

         //Los libros con los siguientes gérneros deben estar en la posiciones 0 del 
         //resultado de la búsqueda (pues solo hay un libro con esos gçeneros)

        $booksCrime = [];
        $booksCrime = $data[0]->findBookByGenre("Crime");       
        $this->assertEquals($data[3], $booksCrime[0]);

        $booksAdventures = [];
        $booksAdventures = $data[0]->findBookByGenre("Adventures");
        $this->assertEquals($data[1], $booksAdventures[0]);
    }

    public function testFindBookByWriter() {
        $data = $this->generarDatos();

         //Los libros con los siguientes títulos deben estar en la posiciones 0 del 
         //resultado de la búsqueda (pues solo hay un libro con esos autores)

        $booksElQuijote = [];
        $booksElQuijote = $data[0]->findBookByWriter("Cervantes");       
        $this->assertEquals($data[1], $booksElQuijote[0]);

        $booksElMedico = [];
        $booksElMedico = $data[0]->findBookByWriter("Noah Gordon");
        $this->assertEquals($data[2], $booksElMedico[0]);
    }


    public function testFindBookByIsbn() {
        $data = $this->generarDatos();

         //Los libros con los siguientes títulos deben estar en la posiciones 0 del 
         //resultado de la búsqueda (pues solo hay un libro con esos autores)

        $book9788437633770 = $data[0]->findBookByIsbn("9788437633770");       
        $this->assertEquals($data[1], $book9788437633770);

        $book9780449214268 = [];
        $book9780449214268 = $data[0]->findBookByIsbn("9780449214268");
        $this->assertEquals($data[2], $book9780449214268);
    }


    public function testDeleteBook() {
        $data = $this->generarDatos();

        $data[0]->deleteBook("9788437633770");
        $data[0]->deleteBook("9788423343218");

        //Tras borrar los libros de ISBN 9788437633770 y  9788423343218  sólo debe quedar El Médico ($book2)
        $this->assertEquals($data[2], $data[0]->books[0]);
    }

    public function testFindBiggerThanBook() {
        $data = $this->generarDatos();

        //Si buscamos los libros de más de 300 páginas nos debe devolver el array entero  
        //Uso asserTrue para variar      
        $this->assertTrue($data[0]->books === $data[0]->findBiggerThanBook(300));

        //Si buscamos los libros de más de 500 páginas nos debe devolver 
        //un array con solamente El Médico ($book2)
        $booksBigger = [];
        $booksBigger = $data[0]->findBiggerThanBook(500);
        $this->assertEquals($data[2], $booksBigger[0]);
    }

}