
<div class="flex justify-end mt-6 mx-6 items-center">
        <div class="flex-1">
            <div class="form-group">
                <x-text-input id="leads_search_id" class="block m-3 w-50%" type="text" name="search" :placeholder="__('labels.search_placeholder')" />
                <span id="leads_list_id"></span>
            </div>
        </div>
        <x-primary-button id="show_new_lead_btn" class="mx-3">
                {{ __(' Nova Oportunidade') }}
        </x-primary-button>
        <x-secondary-button class="">
                {{ __(' Atualizar Oportunide') }}
        </x-primary-button>
    </div>
    <div id="lead_form_id" hidden>
        @include('leads.new-lead')
    </div>
    
<script type="module">
    $('#show_new_lead_btn').on('click', function(){
        $('#lead_form_id').show();
    });
    
    $('#leads_search_id').on('keyup',function(){
        var value = $(this).val();

        if (value === ''){
            $('#leads_list_id').html('');
            return; 
        }

        $.ajax({
            type : 'get',
            url : "{{ route('leads.search') }}",
            data:{'search':value},
            success:function(data)
            {
                $('#leads_list_id').html(data); 
        }
    });

    $('#leads_list_id').on('click', 'li', function(){
        var value = $(this).text();
        console.log(value)         

    });
})
</script>