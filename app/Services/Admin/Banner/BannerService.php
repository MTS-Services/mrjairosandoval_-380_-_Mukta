<?php

namespace App\Services\Admin\Banner;

use App\Http\Traits\FileManagementTrait;

use App\Models\Banner;;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class BannerService
{
    use FileManagementTrait;

    public function getBanners($orderBy = 'sort_order', $order = 'asc')
    {
        return Banner::orderBy($orderBy, $order)->latest();
    }
    public function getBanner(string $encryptedId): Banner|Collection
    {
        return Banner::findOrFail(decrypt($encryptedId));
    }
    public function getDeletedBanner(string $encryptedId): Banner|Collection
    {
        return Banner::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    public function createBanner(array $data, $file = null): Banner
    {

        return DB::transaction(function () use ($data, $file) {
            if ($file) {
                $data['image'] = $this->handleFileUpload($file, 'banners');
            }

            $data['created_by'] = admin()->id;
            $banner = Banner::create($data);
            return $banner;
        });
    }


    public function updateBanner(Banner $banner, array $data, $file = null): Banner
    {
        return DB::transaction(function () use ($banner, $data, $file) {
            if ($file) {
                $data['image'] = $this->handleFileUpload($file, 'banners',);
                $this->fileDelete($banner->image);
            }

            $data['updated_by'] = admin()->id;
            $banner->update($data);
            return $banner;
        });
    }

    public function delete(Banner $banner): void
    {
        $banner->update(['deleted_by' => admin()->id]);
        $banner->delete();
    }

    public function deletePermanent(Banner $banner, $id): void
    {
        $banner->delete();
    }

    public function restore(Banner $banner, $id): void
    {
        $banner->restore();
    }

    public function toggleStatus(Banner $banner): void
    {
      
        if (!$banner->status) {
            Banner::where('id', '!=', $banner->id)->update([
                'status' => false,
                'updated_by' => admin()->id
            ]);
        }

        $banner->update([
            'status' => !$banner->status,
            'updated_by' => admin()->id
        ]);
    }
}
