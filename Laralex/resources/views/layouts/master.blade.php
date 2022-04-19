<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield("title")</title>
</head>
<body>
<div class="grid grid-cols-6">
    <div>
        @section("sideNav")
            <div id="nav" class="min-h-screen bg-blue-600">
                <div id="navHeader" class="shadow">
                    <div class="flex justify-center py-5 m-auto text-2xl bg-blue-800 text-slate-200">
                        Laralex
                    </div>
                </div>
                <div id="navOptions" class="p-3 text-opacity-90 text-slate-100">

                    <ul class="">


                        <a href="{{ url("/laralex/")  }}">
                            <li class="cursor-pointer bg-blue-700 rounded-lg py-1 px-2.5 mb-2 {{ Request::is("laralex") ? "bg-blue-500" : ""}}">
                                Start
                            </li>
                        </a>


                        <li class="bg-blue-700 z-30 relative rounded-lg py-1 -mb-1.5 px-2.5 {{ Request::is("laralex/contacts") || Request::is("laralex/companies") ? "bg-blue-500 shadow" : ""}}"
                            id="contactsDropdownContainer">
                            <div class="flex justify-between items-center" onclick="showDropdown()">

                                <p class="cursor-pointer">Kontakte</p>

                                <svg id="contactsChevron" xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4 transition-transform ease-in-out cursor-pointer" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </div>


                        </li>

                        <ul class="hidden relative -top-6 pt-1 text-sm bg-blue-700 rounded-b-lg opacity-0 transition-all ease-in-out"
                            id="contactsDropdown">

                            <a class="" href="{{ url("laralex/contacts") }}">
                                <li class="relative z-20 {{ Request::is("laralex/contacts") ? "bg-blue-400 py-1 shadow" : "bg-blue-700"}} rounded-b-lg py-0.5 px-2.5">
                                    Privatpersonen
                                </li>
                            </a>

                            <a href="{{ url("laralex/companies") }}">
                                <li class="relative z-10 -mt-1   {{ Request::is("laralex/companies") ? "bg-blue-400 py-1 shadow" : "bg-blue-700 "}} rounded-b-lg  pt-1 pb-0.5 px-2.5">
                                    Firmen
                                </li>
                            </a>

                        </ul>

                        <a href="{{ url("laralex/create") }}">
                            <li class="cursor-pointer bg-blue-700 rounded-lg px-2.5 mb-2 mt-4 py-1 {{ Request::is("laralex/create") ? "bg-blue-500" : ""}}">Erstellen</li>
                        </a>
                    </ul>
                </div>
            </div>


    </div>

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
                }, 500)
            }
        }
    </script>

    @show
    <div class="col-span-5">
        @section("topNav")
            <div id="topNav" class="flex h-10 shadow bg-slate-200">
                @yield("topNavContent")
            </div>
        @show
        <div class="bg-slate-100">
            @yield("content")
        </div>
    </div>
</div>
</body>
</html>