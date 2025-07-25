<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class GroupMemberFixture extends ActiveFixture
{
    public $modelClass = 'app\\models\\GroupMember';
    public $dataFile = '@app/tests/_data/group_members.php';
} 