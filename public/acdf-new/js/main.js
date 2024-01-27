// var navText = [
//   '<svg class="bi bi-chevron-compact-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 01.223.67L6.56 8l2.888 5.776a.5.5 0 11-.894.448l-3-6a.5.5 0 010-.448l3-6a.5.5 0 01.67-.223z" clip-rule="evenodd"/></svg>',
//   '<svg class="bi bi-chevron-compact-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 01.671.223l3 6a.5.5 0 010 .448l-3 6a.5.5 0 11-.894-.448L9.44 8 6.553 2.224a.5.5 0 01.223-.671z" clip-rule="evenodd"/></svg>'
// ];

// $(document).ready(function () {
//   $(".slider-main").owlCarousel({
//     items: 1,
//     loop: true,
//     autoplay: true,
//     autoplayTimeout: 5000,
//     smartSpeed: 250,
//     dots: false,
//     nav: true,
//     animateOut: 'fadeOut',
//     animateIn: 'fadeIn',
//     navText: navText
//   });

// });

// fade.in body
let time
let url = window.location.pathname
url == '/' ? time = 2 : time = 0.5
if (window.innerWidth < 768){
  url == '/' ? time = 0.5 : time = 0.2
}
$("body").css({"opacity":"1", "duration": time, "ease": "power4Out"})
// end of fade-in body

// color header //
if($('[data-main-target="header"]').hasClass('invert-header')){
  document.addEventListener('scroll', () => {
    let scrollPos = window.scrollY || window.scrollTop
    if (scrollPos > (window.innerHeight - 200)){
      $('[data-main-target="header"]').addClass('is-active')
    } else {
      $('[data-main-target="header"]').removeClass('is-active')
    }
  })
}
// end of color header //

if(url != '/' && url != '/en' && url != '/ru' && url != '/oz'){
    $('[data-main-target="header"]').removeClass('invert-header')
}

// change header //
document.addEventListener('scroll', () => {
  let headerLogo =$('[data-main-target="headerLogo"]');
  let scrollPos = window.scrollY || window.scrollTop
  let limit
  if(window.innerWidth > 768){
    limit = window.innerHeight - 200
  } else {
    limit = 200
  }

  if (scrollPos > (limit)){
    headerLogo.attr("src", headerLogo.attr("data-logomin"))
  } else {
    headerLogo.attr("src",headerLogo.attr("data-logo"))
  }
})

// end of change header //

// Close menu popup when itemCloseMenu clicked
var elements = document.querySelectorAll('[data-menu-target="itemCloseMenu"]');
elements.forEach(function(i){
  i.addEventListener('click', () => {
    this.closeMenu()
  })
});
// End Close menu popup when itemCloseMenu clicked

$( ".header_menu-btn" ).on( "click", openMenu);

$( ".icon-close" ).on( "click", closeMenu)

function openMenu() {

  let scrollPos = window.scrollTop || window.scrollY
  const body = document.querySelector('body')
  let menu = $(".menu");
  let inner_menu = $(".menu_inner");
  let menu_title = $(".menu_title");

  body.dataset.scrollPos = scrollPos
  body.style = `opacity: 1; top:-${scrollPos}px;`
  body.classList.add('noscroll')
  let sizeX = "calc(100% - 80px)"
  let sizeY = "calc(100% - 80px)"

  if (window.innerWidth < 1180) {
    sizeX = "calc(100% - 32px)"
    sizeY = "calc(100% - 32px)"
  }
  if (window.innerWidth < 768) {
    sizeX = "calc(100% - 16px)"
  }

  menu.css({"opacity":"1", "display": "block", "duration": "0.6", "ease": "power4"})
  inner_menu.css({"width": sizeX, "height": sizeY, "opacity": "1", "duration": "0.5", "ease": "power4"})
  menu_title.css({"transform": "translate(0px, 0px)", "opacity": 1})

}

function closeMenu() {
  let menu = $(".menu");
  let inner_menu = $(".menu_inner");
  const body = document.querySelector('body')
  let scrollPos = body.dataset.scrollPos

  inner_menu.css({"padding": "0", "width": "0", "height": '0', "opacity": "0", "duration": "0.3", "ease": "power4"})
  menu.css({"opacity": "0", "display": "none", "duration": "0.1", "ease": "power4"})

  body.style = "opacity: 1; "
  body.classList.remove('noscroll')
  window.scrollTo(0, scrollPos)
}


