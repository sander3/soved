
try {
    window.$ = window.jQuery = require('jquery');

    // require('bootstrap');
} catch (e) {}

let token = document.head.querySelector('meta[name="csrf-token"]');
