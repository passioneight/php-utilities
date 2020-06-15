<?php

namespace Passioneight\Bundle\BundleTemplateBundle\DependencyInjection;

use Passioneight\Bundle\BundleTemplateBundle\Constant\Configuration as Config;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(Config::ROOT);
        $rootNode = $treeBuilder->getRootNode();

        // TODO: actually add configuration for the bundle (if necessary)

        return $treeBuilder;
    }
}
