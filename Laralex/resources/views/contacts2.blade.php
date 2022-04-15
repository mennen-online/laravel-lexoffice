@extends("laralex::layouts.master")

@section("title", "Laralex - Kontakte")
@section("sideNav")
    @parent
@endsection
@section("content")
    <table class="w-full text-center">
        <tr class="text-xl font-semibold shadow">
            <th class="p-2">Vorname</th>
            <th>Name</th>
            <th>UUID</th>
        </tr>
        @foreach($data as $contact)
            <tr class="odd:bg-slate-100 even:bg-blue-100">
                @if(array_key_exists("person", $contact))
                <td class="p-1">
                        {{ $contact["person"]["firstName"] }}
                @else
                    <td class="p-1" colspan="2">
                        {{ $contact["company"]["name"]}}
                    @endif
                </td>
                @if(array_key_exists("person", $contact))
                <td class="p-1">
                        {{ $contact["person"]["lastName"] }}

                    @endif
                </td>
                <td class="p-1">
                    {{ $contact["id"] }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
