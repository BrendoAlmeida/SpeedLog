<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Api;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Entregadores;
use App\Http\Controllers\google2faController;
use App\Http\Controllers\Main;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViagemController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->name('verification.verify');

Route::get('/login/2fa', [google2faController::class, 'index'])->name('auth.2fa');

require __DIR__.'/auth.php';

Route::get('/', [Main::class, 'index'])->name('main.index');

Route::get('/entrega/solicitar', [Main::class, 'solicitar'])
    ->middleware(['auth', 'verified'])
    ->name('main.solicitarEntrega');
Route::post('/entrega/solicitar', [Main::class, 'solicitar'])
    ->middleware(['auth', 'verified'])
    ->name('main.solicitarEntrega');
Route::post('/entrega/cadastrar', [ViagemController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('viagem.store');
Route::put('/2fa/add', [ProfileController::class, 'add2af'])
    ->middleware(['auth', 'verified'])
    ->name('main.add2fa');

Route::get('/viagem/{viagem}', [ViagemController::class, 'detalhesViagem'])
    ->middleware(['auth', 'verified', 'role:Motorista'])
    ->name('viagem.detalhes');
Route::put('/viagem/{viagem}/confirmar', [ViagemController::class, 'confirmarEntrega'])
    ->middleware(['auth', 'verified', 'role:Motorista'])
    ->name('viagem.confirmar');
Route::get('/entrega/{viagem}/aceitar', [Entregadores::class, 'aceitarEntrega'])
    ->middleware(['auth', 'verified', 'role:Motorista'])
    ->name('main.aceitarEntrega');
Route::get('/entregas', [Entregadores::class, 'entregas'])
    ->middleware(['auth', 'verified', 'role:Motorista'])
    ->name('main.entregas');
Route::get('/entrega/{viagem}/confirmar', [Entregadores::class, 'confirmarEntrega'])
    ->middleware(['auth', 'verified', 'role:Motorista'])
    ->name('entregador.conformaEntrega');

Route::get('/pedidos', [Main::class, 'pedidos'])
    ->middleware(['auth', 'verified'])
    ->name('main.pedidos');
Route::get('/adicionar/pagamento', [Main::class, 'addPagamentos'])
    ->middleware(['auth', 'verified'])
    ->name('main.addPagamentos');

Route::post('/login/admin', [AdministradorController::class, 'login'])
    ->middleware(['auth', 'verified', 'role:Administrador'])
    ->name('admin.login');
Route::get('/gerenciamento', [AdministradorController::class, 'index'])
    ->middleware(['auth', 'verified', 'role:Administrador', 'adminLogado'])
    ->name('admin.index');
Route::get('/gerenciamento/pedidos', [AdministradorController::class, 'pedidos'])
    ->middleware(['auth', 'verified', 'role:Administrador', 'adminLogado'])
    ->name('admin.pedidos');
Route::get('/gerenciamento/valores', [AdministradorController::class, 'valor'])
    ->middleware(['auth', 'verified', 'role:Administrador', 'adminLogado'])
    ->name('admin.valor');
Route::put('/gerenciamento/peso/editar', [AdministradorController::class, 'editarValorPeso'])
    ->middleware(['auth', 'verified', 'role:Administrador', 'adminLogado'])
    ->name('admin.editarPeso');
Route::put('/gerenciamento/preco/editar/km', [AdministradorController::class, 'editarPrecoKM'])
    ->middleware(['auth', 'verified', 'role:Administrador', 'adminLogado'])
    ->name('admin.editarPrecoKM');
Route::put('/gerenciamento/preco/editar/tempo', [AdministradorController::class, 'editarPrecoTempo'])
    ->middleware(['auth', 'verified', 'role:Administrador', 'adminLogado'])
    ->name('admin.editarPrecoTempo');
Route::get('/gerenciamento/admin', [AdministradorController::class, 'gerenciarAdmin'])
    ->middleware(['auth', 'verified', 'role:Administrador', 'adminLogado'])
    ->name('admin.gerenciarAdmin');
Route::post('/gerenciamento/cadastro/admin', [AdministradorController::class, 'store'])
    ->middleware(['auth', 'verified', 'role:Administrador', 'adminLogado'])
    ->name('admin.cadAdmin');

// API
Route::post('/api/consultar/valor', [Api::class, 'consultarValor'])->name('api.consultarValor');
Route::post('/api/consulta/endereco', [Api::class, 'getEndereco'])->name('api.consultarEndereco');
