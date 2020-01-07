var isLoadingPost = false;
var isLoadingBlogPage = false;

$(document).ready(function(){
	$(function() {
        $('.lazy').Lazy({
			scrollDirection: 'vertical',
			effect: 'fadeIn',
			visibleOnly: true,
			onError: function(element) {
				console.log('error loading ' + element.data('src'));
			}
		});
    });
	
    $("#menu-toggle").on('click', function(){
        if($(this).hasClass("is-active")){
            $(this).removeClass("is-active");
            $(".expandable-menu").removeClass("expanded");
        } else {
            $(this).addClass("is-active");
            $(".expandable-menu").addClass("expanded");
        }
    });

    $("#case_banner_carousel").slick({
        fade: true,
        autoplay: true,
        autoplaySped: 4000,
        pauseOnHover: false,
        dots: false,
        arrows: false,
        accessibility: false,
    });
	
	$(".case-img-carousel").slick({
		fade: true,
        autoplay: true,
        autoplaySped: 4000,
        pauseOnHover: false,
        dots: false,
        arrows: false,
        accessibility: false,
	});

    $("#carousel").slick({
        fade: true,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: false,
        pauseOnHover: true,
        asNavFor: '#carousel-nav',
        accessibility: false,
    });
    $("#carousel-nav").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '#carousel',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        centerMode: true,
        accessibility: false,
    });

    $(".btn-rounded").each(function(){
        let height = $(this).outerHeight();
        $(this).css("border-radius", height + "px");
    });

    $(".x-rounded").each(function(){
        let height = $(this).height();
        $(this).css("border-radius", height + "px");
    });

    $(".prev-slide").on('click', function(){
        $($(this).attr('data-slider')).slick('slickPrev');
    });

    $(".next-slide").on('click', function(){
        $($(this).attr('data-slider')).slick('slickNext');
    });

    $(".story").hover(function(){
        $(this).find(".video").get(0).play();
    }, function(){
        $(this).find(".video").get(0).pause();
    });

    $(".lettering").lettering();

    $(".text-vertical").each(function(){
        let parent = $(this);
        $(parent).children().each(function(i, item){
            parent.prepend($(item));
        });
    });

    $(".cases-carousel").each(function(){
        let id = $(this).attr("id");
        let target = $(".cases-nav-carousel[data-target-carousel='#"+id+"']").attr("id");
        $(this).slick({
            fade: true,
            dots: false,
            arrows: false,
            pauseOnHover: true,
            asNavFor: "#"+target,
            accessibility: false,
            adaptiveHeight: true,
            draggable: false,
            swipe: false,
            touchMove: false,
        });
    });
    $(".cases-nav-carousel").each(function(){
        let target = $(this).attr('data-target-carousel');
        $(this).slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: target,
            arrows: false,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                }
            ],
            accessibility: false,
            draggable: false,
            swipe: false,
            touchMove: false,
        });
    });

    var active_case = -1;
    $(".case-item").on('click', function(event){
        let os = DetectOS();
        if(os != 'Android' && os != 'iOS'){
            event.preventDefault();
            let id = $(this).attr('id');
            let target = $(this).closest(".cases-nav-carousel").attr('data-target-carousel');
            if(active_case != id){
                active_case = id;
                if(!$(target).closest(".cases-carousel-wrapper").hasClass('show')){
                    $(target).closest(".cases-carousel-wrapper").addClass("show");
                }
                $("html, body").animate({
                    scrollTop: $(this).offset().top-20,
                });
            } else {
                if($(target).closest(".cases-carousel-wrapper").hasClass('show')){
                    $(target).closest(".cases-carousel-wrapper").removeClass("show");
                } else {
                    $(target).closest(".cases-carousel-wrapper").addClass("show");
                }
            }
        }
    });

    $(".post-scroll").on('click', function(){
        let featuredImage = $(this).closest('.featured-image');
        let scroll = featuredImage.offset().top + featuredImage.height() - 50;
        $("html, body").animate({
            scrollTop: scroll,
        });
    });

    $(window).scroll(function() {
        let footerHeight = $("footer").height() + $("#pre-footer").height();
        if($(window).scrollTop() + $(window).height() >= $(document).height() - footerHeight) {
            if(typeof nextPostId != "undefined" && !isLoadingPost){
                LoadNextPost();
            }
            if(typeof nextBlogPage != "undefined" && !isLoadingBlogPage){
                LoadNextBlogPage();
            }
        }

        $("article").each(function(){
            let articleTop = $(this).offset().top;
            let articleBottom = $(this).offset().top + $(this).height();
            let scrollPosition = $(window).scrollTop() + ($(window).height() / 3);

            if(scrollPosition > articleTop && scrollPosition < articleBottom) {
                if(document.title != $(this).attr("data-title")){
                    document.title = $(this).attr("data-title");
                }
                if(window.location.href != $(this).attr("data-url")){
                    window.history.pushState({}, "", $(this).attr("data-url"));
                }
            }
        });
    });

    $(".post-content img").each(function(){
        if(!$(this).hasClass("img-fluid")){
            $(this).addClass("img-fluid");
        }
        if(!$(this).parent().hasClass("text-center")){
            $(this).parent().addClass("text-center");
        }
    });

    BuildCharts();
});

