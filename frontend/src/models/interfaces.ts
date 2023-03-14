export interface Team {
  id: number;
  teamName: string;
  teamDescription: string;
  teamCaptainName: string;
  teamCaptainEmail: string;
  teamMemberNames: string;
  teamImage: string;
}

export interface User {
  id: number;
  name: string;
  email: string;
  password: string;
  role: string;
}
