<?php
/**
 * Overrides default TextType type to fix the encoding issues
 *
 * @author      Diego Gurpegui
 */

namespace Improvein\MssqlBundle\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\TextType as BaseTextType;
use Doctrine\DBAL\Types\ConversionException;

/**
 * Type that maps an SQL VARCHAR (?) to a PHP DateTime object.
 *
 */
class TextType extends BaseTextType
{
    public function getName()
    {   
        return Type::TEXT;
    }   

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {   
        if($value !== null) {
            $value = utf8_decode($value);
        }
        
        return parent::convertToDatabaseValue($value, $platform);
    }   
    
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {   
        if ($value !== null) {
            $value = utf8_encode($value);
        }   

        return parent::convertToPHPValue($value, $platform);
    }       


}
