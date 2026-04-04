<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理 - 政府官网</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.75);
            padding: 15px 20px;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
        }
        .sidebar .nav-link i {
            width: 25px;
        }
        .main-content {
            padding: 20px;
        }
        .stat-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .stat-card .icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- 侧边栏 -->
            <div class="col-md-2 sidebar p-0">
                <div class="p-3 text-white text-center border-bottom border-secondary">
                    <h5><i class="fas fa-shield-alt me-2"></i>后台管理</h5>
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="/admin">
                        <i class="fas fa-tachometer-alt"></i>仪表盘
                    </a>
                    <a class="nav-link" href="/admin/notice">
                        <i class="fas fa-bullhorn"></i>公告管理
                    </a>
                    <a class="nav-link" href="/admin/policy">
                        <i class="fas fa-file-alt"></i>政策法规
                    </a>
                    <a class="nav-link" href="/admin/judicial">
                        <i class="fas fa-gavel"></i>裁判文书
                    </a>
                    <a class="nav-link" href="/admin/user">
                        <i class="fas fa-users"></i>用户管理
                    </a>
                    <a class="nav-link" href="/admin/consult">
                        <i class="fas fa-comments"></i>咨询管理
                    </a>
                    <a class="nav-link" href="/admin/media">
                        <i class="fas fa-images"></i>媒体库
                    </a>
                    <a class="nav-link" href="/admin/setting">
                        <i class="fas fa-cog"></i>系统设置
                    </a>
                    <a class="nav-link" href="/admin/login/logout">
                        <i class="fas fa-sign-out-alt"></i>退出登录
                    </a>
                </nav>
            </div>
            
            <!-- 主内容区 -->
            <div class="col-md-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4>仪表盘</h4>
                    <div>
                        <span class="text-muted">欢迎，<?php echo htmlspecialchars($admin['name'] ?? $admin['username']); ?></span>
                    </div>
                </div>
                
                <!-- 统计卡片 -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon bg-primary text-white me-3">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1">政务公告</h6>
                                    <h4 class="mb-0"><?php echo $stats['notice_count']; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon bg-success text-white me-3">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1">政策法规</h6>
                                    <h4 class="mb-0"><?php echo $stats['policy_count']; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon bg-info text-white me-3">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1">裁判文书</h6>
                                    <h4 class="mb-0"><?php echo $stats['judicial_count']; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon bg-warning text-white me-3">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1">注册用户</h6>
                                    <h4 class="mb-0"><?php echo $stats['user_count']; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <!-- 最新公告 -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">最新公告</h5>
                                <a href="/admin/notice" class="btn btn-sm btn-outline-primary">管理</a>
                            </div>
                            <div class="list-group list-group-flush">
                                <?php if (!empty($latestNotices)): ?>
                                    <?php foreach ($latestNotices as $notice): ?>
                                        <div class="list-group-item">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-truncate" style="max-width: 300px;"><?php echo htmlspecialchars($notice['title']); ?></h6>
                                                <small class="text-muted"><?php echo date('m-d', strtotime($notice['create_time'])); ?></small>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="list-group-item text-center text-muted py-4">暂无公告</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 待处理咨询 -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">待处理咨询 (<?php echo $stats['consult_pending']; ?>)</h5>
                                <a href="/admin/consult" class="btn btn-sm btn-outline-primary">处理</a>
                            </div>
                            <div class="list-group list-group-flush">
                                <?php if (!empty($pendingConsults)): ?>
                                    <?php foreach ($pendingConsults as $consult): ?>
                                        <div class="list-group-item">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-truncate" style="max-width: 300px;"><?php echo htmlspecialchars($consult['title']); ?></h6>
                                                <small class="text-muted"><?php echo date('m-d', strtotime($consult['create_time'])); ?></small>
                                            </div>
                                            <small class="text-muted"><?php echo htmlspecialchars($consult['contact_name']); ?></small>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="list-group-item text-center text-muted py-4">暂无待处理咨询</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
