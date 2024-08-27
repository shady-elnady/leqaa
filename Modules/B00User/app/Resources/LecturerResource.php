<?php

namespace Modules\B00User\Resources;

use App\Enums\UserTypesEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class LecturerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge([
            'id' => $this->id,
            'account_type' => UserTypesEnum::Lecturer->value,
            'first_name' => $this->whenNotNull($this->first_name),
            'last_name' => $this->whenNotNull($this->last_name),
            'username' => $this->whenNotNull($this->username),
            'created_at' => str_replace(' ago', '', $this->created_at->diffForHumans()),
            // 'country' => CountryResource::make($this->whenLoaded('country')),
            // 'media' => $this->getMedia(),
            // 'contact_info' => $this->getContactInfo(),
            // 'rating' => CustomRatingResource::make($this),
            // 'reviews' => TraderRatingResource::collection($this->whenLoaded('activeRatings')),
            // 'top_products' => ProductResource::collection($this->whenLoaded('topProducts')),
        ], $this->getAdditionalData());
    }

    private function getDefaultAvatar()
    {
        return config('app.url') . "/public/images/users/default.png";
    }


    // private function getSocialMedia()
    // {
    //     $socialMedia = [];

    //     foreach (['website', 'facebook', 'twitter', 'instagram', 'whatsapp'] as $platform) {
    //         if (!is_null($this->{$platform})) {
    //             $socialMedia[] = [
    //                 'image_url' => $this->getSocialMediaIconUrl($platform . '.png'),
    //                 'url' => $platform === 'whatsapp' ? 'https://wa.me/' . $this->{$platform} : $this->{$platform},
    //             ];
    //         }
    //     }

    //     return $socialMedia;
    // }

    // private function getSocialMediaIconUrl($icon)
    // {
    //     return config('app.url') . "/public/images/icons/{$icon}";
    // }

    // private function getLocation()
    // {
    //     return [
    //         'address' => $this->whenNotNull($this->address),
    //         'geo' => [
    //             'lat' => $this->lat,
    //             'lng' => $this->lng,
    //         ],
    //     ];
    // }

    private function getAdditionalData()
    {
        return isset($this->additional['token']) ? ['token' => $this->additional['token']] : [];
    }
}
