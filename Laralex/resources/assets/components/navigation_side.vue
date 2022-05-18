<template>

  <nav class="w-80 border-r bg-slate-100 min-w-max">
    <div class="flex flex-col">
      <div class="self-center p-6">
        <div class="flex flex-row items-center">
          <span class="text-slate-700"
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
              /></svg
          ></span>
          <h1 class="text-4xl font-bold text-slate-700">Laralex</h1>
        </div>
      </div>

      <div class="flex flex-col gap-2 p-4 text-slate-800">
        <div
          class="flex cursor-pointer flex-row items-center rounded-lg transition duration-75"
          :class="[activetab === 'Start' ? 'bg-slate-200 shadow' : '']"
          @click="changeTab('Start')"
        >
          <span class="py-2.5 px-3 text-slate-700 hover:text-slate-800">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
              />
            </svg>
          </span>
          <h2 class="text-2xl font-semibold">Start</h2>
        </div>

        <div
          class="flex cursor-pointer flex-row items-center rounded-lg transition duration-75"
          :class="[activetab === 'Contacts' ? 'bg-slate-200 shadow' : '']"
          @click="changeTab('Contacts')"
        >
          <span class="py-2.5 px-3 text-slate-700 hover:text-slate-800">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
              />
            </svg>
          </span>
          <h2 class="text-2xl font-semibold">Kunden</h2>
        </div>

        <div
          class="flex cursor-pointer flex-row items-center rounded-lg transition duration-75"
          :class="[activetab === 'Invoices' ? 'bg-slate-200 shadow' : '']"
          @click=""
        >
          <span class="py-2.5 px-3 text-slate-700 hover:text-slate-800">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"
              />
            </svg>
          </span>
          <h2 class="text-2xl font-semibold">Rechnungen</h2>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  props: ["activetab", "visible"],
  methods: {
    changeTab($tab) {
      this.$emit("changeTab", $tab);
    },

    toggleMobile() {
      this.$emit("toggleMobile");
    },
  },
};
</script>
