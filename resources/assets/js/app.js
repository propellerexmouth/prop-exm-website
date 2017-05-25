/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

// window.axios = require('axios');
//
// window.axios.defaults.headers.common = {
//     'X-CSRF-TOKEN': window.Laravel.csrfToken,
//     'X-Requested-With': 'XMLHttpRequest'
// };

require('bootstrap-sass/assets/javascripts/bootstrap/modal');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    var $subscriptionForm = $('#subscription-form');

    if ($subscriptionForm.length > 0) {
        $subscriptionForm.submit(function (e) {
            e.preventDefault();
            subscribe($subscriptionForm);
        });
    }

// Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                        ;
                    });
                }
            }
        });

});

// function showModal($elementID) {
//     $('.modal__bg').show();
//     $element = document.getElementById($elementID).style.display = 'block';
// }

function subscribe($form) {
    // console.log($form.serialize());

    $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: $form.serialize(),
        cache: false,
        dataType: 'json',

        success: function (response) {
            var info = $('.message__container');
            info.find('p').html('<div style="text-align:center">' + response.message + '</div>').prepend('<svg class="icon--success" xmlns="http://www.w3.org/2000/svg" viewBox="-949 951 100 100"><switch><g><path d="M-899 953.5c-26.2 0-47.5 21.3-47.5 47.5s21.3 47.5 47.5 47.5 47.5-21.3 47.5-47.5-21.3-47.5-47.5-47.5zm0 89.2c-23 0-41.7-18.7-41.7-41.7s18.7-41.7 41.7-41.7 41.7 18.7 41.7 41.7-18.7 41.7-41.7 41.7z"/><path d="M-905 1009.8l-14.3-14.3-5.1 5.1 19.4 19.4 33.2-33.2-5.2-5.1z"/></g></switch></svg>');
            info.find('ul').hide();
            $form.hide();
        },

        error: function (xhr) {
            var response = jQuery.parseJSON(xhr.responseText);
            var info = $('.message__container');

            info.hide().find('ul').empty();
            info.find('p').html(response.message);
            for (var k in response.errors) {
                if (response.errors.hasOwnProperty(k)) {
                    response.errors[k].forEach(function (val) {
                        info.find('ul').append('<li>' + val + '</li>');
                    });

                }
            }

            info.slideDown();

        }
    });
}