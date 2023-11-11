<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogsTypeController;
use App\Models\blog;

Route::get('/cc', function () {
  $user = auth()->user()->id; 
  dd($user);
});

Route::get('/test', function () {

  // $blogs = blog::where('user_id',1)->first(); 
  $blogs = blog::where('user_id',1)->first(); 

  // if(isset($blogs->mBlogImages) && count($blogs->mBlogImages) > 0){
  //   foreach($blogs->mBlogImages as $row){
  //       echo "<br>".$row->image_name."<br>";

  //       echo '<img src="'.asset('/images/blogs').'/'.$row->image_name.'">';
  //   }
  // }
  // dd($blogs);
});

Route::get('/login', [AuthenController::class, 'index'])->name('login');
Route::post('check-login', [AuthenController::class, 'CheckLogin'])->name('check.login');


Route::middleware(['is_user'])->group(function () {
  Route::post('logout', [AuthenController::class, 'logout'])->name('logout');

  Route::get('/users', [UserController::class, 'index'])->name('users.index');
  Route::get('/users/create', [UserController::class, 'add'])->name('users.add');
  Route::get('/users/edit/{id?}', [UserController::class, 'edit'])->name('users.edit');

  Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
  Route::get('/blog/add', [BlogController::class, 'add'])->name('blog.add');
  Route::get('/blog/edit/{id?}', [BlogController::class, 'edit'])->name('blog.edit');

  Route::post('save-blog', [BlogController::class, 'SaveBlog'])->name('save.blog');
  Route::post('update-blog', [BlogController::class, 'UpdateBlog'])->name('update.blog');
  Route::post('/delete-blog', [BlogController::class, 'DeleteBlog'])->name('delete.blog');

  Route::get('/blogs-type', [BlogsTypeController::class, 'index'])->name('blogs.type.index');
  Route::get('/blogs-type/create', [BlogsTypeController::class, 'add'])->name('blogs.type.add');
  Route::get('/blogs-type/edit/{id?}', [BlogsTypeController::class, 'edit'])->name('blogs.type.edit');
  Route::post('save-blogs-type', [BlogsTypeController::class, 'SaveBlogsType'])->name('save.blogs.type');
  Route::post('update-blogs-type', [BlogsTypeController::class, 'UpdateBlogsType'])->name('update.blogs.type');
  Route::post('delete-blogs-type', [BlogsTypeController::class, 'DeleteBlogsType'])->name('delete.blogs.type');
  





});
