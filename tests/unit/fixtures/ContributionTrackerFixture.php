<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class ContributionTrackerFixture extends ActiveFixture
{
    public $modelClass = 'app\\models\\ContributionTracker';
    public $dataFile = '@app/tests/_data/contribution_tracker.php';
} 