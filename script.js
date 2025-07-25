// Optional: Add interactivity or pause on hover
const carouselTrack = document.querySelector('.carousel-track');

carouselTrack.addEventListener('mouseenter', () => {
  carouselTrack.style.animationPlayState = 'paused';
});

carouselTrack.addEventListener('mouseleave', () => {
  carouselTrack.style.animationPlayState = 'running';
});