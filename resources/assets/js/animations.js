
import 'is-in-viewport';
import anime from 'animejs';

let target = $('.fadeInUpBig');

if (target.is(':in-viewport')) {
    anime({
        targets: target[0],
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
}
