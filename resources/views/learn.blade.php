<x-layout page="learn">
    <section id="learn">
        <div class="content">
            <nav class="learnMenu">
                <ul>
                    <a href={{route("learn.history")}}><li class={{ request()->routeIs('learn') || request()->routeIs('learn.history')  ? 'active' : ''}}>@lang('messages.learnButtons.history')</li></a></a>
                    <a href={{route("learn.about")}}><li class={{ request()->routeIs('learn.about') ? 'active' : ''}}>@lang('messages.learnButtons.about')</li></a></a>
                    <a href={{route("learn.trigrams")}}><li class={{ request()->routeIs('learn.trigrams') ? 'active' : ''}}>@lang('messages.learnButtons.trigrams')</li></a></a>
                    <a href={{route("learn.hexagrams")}}><li class={{ request()->routeIs('learn.hexagrams') ? 'active' : ''}}>@lang('messages.learnButtons.hexagrams')</li></a></a>
                </ul>

            </nav>
            <div class="learnContainer">
                {!!$content!!}
            </div>
        </div>
    </section>
</x-layout>
<script>


</script>
