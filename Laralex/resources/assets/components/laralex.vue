<template>
  <div class="flex min-h-screen w-screen flex-row" id="super">
    <sidenav
      class="flex-shrink-0"
      :activetab="currentlyActive"
      :visible="visible"
      @changeTab="(tab) => (currentlyActive = tab)"
    ></sidenav>

    <div class="flex w-full flex-col">
      <!--Optional space for topnav-->
      <div></div>

      <div class="overflow-y-scroll">
        <keep-alive>
          <statistics v-if="currentlyActive === 'Start'"></statistics>
        </keep-alive>

        <contacts v-if="currentlyActive === 'Contacts'"></contacts>
      </div>
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
