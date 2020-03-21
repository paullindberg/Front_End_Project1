(function (window) {
    'use strict';
    var App = window.App || {};
    function Handler(id, db) {
        this.id = id;
        this.db = db;
    }

    Handler.prototype.createAccount = function(accInfo){
        console.log("Creating account: " + accInfo.userName);
        this.db.add(accInfo.userName, accInfo);
    }

    Handler.prototype.removeAccount = function(accInfo){
        console.log('Removing account: ' + accInfo);
        this.db.remove(accInfo);
    }

    Handler.prototype.displayAccounts = function(){
        var accountArray = Object.keys(this.db.getAll());

        console.log("Handler: " + this.id + ' sees accounts:');
        accountArray.forEach(function (id){
        console.log(this.db.get(id));
        }.bind(this));
    };

    App.Handler = Handler;
    window.App = App;
   })(window);