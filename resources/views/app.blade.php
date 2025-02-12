<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title inertia>{{ config("app.name", "Laravel Crud") }}</title>
        @routes
        @vite(["resources/js/app.js", "resources/js/Pages/{$page["component"]}.vue"])
        @inertiaHead
    </head>

    <body class="font-sans antialiased">
        @inertia
    </body>

</html>
