<template>
  <div class="grid grid-cols-5">
    <div>
      <sidenav @changeTab="(tab) => currentlyActive = tab" :activetab="currentlyActive"></sidenav>
    </div>

    <div class="col-span-4">
      <statistics v-if="currentlyActive === 'Start'"></statistics>
      <contacts v-if="currentlyActive === 'Contacts'"></contacts>
    </div>
  </div>
</template>

<script>
import sidenav from "./navigation_side.vue"
import statistics from "./statistics.vue"
import contacts from "./contacts.vue"

export default {
  name: "laralex",
  data() {
    return {
      currentlyActive: "Start"
    }
  },

  components: {
    sidenav,
    statistics,
    contacts
  }
}
</script>

<style scoped>

</style>