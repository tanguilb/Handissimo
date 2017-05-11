/**
 * Created by tangui on 05/04/17.
 */
$(document).ready(function(){
   var $container = $('div#handissimobundle_organizations_media');
   $container.removeAttr('data-prototype');
   $container.attr('data-prototype', '<div class="form-group col-md-4 col-xs-12"><label class="control-label">__name__label__</label><div id="handissimobundle_organizations_media___name__"><div class="form-group"><label class="control-label">Ajouter une image</label><div class="vich-image"><input type="file" id="handissimobundle_organizations_media___name___imageFile_file" name="handissimobundle_organizations[media][__name__][imageFile][file]" /></div></div><div class="form-group"><div class="checkbox"><label><input type="checkbox" id="handissimobundle_organizations_media___name___caroussel" name="handissimobundle_organizations[media][__name__][caroussel]" value="1" />Ajouter au caroussel: </label></div></div><div class="form-group"><div class="checkbox"><label><input type="checkbox" id="handissimobundle_organizations_media___name___firstPicture" name="handissimobundle_organizations[media][__name__][firstPicture]" value="1" />Définir comme image de présentation: </label></div></div></div></div>');
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
       var $deleteLink = $('<a href="#" id="picture_remove" class="btn btn-danger">Supprimer</a>');
       $prototype.append($deleteLink);
       $deleteLink.click(function(e) {
           $prototype.remove();
           e.preventDefault();
           return false;
       });
   }

});