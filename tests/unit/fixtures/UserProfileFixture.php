<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class UserProfileFixture extends ActiveFixture
{
    public $modelClass = 'app\\models\\UserProfile';
    public $dataFile = '@app/tests/_data/user_profile.php';
} 