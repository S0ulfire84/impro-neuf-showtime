// @ts-nocheck
export class FacebookLogin {
  public static Initialize() {
    window.fbAsyncInit = function () {
      FB.init({
        appId: "{your-app-id}",
        cookie: true,
        xfbml: true,
        version: "{api-version}",
      });

      FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
      const js,
        fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {
        return;
      }
      js = d.createElement(s);
      js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    })(document, "script", "facebook-jssdk");
  }
}
