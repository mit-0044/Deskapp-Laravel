<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientStatusController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DebitCardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IncomeSourceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectStatusController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('auth.login');
})->name('auth.login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');
    Route::get('/pricing', [IndexController::class, 'pricing'])->name('pricing');
    Route::get('/auth', [IndexController::class, 'auth_logs'])->name('auth.auth_logs');
    Route::get('/auth-view/{id?}', [IndexController::class, 'auth_logs_view'])->name('auth.auth_logs_view');

    Route::resource('employee', EmployeeController::class);
    Route::resource('debit_card', DebitCardController::class);
    Route::resource('currency', CurrencyController::class);
    Route::resource('transaction-type', TransactionTypeController::class);
    Route::resource('income-source', IncomeSourceController::class);
    Route::resource('client-status', ClientStatusController::class);
    Route::resource('project-status', ProjectStatusController::class);
    Route::resource('client', ClientController::class);
    Route::get('clients/report', [ClientController::class, 'report'])->name('client.report');
    Route::resource('project', ProjectController::class);
    Route::resource('note', NoteController::class);
    Route::resource('document', DocumentController::class);
    Route::resource('transaction', TransactionController::class);

    Route::resource('payment', PaymentController::class);
    Route::get('payments/add_method', [PaymentController::class, 'add_method'])->name('payment.add_method');;

    Route::resource('permission', PermissionController::class);
    Route::get('permissions/deleted', [PermissionController::class, 'show_deleted'])->name('permission.show_deleted');
    Route::post('permissions/restore/{id?}', [PermissionController::class, 'restore_deleted'])->name('permission.restore');

    Route::resource('role', RoleController::class);
    Route::get('roles/deleted', [RoleController::class, 'show_deleted'])->name('role.show_deleted');
    Route::post('roles/restore/{id?}', [RoleController::class, 'restore_deleted'])->name('role.restore');

    Route::resource('user', UserController::class);
    Route::get('user/{id?}/change-password', [UserController::class, 'change_password'])->name('user.change_password');
    Route::post('user/{id?}/update-password', [UserController::class, 'update_password'])->name('user.update_password');
    Route::post('user/add_user_type', [UserController::class, 'update_password'])->name('user.add_user_type');
    Route::get('users/deleted', [UserController::class, 'show_deleted_users'])->name('user.show_deleted');
    Route::get('users/deactivated', [UserController::class, 'show_deactivated_users'])->name('user.show_deactivated');
    Route::post('users/activated_account/{id?}', [UserController::class, 'activate_user_account'])->name('user.activate_account');
    Route::post('users/deactivate_account/{id?}', [UserController::class, 'deactivate_user_account'])->name('user.deactivate_account');

    Route::post('get_states/{id}', [AjaxController::class, 'get_states']);
    Route::post('get_cities/{id}', [AjaxController::class, 'get_cities']);
    Route::post('get_bank_branch/{id}', [AjaxController::class, 'get_bank_branch']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update_avatar/{id?}', [ProfileController::class, 'update_avatar'])->name('profile.update_avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('product', [RazorpayController::class, 'index']);
//     Route::post('razorpay-payment', [RazorpayController::class, 'store'])->name('razorpay.payment.store');
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('plan', PlanController::class);
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});

Route::get('addmoney/stripe', array('as' => 'addmoney.paystripe', 'uses' => [MoneySetupController::class, 'paymentStripe']));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe', 'uses' => [MoneySetupController::class, 'postPaymentStripe']));

Route::get('/{user}/impersonate', [UserController::class, 'impersonate'])->name('users.impersonate');
Route::get('/leave-impersonate', [UserController::class, 'leaveImpersonate'])->name('users.leave-impersonate');

Route::get('new_device', [IndexController::class, 'new_device']);
Route::get('failed_', [IndexController::class, 'newDeviceLoggedIn']);
Route::get('myTestEmail', [IndexController::class, 'myTestEmail']);
Route::get('two-factor-challenge', [IndexController::class, 'two_factor']);

require __DIR__ . '/auth.php';
