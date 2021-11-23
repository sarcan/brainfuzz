/* Navigation */
document.querySelector(".burger-nav .icon i").addEventListener("click", function(e) {
    // console.log(e);
    this.classList.toggle('fa-bars');
    this.classList.toggle('fa-times');
    
    document.querySelector('.burger-nav-links .mobile-nav').classList.toggle('active');
});

/* Animate */
/* anime ({
    targets: ".articles .article",
    translateX: 1050,
    duration: 1700,
    delay: anime.stagger(1000, {start: 1000}, {easing: 'easeInSine'})
}); */

// if (window.screen.width <= 1420) {

// } else {
//     anime ({
//         targets: ".article-information",
//         translateX: -300,
//         duration: 2000
//     });
// }