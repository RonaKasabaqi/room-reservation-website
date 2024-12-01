let currentIndex = 0;

  function changeSlide(offset) {
    const slides = document.querySelectorAll(".mySlides");
    slides[currentIndex].style.display = "none";
    currentIndex = (currentIndex + offset + slides.length) % slides.length;
    slides[currentIndex].style.display = "block";
}

  function goToSlide(index) {
    const slides = document.querySelectorAll(".mySlides");
    slides[currentIndex].style.display = "none";
    currentIndex = index;
    slides[currentIndex].style.display = "block";
}
  document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".mySlides");
    slides[currentIndex].style.display = "block";
});