<?php

namespace App\Services\Admin\MemberShipmanagement;

use App\Models\Feature;
use App\Http\Traits\FileManagementTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class FeatureService
{
    use FileManagementTrait;

    public function getFeatures(string $orderBy = 'sort_order', string $order = 'asc')
    {
        return Feature::orderBy($orderBy, $order)->latest();
    }

    public function getFeature(string $encryptedId): Feature|Collection
    {
        return Feature::findOrFail(decrypt($encryptedId));
    }

    public function getDeletedFeature(string $encryptedId): Feature|Collection
    {
        return Feature::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    public function createFeature(array $data): Feature
    {
       
           
            $data['created_by'] = admin()->id;
            $feature = Feature::create($data);
            return $feature;
       
    }

    public function updateFeature(Feature $feature, array $data): Feature
    {
        $data['updated_by'] = admin()->id;
        $feature->update($data);
        return $feature;

    }

    public function delete(Feature $feature): void
    {
        $feature->update(['deleted_by' => admin()->id]);
        $feature->delete();
    }

    public function restore(string $encryptedId): void
    {
        $feature = $this->getDeletedFeature($encryptedId);
        $feature->update(['updated_by' => admin()->id]);
        $feature->restore();
    }

    public function permanentDelete(string $encryptedId): void
    {
        $feature = $this->getDeletedFeature($encryptedId);
        $feature->forceDelete();
    }

    public function toggleStatus(Feature $feature): void
    {
        $feature->update([
            'status' => !$feature->status,
            'updated_by' => admin()->id
        ]);
    }
}