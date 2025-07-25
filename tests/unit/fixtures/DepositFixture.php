<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class DepositFixture extends ActiveFixture
{
    public $modelClass = 'app\\models\\Deposit';
    public $dataFile = '@app/tests/_data/deposits.php';
} 