<template>
  <v-container class="fill-height">
    <v-responsive class="d-flex align-center text-center fill-height">
      <AddTeamDialog />

      <v-table>
        <thead>
          <tr>
            <!-- id, teamName, teamDescription, teamCaptainName, teamCaptainEmail, teamMemberNames, teamImage -->
            <th class="text-left">Team Name</th>
            <th class="text-left">Description</th>
            <th class="text-left">Captain Name</th>
            <th class="text-left">Captain Email</th>
            <th class="text-left">Member Names</th>
            <!-- <th class="text-left">Image</th> -->
          </tr>
        </thead>
        <tbody>
          <tr v-for="team in teams" :key="team.teamName">
            <td class="text-left">{{ team.teamName }}</td>
            <td class="text-left">{{ team.teamDescription }}</td>
            <td class="text-left">{{ team.teamCaptainName }}</td>
            <td class="text-left">{{ team.teamCaptainEmail }}</td>
            <td class="text-left">{{ team.teamMemberNames }}</td>
            <!-- <td><img :src="team.teamImage" /></td> -->
          </tr>
        </tbody>
      </v-table>
    </v-responsive>
  </v-container>
</template>

<script lang="ts" setup>
import { fetchTeams } from "@/models/backend";
import { Ref, ref } from "vue";
import AddTeamDialog from "@/components/AddTeamDialog.vue";
import { Team } from "@/models/interfaces";

const teams: Ref<Array<Team>> = ref([
  // {
  //   id: 1,
  //   teamName: "-",
  //   teamDescription: "-",
  //   teamCaptainName: "-",
  //   teamCaptainEmail: "-",
  //   teamMemberNames: "-",
  //   teamImage: "-",
  // },
  // },
  // {
  //   id: 2,
  //   teamName: "Team 2",
  //   teamDescription: "Team 2 Description",
  //   teamCaptainName: "Captain 2",
  //   teamCaptainEmail: "lalals@gaa.ga",
  //   teamMemberNames: "Member 1, Member 2, Member 3",
  //   teamImage: "https://cdn.vuetifyjs.com/images/cards/cooking.png",
  // },
  // {
  //   id: 3,
  //   teamName: "Team 3",
  //   teamDescription: "Team 3 Description",
  //   teamCaptainName: "Captain 3",
  //   teamCaptainEmail: "pepe@pepep.com",
  //   teamMemberNames: "Member 1, Member 2, Member 3",
  //   teamImage: "https://cdn.vuetifyjs.com/images/cards/cooking.png",
  // },
  // {
  //   id: 4,
  //   teamName: "Team 4",
  //   teamDescription: "Team 4 Description",
  //   teamCaptainName: "Captain 4",
  //   teamCaptainEmail: "sasa@slsls",
  //   teamMemberNames: "Member 1, Member 2, Member 3",
  //   teamImage: "https://cdn.vuetifyjs.com/images/cards/cooking.png",
  // },
  // {
  //   id: 5,
  //   teamName: "Team 5",
  //   teamDescription: "Team 5 Description",
  //   teamCaptainName: "Captain 5",
  //   teamCaptainEmail: "fdfd@fefe",
  //   teamMemberNames: "Member 1, Member 2, Member 3",
  //   teamImage: "https://cdn.vuetifyjs.com/images/cards/cooking.png",
  // },
]);

fetchTeams().then((data) => {
  teams.value = data;
});
</script>
