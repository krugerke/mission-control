<?php
namespace Persistence\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class oDateType extends Type
{
    const ODATE = 'oDate';

    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'DATE';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
		return ($date = date_create_from_format('d-M-y', $value)) ? $date->format('m/d/Y') : $value;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($date = date_create_from_format('m-d-Y', $value)) ? strtoupper($date->format('d-M-y')) : $value;
    }

    public function getName()
    {
        return self::ODATE;
    }
}
