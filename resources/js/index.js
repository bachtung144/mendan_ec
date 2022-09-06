$(document).ready(function () {
    $('.logout-btn').on('click', function (event) {
        event.preventDefault();
        this.closest('form').submit();
    });
});
