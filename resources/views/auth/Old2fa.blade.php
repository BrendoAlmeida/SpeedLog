<x-layout>
    <div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh">
        @isset($mensagemErro)
            <div class="alert alert-danger m-0 mb-3 col-5">
                {{ $mensagemErro }}
            </div>
        @endisset
        <div class="card p-3 col-5">
            <h3>Login:</h3>

            <form method="post" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="password" value="{{ $password }}">

                <label for="google2fa">Codigo de verificação:</label>
                <input type="text" id="google2fa" name="google2fa" class="form-control">

                <button type="submit" class="btn btn-primary col-12 mt-2">Login</button>
            </form>
        </div>
    </div>
</x-layout>
