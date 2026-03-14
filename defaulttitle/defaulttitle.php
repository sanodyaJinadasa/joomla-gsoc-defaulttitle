<?php
defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;
use Joomla\CMS\Response\JsonResponse;
use Joomla\CMS\Uri\Uri;

class PlgContentDefaulttitle extends CMSPlugin
{
    public function onAfterDispatch()
    {
        $app = Factory::getApplication();

        // Only load in administrator article form
        if ($app->isClient('administrator')) {
            $doc = $app->getDocument();
            $doc->addScript(Uri::root() . 'plugins/content/defaulttitle/script.js');
        }
    }

    public function onAjaxDefaulttitle()
    {
        $title = $this->params->get('default_title', 'My Default Title');

        echo new JsonResponse($title);
        Factory::getApplication()->close();
    }
}