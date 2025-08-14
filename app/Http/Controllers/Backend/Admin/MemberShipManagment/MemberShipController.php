<?php

namespace App\Http\Controllers\Backend\Admin\MemberShipManagment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberShipManagement\MemberShipRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Traits\AuditRelationTraits;
use App\Services\Admin\MemberShipmanagement\MemberShipService;
class MemberShipController extends Controller
{
    use AuditRelationTraits;

    protected MemberShipService $memberShipService;

    public function __construct(MemberShipService $memberShipService)
    {
        $this->memberShipService = $memberShipService;
    }

    public static function middleware(): array
    {
        return [
            'auth:admin',
        ];
    }

    protected function redirectIndex(): RedirectResponse
    {
        return redirect()->route('mm.membership.index');
    }

    protected function redirectTrashed(): RedirectResponse
    {
        return redirect()->route('mm.membership.trash');
    }

    public function index(Request $request): mixed
    {
        if ($request->ajax()) {
            $query = $this->memberShipService->getMemberships();

            return DataTables::eloquent($query)
                ->editColumn('status', fn($membership) => "<span class='badge badge-soft {$membership->status_color}'>{$membership->status_label}</span>")
                ->editColumn('created_by', fn($membership) => $this->creater_name($membership))
                ->editColumn('created_at', fn($membership) => $membership->created_at_formatted)
                ->editColumn('action', fn($membership) => view('components.admin.action-buttons', ['menuItems' => $this->menuItems($membership)])->render())
                ->rawColumns(['status', 'created_by', 'created_at', 'action'])
                ->make(true);
        }

        return view('backend.admin.membership-management.membership.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
            ],
            [
                'routeName' => 'mm.membership.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
            ],
            [
                'routeName' => 'mm.membership.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
            ],
            [
                'routeName' => 'mm.membership.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
            ],
        ];
    }

    public function create(): View
    {
        return view('backend.admin.membership-management.membership.create');
    }

    public function store(MemberShipRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();
            $this->memberShipService->createMembership($validated);
            session()->flash('success', 'Membership created successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Membership creation failed!');
            throw $e;
        }

        return $this->redirectIndex();
    }

    public function show(string $id): JsonResponse
    {
        $data = $this->memberShipService->getMembership($id);
        $data['creater_name'] = $this->creater_name($data);
        $data['updater_name'] = $this->updater_name($data);

        return response()->json($data);
    }

    public function status(string $id): RedirectResponse
    {
        $membership = $this->memberShipService->getMembership($id);
        $this->memberShipService->toggleStatus($membership);
        session()->flash('success', 'Membership status updated successfully!');

        return redirect()->back();
    }

    public function edit(string $id): View
    {
        $data['membership'] = $this->memberShipService->getMembership($id);

        return view('backend.admin.membership-management.membership.edit', $data);
    }

    public function update(MembershipRequest $request, string $id): RedirectResponse
    {
        try {
            $membership = $this->memberShipService->getMembership($id);
            $validated = $request->validated();
            $this->memberShipService->updateMembership($membership, $validated);
            session()->flash('success', 'Membership updated successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Membership update failed!');
            throw $e;
        }

        return $this->redirectIndex();
    }

    public function destroy(string $id): RedirectResponse
    {
        try {
            $membership = $this->memberShipService->getMembership($id);
            $this->memberShipService->delete($membership);
            session()->flash('success', 'Membership deleted successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Membership delete failed!');
            throw $e;
        }

        return $this->redirectIndex();
    }

    public function trash(Request $request): mixed
    {
        if ($request->ajax()) {
            $query = $this->memberShipService->getMemberships()->onlyTrashed();

            return DataTables::eloquent($query)
                ->editColumn('status', fn($membership) => "<span class='badge badge-soft {$membership->status_color}'>{$membership->status_label}</span>")
                ->editColumn('deleted_by', fn($membership) => $this->deleter_name($membership))
                ->editColumn('deleted_at', fn($membership) => $membership->deleted_at_formatted)
                ->editColumn('action', fn($membership) => view('components.admin.action-buttons', [
                    'menuItems' => $this->trashedMenuItems($membership),
                ])->render())
                ->rawColumns(['status','deleted_by', 'deleted_at', 'action'])
                ->make(true);
        }

        return view('backend.admin.membership-management.membership.trash');
    }

    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'mm.membership.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
            ],
            [
                'routeName' => 'mm.membership.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
            ],
        ];
    }

    public function restore(string $id): RedirectResponse
    {
        try {
            $this->memberShipService->restore($id);
            session()->flash('success', 'Membership restored successfully');
        } catch (\Throwable $e) {
            session()->flash('error', 'Membership restore failed');
            throw $e;
        }

        return $this->redirectTrashed();
    }

    public function permanentDelete(string $id): RedirectResponse
    {
        try {
            $this->memberShipService->permanentDelete($id);
            session()->flash('success', 'Membership permanently deleted successfully');
        } catch (\Throwable $e) {
            session()->flash('error', 'Membership permanent delete failed');
            throw $e;
        }

        return $this->redirectTrashed();
    }
}
