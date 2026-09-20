<section class="max-w-7xl mx-6 md:mx-16 2xl:mx-auto" id="contact">
    <x-public.home.section_title>Une question, un projet&nbsp;?</x-public.home.section_title>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <div>
            <div class="flex flex-col gap-1 w-fit mb-4">
                <p class="font-semibold">Email</p>
                <x-global.link route="mailto:anthonycoppens04@gmail.com">anthonycoppens04@gmail.com
                </x-global.link>
            </div>
            <div class="flex flex-col gap-1 w-fit">
                <p class="font-semibold">Téléphone</p>
                <x-global.link route="tel:+32477810647">+32 (0)4 77 81 06 47</x-global.link>
            </div>
        </div>
        <form action="" class="flex flex-col gap-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <x-global.form.input name="name" placeholder="John Doe">
                    Nom
                </x-global.form.input>
                <x-global.form.input type="email" name="email" placeholder="john@doe.com">
                    Email
                </x-global.form.input>
            </div>
            <x-global.form.input name="subject" placeholder="Prise de contact">
                Sujet
            </x-global.form.input>
            <x-global.form.textarea name="message" placeholder="Je vous contacte afin de...">
                Message
            </x-global.form.textarea>
            <p><span class="text-error">*</span> champs obligatoires</p>
            <div class="w-fit mx-auto">
                <x-global.form.button>Envoyer votre message</x-global.form.button>
            </div>
        </form>
    </div>
</section>
