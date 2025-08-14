<?php

namespace App\Services\Admin\Service;

use App\Http\Traits\FileManagementTrait;

use App\Models\Services;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class Service
{
    use FileManagementTrait;

    public function getServices( $order = 'asc')
    {
        return Services::orderBy('sort_order', $order)->latest();
    }
    public function getService(string $encryptedId): Services|Collection
    {
        return Services::findOrFail(decrypt($encryptedId));
    }
    public function getDeletedService(string $encryptedId): Services|Collection
    {
        return Services::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    public function createService(array $data, $file = null): Services
    {
        return DB::transaction(function () use ($data, $file) {
            if ($file) {
                $data['icon'] = $this->handleFileUpload($file, 'services');
            }
           
            $data['created_by'] = admin()->id;
            $service = Services::create($data);
            return $service;
        });
    }

    public function updateService(Services $service, array $data, $file = null): Services
    {
        return DB::transaction(function () use ($service, $data, $file) {
            if ($file) {
                $data['icon'] = $this->handleFileUpload($file, 'services',);
                $this->fileDelete($service->image);
            }
            $data['status'] = $data['status'] ?? $service->status;
            $data['updated_by'] = admin()->id;
            $service->update($data);
            return $service;
        });
    }

    public function delete(Services $service): void
    {
        $service->update(['deleted_by' => admin()->id]);
        $service->delete();
    }

     public function deletePermanent(Services $service, $id): void
    {
        $service->delete();
    }

   public function restore(Services $service, $id): void
    {
        $service->restore();
   }

    public function toggleStatus(Services $service): void
    {
        $service->update([
            'status' => !$service->status,
            'updated_by' => admin()->id
        ]);
    }
}

