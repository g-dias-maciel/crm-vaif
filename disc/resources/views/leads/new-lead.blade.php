
<div>
    <div>
         
         <div><!-- Name -->
            <x-input-label for="name" :value="__('labels.name')" class="m-3" />
            <x-text-input id="name" class="block m-3 w-50%" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('labels.email')" class="m-3" />
            <x-text-input id="email" class="block m-3 w-50%" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">{{ __('Adicionar') }}</x-primary-button>
</div>
</div>
<script>

</script>


