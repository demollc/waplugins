<?php
class shopPlugmeinPluginBackendRunAction extends waViewAction
{
    private function generateConfig($state, $plugins)
    {
        $app_config = wa()->getConfig()->getAppConfig('shop');
        $path=$app_config->getConfigPath('plugins.php', true);
        $plugin_php = include($path);
        if ($state) $state=true;
        else $state=false;
        foreach ($plugins as $plugin) {
            $plugin_php[$plugin]=$state;
        }
        unset($plugin);
        waUtils::varExportToFile($plugin_php, $path, true);
    }
    
    public function execute()
    {
        if (!$this->getUser()->getRights('shop', 'settings')) {
            throw new waException(_w('Access denied'));
        }
        $message='OK';
        $options = waRequest::post();
        if (!empty($options)) {
            $message=$this->generateConfig($options['state'], $options['plugins']);
        }
        $this->view->assign('message', empty($message) ? 'OK' : $message);
    }
}
