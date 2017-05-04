$(document).ready(function(){
    $("#orga-new").validate({
        ignore: 'input:hidden:not(input:hidden.required)',
        rules: {
            "handissimobundle_organizations[name]":{
                required: true,
                minlength: 2,
                maxlength: 200
            },
            "handissimobundle_organizations[structureLogoFile][file]":{
                filesize: 2097152
            },
            "handissimobundle_organizations[society]":{
                maxlength: 200
            },
            "handissimobundle_organizations[societyLogoFile][file]":{
                filesize: 2097152
            },
            "handissimobundle_organizations[address]":{
                maxlength: 200
            },
            "handissimobundle_organizations[addressComplement]":{
                maxlength: 200
            },
            "handissimobundle_organizations[postal]":{
                maxlength:5,
                number: true
            },
            "handissimobundle_organizations[city]":{
                maxlength: 200
            },
            "handissimobundle_organizations[phone_number]":{
                regex: /^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/
            },
            "handissimobundle_organizations[mail]":{
                email: true
            },
            "handissimobundle_organizations[directorName]": {
                maxlength: 200
            },
            "handissimobundle_organizations[website]": {
                "urlregex": /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/
            },
            "handissimobundle_organizations[facebook]": {
                "urlregex": /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/
            },
            "handissimobundle_organizations[brochureFile][file]":{
                filesize: 2097152
            },
            "handissimobundle_organizations[agemini]":{
                maxlength: 2,
                number: true
            },
            "handissimobundle_organizations[agemaxi]":{
                maxlength: 3,
                number: true
            },
            "handissimobundle_organizations[freeplace]":{
                maxlength: 4,
                number: true
            },
            "handissimobundle_organizations[interventionZone]":{
                maxlength: 200
            },
            "handissimobundle_organizations[organizationDescription]":{
                maxlength: 5000
            },
            "handissimobundle_organizations[needs][]":{
                maxlength: 5
            },
            "handissimobundle_organizations[workingDescription]":{
                maxlength: 5000
            },
            "handissimobundle_organizations[schoolDescription]":{
                maxlength: 3000
            },
            "handissimobundle_organizations[dayDescription]":{
                maxlength: 5000
            },
            "handissimobundle_organizations[receptionDescription]":{
                maxlength: 5000
            },
            "handissimobundle_organizations[teamMembersNumber]":{
                maxlength:5,
                number: true
            },
            "handissimobundle_organizations[commentStaff]":{
                maxlength: 1000
            },
            "handissimobundle_organizations[openhours]":{
                maxlength: 200
            },
            "handissimobundle_organizations[inscription]":{
                maxlength: 2000
            },
            "handissimobundle_organizations[cost]":{
                maxlength: 2000
            },
            "handissimobundle_organizations[transport]":{
                maxlength: 2000
            },
            "handissimobundle_organizations[freeDescription]":{
                maxlength: 2000
            }
        },
        message: {
            "handissimobundle_organizations[needs][]":{
                maxlength: jQuery.validator.format("Vous devez sélectionner au maximum {0} choix")
            }
        },
        submitHandler: function (form) {
            form.submit();
        },
        /*invalidHandler: function (event, validator) {
            var errors = validator.numberOfInvalids();
            //alert(errors);
            if (errors) {
                var message = errors == 1
                    ?"Vous avez 1 erreur, elle a été mis en évidence"
                    :"Vous avez manqué" + errors + ", ils ont été mis en évidence";
                $(".errors-message div.error span").html(message);
                $(".errors-message div.error").show();
                this.defaultShowErrors();
            } else {
                $(".errors-message div.error").hide();
            }

        }*/
        showErrors: function(errorMap, errorList) {
            if (this.numberOfInvalids() > 1){
                $(".errors-message").html("Vous avez  "
                    + this.numberOfInvalids()
                    + " erreurs, elles ont été mis en évidence.");
                this.defaultShowErrors();
            }else if (this.numberOfInvalids() == 1){
                $(".errors-message").html("Vous avez  "
                    + this.numberOfInvalids()
                    + " erreur, elle a été mis en évidence.");
                this.defaultShowErrors();
            }else{
                $(".errors-message").hide();
                this.defaultShowErrors();
            }

        }

    });
    $("#orga-edit").validate({
        ignore: 'input:hidden:not(input:hidden.required)',
        rules: {
            "handissimobundle_organizations[name]":{
                required: true,
                minlength: 2,
                maxlength: 200
            },
            "handissimobundle_organizations[structureLogoFile][file]":{
                filesize: 2097152
            },
            "handissimobundle_organizations[society]":{
                maxlength: 200
            },
            "handissimobundle_organizations[societyLogoFile][file]":{
                filesize: 2097152
            },
            "handissimobundle_organizations[address]":{
                maxlength: 200
            },
            "handissimobundle_organizations[addressComplement]":{
                maxlength: 200
            },
            "handissimobundle_organizations[postal]":{
                maxlength:5,
                number: true
            },
            "handissimobundle_organizations[city]":{
                maxlength: 200
            },
            "handissimobundle_organizations[phone_number]":{
                regex: /^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/
            },
            "handissimobundle_organizations[mail]":{
                email: true
            },
            "handissimobundle_organizations[directorName]": {
                maxlength: 200
            },
            "handissimobundle_organizations[website]": {
                "urlregex": /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/
            },
            "handissimobundle_organizations[facebook]": {
                "urlregex": /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/
            },
            "handissimobundle_organizations[brochureFile][file]":{
                filesize: 2097152
            },
            "handissimobundle_organizations[agemini]":{
                maxlength: 2,
                number: true
            },
            "handissimobundle_organizations[agemaxi]":{
                maxlength: 3,
                number: true
            },
            "handissimobundle_organizations[freeplace]":{
                maxlength: 4,
                number: true
            },
            "handissimobundle_organizations[interventionZone]":{
                maxlength: 200
            },
            "handissimobundle_organizations[organizationDescription]":{
                maxlength: 5000
            },
            "handissimobundle_organizations[needs][]":{
                maxlength: 5
            },
            "handissimobundle_organizations[workingDescription]":{
                maxlength: 5000
            },
            "handissimobundle_organizations[schoolDescription]":{
                maxlength: 3000
            },
            "handissimobundle_organizations[dayDescription]":{
                maxlength: 5000
            },
            "handissimobundle_organizations[receptionDescription]":{
                maxlength: 5000
            },
            "handissimobundle_organizations[teamMembersNumber]":{
                maxlength:5,
                number: true
            },
            "handissimobundle_organizations[commentStaff]":{
                maxlength: 1000
            },
            "handissimobundle_organizations[openhours]":{
                maxlength: 200
            },
            "handissimobundle_organizations[inscription]":{
                maxlength: 2000
            },
            "handissimobundle_organizations[cost]":{
                maxlength: 2000
            },
            "handissimobundle_organizations[transport]":{
                maxlength: 2000
            },
            "handissimobundle_organizations[freeDescription]":{
                maxlength: 2000
            }
        },
        message: {
            "handissimobundle_organizations[needs][]":{
                maxlength: jQuery.validator.format("Vous devez sélectionner au maximum {0} choix")
            }
        },
        submitHandler: function (form) {
            form.submit();
        },
        showErrors: function(errorMap, errorList) {
            if (this.numberOfInvalids() > 1){
                $(".errors-message").html("Vous avez  "
                    + this.numberOfInvalids()
                    + " erreurs, elles ont été mis en évidence.");
                this.defaultShowErrors();
            }else {
                $(".errors-message").html("Vous avez  "
                    + this.numberOfInvalids()
                    + " erreur, elle a été mis en évidence.");
                this.defaultShowErrors();
            }

        }
    });

    $('#form_contact').validate({
        ignore: ".ignore",
        rules: {
            "handissimo_opinion[lastName]": {
                required: true,
                minlength: 2,
                maxlength: 50
            },
            "handissimo_opinion[firstName]": {
                required: true,
                minlength: 2,
                maxlength: 50
            },
            "handissimo_opinion[eMail]": {
                required: true,
                email: true
            },
            "handissimo_opinion[message]": {
                required: true,
                maxlength: 2000
            },
            "hiddenRecaptcha": {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    });

    $('#form-register').validate({
        rules: {
            "front_user_registration_form[plainPassword][first]": {
                required: true
            },
            "front_user_registration_form[plainPassword][second]": {
                equalTo: "front_user_registration_form[plainPassword][first]"
            }
        }
    });

    $('#form-solution').validate({
        ignore: ".ignore",
        rules: {
            "handissimo_solution[lastname]": {
                required: true
            },
            "handissimo_solution[firstname]": {
                required: true
            },
            "handissimo_solution[mail]": {
                required: true,
                email: true
            },
            "handissimo_solution[status]": {
                required: true
            },
            "handissimo_solution[solutionName]": {
                required: true
            },
            "handissimo_solution[societyName]": {
                required: false
            },
            "hiddenRecaptchaTwo": {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    })
});

jQuery.extend(jQuery.validator.messages, {
    required: "Veuillez compléter ce champ",
    maxlength: jQuery.validator.format("La longueur du texte ne peut dépasser {0} caractères"),
    minlength: jQuery.validator.format("La longueur du texte doit être supérieur à {0} caractères"),
    number: "Le code postal doit être un nombre",
    email: "Le mail n'est pas valide",
    url: "L'adresse du site n'est pas valide",
    equalTo: "Entrez à nouveau la même valeur s'il vous plait"

});

$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        if (regexp.constructor != RegExp)
            regexp = new RegExp(regexp);
        else if (regexp.global)
            regexp.lastIndex = 0;
        return this.optional(element) || regexp.test(value);
    }, "Le numéro de téléphone n'est pas valide"
);

$.validator.addMethod(
    "filesize",
    function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, "La taille du fichier doit être inférieure à 2M"
);

$.validator.addMethod(
    "urlregex",
    function (value, element, regexp) {
        if (regexp.constructor != RegExp)
            regexp = new RegExp(regexp);
        else if (regexp.global)
            regexp.lastIndex = 0;
        return this.optional(element) || regexp.test(value);
    }, "L'adresse du site n'est pas valide"
);

function recaptchaCallback() {
    $('#hiddenRecaptcha').valid();
}

function recaptchaCallbackTwo() {
    $('#hiddenRecaptchaTwo').valid();
}