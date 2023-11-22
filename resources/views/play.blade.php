<x-layout page="play">
    <section id="play">
        <div class="frameArea">
            <x-InteractiveFrame
            {{-- lines ="{{$hexagram['lines']}}" --}}
            title="{{$hexagram['title']}}"
            chineseName="{{$hexagram['chineseName']}}"
            number="{{$hexagram['number']}}"
            symbol="{{$hexagram['symbol']}}"
            upperTrigram="{{$hexagram['upperTrigram']}}"
            bottomTrigram="{{$hexagram['bottomTrigram']}}"

            />
        </div>
    </section>
</x-layout>
