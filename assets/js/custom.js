( function( $ ) {
 var html = document.querySelector("html");
gsap.registerPlugin(ScrollTrigger);

/**********    LOCOMOTIVE SCROLL SETUP    ***************/
const locoScroll = new LocomotiveScroll({
	el: document.querySelector(".scrollContainer"),
	smooth: true,
	lerp: 0.1,
	multiplier: 1.3,
	smoothMobile: 1
});
initJasonsLocoScroll();




/**********    BARBA JS INIT    ***************/
/**********    BARBA JS INIT    ***************/
/**********    BARBA JS INIT    ***************/
barba.init({
	debug:true,
	sync:true,
	transitions:[{
        debug:true,
        sync:true,
		async leave(data){
			const done = this.async();
			pageTranstion();
			await delay(1500);
			done();
		},
		async beforeLeave(data){
			locoScroll.destroy();
		},
		async afterEnter(data){
			var vids = document.querySelectorAll("video");
			vids.forEach(vid => { var playPromise = vid.play(); if (playPromise !== undefined) { playPromise.then(_ => {}).catch(error => {}); }; });
		},
		async after(data){
			lightHouse();
			parralaxBackground();
			logoGrid();
			scrollingText();
			cursorStyle();
			menuColor();
			backColor();
			fadeIn();
			$('.mask').removeClass('active');
			$('html').removeClass('menu-open'); /* Changes Logo Color With CSS */
			$('.Menu-Button').removeClass('is-active Open').addClass("Closed");
			deviceImages();
			locoScroll.init();
			ScrollTrigger.update();
			initJasonsLocoScroll();
			samePageLink();
			$('body').removeClass('show-back-to-top');
			backToTop();
			featureImage();  /* Profile Image Zoom In/Zoom Out */
			if ($(".Feature-Top")[0]){
				$('header').addClass('Dark-BG');
			}

		},
		async once(data){
			lightHouse();
			hamburger();
			logoGrid();
			scrollingText();
			cursorStyle();
			menuColor();
			backColor();
			parralaxBackground();
			pageLoadSequence();
			fadeIn();
			deviceImages();
			samePageLink();
			backToTop();
			featureImage();  /* Profile Image Zoom In/Zoom Out */
		}
	}]
})



/* PROGRAM SLIDER */
function lightHouse() {
	if ($('.Results-Stripe').length) {

		$('.Results-Stripe .col-xl-12').slick({
			arrows: false,
			dots: false,
			adaptiveHeight: true,
			lazyLoad: 'ondemand',
			rows: 0,
			slidesToShow: 3,
			slidesToScroll: 1,
			infinite: true,
			prevArrow: '<button class="slick-arrow slick-prev"><em class="fas fa-angle-left"><span class="Screen-Reader">Prev</span></em></button>',
			nextArrow: '<button class="slick-arrow slick-next"><em class="fas fa-angle-right"><span class="Screen-Reader">Next</span></em></button>',
			responsive: [
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 2,
						initialSlide: 1
					}
				},
				{
					breakpoint: 800,
					settings: {
						slidesToShow: 1,
						initialSlide: 1
					}
				}
			]
		});
		//$('.Results-Stripe .col-xl-12').slick('unslick').slick('reinit').slick();
	}
	//$('.Results-Stripe .slider').slick('setPosition').slick();
}



/* FUNCTION - BACK TO TOP */
function backToTop(){
	locoScroll.on("scroll", (position) => {
		if ((position.scroll.y) > 750) {
			document.querySelector("body").classList.add("show-back-to-top");
		} else {
			document.querySelector("body").classList.remove("show-back-to-top");
		}
	});
};

/* FUNCTION - SAME PAGE LINK */
function samePageLink(){
	var links = document.querySelectorAll('a[href]');
	var cbk = function(e) {
		if(e.currentTarget.href === window.location.href) {
			e.preventDefault();
			e.stopPropagation();
		}
	};

	for(var i = 0; i < links.length; i++) {
		links[i].addEventListener('click', cbk);
	}
}


/* FUNCTION - INIT LOCOSCROLL */
function initJasonsLocoScroll(){
	locoScroll.on("scroll", ScrollTrigger.update);
	ScrollTrigger.scrollerProxy(".scrollContainer", {
		scrollTop(value) {
			return arguments.length ? locoScroll.scrollTo(value, 0, 0) : locoScroll.scroll.instance.scroll.y;
		},
		getBoundingClientRect() {
			return {top: 0, left: 0, width: window.innerWidth, height: window.innerHeight};
		},
		pinType: document.querySelector(".scrollContainer").style.transform ? "transform" : "fixed"
	});
	ScrollTrigger.refresh();
	ScrollTrigger.addEventListener("refresh", () => locoScroll.update());

}



