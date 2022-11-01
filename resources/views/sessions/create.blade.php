<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log in </h1>
                <form method="POST" action="/sessions" class="mt-10">
                @csrf            
                <!-- Email -->
                <x-forms.input name='email' type='email' />
                <!--Password -->
                <x-forms.input name='password' type='password' />
                <!--Button -->
                <x-forms.button>Log in</x-forms.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>