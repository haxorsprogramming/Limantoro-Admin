<footer class="footer">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </nav>
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                <span>Develop by <a href="#!" target="_blank">-</a></span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="{{ asset('style/') }}/compass/bundles/libscripts.bundle.js"></script>
<script src="{{ asset('style/') }}/compass/bundles/vendorscripts.bundle.js"></script> 
<!-- Lib Scripts Plugin Js -->

<!-- Javascript custom  -->
<script>
const server = "{{ url('') }}";
</script>
<script src="{{ asset('base/') }}/js/loginPage.js"></script>
<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>

</body>
</html>