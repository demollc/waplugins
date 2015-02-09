<?php

class photosFotorssPlugin extends photosPlugin
{
    public function frontendSidebar()
    {
		if (!$this->getSettings('enabled')) {
            return null;
        }
		return array('menu'=>"<a href =".wa()->getRouteUrl('photos/frontend/fotorss',null,true).">RSS</a>");
    }
}
