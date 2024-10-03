<x-layout page="signin">
    <section id="signin">
        <div class="formContainer">
            <h1>Login</h1>
            <form action="{{ route('signin') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>

                <button class="loginButton" type="submit">Login</button>

                <a href="/password/reset">Esqueceu a senha?</a>
                <a href="/register">Registrar-se</a>
            </form>
        </div>
    </section>
</x-layout>
