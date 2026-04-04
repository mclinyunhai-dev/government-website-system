<?php
namespace app\controller\admin;

use core\Controller;
use app\model\Policy;

/**
 * 政策法规管理控制器
 */
class Policy extends Controller {
    
    /**
     * 政策列表
     */
    public function index() {
        $page = $this->get('page', 1);
        $limit = 15;
        
        $policyModel = new Policy();
        $list = $policyModel->order('id', 'DESC')->page($page, $limit)->select();
        $total = $policyModel->count();
        
        $this->assign('list', $list);
        $this->assign('page', $page);
        $this->assign('total', $total);
        $this->assign('totalPage', ceil($total / $limit));
        $this->fetch('policy/index');
    }
    
    /**
     * 添加政策
     */
    public function add() {
        if ($this->isMethod('POST')) {
            $data = [
                'title' => $this->post('title'),
                'department' => $this->post('department'),
                'content' => $this->post('content'),
                'category_id' => $this->post('category_id', 0),
                'status' => $this->post('status', 1),
                'publish_date' => $this->post('publish_date', date('Y-m-d')),
                'create_time' => date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s')
            ];
            
            $policyModel = new Policy();
            $policyModel->insert($data);
            
            return $this->success('添加成功', null, '/admin/policy');
        }
        
        $this->fetch('policy/add');
    }
    
    /**
     * 编辑政策
     */
    public function edit() {
        $id = $this->get('id');
        $policyModel = new Policy();
        
        if ($this->isMethod('POST')) {
            $data = [
                'title' => $this->post('title'),
                'department' => $this->post('department'),
                'content' => $this->post('content'),
                'category_id' => $this->post('category_id', 0),
                'status' => $this->post('status', 1),
                'publish_date' => $this->post('publish_date'),
                'update_time' => date('Y-m-d H:i:s')
            ];
            
            $policyModel->where('id', $id)->update($data);
            
            return $this->success('更新成功', null, '/admin/policy');
        }
        
        $info = $policyModel->where('id', $id)->find();
        $this->assign('info', $info);
        $this->fetch('policy/edit');
    }
    
    /**
     * 删除政策
     */
    public function delete() {
        $id = $this->post('id');
        $policyModel = new Policy();
        $policyModel->where('id', $id)->delete();
        
        return $this->success('删除成功');
    }
}
