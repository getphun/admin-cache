<?php
/**
 * System cache clearer
 * @package admin-cache
 * @version 0.0.1
 * @upgrade true
 */

namespace AdminCache\Controller;

class CacheController extends \AdminController
{
    private function _defaultParams(){
        return [
            'title'             => 'Caches',
            'nav_title'         => 'System',
            'active_menu'       => 'system',
            'active_submenu'    => 'caches'
        ];
    }
    
    public function indexAction(){
        if(!$this->user->login)
            return $this->loginFirst('adminLogin');
        if(!$this->can_i->clear_cache)
            return $this->show404();
        
        $params = $this->_defaultParams();
        $clear = $this->req->getQuery('clear');
        $params['total'] = 0;
        
        if($clear){
            $this->cache->truncate();
        }else{
            $params['total'] = $this->cache->total();
        }
        
        return $this->respond('system/cache/index', $params);
    }
}