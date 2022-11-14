<?php

use App\Http\Controllers\Attachment\AttachmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\Billing\BillingController;
use App\Http\Controllers\Cnab\CnabController;
use App\Http\Controllers\CnabBilling\CnabBillingController;
use App\Http\Controllers\CustomerFee\CustomerFeeController;
use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\FinancialMovement\FinancialMovementController;
use App\Http\Controllers\FinancialMovementFee\FinancialMovementFeeController;
use App\Http\Controllers\Google2FAController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\PasswordReset\PasswordResetController;
use App\Http\Controllers\QrCode\QrCodeController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Tenant\TenantController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ValidationController;
use Illuminate\Support\Facades\Route;

Route::post('validations/unique', [ValidationController::class, 'unique']);

Route::post('qr-codes/send-mail', [QrCodeController::class, 'sendMail']);

Route::middleware(['api'])->group(function (): void {
    Route::put('login', [AuthController::class, 'login']);
    Route::put('validate', [AuthController::class, 'validateJwt']);
    Route::put('register', [AuthController::class, 'register']);
    Route::put('password-recovery', [AuthController::class, 'resetPassword']);
    Route::put('update-password', [AuthController::class, 'updatePassword']);

    // PasswordResets
    Route::put('password_resets/reset-token', [PasswordResetController::class, 'resetVerifyToken']);
});

// Attachments
Route::middleware(['api', 'throttle:180,1', 'tenant'])->prefix('/tenants/{tenant_id}/')
    ->group(function (): void {
        Route::get('attachments/{token}/preview', [AttachmentController::class, 'preview']);
        Route::get('attachments/{token}/thumbnail', [AttachmentController::class, 'preview']);
        Route::get('attachments/{token}/download', [AttachmentController::class, 'download']);
        Route::apiResource('attachments', AttachmentController::class);
    });

Route::middleware(['api', 'throttle:180,1', 'auth:sanctum', 'tenant'])->prefix('/tenants/{tenant_id}/')
    ->group(function (): void {
        Route::post('attachments/upload', [AttachmentController::class, 'upload']);
    });

Route::get('/', function () {
    return response('API da equipe campeã... R.U.L.A.B!!!!!');
});
