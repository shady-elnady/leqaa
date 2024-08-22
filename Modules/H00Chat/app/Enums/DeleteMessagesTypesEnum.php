<?php

namespace Modules\H00Chat\Enums;

enum DeleteMessagesTypesEnum: string
{
    case InSenderDevice = 'InSenderDevice';
    case InReceiverDevice = 'InReceiverDevice';
    case InAllDevice = 'InAllDevice';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::InSenderDevice => 'InSenderDevice',
            self::InReceiverDevice => 'InReceiverDevice',
            self::InAllDevice => 'InAllDevice',
        };
    }
}
