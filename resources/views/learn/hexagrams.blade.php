
<p class="learnText">@lang('messages.learnTexts.hexagrams')</p>

<a href="#" id="show-all-hexagrams-link">@lang('messages.seeAllHexagrams')</a>
<div class="hexagramsArea">
    <div class="hexagramsContainer">
        {{-- @for ($i=0; $i < 64; $i++)
            <div class="hexagramItem">
                <div>Ch'ien</div>
                <div class="hexagramSymbol">䷀</div>
                <div>O Receptivo</div>
            </div>
        @endfor --}}
            <div class="hexagramIndex">

            </div>
            <div class="hexagramIndex">
                ☰
            </div>
            <div class="hexagramIndex">
                ☷
            </div>
            <div class="hexagramIndex">
                ☳
            </div>
            <div class="hexagramIndex">
                ☵
            </div>
            <div class="hexagramIndex">
                ☶
            </div>
            <div class="hexagramIndex">
                ☴
            </div>
            <div class="hexagramIndex">
                ☲
            </div>
            <div class="hexagramIndex">
                ☱
            </div>
            <div class="hexagramIndex">
                ☰
            </div>
            <div class="hexagramItem repeated">
                <div>Ch'ien</div>
                <div class="hexagramSymbol">䷀</div>
                @if (session('locale') == 'en')
                    <div>The Creative</div>
                @elseif (session('locale') == 'pt')
                    <div>O Criativo</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>T'ai</div>
                <div class="hexagramSymbol">䷊</div>
                @if (session('locale') == 'en')
                    <div>Peace</div>
                @elseif (session('locale') == 'pt')
                    <div>Paz</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ta Chuang</div>
                <div class="hexagramSymbol">䷡</div>
                @if (session('locale') == 'en')
                    <div>The Power of the Great</div>
                @elseif (session('locale') == 'pt')
                    <div>O Poder do Grande</div>
                @endif

            </div>
            <div class="hexagramItem">
                <div>Hsu</div>
                <div class="hexagramSymbol">䷄</div>
                @if (session('locale') == 'en')
                    <div>Waiting</div>
                @elseif (session('locale') == 'pt')
                    <div>A Espera</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ta Ch'u</div>
                <div class="hexagramSymbol">䷙</div>
                @if (session('locale') == 'en')
                    <div>The Taming Power of the Great</div>
                @elseif (session('locale') == 'pt')
                    <div>O Poder de Domar do Grande</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Hsiao Ch'u</div>
                <div class="hexagramSymbol">䷈</div>
                @if (session('locale') == 'en')
                    <div>The Taming Power of the Small</div>
                @elseif (session('locale') == 'pt')
                    <div>O Poder de Domar do Pequeno</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ta Yu</div>
                <div class="hexagramSymbol">䷍</div>
                @if (session('locale') == 'en')
                    <div>Possession in Great Measure</div>
                @elseif (session('locale') == 'pt')
                    <div>Grandes Posses</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Kuai</div>
                <div class="hexagramSymbol">䷪</div>
                @if (session('locale') == 'en')
                    <div>Break-through</div>
                @elseif (session('locale') == 'pt')
                    <div>Irromper</div>
                @endif
            </div>
            <div class="hexagramIndex">
                ☷
            </div>
            <div class="hexagramItem">
                <div>Pi</div>
                <div class="hexagramSymbol">䷋</div>
                @if (session('locale') == 'en')
                    <div>Standstill</div>
                @elseif (session('locale') == 'pt')
                    <div>Estagnação</div>
                @endif
            </div>
            <div class="hexagramItem repeated">
                <div>K'un</div>
                <div class="hexagramSymbol">䷁</div>
                @if (session('locale') == 'en')
                    <div>The Receptive</div>
                @elseif (session('locale') == 'pt')
                    <div>O Receptivo</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Yu</div>
                <div class="hexagramSymbol">䷏</div>
                @if (session('locale') == 'en')
                    <div>Enthusiasm</div>
                @elseif (session('locale') == 'pt')
                    <div>Entusiasmo</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Pi</div>
                <div class="hexagramSymbol">䷇</div>
                @if (session('locale') == 'en')
                    <div>Holding Together</div>
                @elseif (session('locale') == 'pt')
                    <div>Manter-se Unido</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Po</div>
                <div class="hexagramSymbol">䷖</div>
                @if (session('locale') == 'en')
                    <div>Splitting Apart</div>
                @elseif (session('locale') == 'pt')
                    <div>Desintegração</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Kuan</div>
                <div class="hexagramSymbol">䷓</div>
                @if (session('locale') == 'en')
                    <div>Comtemplation</div>
                @elseif (session('locale') == 'pt')
                    <div>Comtemplação</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Chin</div>
                <div class="hexagramSymbol">䷢</div>
                @if (session('locale') == 'en')
                    <div>Progress</div>
                @elseif (session('locale') == 'pt')
                    <div>Porgresso</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ts'ui</div>
                <div class="hexagramSymbol">䷬</div>
                @if (session('locale') == 'en')
                    <div>Gathering Together</div>
                @elseif (session('locale') == 'pt')
                    <div>Reunião</div>
                @endif
            </div>
            <div class="hexagramIndex">
                ☳
            </div>
            <div class="hexagramItem">
                <div>Wu Wang</div>
                <div class="hexagramSymbol">䷘</div>
                @if (session('locale') == 'en')
                    <div>Innocence</div>
                @elseif (session('locale') == 'pt')
                    <div>Inocência</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Fu</div>
                <div class="hexagramSymbol">䷗</div>
                @if (session('locale') == 'en')
                    <div>Return</div>
                @elseif (session('locale') == 'pt')
                    <div>Retorno</div>
                @endif
            </div>
            <div class="hexagramItem repeated">
                <div>Chên</div>
                <div class="hexagramSymbol">䷲</div>
                @if (session('locale') == 'en')
                    <div>The Arousing</div>
                @elseif (session('locale') == 'pt')
                    <div>O Incitar</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Chun</div>
                <div class="hexagramSymbol">䷂</div>
                @if (session('locale') == 'en')
                    <div>Difficult at the Beginning</div>
                @elseif (session('locale') == 'pt')
                    <div>Dificuldade Inicial</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>I</div>
                <div class="hexagramSymbol">䷚</div>
                @if (session('locale') == 'en')
                    <div>The Corners of the Mouth</div>
                @elseif (session('locale') == 'pt')
                    <div>As Bordas da Boca</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>I</div>
                <div class="hexagramSymbol">䷩</div>
                @if (session('locale') == 'en')
                    <div>Increase</div>
                @elseif (session('locale') == 'pt')
                    <div>Aumento</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Shih Ho</div>
                <div class="hexagramSymbol">䷔</div>
                @if (session('locale') == 'en')
                    <div>Biting Through</div>
                @elseif (session('locale') == 'pt')
                    <div>Morder</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Sui</div>
                <div class="hexagramSymbol">䷐</div>
                @if (session('locale') == 'en')
                    <div>Following</div>
                @elseif (session('locale') == 'pt')
                    <div>Seguir</div>
                @endif
            </div>
            <div class="hexagramIndex">
                ☵
            </div>
            <div class="hexagramItem">
                <div>Sung</div>
                <div class="hexagramSymbol">䷅</div>
                @if (session('locale') == 'en')
                    <div>Conflict</div>
                @elseif (session('locale') == 'pt')
                    <div>Conflito</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Shih</div>
                <div class="hexagramSymbol">䷆</div>
                @if (session('locale') == 'en')
                    <div>The Army</div>
                @elseif (session('locale') == 'pt')
                    <div>O Exército</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Hsieh</div>
                <div class="hexagramSymbol">䷧</div>
                @if (session('locale') == 'en')
                    <div>Deliverance</div>
                @elseif (session('locale') == 'pt')
                    <div>Liberação</div>
                @endif
            </div>
            <div class="hexagramItem repeated">
                <div>K'an</div>
                <div class="hexagramSymbol">䷜</div>
                @if (session('locale') == 'en')
                <div>The Abysmal</div>
            @elseif (session('locale') == 'pt')
                <div>O Abismal</div>
            @endif
            </div>
            <div class="hexagramItem">
                <div>Meng</div>
                <div class="hexagramSymbol">䷃</div>
                @if (session('locale') == 'en')
                    <div>Youthful Folly</div>
                @elseif (session('locale') == 'pt')
                    <div>Insensatez Juvenil</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Huan</div>
                <div class="hexagramSymbol">䷺</div>
                @if (session('locale') == 'en')
                    <div>Dispersion</div>
                @elseif (session('locale') == 'pt')
                    <div>Dispersão</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Wei Chi</div>
                <div class="hexagramSymbol">䷿</div>
                @if (session('locale') == 'en')
                    <div>Before Completion</div>
                @elseif (session('locale') == 'pt')
                    <div>Antes da Conclusão</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>K'un</div>
                <div class="hexagramSymbol">䷮</div>
                @if (session('locale') == 'en')
                    <div>Oppression</div>
                @elseif (session('locale') == 'pt')
                    <div>Opressão</div>
                @endif
            </div>
            <div class="hexagramIndex">
                ☶
            </div>
            <div class="hexagramItem">
                <div>Tun</div>
                <div class="hexagramSymbol">䷠</div>
                @if (session('locale') == 'en')
                    <div>Retreat</div>
                @elseif (session('locale') == 'pt')
                    <div>A Retirada</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ch'ien</div>
                <div class="hexagramSymbol">䷎</div>
                @if (session('locale') == 'en')
                    <div>Modesty</div>
                @elseif (session('locale') == 'pt')
                    <div>Modéstia</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Hsiao Kuo</div>
                <div class="hexagramSymbol">䷽</div>
                @if (session('locale') == 'en')
                    <div>Preponderance of the Small</div>
                @elseif (session('locale') == 'pt')
                    <div>A Preponderância do Pequeno</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Chien</div>
                <div class="hexagramSymbol">䷦</div>
                @if (session('locale') == 'en')
                    <div>Obstruction</div>
                @elseif (session('locale') == 'pt')
                    <div>Obstrução</div>
                @endif
            </div>
            <div class="hexagramItem repeated">
                <div>Kên</div>
                <div class="hexagramSymbol">䷳</div>
                @if (session('locale') == 'en')
                    <div>Keeping Still</div>
                @elseif (session('locale') == 'pt')
                    <div>A Quietude</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Chien</div>
                <div class="hexagramSymbol">䷴</div>
                @if (session('locale') == 'en')
                    <div>Development</div>
                @elseif (session('locale') == 'pt')
                    <div>Desenvolvimento</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Lü</div>
                <div class="hexagramSymbol">䷷</div>
                @if (session('locale') == 'en')
                    <div>The Wanderer</div>
                @elseif (session('locale') == 'pt')
                    <div>O Viajante</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Hsien</div>
                <div class="hexagramSymbol">䷞</div>
                @if (session('locale') == 'en')
                    <div>Influence</div>
                @elseif (session('locale') == 'pt')
                    <div>A Influência</div>
                @endif
            </div>
            <div class="hexagramIndex">
                ☴
            </div>
            <div class="hexagramItem">
                <div>Kou</div>
                <div class="hexagramSymbol">䷫</div>
                @if (session('locale') == 'en')
                    <div>Coming to Meet</div>
                @elseif (session('locale') == 'pt')
                    <div>Vir ao Encontro</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Chêng</div>
                <div class="hexagramSymbol">䷭</div>
                @if (session('locale') == 'en')
                    <div>Pushing Upward</div>
                @elseif (session('locale') == 'pt')
                    <div>Ascensão</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Heng</div>
                <div class="hexagramSymbol">䷟</div>
                @if (session('locale') == 'en')
                    <div>Duration</div>
                @elseif (session('locale') == 'pt')
                    <div>Duração</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ching</div>
                <div class="hexagramSymbol">䷯</div>
                @if (session('locale') == 'en')
                    <div>The Well</div>
                @elseif (session('locale') == 'pt')
                    <div>O Poço</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ku</div>
                <div class="hexagramSymbol">䷑</div>
                @if (session('locale') == 'en')
                    <div>Work on What Has Been Spoiled</div>
                @elseif (session('locale') == 'pt')
                    <div>Trabalho Sobre O que Se Deteriorou</div>
                @endif
            </div>
            <div class="hexagramItem repeated">
                <div>Sun</div>
                <div class="hexagramSymbol">䷸</div>
                @if (session('locale') == 'en')
                    <div>The Gentle</div>
                @elseif (session('locale') == 'pt')
                    <div>A Suavidade</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ting</div>
                <div class="hexagramSymbol">䷱</div>
                @if (session('locale') == 'en')
                    <div>The Caldron</div>
                @elseif (session('locale') == 'pt')
                    <div>O Caldeirão</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ta Kuo</div>
                <div class="hexagramSymbol">䷛</div>
                @if (session('locale') == 'en')
                    <div>Preponderance of the Great</div>
                @elseif (session('locale') == 'pt')
                    <div>A Preponderância do Grande</div>
                @endif
            </div>
            <div class="hexagramIndex">
                ☲
            </div>
            <div class="hexagramItem">
                <div>Tung Jên</div>
                <div class="hexagramSymbol">䷌</div>
                @if (session('locale') == 'en')
                    <div>Fellowship with Men</div>
                @elseif (session('locale') == 'pt')
                    <div>Comunidade com os Homens</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ming I</div>
                <div class="hexagramSymbol">䷣</div>
                @if (session('locale') == 'en')
                    <div>Darkning of the Light</div>
                @elseif (session('locale') == 'pt')
                    <div>O Obscurecimento da Luz</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Fêng</div>
                <div class="hexagramSymbol">䷶</div>
                @if (session('locale') == 'en')
                    <div>Abundance</div>
                @elseif (session('locale') == 'pt')
                    <div>Abundância</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Chi Chi</div>
                <div class="hexagramSymbol">䷾</div>
                @if (session('locale') == 'en')
                    <div>After Completiion</div>
                @elseif (session('locale') == 'pt')
                    <div>Após a Conclusão</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Pi</div>
                <div class="hexagramSymbol">䷕</div>
                @if (session('locale') == 'en')
                    <div>Grace</div>
                @elseif (session('locale') == 'pt')
                    <div>Graciosidade</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Chia Jen</div>
                <div class="hexagramSymbol">䷤</div>
                @if (session('locale') == 'en')
                    <div>The Clan</div>
                @elseif (session('locale') == 'pt')
                    <div>A Família</div>
                @endif
            </div>
            <div class="hexagramItem repeated">
                <div>Li</div>
                <div class="hexagramSymbol">䷝</div>
                @if (session('locale') == 'en')
                    <div>The Clinging</div>
                @elseif (session('locale') == 'pt')
                    <div>Aderir</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Ko</div>
                <div class="hexagramSymbol">䷰</div>
                @if (session('locale') == 'en')
                    <div>Revolution</div>
                @elseif (session('locale') == 'pt')
                    <div>Revolução</div>
                @endif
            </div>
            <div class="hexagramIndex">
                ☱
            </div>
            <div class="hexagramItem">
                <div>Lu</div>
                <div class="hexagramSymbol">䷉</div>
                @if (session('locale') == 'en')
                    <div>Treading</div>
                @elseif (session('locale') == 'pt')
                    <div>A Conduta</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Lin</div>
                <div class="hexagramSymbol">䷒</div>
                @if (session('locale') == 'en')
                    <div>Approach</div>
                @elseif (session('locale') == 'pt')
                    <div>Aproximação</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Kuei Mei</div>
                <div class="hexagramSymbol">䷵</div>
                @if (session('locale') == 'en')
                    <div>The Marrying Maiden</div>
                @elseif (session('locale') == 'pt')
                    <div>A Jovem que se Casa</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Chieh</div>
                <div class="hexagramSymbol">䷻</div>
                @if (session('locale') == 'en')
                    <div>Limitation</div>
                @elseif (session('locale') == 'pt')
                    <div>Limitação</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Sun</div>
                <div class="hexagramSymbol">䷨</div>
                @if (session('locale') == 'en')
                    <div>Decrease</div>
                @elseif (session('locale') == 'pt')
                    <div>Diminuição</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>Chung Fu</div>
                <div class="hexagramSymbol">䷼</div>
                @if (session('locale') == 'en')
                    <div>Inner Truth</div>
                @elseif (session('locale') == 'pt')
                    <div>Verdade Interior</div>
                @endif
            </div>
            <div class="hexagramItem">
                <div>K'uei</div>
                <div class="hexagramSymbol">䷥</div>
                @if (session('locale') == 'en')
                    <div>Opposition</div>
                @elseif (session('locale') == 'pt')
                    <div>Oposição</div>
                @endif
            </div>
            <div class="hexagramItem repeated">
                <div>Tui</div>
                <div class="hexagramSymbol">䷹</div>
                @if (session('locale') == 'en')
                    <div>The Joyous</div>
                @elseif (session('locale') == 'pt')
                    <div>A Alegria</div>
                @endif
            </div>

        </div>

        <div class = "hexagramsInfo">
            <p>@lang('messages.originalTextHint')</p>
            <a href="#" id="go-back-link">@lang('messages.goBack')</a>
        </div>







</div>

<script>

    document.querySelector('#show-all-hexagrams-link').addEventListener('click', () =>{
        document.querySelector('.hexagramsArea').style.display="block";
        document.querySelector('.learnText').style.display="none";
    })
    document.querySelector('#go-back-link').addEventListener('click', () =>{
        document.querySelector('.hexagramsArea').style.display="none";
        document.querySelector('.learnText').style.display="block";

    })

</script>
