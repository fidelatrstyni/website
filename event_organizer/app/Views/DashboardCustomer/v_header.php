<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?php echo base_url('template/plugins/fontawesome-free/cs/all.min.css')?>">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url('template/plugins/fontawesome-free/css/all.min.css')?>">
    <link rel="stylesheet"
        href="<?php echo base_url('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('template/plugins/jqvmap/jqvmap.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('template/dist/css/adminlte.min.css?v=3.2.0')?>">

    <link rel="stylesheet"
        href="<?php echo base_url('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('template/plugins/daterangepicker/daterangepicker.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('template/plugins/summernote/summernote-bs4.min.css')?>">

    <link href="<?php echo base_url('bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')?>" rel="stylesheet">
    <script nonce="c6cc904a-f23e-4184-bc2a-fc08ec9d60c4">
    (function(w, d) {
        ! function(a, e, t, r) {
            a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zaraz = {
                deferred: []
            }, a.zaraz.q = [], a.zaraz._f = function(e) {
                return function() {
                    var t = Array.prototype.slice.call(arguments);
                    a.zaraz.q.push({
                        m: e,
                        a: t
                    })
                }
            };
            for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
            a.addEventListener("DOMContentLoaded", (() => {
                var t = e.getElementsByTagName(r)[0],
                    z = e.createElement(r),
                    n = e.getElementsByTagName("title")[0];
                for (n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.x =
                    Math.random(), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a
                    .zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a
                    .location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a
                    .zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a
                    .zarazData.q = []; a.zaraz.q.length;) {
                    const e = a.zaraz.q.shift();
                    a.zarazData.q.push(e)
                }
                z.defer = !0;
                for (const e of [localStorage, sessionStorage]) Object.keys(e).filter((a => a
                    .startsWith("_zaraz_"))).forEach((t => {
                    try {
                        a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
                    } catch {
                        a.zarazData["z_" + t.slice(7)] = e.getItem(t)
                    }
                }));
                z.referrerPolicy = "origin", z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(
                    JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
            }))
        }(w, d, 0, "script");
    })(window, document);
    </script>
</head>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed">
    <div class="wrapper">