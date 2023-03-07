<template>
  <v-app-bar flat>
    <a href="/improneuf/frontend/#/">
      <v-app-bar-title class="bar-title">
        <div>
          <v-img contain height="32" src="@/assets/impro-neuf-logo.png" />
        </div>
        <div>It's Showtime</div>
      </v-app-bar-title>
    </a>
  </v-app-bar>
</template>

<script lang="ts" setup>
//
</script>

<style scoped>
.bar-title {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
</style>
