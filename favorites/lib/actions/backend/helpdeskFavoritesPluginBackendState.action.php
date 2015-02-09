<?php
class helpdeskFavoritesPluginBackendStateAction extends waViewAction
{
    public function execute()
    {
		if(waRequest::getMethod()!='post') return;
		else {
			$request_id = waRequest::post('id');
			$request_id = preg_replace("/[^0-9]/","", $request_id);
			$contact_id=wa()->getUser()->getId();
			$model = new helpdeskFavoritesPluginModel;
			$values=array(
				'contact_id' => $contact_id,
				'request_id' => $request_id
			);
			$state=(int)waRequest::post('favorite');
			if($request_id&&$state){
				//пока без UNIQUE можно смело вставлять
				//Удаление все снесёт
				$message=$model->insert($values);
			} else {$message=$model->deleteByField($values);}
			$this->view->assign('data',$message);
		}
    }
}
