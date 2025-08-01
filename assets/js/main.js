// Swiper
const swiper1 = new Swiper(".swiper", {
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// Scroll to top
const scrollToTopBtn = document.getElementById("scrollToTopBtn");

window.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    scrollToTopBtn.classList.add("show");
  } else {
    scrollToTopBtn.classList.remove("show");
  }
});

scrollToTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// Modal

const projectIcons = document.querySelectorAll(".project__icon");
const modalImage = document.getElementById("modalImage");

projectIcons.forEach((icon) => {
  icon.addEventListener("click", () => {
    // Cari elemen terdekat (misal parent) yang punya class .project-card
    const projectCard = icon.closest(".project__card");

    // Di dalam project-card, cari gambar dengan class .project__image
    const image = projectCard.querySelector(".project__image");

    // Ambil src-nya
    const imageSrc = image.getAttribute("src");

    // Tampilkan di modal
    modalImage.src = imageSrc;
    console.log(imageSrc);
  });
});

// Reveal animation
const reveals = document.querySelectorAll(".reveal");

function revealOnScroll() {
  for (let i = 0; i < reveals.length; i++) {
    const windowHeight = window.innerHeight;
    const revealTop = reveals[i].getBoundingClientRect().top;
    const revealPoint = 100;

    if (revealTop < windowHeight - revealPoint) {
      reveals[i].classList.add("active");
    }
  }
}

window.addEventListener("scroll", revealOnScroll);
revealOnScroll();
