import { Team, User } from "./interfaces";

// Teams

export async function fetchTeams(): Promise<Team[]> {
  const teamsResponse = await GET("../backend/teams/listTeams.php");
  return teamsResponse.json();
}

export function addTeam(team: Team) {
  return POST("../backend/teams/addTeam.php", team);
}

export function editTeam(team: Team) {
  return POST("../backend/teams/editTeam.php", team);
}

export function deleteTeam(team: Team) {
  return POST("../backend/teams/deleteTeam.php", team);
}

// Users

export function addUser(user: User) {
  return POST("../backend/users/addUser.php", user);
}

export function editUser(user: User) {
  return POST("../backend/users/editUser.php", user);
}

export function deleteUser(user: User) {
  return POST("../backend/users/deleteUser.php", user);
}

export async function fetchUsers(): Promise<User[]> {
  const usersResponse = await GET("../backend/users/listUsers.php");
  return usersResponse.json();
}

// #### Functions to send POST and GET requests to the backend

async function POST(path: string, body: any) {
  return await fetch(path, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(body),
  });
}

async function GET(path: string) {
  return await fetch(path);
}
