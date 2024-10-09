@inject('askModel', 'App\Models\Ask')
@php
    use Carbon\Carbon;
    $date = Carbon::now();
@endphp
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
            @php
                $asks = $askModel::where('user_id', auth()->id())->get();
                $date = Carbon::now();
            @endphp
            <table id="asksTable">
                <thead>
                    <tr>
                        <th class="dateHeader">Data</th>
                        <th class="subjectHeader">Assunto</th>
                        <th class="resultHeder">Resultado</th>
                        <th class="resultHeder">Desdobramento</th>
                        <th class="actionHeder"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asks as $ask)
                        <tr>
                            @if(session('locale') == 'en')
                                <td class="dateField">{{ Carbon::parse($ask->date)->format('m/d/Y') }}</td>
                            @else
                                <td class="dateField">{{ Carbon::parse($ask->date)->format('d/m/Y') }}</td>
                            @endif
                            <td class="subjectField">{{ $ask->subject }}</td>
                            <td class="resultField">{{ $ask->result }}</td>
                            @if($ask->result != $ask->related)
                                <td class="resultField">{{ $ask->related }}</td>
                            @else
                                <td class="resultField"></td>
                            @endif
                            <td><x-Button class="openConsultationButton" data-id="{{ $ask->id }}" onclick="openConsultation(this)"><img width="26.0rem" src="assets/icons/i-ching.png"></x-Button></td>
                        </tr>
                    @endforeach
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

<script>
    document.querySelectorAll('.openConsultationButton').forEach(button => {
        button.addEventListener('click', function() {
            let ask_id = button.getAttribute('data-id');
            let row = this.closest('tr');
            let data = {
                date: row.cells[0].innerText,
                subject: row.cells[1].innerText,
                result: row.cells[2].innerText,
                related:  row.cells[3].innerText,
            };
            openConsultation(data);
        });
    });

    let resultFields = document.querySelectorAll('.resultField');
    resultFields.forEach(field => {
        console.log(field.innerText);
        templateIndex = field.innerText;
        selectedTemplate = document.querySelector(`.originalTemplateHexagram[data-number~="${templateIndex}"`);
        hexagramSymbolText = selectedTemplate.querySelector('.originalTemplateSymbol').innerText;
        hexagramNameText = selectedTemplate.querySelector('.originalTemplateName').innerText;
        field.innerHTML = `<span class="asksTableSymbol">${hexagramSymbolText}</span> <div class="asksTableHexagramInfo">${hexagramNameText}</div>`
    })


    function openConsultation(data) {
        sessionStorage.setItem('data', JSON.stringify(data));
        window.location.href = '/play';
    }
</script>
