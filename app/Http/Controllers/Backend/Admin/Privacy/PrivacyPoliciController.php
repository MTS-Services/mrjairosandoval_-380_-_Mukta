<?php

namespace App\Http\Controllers\Backend\Admin\Privacy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Privacys\PrivacyPolicieRequest;
use App\Http\Traits\AuditRelationTraits;
use App\Models\PrivacyPolicie;
use App\Services\Admin\Privacys\PrivacyPoliciService;

use GuzzleHttp\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PrivacyPoliciController extends Controller
{
    use AuditRelationTraits;
    protected PrivacyPoliciService $privacyPoliciService;

   public function __construct(PrivacyPoliciService $privacyPoliciService)
{
    $this->privacyPoliciService = $privacyPoliciService;
}
     protected function redirectIndex(): RedirectResponse
    {
        return redirect()->route('pm.privacy-policy.index');
    }

    protected function redirectTrashed(): RedirectResponse
    {
        return redirect()->route('pm.privacy-policy.trash');
    }


     public static function middleware(): array
    {
        return [
            'auth:admin', // Applies 'auth:admin' to all methods

            // Permission middlewares using the Middleware class
            new Middleware('permission:privacy-list', only: ['index']),
            new Middleware('permission:privacy-details', only: ['show']),
            new Middleware('permission:privacy-create', only: ['create', 'store']),
            new Middleware('permission:privacy-edit', only: ['edit', 'update']),
            new Middleware('permission:privacy-delete', only: ['destroy']),
            new Middleware('permission:privacy-trash', only: ['trash']),
            new Middleware('permission:privacy-restore', only: ['restore']),
            new Middleware('permission:privacy-permanent-delete', only: ['permanentDelete']),
            //add more permissions if needed
        ];
    }
  
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
         if ($request->ajax()) {
            $query = $this->privacyPoliciService->getPrivacys();
            return DataTables::eloquent($query)
            
                ->editColumn('status', fn($privacy) => "<span class='badge badge-soft {$privacy->status_color}'>{$privacy->status_label}</span>")
              
                ->editColumn('created_by', function ($privacy) {
                    return $this->creater_name($privacy);
                })
                ->editColumn('created_at', function ($privacy) {
                    return $privacy->created_at;
                })
                ->editColumn('action', function ($privacy) {
                    $menuItems = $this->menuItems($privacy);
                    return view('components.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status','action', 'created_by', 'created_at',])
                ->make(true);
        }
        return view('backend.admin.privacys.index');
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
                'routeName' => 'pm.privacy-policy.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['permission-edit']
            ],
            [
                'routeName' => 'pm.privacy-policy.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status ? 'Inactive' : 'Activate',
                'status' => true,
                'permissions' => ['permission-status']
            ],

            [
                'routeName' => 'pm.privacy-policy.destroy',
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
        return view('backend.admin.privacys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrivacyPolicieRequest $request)
    {
       
        try {
            $validated = $request->validated();
          
            $this->privacyPoliciService->createPrivacy($validated, );
            session()->flash('success', 'Privacy created successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Privacy create failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $data = $this->privacyPoliciService->getPrivacy($id);
          $data['status'] = $data->status ? 'Active' : 'Inactive';
        $data['creater_name'] = $this->creater_name($data);
        $data['updater_name'] = $this->updater_name($data);
       
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['privacy'] = $this->privacyPoliciService->getPrivacy($id);
        return view('backend.admin.privacys.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrivacyPolicieRequest $request, string $id)
    {
        try {
            $validated = $request->validated();
            $this->privacyPoliciService->updatePrivacy($this->privacyPoliciService->getPrivacy($id), $validated);
            session()->flash('success', 'Privacy updated successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Privacy update failed!');
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
            $privacy = $this->privacyPoliciService->getPrivacy($id);
            $this->privacyPoliciService->delete($privacy);
            session()->flash('success', 'Privacy deleted successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Privacy delete failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }
    public function status(string $id)
    {
        try {
            $privacy = $this->privacyPoliciService->getPrivacy($id);
            $this->privacyPoliciService->toggleStatus($privacy);
            session()->flash('success', 'Privacy status updated successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Privacy status update failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }

    public function trash(Request $request)
    {
         if ($request->ajax()) {
            $query = $this->privacyPoliciService->getPrivacys()->onlyTrashed();
            return DataTables::eloquent($query)
                ->editColumn('status', fn($privacy) => "<span class='badge badge-soft {$privacy->status_color}'>{$privacy->status_label}</span>")
                ->editColumn('deleted_by', function ($privacy) {
                    return $this->creater_name($privacy);
                })
                ->editColumn('created_at', fn($privacy) => $privacy->created_at_formatted)
               ->editColumn('action', fn($privacy) => view('components.admin.action-buttons', [
                    'menuItems' => $this->menuItemsTrashed($privacy),
                ])->render())
                ->rawColumns(['status','action', 'deleted_by', 'created_at',])
                ->make(true);
        }
        return view('backend.admin.privacys.trash');
    }

     

      protected function menuItemsTrashed($model): array
    {
        return [
           [
                'routeName' => 'pm.privacy-policy.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
            ],
            [
                'routeName' => 'pm.privacy-policy.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
            ]
           

        ];
    }


 public function restore(string $id): RedirectResponse
    {
        try {
            $privacy = PrivacyPolicie::onlyTrashed()->findOrFail(decrypt($id));

            $this->privacyPoliciService->restore($privacy, $id);
            session()->flash('success', "Privacy restored successfully");
        } catch (\Throwable $e) {
            session()->flash('error', 'Privacy restore failed');
            throw $e;
        }
        return $this->redirectTrashed();
    }


    public function permanentDelete(string $encryptedId): RedirectResponse
    {
        try {
            $id = decrypt($encryptedId);
            $privacy = PrivacyPolicie::onlyTrashed()->findOrFail($id);

            $this->privacyPoliciService->deletePermanent($privacy, $id);
            $privacy->forceDelete();

            session()->flash('success', 'Privacy permanently deleted successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Privacy permanent delete failed');
            throw $e;
        }
        return $this->redirectTrashed();
    }
}
