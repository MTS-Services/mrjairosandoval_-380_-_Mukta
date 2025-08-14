<?php

namespace App\Services\Admin\Privacys;

use App\Http\Traits\FileManagementTrait;



use App\Models\PrivacyPolicie;

;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PrivacyPoliciService
{
    use FileManagementTrait;

    public function getPrivacys( $order = 'asc')
    {
        return PrivacyPolicie::orderBy('sort_order', $order)->latest();
    }
    public function getPrivacy(string $encryptedId): PrivacyPolicie|Collection
    {
        return PrivacyPolicie::findOrFail(decrypt($encryptedId));
    }
    public function getDeletedPrivacy(string $encryptedId): PrivacyPolicie|Collection
    {
        return PrivacyPolicie::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    public function createPrivacy(array $data): PrivacyPolicie
    {
      
        return DB::transaction(function () use ($data) {
            $data['created_by'] = admin()->id;
            $privacy = PrivacyPolicie::create($data);
            return $privacy;
        });
    }


    public function updatePrivacy(PrivacyPolicie $privacy, array $data, ): PrivacyPolicie
    {
        return DB::transaction(function () use ($privacy, $data) {
            
            $data['status'] = $data['status'] ?? $privacy->status;
            $data['updated_by'] = admin()->id;
            $privacy->update($data);
            return $privacy;
        });
    }

    public function delete(PrivacyPolicie $privacy): void
    {
        $privacy->update(['deleted_by' => admin()->id]);
        $privacy->delete();
    }

     public function deletePermanent(PrivacyPolicie $privacy, $id): void
    {
        $privacy->delete();
    }

   public function restore(PrivacyPolicie $privacy, $id): void
    {
        $privacy->restore();
   }

    public function toggleStatus(PrivacyPolicie $privacy): void
    {
        $privacy->update([
            'status' => !$privacy->status,
            'updated_by' => admin()->id
        ]);
    }
}

