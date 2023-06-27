<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $name = $this->name ;
        $newName = 'Skill Name : '.$name;
        return [
            'id'=>$this->id,
            'name'=>$newName,
            'image' => asset('/storage/'.$this->image)
        ];
    }
}
