<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $pivot = [];
        if ($request->pivot == 'own') {
            $pivot = ['users'=> UserResourse::collection($this->own)];
        }
        if ($request->pivot == 'users') {
            $pivot = ['users'=>UserResourse::collection($this->users)];
        }
        return
            [
                'id' => $this->id,
                'name' => $this->name,
                'cost' => $this->cost,
            ]+ $pivot;
    }
}
