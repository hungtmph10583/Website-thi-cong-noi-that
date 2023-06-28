<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryGroupController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('test')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('test.index');
});

Route::prefix('tai-khoan')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::get('tao-moi', [UserController::class, 'create'])->name('user.create');
    Route::post('tao-moi', [UserController::class, 'store']);

    Route::get('cap-nhat/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('cap-nhat/{id}', [UserController::class, 'update']);

    Route::get('doi-mat-khau/{id}', [UserController::class, 'changePassword'])->name('user.changePassword');
    Route::post('doi-mat-khau/{id}', [UserController::class, 'postChangePassword']);

    Route::get('cai-lai-mat-khau/{id}', [UserController::class, 'resetPassword'])->name('user.resetPassword');

    Route::get('chi-tiet/{id}', [UserController::class, 'show'])->name('user.show');

    Route::get('thong-ke', [UserController::class, 'statistical'])->name('user.statistical');

    Route::get('xoa/{id}', [UserController::class, 'remove'])->name('user.remove');
});

Route::prefix('san-pham')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');

    Route::get('tao-moi', [ProductController::class, 'addForm'])->name('product.add');
    Route::post('tao-moi', [ProductController::class, 'saveAdd']);

    Route::get('cap-nhat/{id}', [ProductController::class, 'editForm'])->name('product.edit');
    Route::post('cap-nhat/{id}', [ProductController::class, 'saveEdit']);

    Route::get('chi-tiet/{id}', [ProductController::class, 'show'])->name('product.show');

    Route::get('thong-ke', [ProductController::class, 'statistical'])->name('product.statistical');

    Route::get('xoa/{id}', [ProductController::class, 'remove'])->name('product.remove');
    Route::post('upload', [UploadController::class, 'upload'])->name('product.upload');
});

Route::prefix('danh-muc')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');

    Route::get('tao-moi', [CategoryController::class, 'create'])->name('category.create');
    Route::post('tao-moi', [CategoryController::class, 'store']);

    Route::get('cap-nhat/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('cap-nhat/{id}', [CategoryController::class, 'update']);

    Route::get('thong-tin/{id}', [CategoryController::class, 'show'])->name('category.show');

    Route::get('xoa/{id}', [CategoryController::class, 'remove'])->name('category.remove');
});

Route::prefix('nhom-danh-muc')->group(function () {
    Route::get('/', [CategoryGroupController::class, 'index'])->name('categoryGroup.index');

    // Route::get('tao-moi', [CategoryController::class, 'create'])->name('category.create');
    // Route::post('tao-moi', [CategoryController::class, 'store']);

    Route::get('cap-nhat/{id}', [CategoryGroupController::class, 'edit'])->name('categoryGroup.edit');
    Route::post('cap-nhat/{id}', [CategoryGroupController::class, 'update']);

    // Route::get('thong-tin/{id}', [CategoryController::class, 'show'])->name('category.show');

    // Route::get('xoa/{id}', [CategoryController::class, 'remove'])->name('category.remove');
});

Route::prefix('bai-viet')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');

    Route::get('tao-moi', [PostController::class, 'create'])->name('post.create');
    Route::post('tao-moi', [PostController::class, 'store']);

    Route::get('cap-nhat/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('cap-nhat/{id}', [PostController::class, 'update']);

    Route::post('ckeditor/image_upload', [PostController::class, 'upload'])->name('post.upload');

    Route::get('chi-tiet/{id}', [PostController::class, 'show'])->name('post.show');

    Route::get('xoa/{id}', [PostController::class, 'remove'])->name('post.remove');
});

Route::prefix('vat-lieu')->group(function () {
    Route::get('/', [MaterialController::class, 'index'])->name('material.index');

    Route::get('tao-moi', [MaterialController::class, 'create'])->name('material.create');
    Route::post('tao-moi', [MaterialController::class, 'store']);

    Route::get('cap-nhat/{id}', [MaterialController::class, 'edit'])->name('material.edit');
    Route::post('cap-nhat/{id}', [MaterialController::class, 'update']);

    Route::get('xoa/{id}', [MaterialController::class, 'remove'])->name('material.remove');
});

Route::prefix('cai-dat')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('setting.index');

    Route::get('cap-nhat/{id}', [SettingController::class, 'edit'])->name('setting.edit');
    Route::post('cap-nhat/{id}', [SettingController::class, 'update']);
});

Route::prefix('slider')->group(function () {
    Route::get('/', [SliderController::class, 'index'])->name('slider.index');

    Route::get('tao-moi', [SliderController::class, 'create'])->name('slider.create');
    Route::post('tao-moi', [SliderController::class, 'store']);

    Route::get('cap-nhat/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('cap-nhat/{id}', [SliderController::class, 'update']);

    Route::get('xoa/{id}', [SliderController::class, 'destroy'])->name('slider.remove');
});

?>