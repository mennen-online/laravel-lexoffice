import { createApp } from "vue"
import SideNav from "../components/navigation_side.vue"
const app = createApp({})
app.component("sidenav", SideNav)
app.mount('#app')