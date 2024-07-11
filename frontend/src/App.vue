<template>
  <v-app>
    <v-main>
      <Navbar />
      <main>
        <RouterView v-slot="{ Component }">
          <Transition transition-name="fade">
            <Component :is="Component" :key="$route.path"/>
          </Transition>
        </RouterView>
      </main>
    </v-main>
    <Footer />
  </v-app>
</template>

<script setup>
  import { RouterView } from 'vue-router'

</script>
<style>
a {
  text-decoration: none;
  color: #000000;
}
</style>