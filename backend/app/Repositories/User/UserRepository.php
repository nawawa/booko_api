<?php

namespace App\Repositories\User;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

use App\Models\User;

class UserRepository
{
  public function __construct(
    private User $user
  ){
  }

  public function create(User $user, array $input): User
  {
    $user->fill($input);
    $user->save();

    return $this->authenticated_user->createAuthorizedUser($user);
  }

  public function update(User $user, array $input): User
  {
    $user->update($input);
    return $user;
  }

  public function delete(User $user): bool
  {
    return $user->destroy($user->id);
  }
}