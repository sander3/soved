
import anime from 'animejs';

let preloaderText = document.querySelectorAll('.preloader h3');

let timeline = anime.timeline();

anime({
    targets: preloaderText,
    rotate: -3,
    opacity: 0,
    duration: 0
});

timeline
    .add({
        targets: preloaderText,
        easing: 'easeInOutQuart',
        translateY: [
            {
                value: 100,
                duration: 0
            },
            {
                value: 0
            }
        ],
        rotate: 0,
        opacity: 1,
        delay: function (el, i, l) {
            return i * 500;
        }
    })
    .add({
        targets: '.panel, .preloader h3',
        easing: 'easeInOutQuart',
        translateY: '100%',
        delay: function (el, i, l) {
            return i * 125;
        },
        duration: 800,
        offset: '+=800'
    })
    .add({
        targets: '.fadeInUpBig',
        easing: 'easeOutCirc',
        translateY: [
            {
                value: '100%',
                duration: 0
            },
            {
                value: 0
            }
        ],
        duration: 1600,
        offset: '-=850'
    });

timeline.finished.then(function () {
    document.querySelector('.preloader').remove();
    document.querySelector('meta[name="theme-color"]').setAttribute('content', '#ffffff');
});

window.onbeforeunload = function () {
    window.scrollTo(0, 0);
}
