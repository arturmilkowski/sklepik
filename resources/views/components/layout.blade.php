<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Sklepik' }}</title>
  </head>
  <body>
    <x-logo />
    <x-nav />
    {{ $slot }}
    <hr>
    <x-footer />
  </body>
</html>