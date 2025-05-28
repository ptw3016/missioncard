import { createApp } from 'vue'
import App from './App.vue'
import router from '../router'

// Use Vue Router
const app = createApp(App)
app.use(router)

// Github Pages hash fallback for admin
router.isReady().then(() => {
  const hash = window.location.hash
  if (hash.startsWith('#/admin')) {
    router.replace(hash.slice(1))
  }
  app.mount('#app')
})
