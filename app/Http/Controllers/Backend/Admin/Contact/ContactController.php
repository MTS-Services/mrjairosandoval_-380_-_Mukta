<?php

namespace App\Http\Controllers\Backend\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\ContactRequest;
use App\Http\Traits\AuditRelationTraits;
use App\Models\Contact;
use App\Services\Admin\Contacts\ContactService;
use GuzzleHttp\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
     use AuditRelationTraits;
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
     protected function redirectIndex(): RedirectResponse
    {
        return redirect()->route('cm.contact.index');
    }

    protected function redirectTrashed(): RedirectResponse
    {
        return redirect()->route('cm.contact.trash');
    }


     public static function middleware(): array
    {
        return [
            'auth:admin', // Applies 'auth:admin' to all methods

            // Permission middlewares using the Middleware class
            new Middleware('permission:banner-list', only: ['index']),
            new Middleware('permission:banner-details', only: ['show']),
            new Middleware('permission:banner-create', only: ['create', 'store']),
            new Middleware('permission:banner-edit', only: ['edit', 'update']),
            new Middleware('permission:banner-delete', only: ['destroy']),
            new Middleware('permission:banner-trash', only: ['trash']),
            new Middleware('permission:banner-restore', only: ['restore']),
            new Middleware('permission:banner-permanent-delete', only: ['permanentDelete']),
            //add more permissions if needed
        ];
    }
  
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
         if ($request->ajax()) {
            $query = $this->contactService->getContracts();
            return DataTables::eloquent($query)
                ->editColumn('created_by', function ($banner) {
                    return $this->creater_name($banner);
                })
                ->editColumn('created_at', function ($banner) {
                    return $banner->created_at;
                })
                ->editColumn('action', function ($banner) {
                    $menuItems = $this->menuItems($banner);
                    return view('components.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['action', 'created_by', 'created_at',])
                ->make(true);
        }
        return view('backend.admin.contacts.index');
    }

     

      protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['permission-list', 'permission-delete', 'permission-status']
            ],
            [
                'routeName' => 'cm.contact.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['permission-edit']
            ],

            [
                'routeName' => 'cm.contact.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['permission-delete']
            ]

        ];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        
     try {
            $validated = $request->validated();
            $this->contactService->createContact($validated);
            session()->flash('success', 'Contact created successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Contact create failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $data = $this->contactService->getContact($id);
        $data['creater_name'] = $this->creater_name($data);
        $data['updater_name'] = $this->updater_name($data);
       
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['contact'] = $this->contactService->getContact($id);
        return view('backend.admin.contacts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, string $id)
    {
        try {
            $validated = $request->validated();
            $this->contactService->updateContact($this->contactService->getContact($id), $validated);
            session()->flash('success', 'Contact updated successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Contact update failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $contact = $this->contactService->getContact($id);
            $this->contactService->delete($contact);
            session()->flash('success', 'Contact deleted successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Contact delete failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }

     public function trash(Request $request)
    {
         if ($request->ajax()) {
            $query = $this->contactService->getContracts()->onlyTrashed();
            return DataTables::eloquent($query)
                ->editColumn('deleted_by', function ($contact) {
                    return $this->creater_name($contact);
                })
                ->editColumn('created_at', fn($contact) => $contact->created_at_formatted)
               ->editColumn('action', fn($contact) => view('components.admin.action-buttons', [
                    'menuItems' => $this->menuItemsTrashed($contact),
                ])->render())
                ->rawColumns(['status','action', 'deleted_by', 'created_at',])
                ->make(true);
        }
        return view('backend.admin.contacts.trash');
    }

     

      protected function menuItemsTrashed($model): array
    {
        return [
           [
                'routeName' => 'cm.contact.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
            ],
            [
                'routeName' => 'cm.contact.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
            ]
           

        ];
    }


 public function restore(string $id): RedirectResponse
    {
        try {
            $contact = Contact::onlyTrashed()->findOrFail(decrypt($id));

            $this->contactService->restore($contact, $id);
            session()->flash('success', "Banner restored successfully");
        } catch (\Throwable $e) {
            session()->flash('Banner restore failed');
            throw $e;
        }
        return $this->redirectTrashed();
    }


    public function permanentDelete(string $encryptedId): RedirectResponse
    {
        try {
            $id = decrypt($encryptedId);
            $contact = Contact::onlyTrashed()->findOrFail($id);

            $this->contactService->deletePermanent($contact, $id);
            $contact->forceDelete();

            session()->flash('success', 'Banner permanently deleted successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Banner permanent delete failed');
            throw $e;
        }
        return $this->redirectTrashed();
    }
}
