"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// Timeline
(function ($) {
  $.fn.timeline = function () {
    var selectors = {
      id: $(this),
      item: $(this).find(".timeline-item"),
      activeClass: "timeline-item--active",
      img: ".timeline__img"
    };
    selectors.item.eq(0).addClass(selectors.activeClass);
    selectors.id.css("background-image", "url(" + selectors.item.first().find(selectors.img).attr("src") + ")");

    var itemLength = selectors.item.length;
    $(window).scroll(function () {
      var max, min;
      var pos = $(this).scrollTop();
      selectors.item.each(function (i) {
        min = $(this).offset().top;
        max = $(this).height() + $(this).offset().top;
        var that = $(this);
        if (i == itemLength - 2 && pos > min + $(this).height() / 2) {
          selectors.item.removeClass(selectors.activeClass);
          selectors.id.css("background-image", "url(" + selectors.item.last().find(selectors.img).attr('src') + ")");
          selectors.item.last().addClass(selectors.activeClass);
        } else if (pos <= max - 40 && pos >= min) {
          selectors.id.css("background-image", "url(" + $(this).find(selectors.img).attr('src') + ")");
          selectors.item.removeClass(selectors.activeClass);
          $(this).addClass(selectors.activeClass);
        }
      });
    });
  };
})(jQuery);
$("#timeline-1").timeline();

// fix video positioning
(function ($) {
  // set video to be exactly the center
  var $video = $('.video iframe');
  var $logo = $('.logo');
  var windowHeight = $(window).height();
  // adjust video size
  $video.css({ height: windowHeight / 1.9 });
  var marginTop = (windowHeight - $video.height()) / 2 - $logo.height() * 1.5;
  $video.css({ marginTop: marginTop });
})(jQuery);

// button actions
(function ($) {
  $('.hover-btn').hover(function () {
    $(this).css({ borderBottom: "4px groove #CDB51B" });
  }, function () {
    $(this).css({ borderBottom: "none" });
  });

  $('#enter-inferno').click(function () {
    $('html, body').animate({
      scrollTop: $('#timeline-1').offset().top
    }, 1000);
  });
})(jQuery);

// flame window
(function ($) {
  var Particle = function () {
    function Particle(index) {
      _classCallCheck(this, Particle);

      this.life = 20 + Math.random() * 30;
      this.current_life = this.life + Math.random() * -20;
      this.radius = 5 + Math.random() * MAX_RADIUS;
      this.index = index;
      this.friction = 0.99 + 0.01 * Math.random();

      this.spd = {
        x: -2.5 + Math.random() * 5,
        y: -15 + Math.random() * 10
      };

      this.location = {
        x: this.index * this.radius,
        y: height - this.radius
      };
    }

    _createClass(Particle, null, [{
      key: "draw",
      value: function draw() {
        ctx.globalCompositeOperation = "source-over";
        Particle.clear();

        ctx.globalCompositeOperation = "lighter";

        for (var i = 0; i < particles.length; i++) {
          for (var x = 0; x < particles[i].items.length; x++) {
            var particle = particles[i].items[x];
            var opacity = particle.current_life / particle.life;
            ctx.fillStyle = "rgba(198, 47, 42, " + opacity + ")";

            ctx.beginPath();
            ctx.arc(particle.location.x, particle.location.y, particle.radius, 0 * Math.PI, Math.PI * 2);
            ctx.fill();

            particle.location.x += particle.spd.x;
            particle.location.y += particle.spd.y;
            particle.spd.x *= particle.friction;
            particle.spd.y *= particle.friction;

            particle.radius--;
            particle.current_life--;

            if (particle.radius <= 0 || particle.current_life <= 0) {
              particles[i].items[x] = new Particle(i);
            }
          }
        }

        window.requestAnimationFrame(Particle.draw);
      }
    }, {
      key: "updateCanvas",
      value: function updateCanvas() {
        width = canvas.width = window.innerWidth;
        height = canvas.height = window.innerHeight / 5;
      }
    }, {
      key: "clear",
      value: function clear() {

        ctx.clearRect(0, 0, width, height);
      }
    }]);

    return Particle;
  }();

  var MAX_RADIUS = 10;
  var MAX_PARTICLES_BY_COLUMN = 35;

  var canvas = document.querySelector('#flame'),
      ctx = canvas.getContext('2d'),
      width = canvas.width = window.innerWidth,
      height = canvas.height = window.innerHeight / 5,
      columns = width / MAX_RADIUS,
      particles = [],
      mouse = {};

  for (var i = 0; i < columns; i++) {
    particles[i] = {
      column: i,
      items: []
    };

    for (var x = 0; x < MAX_PARTICLES_BY_COLUMN; x++) {
      particles[i].items[x] = new Particle(i);
    }
  }

  window.requestAnimationFrame(Particle.draw);
  window.addEventListener('resize', Particle.updateCanvas, false);
})(jQuery);