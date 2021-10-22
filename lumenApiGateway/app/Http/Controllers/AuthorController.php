<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the Authors Microservice
     * @var AuthorService
     */
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Return a list o authors
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse(
            $this->authorService->getAuthors()
        );
    }

    /**
     * Create one new author
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse(
            $this->authorService->createAuthor(
                $request->all()
            ),
            Response::HTTP_CREATED
        );
    }

    /**
     * Obtains an author
     * @param $author
     * @return Illuminate\Http\Response
     */
    public function show($author)
    {
        return $this->successResponse(
            $this->authorService->getAuthor($author)
        );
    }

    /**
     * Update an existing author
     * @param Request $request
     * @param $author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {
        return $this->successResponse(
            $this->authorService->updateAuthor(
                $request->all(),
                $author
            )
        );
    }

    /**
     * Delete an author
     * @param $author
     * @return Illuminate\Http\Response
     */
    public function destroy($author)
    {
        return $this->successResponse(
            $this->authorService->deleteAuthor($author),
            Response::HTTP_NO_CONTENT
        );
    }
}
