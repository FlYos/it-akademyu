<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <form action="" method="post">
            @csrf()
            <input type="text" name="q" class="border border-black">
            <button type="submit">rechercher</button>
        </form>

        @if(isset($data))
            <table>
                @foreach($data['features'] as $feature)
                <tr>
                    <td>{{ $feature['properties']['label'] }}</td>
                </tr>
                @endforeach
            </table>
        @endif
    </body>
</html>
