<?php

namespace Passioneight\Bundle\BundleTemplateBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Passioneight\Bundle\BundleTemplateBundle\Constant\Configuration as Config;

class BundleTemplateExtension extends ConfigurableExtension
{
    /**
     * @inheritDoc
     * @throws \Exception
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('config.yml');

        $this->populateContainer($mergedConfig, $container);
    }

    /**
     * Populates the container in order to access the configuration later on, if needed.
     * @param array $config
     * @param ContainerBuilder $container
     */
    public function populateContainer(array $config, ContainerBuilder $container)
    {
        $container->setParameter(Config::ROOT, $config);
    }
}