function Setup(){
	$(".featured-image").parallax();
	$(window).trigger("resize").trigger("scroll");
	
    $(".post-content img").each(function(){
        if(!$(this).hasClass("img-fluid")){
            $(this).addClass("img-fluid");
        }
        if(!$(this).parent().hasClass("text-center")){
            $(this).parent().addClass("text-center");
        }
    });

    $(".post-scroll").on('click', function(){
        let featuredImage = $(this).closest('.featured-image');
        let scroll = featuredImage.offset().top + featuredImage.height() - 50;
        $("html, body").animate({
            scrollTop: scroll,
        });
    });
}

function DetectOS() {
    var userAgent = window.navigator.userAgent,
        platform = window.navigator.platform,
        macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
        windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
        iosPlatforms = ['iPhone', 'iPad', 'iPod'],
        os = null;

    if (macosPlatforms.indexOf(platform) !== -1) {
        os = 'Mac OS';
    } else if (iosPlatforms.indexOf(platform) !== -1) {
        os = 'iOS';
    } else if (windowsPlatforms.indexOf(platform) !== -1) {
        os = 'Windows';
    } else if (/Android/.test(userAgent)) {
        os = 'Android';
    } else if (!os && /Linux/.test(platform)) {
        os = 'Linux';
    }

    return os;
}

function LoadNextPost(){
    if(nextPostId != -1){
        isLoadingPost = true;
        $("#nextPostContent").append("<i class=\"fas fa-compact-disc fa-5x fa-spin\"></i>");

        let data = {
            'action' : 'get_post_content',
            'post_id' : nextPostId
        };

        $.post(ajaxUrl, data, function(response){
            $("#nextPostContent").replaceWith(response);
            Setup();
            isLoadingPost = false;
        });
    }
}

function LoadNextBlogPage(){
    if(nextBlogPage != -1){
        isLoadingBlogPage = true;
        $("#nextBlogPage").append("<i class=\"fas fa-compact-disc fa-5x fa-spin\"></i>");

        let data = {
            'action' : 'get_blog_page',
            'blog_page' : nextBlogPage
        };

        $.post(ajaxUrl, data, function(response){
            $("#nextBlogPage").replaceWith(response);
            Setup();
            isLoadingBlogPage = false;
        });
    }
}

function BuildCharts(){
	// Chart.defaults.global.defaultFontColor = 'white';
	Chart.defaults.global.defaultFontColor = 'black';
    $(".case-chart").each(function(){
        var data = $(this).attr("data-chart-data");
        var type = $(this).attr("data-chart-type");
        var description = $(this).attr("data-chart-description");
        var color = $(this).attr("data-chart-color");

        var chartData = JSON.parse(data);
        var labels = new Array();
        var values = new Array();

        chartData.forEach(function(obj){
            labels.push(obj.name);
            values.push(parseInt(obj.value));
        });

        // console.log(values);

        new Chart(this, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    label: description,
                    backgroundColor: color,
                    borderColor: color,
                    data: values,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                        }
                    }]
                },
            }
        });
    });
}