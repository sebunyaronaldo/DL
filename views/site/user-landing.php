<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'User Landing Page';
?>
<h1>User Landing Page</h1>

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
    Add Deposit
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

<h2>Your Deposits</h2>
<table class="table table-bordered">
    <thead>
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
                <td><?= Html::encode($deposit->created_at) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>Your Savings</h2>
<table class="table table-bordered">
    <thead>
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
                <td><?= Html::encode($saving->created_at) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table> 