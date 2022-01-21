<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;

Auth::routes();

Route::get("/home", [HomeController::class, "index"])->name("home");

Route::group(["middleware" => ["auth", "has.permission"]], function () {
    Route::get("/", function () {
        return view("welcome");
    });
    Route::resource("roles", RoleController::class);
    Route::resource("departments", DepartmentController::class);
    Route::resource("users", UserController::class);
    Route::resource("permissions", PermissionController::class);
    Route::resource("leaves", LeaveController::class);
    Route::post("accept-reject-leave/{id}", [
        LeaveController::class,
        "acceptReject",
    ])->name("accept.reject");
    Route::resource("notices", NoticeController::class);
});
