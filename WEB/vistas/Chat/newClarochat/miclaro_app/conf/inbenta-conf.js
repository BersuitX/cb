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
  sdkConfig: {
    chatbotId: "claro_co_chatbot_miclaro_app_es",       // UI identifier
    environment: "development",                         // Environments => development / preproduction / production
    lang: "es",
    closeButton: {
      visible: true
    },
    labels: {
      es: {
        "interface-title" : ""
      }
    },
    avatar:{
	    name:'Asistente'
    },
  },
  appConfig: {
    hyperchat: {
      appId: "GXn2OyF6U", // instance claro_co_chat_migration
      region: "us",
      room: "1", // Queue "Mi Claro Hogar" in instance claro_co_chat_migration
      importBotHistory: true
    },
    rejectedEscalation: '¿En qué más puedo ayudarte?',
    noAgentsAvailable: 'No hay agentes disponibles en este momento.',
    questions: [
      {
        label: 'FIRST_NAME',
        text: 'Dime tu nombre',
        validationErrorMessage: 'Introduce tu nombre',
        validate: function(value) {
          if (value !== '') {
            return true;
          }
          return false;
        }
      },
      {
        label: 'EMAIL_ADDRESS',
        text: 'Dime tu dirección de correo',
        validationErrorMessage: 'Introduce una dirección de correo válida',
        validate: function(value) {
          return /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/.test(value);
        }
      },
    ]
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
