<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResources extends JsonResource
{
    protected $dimensions = [400, 600, 800];

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $image = [];
        if ($this->image) {
            $image['original'] = asset("images/{$this->image->path}/{$this->image->name}");
            foreach ($this->dimensions as $dimension) {
                $image["w-{$dimension}"] = asset("images/{$this->image->path}/{$dimension}/{$this->image->name}");
            }
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'status' => $this->status,
            'published_at' => $this->published_at === null ? '' : Carbon::parse($this->published_at)->diffForHumans(),
            'image' => $image,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'link' => $this->whenLoaded('link', function () {
                    return $this->link->link;
                }) ?? '',
            'meta_description' => $this->whenLoaded('link', function () {
                    return $this->link->meta_description;
                }) ?? '',
            'categories' => ArticleCategoryResources::collection($this->whenLoaded('categories')),
            'tags' => ArticleTagResources::collection($this->whenLoaded('tags'))
        ];
    }
}
