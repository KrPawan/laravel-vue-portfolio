<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'skill'=>new SkillResource($this->whenLoaded('skill')),
            'image'=>asset('/storage/'.$this->image),
            'name'=>$this->name,
            'project_url'=>$this->project_url,
        ];
    }
}
