<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResources extends JsonResource
{
    protected $dimensions = [100, 200, 500];
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $images = [];
        if ($this->image) {
            $images['original'] = asset("{$this->image->path}/{$this->image->name}");
            foreach ($this->dimensions as $dimension) {
                $images["w-{$dimension}"] = asset("{$this->image->path}/{$dimension}/{$this->image->name}");
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'images' => $images,
            'parent_id' => $this->parent_id,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'parent' => $this->whenLoaded('parent', function () {
                return new CategoryResources($this->parent);
            })
        ];
    }
}