<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// ── Public Routes ──────────────────────────────────────────────
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Breeze default — redirect to admin dashboard
Route::get('/dashboard', fn() => redirect()->route('admin.dashboard'))->middleware(['auth'])->name('dashboard');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// AI Chatbot API
Route::post('/chatbot', [ChatbotController::class, 'chat'])->name('chatbot.chat');

// ── Admin Routes ────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Resource routes
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('skills', SkillController::class)->except(['show']);
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::resource('blogs', AdminBlogController::class)->except(['show']);
    Route::resource('testimonials', TestimonialController::class)->except(['show']);
    Route::resource('clients', ClientController::class)->except(['show']);

    // Contacts (read-only CRUD + status update)
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::patch('contacts/{contact}', [AdminContactController::class, 'update'])->name('contacts.update');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});

// Breeze auth routes (login only for admin)
require __DIR__.'/auth.php';
