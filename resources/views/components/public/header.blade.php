<header class="relative z-50 {{ request()->routeIs('home') ? 'bg-secondary' : '' }}"
        x-data="{
        open: false,
        trap(e) {
            if (!this.open) return;
            const f = [...this.$root.querySelectorAll('a[href], button')].filter(el => el.getClientRects().length);
            const first = f[0], last = f[f.length - 1];

            if (!f.includes(document.activeElement)) {
                e.preventDefault();
                first.focus();
            } else if (e.shiftKey && document.activeElement === first) {
                e.preventDefault();
                last.focus();
            } else if (!e.shiftKey && document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }
    }"
        x-effect="document.body.classList.toggle('overflow-hidden', open)"
        @keydown.escape.window="open = false"
        @keydown.tab.window="trap($event)">
    <div class="flex justify-between items-center py-8 px-6 md:px-16 max-w-7xl mx-auto 2xl:px-0">

        <div class="relative w-fit z-250">
            <a href="{{ route('home') }}" aria-label="Accueil" class="absolute inset-0 w-full h-full"></a>
            <img src="{{ asset('assets/svg/logo.svg') }}" alt="">
        </div>

        <button type="button" class="md:hidden relative w-8 h-8 z-250 cursor-pointer" @click="open = !open"
                :aria-expanded="open" aria-controls="main-navigation" aria-label="Menu">
            <span
                class="absolute left-1/2 top-1/2 w-7 h-0.5 bg-primary -translate-x-1/2 -translate-y-1/2 transition-transform duration-300"
                :class="open ? 'rotate-45' : '-translate-y-2'"></span>

            <span
                class="absolute left-1/2 top-1/2 w-7 h-0.5 bg-primary -translate-x-1/2 -translate-y-1/2 transition-opacity duration-200"
                :class="open ? 'opacity-0' : 'opacity-100'"></span>

            <span
                class="absolute left-1/2 top-1/2 w-7 h-0.5 bg-primary -translate-x-1/2 -translate-y-1/2 transition-transform duration-300"
                :class="open ? '-rotate-45' : 'translate-y-2'"></span>
        </button>

        <nav
            id="main-navigation"
            aria-label="Navigation principale"
            x-cloak
            class="fixed inset-0 z-200 bg-secondary pt-32 transition-all duration-300 md:static md:z-auto md:w-fit md:bg-transparent md:pt-0 md:opacity-100 md:visible md:pointer-events-auto md:translate-y-0"
            :class="open
        ? 'opacity-100 visible pointer-events-auto translate-y-0'
        : 'opacity-0 invisible pointer-events-none -translate-y-4'">
            <h2 class="sr-only">Navigation principale</h2>

            <ul class="flex flex-col md:flex-row gap-8 p-6 md:p-0 text-center">
                <li>
                    <x-global.link
                        :route="route('home')"
                        :isActive="request()->routeIs('home')"
                        @click="open = false">
                        Accueil
                    </x-global.link>
                </li>

                <li>
                    <x-global.link
                        :route="route('home').'#competences'"
                        @click="open = false">
                        Compétences
                    </x-global.link>
                </li>

                <li>
                    <x-global.link
                        :route="route('projects')"
                        :isActive="request()->routeIs('projects')"
                        @click="open = false">
                        Projets
                    </x-global.link>
                </li>

                <li>
                    <x-global.link
                        :route="route('home').'#experiences'"
                        @click="open = false">
                        Parcours
                    </x-global.link>
                </li>

                <li class="md:hidden w-fit mx-auto">
                    <x-global.link_button :route="route('home').'#contact'" @click="open = false">
                        Contact
                    </x-global.link_button>
                </li>
            </ul>
        </nav>

        <div class="hidden md:block">
            <x-global.link_button :route="route('home').'#contact'">
                Contact
            </x-global.link_button>
        </div>
    </div>
</header>
