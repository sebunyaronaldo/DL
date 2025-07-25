<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class TransactionStatusFixture extends ActiveFixture
{
    public $modelClass = 'app\\models\\TransactionStatus';
    public $dataFile = '@app/tests/_data/transaction_status.php';
} 