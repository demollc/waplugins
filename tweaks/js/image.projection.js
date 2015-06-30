/*
 * Image preview script
 * powered by jQuery (http://www.jquery.com)
 * written by Alen Grakalic (http://cssglobe.com)
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 */

this.imagePreview = function(){
        xOffset = 10;
        yOffset = 30;
    $('[data-src]').hover(function(e){
       $("body").append("<div id='preview'><img src='"+$(this).data('src') +"' alt='Image preview' /></div>");
        $("#preview")
            .css("z-index","100")
            .css("background","ivory")
            .css("position","absolute")
            .css("border","solid 1px")
            .css("top",(e.pageY - xOffset) + "px")
            .css("left",(e.pageX + yOffset) + "px")
            .fadeIn("fast");
    },
    function(){
        $("#preview").remove();
    });
};
// starting the script on page load
$(document).ready(function(){
    $('[data-id] img').each(function(){
        src=$(this).attr('src');
        src=src.replace('48x48','200x0');
        $(this).data('src',src);
        $(this).attr('data-src',src)
    });
    imagePreview();
});