/* FUNCTION - BARBA JS TRANSITION */
function pageTranstion(){
	var tl = gsap.timeline();
	tl.to('ul.transition li', {duration:.5,scaleY:1,transformOrigin:"bottom left",stagger:.2});
	tl.to('ul.transition li', {duration:.5,scaleY:0,transformOrigin:"bottom left",stagger:.1,delay:.1});
}

/* BARBA DELAY FUNCTION */
function delay(n){
	n = n || 2000;
	return new Promise(done =>{
		setTimeout(() =>{
			done();
		}, n);
	});
}

/* FUNCTION - PARRALAX BACKGROUND IMAGE */
function parralaxBackground(){
	var sections = gsap.utils.toArray('.parralax > img');
	sections.forEach((section) => {
		gsap.to(section, {
			yPercent: 40,
			scrollTrigger: {
				trigger: section,
				scrub:0,
				scroller:".scrollContainer"
			}
		});
	});
}

/* FUNCTION - CHANGING MENU COLOR */
function menuColor(){
	gsap.utils.toArray("section, footer").forEach(function(elem) {
		var color = elem.getAttribute('data-bg');
		ScrollTrigger.create({
			trigger: elem,
			scroller:".scrollContainer",
			start:'top 75px',
			end:'bottom 75px',
			markers:false,
			onEnter(){header.classList.add(color);},
			onLeave(){header.classList.remove(color);},
			onEnterBack(){header.classList.add(color);},
			onLeaveBack(){header.classList.remove(color);}
		});
	});
}

/* FUNCTION - BACK COLOR*/
function backColor(){
	gsap.utils.toArray("section, footer").forEach(function(elem) {
		var color = elem.getAttribute('data-bg');
		ScrollTrigger.create({
			trigger: elem,
			scroller:".scrollContainer",
			start:'top bottom-=90px',
			end:'bottom bottom-=90px',
			markers:false,
			onEnter(){html.classList.add(color + "1");},
			onLeave(){html.classList.remove(color + "1");},
			onEnterBack(){html.classList.add(color + "1");},
			onLeaveBack(){html.classList.remove(color + "1");}
		});
	});
}

/* FUNCTION - PAGE LOAD SEQUENCE */
function pageLoadSequence(){
	var preloaderTimeline = gsap.timeline();
	const preload = document.querySelector('.Preloads');
	preload.classList.add('PreloadFinish');
	document.body.classList.add('PreloadDone');
	/* STEP 1 - Logo Reveal */
	preloaderTimeline.to(".LoaderOverlay",{duration:2,clipPath:"polygon(0 100%, 100% 100%, 100% 100%, 0% 100%)"});
	/* STEP 2 - Website Reveal */
	preloaderTimeline.to(".PreloadFinish",{duration:.5,delay:0,y:'100%',ease:"power2",transformOrigin:"bottom left"},">-.35");
	preloaderTimeline.from("header",{opacity:0,duration:1,y:-25,delay:.5},">-1");
	/* STEP 3 - Feature Text Fade In */
	var featureText = document.getElementsByClassName('Feature-Text');
	if (featureText.length > 0) {
		preloaderTimeline.from(".Feature-Text",{opacity:0,duration:1,y:-25,delay:.0},">-0.25");
	}
}

/* FUNCTION - CURSOR */
function cursorStyle(){
	gsap.set('.follower',{xPercent:-50,yPercent:-50});
	gsap.set('.cursor',{xPercent:-50,yPercent:-50});
	var follow = document.querySelector('.follower');
	var cur = document.querySelector('.cursor');
	window.addEventListener('mousemove',e => {
		gsap.to(cur,0.0,{x:e.clientX,y:e.clientY});
		gsap.to(follow,0.0,{x:e.clientX,y:e.clientY});
	});
	/* FUNCTION - CURSOR HOVER */
	$("a, button").hover(function(){
		$('.follower, .cursor').addClass('jason')
	}, function(){
		$('.follower, .cursor').removeClass('jason')
	});
	$('a').click(function(){
		setTimeout(function() {
			$('.follower, .cursor').removeClass('jason')
				, 500});
	});
}

