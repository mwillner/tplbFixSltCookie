<?php

namespace tplbFixSltCookie;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin tplbFixSltCookie.
 */
class tplbFixSltCookie extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('tplb_fix_slt_cookie.plugin_dir', $this->getPath());
        parent::build($container);
    }

    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Modules_Admin_Login_Successful' => ['afterLogin', 1000],
        ];
    }

    public function afterLogin(\Enlight_Event_EventArgs $args)
    {
        $config = $this->container->get('config');

        if (!$config->get('useSltCookie')) {
            return;
        }

        if (!$this->container->initialized('front')) {
            return;
        }

        /** @var \Enlight_Controller_Front $controller */
        $controller = $this->container->get('front');

        $request = $controller->Request();

        $session = $this->container->get('session');
        if($session->offsetGet('sOneTimeAccount')){
            $controller->Response()->setCookie(
                'slt',
                null,
                strtotime('-1 Year'),
                $request->getBasePath() . '/'
            );
        }
    }

}
//