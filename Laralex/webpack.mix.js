const mix = require("laravel-mix")

mix
    .setPublicPath("public")
    .js("resources/assets/js/app.js", "public/js")
    .vue({version: 3})
    .postCss("resources/assets/css/app.css", "public/css", [
        require("tailwindcss"),
    ]);