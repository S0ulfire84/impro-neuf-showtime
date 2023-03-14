<template>
  <v-dialog v-model="showDialog" width="auto">
    <v-card v-if="!isDelete">
      <v-card-title>
        <span class="headline">Add User</span>
      </v-card-title>
      <v-card-text>
        Fill in the details of the new user:

        <v-form>
          <v-text-field v-model="email" label="E-Mail" required></v-text-field>
          <v-text-field v-model="name" label="Name" required></v-text-field>
          <v-text-field
            v-model="password"
            label="Password"
            required
            password
          ></v-text-field>
          <v-text-field
            v-model="repeatPassword"
            label="Repeat Password"
            password
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
        <span class="headline">Delete User</span>
      </v-card-title>
      <v-card-text>
        Are you sure you want to delete the user {{ props.user.email }}?
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
import { addUser, deleteUser } from "@/models/backend";
import { User } from "@/models/interfaces";

const props = defineProps<{
  action: string;
  user: User;
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
      console.log("Adding user");

      email.value = "";
      name.value = "";
      password.value = "";
      repeatPassword.value = "";

      showDialog.value = true;
    } else if (props.action === "delete") {
      console.log("Deleting user");
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
const name = ref("");
const email = ref("");
const password = ref("");
const repeatPassword = ref("");

async function onClickSave() {
  if (password.value !== repeatPassword.value) {
    alert("Passwords do not match");
    return;
  }
  console.log("Saving user");

  const user: any = {
    email: email.value,
    name: name.value,
    password: password.value,
  };

  if (props.action === "add") {
    await addUser(user);
  }
  finish();
}

function onClickCancel() {
  console.log("Canceling user");
  finish();
}

async function onClickDelete() {
  console.log("Deleting user");
  await deleteUser(props.user);
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
