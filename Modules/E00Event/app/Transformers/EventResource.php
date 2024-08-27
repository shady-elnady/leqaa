<?php

namespace Modules\E00Event\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'hall' => $this->hall,
            'event_paid_status' => $this->event_paid_status,
            'university_id' => $this->university_id,
            'college_id' => $this->college_id,
            'organizer_id' => $this->organizer_id,
            'description' => $this->description,
            'Lecturer_id' => $this->Lecturer_id,
            'lecturer_Financial_dues' => $this->lecturer_Financial_dues,
            'lecturer_financial_system' => $this->lecturer_financial_system,
            'event_type_id' => $this->event_type_id,
            'category_id' => $this->category_id,
            'image' => $this->image,
            'event_status' => $this->event_status,
            'start_date_time' => $this->start_date_time,
        ];
    }
}
