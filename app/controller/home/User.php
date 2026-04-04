<?php
namespace app\controller\home;

use core\Controller;
use app\model\User as UserModel;
use app\model\Settings;

/**
 * 用户中心控制器
 */
class User extends Controller {
    
    /**
     * 构造函数 - 检查登录
     */
    public function __construct($app = null) {
        parent::__construct($app);
        
        // 需要登录的方法
        $needAuth = ['profile', 'media', 'password', 'logout'];
        $action = $_GET['action'] ?? 'profile';
        
        if (in_array($action, $needAuth) && !isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
    }
    
    /**
     * 个人中心
     */
    public function profile() {
        $userModel = new UserModel();
        $user = $userModel->find($_SESSION['user_id']);
        
        $this->assign('user', $user);
        $this->fetch('user/profile');
    }
    
    /**
     * 我的媒体
     */
    public function media() {
        $page = $this->get('page', 1);
        $limit = 12;
        
        // 获取用户上传的媒体文件
        $db = $this->app->getDb();
        $prefix = $this->app->getConfig('database.prefix', 'gov_');
        
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM {$prefix}media WHERE user_id = ? ORDER BY create_time DESC LIMIT {$offset}, {$limit}";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_SESSION['user_id']]);
        $media = $stmt->fetchAll();
        
        // 获取总数
        $countSql = "SELECT COUNT(*) FROM {$prefix}media WHERE user_id = ?";
        $countStmt = $db->prepare($countSql);
        $countStmt->execute([$_SESSION['user_id']]);
        $total = $countStmt->fetchColumn();
        
        $this->assign('media', $media);
        $this->assign('page', $page);
        $this->assign('limit', $limit);
        $this->assign('total', $total);
        $this->assign('totalPages', ceil($total / $limit));
        
        $this->fetch('user/media');
    }
    
    /**
     * 修改密码
     */
    public function password() {
        if (!$this->isMethod('POST')) {
            $this->fetch('user/password');
            return;
        }
        
        $oldPassword = $this->post('old_password');
        $newPassword = $this->post('new_password');
        $confirmPassword = $this->post('confirm_password');
        
        if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
            return $this->error('请填写所有密码字段');
        }
        
        if ($newPassword !== $confirmPassword) {
            return $this->error('两次输入的新密码不一致');
        }
        
        if (strlen($newPassword) < 6) {
            return $this->error('新密码长度至少6位');
        }
        
        $userModel = new UserModel();
        $user = $userModel->find($_SESSION['user_id']);
        
        if (!$userModel->verifyPassword($oldPassword, $user['password'])) {
            return $this->error('原密码错误');
        }
        
        // 更新密码
        $userModel->where('id', $_SESSION['user_id'])->update([
            'password' => password_hash($newPassword, PASSWORD_BCRYPT)
        ]);
        
        return $this->success('密码修改成功', null, '/user/profile');
    }
}
