import { Team } from "./interfaces";

export async function fetchTeams(): Promise<Team[]> {
  const teamsResponse = await fetch("../backend/listTeams.php");
  const teams = await teamsResponse.json();
  return teams;
}

export function addTeam(team: Team) {
  return fetch("../backend/addTeam.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(team),
    // body: `teamName=${team.teamName}&teamDescription=${team.teamDescription}&teamCaptainName=${team.teamCaptainName}&teamCaptainEmail=${team.teamCaptainEmail}&teamMemberNames=${team.teamMemberNames}&teamImage=${team.teamImage}`,
  });
}
