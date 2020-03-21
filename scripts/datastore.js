(function (window) {
    'use strict';
    var App = window.App || {};
    function DataStore() {
    console.log('running the DataStore function');
    this.data = {};
    }

    DataStore.prototype.add = function (key, val) { //when you give something the pytotype tag, all instances
        //created by the constructor have acces to this function. This referers to that instance
        this.data[key] = val;
        };

    DataStore.prototype.get = function (key) {
        return this.data[key];
        };
    DataStore.prototype.getAll = function () {
        return this.data;
        };

    DataStore.prototype.remove = function (key) {
        delete this.data[key];
        };


    App.DataStore = DataStore;
    window.App = App;
   })(window);