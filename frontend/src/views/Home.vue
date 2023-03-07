<template>
  <v-container class="fill-height">
    <v-responsive class="d-flex align-center text-center fill-height">
      <v-img contain height="300" src="@/assets/impro-neuf-logo.png" />

      <div class="text-body-2 font-weight-light mb-n1">Welcome to</div>

      <h1 class="text-h2 font-weight-bold">Showtime</h1>

      <!-- <div class="py-14" /> -->

      <v-row class="d-flex align-center justify-center">
        <v-col cols="auto">
          <v-btn
            href="/improneuf/frontend/#/teams"
            min-width="164"
            rel="noopener noreferrer"
            target="_blank"
            variant="text"
          >
            <v-icon icon="mdi-account-group" size="large" start />

            Teams
          </v-btn>
        </v-col>

        <v-col cols="auto">
          <v-btn
            color="primary"
            href="/improneuf/frontend/#/events"
            min-width="228"
            rel="noopener noreferrer"
            size="x-large"
            target="_blank"
            variant="flat"
          >
            <v-icon icon="mdi-view-dashboard" size="large" start />

            Add Event
          </v-btn>
        </v-col>

        <v-col cols="auto">
          <v-btn
            href="/improneuf/frontend/#/users"
            min-width="164"
            rel="noopener noreferrer"
            target="_blank"
            variant="text"
          >
            <v-icon icon="mdi-account" size="large" start />

            Users
          </v-btn>
        </v-col>
      </v-row>
    </v-responsive>
  </v-container>
</template>

<script lang="ts" setup>
//
</script>
