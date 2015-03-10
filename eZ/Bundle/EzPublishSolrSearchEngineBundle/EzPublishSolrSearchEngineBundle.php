<?php
/**
 * This file is part of the eZ Publish Kernel package
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */

namespace eZ\Bundle\EzPublishSolrSearchEngineBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use eZ\Publish\Core\Base\Container\Compiler\Search\Solr\AggregateCriterionVisitorPass;
use eZ\Publish\Core\Base\Container\Compiler\Search\Solr\AggregateFacetBuilderVisitorPass;
use eZ\Publish\Core\Base\Container\Compiler\Search\Solr\AggregateFieldValueMapperPass;
use eZ\Publish\Core\Base\Container\Compiler\Search\Solr\AggregateSortClauseVisitorPass;
use eZ\Publish\Core\Base\Container\Compiler\Search\FieldRegistryPass;
use eZ\Publish\Core\Base\Container\Compiler\Search\SignalSlotPass;
use eZ\Bundle\EzPublishSolrSearchEngineBundle\DependencyInjection\Compiler;

class EzPublishSolrSearchEngineBundle extends Bundle
{
    public function build( ContainerBuilder $container )
    {
        parent::build( $container );
        $container->addCompilerPass( new AggregateCriterionVisitorPass );
        $container->addCompilerPass( new AggregateFacetBuilderVisitorPass );
        $container->addCompilerPass( new AggregateFieldValueMapperPass );
        $container->addCompilerPass( new AggregateSortClauseVisitorPass );
        $container->addCompilerPass( new FieldRegistryPass );
        $container->addCompilerPass( new SignalSlotPass );

        $connectionParameterFactoryId = "ezpublish.solr.connection_parameter_factory";
        $container->addCompilerPass( new Compiler\HttpClientPass( $connectionParameterFactoryId ) );
    }

    public function getContainerExtension()
    {
        if ( !isset( $this->extension ) )
        {
            $this->extension = new DependencyInjection\EzPublishSolrSearchEngineExtension();
        }

        return $this->extension;
    }
}
