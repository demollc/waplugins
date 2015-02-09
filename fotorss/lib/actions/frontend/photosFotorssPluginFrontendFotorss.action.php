<?php

class photosFotorssPluginFrontendFotorssAction extends waViewAction
{
    public function execute()
    {
		$enabled = wa()->getSetting('enabled',0,array('photos','fotorss'));
		if(!$enabled) return null;
		$url = wa()->getRouting();
		$url = $url->getRouteParam('url_type');
		$route = '';
		if ($url == 0) $route = 'photo/';
		$author_on = wa()->getSetting('author_tag',0,array('photos','fotorss'));
		$max_entries = max (1,wa()->getSetting('posts_number',0,array('photos','fotorss')));
		$link = wa()->getRouteUrl('photos/frontend', array(), true);
		$rss_link = wa()->getRouteUrl('photos/frontend/fotorss', array(), true);
		$title = waRequest::param('title') ? waRequest::param('title') : wa()->accountName(); 
		$collection = new photosCollection();
		$fields = "*,";
		$thumbs=wa()->getSetting('thumb','default',array('photos','fotorss'));
		if ($thumbs=='big'||$thumbs=='middle'||$thumbs=='mobile'||$thumbs=='crop') {
			$thumbs= "thumb_".$thumbs; 
		} elseif ($thumbs == 'default'||empty($thumbs)) $thumbs='thumb';
		$fields.=$thumbs;
		$posts=$collection->getphotos($fields,0,$max_entries);
		foreach ($posts as &$post){
			if($author_on) {
				$contact = new waContact($post['contact_id']);
				$post['author']=$contact->get('name');
			}
			$post['thumb'] = $post[$thumbs];
			if ($thumbs=='vk') $post['thumb'] = photosPhoto::getThumbInfo($post, '590x0');
		}
		wa()->getResponse()->addHeader('Content-type', 'application/rss+xml; charset=utf-8',true);
		$this->view->assign('posts', $posts);
		$this->view->assign('info',array(
					'title' => $title,
					'link' => $link,
					'description' =>'',
					'language' => 'ru',
					'pubDate' => date(DATE_RSS),
					'lastBuildDate' => date(DATE_RSS),
					'photourl' => $route,
					'self' => $rss_link,
			));
    }
}
