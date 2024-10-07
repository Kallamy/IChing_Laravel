<x-layout page="asks">
    <section id="asks">
        <div class="content">
        @if (auth()->check())
            @if (session('locale') == 'en')
                <div class="consultRegisterMessage">
                    <h3>Consultation register, {{auth()->user()->name}}:</h3>
                </div>
            @elseif (session('locale') == 'pt')
                <div class="consultRegisterMessage">
                    <h3>Registro de consultas, {{auth()->user()->name}}:</h3>
                </div>
            @endif
            <table id="asksTable">
                <thead>
                    <tr>
                        <th class="dateField">Data</th>
                        <th class="subjectField">Assunto</th>
                        <th class="resultField">Resultado</th>
                        <th class="resultField">Desdobramento</th>
                        <th class="actionField"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>06/09/2024</td>
                        <td>O que devo fazer?</td>
                        <td>61. Chung Fu - Verdade Interior</td>
                        <td>63. Chi Chi - Após a Conclusão</td>
                        <td><x-Button onclick=""><img width="26.0rem" src="assets/icons/i-ching.png"></x-Button></td>
                    </tr>
                    <tr>
                        <td>06/09/2024</td>
                        <td>Quuando vou poder andar novamente de skate?</td>
                        <td>09. Hsiao Ch'u - O Poder de Domar do Pequeno</td>
                        <td></td>
                        <td><x-Button onclick=""><img width="26.0rem" src="assets/icons/i-ching.png"></x-Button></td>
                    </tr>
                    <tr>
                        <td>06/09/2024</td>
                        <td>Como posso ser feliz?</td>
                        <td>18. Ku - Trabalho Sobre o que Se Deteriorou</td>
                        <td>17. Sui - Seguir</td>
                        <td><x-Button onclick=""><img width="26.0rem" src="assets/icons/i-ching.png"></x-Button></td>
                    </tr>
                    <tr>
                        <td>06/09/2024</td>
                        <td>Como posso conseguir um emprego?</td>
                        <td>61. Chung Fu - Verdade Interior</td>
                        <td></td>
                        <td><x-Button onclick=""><img width="26.0rem" src="assets/icons/i-ching.png"></x-Button></td>
                    </tr>
                </tbody>
            </table>
        @else
            @if (session('locale') == 'en')
            <div class="loginMessage">
                <h3>Consultation register</h3>
                <h4>To save your consultations you need to be registered.</h4>
            </div>
            @elseif (session('locale') == 'pt')
                <div class="loginMessage">
                    <h3>Registro de consultas</h3>
                    <h4>Para salvar suas consultas você precisa estar cadastrado.</h4>
                </div>
            @endif
            <div class="loginButtons">
                <x-Button onclick="window.location='{{ route('signup') }}'">@lang('auth.createUser') <img width="40.0rem" src="assets/icons/login-avatar.png"></x-Button>
                <x-Button onclick="window.location='{{ route('signin') }}'">@lang('auth.login') <img width="40.0rem" src="assets/icons/login.png"></x-Button>
            </div>
        @endif
        </div>
    </section>
</x-layout>
