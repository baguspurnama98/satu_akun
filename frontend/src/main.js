import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import "@/assets/stylesheets/main.css";

createApp(App)
	.use(router)
	.mount("#app");
