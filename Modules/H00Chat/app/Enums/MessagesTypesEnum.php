<?php

namespace Modules\H00Chat\Enums;

enum MessagesTypesEnum: string
{
    case Text = 'Text';
    case Image = 'Image';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::Text => 'Text',
            self::Image => 'Image',
        };
    }
}
