<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Library;
use App\Services\LibraryService;
use App\Http\Resources\Library\LibraryResource;

class LibraryController extends Controller
{
    public function __construct(
        private LibraryService $service
    ){
    }

    /**
     * [POST]ライブラリー新規作成
     *
     * @param Library $library
     * @param Request $request
     * @return LibraryResource
     */
    public function create(Library $library, Request $request): LibraryResource
    {
        return new LibraryResource(
            $this->service->createLibrary($library, $request->input('library_data'))
        );
    }

    /**
     * [GET]ライブラリー情報取得
     *
     * @param Library $library
     * @param Request $request
     * @return LibraryResource
     */
    public function index(Library $library, Request $request): LibraryResource
    {
        return new LibraryResource($library);
    }

    /**
     * [PUT]ライブラリー情報更新
     *
     * @param Request $request
     * @return object
     */
    public function update(Library $library, Request $request): object
    {
        return new LibraryResource(
            $this->service->updateLibrary($library, $request->input('library_data'))
        );
    }

    /**
     * ライブラリー削除
     *
     * @param Request $request
     * @return void
     */
    public function delete(Library $library, Request $request)
    {
        return $this->service->deleteLibrary($library);
    }
}
