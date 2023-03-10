<script src="./assets/js/script.js"></script>
<script src="./assets/js/top.js"></script>
    <script src="./assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assetsjs/popper.min.js"></script>
    <script src="/assetsjs/bootstrap.min.js"></script>
    <script src="/assetsjs/jquery.validate.min.js"></script>
    <script src="/assetsjs/main.js"></script>
<script>document.getElementsByTagName("html")[0].className += " js";</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- bootstrap js -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script><script type="module" src="./script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<!-- back top js -->
<script>
var btn = $('#button');

$(window).scroll(function() {
if ($(window).scrollTop() > 300) {
btn.addClass('show');
} else {
btn.removeClass('show');
}
});

btn.on('click', function(e) {
e.preventDefault();
$('html, body').animate({scrollTop:0}, '300');
});

});
</script>
