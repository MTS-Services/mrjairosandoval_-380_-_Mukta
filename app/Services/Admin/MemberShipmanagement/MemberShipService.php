<?php

namespace App\Services\Admin\MemberShipmanagement;

use App\Models\Membership;
use App\Http\Traits\FileManagementTrait;
use Illuminate\Database\Eloquent\Collection;

class MemberShipService
{
    use FileManagementTrait;

    public function getMemberships(string $orderBy = 'sort_order', string $order = 'asc')
    {
        return Membership::orderBy($orderBy, $order)->latest();
    }

    public function getMembership(string $encryptedId): Membership|Collection
    {
        return Membership::findOrFail(decrypt($encryptedId));
    }

    public function getDeletedMembership(string $encryptedId): Membership|Collection
    {
        return Membership::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    public function createMembership(array $data): Membership
    {
     
        $data['created_by'] = admin()->id;
        $membership = Membership::create($data);

        return $membership;
    }

    public function updateMembership(Membership $membership, array $data): Membership
    {
        $data['updated_by'] = admin()->id;

        $membership->update($data);

        return $membership;
    }

    public function delete(Membership $membership): void
    {
        $membership->update(['deleted_by' => admin()->id]);
        $membership->delete();
    }

    public function restore(string $encryptedId): void
    {
        $membership = $this->getDeletedMembership($encryptedId);
        $membership->update(['updated_by' => admin()->id]);
        $membership->restore();
    }

    public function permanentDelete(string $encryptedId): void
    {
        $membership = $this->getDeletedMembership($encryptedId);
        $membership->forceDelete();
    }

    public function toggleStatus(Membership $membership): void
    {
        $membership->update([
            'status' => !$membership->status,
            'updated_by' => admin()->id
        ]);
    }
}
