let mix = require('laravel-mix')

mix
    .setPublicPath('public')
    .copy('./resources/img/**/*', 'public/vendor/genealabs/laravel-multi-step-progressbar')
;
