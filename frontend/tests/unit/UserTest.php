<?php

namespace frontend\tests\unit;

use Codeception\Test\Unit;
use common\tests\UnitTester;
use frontend\models\User;
use frontend\tests\fixtures\UserFixture;

class UserTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return ['users' => UserFixture::class];
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGetNicknameOnNicknameEmpty()
    {
        /** @var User $user */
        $user = $this->tester->grabFixture('users', 'user1');
        expect($user->getNickname())->equals(1);
    }

    public function testGetNicknameOnNicknameNotEmpty()
    {
        /** @var User $user */
        $user = $this->tester->grabFixture('users', 'user3');
        expect($user->getNickname())->equals('snow');
    }

    public function testGetPostCount()
    {
        /** @var User $user */
        $user = $this->tester->grabFixture('users', 'user1');
        expect(count($user->getPosts()))->equals(3);
    }
}