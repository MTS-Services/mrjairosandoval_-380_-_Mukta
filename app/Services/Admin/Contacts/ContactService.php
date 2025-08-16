<?php

namespace App\Services\Admin\Contacts;

use App\Http\Traits\FileManagementTrait;


use App\Models\Contact;

;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ContactService
{
    use FileManagementTrait;

    public function getContracts( $order = 'asc')
    {
        return Contact::orderBy('sort_order', $order)->latest();
    }
    public function getContact(string $encryptedId): Contact|Collection
    {
        return Contact::findOrFail(decrypt($encryptedId));
    }
    public function getDeletedContact(string $encryptedId): Contact|Collection
    {
        return Contact::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    public function createContact(array $data, $file = null): Contact
    {
      
        return DB::transaction(function () use ($data, $file) {
           
           
            $data['created_by'] = admin()->id;
            $contact = Contact::create($data);
            return $contact;
        });
    }


    public function updateContact(Contact $contact, array $data, $file = null): Contact
    {
        return DB::transaction(function () use ($contact, $data, $file) {
            
            $data['status'] = $data['status'] ?? $contact->status;
            $data['updated_by'] = admin()->id;
            $contact->update($data);
            return $contact;
        });
    }

    public function delete(Contact $contact): void
    {
        $contact->update(['deleted_by' => admin()->id]);
        $contact->delete();
    }

     public function deletePermanent(Contact $contact, $id): void
    {
        $contact->delete();
    }

   public function restore(Contact $contact, $id): void
    {
        $contact->restore();
   }

    public function toggleStatus(Contact $contact): void
    {
        $contact->update([
            'status' => !$contact->status,
            'updated_by' => admin()->id
        ]);
    }
}

