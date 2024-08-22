<?php

namespace Core\Traits;

trait ModuleTrait
{
    protected string $contact_module_dir = "A00Contact";
    protected string $user_module_dir = "B00User";
    protected string $payment_module_dir = "C00Payment";
    protected string $organization_module_dir = "D00Organization";
    protected string $event_module_dir = "E00Event";
    protected string $reservation_module_dir = "F00Reservation";
    protected string $notification_module_dir = "G00Notification";
    protected string $chat_module_dir = "H00Chat";

    /**
     * Get the module name from the class namespace.
     *
     * @return string
     */
    public function getModuleName(): string
    {
        $namespaceParts = explode('\\', get_class($this));
        return $namespaceParts[1];
    }
}
