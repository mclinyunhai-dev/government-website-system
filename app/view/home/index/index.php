<?php include APP_PATH . 'view/home/public/header.php'; ?>

<!-- 轮播图区域 -->
<section class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="hero-slide" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 480px;">
                            <div class="col-lg-7 text-white">
                                <h1 class="display-4 fw-bold mb-4"><?php echo htmlspecialchars($siteConfig['site_title'] ?? '政府官网'); ?></h1>
                                <p class="lead mb-4 opacity-90"><?php echo htmlspecialchars($siteConfig['site_subtitle'] ?? '政务服务门户网站'); ?></p>
                                <a href="/service" class="btn btn-light btn-lg rounded-pill px-4">
                                    <i class="fas fa-arrow-right me-2"></i>开始办事
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 480px;">
                            <div class="col-lg-7 text-white">
                                <h1 class="display-4 fw-bold mb-4">政务公开</h1>
                                <p class="lead mb-4 opacity-90">及时发布政府信息，推进阳光政务建设</p>
                                <a href="/notice" class="btn btn-light btn-lg rounded-pill px-4">
                                    <i class="fas fa-arrow-right me-2"></i>查看公告
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 480px;">
                            <div class="col-lg-7 text-white">
                                <h1 class="display-4 fw-bold mb-4">裁判文书</h1>
                                <p class="lead mb-4 opacity-90">公开透明的司法信息查询平台</p>
                                <a href="/judicial" class="btn btn-light btn-lg rounded-pill px-4">
                                    <i class="fas fa-arrow-right me-2"></i>立即检索
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">上一张</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">下一张</span>
        </button>
    </div>
</section>

<!-- 快捷入口 -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-6 col-lg-3">
                <a href="/notice" class="text-decoration-none">
                    <div class="card h-100 text-center p-4 border-0 shadow-sm hover-shadow">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-bullhorn fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title text-dark">政务公告</h5>
                            <p class="card-text text-muted small mb-0">最新政府公告通知</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="/policy" class="text-decoration-none">
                    <div class="card h-100 text-center p-4 border-0 shadow-sm hover-shadow">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-file-alt fa-3x text-success"></i>
                            </div>
                            <h5 class="card-title text-dark">政策法规</h5>
                            <p class="card-text text-muted small mb-0">政策法规文件查询</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="/service" class="text-decoration-none">
                    <div class="card h-100 text-center p-4 border-0 shadow-sm hover-shadow">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-tasks fa-3x text-info"></i>
                            </div>
                            <h5 class="card-title text-dark">在线办事</h5>
                            <p class="card-text text-muted small mb-0">便民服务在线办理</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="/judicial" class="text-decoration-none">
                    <div class="card h-100 text-center p-4 border-0 shadow-sm hover-shadow">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-gavel fa-3x text-warning"></i>
                            </div>
                            <h5 class="card-title text-dark">裁判文书</h5>
                            <p class="card-text text-muted small mb-0">司法文书公开检索</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 最新公告和政策 -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- 最新公告 -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title mb-0">
                        <i class="fas fa-bullhorn text-primary me-2"></i>最新公告
                    </h2>
                    <a href="/notice" class="btn btn-outline-primary btn-sm rounded-pill">
                        查看更多<i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                
                <div class="card border-0 shadow-sm">
                    <div class="list-group list-group-flush">
                        <?php if (!empty($notices)): ?>
                            <?php foreach ($notices as $notice): ?>
                            <a href="/notice/detail/<?php echo $notice['id']; ?>" class="list-group-item list-group-item-action py-3">
                                <div class="d-flex w-100 justify-content-between align-items-start">
                                    <div class="flex-grow-1 me-3">
                                        <h6 class="mb-1">
                                            <?php if ($notice['is_top']): ?>
                                            <span class="badge bg-danger me-1">置顶</span>
                                            <?php endif; ?>
                                            <?php if ($notice['is_important']): ?>
                                            <span class="badge bg-warning text-dark me-1">重要</span>
                                            <?php endif; ?>
                                            <span class="text-dark"><?php echo htmlspecialchars($notice['title']); ?></span>
                                        </h6>
                                        <p class="mb-0 text-muted small text-truncate"><?php echo htmlspecialchars($notice['summary'] ?? ''); ?></p>
                                    </div>
                                    <small class="text-muted text-nowrap"><?php echo date('m-d', strtotime($notice['publish_time'])); ?></small>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="list-group-item text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 opacity-50"></i>
                                <p class="mb-0"><?php echo $lang['common.no_data'] ?? '暂无数据'; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- 最新政策 -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>最新政策</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        <?php if (!empty($policies)): ?>
                            <?php foreach ($policies as $policy): ?>
                            <a href="/policy/detail/<?php echo $policy['id']; ?>" class="list-group-item list-group-item-action py-3">
                                <h6 class="mb-1 text-truncate text-dark"><?php echo htmlspecialchars($policy['title']); ?></h6>
                                <small class="text-muted"><?php echo date('Y-m-d', strtotime($policy['publish_date'])); ?></small>
                            </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="list-group-item text-center py-5 text-muted">
                                <p class="mb-0"><?php echo $lang['common.no_data'] ?? '暂无数据'; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 裁判文书检索 -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="section-title text-center mb-3">
                    <i class="fas fa-gavel text-primary me-2"></i>裁判文书检索
                </h2>
                <p class="text-muted mb-4">公开透明的司法信息查询平台，支持按案件名称、案号、法院等多维度检索</p>
                
                <form action="/judicial" method="GET" class="search-form mb-4">
                    <div class="input-group input-group-lg">
                        <input type="text" name="keyword" class="form-control" placeholder="请输入案件名称、案号或关键词" aria-label="搜索裁判文书">
                        <button class="btn btn-primary px-4" type="submit">
                            <i class="fas fa-search me-2"></i>检索
                        </button>
                    </div>
                </form>
                
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <span class="badge bg-secondary bg-opacity-75">民事案件</span>
                    <span class="badge bg-secondary bg-opacity-75">刑事案件</span>
                    <span class="badge bg-secondary bg-opacity-75">行政案件</span>
                    <span class="badge bg-secondary bg-opacity-75">执行案件</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 统计数据 -->
<section class="py-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <div class="p-4">
                    <h2 class="display-4 fw-bold text-primary">1000+</h2>
                    <p class="text-muted mb-0">政务公告</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4">
                    <h2 class="display-4 fw-bold text-success">500+</h2>
                    <p class="text-muted mb-0">政策法规</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4">
                    <h2 class="display-4 fw-bold text-info">50+</h2>
                    <p class="text-muted mb-0">在线服务</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-4">
                    <h2 class="display-4 fw-bold text-warning">10000+</h2>
                    <p class="text-muted mb-0">裁判文书</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include APP_PATH . 'view/home/public/footer.php'; ?>
