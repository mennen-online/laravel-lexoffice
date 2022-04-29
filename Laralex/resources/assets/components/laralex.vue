<template>
  <div class="flex flex-row max-w-screen">
    <div class="">
      <sidenav
        :activetab="currentlyActive"
        :visible="visible"
        @changeTab="(tab) => (currentlyActive = tab)"
        @toggleMobile="toggleMobile"
      ></sidenav>
    </div>

    <div class="w-full flex flex-col">
      <optionNav :visible="visible" @toggleMobile="toggleMobile"></optionNav>
      <keep-alive>
        <statistics v-if="currentlyActive === 'Start'"></statistics>
      </keep-alive>

      <contacts v-if="currentlyActive === 'Contacts'"></contacts>
    </div>
  </div>
</template>

<script>
import sidenav from "./navigation_side.vue";
import statistics from "./statistics.vue";
import contacts from "./contacts.vue";
import optionNav from "./navigation_optional.vue";

export default {
  name: "laralex",
  data() {
    return {
      currentlyActive: "Start",
      visible: true,
    };
  },

  components: {
    sidenav,
    statistics,
    optionNav,
    contacts,
  },
  methods: {
    toggleMobile() {
      this.visible = !this.visible;
    },
  },
};
</script>

<style scoped></style>