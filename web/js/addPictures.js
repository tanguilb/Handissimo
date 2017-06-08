/**
 * Created by tangui on 05/04/17.
 */
$(document).ready(function(){
   var $container = $('div#handissimobundle_organizations_media');
   $container.attr('data-prototype');
   var index = $container.find(':input').length;

   $('#add_picture').click(function(e) {
       addMedia($container);
       e.preventDefault();
       return false;
   });

       $container.children('div').each(function() {
           addDeleteLink($(this));
       });

   function addMedia($container) {
       var template = $container.attr('data-prototype')
           .replace(/__name__label__/g, 'Images n°' + (index + 1))
           .replace(/__name__/g, index)
           ;
        $(template).append('<div class="col-md-4"></div>')
       var $prototype = $(template);
       addDeleteLink($prototype);

       $container.append($prototype);
       index ++;
   }

   function addDeleteLink($prototype) {
       var $deleteLink = $('<a href="#" id="picture_remove" class="btn btn-default">Supprimer</a>');
       $prototype.append($deleteLink);
       $deleteLink.click(function(e) {
           $prototype.remove();
           e.preventDefault();
           return false;
       });
   }

    $('.btnNext').click(function(){
        $('.nav-pills > .active').next('li').find('a').trigger('click');
        $(window).scrollTop(0);
    });

    $('.btnPrevious').click(function(){
        $('.nav-pills > .active').prev('li').find('a').trigger('click');
        $(window).scrollTop(0);
    });

    var structureLogo = $("#handissimobundle_organizations_structureLogoFile_file");
    $("#empty-field-stucture").on("click", function() {
        structureLogo.val("");
    });
    var societyLogo = $("#handissimobundle_organizations_societyLogoFile_file");
    $("#empty-field-societie").on("click", function() {
        societyLogo.val("");
    });
    var brochure = $("#handissimobundle_organizations_brochureFile_file");
    $("#empty-field-brochure").on("click", function() {
        brochure.val("");
    });
    var firstPicture = $("#handissimobundle_organizations_firstPictureFile_file");
    $("#empty-field-picture").on("click", function() {
        firstPicture.val("");
    });
});