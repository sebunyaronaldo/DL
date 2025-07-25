<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class WithdrawFixture extends ActiveFixture
{
    public $modelClass = 'app\\models\\Withdraw';
    public $dataFile = '@app/tests/_data/withdraws.php';
} 