const slider = document.getElementById('slider');
const slides = slider.children;
let index = 0;
const slideInterval = 3000; // 3 seconds

// Function to move to the next slide
const moveToNextSlide = () => {
  index = (index + 1) % slides.length;
  slider.style.transform = `translateX(-${index * 100}%)`;
};

// Function to move to the previous slide
const moveToPrevSlide = () => {
  index = (index - 1 + slides.length) % slides.length;
  slider.style.transform = `translateX(-${index * 100}%)`;
};

// Set up automatic slide movement
let autoSlide = setInterval(moveToNextSlide, slideInterval);

// Event listeners for manual navigation
document.getElementById('next').addEventListener('click', () => {
  clearInterval(autoSlide);  // Stop auto sliding
  moveToNextSlide();
  autoSlide = setInterval(moveToNextSlide, slideInterval);  // Restart auto sliding
});

document.getElementById('prev').addEventListener('click', () => {
  clearInterval(autoSlide);  // Stop auto sliding
  moveToPrevSlide();
  autoSlide = setInterval(moveToNextSlide, slideInterval);  // Restart auto sliding
});
// Smooth scroll back to top
document.getElementById('backToTop').addEventListener('click', function () {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});
