<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($siteConfig['seo_description'] ?? ''); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($siteConfig['seo_keywords'] ?? ''); ?>">
    <title><?php echo htmlspecialchars($title ?? ($siteConfig['site_title'] ?? '政府官网')); ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- 自定义样式 -->
    <link href="/assets/css/style.css" rel="stylesheet">
    
    <?php if (!empty($siteConfig['site_favicon'])): ?>
    <link rel="icon" href="<?php echo htmlspecialchars($siteConfig['site_favicon']); ?>">
    <?php endif; ?>
</head>
<body>
    <!-- 顶部导航 -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #1a5fb4 0%, #1c4785 100%);">
        <div class="container">
            <a class="navbar-brand" href="/">
                <?php if (!empty($siteConfig['site_logo'])): ?>
                <img src="<?php echo htmlspecialchars($siteConfig['site_logo']); ?>" alt="logo" height="40" class="rounded">
                <?php else: ?>
                <i class="fas fa-landmark fa-lg"></i>
                <?php endif; ?>
                <span><?php echo htmlspecialchars($siteConfig['site_title'] ?? '政府官网'); ?></span>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="fas fa-home me-1 d-lg-none"></i><?php echo $lang['common.home'] ?? '首页'; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/notice">
                            <i class="fas fa-bullhorn me-1 d-lg-none"></i><?php echo $lang['nav.gov_public'] ?? '政务公开'; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/service">
                            <i class="fas fa-tasks me-1 d-lg-none"></i><?php echo $lang['nav.public_service'] ?? '公众服务'; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/judicial">
                            <i class="fas fa-gavel me-1 d-lg-none"></i><?php echo $lang['nav.judicial'] ?? '裁判文书'; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">
                            <i class="fas fa-envelope me-1 d-lg-none"></i><?php echo $lang['common.contact'] ?? '联系我们'; ?>
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center gap-2">
                    <form class="d-none d-md-flex" action="/search" method="GET">
                        <div class="input-group input-group-sm">
                            <input class="form-control" type="search" name="q" placeholder="<?php echo $lang['common.search'] ?? '搜索'; ?>" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i><?php echo htmlspecialchars($_SESSION['user_name'] ?? '用户'); ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="/user/profile"><i class="fas fa-user me-2 text-muted"></i>个人中心</a></li>
                            <li><a class="dropdown-item" href="/user/media"><i class="fas fa-images me-2 text-muted"></i>我的媒体</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt me-2 text-muted"></i><?php echo $lang['common.logout'] ?? '退出'; ?></a></li>
                        </ul>
                    </div>
                    <?php else: ?>
                    <a href="/login" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-sign-in-alt me-1"></i><?php echo $lang['common.login'] ?? '登录'; ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
