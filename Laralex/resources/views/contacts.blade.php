<html>
<head>

</head>
<body>
<table>
    <tr>
        <th>Vorname</th>
        <th>Name</th>
        <th>UUID</th>
    </tr>
    @foreach($data as $contact)
        <tr>
            <td>
                @if(array_key_exists("person", $contact))
                    {{ $contact["person"]["firstName"] }}
                @endif
            </td>
            <td>
                @if(array_key_exists("person", $contact))
                    {{ $contact["person"]["lastName"] }}
                @else
                    {{ $contact["company"]["name"]}}
                @endif
            </td>
            <td>
                {{ $contact["id"] }}
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>