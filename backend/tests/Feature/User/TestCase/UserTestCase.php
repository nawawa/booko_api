<?php

namespace Tests\Feature\User\TestCase;

use Tests\Feature\FeatureTestCase;

use App\Models\User;
use App\Http\Resources\User\UserResource;

class UserTestCase extends FeatureTestCase
{
  public array $user_param;
  public array $user_resource;
  public string $user_uuid;

  public function setUp(): void
  {
    parent::setUp();

    $this->api_route = '/api/user';
    $this->user = User::factory()->create();

    $this->user_param = User::factory()->make()->toArray();
  }

  public function expectUserResource(array $user): array
  {
    return [
      'data' => [
        'id' => $user['uuid'],
        'attributes' => [
          'name' => $user['name'],
          'icon' => $user['icon'],
        ]
      ]
    ];
  }

  public function createRequestParamArray(array $user): array
  {
    return [
      'login_id' => $user['login_id'],
      'name' => $user['name'],
      'icon' => $user['icon']
    ];
  }
}