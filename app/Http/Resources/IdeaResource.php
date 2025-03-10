<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IdeaResource extends JsonResource
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

        "id"=>$this->id,
        "idea content"=>$this->comment,
        "idea_owner"=>$this->user->name,
        "comments"=>CommentResource::collection($this->comments)

       ];
    }
}
