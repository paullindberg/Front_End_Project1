(function (window) {
    'use strict';
    var App = window.App || {};
    function Handler(id, db) {
        this.id = id;
        this.db = db;
    }

    Handler.prototype.createAccount = function(accInfo){
        console.log(accInfo.username, accInfo.password, accInfo.name, accInfo.email);


        asyncCreate(accInfo.username, accInfo.password, accInfo.name, accInfo.email)
        .then(data => {
          verify(data, accInfo)
        })
        .catch(error => {
          console.log(error)
        })

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



   function asyncCreate(user, pass, name, email) {
    return new Promise((resolve, reject) => {
      $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: {
            functioncall: 'createUser', username: user, password: pass, name: name, email: email
        },
        success: function(data) {
          resolve(data)
        },
        error: function(error) {
          reject(error)
        },
      })
    })
  }


  function verify(data, accInfo){
    console.log("Verifying...")
    if (data == "1"){
        console.log("Creating account: " + accInfo.username );
        sessionStorage.sessionName = accInfo.username;
        window.location.href = "dashboard.php";
    }
    else if (data == "0"){
        alert("Username is unavailable");
    }
    else{
        alert("Error: No result obtained from AJAX");
    }
  }