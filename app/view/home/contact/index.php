<?php include APP_PATH . 'view/home/public/header.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-4">联系我们</h1>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-map-marker-alt text-primary me-2"></i>办公地址</h5>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($contact['address'] ?? '暂无信息')); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-phone text-success me-2"></i>联系电话</h5>
                            <p class="card-text"><?php echo htmlspecialchars($contact['phone'] ?? '暂无信息'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-envelope text-info me-2"></i>电子邮箱</h5>
                            <p class="card-text"><?php echo htmlspecialchars($contact['email'] ?? '暂无信息'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-clock text-warning me-2"></i>工作时间</h5>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($contact['work_time'] ?? '周一至周五 9:00-17:00')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include APP_PATH . 'view/home/public/footer.php'; ?>
