<?php include APP_PATH . 'view/home/public/header.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">用户登录</h4>
                </div>
                <div class="card-body p-4">
                    <form action="/login/doLogin" method="POST">
                        <div class="mb-3">
                            <label class="form-label">用户名</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">密码</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">验证码</label>
                            <div class="input-group">
                                <input type="text" name="captcha" class="form-control" required>
                                <img src="/login/captcha" alt="验证码" class="captcha-img" style="cursor: pointer; height: 38px;" onclick="this.src='/login/captcha?'+Math.random()">
                            </div>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">登录</button>
                        </div>
                    </form>
                    
                    <hr class="my-4">
                    
                    <div class="text-center">
                        <p class="mb-0">还没有账号？ <a href="/login/register">立即注册</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include APP_PATH . 'view/home/public/footer.php'; ?>
