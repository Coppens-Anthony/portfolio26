<footer class="bg-secondary px-6 pt-12 lg:p-16 lg:pb-0 mt-16 lg:mt-32">
    <div class="flex flex-col gap-10 lg:flex-row lg:justify-between max-w-7xl 2xl:mx-auto">
        <div class="relative w-fit h-fit z-100">
            <a href="{{ route('home') }}" aria-label="Accueil" class="absolute inset-0 w-full h-full"></a>
            <img src="{{ asset('assets/svg/logo.svg') }}" alt="">
        </div>
        <div class="flex flex-col gap-10 lg:flex-row lg:justify-between lg:gap-32">
            <nav aria-label="Navigation secondaire">
                <h2 class="font-semibold mb-4">Navigation <span class="sr-only">secondaire</span></h2>
                <ul class="flex flex-col gap-4">
                    <li>
                        <x-global.link
                            :route="route('home')">
                            Accueil
                        </x-global.link>
                    </li>
                    <li>
                        <x-global.link
                            :route="route('home').'#competences'">
                            Compétences
                        </x-global.link>
                    </li>
                    <li>
                        <x-global.link
                            :route="route('projects')">
                            Projets
                        </x-global.link>
                    </li>
                    <li>
                        <x-global.link
                            :route="route('home').'#experiences'">
                            Parcours
                        </x-global.link>
                    </li>
                    <li>
                        <x-global.link
                            :route="route('home').'#contact'">
                            Contact
                        </x-global.link>
                    </li>
                </ul>
            </nav>
            <section>
                <h2 class="font-semibold mb-4">Coordonnées</h2>
                <ul class="flex flex-col gap-4">
                    <li>
                        <x-global.link
                            route="mailto:anthonycoppens04@gmail.com">
                            anthonycoppens04@gmail.com
                        </x-global.link>
                    </li>
                    <li>
                        <x-global.link
                            route="tel:+32477810647">
                            +32 (0)4 77 81 06 47
                        </x-global.link>
                    </li>
                    <li>
                        <p>Orp-Jauche, Belgique</p>
                    </li>
                </ul>
            </section>
            <section>
                <h2 class="font-semibold mb-4">Réseaux</h2>
                <ul class="flex gap-4 lg:flex-col">
                    <li class="relative w-fit group cursor-pointer">
                        <a href="https://github.com/Coppens-Anthony" aria-label="GitHub" target="_blank"
                           rel="noopener noreferrer" class="absolute inset-0 w-full h-full z-10 outline-none"></a>
                        <svg class="text-black transition duration-200 group-hover:text-primary group-hover:scale-110 group-focus-within:text-primary group-focus-within:scale-110"
                             width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.0944 21.25C15.0981 20.6664 15.1018 18.6407 15.1018 17.8387C15.1018 16.6797 14.7059 15.9214 14.2619 15.5375C17.0183 15.2295 19.912 14.1796 19.912 9.40411C19.912 8.04723 19.434 6.93723 18.6401 6.06873C18.7673 5.75423 19.1918 4.48998 18.5168 2.77873C18.5168 2.77873 17.4797 2.44473 15.1165 4.05423C14.1275 3.77761 13.0701 3.64073 12.0185 3.63523C10.9668 3.64073 9.9095 3.77773 8.92037 4.05423C6.55712 2.44473 5.52025 2.77873 5.52025 2.77873C4.84525 4.48998 5.26975 5.75423 5.39687 6.06873C4.603 6.93723 4.125 8.04723 4.125 9.40411C4.125 14.1796 7.01862 15.2295 9.775 15.5375C9.33112 15.9214 8.93513 16.6797 8.93513 17.8387C8.93513 18.6407 8.93888 20.6664 8.9425 21.25M3.375 16.25C4.61738 16.3379 5.33375 17.4669 5.33375 17.4669C6.438 19.3667 8.231 18.8172 8.93563 18.5"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </li>
                    <li class="relative w-fit group cursor-pointer">
                        <a href="https://www.linkedin.com/in/anthony-coppens-8ba3832a7/" aria-label="LinkedIn"
                           target="_blank" rel="noopener noreferrer"
                           class="absolute inset-0 w-full h-full z-10 outline-none"></a>
                        <svg class="text-black transition duration-200 group-hover:text-primary group-hover:scale-110 group-focus-within:text-primary group-focus-within:scale-110"
                             width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 22V15C18 13.8954 17.1046 13 16 13C14.8954 13 14 13.8954 14 15V22H10"
                                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 22V15C10 11.6863 12.6863 9 16 9C19.3137 9 22 11.6863 22 15V22H18"
                                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 9H3V22H7V9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path
                                d="M5 6C6.10457 6 7 5.10457 7 4C7 2.89543 6.10457 2 5 2C3.89543 2 3 2.89543 3 4C3 5.10457 3.89543 6 5 6Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </li>
                </ul>
            </section>
        </div>
    </div>
    <section class="flex flex-col gap-2 py-8 border-t border-black mt-8 sm:flex-row sm:justify-between max-w-7xl 2xl:mx-auto">
        <h2 class="sr-only">Mentions légales</h2>
        <p>© 2026 Anthony Coppens. Tous droits réservés.</p>
        <x-global.link route="">Mentions légales</x-global.link>
    </section>
</footer>
