<?php

class helpdeskFavoritesPlugin extends waPlugin
{
    public function sidebar($data)
    {
		$contact_id=wa()->getUser()->getId();
		$model = new helpdeskFavoritesPluginModel;
		$values=array(
				'contact_id'=>$contact_id,
			);
		$message=$model->countByField($values);
        $html='<div class="block">
            <ul class="menu-v">
            <li><span class="favorites count">'.$message.'</span>
            <a href="#/requests/filter/nosearch/favorites">
                <b class="nowrap">
               <i class="icon16 star"></i>
               '._wp("Favorites").'<i class="fader"></i>
                </b>
            </a>
        </li></ul></div>';
        return $html;
    }
    
    private function isFav($request_id)
    {
		$contact_id=wa()->getUser()->getId();
		$model = new helpdeskFavoritesPluginModel;
		$values=array(
				'contact_id'=>$contact_id,
				'request_id'=>$request_id,
			);
		$message=$model->countByField($values);
		if ($message>0) return true;
		else return false;
	}
    
    public function view_action($params)
    {
		if (!$params['action'] instanceof helpdeskRequestsInfoAction) return false;
		$favorite=$this->isFav($params['action']->request_id)?'star':'star-empty';
        $html='<script>$(".source-name").after("<span class=favorite ><i class=\'icon16 '.$favorite.'\'></i></span>")</script>';
        return $html;
    }
    
    public function requests_delete($param)
    {
        $model = new helpdeskFavoritesPluginModel;
        $model->deleteByField('request_id', $param);
    }
    
    public function requests_collection($data)
    {
		if ($data['filter_name'] != 'favorites') return $data;
		else {
			$data['collection']->from[] = 'JOIN helpdesk_favorites AS fav ON fav.request_id=r.id';
			$data['collection']->where[] = 'fav.contact_id='.wa()->getUser()->getId();
			$data['collection']->header .= $data['collection']->header ? ', ' : '';
			$data['collection']->header .= 'Favorites';
			return $data;
		}
    }
    
    public function backend_layout()
    {
		$html='<script type="text/javascript" src="'.$this->getPluginStaticUrl().'js/favorites.js?v'.$this->getVersion().'"></script>';
		return $html;
	}
}
