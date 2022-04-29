<template>
  <transition-group >
    <div
        id="sideNavigation"
        class="min-h-full bg-blue-400 flex flex-col flex"
        :class="[visible === false ? 'hidden' : 'block']"
    >
      <div class="bg-blue-500 shadow text-center p-2">
        <p class="text-slate-50 text-5xl font-bold hidden md:block">LX</p>
        <button class="block md:hidden mx-auto text-slate-50" @click="toggleMobile">
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
                d="M4 6h16M4 12h16M4 18h16"
            />
          </svg>
        </button>
      </div>

      <div
          id="navLinks"
          class="flex flex-col justify-center text-slate-50 text-2xl p-2 md:px-4 py-5 gap-3"
      >
        <a
            class="rounded-md md:px-4 md:py-1.5 cursor-pointer overflow-hidden md:w-full md:max-w-full max-w-min p-2 mx-auto"
            :class="[
          activetab === 'Start' ? 'bg-blue-600 shadow-md' : 'bg-blue-500 ',
        ]"
            @click="changeTab('Start')"
        >
          <p class="hidden md:block text-lg lg:text-2xl">Start</p>
          <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 block md:hidden mx-auto"
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
        </a>
        <a
            class="rounded-md md:px-4 md:py-1.5 cursor-pointer overflow-hidden md:w-full md:max-w-full max-w-min p-2 mx-auto"
            :class="[
          activetab === 'Contacts' ? 'bg-blue-600 shadow-md' : 'bg-blue-500 ',
        ]"
            @click="changeTab('Contacts')"
        >
          <p class="hidden md:block text-lg lg:text-2xl">Kontakte</p>
          <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 block md:hidden mx-auto"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
          >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
            />
          </svg>
        </a>
      </div>
    </div>
  </transition-group>
</template>

<script>
export default {
  props: ["activetab", "visible"],
  methods: {
    changeTab($tab) {
      this.$emit("changeTab", $tab);
    },

    toggleMobile() {
      this.$emit("toggleMobile")

    }
  }
};
</script>
