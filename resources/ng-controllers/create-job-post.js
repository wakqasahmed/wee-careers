'use strict';

var angularApp = angular.module('weeCareers', ['ui.bootstrap']);

angularApp.controller('AppCtrl', function($scope){
    $scope.themes = [
    {
        "name": "Plain Bootstrap",
        "src": ""
    },
    {
        "name": "Amelia",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/amelia/bootstrap.min.css"
    },
    {
        "name": "Cerulean",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/cerulean/bootstrap.min.css"
    },
    {
        "name": "Cosmo",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/cosmo/bootstrap.min.css"
    },
    {
        "name": "Cyborg",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/cyborg/bootstrap.min.css"
    },
    {
        "name": "Flatly",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css"
    },
    {
        "name": "Journal",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/journal/bootstrap.min.css"
    },
    {
        "name": "Lumen",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/lumen/bootstrap.min.css"
    },
    {
        "name": "Readable",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/readable/bootstrap.min.css"
    },
    {
        "name": "Simplex",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/simplex/bootstrap.min.css"
    },
    {
        "name": "Slate",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/slate/bootstrap.min.css"
    },
    {
        "name": "Spacelab",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/spacelab/bootstrap.min.css"
    },
    {
        "name": "Superhero",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css"
    },
    {
        "name": "United",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/united/bootstrap.min.css"
    },
    {
        "name": "Yeti",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/yeti/bootstrap.min.css"
    },
    {
        "name": "Darkly",
        "src": "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/darkly/bootstrap.min.css"
    }
    ];

    $scope.currentTheme = null;

    $scope.setTheme = function(name){
        $scope.currentTheme = themes[name];
    }
});

angularApp.controller('CreateCtrl', function ($scope, $http) {

    // new form
    $scope.form = {};
    $scope.form.form_id = 1;
    $scope.form.form_name = 'My Form';
    $scope.form.form_fields = [];

    // previewForm - for preview purposes, form will be copied into this
    // otherwise, actual form might get manipulated in preview mode
    $scope.previewForm = {};

    // add new field drop-down:
    $scope.addField = {};

$http.get('/wee-careers-multilingual/en/careers/get_languages').
    success(function(data, status, headers, config) {
        var kvp_arr=[];
        (function(o){
            for(var k in o)
            {
             var kvp = {};
             kvp['name'] = k;
             kvp['value'] = o[k];
             kvp_arr.push(kvp);
            }
        })(data);

        $scope.addField.types = kvp_arr;

        $scope.addField.new = $scope.addField.types[0].name;

        $scope.addField.lastAddedID = 0;

    }).
    error(function(data, status, headers, config) {
        console.log('error in loading language list');
     // log error
    });

$http.get('/wee-careers-multilingual/en/careers/get_departments').
    success(function(data, status, headers, config) {

        $scope.addField.departments = data;
    }).
    error(function(data, status, headers, config) {
        console.log('error in loading department list');
     // log error
    });

    // accordion settings
    $scope.accordion = {}
    $scope.accordion.oneAtATime = true;

    // create new field button click
    $scope.addNewField = function(){
        if(!$scope.isLangFormAdded($scope.addField.new))
        {
            // incr field_id counter
            $scope.addField.lastAddedID++;

            var newField = {
                "field_id" : $scope.addField.lastAddedID,
                "field_title" : "",
                "field_type" : $scope.addField.new,
                "field_department" : "",
                "field_status" : true,
    			"field_description" : "",
          "field_location" : "",
                "field_num_positions" : 1
            };

            // put newField into fields array
            $scope.form.form_fields.push(newField);
        }
    }

    // deletes particular field on button click
    $scope.deleteField = function (field_id){
        for(var i = 0; i < $scope.form.form_fields.length; i++){
            if($scope.form.form_fields[i].field_id == field_id){
                $scope.form.form_fields.splice(i, 1);
                break;
            }
        }
    }

// checks if form for a selected lang added already
    $scope.isLangFormAdded = function(field_type){
       for(var i = 0; i < $scope.form.form_fields.length; i++){
            if($scope.form.form_fields[i].field_type == field_type){
                return true;
            }
        }
        return false;
    }

//submit form
/*
    $scope.submit = function() {
        alert('called');
            var i = 0;
            for(var key in $scope.form.form_fields)
            {   alert(key + ': ' + $scope.form.form_fields[key]);

                if (key == 'field_type') {
                    foreach($scope.addField.types as lang)
                    {
                        if(lang.name == value)
                            form_fields[i].value = lang.value;
                    }
                    i++;
                }

            }
        }
*/
});
