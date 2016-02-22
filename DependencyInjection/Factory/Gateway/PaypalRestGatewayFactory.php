<?php

namespace Payum\Bundle\PayumBundle\DependencyInjection\Factory\Gateway;

use Payum\Bundle\PayumBundle\DependencyInjection\Factory\Gateway\AbstractGatewayFactory;
use Payum\Core\GatewayInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class PaypalRestGatewayFactory extends AbstractGatewayFactory
{
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'paypal_rest';
    }

    /**
     * {@inheritDoc}
     */
    public function addConfiguration(ArrayNodeDefinition $builder)
    {
        parent::addConfiguration($builder);

        $builder->children()
            ->scalarNode('client_id')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('client_secret')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('config_path')->isRequired()->cannotBeEmpty()->end()
        ->end();
    }

    /**
     * {@inheritDoc}
     */
    protected function getPayumGatewayFactoryClass()
    {
        return 'Payum\Paypal\Rest\PaypalRestGatewayFactory';
    }

    /**
     * {@inheritDoc}
     */
    protected function getComposerPackage()
    {
        return 'payum/paypal-rest';
    }
}
