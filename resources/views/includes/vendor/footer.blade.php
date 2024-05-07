</div>
<!--end::Container-->
</div>
</div>
<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
<div class="text-dark order-2 order-md-1">
    <span class="text-muted fw-bold me-1">2024©</span>
    <a href="" target="_blank" class="text-gray-800 text-hover-primary">Estrrado</a>
</div>
<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
    <li class="menu-item">
        {{-- <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a> --}}
    </li>
    <li class="menu-item">
        {{-- <a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a> --}}
    </li>
    <li class="menu-item">
        {{-- <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a> --}}
    </li>
</ul>
</div>
</div>
</div>
</div>
</div>
<script>var hostUrl = "assets/";</script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{ asset('assets/js/custom/modals/offer-a-deal.bundle.js')}}"></script>
<script src="{{ asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{ asset('assets/js/custom/modals/create-app.js')}}"></script>
<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const flashMsg = document.getElementById('successFlashMsg');
        setTimeout(function() {
            if (flashMsg) {
                flashMsg.remove();
            }
        }, 2000);
    });
</script>
</body>
</html>
