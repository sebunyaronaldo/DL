<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class SavingsPotFixture extends ActiveFixture
{
    public $modelClass = 'app\\models\\SavingsPot';
    public $dataFile = '@app/tests/_data/savings_pot.php';
} 