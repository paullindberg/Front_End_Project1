(function (window) {
    'use strict';
    var App = window.App || {};
    var $ = window.jQuery; //import jQuery

    function FormHandler(selector) {
        if (!selector){
            throw new Error('No selector provided');
        }
    console.log("Formhandler Initialized");
    this.$formElement = $(selector)//Selector is some random ass string we're passing. $ is the
    //jQuery function. $formElement is just our local var. 
    if (this.$formElement.length === 0) {//Just test to see if JQuery actually found anything.
        throw new Error('Could not find element with selector: ' + selector);
        }

    }

    FormHandler.prototype.compareLogin = function(fn){
        this.$formElement.submit('submit', function(event){
            event.preventDefault();
            var data = $(this).serializeArray();

            console.log(data);
            var returnData = {
                username: data[0].value,
                password: data[1].value,
            };
            console.log(returnData);
            fn(returnData);
        });



    }

    FormHandler.prototype.addSubmitHandler = function(fn){
        console.log("Establishing Submit Handler")
        this.$formElement.submit('submit', function(event){ //On is the jQuery submit function. But why
            //does the selector matter (formElement) and what is event?
            event.preventDefault();//Event is the callback function to run when this happens.
            //Prevent default ensures that the page doesn't change.
            console.log("Callback for submit event");
            console.log($(this))
            var data = $(this).serializeArray(); //This is a jQuery function. Data needs to wrapped by
            //Jquery first, explaining $(this)

            //serializeArray returns form data as an array of objects.
            console.log(data);
            var returnData = {
                username: data[0].value,
                password: data[1].value,
                name: data[2].value,
                email: data[3].value
            };
            console.log(returnData);
            fn(returnData);
        });


    }
    App.FormHandler = FormHandler;
    window.App = App;
   })(window);