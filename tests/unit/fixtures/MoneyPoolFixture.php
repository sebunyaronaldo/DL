<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class MoneyPoolFixture extends ActiveFixture
{
    public $modelClass = 'app\\models\\MoneyPool';
    public $dataFile = '@app/tests/_data/money_pool.php';
} 