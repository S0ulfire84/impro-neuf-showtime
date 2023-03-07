// @ts-nocheck

export enum LoginStatus {
  connected = "connected",
  unknown = "unknown",
}

export interface LoginStatusResponse {
  status: string;
  authResponse: {
    accessToken: string;
    expiresIn: string;
    signedRequest: string;
    userID: string;
  };
}

export class FacebookLogic {
  public static initialized: boolean = false;

  // Initialize the Facebook SDK
  public static InitializeSDK() {
    FB.init({
      appId: "900476307757109",
      cookie: true,
      xfbml: true,
      version: "v9.0",
    });
    this.initialized = true;
  }

  public static async getLoginStatus(): Promise<LoginStatusResponse> {
    if (!this.initialized) {
      this.InitializeSDK();
    }

    FB.getLoginStatus(function (response) {
      return response;
    });
  }

  public static async loginToFacebook(): Promise<LoginStatusResponse> {
    if (!this.initialized) {
      this.InitializeSDK();
    }

    const loginStatus = await this.getLoginStatus();

    if (loginStatus && loginStatus.status === LoginStatus.connected) {
      return loginStatus;
    }

    const loginPromise = new Promise<LoginStatusResponse>((resolve, reject) => {
      FB.login(function (response) {
        if (response) {
          const r: LoginStatusResponse = response;
          resolve(r);
        } else {
          reject(response);
        }
      });
    });

    return await loginPromise;
  }

  public static getPageAccessToken() {
    FB.api("/me/accounts", function (response) {
      console.log(response);
    });
  }
}
