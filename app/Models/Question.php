<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Hash;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'name_hash',
        'email_hash',
        'category_id',
        'is_approved',
        'is_featured',
        'views_count',
        'answered_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($question) {
            if (empty($question->name_hash)) {
                $question->name_hash = Hash::make('Anoniem');
            }
            if (empty($question->email_hash)) {
                $question->email_hash = Hash::make('anonymous@example.com');
            }
        });
    }

    protected $casts = [
        'is_approved' => 'boolean',
        'is_featured' => 'boolean',
        'answered_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeAnswered($query)
    {
        return $query->whereNotNull('answer');
    }

    public function scopeUnanswered($query)
    {
        return $query->whereNull('answer');
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('question', 'like', "%{$search}%")
                    ->orWhere('answer', 'like', "%{$search}%");
    }

    public function scopeWithTags($query, $tagIds)
    {
        return $query->whereHas('tags', function ($q) use ($tagIds) {
            $q->whereIn('tags.id', $tagIds);
        });
    }

    public function incrementViews()
    {
        $this->increment('views_count');
    }

    public function setAnswered()
    {
        $this->update(['answered_at' => now()]);
    }

    // Static method to create question with hashed personal data
    public static function createWithHashedData(array $data)
    {
        $data['name_hash'] = Hash::make($data['name'] ?? '');
        $data['email_hash'] = Hash::make($data['email'] ?? '');
        
        // Remove original name and email from data
        unset($data['name'], $data['email']);
        
        return static::create($data);
    }
}