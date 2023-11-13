<?php

namespace Tests\Unit\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    protected MockObject|UserRepositoryInterface $userRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
    }

    public function testFindAll()
    {
        $users = User::factory(5)->make();
        $this->userRepository->method("findAll")->willReturn($users);
        $foundUsers = $this->userRepository->findAll();
        $this->assertEquals($users, $foundUsers);
    }

    public function testFindAllSpecifyingColumns()
    {
        $users = User::factory(2)->make();

        $filteredUsers = $users->map(function (User $user) {
            return $user->only(['name', 'email']);
        });

        $this->userRepository->method("findAll")->willReturn($filteredUsers);

        $columns = ['name', 'email'];
        $foundUsers = $this->userRepository->findAll($columns);
        $this->assertEquals($filteredUsers, $foundUsers);
    }

    public function testFindById()
    {
        $user = User::factory()->make();
        $this->userRepository->method("findById")->willReturn($user);
        $foundUser = $this->userRepository->findById($user->id);
        $this->assertEquals($user, $foundUser);
    }

    public function testPaginate()
    {
        $users = User::factory(5)->make();

        $filteredUsers = $users->map(function (User $user) {
            return $user->only(['name', 'email']);
        });

        $this->userRepository->method("paginate")->willReturn($filteredUsers);

        $columns = ['name', 'email'];
        $foundUsers = $this->userRepository->paginate($columns);
        $this->assertEquals($filteredUsers, $foundUsers);
    }

    public function testFindByEmail()
    {
        $user = User::factory()->make();
        $this->userRepository->method("findByEmail")->willReturn($user);
        $foundUser = $this->userRepository->findByEmail($user->email);
        $this->assertEquals($user, $foundUser);
    }

    public function testCreate()
    {
        $user = User::factory()->make();
        $this->userRepository->method("create")->willReturn($user);
        $createdUser = $this->userRepository->create($user->toArray());
        $this->assertEquals($user, $createdUser);
    }

    public function testUpdate()
    {
        $user = User::factory()->make();
        $this->userRepository->method("update")->willReturn($user);
        $foundUser = $this->userRepository->update($user->id, $user->toArray());
        $this->assertEquals($user, $foundUser);
    }

    public function testDelete()
    {
        $user = User::factory()->make();
        $this->userRepository->method("delete")->willReturn($user);
        $foundUser = $this->userRepository->delete($user->id);
        $this->assertEquals($user, $foundUser);
    }
}