//Titles animations
let titleText = $('[data-animations-target="titleText"]')
let titleSqSmall = $('[data-animations-target="titleSqSmall"]')
let titleSqBig = $('[data-animations-target="titleSqBig"]')
if (titleText){
  let title_items
  if (window.innerWidth > 768){
    title_items = [
      {
        'item': titleText,
        'value': 0
      },
      {
        'item': titleSqBig,
        'value': -150
      },
      {
        'item': titleSqSmall,
        'value': -350
      }
    ]
  } else {
    title_items = [
      {
        'item': titleText,
        'value': 0
      },
      {
        'item': titleSqBig,
        'value': -100
      },
      {
        'item': titleSqSmall,
        'value': -200
      }
    ]
  }

  title_items.forEach(i => {
    gsap.to(i['item'], {
      scrollTrigger: {
        trigger: '.title-block',
        start: "top bottom",
        end: "bottom top",
        scrub: true,
        // markers: {startColor: "green", endColor: "red", fontSize: "12px"}
      },
      opacity: 1,
      y: i['value'],
    })
  })

}
//Titles animations

//Cusp animation
let cusp = $('[data-animations-target="cusp"]')
if (cusp){
  // programs title parallax //
  gsap.to(cusp, {
    scrollTrigger: {
      trigger: '.prog-intro',
      start: "top bottom",
      end: "bottom top",
      scrub: true,
      // markers: {startColor: "green", endColor: "red", fontSize: "12px"}
    },
    y: -window.innerHeight * 0.1
  })
}
//Cusp animation

// Prog animation
let programsTitle = $('[data-animations-target="programsTitle"]')
if (programsTitle){
  gsap.to(programsTitle, {
    scrollTrigger: {
      trigger: '.prog-intro',
      start: "top bottom",
      end: "bottom top",
      scrub: true,
      // markers: {startColor: "green", endColor: "red", fontSize: "12px"}
    },
    y: window.innerHeight / 4
  })
}

// programs list parallax //
let programDivs = document.querySelectorAll('.prog-list_item') || null
if (programDivs  && window.innerWidth > 768){
  programDivs.forEach(div => {

    gsap.to(div.querySelector('.prog-list_item_contents'), {
      scrollTrigger: {
        trigger: div,
        start: "top bottom",
        end: "bottom top",
        scrub: true,

        // markers: {startColor: "green", endColor: "red", fontSize: "12px"}
      },
      y: window.innerHeight * 0.15
    })
  })
}
// programs list parallax //

// Slider

setTimeout(function() {
  if( $('.gallery-slider')){
    // console.log($('#gallery-slider'))
    $('.gallery-slider').slick({
      // autoplay: true,
      // autoplaySpeed: 4000,
      slidesToShow: 1,
      slidesToScroll: 1,
      variableWidth: true,
      speed: 300,
      draggable: true,
      initialSlide: 1,
      centerMode: true,
      centerPadding: '32px',
      dots: false,
      infinite: true,
      lazyLoad: true,
      adaptativeHeight: true,
      // variableWidth: true
      prevArrow: '<div class="slider-arrow left"><img src="/acdf-new/images/arrow-left.svg" alt="slider-arrow"/></div>',
      nextArrow: '<div class="slider-arrow right"><img src="/acdf-new/images/arrow-right.svg" alt="slider-arrow"/></div>',
    })
  }
}, 200)
// Slider

// FullScreenImage

$('[data-action="click->main#fullscreenImage"]').click(function (event) {
  fullscreenImage(event);
})
$('[data-action="click->main#closePopup"]').click(function (event) {
  closePopup();
})

function fullscreenImage(e){
  let src = e.currentTarget.querySelector('img').src
  let popup = document.querySelector('.popup')
  let popupInner = document.querySelector('.popup_inner')
  let popupImg = document.querySelector('.popup-image img')
  popupImg.src = src
  popup.classList.add('is-active')
  let tl = gsap.timeline()
  gsap.to(popup, {opacity: 1, display: "block", duration: 0.6,ease: "power4"})
  tl.to(popupInner, {
    padding: '16px',
    width: "calc(100% - 80px)", height: 'calc(100% - 80px)',
    opacity: 1,
    duration: 0.5,
    ease: "power4"}
  )
  document.querySelector('body, html').classList.add('noscroll')
}

function closePopup(){
  let popups = document.querySelectorAll('.popup')
  popups.forEach(i => {
    let tl = gsap.timeline()
    tl.to(i.querySelector('.popup_inner'), {padding: 0, width: "0", height: '0', opacity: 0, duration: 0.3,ease: "power4"})
    tl.to(i, {opacity: 0, display: "none", duration: 0.1,ease: "power4"})
  })
  document.querySelector('body, html').classList.remove('noscroll')
}

// home programs size //
const prog_list = document.querySelector('.prog-list') || null
if (prog_list ){
  // this.setHomeProgList(prog_list)
  // window.addEventListener('resize', () =>  this.setHomeProgList(prog_list))
}
// end of home programs size //

// close popup with esc key
document.addEventListener("keydown", ({key}) => {
  if (key === "Escape"){
    let popupOpened = document.querySelector('.popup.is-active') || null
    if(popupOpened){
      this.closePopup()
    }
  } // Do things
})
// End of close with esc

var is_safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
if(is_safari == true){
  document.querySelector('body').classList.add('is-safari')
}
// FullScreenImage

