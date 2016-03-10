<?php

/*
 * This file is part of the Symfony framework.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Improvein\MssqlBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Doctrine\DBAL\Types\Type;

class ImproveinMssqlBundle extends Bundle
{
    public function boot()
    {
        // Register custom data types
        if(!Type::hasType('uniqueidentifier')) {
            Type::addType('uniqueidentifier', 'Improvein\MssqlBundle\Types\UniqueidentifierType');
        }
        
        if(!Type::hasType('geography')) {
            Type::addType('geography', 'Improvein\MssqlBundle\Types\PointType');
        }

        Type::overrideType(Type::DATE, 'Improvein\MssqlBundle\Types\DateType');        
        Type::overrideType(Type::DATETIME, 'Improvein\MssqlBundle\Types\DateTimeType');
        
        Type::overrideType(Type::TEXT, 'Improvein\MssqlBundle\Types\TextType');
        Type::overrideType(Type::STRING, 'Improvein\MssqlBundle\Types\StringType');
    }
}
