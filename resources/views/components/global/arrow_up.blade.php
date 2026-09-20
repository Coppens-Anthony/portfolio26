<button
    x-data="{ show: false }"
    x-on:scroll.window.passive="show = window.scrollY > 300"
    x-show="show"
    x-transition.opacity
    x-cloak
    x-on:click="window.scrollTo({ top: 0, behavior: 'smooth' })"
    class="fixed bottom-8 right-6 md:right-16 bg-primary text-white rounded-full p-3 hover:bg-primary-hover duration-200 cursor-pointer z-150">
    <img src="{{ asset('assets/svg/arrow_up.svg') }}" alt="">
</button>
