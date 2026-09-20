<button
    x-data="{ show: false }"
    x-on:scroll.window.passive="show = window.scrollY > 300"
    x-show="show"
    x-transition.opacity
    x-cloak
    x-on:click="window.scrollTo({ top: 0, behavior: 'smooth' })"
    class="group fixed bottom-8 right-6 md:right-16 bg-primary text-white rounded-full p-3 outline-none duration-200 cursor-pointer z-150 hover:bg-primary-hover focus:bg-primary-hover hover:-translate-y-1 focus:-translate-y-1 hover:shadow-[0_8px_20px_-6px_var(--color-primary)] focus:shadow-[0_8px_20px_-6px_var(--color-primary)] active:translate-y-0">
    <img src="{{ asset('assets/svg/arrow_up.svg') }}" alt=""
         class="transition-transform duration-200 group-hover:-translate-y-0.5 [.group:focus_&]:-translate-y-0.5">
</button>
