
<div class="flex justify-end mt-6 mx-6 items-center">
        <div class="flex-1">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Oportunidades') }}
            </h2>
        </div>
        <x-primary-button id="new_lead_btn" class="mx-3">
                {{ __(' Nova Oportunidade') }}
        </x-primary-button>
        <x-secondary-button class="">
                {{ __(' Atualizar Oportunide') }}
        </x-primary-button>
    </div>
    <div id="lead_form_id" hidden>
        @include('leads.new-lead')
    </div>
    <div class="p-6 text-gray-900 sm:px-6">
        <div class="flex columns-7 text-center bg-gray-100 sm:rounded-lg p-4">
            <div class="w-full mx-1 rounded-lg text-sky-50 bg-indigo-500">Contato Iniciado</div>
            <div class="w-full mx-1 rounded-md text-sky-50 bg-amber-600">Resposta Pendente</div>
            <div class="w-full mx-1 rounded-md text-sky-50 bg-gray-600">Esperando Sinal</div>
            <div class="w-full mx-1 px-1 rounded-md text-sky-50 bg-purple-800">Tatuagem Agendada</div>
            <div class="w-full mx-1 rounded-md text-sky-50 bg-orange-800">Reagendamento</div>
            <div class="w-full mx-1 rounded-md text-sky-50 bg-emerald-700">Cliente Adquirido</div>
            <div class="w-full mx-1 rounded-md text-sky-50 bg-red-600">Cliente Perdido</div>
        </div>
        
</div>
<script>
    
</script>