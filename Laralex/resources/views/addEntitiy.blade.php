@extends("laralex::layouts.master")
@section("title", "Hinzufügen - Laralex")
@section("sideNav")
    @parent
@endsection
@section("topNav")
    @parent
@endsection
@section("topNavContent")
    <div class=" bg-slate-200 button cursor-pointer hover:bg-blue-400 p-2 transition h-full ease-out text-slate-400 hover:text-slate-50   "
         onclick="createFormIndividual()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
    </div>

    <div>

    </div>
@endsection
@section("content")
    <div class="px-8 py-6 m max-w-xs w-full self-center mx-auto bg-slate-100 rounded-lg shadow-md">
        <form method="POST" class="" action="{{ url("/laralex") }}">
            <label for="indLastName" class="block mb-1">Name</label>
            <input type="text" id="indLastName" name="lastName"
                   class="w-full mb-4 p-1 appearance-none outline outline-1 outline-blue-300 focus:outline-blue-400 transition-all">


            <label for="indFirstName" class="block mb-1">Vorname</label>
            <input type="text" id="indFirstName" name="firstName"
                   class="w-full p-1 appearance-none outline outline-1 outline-blue-300 focus:outline-blue-400 transition-all">


            <div class="flex flex-row items-center justify-between mt-5">
                <input type="button" value="Anlegen"
                       class="cursor-pointer shadow-md bg-blue-400 hover:bg-blue-500 transition text-slate-50  px-4 py-1 rounded outline outline-1 outline-blue-400 ">
                <input type="reset" value="Reset"
                       class="rounded cursor-pointer shadow-md bg-red-400 px-4 py-1 outline outline-1 hover:bg-red-500 transition text-slate-50 outline-red-400">
            </div>
        </form>
    </div>


    <script type="text/javascript">
        function createFormIndividual() {

        }
    </script>
@endsection