<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = [
        'title', 'body', 'published_at', 'user_id'
    ];
    protected $dates = ['published_at'];
    
    /**
     * scope для того чтобы опубликовывал статьи раньше или равное реального времени
     *
     * @param  mixed $query
     * @return void
     */
    public function scopePublished($query): void
    {
        $query->where('published_at', '<=', Carbon::now());
    }
    
    /**
     * scope для того чтобы не опубликовывал статьи позже реального времени
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeUnpublished($query): void
    {
        $query->where('published_at', '>', Carbon::now());
    }
    
    /**
     * Мутатор для преобразования формата даты публикации
     *
     * @param  mixed $date
     * @return void
     */
    public function setPublishedAtAttribute($date): void
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    
    /**
     * экземпляр Carbon
     *
     * @param  mixed $date
     * @return \Carbon\Carbon
     */
    public function getPublishedAtAttribute($date): \Carbon\Carbon
    {
        return Carbon::parse($date);
    }

    /**
     * Получить пользователя, которому принадлежит статья
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    
    /**
     * Получить теги, связанные с данной статьей
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
    
}
