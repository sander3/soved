
let hireable = document.querySelector('.hireable');

hireable.addEventListener('click', function (event) {
    document.querySelector('.footer').scrollIntoView({
        behavior: 'smooth'
    });
});