/* FUNCTION - FEATURE IMAGE */
function featureImage(){
	var featureImage = document.getElementsByClassName('Feature-Image');
	if (featureImage.length > 0) {
		gsap.to('.Feature-Image img', {
			scale: 1.3,
			scrollTrigger: {
				trigger: '.Feature-Image',
				scroller:".scrollContainer",
				start: 'top 0%',
				end: 'bottom top',
				scrub: true
			}
		});
	}
}

/* FUNCTION - LOGO GRID */
function logoGrid(){
	var logoGrid = document.getElementsByClassName('Module-Logo-Grid');
	if (logoGrid.length > 0) {
		gsap.to('.Module-Logo-Grid li', {
			y: 0,
			opacity:1,
			stagger:.15,
			scrollTrigger: {
				trigger: '.Module-Logo-Grid',
				scroller:".scrollContainer",
				start: 'top 75%',
				end: 'bottom top'
			}
		});
	}
}

/* FUNCTION - SCROLLING TEXT */
function scrollingText(){
	const dur = 80;
	document.querySelectorAll('.js-ticker .wrapper').forEach(ticker => {
		const totalDistance = $(ticker).width();
		gsap.set(ticker, {yPercent: -0});
		$(ticker).append($(ticker.querySelector("li")).clone());
		const items = ticker.querySelectorAll("li");
		const anim = gsap.to(ticker, {
			duration: dur,
			x: -totalDistance,
			ease: "none",
			repeat: -1
		});
		let startPos;
		const wrap = gsap.utils.wrap(0, 1);
	});
}

/* FUNCTION - DEVICE IMAGE SCROLLER */
function deviceImages(){
	$(".Device-Wrapper").each(function(i) {
		var deviceImages = $(this).find('.Image');
		if (deviceImages.length > 0) {
			gsap.from(deviceImages, {
				y: -150,
				scrollTrigger: {
					trigger: deviceImages,
					scroller:".scrollContainer",
					scrub: true,
					start:'top bottom',
					end: 'top 30%'
				}
			});
		}
	});
}

/* FUNCTION - FADE IN */
function fadeIn(){
	$(".Fade-In").each(function(i) {
		var fadeIn = $(this);
		//if (fadeIn.length > 0) {
			gsap.to(fadeIn, {
				y: 0,
				opacity:1,
				delay:.1,
				duration:3.25,
				ease: "expo.out",
				scrollTrigger: {
					trigger: fadeIn,
					scroller:".scrollContainer",
					start: 'top 95%'
				}
			});
		//}
	});
}


/****************** NON BARBA JS FUNCTIONS ****************/

/* FUNCTION - HAMBURGER */
function hamburger() {
	$('.Menu-Button').click(function(){
		$('html').toggleClass('menu-open');
		$(this).toggleClass('is-active');
	});

	/* FUNCTION - MENU ANIMATION TIMELINE */
	let tl = gsap.timeline({paused:true});
	tl.to(".Menu",{opacity:1,duration:1,top:0,visibility:"visible",ease:Power2.easeInOut});
	tl.to(".nav",{opacity:1,duration:.35,stagger:0.2,y:0,marginBottom:0,ease:Power2.easeInOut}, ">-0.5");

	/* FUNCTION - HAMBURGER CLOSED BUTTON */
	$(document).on('click', ".Menu-Button.Closed", function() {
		tl.play().timeScale(1);
		$(this).removeClass("Closed").addClass("Open");
	});

	/* FUNCTION - HAMBURGER OPEN BUTTON */
	$(document).on('click', ".Menu-Button.Open", function() {
		tl.timeScale(2);
		tl.reverse();
		$(this).addClass("Closed").removeClass("Open");
	});

	/* NAVIGATION BUTTON */
	$('.nav a.mask').click(function(i) {
		$this = jQuery(this);
		$link = $(this).attr("data-href")
		$this.parents().siblings().find('.mask').removeClass('active')
		$(this).addClass('active');
		setTimeout(function(){
			$this.next()[0].click();
			tl.reverse();
		}, 1000);
	});

	/* FUNCTION - HAMBURGER CLOSED BUTTON */
	$(document).on('click', ".nav a", function() {
		$(this).parent().siblings().removeClass('selected');
		$(this).parent().addClass('selected');
	});
}
} )( jQuery );
