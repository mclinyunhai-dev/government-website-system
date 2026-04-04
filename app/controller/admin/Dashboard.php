<?php
namespace app\controller\admin;

use core\Controller;
use app\model\Notice;
use app\model\Policy;
use app\model\Judicial;
use app\model\User;
use app\model\Consult;

/**
 * 后台仪表盘控制器
 */
class Dashboard extends Controller {
    
    /**
     * 后台首页
     */
    public function index() {
        // 统计数据
        $stats = [
            'notice_count' => (new Notice())->count(),
            'policy_count' => (new Policy())->count(),
            'judicial_count' => (new Judicial())->count(),
            'user_count' => (new User())->count(),
            'consult_pending' => (new Consult())->where('status', 0)->count()
        ];
        
        // 最新公告
        $latestNotices = (new Notice())->getLatest(5);
        
        // 待处理咨询
        $pendingConsults = (new Consult())->where('status', 0)->order('create_time', 'DESC')->limit(5)->select();
        
        $this->assign([
            'stats' => $stats,
            'latestNotices' => $latestNotices,
            'pendingConsults' => $pendingConsults,
            'admin' => $_SESSION['admin'] ?? []
        ]);
        
        $this->fetch('dashboard/index');
    }
}
