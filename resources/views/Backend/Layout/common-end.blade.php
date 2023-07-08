<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script src="{{ asset('assets/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/sweetalert/sweetalert2@11.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
{{-- databale responsive--}}
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/js/plugins/datatables.js"
    type="text/javascript"></script>
<script src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/js/plugins/datatables.js"
    type="text/javascript"></script>
<!-- Libreria js para las Notificaciones -->
<script src="{{ asset('assetsnotf/js/Lobibox.js') }}"></script>
<script src="{{ asset('assetsnotf/js/notification-active.js') }}"></script>
{{-- <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script> --}}
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.5') }}"></script>
<script>
    function r(e) {
    var t = document.querySelectorAll(".navbar-main .nav-link")
    , a = document.querySelectorAll(".navbar-main .sidenav-toggler-line");
    "blur" === e ? (t.forEach(e=>{
        e.classList.remove("text-body")
    }
    ),
    a.forEach(e=>{
        e.classList.add("bg-dark")
    }
    )) : "transparent" === e && (t.forEach(e=>{
        e.classList.add("text-body")
    }
    ),
    a.forEach(e=>{
        e.classList.remove("bg-dark")
    }
    ))
}
document.querySelector(".sidenav-toggler") && (sidenavToggler = document.getElementsByClassName("sidenav-toggler")[0],
sidenavShow = document.getElementsByClassName("g-sidenav-show")[0],
toggleNavbarMinimize = document.getElementById("navbarMinimize"),
sidenavShow) && (sidenavToggler.onclick = function() {
sidenavShow.classList.contains("g-sidenav-hidden") ? (sidenavShow.classList.remove("g-sidenav-hidden"),
sidenavShow.classList.add("g-sidenav-pinned"),
toggleNavbarMinimize && (toggleNavbarMinimize.click(),
toggleNavbarMinimize.removeAttribute("checked"))) : (sidenavShow.classList.remove("g-sidenav-pinned"),
sidenavShow.classList.add("g-sidenav-hidden"),
toggleNavbarMinimize && (toggleNavbarMinimize.click(),
toggleNavbarMinimize.setAttribute("checked", "true")))
}
);
</script>
