@extends('admin.layouts.master')

@section('title', 'Thống kê')

@section('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .stats-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    .stats-number {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }
    .stats-label {
        color: #666;
        font-size: 14px;
    }
    .chart-container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Thống kê tổng quan</h2>
    
    <div class="row">
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-number"><?php echo $totals['total_users']; ?></div>
                <div class="stats-label">Tổng số tài khoản</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-number"><?php echo $totals['total_articles']; ?></div>
                <div class="stats-label">Tổng số bài viết</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-number"><?php echo $totals['total_categories']; ?></div>
                <div class="stats-label">Tổng số danh mục</div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="articleChart"></canvas>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
// Biểu đồ phân bố bài viết theo danh mục
var ctxCategory = document.getElementById('categoryChart').getContext('2d');
var categoryChart = new Chart(ctxCategory, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode(array_column($categoryStats, 'name')); ?>,
        datasets: [{
            data: <?php echo json_encode(array_column($categoryStats, 'article_count')); ?>,
            backgroundColor: [
                '#FF6384',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0',
                '#9966FF',
                '#FF9F40'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Phân bố bài viết theo danh mục'
            }
        }
    }
});

// Biểu đồ số lượng bài viết theo thời gian
var ctxArticle = document.getElementById('articleChart').getContext('2d');
var articleChart = new Chart(ctxArticle, {
    type: 'line',
    data: {
        labels: <?php echo json_encode(array_column($articleStats, 'month')); ?>,
        datasets: [{
            label: 'Số bài viết',
            data: <?php echo json_encode(array_column($articleStats, 'count')); ?>,
            borderColor: '#36A2EB',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Số lượng bài viết theo tháng'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection

@endsection 