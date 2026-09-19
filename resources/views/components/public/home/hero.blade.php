<div class="bg-secondary">
    <section class="w-full px-6 md:w-fit mx-auto h-[calc(100vh-72px)] md:h-[calc(100vh-112px)] flex items-center">
        <div class="flex flex-col gap-6 md:gap-8 items-center mx-auto">
            <h2 class="text-[2rem] sm:text-[2.75rem] md:text-[4rem] font-bold text-center max-w-155">Développeur <span class="text-primary">Web</span>, UX/UI
                Designer</h2>
            <p class="max-w-155 text-center text-sm md:text-base">Je m'appelle Anthony Coppens, fraîchement diplomé, je conçois et
                développe des applications web. </p>
            <div class="flex flex-col sm:flex-row gap-4 md:gap-8 w-full justify-center">
                <x-global.link_button :route="route('projects')">Voir mes projets</x-global.link_button>
                <x-global.link_button :route="route('home'). '#contact'">Me contacter</x-global.link_button>
            </div>
        </div>
    </section>
</div>
