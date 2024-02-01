

<div>
    <form data-action="{{ route('leads.create') }}" method="POST" enctype="multipart/form-data" id="add-lead-form">
    @csrf

    <div><!-- Name -->
            <x-input-label for="name" :value="__('labels.name')" class="m-3" />
            <x-text-input id="name" class="block m-3 w-50%" type="text" name="name" required autofocus/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('labels.email')" class="m-3" />
            <x-text-input id="email" class="block m-3 w-50%" type="email" name="email" required autofocus/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- phone-->
        <div>
            <x-input-label for="phone" :value="__('labels.phone')" class="m-3" />
            <x-text-input id="phone" class="block m-3 w-50%" type="text" name="phone"  required autofocus/>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <x-primary-button type="submit" id="add_new_lead_btn" class="mt-4">{{ __('Adicionar') }}</x-primary-button>
    </form>
</div>

<script type="module">
    
    $(document).ready(function(){

        var form = '#add-lead-form';

        $(form).on('submit', function(event){
            event.preventDefault();

            var url = $(this).attr('data-action');

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    '_token': "{{ csrf_token() }}",
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                },
                success: function(data)
                {
                
                    if(data.success){
                        $(form).trigger("reset");
                        alert(data.message)
                    }
                    
                },
                error: (xhr, status, error) => {
                    var err = JSON.parse(xhr.responseText);
                    alert(err.message);
                }
            });
        });

    }); 
</script>


