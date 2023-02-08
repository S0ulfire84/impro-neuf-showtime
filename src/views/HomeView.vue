<template>
  <main>
    <!-- <TheWelcome /> -->
    <facebook-login
    :appId="appId"
    @loggedIn="handleLogin"
    @loginFailed="handleLoginFailed"
  >
</facebook-login>
  </main>
</template>

<script lang="ts" setup>
import FacebookLogin from "../components/FacebookLogin.vue";
const appId = "900476307757109";
function handleLogin(response: any) {
  console.log(response);
}
function handleLoginFailed(response: any) {
  console.log(response);
}
</script>
