$(function () {
    var $nav = $(".navbar-yn");
    $(window).on("scroll", function () {
        $nav.toggleClass("scrolled", $(window).scrollTop() > 20);
    });

    $(".navbar-toggler").on("click", function () {
        $("#ynNav").toggleClass("show");
    });
    $("#ynNav a").on("click", function () {
        $("#ynNav").removeClass("show");
    });

    function drawNeural() {
        var $stage = $(".hero-stage");
        var $svg = $("#neural");
        if (!$stage.length || !$svg.length || $(window).width() < 1200) {
            $svg.empty();
            return;
        }
        var w = $stage.width();
        var h = $stage.height();
        $svg.attr("viewBox", "0 0 " + w + " " + h);
        var c = $(".center-node")[0].getBoundingClientRect();
        var s = $stage[0].getBoundingClientRect();
        var cx = c.left - s.left + c.width / 2;
        var cy = c.top - s.top + c.height / 2;
        var defs =
            '<defs><linearGradient id="goldStroke" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="10%" stop-color="#a78b71"/><stop offset="90%" stop-color="#c9b8a0"/></linearGradient></defs>';
        var paths = defs;
        $(".sat").each(function () {
            var r = this.getBoundingClientRect();
            var x = r.left - s.left + r.width / 2;
            var y = r.top - s.top + r.height / 2;
            var mx = (x + cx) / 2;
            var d = "M " + x + " " + y + " C " + mx + " " + y + ", " + mx + " " + cy + ", " + cx + " " + cy;
            paths += '<path class="node-line" d="' + d + '"/>';
            paths += '<path class="node-dash" d="' + d + '"/>';
        });
        $svg.html(paths);
    }

    drawNeural();
    $(window).on("resize", drawNeural);

    if (window.gsap) {
        gsap.registerPlugin(ScrollTrigger);
        gsap.from(".reveal", {
            y: 48,
            opacity: 0,
            duration: 1.1,
            stagger: 0.12,
            ease: "power4.out",
        });
        gsap.utils.toArray(".reveal-up").forEach(function (el) {
            gsap.from(el, {
                scrollTrigger: { trigger: el, start: "top 86%" },
                y: 40,
                opacity: 0,
                duration: 1,
                ease: "power4.out",
            });
        });
    }

    $(".gallery-item").on("click", function (e) {
        e.preventDefault();
        $("#lightbox img").attr("src", $(this).attr("href"));
        $("#lightbox").addClass("on");
    });
    $("#lightbox").on("click", function () {
        $(this).removeClass("on");
    });
});
