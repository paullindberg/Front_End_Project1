(function (window) {
    'use strict';
    var LOGIN_SELECTOR = '[acc-creation="form"]';
    var App = window.App;
    window.nonsense = 5;
    var Handler = App.Handler;
    var DataStore = App.DataStore;
    var FormHandler = App.FormHandler;
    var mainHanlder = new Handler(1, new DataStore());
    window.mainHanlder = mainHanlder;
    var formHandler = new FormHandler(LOGIN_SELECTOR);
    var loginHandler = new FormHandler('[login-input="form"]');
    

    formHandler.addSubmitHandler(mainHanlder.createAccount.bind(mainHanlder));
    loginHandler.compareLogin(mainHanlder.verifyAccountName.bind(mainHanlder));


    console.log(formHandler);
   })(window);
   