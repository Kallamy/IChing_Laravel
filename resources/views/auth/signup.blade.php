<x-layout page="signup">
    <section id="signup">
        <div class="formContainer">
            <h1>Cadastro de usuário</h1>
            <form action="{{ route('signup') }}" method="POST">
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

                <label for="name">@lang('auth.form.name'):</label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}">
                <br>
                <label for="email">@lang('auth.form.email'):</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}">
                <br>
                <label for="password">@lang('auth.form.password'):</label>
                <input type="password" id="password" name="password" required>
                <br>
                <label for="password_confirmation">@lang('auth.form.passwordConfirmation'):</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <button type="submit" class="loginButton">@lang('auth.form.save')</button>
            </form>
        </div>
    </section>
</x-layout>
