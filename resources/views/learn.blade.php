<x-layout page="learn">
    <section id="learn">
        <div class="content">
            <div class="hamburguerButton" onclick="toggleMenu()"><img width="30rem" src={{ asset('/assets/icons/menu.png') }} ></div>

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
    <script>
        function toggleMenu() {
            if(document.querySelector(".learnMenu").style.display == "none")
                document.querySelector(".learnMenu").style.display = "flex";
            else {
                document.querySelector(".learnMenu").style.display = "none";
            }


        }

        document.querySelector(".learnContainer").addEventListener("click", () => {
            // && document.querySelector('.hamburguerButton').style.display != "hidden")
            if(document.querySelector('.learnMenu').style.display == "flex") {
                if(document.querySelector('.hamburguerButton').style.display != "none") {
                    document.querySelector(".learnMenu").style.display = "none";
                }
            }
        });
    </script>
</x-layout>
