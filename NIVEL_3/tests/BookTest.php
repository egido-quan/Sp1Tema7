<?php
namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\Book;
use App\Genre;

class BookTest extends TestCase {

    public function testRightConstruction() {
        $book = new Book("El Quijote", "Cervantes", "9788437633770", Genre::Adventures, 462);
        $this->assertInstanceOf(Book::class, $book);
        $this->assertEquals("El Quijote", $book->getTitle());
        $this->assertEquals("Cervantes", $book->getWriter());
        $this->assertEquals("9788437633770", $book->getIsbn());
        $this->assertEquals(Genre::Adventures, $book->getGenre());
        $this->assertEquals(462, $book->getNumPages());
    }
}