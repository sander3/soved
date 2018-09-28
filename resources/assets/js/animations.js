
import anime from 'animejs';

anime({
    targets: '.fadeInUpBig',
    easing: 'linear',
    translateY: [
        {
            value: '100%',
            duration: 0
        },
        {
            value: 0
        }
    ],
    duration: 1200
});
