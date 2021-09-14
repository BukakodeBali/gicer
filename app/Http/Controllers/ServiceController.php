<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Models\Service;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    use ImageUploadTrait;
    protected $dimensions = [400, 600, 800];
    protected $module = 'layanan';

    public function store(ServiceStoreRequest $request)
    {
        $service = Service::make($request->only([
            'title',
            'content'
        ]));

        $service->setCreatedBy(Auth::user());
        $service->setUpdatedBy(Auth::user());

        DB::beginTransaction();
        try {
            $service->save();
            $service->link()->create([
                'meta_description' => $request->getMetaDescription(),
                'link' => $request->getArticleLink()
            ]);

            if ($request->hasFile('image')) {
                $image = $request->image;
                $imagePath = 'services';
                $imageName = $this->doUploadImage($imagePath, $image, $this->dimensions);
                $service->image()->create([
                    'path' => $imagePath,
                    'name' => $imageName
                ]);
            }

            DB::commit();
            return $this->storeTrue($this->module);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return $this->storeFalse($this->module);
        }
    }

    public function update(ServiceStoreRequest $request, $id)
    {
        $service = Service::find($id);
        if (!$service) {
            return $this->dataNotFound($this->module);
        }

        $service->fill($request->only([
            'title',
            'content'
        ]));

        $service->setUpdatedBy(Auth::user());

        DB::beginTransaction();
        try {
            $service->save();
            $link = [
                'link' => $request->getArticleLink(),
                'meta_description' => $request->getMetaDescription()
            ];

            if ($service->link) {
                $service->link()->update($link);
            } else {
                $service->link()->create($link);
            }

            if ($request->hasFile('image')) {
                $image = $request->image;
                $imagePath = 'services';
                $imageName = $this->doUploadImage($imagePath, $image, $this->dimensions);
                $updatedData = [
                    'path' => $imagePath,
                    'name' => $imageName
                ];

                if ($service->image) {
                    $service->image()->update($updatedData);
                } else {
                    $service->image()->create($updatedData);
                }
            }

            DB::commit();
            return $this->updateTrue($this->module);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->updateFalse($this->module);
        }
    }

    public function destroy($id)
    {
        if (auth()->user()->cannot('delete service')) {
            return $this->unAuthorized();
        }

        $service = Service::find($id);
        if (!$service) {
            return $this->dataNotFound($this->module);
        }

        return $service->delete() ? $this->destroyTrue($this->module) : $this->destroyFalse($this->module);
    }
}
