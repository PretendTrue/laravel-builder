<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Builder {{ config('app.name') ? ' - ' . config('app.name') : '' }}</title>

    <link href="{{ asset(mix('app.css', 'vendor/builder')) }}" rel="stylesheet" type="text/css">
</head>
<body>
<div id="builder" class="w-screen h-screen font-mono bg-gray-200">
    <router-view></router-view>
</div>

<!-- Global Builder Object -->
<script>
    window.Builder = @json($builderScriptVariables);
</script>

<script src="{{ asset(mix('app.js', 'vendor/builder')) }}"></script>
</body>
</html>