<?php include APP_PATH . 'view/home/public/header.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">个人中心</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="/user/profile" class="list-group-item list-group-item-action">基本信息</a>
                    <a href="/user/media" class="list-group-item list-group-item-action active">我的媒体</a>
                    <a href="/user/password" class="list-group-item list-group-item-action">修改密码</a>
                    <a href="/logout" class="list-group-item list-group-item-action text-danger">退出登录</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">我的媒体</h5>
                    <a href="/user/upload" class="btn btn-sm btn-primary">上传文件</a>
                </div>
                <div class="card-body">
                    <?php if (!empty($media)): ?>
                        <div class="row g-3">
                            <?php foreach ($media as $item): ?>
                                <div class="col-md-4 col-6">
                                    <div class="card">
                                        <?php if ($item['file_type'] === 'image'): ?>
                                            <img src="<?php echo htmlspecialchars($item['file_path']); ?>" class="card-img-top" style="height: 150px; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                                                <i class="fas fa-file fa-3x text-muted"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div class="card-body p-2">
                                            <p class="card-text small text-truncate mb-1"><?php echo htmlspecialchars($item['original_name']); ?></p>
                                            <small class="text-muted"><?php echo date('Y-m-d', strtotime($item['create_time'])); ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <?php if ($totalPages > 1): ?>
                            <nav class="mt-4">
                                <ul class="pagination justify-content-center">
                                    <?php if ($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="/user/media?page=<?php echo $page - 1; ?>">上一页</a>
                                        </li>
                                    <?php endif; ?>
                                    
                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                            <a class="page-link" href="/user/media?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    
                                    <?php if ($page < $totalPages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="/user/media?page=<?php echo $page + 1; ?>">下一页</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="text-center py-5 text-muted">
                            <i class="fas fa-images fa-3x mb-3"></i>
                            <p>暂无媒体文件</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include APP_PATH . 'view/home/public/footer.php'; ?>
