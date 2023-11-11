<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    // ระบุฟิลด์ที่จะนำไปใช้งาน
    protected $fillable = [
        "type_id",
        "title",
        "title_sub",
        "description",
        "images",
        "file_pdf_name",
        "link_youtube",

        "meta_title",
        "meta_description",
        "meta_keywords",

        "count_view",
        "status",
        "user_id"
    ];

    //สร้าง Relationship 1:1 ระหว่างตาราง users กับ blog
    public function rType(): HasOne
    {
        return $this->hasOne(blog_type::class, 'id', 'type_id');
    }

    //สร้าง Relationship 1:1 ระหว่างตาราง users กับ blog
    public function rUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    //สร้าง Relationship 1:M ระหว่างตาราง blog กับ blog_images
    public function mBlogImages(): HasMany
    {
        return $this->hasMany(blog_image::class, 'blog_id', 'id')->orderBy('id', 'DESC');
    }

}
