<?php
namespace Craft;
require_once __DIR__.'/twigextensions/Cell.php';
require_once __DIR__.'/twigextensions/SealinkTwigExtensions.php';

class TwigLinkPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('Sealink Twig Extensions');
    }

    public function getVersion()
    {
        return '0.1.0';
    }

    public function getDeveloper()
    {
        return 'Sealink Travel Group';
    }

    public function getDeveloperUrl()
    {
        return 'https://github.com/sealink';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.twigextensions.SealinkTwigExtensions');
        return new SealinkTwigExtensions();
    }
}
