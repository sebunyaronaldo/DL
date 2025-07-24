<?php
use yii\helpers\Url;
$this->title = 'Analytics Dashboard';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<h1 class="mb-4 text-primary">Analytics Dashboard</h1>
<table id="dashboard-summary" class="table table-bordered border-primary table-striped w-auto mb-4">
    <thead class="table-primary">
        <tr>
            <th>Number of New Users</th>
            <th>New Groups Created This Week</th>
            <th>Money Pools Totals</th>
            <th>Total Transactions Pending</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td id="new-users" class="text-primary"></td>
            <td id="new-groups" class="text-primary"></td>
            <td id="money-pools" class="text-primary"></td>
            <td id="pending-transactions" class="text-primary"></td>
        </tr>
    </tbody>
</table>
<hr>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Total Contributions per User</h3>
        <canvas id="contributionsChart"></canvas>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Deposits per User</h3>
        <canvas id="depositsChart"></canvas>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Withdraws per User</h3>
        <canvas id="withdrawsChart"></canvas>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Withdraw Status Distribution</h3>
        <canvas id="withdrawStatusChart"></canvas>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Savings per User</h3>
        <canvas id="savingsChart"></canvas>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Claimed vs Unclaimed Savings</h3>
        <canvas id="claimedChart"></canvas>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>User Registrations Over Time</h3>
        <canvas id="userRegistrationsChart"></canvas>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Deposits Over Time</h3>
        <canvas id="depositsOverTimeChart"></canvas>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Contributions Over Time</h3>
        <canvas id="contributionsOverTimeChart"></canvas>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Withdraws Over Time</h3>
        <canvas id="withdrawsOverTimeChart"></canvas>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Savings Pots Created Over Time</h3>
        <canvas id="savingsOverTimeChart"></canvas>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div style="width: 100%; max-width: 700px;">
        <h3>Money Pools Created Over Time</h3>
        <canvas id="moneyPoolsOverTimeChart"></canvas>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
