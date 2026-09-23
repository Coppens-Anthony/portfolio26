<section class="max-w-7xl mx-6 md:mx-16 2xl:mx-auto" id="contact"
         x-data
         @if ($errors->any() || session('success') || session('error'))
             x-init="$el.scrollIntoView({ behavior: 'smooth' })"
    @endif
>
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
        <div>
            @if (session('success'))
                <div
                    class="flex items-start gap-2 rounded-lg border border-success text-success bg-success/10 px-4 py-3 mb-4">
                    <span>✓</span>
                    <p>Message envoyé, merci ! Je reviens vers vous rapidement.</p>
                </div>
            @elseif (session('error'))
                <div
                    class="flex items-center gap-2 rounded-lg border border-error bg-error/10 text-error px-4 py-3 mb-4">
                    <span>✕</span>
                    <p>Une erreur est survenue lors de l'envoi. Vous pouvez me contacter directement par email ou
                        téléphone.</p>
                </div>
            @endif

            <form action="{{ route('contact') }}" class="flex flex-col gap-6" method="post">
                @csrf
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
                <x-global.form.button>Envoyer votre message</x-global.form.button>
            </form>
        </div>
    </div>
</section>
@if ($errors->any() || session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('contact')?.scrollIntoView({behavior: 'smooth'});
        });
    </script>
@endif
