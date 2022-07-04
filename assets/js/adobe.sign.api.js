var AdobeAPI = {
  baseURL: "https://api.na4.adobesign.com/",
  authToken: "",
  transientDocumentId:
    "3AAABLblqZhDO7rvG-AQCqjbv-ryw42xXklj3nbG_E8mOC2LWzdKevTyTWCR7Is9uWc5bNBcwYowZXCjX3GKQsaGfmdQpu1CFFYJmXk3ldyDNBgMa0YDp3cfNw9A2cmggb92eymF0SRF64t27fNS3ceIiGgLMam3gNPWva4bEvBSDdQcqB5mfzex6U09_XlV27pztE8a3PAIYrBUcyd8NwowZyx6L_zDoHhl-OsOSQCcKXmgdnzgKOefXaQx70By5fAquKViZJ5mTY-D1iPvkhbOAb8OBrFjKR9bwhTGLuLX4d2WjQ-h0tpGVZ0xc_bo6IT852xEnY0KbT_32saQWUhKCBO9gSLMQ",
  // supportEmail: "support@greenwavematerials.com",
  libraryDocumentId: "CBJCHBCAABAAy2iLwGMtDKK_eYSQxeiJZ4rBQDpd9TRI",
  supportEmail: "esign@greenwavematerials.com",
  clientID: "CBJCHBCAABAA3chlrDYNO1-k1jeJ0UMNahwYTeWy1Ijp",
  clientSecret: "DtUDuJGj7kqUjQInOj-Qywei4NzBCyx9",
  refreshToken:
    "3AAABLblqZhBHJYwaEFD6qhvqFaAO08vMmE0CurHAsO2FczeMMbg-QJbqcaHlu5gj5aXtccNxwIE*",
  widgetId: "",
  supportId: "",
  signerId: "",
  iframeURL: "",
  fields: [],
  url(endpoint) {
    return this.baseURL + "api/rest/v6/" + endpoint;
  },
  accessTokenUrl() {
    return this.baseURL + "oauth/v2/refresh";
  },
  getHeaders() {
    return {
      Authorization: `Bearer ${this.authToken}`,
      "Content-Type": "application/json",
    };
  },
  getQueryParams(data) {
    let query = "";
    let temp = [];
    for (const key in data) {
      if (Object.hasOwnProperty.call(data, key)) {
        const value = data[key];
        // if (value) {
        temp.push(`${key}=${value}`);
        // }
      }
    }
    if (temp.length > 0) {
      query = `?${temp.join("&")}`;
    }
    return query;
  },
  getAccessToken() {
    $.ajax({
      url: this.accessTokenUrl(),
      type: "POST",
      dataType: "JSON",
      async: false,
      data: {
        grant_type: "refresh_token",
        client_id: this.clientID,
        client_secret: this.clientSecret,
        refresh_token: this.refreshToken,
      },
      success: (res) => {
        if (res) {
          console.log(res);
          this.authToken = res.access_token;
        }
      },
    });
  },
  createWebForm(name) {
    $.ajax({
      url: this.url("widgets"),
      type: "POST",
      dataType: "JSON",
      async: false,
      headers: this.getHeaders(),
      data: JSON.stringify({
        fileInfos: [
          {
            libraryDocumentId: this.libraryDocumentId,
          },
        ],
        name,
        widgetParticipantSetInfo: {
          memberInfos: [
            {
              email: "",
            },
          ],
          role: "SIGNER",
        },
        additionalParticipantSetsInfo: [
          {
            memberInfos: [
              {
                email: this.supportEmail,
                securityOption: {
                  authenticationMethod: "NONE",
                },
              },
            ],
            role: "SIGNER",
            order: 1,
          },
        ],
        state: "ACTIVE",
      }),
      success: (res) => {
        if (res) {
          console.log(res);
          this.widgetId = res.id;
        }
      },
    });
  },
  updateWebForm(name) {
    $.ajax({
      url: this.url(`widgets/${this.widgetId}`),
      type: "PUT",
      dataType: "JSON",
      async: false,
      headers: this.getHeaders(),
      data: JSON.stringify({
        fileInfos: [
          {
            transientDocumentId: this.transientDocumentId,
          },
        ],
        name,
        widgetParticipantSetInfo: {
          memberInfos: [
            {
              email: "",
            },
          ],
          role: "SIGNER",
        },
        additionalParticipantSetsInfo: [
          {
            memberInfos: [
              {
                email: this.supportEmail,
                securityOption: {
                  authenticationMethod: "NONE",
                },
              },
            ],
            role: "SIGNER",
            order: 1,
          },
        ],
        status: "AUTHORING",
        state: "AUTHORING",
      }),
      success: (res) => {
        if (res) {
          console.log(res);
          this.widgetId = res.id;
        }
      },
    });
  },
  setFormState(state) {
    $.ajax({
      url: this.url(`widgets/${this.widgetId}/state`),
      type: "PUT",
      dataType: "JSON",
      async: false,
      headers: this.getHeaders(),
      data: JSON.stringify({
        state,
      }),
      error: () => {
        console.log();
      },
    });
  },
  setFormFields() {
    $.ajax({
      url: this.url(`widgets/${this.widgetId}/formFields`),
      type: "PUT",
      dataType: "JSON",
      async: false,
      headers: this.getHeaders(),
      data: JSON.stringify({
        fields: this.fields,
      }),
      success: (res) => {
        if (res) {
          console.log(res);
        }
      },
      error: (jqXHR) => {
        console.log(jqXHR.status, "Set Form Fields Error.");
        if (jqXHR.status == 400 || jqXHR.status == 404) {
          this.setFormFields();
        }
      },
    });
  },
  getFormFields(id) {
    $.ajax({
      url: this.url(`widgets/${this.widgetId}/formFields`),
      type: "GET",
      dataType: "JSON",
      async: false,
      headers: this.getHeaders(),
      success: (res) => {
        if (res) {
          this.fields = res.fields;
        }
      },
      error: (jqXHR) => {
        console.log(jqXHR.status, "GET Form Fields Error.");
        if (jqXHR.status == 400 || jqXHR.status == 404) {
          this.getFormFields(id);
        }
      },
    });
  },
  getMembers() {
    $.ajax({
      url: this.url(`widgets/${this.widgetId}/members`),
      type: "GET",
      dataType: "JSON",
      async: false,
      headers: this.getHeaders(),
      success: (res) => {
        if (res) {
          console.log(res);
          this.supportId = res.additionalParticipantSets[0].id;
          this.signerId = res.widgetParticipantSet.id;
        }
      },
    });
  },
  getWidgetLists() {
    $.ajax({
      url: this.url("widgets"),
      type: "GET",
      dataType: "JSON",
      async: false,
      headers: this.getHeaders(),
      success: (res) => {
        if (res) {
          let userWidgetList = res.userWidgetList;

          let widget = userWidgetList.filter((li) => li.id == this.widgetId);
          if (widget.length > 0) {
            this.iframeURL = widget[0].url;
            console.log(this.iframeURL);
          }
        }
      },
    });
  },
  getUrl() {
    $.ajax({
      url: this.url(`widgets/${this.widgetId}/views`),
      type: "POST",
      dataType: "JSON",
      async: false,
      headers: this.getHeaders(),
      data: JSON.stringify({
        name: "SIGNING",
      }),
      success: (res) => {
        if (res) {
          console.log(res);
          this.iframeURL = res.widgetViewList[0].url;
        }
      },
      error: (jqXHR) => {
        if (jqXHR.status == 400 || jqXHR.status == 404) {
          this.getUrl();
        }
      },
    });
  },
  getWidgetByID() {
    $.ajax({
      url: this.url(`widgets/${this.widgetId}`),
      type: "GET",
      dataType: "JSON",
      async: false,
      headers: this.getHeaders(),
      success: (res) => {
        if (res) {
          console.log(res);
        }
      },
    });
  },
  createWebhook(data) {
    let hookId = "";
    $.ajax({
      url: this.url(`webhooks`),
      type: "POST",
      dataType: "JSON",
      async: false,
      headers: this.getHeaders(),
      data: JSON.stringify({
        name: "Agreements State Listener",
        scope: "USER",
        state: "ACTIVE",
        webhookSubscriptionEvents: ["AGREEMENT_ACTION_REQUESTED"],
        webhookUrlInfo: {
          url: `https://greenwavematerials.com/utils/webhook.php${this.getQueryParams(
            data
          )}`,
        },
      }),
      success: (res) => {
        hookId = res.id;
      },
      error: () => {
        console.log("error");
      },
    });
    return hookId;
  },
};
