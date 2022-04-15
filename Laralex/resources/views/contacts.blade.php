<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="grid grid-cols-6 h-full">
    <div id="nav" class="bg-blue-600">
        <div id="navHeader" class="shadow">
            <div class="flex py-5 bg-blue-800 justify-center m-auto text-2xl text-slate-200">
                Laralex
            </div>
        </div>
        <div id="navOptions" class="text-slate-100 text-opacity-90 p-3">

            <ul class="">


                <li class="cursor-pointer bg-blue-700 rounded-lg py-1 px-2.5 mb-2 {{ Request::is("laralex") ? "bg-blue-500" : ""}}">Start</li>


                <li class="bg-blue-700 z-10 relative rounded-lg py-1 -mb-1.5 px-2.5" id="contactsDropdownContainer">
                    <div class="flex justify-between items-center" onclick="showDropdown()">
                        <a class="">Kontakte</a>
                        <svg id="contactsChevron" xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4 cursor-pointer ease-in-out transition-transform" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </div>


                </li>

                <ul class="relative hidden z-0 ease-in-out relative opacity-0 rounded-b-lg pb-1 transition-all -top-6 bg-blue-700 px-2.5 pt-0.5 mb-2" id="contactsDropdown">
                    <li class="">Privatpersonen</li>
                    <li>Firmen</li>
                </ul>


            </ul>
        </div>
    </div>

    <div class="col-span-5 bg-slate-100">
        <div id="topNav" class="h-10 flex bg-slate-100 shadow">

        </div>

        <div id="content">

        </div>
    </div>
</div>

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

<script type="text/javascript">
    function showDropdown() {
        const drop = document.getElementById("contactsDropdown");
        const chev = document.getElementById("contactsChevron");

        if (drop.classList.contains("hidden")) {
            drop.classList.remove("hidden");

            setTimeout(function () {
                drop.classList.add("opacity-100", "duration-500", "top-0");
                chev.classList.add("-rotate-90", "duration-500");
            }, 1);
        } else {
            drop.classList.remove("opacity-100", "duration-500", "top-0");
            drop.classList.add("opacity-0", "duration-500", "-top-6");
            chev.classList.remove("-rotate-90");

            setTimeout(function () {
                drop.classList.add("hidden");
            }, 300)
        }
    }
</script>
</html>