<?php

use App\Http\Controllers\Admin\AgencyController as AdminAgencyController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactRequestController as AdminContactRequestController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\QuoteRequestController as AdminQuoteRequestController;
use App\Http\Controllers\Admin\RealisationController as AdminRealisationController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\StatController as AdminStatController;
use App\Http\Controllers\Admin\TeamMemberController as AdminTeamMemberController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\LegalController;
use App\Http\Controllers\Public\LocaleController;
use App\Http\Controllers\Public\PartnerController;
use App\Http\Controllers\Public\ProductController;
use App\Http\Controllers\Public\QuoteController;
use App\Http\Controllers\Public\RealisationController;
use App\Http\Controllers\Public\ServiceController;
use App\Http\Controllers\Public\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/a-propos', AboutController::class)->name('about');
Route::get('/services', ServiceController::class)->name('services');

Route::get('/materiel-medical', [ProductController::class, 'index'])->name('catalog.index');
Route::get('/materiel-medical/{product:slug}', [ProductController::class, 'show'])->name('catalog.show');

Route::get('/realisations', [RealisationController::class, 'index'])->name('realisations.index');
Route::get('/realisations/{realisation:slug}', [RealisationController::class, 'show'])->name('realisations.show');

Route::get('/partenaires', PartnerController::class)->name('partners.index');

Route::get('/devis', [QuoteController::class, 'create'])->name('quote.create');
Route::post('/devis', [QuoteController::class, 'store'])->middleware('throttle:5,1')->name('quote.store');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');

Route::get('/mentions-legales', [LegalController::class, 'terms'])->name('legal.terms');
Route::get('/politique-confidentialite', [LegalController::class, 'privacy'])->name('legal.privacy');

Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'create'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');
        Route::get('/', AdminDashboardController::class)->name('dashboard');

        Route::resource('categories', AdminCategoryController::class)->except('show');
        Route::resource('products', AdminProductController::class)->except('show');
        Route::delete('/products/{product}/images/{image}', [AdminProductController::class, 'destroyImage'])->name('products.images.destroy');
        Route::resource('team-members', AdminTeamMemberController::class)->except('show');
        Route::resource('partners', AdminPartnerController::class)->except('show');
        Route::resource('testimonials', AdminTestimonialController::class)->except('show');
        Route::resource('realisations', AdminRealisationController::class)->except('show');
        Route::delete('/realisations/{realisation}/images/{image}', [AdminRealisationController::class, 'destroyImage'])->name('realisations.images.destroy');
        Route::resource('agencies', AdminAgencyController::class)->except('show');
        Route::resource('stats', AdminStatController::class)->except('show');
        Route::resource('faqs', AdminFaqController::class)->except('show');

        Route::get('/contact-requests', [AdminContactRequestController::class, 'index'])->name('contact-requests.index');
        Route::get('/contact-requests/{contactRequest}', [AdminContactRequestController::class, 'show'])->name('contact-requests.show');
        Route::put('/contact-requests/{contactRequest}', [AdminContactRequestController::class, 'update'])->name('contact-requests.update');
        Route::delete('/contact-requests/{contactRequest}', [AdminContactRequestController::class, 'destroy'])->name('contact-requests.destroy');

        Route::get('/quote-requests', [AdminQuoteRequestController::class, 'index'])->name('quote-requests.index');
        Route::get('/quote-requests/{quoteRequest}', [AdminQuoteRequestController::class, 'show'])->name('quote-requests.show');
        Route::get('/quote-requests/{quoteRequest}/attachment', [AdminQuoteRequestController::class, 'downloadAttachment'])->name('quote-requests.attachment');
        Route::put('/quote-requests/{quoteRequest}', [AdminQuoteRequestController::class, 'update'])->name('quote-requests.update');
        Route::delete('/quote-requests/{quoteRequest}', [AdminQuoteRequestController::class, 'destroy'])->name('quote-requests.destroy');

        Route::get('/settings', [AdminSettingController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
});
