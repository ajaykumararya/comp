
///////////////////===============sticky top==============///////////////////////////////
window.addEventListener('scroll', function () {
  let navbar = document.querySelector(".navbar");

  if (window.pageYOffset >= 154) {
    navbar.classList.add('sticky');
  } else {
    navbar.classList.remove('sticky');
  }
});

///---------------navbar-------------------///
// For the thumbnail demo! :]

// var count = 1
// setTimeout(demo, 500)
// setTimeout(demo, 700)
// setTimeout(demo, 900)
// setTimeout(reset, 2000)

// setTimeout(demo, 2500)
// setTimeout(demo, 2750)
// setTimeout(demo, 3050)


var mousein = false
function demo() {
  if (mousein) return
  document.getElementById('demo' + count++)
    .classList.toggle('hover')

}

function demo2() {
  if (mousein) return
  document.getElementById('demo2')
    .classList.toggle('hover')
}

function reset() {
  count = 1
  var hovers = document.querySelectorAll('.hover')
  for (var i = 0; i < hovers.length; i++) {
    hovers[i].classList.remove('hover')
  }
}

document.addEventListener('mouseover', function () {
  mousein = true
  reset()
})
  /////////////////////// //=================slider==============/////////////////////////////////////

  (function () {
    var $slides = document.querySelectorAll('.slide');
    var $controls = document.querySelectorAll('.slider__control');
    var numOfSlides = $slides.length;
    var slidingAT = 1300; // sync this with scss variable
    var slidingBlocked = false;

    [].slice.call($slides).forEach(function ($el, index) {
      var i = index + 1;
      $el.classList.add('slide-' + i);
      $el.dataset.slide = i;
    });

    [].slice.call($controls).forEach(function ($el) {
      $el.addEventListener('click', controlClickHandler);
    });

    function controlClickHandler() {
      if (slidingBlocked) return;
      slidingBlocked = true;

      var $control = this;
      var isRight = $control.classList.contains('m--right');
      var $curActive = document.querySelector('.slide.s--active');
      var index = +$curActive.dataset.slide;
      (isRight) ? index++ : index--;
      if (index < 1) index = numOfSlides;
      if (index > numOfSlides) index = 1;
      var $newActive = document.querySelector('.slide-' + index);

      $control.classList.add('a--rotation');
      $curActive.classList.remove('s--active', 's--active-prev');
      document.querySelector('.slide.s--prev').classList.remove('s--prev');

      $newActive.classList.add('s--active');
      if (!isRight) $newActive.classList.add('s--active-prev');


      var prevIndex = index - 1;
      if (prevIndex < 1) prevIndex = numOfSlides;

      document.querySelector('.slide-' + prevIndex).classList.add('s--prev');

      setTimeout(function () {
        $control.classList.remove('a--rotation');
        slidingBlocked = false;
      }, slidingAT * 0.75);
    };
    setInterval(function () {
      if (!slidingBlocked) {
        triggerAutoSlide();
      }
    }, 5000);
    function triggerAutoSlide() {
      var $rightControl = document.querySelector('.slider__control.m--right');
      if ($rightControl) {
        $rightControl.click();
      }
    }
  }());
/////==================counter script==============////


