<?php

class shopTweaksPlugin extends shopPlugin
{
    public function backendProduct($product){
        $version = wa('shop')->getVersion();
        $version = (int)$version;
        if($version != '6'||!$this->getSettings('enabled')||!$this->getSettings('thumbsproductpage')) return;
        $view = wa()->getView();
        $view -> assign('images',$product['images']);
        $view -> assign('path',$this->getPluginStaticUrl());
        $view -> assign('path_file',$this->path.'/');
        $view -> assign('product_id',$product['id']);
        $html = $view->fetch($this->path.'/templates/BackendImages.html');
        return array('toolbar_section'=>$html);
    }
    
    public function backendOrder($order){
        if (!$this->getSettings('enabled')||!$this->getSettings('orderthumbitem')) return;
        $path=$this->getPluginStaticUrl();
        $html='<script src="'.$path.'js/image.projection.js"/>';
        return array(
            'info_section' => $html,
        );
    }
}
