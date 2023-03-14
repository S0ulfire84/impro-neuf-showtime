<template>
  <v-dialog v-model="showDialog" width="auto">
    <v-card v-if="!isDelete">
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
        <v-spacer></v-spacer>
        <v-btn color="primary" @click="onClickSave">Save</v-btn>
        <v-btn color="secondary" @click="onClickCancel">Cancel</v-btn>
      </v-card-actions>
    </v-card>
    <v-card v-else>
      <v-card-title>
        <span class="headline">Delete Team</span>
      </v-card-title>
      <v-card-text>
        Are you sure you want to delete the team {{ props.team.teamName }}?
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="primary" @click="onClickDelete">Delete</v-btn>
        <v-btn color="secondary" @click="onClickCancel">Cancel</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script lang="ts" setup>
import { ref, watch } from "vue";
import { addTeam, deleteTeam, editTeam } from "@/models/backend";
import { Team } from "@/models/interfaces";

const props = defineProps<{
  action: string;
  team: Team;
}>();

const emit = defineEmits<{
  (event: "finished", ...args: any[]): void;
}>();

// This component works by watching the props.action value, which is set by the parent component.
// When the action is set to "add", "edit", or "delete", the component will show the appropriate dialog.
// When the action is set to "none", the component will hide the dialog.
watch(
  () => props.action,
  (newAction) => {
    console.log("New action: " + newAction);
    if (props.action === "add") {
      console.log("Adding team");

      teamName.value = "";
      teamDescription.value = "";
      teamCaptainName.value = "";
      teamCaptainEmail.value = "";
      teamMemberNames.value = "";
      teamImage.value = "";

      showDialog.value = true;
    } else if (props.action === "edit") {
      console.log("Editing team");

      teamName.value = props.team.teamName;
      teamDescription.value = props.team.teamDescription;
      teamCaptainName.value = props.team.teamCaptainName;
      teamCaptainEmail.value = props.team.teamCaptainEmail;
      teamMemberNames.value = props.team.teamMemberNames;
      teamImage.value = props.team.teamImage;

      showDialog.value = true;
    } else if (props.action === "delete") {
      console.log("Deleting team");
      isDelete.value = true;
      showDialog.value = true;
    } else if (props.action === "none") {
      console.log("No action");
      showDialog.value = false;
    } else {
      console.error("Unknown action: " + props.action);
    }
  }
);

const showDialog = ref(false);
const isDelete = ref(false);
const teamName = ref("");
const teamDescription = ref("");
const teamCaptainName = ref("");
const teamCaptainEmail = ref("");
const teamMemberNames = ref("");
const teamImage = ref("");

async function onClickSave() {
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

  if (props.action === "edit") {
    team.id = props.team.id;
    await editTeam(team);
  } else if (props.action === "add") {
    await addTeam(team);
  }
  finish();
}

function onClickCancel() {
  console.log("Canceling team");
  finish();
}

async function onClickDelete() {
  console.log("Deleting team");
  await deleteTeam(props.team);
  finish();
}

function finish() {
  showDialog.value = false;

  setTimeout(() => {
    isDelete.value = false;
  }, 500);
  emit("finished");
}
</script>
