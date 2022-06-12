<?php

namespace Tests\Feature\Library\TestCase;

use Tests\Feature\FeatureTestCase;

use App\Models\Library;
use App\Http\Resources\Library\LibraryResource;

class LibraryTestCase extends FeatureTestCase
{
  public array $library_param;
  public array $library_resource;

  public function setUp(): void
  {
    parent::setUp();

    $this->api_route = '/api/library';
    $this->library_param = Library::factory()->make()->toArray();
    
    $this->library_resource = [
      'data' => [
        'id' => $this->library_param['uuid'],
        'attributes' => [
            'name' => $this->library_param['name'],
            'location' => $this->library_param['location'],
            'code' => $this->library_param['code'],
        ],
      ],
    ];
  }
}
