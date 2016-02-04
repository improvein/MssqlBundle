<?php
/**
 * 
 *
 * @author      Ken Golovin <ken@webplanet.co.nz>
 */

namespace Improvein\MssqlBundle\Types;

class ImproveinDateTime extends \DateTime
{
    public function __toString()
    {
        return $this->format('Y-m-d');
    }
}

