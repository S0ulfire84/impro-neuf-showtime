<template>
  <button @click="loginToFacebook">Log in to Facebook</button>
</template>

<script lang="ts" setup>
import { FacebookLogic } from "@/models/FacebookLogic";

const emit = defineEmits(["onLoginToFacebook"]);

async function loginToFacebook() {
  const loginResponse = await FacebookLogic.loginToFacebook();

  if (loginResponse) {
    emit("onLoginToFacebook", loginResponse);
  }
}
</script>
