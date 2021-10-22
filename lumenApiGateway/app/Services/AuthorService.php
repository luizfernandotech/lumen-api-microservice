<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the authors service
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
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    /**
     * Obtain the full list of authors
     * @return string
     */
    public function getAuthors()
    {
        return $this->performRequest(
            'GET',
            '/authors'
        );
    }

    /**
     * Obtain the full list of authors
     * @return string
     */
    public function createAuthor($data)
    {
        return $this->performRequest(
            'POST',
            '/authors',
            $data
        );
    }

    /**
     * Obtain one author
     * @return string
     */
    public function getAuthor($author)
    {
        return $this->performRequest(
            'GET',
            "/authors/{$author}"
        );
    }

    /**
     * Update an author
     * @return string
     */
    public function updateAuthor($data, $author)
    {
        return $this->performRequest(
            'PUT',
            "/authors/{$author}",
            $data
        );
    }

    /**
     * Delete one author
     * @return string
     */
    public function deleteAuthor($author)
    {
        return $this->performRequest(
            'DELETE',
            "/authors/{$author}"
        );
    }
}
