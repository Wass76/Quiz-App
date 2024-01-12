<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Question extends JsonResource
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
            'name' => $this->name,
            'answer1'=> $this->answer1,
            'answer2'=> $this->answer2,
            'answer3'=> $this->answer3,
            'answer4'=> $this->answer4,
            'answer5'=> $this->answer5,
            'answer6'=> $this->answer6,
            'answer7'=> $this->answer7,
            'answer8'=> $this->answer8,
            'answer9'=> $this->answer9,
            'answer10'=> $this->answer10,
            'rank'=> $this->rank,
            'category'=> $this->category,
            'created_at' => $this-> created_at,
            'updated_at' => $this -> updated_at
        ];
    }
}
