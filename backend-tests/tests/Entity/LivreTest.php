<?php
namespace App\Tests\Entity;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class LivreTest extends TestCase
{
    public function testSetAndGetTitle(): void
    {
        $book = new Book();
        $book->setTitle("1984");

        $this->assertEquals("1984", $book->getTitle());
    }

    public function testSetAndGetAuthor(): void
    {
        $book = new Book();
        $author = new Author();
        $author->setFirstName('George')->setLastName('Orwell');

        $book->setAuthor($author);

        $this->assertSame($author, $book->getAuthor());
    }

    public function testSetAndGetCategory(): void
    {
        $book = new Book();
        $category = new Category();
        $category->setName('Dystopie');

        $book->setCategory($category);

        $this->assertSame($category, $book->getCategory());
    }
}
