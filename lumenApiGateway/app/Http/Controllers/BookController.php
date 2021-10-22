<?php

namespace App\Http\Controllers;


use App\Book;
use App\Services\BookService;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the Authors Microservice
     * @var BookService
     */
    public $bookService;

    /**
     * The service to consume the Authors Microservice
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     * @param BookService $bookService
     * @param AuthorService $authorService
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * Return a list o books
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(
            $this->bookService->getAuthors()
        );
    }

    /**
     * Create one new book
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorService->getAuthor($request->author_id);

        return $this->successResponse(
            $this->bookService->createAuthor(
                $request->all()
            ),
            Response::HTTP_CREATED
        );
    }

    /**
     * Obtains an book
     * @param $book
     * @return Illuminate\Http\Response
     */
    public function show($book)
    {
        return $this->successResponse(
            $this->bookService->getAuthor($book)
        );
    }

    /**
     * Update an existing book
     * @param Request $request
     * @param $book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        return $this->successResponse(
            $this->bookService->updateAuthor(
                $request->all(),
                $book
            )
        );
    }

    /**
     * Delete an book
     * @param $book
     * @return Illuminate\Http\Response
     */
    public function destroy($book)
    {
        return $this->successResponse(
            $this->bookService->deleteAuthor($book),
            Response::HTTP_NO_CONTENT
        );
    }
}
