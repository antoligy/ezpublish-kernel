<?php
/**
 * This file is part of the eZ Publish Kernel package
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */

namespace eZ\Bundle\EzPublishElasticsearchBundle\DependencyInjection\Compiler;

/**
 *
 */
class LocationHandlerPass extends ConnectionParameterPass
{
    protected function getServiceId()
    {
        return "ezpublish.spi.search.elasticsearch.location_handler";
    }

    protected function getParameterName()
    {
        return "type_name.location";
    }

    protected function getReplacedArgumentIndex()
    {
        return 3;
    }
}
