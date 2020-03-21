(function (window) {
    'use strict';
    var LOGIN_SELECTOR = '[login-input="form"]';
    var App = window.App;
    var Handler = App.Handler;
    var DataStore = App.DataStore;
    var FormHandler = App.FormHandler;
    var mainHanlder = new Handler(1, new DataStore());
    window.mainHanlder = mainHanlder;
    var formHandler = new FormHandler(LOGIN_SELECTOR);
    formHandler.addSubmitHandler(mainHanlder.createAccount.bind(mainHanlder));

    console.log(formHandler);
   })(window);
   