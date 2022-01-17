//SCROLL REVEAL JS

/*==================== SCROLL REVEAL ANIMATION ====================*/
const sr = ScrollReveal({
    origin: 'top', //nereden nereye
    distance: '30px', //pixsel
    duration: 2000, //süresi
    reset: true //sayfa yenilendiğinde
});

//animasyonun olacağı classlar
sr.reveal(`.home__data, .home__img,
            .about__data, .about__img,
            .services__content, .menu__content,
            .app__data, .app__img,
            .contact__data, .contact__button,
            .footer__content`, {
    interval: 200
})
