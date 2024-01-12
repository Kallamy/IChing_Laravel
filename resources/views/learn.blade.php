<x-layout page="learn">
    <section id="learn">
        <nav class="learnMenu">
            <ul>
                <a href={{route("learn.history")}}><li class={{ request()->routeIs('learn') || request()->routeIs('learn.history')  ? 'active' : ''}}>História do I Ching</li></a></a>
                <a href={{route("learn.about")}}><li class={{ request()->routeIs('learn.about') ? 'active' : ''}}>Sobre o I Ching</li></a></a>
                <a href={{route("learn.trigrams")}}><li class={{ request()->routeIs('learn.trigrams') ? 'active' : ''}}>Trigramas</li></a></a>
                <a href={{route("learn.hexagrams")}}><li class={{ request()->routeIs('learn.hexagrams') ? 'active' : ''}}>Hexagramas</li></a></a>
            </ul>

        </nav>
        <div class="learnContainer">
            {!!$content!!}
        </div>
    </section>
</x-layout>
<script>


</script>
