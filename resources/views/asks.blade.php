@php
    use App\Models\Ask;
    use Carbon\Carbon;
    $date = Carbon::now();
@endphp

<x-layout page="asks">
    <section id="asks">
        <div class="content">
        @if (auth()->check())
            @if(Ask::where('user_id', auth()->id())->exists())
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
                    $asks = Ask::where('user_id', auth()->id())->orderBy('id', 'asc')->paginate(5);
                    $date = Carbon::now();
                @endphp
                <div class="tableContainer">
                    <table id="asksTable">
                        <thead>
                            <tr>
                                @if(session('locale') == 'en')
                                    <th class="dateHeader">Date</th>
                                    <th class="subjectHeader">Subject</th>
                                    <th class="resultHeder">Result</th>
                                    <th class="resultHeder">Related Hexagram</th>
                                @else
                                    <th class="dateHeader">Data</th>
                                    <th class="subjectHeader">Assunto</th>
                                    <th class="resultHeder">Resultado</th>
                                    <th class="resultHeder">Desdobramento</th>
                                @endif

                                <th class="linesField"></th>
                                <th class="actionHeder"><img class="deleteImage" width="29rem" src="assets/icons/bin.png"></th>
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
                                    <td class="linesField">{{ $ask->result_lines }}</td>
                                    <td class="linesField">{{ $ask->related_lines }}</td>

                                    <td class=""><x-Button class="openConsultationButton" data-id="{{ $ask->id }}" onclick=""></x-Button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pagination-links">
                    {{ $asks->links('vendor.pagination.default') }}
                </div>
            @else
            <div class="consultRegisterMessage">
                @if (session('locale') == 'en')
                    <h3>You do not have any consultation registered at the moment.</h3>
                @elseif(session('locale') == 'pt')
                    <h3>Você não tem nehuma consulta registrada no momento.</h3>
                @endif
                <img src="assets/images/dragon.png">
            </div>
            @endif
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
    document.querySelector('.deleteImage').addEventListener('click', function() {
        buttons = document.querySelectorAll('.openConsultationButton')
        buttons.forEach(button => {
            button.classList.toggle('delete');
        });
    });

    document.querySelectorAll('.openConsultationButton').forEach(button => {
        button.addEventListener('click', function() {
            let ask_id = button.getAttribute('data-id');

            if(button.classList.contains('delete')) {
                @if (session('locale') == 'en')
                    let confirmText = 'Are you sure you want to delete this consultation'
                @elseif (session('locale') == 'pt')
                    let confirmText = 'Tem certeza que quer deletar esta consulta?'
                @endif
                if(confirm(confirmText)) {
                    fetch('/delete/'+ask_id, {
                    method: 'DELETE',
                    headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Sucesso:', data);
                    })
                    .catch((error) => {
                        console.error('Erro:', error);
                    });
                        // recarrega a página duas vezes seguidas
                        location.reload(true);
                            setTimeout(function() {
                            location.reload();
                        }, 300);
                    }
            } else {
                let row = this.closest('tr');
                let data = {
                    date: row.cells[0].innerText,
                    subject: row.cells[1].innerText,
                    resultLines: row.cells[4].innerText,
                    relatedLines:  row.cells[5].innerText,
                };
                openConsultation(data);
            }
        });
    });

    let resultFields = document.querySelectorAll('.resultField');
    resultFields.forEach(field => {
        templateIndex = field.innerText;
        if(templateIndex != "") {
            selectedTemplate = document.querySelector(`.originalTemplateHexagram[data-number~="${templateIndex}"`);
            hexagramSymbolText = selectedTemplate.querySelector('.originalTemplateSymbol').innerText;
            hexagramNameText = selectedTemplate.querySelector('.originalTemplateName').innerText;
            field.innerHTML = `<span class="asksTableSymbol">${hexagramSymbolText}</span> <div class="asksTableHexagramInfo">${hexagramNameText}</div>`
        }
    })


    function openConsultation(data) {
        sessionStorage.setItem('data', JSON.stringify(data));
        window.location.href = '/play';
    }

    function isMobile() {
        return /Mobi|Android/i.test(navigator.userAgent);
    }
</script>
