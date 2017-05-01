$(document).ready(function(){
    $("#orga-new").validate({
        rules : {
            "handissimobundle_organizations[name]":{
                "required": true,
                "minlength": 2,
                "maxlength": 200
            },
            "handissimobundle_organizations[address]":{
                "maxlength": 200
            },
            "handissimobundle_organizations[addressComplement]":{
                "maxlength": 200
            },
            "handissimobundle_organizations[postal]":{
                "maxlength":5,
                "number": true
            }
        }
    });
});

jQuery.extend(jQuery.validator.messages, {
    required: "Veuillez compléter ce champ",
    maxlength: jQuery.validator.format("La longueur du texte ne peut dépasser {0} caractères"),
    minlength: jQuery.validator.format("La longueur du texte doit être supérieur à {0} caractères"),
    number: "Le code postal doit être un nombre"
});