let contributionsChart, depositsChart, withdrawsChart, withdrawStatusChart, savingsChart, claimedChart;
let userRegistrationsChart, depositsOverTimeChart, contributionsOverTimeChart, withdrawsOverTimeChart, savingsOverTimeChart, moneyPoolsOverTimeChart;
function renderOrUpdateChart(chart, ctx, labels, data, label, type = 'bar', colors = null) {
    if (chart) {
        chart.data.labels = labels;
        chart.data.datasets[0].data = data;
        if (colors) chart.data.datasets[0].backgroundColor = colors;
        chart.update();
        return chart;
    } else {
        return new Chart(ctx, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: data,
                    backgroundColor: colors || (type === 'line' ? 'rgba(13,110,253,0.3)' : 'rgba(54, 162, 235, 0.5)'),
                    borderColor: type === 'line' ? '#0d6efd' : (type === 'bar' ? 'rgba(54, 162, 235, 1)' : undefined),
                    borderWidth: type === 'bar' ? 1 : 2,
                    fill: type === 'line',
                    tension: type === 'line' ? 0.3 : 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                  legend: { display: true }
                },
                scales: type === 'bar' || type === 'line' ? { y: { beginAtZero: true } } : {}
            }
        });
    }
}
function updateDashboard() {
    fetch('<?= Url::to(['site/dashboard-data']) ?>')
        .then(response => response.json())
        .then(data => {
            document.getElementById('new-users').textContent = data.newUsers;
            document.getElementById('new-groups').textContent = data.newGroupsThisWeek;
            document.getElementById('money-pools').textContent = data.moneyPoolsTotals;
            document.getElementById('pending-transactions').textContent = data.pendingTransactions;
            // Contributions per user
            const contribLabels = Object.keys(data.totalContributionsPerUser);
            const contribData = Object.values(data.totalContributionsPerUser);
            const contribCtx = document.getElementById('contributionsChart').getContext('2d');
            contributionsChart = renderOrUpdateChart(contributionsChart, contribCtx, contribLabels, contribData, 'Contributions');
            // Deposits per user
            const depositLabels = Object.keys(data.depositsPerUser);
            const depositData = Object.values(data.depositsPerUser);
            const depositCtx = document.getElementById('depositsChart').getContext('2d');
            depositsChart = renderOrUpdateChart(depositsChart, depositCtx, depositLabels, depositData, 'Deposits');
            // Withdraws per user
            const withdrawLabels = Object.keys(data.withdrawsPerUser);
            const withdrawData = Object.values(data.withdrawsPerUser);
            const withdrawCtx = document.getElementById('withdrawsChart').getContext('2d');
            withdrawsChart = renderOrUpdateChart(withdrawsChart, withdrawCtx, withdrawLabels, withdrawData, 'Withdraws');
            // Withdraw status distribution (pie)
            const statusLabels = Object.keys(data.withdrawStatusDist);
            const statusData = Object.values(data.withdrawStatusDist);
            const statusColors = ['#0d6efd', '#6c757d', '#198754', '#dc3545', '#ffc107', '#6610f2', '#fd7e14'];
            const withdrawStatusCtx = document.getElementById('withdrawStatusChart').getContext('2d');
            withdrawStatusChart = renderOrUpdateChart(withdrawStatusChart, withdrawStatusCtx, statusLabels, statusData, 'Status', 'pie', statusColors);
            // Savings per user
            const savingsLabels = Object.keys(data.savingsPerUser);
            const savingsData = Object.values(data.savingsPerUser);
            const savingsCtx = document.getElementById('savingsChart').getContext('2d');
            savingsChart = renderOrUpdateChart(savingsChart, savingsCtx, savingsLabels, savingsData, 'Savings');
            // Claimed vs Unclaimed savings (pie)
            const claimedLabels = Object.keys(data.claimedDist);
            const claimedData = Object.values(data.claimedDist);
            const claimedColors = ['#0d6efd', '#6c757d'];
            const claimedCtx = document.getElementById('claimedChart').getContext('2d');
            claimedChart = renderOrUpdateChart(claimedChart, claimedCtx, claimedLabels, claimedData, 'Claimed', 'pie', claimedColors);
            // User Registrations Over Time
            const ur = data.userRegistrations;
            const urCtx = document.getElementById('userRegistrationsChart').getContext('2d');
            userRegistrationsChart = renderOrUpdateChart(userRegistrationsChart, urCtx, ur.labels, ur.data, 'Registrations', 'line');
            // Deposits Over Time
            const dep = data.depositsOverTime;
            const depCtx = document.getElementById('depositsOverTimeChart').getContext('2d');
            depositsOverTimeChart = renderOrUpdateChart(depositsOverTimeChart, depCtx, dep.labels, dep.data, 'Deposits', 'line');
            // Contributions Over Time
            const cont = data.contributionsOverTime;
            const contCtx = document.getElementById('contributionsOverTimeChart').getContext('2d');
            contributionsOverTimeChart = renderOrUpdateChart(contributionsOverTimeChart, contCtx, cont.labels, cont.data, 'Contributions', 'line');
            // Withdraws Over Time
            const wd = data.withdrawsOverTime;
            const wdCtx = document.getElementById('withdrawsOverTimeChart').getContext('2d');
            withdrawsOverTimeChart = renderOrUpdateChart(withdrawsOverTimeChart, wdCtx, wd.labels, wd.data, 'Withdraws', 'line');
            // Savings Over Time
            const sav = data.savingsOverTime;
            const savCtx = document.getElementById('savingsOverTimeChart').getContext('2d');
            savingsOverTimeChart = renderOrUpdateChart(savingsOverTimeChart, savCtx, sav.labels, sav.data, 'Savings', 'line');
            // Money Pools Over Time
            const mp = data.moneyPoolsOverTime;
            const mpCtx = document.getElementById('moneyPoolsOverTimeChart').getContext('2d');
            moneyPoolsOverTimeChart = renderOrUpdateChart(moneyPoolsOverTimeChart, mpCtx, mp.labels, mp.data, 'Money Pools', 'line');
        });
}
setInterval(updateDashboard, 5000); // Update every 5 seconds
updateDashboard();
</script> 