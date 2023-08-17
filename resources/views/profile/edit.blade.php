<x-mainLayout>
    <div class="container">
        <div class="card p-3 mb-3 mt-3">
            <h5 class="m-0">Informações do perfil</h5>
            <p class="mb-3">Atualize as informações de perfil e o endereço de e-mail da sua conta.</p>

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                <label for="name">Nome:</label>
                <input type="text" name="name" class="form-control mb-3" value="{{ $user->name }}">
                <x-input-error class="mt-2" :messages="$errors->get('name')" />

                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control mb-3" value="{{ $user->email }}">
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                <button type="submit" class="btn btn-dark col-12">SALVAR</button>
            </form>
            @isset($qrCode)
                <button class="btn" data-bs-toggle="modal" data-bs-target="#modal2fa">Ativar autenticação em duas etapas</button>
            @endisset
        </div>

        <div class="card p-3 mb-3">
            <h5 class="m-0">Atualizar senha</h5>
            <p class="mb-3">Certifique-se de que sua conta está usando uma senha longa e aleatória para se manter segura.</p>
            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')
                <label for="current_password">Senha atual:</label>
                <input type="password" name="current_password" class="form-control mb-3">
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

                <label for="password">Nova senha:</label>
                <input type="password" name="password" class="form-control mb-3">
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                <label for="password_confirmation">Confirmar senha:</label>
                <input type="password" name="password_confirmation" class="form-control mb-3">
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

                <button class="btn btn-dark col-12">SALVAR</button>
            </form>
        </div>

        <div class="card p-3 mb-3">
            <h5 class="m-0">Excluir conta</h5>
            <p class="mb-3">Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente.
                Antes de excluir sua conta, faça o download de todos os dados ou informações que você deseja reter.</p>

                <button data-bs-toggle="modal" data-bs-target="#modalDeletar" type="button" class="btn btn-danger">Deletar</button>
        </div>
    </div>

    @isset($qrCode)
        <div class="modal fade" id="modal2fa" tabindex="-1" aria-labelledby="Gerenciamento" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar 2FA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route("main.add2fa") }}" method="post">
                        <div class="modal-body">
                            <div>{!! $qrCode !!}</div>
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="key" value="{{ $key }}">
                            <label for="google2fa_secret" style="font-size: 17px" class="mb-2">Codigo:</label>
                            <input type="password" id="google2fa_secret" name="google2fa_secret" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endisset

    <div class="modal fade" id="modalDeletar" tabindex="-1" aria-labelledby="Gerenciamento" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.destroy') }}" method="post" id="formDeletar">
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        <h5>Para confirmar digite sua senha</h5>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-mainLayout>
