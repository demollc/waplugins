$("#s-plugin-tweaks").prependTo("#s-product-view");
$("#product-sales-plot").attr('data-tab','sales-plot');
(function(container) {
    var getLastTab = function() {
        return $.storage.get('shop/product-profile-tweak/tab');
    };
    var setLastTab = function(tab) {
        $.storage.set('shop/product-profile-tweak/tab', tab);
    };

    container.on('click', '.tabs a', function() {
        $(this).closest('.tabs').find('.selected').removeClass('selected')
        var el = $(this).closest('li').addClass('selected');
        $('.tab-content', container).find('.s-tab-block').hide().end().find('.s-tab-block[data-tab="' + el.data('tab') + '"]').show();
        setLastTab(el.data('tab'));
        return false;
    });
    var last_tab = getLastTab();
        if (last_tab) {
            container.find('li[data-tab="' + last_tab + '"] a').click();
        }
})($('#s-plugin-tweaks'));
setTimeout(function(){
        $("#product-sales-plot").addClass('s-tab-block').appendTo('#s-tweaks-tab-content').hide();
    },1000);
