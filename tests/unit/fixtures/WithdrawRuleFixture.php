<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class WithdrawRuleFixture extends ActiveFixture
{
    public $modelClass = 'app\\models\\WithdrawRule';
    public $dataFile = '@app/tests/_data/withdraw_rules.php';
} 