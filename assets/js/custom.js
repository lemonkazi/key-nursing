jQuery(document).ready(function ($) {
    $('.mobile-menu-btn').click(function() {
        $(this).toggleClass('active');
        $(".headerRight .menu").toggleClass('show-menu');
    });
})