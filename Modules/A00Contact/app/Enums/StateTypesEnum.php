<?php

namespace Modules\A00Contact\Enums;

enum StateTypesEnum: string
{
    case Taluk = 'Taluk';
    case Village = 'Village'; // القرية
    case District = 'District'; // المنطقة
    case Manor = 'Manor'; // عزبه
    case ResidentialQuarter = 'ResidentialQuarter'; // حى سكنى
    case Housing = 'Housing'; // مساكن
    case Feudalism = 'Feudalism'; // اقطاعيه
    case Region = 'Region'; // منطقه

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::Taluk => 'Taluk',
            self::Village => 'Village',
            self::District => 'District',
            self::Manor => 'Manor',
            self::ResidentialQuarter => 'ResidentialQuarter',
            self::Housing => 'Housing',
            self::Feudalism => 'Feudalism',
            self::Region => 'Region',
        };
    }
}
