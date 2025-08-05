<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('css/admin.css') ?>" rel="stylesheet">
    <style>
        .main-content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
        .stats-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-left:30px;
            margin-right:30Px;
            margin-top:10Px;
            margin-bottom:10Px;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        .stats-card .icon {
            font-size: 1.8rem;
            margin-bottom: 12px;
        }
        .stats-card .card-title {
            margin-bottom: 10px;
            color: #666;
            font-size: 1.1rem;
        }
        .stats-card .card-text {
            font-size: 2rem;
            color: #333;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?= view('admin/templates/sidebar') ?>
            </div>
            <div class="col-md-12">
                <div class="main-content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Dashboard</h2>
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-download"></i> Download Database
                        </a>
                    </div>
                    <div class="row">
                    <?php foreach ($stats as $item): ?>
                        <div class="col-md-4 mb-4">
                            <div class="stats-card">
                                <i class="bi <?= $item['icon'] ?> icon <?= $item['color'] ?>"></i>
                                <h5 class="card-title"><?= esc($item['title']) ?></h5>
                                <p class="card-text display-6"><?= esc($item['value']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
