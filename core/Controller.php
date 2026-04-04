<?php
namespace core;

/**
 * 基础控制器类
 */
abstract class Controller {
    
    protected $app;
    protected $viewData = [];
    
    public function __construct($app = null) {
        $this->app = $app ?: App::getInstance();
    }
    
    /**
     * 赋值到视图
     */
    protected function assign($name, $value = null) {
        if (is_array($name)) {
            $this->viewData = array_merge($this->viewData, $name);
        } else {
            $this->viewData[$name] = $value;
        }
        return $this;
    }
    
    /**
     * 渲染视图
     */
    protected function fetch($template = '', $data = []) {
        $this->viewData = array_merge($this->viewData, $data);
        
        if (empty($template)) {
            $template = $this->getDefaultTemplate();
        }
        
        $viewPath = $this->getViewPath($template);
        
        if (!file_exists($viewPath)) {
            throw new \Exception("Template not found: {$viewPath}");
        }
        
        extract($this->viewData);
        include $viewPath;
    }
    
    /**
     * 获取默认模板名
     */
    protected function getDefaultTemplate() {
        $class = get_class($this);
        $controller = substr($class, strrpos($class, '\\') + 1);
        $action = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];
        
        return strtolower($controller) . '/' . $action;
    }
    
    /**
     * 获取视图路径
     */
    protected function getViewPath($template) {
        $module = $this->getModule();
        $viewPath = APP_PATH . "view/{$module}/{$template}.php";
        return $viewPath;
    }
    
    /**
     * 获取当前模块
     */
    protected function getModule() {
        $class = get_class($this);
        if (strpos($class, '\\admin\\') !== false) {
            return 'admin';
        }
        return 'home';
    }
    
    /**
     * JSON响应
     */
    protected function json($data, $code = 200) {
        http_response_code($code);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit;
    }
    
    /**
     * 成功响应
     */
    protected function success($message = '操作成功', $data = null, $url = null) {
        $response = [
            'code' => 200,
            'message' => $message,
            'data' => $data
        ];
        
        if ($url) {
            $response['url'] = $url;
        }
        
        return $this->json($response);
    }
    
    /**
     * 错误响应
     */
    protected function error($message = '操作失败', $code = 400, $data = null) {
        $response = [
            'code' => $code,
            'message' => $message
        ];
        
        if ($data !== null) {
            $response['data'] = $data;
        }
        
        return $this->json($response);
    }
    
    /**
     * 重定向
     */
    protected function redirect($url, $code = 302) {
        header("Location: {$url}", true, $code);
        exit;
    }
    
    /**
     * 获取输入参数
     */
    protected function input($name = null, $default = null, $filter = null) {
        $input = array_merge($_GET, $_POST);
        
        if ($name === null) {
            return $input;
        }
        
        $value = $input[$name] ?? $default;
        
        if ($filter !== null && $value !== null) {
            $value = call_user_func($filter, $value);
        }
        
        return $value;
    }
    
    /**
     * 获取POST数据
     */
    protected function post($name = null, $default = null) {
        if ($name === null) {
            return $_POST;
        }
        return $_POST[$name] ?? $default;
    }
    
    /**
     * 获取GET参数
     */
    protected function get($name = null, $default = null) {
        if ($name === null) {
            return $_GET;
        }
        return $_GET[$name] ?? $default;
    }
    
    /**
     * 验证请求方法
     */
    protected function isMethod($method) {
        return $_SERVER['REQUEST_METHOD'] === strtoupper($method);
    }
    
    /**
     * 检查是否AJAX请求
     */
    protected function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}
