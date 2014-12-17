$(document).ready(function () {
    $('#slider').slider({
        formater: function (value) {
            return 'Current value: ' + value;
        }
    });

});
