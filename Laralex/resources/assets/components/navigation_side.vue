<template>
  <div id="sideNavigation" class="min-h-screen w-full bg-blue-400 flex flex-col">
    <div class="bg-blue-500 shadow text-center p-8">
      <p class="text-slate-50 text-5xl font-bold">Laralex</p>
    </div>
    <div id="navLinks" class="flex flex-col text-slate-50 text-2xl px-4 py-5 gap-3">
      <a class="rounded-md px-4 py-1.5 cursor-pointer"
         :class="[activetab === 'Start' ? 'bg-blue-600 shadow-md' : 'bg-blue-500 ']"
         @click="changeTab('Start')"
      >Start</a>
      <a class="bg-blue-500 rounded-md px-4 py-1.5 cursor-pointer"
         :class="[activetab === 'Contacts' ? 'bg-blue-600 shadow-md' : 'bg-blue-500 ']"
         @click="changeTab('Contacts')"
      >Kontakte</a>
    </div>
  </div>

</template>

<script>
export default {
  props: ['activetab'],
  methods: {
    changeTab($tab) {
      this.$emit("changeTab", $tab)
    }
  }
}
</script>