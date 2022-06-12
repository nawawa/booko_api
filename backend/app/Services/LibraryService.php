<?php

namespace App\Services;

use App\Models\Library;

use App\Repositories\Library\LibraryRepository;

class LibraryService 
{
  public function __construct(
    private LibraryRepository $repository
  ){
  }

  /**
   * ライブラリー新規作成
   *
   * @param Library $library
   * @param array $input
   * @return Library
   */
  public function createLibrary(Library $library, array $input): Library
  {
    return $this->repository->create($library, $input);
  }

  /**
   * ライブラリー情報更新
   *
   * @param Library $library
   * @param array $input
   * @return Library
   */
  public function updateLibrary(Library $library, array $input): Library
  {
    return $this->repository->update($library, $input);
  }
  
  /**
   * ライブラリー情報削除
   *
   * @param Library $library
   * @return boolean
   */
  public function deleteLibrary(Library $library): bool
  {
    return $this->repository->delete($library);
  }
}