<?php

class shopAgecheckPlugin extends shopPlugin
{
	public function frontend_head()
	{
		if (!$this->getSettings('enabled')) return false;
		if (waRequest::cookie('agecheck')==1) return false;
		else {
			$enter=(!empty($this->getSettings('enter')))?$this->getSettings('enter'):_wp('Enter');
			$leave=(!empty($this->getSettings('leave')))?$this->getSettings('leave'):_wp('Leave');
			$header=(!empty($this->getSettings('header')))?$this->getSettings('header'):_wp('Adults only');
			$style=(!empty($this->getSettings('css')))?$this->getSettings('css'):'';
			$logo=(!empty($this->getSettings('logo_url')))?$this->getSettings('logo_url'):$this->getPluginStaticUrl(true).'img/'.$this->getSettings('logo').'.png';
			$html='<div id="agecheck" class="agecheck-fade">';
			$html.='<script type="text/javascript">
			$(document).on("click","#s-agecheck-enter",function(){var e=new Date;e.setTime(e.getTime()+31536e7),document.cookie="agecheck=1;path=/;expires="+e.toUTCString(),$("#agecheck").hide()}),$(document).on("click","#s-agecheck-leave",function(){""==document.referrer?window.close():window.location.href=document.referrer});
</script>';
			$html.='<style>.agecheck-fade{height:100%;width:100%;background-color:rgba(0,0,0,.9);position:fixed;overflow:hidden;left:0;top:0;display:block;z-index:10000}.agecheck-cont{padding:20px;margin:10% auto 0;width:350px;background-color:#FFF!important;-moz-box-shadow:0 0 100px 1px #444;-webkit-box-shadow:0 0 100px 1px #444;font-size:20px}.agecheck-button{font-family:inherit;font-size:100%;padding:.5em 1em;color:#444;border:1px solid #999;background-color:#E6E6E6;text-decoration:none;border-radius:2px}</style>';
		if (!empty($style)) $html.='<style>'.$style.'</style>';
		$html.='
		<div class="agecheck-cont" align="center">
			<img align="middle" class="agecheck-logo" style="clear:both" src="'.$logo.'"></img><br><br>
			<h3>'.$header.'</h3>
			<button class="agecheck-button" id="s-agecheck-enter">'.$enter.'</button>&nbsp;&nbsp;<button class="agecheck-button" id="s-agecheck-leave">'.$leave.'</button>
		</div></div>';
			return $html;
		}
	}
}

		
