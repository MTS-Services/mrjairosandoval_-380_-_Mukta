<?php

namespace App\Services\Admin\ArticleManagement;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Traits\FileManagementTrait;

class ArticleCategoryService
{
    use FileManagementTrait;

    /**
     * Get all article categories ordered by a specific column.
     */
    public function getCategories(string $orderBy = 'sort_order', string $order = 'asc')
    {
        return ArticleCategory::orderBy($orderBy, $order)->latest();
    }

    /**
     * Get a single article category by encrypted ID.
     */
    public function getCategory(string $encryptedId): ArticleCategory|Collection
    {
        return ArticleCategory::findOrFail(decrypt($encryptedId));
    }

    /**
     * Get a deleted (trashed) article category by encrypted ID.
     */
    public function getDeletedCategory(string $encryptedId): ArticleCategory|Collection
    {
        return ArticleCategory::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    /**
     * Create a new article category, optionally with an image file.
     */
    public function createCategory(array $data): ArticleCategory
    {

        $data['created_by'] = admin()->id;
        return ArticleCategory::create($data);
    }

    /**
     * Update an existing article category, optionally with a new image file.
     */
    public function updateCategory(ArticleCategory $category, array $data): ArticleCategory
    {
 

        $data['updated_by'] = admin()->id;
        $category->update($data);

        return $category;
    }

    /**
     * Soft delete an article category.
     */
    public function delete(ArticleCategory $category): void
    {
        $category->update(['deleted_by' => admin()->id]);
        $category->delete();
    }

    /**
     * Permanently delete an article category.
     */
    public function deletePermanent(string $encryptedId): void
    {
        $category = $this->getDeletedCategory($encryptedId);
        $category->forceDelete();
    }

    /**
     * Restore a soft-deleted article category.
     */
    public function restore(string $encryptedId): void
    {
        $category = $this->getDeletedCategory($encryptedId);
        $category->update(['updated_by' => admin()->id]);
        $category->restore();
    }

    /**
     * Toggle article category status (active/inactive).
     */
    public function toggleStatus(ArticleCategory $category): void
    {
        $category->update([
            'status' => !$category->status,
            'updated_by' => admin()->id,
        ]);
    }
}
