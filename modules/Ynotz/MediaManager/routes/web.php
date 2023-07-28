<?php
use Illuminate\Support\Facades\Route;
use Ynotz\MediaManager\Http\Controllers\MediaController;

Route::get('images/{variant}/{ulid}/{imagename}')->name('easyadmin.image');
Route::post('mm/uploadfile', [MediaController::class, 'fileUpload'])->name('mediamanager.file_upload');
Route::delete('mm/deletefile', [MediaController::class, 'fileDelete'])->name('mediamanager.file_delete');
Route::get('mm/gallery', [MediaController::class, 'gallery'])->name('mediamanager.gallery');
?>
