<?php include APP_PATH . 'view/home/public/header.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-4">政务公告</h1>
            
            <?php if (!empty($notices)): ?>
                <div class="list-group">
                    <?php foreach ($notices as $notice): ?>
                        <a href="/notice/detail/<?php echo $notice['id']; ?>" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php echo htmlspecialchars($notice['title']); ?></h5>
                                <small class="text-muted"><?php echo date('Y-m-d', strtotime($notice['create_time'])); ?></small>
                            </div>
                            <p class="mb-1 text-muted">
                                <?php echo mb_substr(strip_tags($notice['content']), 0, 100) . '...'; ?>
                            </p>
                            <small class="text-muted">
                                <i class="bi bi-eye"></i> <?php echo $notice['views']; ?> 阅读
                            </small>
                        </a>
                    <?php endforeach; ?>
                </div>
                
                <!-- 分页 -->
                <?php if ($totalPages > 1): ?>
                    <nav class="mt-4">
                        <ul class="pagination justify-content-center">
                            <?php if ($page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="/notice?page=<?php echo $page - 1; ?>">上一页</a>
                                </li>
                            <?php endif; ?>
                            
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                    <a class="page-link" href="/notice?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            
                            <?php if ($page < $totalPages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="/notice?page=<?php echo $page + 1; ?>">下一页</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            <?php else: ?>
                <div class="alert alert-info">暂无公告</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include APP_PATH . 'view/home/public/footer.php'; ?>
