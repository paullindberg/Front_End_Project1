(function (window) {
    'use strict';
    var App = window.App || {};
    function Handler(id, db) {
        this.id = id;
        this.db = db;
    }

    Handler.prototype.createAccount = function(accInfo){
        console.log("Creating account: " + accInfo.username);
        this.db.addEntry(accInfo);

        sessionStorage.sessionName = accInfo.username;
        window.location.href = "dashboard.html"
    }

    Handler.prototype.verifyAccountName = function(data){
        console.log("In the verify function");
        var accountFound = false;
        var targetIndex = null;
        for (var i = 0; i < this.db.account_list.length; ++i){
            if (data.username === this.db.account_list[i].username){
                console.log("Account found");
                accountFound = true;
                targetIndex = i;
                break;
            }
        }

        if(!accountFound){
            alert("Error: User could not be found");
            return;
        }

        if (data.password === this.db.account_list[targetIndex].password){
            console.log("password verified")
            sessionStorage.sessionName = data.username;
            window.location.href = "dashboard.html"
        }
        else{
            alert("Invalid Passowrd");
            return;
        }



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