<?php

class photosFotorssPluginFrontendFotorssAction extends waViewAction
{
    /**
     * @throws waException
     * @throws waDbException
     */
    public function execute()
    {
        $plugin = wa('photos')->getPlugin('fotorss');
        $enabled = $plugin->getSettings('enabled');
        if (!$enabled) {
            $this->setThemeTemplate('error.html');
        }

        $url = wa()->getRouting()->getRouteParam('url_type');
        $route = '';
        if ($url == 0) {
            $route = 'photo/';
        }
        $author_on = $plugin->getSettings('author_tag');
        $max_entries = max(1, $plugin->getSettings('posts_number'));
        $link = wa()->getRouteUrl('photos/frontend', [], true);
        $rss_link = wa()->getRouteUrl('photos/frontend/fotorss', [], true);
        $title = waRequest::param('title') ?: wa()->accountName();

        $collection = new photosCollection();
        $thumbs = $plugin->getSettings('thumb');
        if ($thumbs === 'big' || $thumbs === 'middle' || $thumbs === 'mobile' || $thumbs === 'crop') {
            $thumbs = 'thumb_' . $thumbs;
        } else {
            $thumbs = 'thumb';
        }
        $fields = '*,';
        $fields .= $thumbs;
        $posts = $collection->getPhotos($fields, 0, $max_entries);
        foreach ($posts as &$post) {
            if ($author_on) {
                $contact = new waContact($post['contact_id']);
                if ($contact->exists()) {
                    $post['author'] = $contact->get('name');
                }
            }
            $post['thumb'] = $post[$thumbs];
            if ($thumbs === 'vk') {
                $post['thumb'] = photosPhoto::getThumbInfo($post, '590x0');
            }
        }
        unset($post);
        wa()->getResponse()->addHeader('Content-type', 'application/rss+xml; charset=utf-8');
        $this->view->assign('posts', $posts);
        $this->view->assign(
            'info',
            [
                'title' => $title,
                'link' => $link,
                'description' => '',
                'language' => 'ru',
                'pubDate' => date(DATE_RSS),
                'lastBuildDate' => date(DATE_RSS),
                'photourl' => $route,
                'self' => $rss_link,
            ]
        );
        $turbo = waRequest::get('turbo', false);
        if ($turbo) {
            $this->setTemplate('FrontendFotorssTurbo.html');
        }
    }
}
