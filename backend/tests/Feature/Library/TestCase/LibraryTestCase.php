<?php

namespace Tests\Feature\Library\TestCase;

use Tests\Feature\FeatureTestCase;

use App\Models\Library;
use App\Http\Resources\Library\LibraryResource;

class LibraryTestCase extends FeatureTestCase
{
  public array $library_param;
  public array $library_resource;
  public string $library_uuid;

  public function setUp(): void
  {
    parent::setUp();

    $this->api_route = '/api/library';
    $this->library = Library::factory()->create();

    $this->library_param = Library::factory()->make()->toArray();
  }

  public function expectLibraryResource(array $library): array
  {
    return [
      'data' => [
        'id' => $library['uuid'],
        'attributes' => [
          'name' => $library['name'],
          'location' => $library['location'],
          'code' => $library['code'],
        ]
      ]
    ];
  }

  public function createRequestParamArray(array $library): array
  {
    return [
      'name' => $library['name'],
      'location' => $library['location'],
    ];
  }

}
