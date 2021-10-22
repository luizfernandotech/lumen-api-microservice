<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the books service
     * @var string
     */
    public $baseUri;

    /**
     * The secret key to consume the authors service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    /**
     * Obtain the full list of books
     * @return string
     */
    public function getAuthors()
    {
        return $this->performRequest(
            'GET',
            '/books'
        );
    }

    /**
     * Obtain the full list of books
     * @return string
     */
    public function createAuthor($data)
    {
        return $this->performRequest(
            'POST',
            '/books',
            $data
        );
    }

    /**
     * Obtain one book
     * @return string
     */
    public function getAuthor($book)
    {
        return $this->performRequest(
            'GET',
            "/books/{$book}"
        );
    }

    /**
     * Update an book
     * @return string
     */
    public function updateAuthor($data, $book)
    {
        return $this->performRequest(
            'PUT',
            "/books/{$book}",
            $data
        );
    }

    /**
     * Delete one book
     * @return string
     */
    public function deleteAuthor($book)
    {
        return $this->performRequest(
            'DELETE',
            "/books/{$book}"
        );
    }
}
