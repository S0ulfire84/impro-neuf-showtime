<template>
  <v-btn
    min-width="164"
    rel="noopener noreferrer"
    target="_blank"
    variant="text"
  >
    <v-icon icon="mdi-account-group" size="large" start />

    Add Team...
    <v-dialog v-model="showNewTeamdialog" activator="parent" width="auto">
      <v-card>
        <v-card-title>
          <span class="headline">Add Team</span>
        </v-card-title>
        <v-card-text>
          Fill in the details of the new team:

          <v-form>
            <v-text-field
              v-model="teamName"
              label="Team Name"
              required
            ></v-text-field>
            <v-text-field
              v-model="teamDescription"
              label="Team Description"
              required
            ></v-text-field>
            <v-text-field
              v-model="teamCaptainName"
              label="Team Captain Name"
              required
            ></v-text-field>
            <v-text-field
              v-model="teamCaptainEmail"
              label="Team Captain Email"
              required
            ></v-text-field>
            <v-text-field
              v-model="teamMemberNames"
              label="Team Member Names"
              required
            ></v-text-field>
            <v-text-field
              v-model="teamImage"
              label="Team Image"
              required
            ></v-text-field>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-btn color="primary" block @click="onClickSave">Save</v-btn>
          <v-btn color="secondary" block @click="onClickCancel">Cancel</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-btn>
</template>

<script lang="ts" setup>
import { ref } from "vue";
import { addTeam } from "@/models/backend";
import { Team } from "@/models/interfaces";
const showNewTeamdialog = ref(false);
const teamName = ref("");
const teamDescription = ref("");
const teamCaptainName = ref("");
const teamCaptainEmail = ref("");
const teamMemberNames = ref("");
const teamImage = ref("");

function onClickSave() {
  console.log("Saving team");
  console.log(teamName.value);
  console.log(teamDescription.value);
  console.log(teamCaptainName.value);
  console.log(teamCaptainEmail.value);
  console.log(teamMemberNames.value);
  console.log(teamImage.value);

  const team: any = {
    teamName: teamName.value,
    teamDescription: teamDescription.value,
    teamCaptainName: teamCaptainName.value,
    teamCaptainEmail: teamCaptainEmail.value,
    teamMemberNames: teamMemberNames.value,
    teamImage: teamImage.value,
  };

  addTeam(team);
  showNewTeamdialog.value = false;
}

function onClickCancel() {
  console.log("Canceling team");
  showNewTeamdialog.value = false;
}
</script>
