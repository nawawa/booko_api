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
     * ライブラリー新規作成
     *
     * @param Request $request
     */
    public function create(Library $library, Request $request): object
    {
        return new LibraryResource(
            $this->service->createLibrary($library, $request->input('library_data'))
        );
    }

    /**
     * ライブラリー情報取得
     *
     * @param Request $request
     * @return object
     */
    public function index(Library $library, Request $request): object
    {
        return new LibraryScheduleResource($library);
    }

    /**
     * ライブラリー情報更新
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
