/**
 * Created by tangui on 05/04/17.
 */
$(document).ready(function(){
   var $container = $('div#handissimobundle_organizations_media');
   var index = $container.find(':input').length;

   $('#add_picture').click(function(e) {
       addMedia($container);

       e.preventDefault();
       return false;
   });

   if(index == 0) {
       addMedia($container);
   }else {
       $container.children('div').each(function() {
           addDeleteLink($(this));
       });
   }

   function addMedia($container) {
       var template = $container.attr('data-prototype')
           .replace(/__name__label__/g, 'Images n°' + (index + 1))
           .replace(/__name__/g, index)
           .replace(/__name__file__/g, 'Fichier télécharger n°' + (index + 1))
           .replace(/__name__/g, index);


       var $prototype = $(template);

       addDeleteLink($prototype);

       $container.append($prototype);

       index ++;
   }

   function addDeleteLink($prototype) {
       var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');

       $prototype.append($deleteLink);

       $deleteLink.click(function(e) {
           $prototype.remove();

           e.preventDefault();
           return false;
       });
   }
});