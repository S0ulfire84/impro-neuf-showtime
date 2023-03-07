<template>
  <main>
    <!-- <TheWelcome /> -->
    <facebookLoginButton @onLoginToFacebook="onLoginToFacebook" />
  </main>
</template>

<script lang="ts" setup>
import { FacebookLogic } from "@/models/FacebookLogic";
import FacebookLoginButton from "../components/FacebookLoginButton.vue";

function onLoginToFacebook(response: any) {
  console.log("home view: ", response);

  FacebookLogic.getPageAccessToken();
}
// const appId = "900476307757109";
// function handleLogin(response: any) {
//   console.log(response);
// }
// function handleLoginFailed(response: any) {
//   console.log(response);
// }
</script>
