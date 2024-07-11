/**
 * main.js
 *
 * Bootstraps Vuetify and other plugins then mounts the App`
 */

// Plugins
import { registerPlugins } from '@/plugins'
import Router from './router'
import VueTheMask from 'vue-the-mask'

// Components
import App from './App.vue'

// Composables
import { createApp } from 'vue'

const app = createApp(App)

app.use(VueTheMask)
app.use(Router)

registerPlugins(app)

app.mount('#app')
