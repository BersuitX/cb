/*
 * Inbenta Chatbot SDK
 * (c) 2018 inbenta <https://www.inbenta.com/>
 */
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (factory());
}(this, (function () { 'use strict';

  /*--------------------------------------------------
  |           External libraries & functions
  |             *** DO NOT TOUCH THIS ***
  |---------------------------------------------------
  |
  | External libraries and functions used to build
  | customizations in the SDK. If you want to modify
  | anything, please scroll down to the section called
  | CORE CONFIGURATION.
  |
  */

  // Function to import JS scripts dynamically
  function importScript (sSrc, fOnload) {
    var oScript = document.createElement("script");
    oScript.type = "text\/javascript";
    if (fOnload) { oScript.onload = fOnload; }
    document.getElementsByTagName('head')[0].appendChild(oScript, document.currentScript);
    oScript.src = sSrc;
  }

  function setFederatedBotProfile(userType){
    return function setFederatedBotProfile(bot) {
      bot.subscriptions.onShowConversationWindow(function(next) {
        // Check if Federated Bot User Type is already set
        var federatedBotProfileSet = localStorage.getItem(INB_app.sdkConfig.chatbotId + '_federatedBotProfileSet');
        var sessionData = bot.actions.getSessionData();
        if (!federatedBotProfileSet || federatedBotProfileSet != sessionData.sessionToken ){
          // Set the Federated Bot User Type
          bot.api.addVariable("federatedBotProfile", userType, true);
          // Set flag
          localStorage.setItem(INB_app.sdkConfig.chatbotId + '_federatedBotProfileSet', sessionData.sessionToken);
        }
        return next();
      });
    }
  }

  /*--------------------------------------------------
  |                    CONFIGURATION
  |                        Core
  |---------------------------------------------------
  |
  | This is the CORE CONFIGURATION.
  | It will be mixed with the MAIN CONFIGURATION plus
  | a dev configuration that only should be modified
  | by a high qualified developer to avoid errors.
  |
  */

  // Check if conf file exists
  if (typeof window.INBChatbotSDK === "undefined") {
    throw new ReferenceError("Inbenta Chatbot couldn't be started, missing conf file. Please contact with support team for more information.");
  }

  // Retrieve conf data from the window
  var app = window.INBChatbotSDK;

  // Import & Build Chatbot SDK
  importScript(("https://sdk.inbenta.io/chatbot/" + (app.sdkVersion) + "/inbenta-chatbot-sdk.js"), function () {
    SDKHCAdapter.configure({
      appId: app.appConfig.hyperchat.appId,
      region: app.appConfig.hyperchat.region,
      room: function(){return app.appConfig.hyperchat.room},
      source: function(){return "3";},
      importBotHistory: app.appConfig.hyperchat.importBotHistory
    });

    app.sdkConfig.adapters = (typeof app.sdkConfig.adapters !== "undefined") ? app.sdkConfig.adapters : [];

    app.sdkConfig.adapters.push(SDKlaunchNLEsclationForm(SDKHCAdapter.checkEscalationConditions,'ChatWithLiveAgentContactForm', app.appConfig.rejectedEscalation, app.appConfig.noAgentsAvailable, app.appConfig.noResults));
    app.sdkConfig.adapters.push(SDKHCAdapter.build());
    app.sdkConfig.adapters.push(setFederatedBotProfile(app.appConfig.federatedBotProfile));

    InbentaChatbotSDK.buildWithDomainCredentials(app.sdkAuth, app.sdkConfig).then(function(bot){
  	var inbentaDiv = document.querySelector('.inbenta');
  	inbentaDiv.id = 'inbenta-chatbot-sdk';
    });
  });

})));
