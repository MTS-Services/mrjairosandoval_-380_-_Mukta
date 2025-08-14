<?php

namespace App\Http\Controllers\Backend\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\ArticleRequest;
use App\Http\Traits\AuditRelationTraits;
use App\Models\Articles;
use GuzzleHttp\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Services\Admin\Article\ArticleService;

class ArticleController extends Controller
{
    use AuditRelationTraits;
    protected ArticleService $article;

    public function __construct(ArticleService $article)
    {
        $this->article = $article;
    }
     protected function redirectIndex(): RedirectResponse
    {
        return redirect()->route('');
    }

    protected function redirectTrashed(): RedirectResponse
    {
        return redirect()->route('');
    }


     public static function middleware(): array
    {
        return [
            'auth:admin', // Applies 'auth:admin' to all methods

            // Permission middlewares using the Middleware class
            new Middleware('permission:article-list', only: ['index']),
            new Middleware('permission:article-details', only: ['show']),
            new Middleware('permission:article-create', only: ['create', 'store']),
            new Middleware('permission:article-edit', only: ['edit', 'update']),
            new Middleware('permission:article-delete', only: ['destroy']),
            new Middleware('permission:article-trash', only: ['trash']),
            new Middleware('permission:article-restore', only: ['restore']),
            new Middleware('permission:article-permanent-delete', only: ['permanentDelete']),
            //add more permissions if needed
        ];
    }
  
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
         if ($request->ajax()) {
            $query = $this->article->getArticles();
            return DataTables::eloquent($query)
            
                ->editColumn('status', fn($article) => "<span class='badge badge-soft {$article->status_color}'>{$article->status_label}</span>")
              
                ->editColumn('created_by', function ($article) {
                    return $this->creater_name($article);
                })
                ->editColumn('created_at', function ($article) {
                    return $article->created_at;
                })
                ->editColumn('action', function ($article) {
                    $menuItems = $this->menuItems($article);
                    return view('components.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status','action', 'created_by', 'created_at',])
                ->make(true);
        }
        return view('backend.admin.articles.index');
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
            // [
            //     'routeName' => 'sm.service.edit',
            //     'params' => [encrypt($model->id)],
            //     'label' => 'Edit',
            //     'permissions' => ['permission-edit']
            // ],
            // [
            //     'routeName' => 'sm.service.status',
            //     'params' => [encrypt($model->id)],
            //     'label' => $model->status ? 'Inactive' : 'Activate',
            //     'status' => true,
            //     'permissions' => ['permission-status']
            // ],

            // [
            //     'routeName' => 'sm.service.destroy',
            //     'params' => [encrypt($model->id)],
            //     'label' => 'Delete',
            //     'delete' => true,
            //     'permissions' => ['permission-delete']
            // ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        try {
            $validated = $request->validated();
            $file = $request->validated('image') && $request->hasFile('image') ? $request->file('image') : null;
            $this->article->createArticle($validated, $file);
            session()->flash('success', 'Article created successfully!');
        } catch (\Throwable $e) {
            session()->flash('error', 'Article create failed!');
            throw $e;
        }
        return $this->redirectIndex();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
