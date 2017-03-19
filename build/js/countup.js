jQuery(document).ready(function ($) {
    var controller = new ScrollMagic.Controller();

    new ScrollMagic.Scene({
        triggerElement: '.numbers',
        offset: -150,
        reverse: true,
    })
        .on('start', function (e) {
            if (e.scrollDirection === 'FORWARD') {
                $('.count-up').countTo({
                    speed: 1500,
                    refreshInterval: 40
                });
            }
        })
        .addTo(controller);
});
