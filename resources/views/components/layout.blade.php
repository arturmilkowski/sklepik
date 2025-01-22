<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Sklepik' }}</title>
    @vite('resources/css/main.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
  </head>
  <body class="bg-stone-50 text-stone-700 dark:bg-stone-800 dark:text-stone-400">
    <x-logo />
    <x-nav />
    {{ $slot }}
    <x-footer />
  </body>
</html>