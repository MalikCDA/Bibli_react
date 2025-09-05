<?php
namespace App\Tests\Entity;

use App\Entity\Author;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    public function testFirstAndLastName(): void
    {
        $author = new Author();
        $author->setFirstName('George');
        $author->setLastName('Orwell');

        $this->assertEquals('George', $author->getFirstName());
        $this->assertEquals('Orwell', $author->getLastName());
    }
}


