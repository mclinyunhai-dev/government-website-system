    <!-- 页脚 -->
    <footer class="text-light py-5 mt-auto">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <?php if (!empty($siteConfig['site_logo'])): ?>
                        <img src="<?php echo htmlspecialchars($siteConfig['site_logo']); ?>" alt="logo" height="36" class="me-2 rounded">
                        <?php else: ?>
                        <i class="fas fa-landmark fa-2x me-2"></i>
                        <?php endif; ?>
                        <h5 class="mb-0"><?php echo htmlspecialchars($siteConfig['site_title'] ?? '政府官网'); ?></h5>
                    </div>
                    <p class="text-white-50 mb-3"><?php echo htmlspecialchars($siteConfig['site_subtitle'] ?? '政务服务门户网站'); ?></p>
                    <div class="d-flex gap-3 mb-3">
                        <a href="#" class="text-white-50 hover-white" aria-label="微信"><i class="fab fa-weixin fa-lg"></i></a>
                        <a href="#" class="text-white-50 hover-white" aria-label="微博"><i class="fab fa-weibo fa-lg"></i></a>
                        <a href="#" class="text-white-50 hover-white" aria-label="邮箱"><i class="fas fa-envelope fa-lg"></i></a>
                    </div>
                    <div class="small text-white-50">
                        <?php if (!empty($siteConfig['icp_number'])): ?>
                        <p class="mb-1"><i class="fas fa-globe me-2"></i><?php echo htmlspecialchars($siteConfig['icp_number']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($siteConfig['police_number'])): ?>
                        <p class="mb-0"><i class="fas fa-shield-alt me-2"></i><?php echo htmlspecialchars($siteConfig['police_number']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h6 class="text-white mb-3 fw-bold">快速链接</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="/notice" class="text-white-50 text-decoration-none hover-white">政务公开</a></li>
                        <li class="mb-2"><a href="/policy" class="text-white-50 text-decoration-none hover-white">政策法规</a></li>
                        <li class="mb-2"><a href="/service" class="text-white-50 text-decoration-none hover-white">公众服务</a></li>
                        <li class="mb-2"><a href="/judicial" class="text-white-50 text-decoration-none hover-white">裁判文书</a></li>
                        <li><a href="/contact" class="text-white-50 text-decoration-none hover-white">联系我们</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white mb-3 fw-bold">服务指南</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="/service/guide" class="text-white-50 text-decoration-none hover-white">办事指南</a></li>
                        <li class="mb-2"><a href="/service/consult" class="text-white-50 text-decoration-none hover-white">在线咨询</a></li>
                        <li class="mb-2"><a href="/search" class="text-white-50 text-decoration-none hover-white">站内搜索</a></li>
                        <li><a href="/sitemap" class="text-white-50 text-decoration-none hover-white">网站地图</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white mb-3 fw-bold">联系方式</h6>
                    <ul class="list-unstyled small text-white-50">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2 text-primary"></i>某某市政府大楼</li>
                        <li class="mb-2"><i class="fas fa-phone me-2 text-primary"></i>12345 政务服务热线</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2 text-primary"></i>contact@gov.cn</li>
                        <li><i class="fas fa-clock me-2 text-primary"></i>周一至周五 9:00-17:00</li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4 opacity-25">
            
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <p class="mb-0 small text-white-50"><?php echo htmlspecialchars($siteConfig['copyright'] ?? '© 2026 版权所有'); ?></p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="/admin" class="text-white-50 text-decoration-none small hover-white">
                        <i class="fas fa-cog me-1"></i>管理后台
                    </a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- 懒加载脚本 -->
    <script src="/assets/js/lazyload.js"></script>
    <!-- 主脚本 -->
    <script src="/assets/js/main.js"></script>
</body>
</html>
