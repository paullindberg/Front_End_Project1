(function (window) {
    'use strict';
    var App = window.App || {};
    function Handler(id, db) {
        this.id = id;
        this.db = db;
    }

    Handler.prototype.createAccount = function(accInfo){
        var accountAvail = null;
        $.ajax({ url: 'ajax.php',
        async: false,
        data: {functioncall: 'createUser', username: accInfo.username,
        password: accInfo.password, name: accInfo.name, email: accInfo.email},
         type: 'post',
         success: function(output) {
                      console.log("Create account: " + output);
                      accountAvail = output;
         }
});

        if (accountAvail == "1"){
            console.log("Creating account: " + accInfo.username);
            this.db.addEntry(accInfo);
            sessionStorage.sessionName = accInfo.username;
            window.location.href = "dashboard.php";
        }
        else if (accountAvail == "0"){
            alert("Username is unavailable");
        }
        else{
            alert("Error: No result obtained from AJAX");
        }
        


    }

    

    Handler.prototype.verifyAccountName = function(data){
        console.log("In the verify function");
        var accountFound;

        $.ajax({ url: 'ajax.php',
        async: false,
        data: {functioncall: 'login', username: data.username,
        password: data.password},
         type: 'post',
         success: function(output) {
                      console.log("Login result: " + output);
                      accountFound = output;
         }
});

        console.log(accountFound);
        if (accountFound == 1){
            console.log("password verified")
            sessionStorage.sessionName = data.username;
            window.location.href = "dashboard.php"
        }
        else if (accountFound == 0){
            alert("Invalid Password");
            return;
        }
        else if(accountFound == -1){
            alert("Error: User could not be found");
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