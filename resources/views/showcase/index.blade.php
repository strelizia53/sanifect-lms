<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Slideshow</title>
    <!-- Swiper.js CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #1e293b; /* Dark background */
        color: #facc15; /* Golden text */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }
      .swiper-container-wrapper {
        position: relative;
        width: 95%; /* Wider slideshow */
        max-width: 1600px; /* Increased maximum width */
        height: 800px; /* Increased height */
        margin-bottom: 20px; /* Add spacing below the slideshow */
      }
      .swiper {
        width: 100%;
        height: 100%;
        background-color: #1e293b; /* Dark container background */
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        border: 3px solid #facc15; /* Slightly thicker golden border */
      }
      .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #1e293b; /* Matching slide background */
      }
      .swiper-slide img {
        width: 100%;
        height: 100%; /* Ensure image fits the larger container */
        object-fit: cover;
        border-radius: 8px;
      }
      .swiper-pagination-bullet {
        background: #facc15; /* Golden bullets */
      }
      .swiper-button-prev,
      .swiper-button-next {
        color: #facc15;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 60px; /* Bigger navigation buttons */
        height: 60px; /* Bigger navigation buttons */
        background-color: rgba(
          30,
          41,
          59,
          0.7
        ); /* Semi-transparent background */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background-color 0.3s ease;
      }
      .swiper-button-prev:hover,
      .swiper-button-next:hover {
        background-color: #334155; /* Lighter dark */
      }
      .swiper-button-prev {
        left: -80px; /* Adjusted for larger buttons */
      }
      .swiper-button-next {
        right: -80px; /* Adjusted for larger buttons */
      }
      .quiz-button {
        background-color: #facc15; /* Golden background */
        color: #1e293b; /* Dark text */
        border: none;
        padding: 15px 30px; /* Bigger button */
        font-size: 1.2em; /* Slightly larger text */
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease, transform 0.2s ease;
      }
      .quiz-button:hover {
        background-color: #ffe082; /* Lighter golden */
        transform: scale(1.05);
      }
    </style>
  </head>
  <body>
    <!-- Swiper Container Wrapper -->
    <div class="swiper-container-wrapper">
      <!-- Swiper Slideshow -->
      <div class="swiper">
        <div class="swiper-wrapper" id="slideshow-container">
          <!-- Slides will be dynamically inserted here -->
        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
      </div>

      <!-- Navigation Buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>

    <!-- Go to Quiz Button -->
    <button
      class="quiz-button"
      onclick="window.location.href = '{{ route('quiz.mcq1') }}';"
    >
      Go to Quiz
    </button>

    <!-- Swiper.js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      // List of image filenames from the 'images' folder
      const imageFolder = "{{ asset('moduleSlides/') }}"; // Relative path to the images folder
      const imageFiles = [
        "1.jpg",
        "2.jpg",
        "3.jpg",
        "4.jpg",
        "5.jpg",
      ];

      // Dynamically load images into the slideshow
      const slideshowContainer = document.getElementById("slideshow-container");

      imageFiles.forEach((file) => {
        const slide = document.createElement("div");
        slide.className = "swiper-slide";
        slide.innerHTML = `<img src="${imageFolder}/${file}" alt="Slide Image">`;
        slideshowContainer.appendChild(slide);
      });

      // Initialize Swiper.js
      const swiper = new Swiper(".swiper", {
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
  </body>
</html>
