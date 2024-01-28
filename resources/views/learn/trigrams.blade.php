<p>@lang('messages.learnTexts.trigrams')</p>

<table id="trigramsTable">
    @if (session('locale') == 'en')
        <thead>
            <tr>
                <th>Trigram</th>
                <th>Name</th>
                <th>Symbolism</th>
                <th>Family</th>
                <th>Human Body</th>
                <th>Animal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>☰</strong></td>
                <td>Ch'ien</td>
                <td>Heaven, creative force, masculine, positive, strong, active</td>
                <td>Father</td>
                <td>Head</td>
                <td>Horse</td>
            </tr>
            <tr>
                <td><strong>☷</strong></td>
                <td>K'un</td>
                <td>Earth, receptivity, feminine, negative, weak, passive</td>
                <td>Mother</td>
                <td>Abdomen</td>
                <td>Cow</td>
            </tr>
            <tr>
                <td><strong>☳</strong></td>
                <td>Chên</td>
                <td>Thunder, movement, firstborn, beginning, impulse</td>
                <td>Older brother</td>
                <td>Foot</td>
                <td>Dragon</td>
            </tr>
            <tr>
                <td><strong>☵</strong></td>
                <td>K'an</td>
                <td>Water, danger, darkness, abyss, depth, fluidity</td>
                <td>Middle son</td>
                <td>Ears</td>
                <td>Pig</td>
            </tr>
            <tr>
                <td><strong>☴</strong></td>
                <td>Sun</td>
                <td>Wind, wood, flexibility, penetration, perseverance, progress</td>
                <td>Oldest daughter</td>
                <td>Thighs</td>
                <td>Cat</td>
            </tr>
            <tr>
                <td><strong>☲</strong></td>
                <td>Li</td>
                <td>Fire, light, clarity, sun, illumination, consciousness</td>
                <td>Middle daughter</td>
                <td>Eyes</td>
                <td>Peacock</td>
            </tr>
            <tr>
                <td><strong>☶</strong></td>
                <td>Kên</td>
                <td>Mountain, immobility, stability, firmness, resistance, inertia</td>
                <td>Youngest son</td>
                <td>Hand</td>
                <td>Dog</td>
            </tr>
            <tr>
                <td><strong>☱</strong></td>
                <td>Tui</td>
                <td>Lake, joy, pleasure, harmony</td>
                <td>Younger daughter</td>
                <td>Mouth and lips</td>
                <td>Sheep</td>
            </tr>
        </tbody>
    @elseif (session('locale') == 'pt')
        <thead>
            <tr>
                <th>Trigrama</th>
                <th>Nome</th>
                <th>Simbolismo</th>
                <th>Família</th>
                <th>Corpo Humano</th>
                <th>Animal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>☰</strong></td>
                <td>Ch'ien</td>
                <td>Céu, força criativa, masculino, positivo, forte, ativo</td>
                <td>Pai</td>
                <td>Cabeça</td>
                <td>Cavalo</td>
            </tr>
            <tr>
                <td><strong>☷</strong></td>
                <td>K'un</td>
                <td>Terra, receptividade, feminino, negativo, fraco, passivo</td>
                <td>Mãe</td>
                <td>Abdómen</td>
                <td>Vaca</td>
            </tr>
            <tr>
                <td><strong>☳</strong></td>
                <td>Chên</td>
                <td>Trovão, movimento, primogênito, início, impulso</td>
                <td>Irmão mais velho</td>
                <td>Pé</td>
                <td>Dragão</td>
            </tr>
            <tr>
                <td><strong>☵</strong></td>
                <td>K'an</td>
                <td>Água, perigo, escuridão, abismo, profundidade, fluidez</td>
                <td>Filho do meio</td>
                <td>Ouvido</td>
                <td>Porco</td>
            </tr>
            <tr>
                <td><strong>☴</strong></td>
                <td>Sun</td>
                <td>Vento, madeira, flexibilidade, penetração, perseverança, progresso</td>
                <td>Filha mais velha</td>
                <td>Coxas</td>
                <td>Gato</td>
            </tr>
            <tr>
                <td><strong>☲</strong></td>
                <td>Li</td>
                <td>Fogo, luz, claridade, sol, iluminação, consciência</td>
                <td>Filha do meio</td>
                <td>Olhos</td>
                <td>Pavão</td>
            </tr>
            <tr>
                <td><strong>☶</strong></td>
                <td>Kên</td>
                <td>Montanha, imobilidade, estabilidade, firmeza, resistência, inércia</td>
                <td>Filho mais novo</td>
                <td>Mão</td>
                <td>Cão</td>
            </tr>
            <tr>
                <td><strong>☱</strong></td>
                <td>Tui</td>
                <td>Lago, alegira, prazer, harmonia</td>
                <td>Filha mais nova</td>
                <td>Boca e lábios</td>
                <td>Ovelha</td>
            </tr>
        </tbody>
</table>
@endif
</table>
