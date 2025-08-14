<?php

namespace App\Services\Admin\Article;

use App\Http\Traits\FileManagementTrait;
use App\Models\Articles;

;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ArticleService
{
    use FileManagementTrait;

    public function getArticles( $order = 'asc')
    {
        return Articles::orderBy('sort_order', $order)->latest();
    }
    public function getArticle(string $encryptedId): Articles|Collection
    {
        return Articles::findOrFail(decrypt($encryptedId));
    }
    public function getDeletedArticle(string $encryptedId): Articles|Collection
    {
        return Articles::onlyTrashed()->findOrFail(decrypt($encryptedId));
    }

    public function createArticle(array $data, $file = null): Articles
    {
      
        return DB::transaction(function () use ($data, $file) {
            if ($file) {
                $data['image'] = $this->handleFileUpload($file, 'articles');
            }
           
            $data['created_by'] = admin()->id;
            $article = Articles::create($data);
            return $article;
        });
    }

    public function updateArticle(Articles $article, array $data, $file = null): Articles
    {
        return DB::transaction(function () use ($article, $data, $file) {
            if ($file) {
                $data['image'] = $this->handleFileUpload($file, 'articles',);
                $this->fileDelete($article->image);
            }
            $data['status'] = $data['status'] ?? $article->status;
            $data['updated_by'] = admin()->id;
            $article->update($data);
            return $article;
        });
    }

    public function delete(Articles $article): void
    {
        $article->update(['deleted_by' => admin()->id]);
        $article->delete();
    }

     public function deletePermanent(Articles $article, $id): void
    {
        $article->delete();
    }

   public function restore(Articles $article, $id): void
    {
        $article->restore();
   }

    public function toggleStatus(Articles $article): void
    {
        $article->update([
            'status' => !$article->status,
            'updated_by' => admin()->id
        ]);
    }
}

