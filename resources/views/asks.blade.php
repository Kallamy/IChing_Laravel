<x-layout page="asks">
    <section id="asks">
        <div class="content">
            @if (session('locale') == 'en')
                <div class="loginMessage">
                    <h3>Consultation register</h3>
                    <h4>To save your consultations you need to be registered.</h4>
                </div>
                <div class="loginButtons">
                    <x-Button onclick="window.location='{{ route('signup') }}'">Create User <img width="40.0rem" src="assets/icons/login-avatar.png"></x-Button>
                    <x-Button onclick="window.location='{{ route('signin') }}'">Login <img width="40.0rem" src="assets/icons/login.png"></x-Button>
                </div>
            @elseif (session('locale') == 'pt')
                <div class="loginMessage">
                    <h3>Registro de consultas</h3>
                    <h4>Para salvar suas consultas você precisa estar cadastrado.</h4>
                </div>
                <div class="loginButtons">
                    <x-Button onclick="window.location='{{ route('signup') }}'">Criar Usuário <img width="40.0rem" src="assets/icons/login-avatar.png"></x-Button>
                    <x-Button onclick="window.location='{{ route('signin') }}'">Entrar <img width="40.0rem" src="assets/icons/login.png"></x-Button>
                </div>
            @endif
        </div>
    </section>
</x-layout>
