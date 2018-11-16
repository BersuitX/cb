/*--------------------------------------------------
|                    CONFIGURATION
|                        Main
|---------------------------------------------------
|
| This is the MAIN CONFIGURATION.
| It's based on Inbenta Official Documentation.
|
*/

// Inbenta routes - Relative path where the CSS and JS core is hosted.
var INB_paths = {
  CSS:  "assets/css/inbenta-core.css",
  JS:   "assets/js/inbenta-core.js"
}

// Inbenta SDK configuration - Check inbenta API Docs <https://apidocs.inbenta.io/> for more information.
var INB_app = {
  sdkVersion: "1.13",
  sdkAuth: {
    inbentaKey: "Dx5N+ea0c0eI53ltZ5EDGZaAnQfVr1vkrnhRsEwg9xI=",
    domainKey:  "eyJ0eXBlIjoiSldUIiwiYWxnIjoiUlMyNTYifQ.eyJwcm9qZWN0IjoiY2xhcm9fY29fY2hhdGJvdF9lcyIsImRvbWFpbl9rZXlfaWQiOiJCWEgwN3pLRDhfMjYxZWpiT3BNa1p3OjoifQ.ru6FwdVLAcbww2PPEiHD9aFsv9s5padP7Z2aWNhPwY4Wkfezi3mmprd4DGWWrw-c4lc5JaDFbEBxsYgN_DtNgw"
  },
  sdkConfig: {
    chatbotId: "claro_co_chatbot_av_movil_es",          // UI identifier
    environment: "development",                         // Environments => development / preproduction / production
    lang: "es",
    userType: 3,                                        // Profile "AV Movil" in instance claro_co_chatbot_es
    closeButton: {
      visible: true
    },
    avatar:{
	    name:'Asistente'
    },
    labels: {
      es: {
        "interface-title" : "Asistente"
      }
    }
  },
  appConfig: {
    hyperchat: {
      appId: "GXn2OyF6U", // instance claro_co_chat_migration
      region: "us",
      room: "1", // Queue "Mi Claro Hogar" in instance claro_co_chat_migration
      importBotHistory: true
    },
    rejectedEscalation: {
      action: 'displayChatbotMessage',
      value: 'De acuerdo, sigo aquí esperando sus preguntas.'
    },
    noAgentsAvailable: {
      action: 'intentMatch',
      value: 'NoAgentsAvailable'
    },
    noResults: 2, // number of times the chatbot will display a no-results message before escalating
    federatedBotProfile: "5" // Profile "MiClaro AV" in instance claro_co_faq_es
  }
}

/*--------------------------------------------------
|
|                   Starting BOT
|
|---------------------------------------------------
|
| DO NOT TOUCH THIS!
| This will load & trigger the JS & CSS core
|
*/

// Attach data to the window in order to get it from the CORE JS
window.INBChatbotSDK = INB_app;

// Add core CSS
var INB_CSS_SDK = document.createElement("link");
INB_CSS_SDK.type = "text/css";
INB_CSS_SDK.rel = "stylesheet";
INB_CSS_SDK.href = INB_paths.CSS;
document.head.appendChild(INB_CSS_SDK);

// Add core JS
var INB_JS_SDK = document.createElement("script");
INB_JS_SDK.src = INB_paths.JS;
document.head.appendChild(INB_JS_SDK);
