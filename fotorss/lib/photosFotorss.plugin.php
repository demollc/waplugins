<?php

/**
 * Class photosFotorssPlugin
 */
class photosFotorssPlugin extends photosPlugin
{
    /**
     * @return string[]|null
     * @throws waException
     */
    public function frontendSidebar()
    {
        if (!$this->getSettings('enabled')) {
            return null;
        }
        return ['menu'=> '<a href="' .wa()->getRouteUrl('photos/frontend/fotorss', null, true).'">RSS</a>'];
    }
}
