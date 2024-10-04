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

                <label for="email">@lang('auth.form.email'):</label>
                <input type="email" id="email" name="email" required>

                <label for="password">@lang('auth.form.password'):</label>
                <input type="password" id="password" name="password" required>

                <button class="loginButton" type="submit">@lang('auth.login')</button>

                <a href="/new">@lang('auth.createUser')</a>
            </form>
        </div>
    </section>
</x-layout>
