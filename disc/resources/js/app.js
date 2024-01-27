import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


$('#new_lead_btn').on('click', function(){
    $('#lead_form_id').show();
});
    

