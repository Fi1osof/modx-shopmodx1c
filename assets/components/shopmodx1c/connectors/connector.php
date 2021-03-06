<?php
$_REQUEST['ctx'] = 'web';

ini_set('display_errors', 1);

require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$_SERVER['HTTP_MODAUTH']= $modx->user->getUserToken($modx->context->get('key'));
 
$location = '';

/* handle request */
if(!$path = $modx->getOption('shopmodx1c.core_path')){
    $path = $modx->getOption('core_path').'components/shopmodx1c/';
}
$path .= 'processors/';
// ini_set('display_errors', 1);
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => $location,
    'action' => '1c/web/public/action',
));