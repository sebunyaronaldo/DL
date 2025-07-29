<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'My Dashboard';
?>
<h1>My Dashboard</h1>

<?php if ($withdrawSuccess): ?>
    <div class="alert alert-success">Withdraw request submitted successfully!</div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var withdrawModal = document.getElementById('withdrawModal');
        if (withdrawModal) {
            var modal = bootstrap.Modal.getOrCreateInstance(withdrawModal);
            modal.hide();
        }
        // Optionally clear the form fields
        var form = document.getElementById('withdraw-form-modal');
        if (form) form.reset();
        // Remove modal backdrop if still present
        var backdrops = document.getElementsByClassName('modal-backdrop');
        while (backdrops.length > 0) backdrops[0].parentNode.removeChild(backdrops[0]);
    });
    </script>
<?php endif; ?>

<?php if ($depositSuccess): ?>
    <div class="alert alert-success">Deposit submitted successfully!</div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var depositModal = document.getElementById('depositModal');
        if (depositModal) {
            var modal = bootstrap.Modal.getOrCreateInstance(depositModal);
            modal.hide();
        }
        // Optionally clear the form fields
        var form = document.getElementById('deposit-form-modal');
        if (form) form.reset();
        // Remove modal backdrop if still present
        var backdrops = document.getElementsByClassName('modal-backdrop');
        while (backdrops.length > 0) backdrops[0].parentNode.removeChild(backdrops[0]);
    });
    </script>
<?php endif; ?>

<!-- Withdraw Creation Modal Trigger -->
<button type="button" class="btn btn-primary mb-3 me-2" data-bs-toggle="modal" data-bs-target="#withdrawModal">
    Request Withdraw
</button>

<!-- Deposit Creation Modal Trigger -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#depositModal">
    Make Deposit
</button>

<!-- Withdraw Modal -->
<div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="withdrawModalLabel">Request Withdraw</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php $form = \yii\widgets\ActiveForm::begin(['action' => ['site/user-landing'], 'id' => 'withdraw-form-modal']); ?>
            <?= $form->field($withdraw, 'withdraw_amount')->textInput(['type' => 'number', 'min' => 1, 'step' => '0.01']) ?>
            <?= $form->field($withdraw, 'withdraw_name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($withdraw, 'withdraw_number')->textInput(['maxlength' => true]) ?>
            <div class="form-group">
                <?= \yii\helpers\Html::submitButton('Request Withdraw', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
      </div>
    </div>
  </div>
</div>

<!-- Deposit Modal -->
<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="depositModalLabel">Add Deposit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php $form = \yii\widgets\ActiveForm::begin(['action' => ['site/user-landing'], 'id' => 'deposit-form-modal']); ?>
            <?= $form->field($deposit, 'deposit_amount')->textInput(['type' => 'number', 'min' => 1, 'step' => '0.01']) ?>
            <?= $form->field($deposit, 'deposit_mm_number')->textInput(['maxlength' => true]) ?>
            <?= $form->field($deposit, 'deposit_refer')->textInput(['maxlength' => true]) ?>
            <div class="form-group">
                <?= \yii\helpers\Html::submitButton('Submit Deposit', ['class' => 'btn btn-success']) ?>
            </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
      </div>
    </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-md-3">
    <div class="card mb-3">
      <div class="card-header bg-primary text-white">Profile</div>
      <div class="card-body">
        <h5 class="card-title mb-1"><?= $userProfile ? Html::encode($userProfile->fname . ' ' . $userProfile->lname) : '' ?></h5>
        <div><strong>Email:</strong> <?= $userProfile ? Html::encode($userProfile->user_email) : '' ?></div>
        <div><strong>Phone:</strong> <?= $userProfile ? Html::encode($userProfile->mm_number) : '' ?></div>
        <div><strong>Location:</strong> <?= $userProfile ? Html::encode($userProfile->location) : '' ?></div>
        <a href="<?= \yii\helpers\Url::to(['/user-profile/update', 'id' => $userProfile ? $userProfile->user_profile_id : 0]) ?>" class="btn btn-link p-0 mt-2">Edit Profile</a>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="row mb-3">
      <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
          <div class="card-header">Current Balance</div>
          <div class="card-body">
            <h5 class="card-title"><?= number_format($balance, 2) ?></h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
          <div class="card-header">Total Savings</div>
          <div class="card-body">
            <h5 class="card-title"><?= number_format($totalSavings, 2) ?></h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
          <div class="card-header">Total Withdrawn</div>
          <div class="card-body">
            <h5 class="card-title"><?= number_format($totalWithdrawn, 2) ?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <h2>My Deposits</h2>
    <table class="table table-bordered border-success">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deposits as $deposit): ?>
                <tr>
                    <td><?= Html::encode($deposit->deposit_id) ?></td>
                    <td><?= Html::encode($deposit->deposit_amount) ?></td>
                    <td><?= Yii::$app->formatter->asRelativeTime($deposit->created_at) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <h2>My Savings</h2>
    <table class="table table-bordered border-info">
        <thead class="table-info">
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Claimed</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($savings as $saving): ?>
                <tr>
                    <td><?= Html::encode($saving->savings_pot_id) ?></td>
                    <td><?= Html::encode($saving->savings_pot_amount) ?></td>
                    <td><?= $saving->claimed_status ? 'Yes' : 'No' ?></td>
                    <td><?= Yii::$app->formatter->asRelativeTime($saving->created_at) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
</div> 