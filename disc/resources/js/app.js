import './bootstrap';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask';

window.Alpine = Alpine;

Alpine.start();

Alpine.plugin(mask)

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });


    

