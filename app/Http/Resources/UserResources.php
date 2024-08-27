<?php

namespace  App\Http\Resources;

use App\Enums\UserTypesEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->uuid,
            'account_type' => UserTypesEnum::User->value,
            'first_name' => $this->whenNotNull($this->first_name),
            'last_name' => $this->whenNotNull($this->last_name),
            'username' => $this->whenNotNull($this->username),
            // 'location' => [
            //     'address' => $this->whenNotNull($this->address),
            //     'geo' => [
            //         'lat' => $this->whenNotNull($this->lat),
            //         'lng' => $this->whenNotNull($this->lng),
            //     ]
            // ],
            // 'country' => CountryResource::make($this->whenLoaded('country')),
            // 'contact_info' => [
            //     'email' => $this->whenNotNull($this->email),
            //     'phone' => $this->whenNotNull($this->phone),
            //     'address' => $this->whenNotNull($this->address)
            // ],
            'created_at' => str_replace(' ago', '', $this->created_at?->diffForHumans()),
            'avatar' => $this->avatar ?? $this->getDefaultAvatar(),
            'gender' => $this->gender,
            'is_active' => $this->is_active,
        ];

        if (isset($this->additional['token'])) {
            $data['token'] = $this->additional['token'];
        }

        return $data;
    }

    private function getDefaultAvatar()
    {
        return config('app.url') . "/public/images/users/default.png";
    }
}
