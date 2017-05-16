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
       var $deleteLink = $('<a href="#" id="picture_remove" class="btn btn-danger">Supprimer</a>');
       $prototype.append($deleteLink);
       $deleteLink.click(function(e) {
           $prototype.remove();
           e.preventDefault();
           return false;
       });
   }

});