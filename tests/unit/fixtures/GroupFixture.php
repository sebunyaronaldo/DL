<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class GroupFixture extends ActiveFixture
{
    public $modelClass = 'app\\models\\Group';
    public $dataFile = '@app/tests/_data/groups.php';
} 