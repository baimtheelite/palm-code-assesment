<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);

        $data = [
            'id'            => $this->id,
            'title'         => $this->title,
            'slug'          => $this->slug,
            'content'       => $this->content,
            'excerpt'       => $this->excerpt,
            'status'        => $this->status,
            'published_at'  => $this->published_at,
            'image'        => $this->image,
            'images'        => PostImageResource::make($this->images),
            'categories'    => $this->categories
            // 'images'        => $this->images,
        ];

        // $data['images'] = collect($this->image)->each(function ($image) {
        //     return [
        //         'image' => PostImageResource::make($this->images),
        //         'description' => $imagedescription ?? null,
        //     ];
        // });

        return $data;
    }
}
