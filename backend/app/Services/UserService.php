<?php

namespace App\Services;

use Illuminate\Support\Collection;

use App\Models\User;
use App\Repositories\User\UserRepository;

class UserService
{
  public function __construct(
    private UserRepository $repository, 
  ){
  }

  /**
   * ユーザー新規作成
   *
   * @param User $user
   * @param array $input
   * @return User
   */
  public function createUser(User $user, array $input): User
  {
    return $this->repository->create($user, $this->createUserParam($input));
  }

  /**
   * ユーザー更新
   *
   * @param User $user
   * @param array $input
   * @return User
   */
  public function updateUser(User $user, array $input): User
  {
    return $this->repository->update($user, $this->createUserParam($input));
  }

  /**
   * 入力値の最適化
   *
   * @param array $input
   * @return array
   */
  private function createUserParam(array $input): array
  {
    $hashed_password = $this->auth_repository->hashingPassword($input['password']);
    $user_icon = ($input['icon']) ? $input['icon']: 'storage/images/default_icon/png';

    return array_replace($input, [
      'password' => $hashed_password,
      'icon' => $user_icon
    ]);
  }
}