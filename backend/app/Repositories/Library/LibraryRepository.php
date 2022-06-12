<?php

namespace App\Repositories\Library;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

use App\Models\Library;

class LibraryRepository
{
  public function __construct(
    private Library $library
  ){
  }

  public function create(Library $library, array $input): Library
  {
    $library->fill($input);
    $library->save();

    return $library;
  }

  public function update(Library $library, array $input): Library
  {
    $library->update($input);

    return $library;
  }

  public function delete(Library $library): bool
  {
    return $library->destroy($library->id);
  }

  public function getLibraryByCode(string $code): ?Library
  {
    return $this->library->where('code', $code)->first();
  }
}