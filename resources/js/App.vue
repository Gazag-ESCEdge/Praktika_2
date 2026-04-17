<template>
  <HeaderComponent></HeaderComponent>
  <div class="top-filled"></div>
  <router-view />
  <FooterComponent></FooterComponent>
</template>

<script setup>
  import HeaderComponent from './components/HeaderComponent.vue';
  import FooterComponent from './components/FooterComponent.vue';
  import { onMounted } from 'vue'
  import { useRoute } from 'vue-router'

  const route = useRoute()

  onMounted(() => {
    document.addEventListener('click', (e) => {
      const link = e.target.closest('a[href^="#"]')
      
      if (link) {
        const targetHash = link.getAttribute('href')
        
        if (window.location.pathname === route.path) {
          e.preventDefault()
          
          const targetElement = document.querySelector(targetHash)
          
          if (targetElement) {
            window.scrollTo({
              top: targetElement.offsetTop - 80,
              behavior: 'smooth'
            })
            
            history.pushState(null, null, targetHash)
          }
        }
      }
    })
  })
</script>
