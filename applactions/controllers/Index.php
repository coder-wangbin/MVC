<?php
class Index extends Controller {
	
    private $_config;
    
    public function indexs(){
    	$nav = new NavModel();
    	$this->_views->assign('name',$nav->getAll());
//        $this->_views->assign('name','彬少');
        $this->_views->display("index.php");
    }
}