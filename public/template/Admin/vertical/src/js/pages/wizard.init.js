
/*
Template Name: Adminox - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 2.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Wizard init js
*/

$(function() {
    // Override defaults
    $.fn.stepy.defaults.legend = false;
    $.fn.stepy.defaults.transition = 'fade';
    $.fn.stepy.defaults.duration = 200;
    $.fn.stepy.defaults.backLabel = '<i class="mdi mdi-arrow-left-bold"></i> Back';
    $.fn.stepy.defaults.nextLabel = 'Next <i class="mdi mdi-arrow-right-bold"></i>';


    $('#default-wizard').stepy();

    // Clickable titles
    $("#wizard-clickable").stepy({
        titleClick: true
    });

    // Stepy callbacks
    $("#wizard-callbacks").stepy({
        next: function(index) {
            alert('Going to step: ' + index);
        },
        back: function(index) {
            alert('Returning to step: ' + index);
        },
        finish: function() {
            alert('Submit canceled.');
            return false;
        }
    });

    // Apply "Back" and "Next" button styling
    $('.stepy-navigator').find('.button-next').addClass('btn btn-primary waves-effect waves-light');
    $('.stepy-step').find('.button-back').addClass('btn btn-secondary waves-effect float-left');
});