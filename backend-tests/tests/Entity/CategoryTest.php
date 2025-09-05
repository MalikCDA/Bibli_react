<?php
namespace App\Tests\Entity;

use App\Entity\Category;
use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testAddBookUpdatesBothSides(): void
    {
        $category = new Category();
        $category->setName('Fantasy');

        $book = new Book();
        $book->setTitle('HP1');

        $category->addBook($book);

        $this->assertTrue($category->getBooks()->contains($book));
        $this->assertSame($category, $book->getCategory());
    }
}


