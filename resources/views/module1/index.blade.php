<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>module 1</title>
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
        background-color: #1e293b;
        color: #facc15;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }
      .swiper-container-wrapper {
        position: relative;
        width: 95%;
        max-width: 1600px;
        height: 800px;
        margin-bottom: 20px;
      }
      .swiper {
        width: 100%;
        height: 100%;
        background-color: #1e293b;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        border: 3px solid #facc15;
      }
      .swiper-slide {
        display: flex;
        justify-content: center;Route::get('/module1', function () {
//     return view('module1.index');
// })->name('module1.index');
        align-items: center;
        background: #1e293b;
      }
      .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
      }
      .swiper-pagination-bullet {
        background: #facc15;
      }
      .swiper-button-prev,
      .swiper-button-next {
        color: #facc15;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 60px;
        height: 60px;
        background-color: rgba(30, 41, 59, 0.7);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background-color 0.3s ease;
      }
      .swiper-button-prev:hover,
      .swiper-button-next:hover {
        background-color: #334155;
      }
      .swiper-button-prev {
        left: -80px;
      }
      .swiper-button-next {
        right: -80px;
      }
      .button-container {
        display: flex;
        gap: 20px;
        margin-top: 20px;
      }
      .quiz-button,
      .play-button {
        background-color: #facc15;
        color: #1e293b;
        border: none;
        padding: 15px 30px;
        font-size: 1.2em;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease, transform 0.2s ease;
      }
      .quiz-button:hover,
      .play-button:hover {
        background-color: #ffe082;
        transform: scale(1.05);
      }
    </style>
  </head>
  <body>
    <!-- Swiper Container Wrapper -->
    <div class="swiper-container-wrapper">
      <div class="swiper">
        <div class="swiper-wrapper" id="slideshow-container">
          <!-- Slides will be dynamically inserted here -->
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>

    <!-- Button Container -->
    <div class="button-container">
      <!-- Audio Controls -->
      <button class="play-button" id="playPauseButton">Play</button>

      <!-- Go to Quiz Button -->
      <button
        class="quiz-button"
        onclick="window.location.href = '{{ route('module1.one') }}'"
      >
        Go to Quiz
      </button>
    </div>

    <!-- Swiper.js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      // Define images and corresponding audio files
      const slides = [
        { image: "1.jpg", audio: "1.mp3" },
        { image: "2.jpg", audio: "2.mp3" },
        { image: "3.jpg", audio: "3.mp3" },
        { image: "4.jpg", audio: "4.mp3" },
        { image: "5.jpg", audio: "5.mp3" },
        { image: "6.jpg", audio: "6.mp3" },
        { image: "7.jpg", audio: "7.mp3" },
      ];

      const imageFolder = "{{ asset('module1/moduleSlides') }}";
      const audioFolder = "{{ asset('module1/moduleAudio') }}";

      const slideshowContainer = document.getElementById("slideshow-container");

      // Create an audio element
      const audioPlayer = document.createElement("audio");
      let isPlaying = false;
      document.body.appendChild(audioPlayer);

      // Play/Pause Button
      const playPauseButton = document.getElementById("playPauseButton");
      playPauseButton.addEventListener("click", () => {
        if (audioPlayer.paused) {
          audioPlayer.play();
          playPauseButton.textContent = "Pause";
        } else {
          audioPlayer.pause();
          playPauseButton.textContent = "Play";
        }
      });

      // Add slides dynamically
      slides.forEach((slide) => {
        const slideElement = document.createElement("div");
        slideElement.className = "swiper-slide";
        slideElement.innerHTML = `<img src="${imageFolder}/${slide.image}" alt="Slide Image">`;
        slideshowContainer.appendChild(slideElement);
      });

      // Initialize Swiper.js
      const swiper = new Swiper(".swiper", {
        loop: true,
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        on: {
          init: function () {
            // Fix first audio not playing
            setTimeout(() => {
              audioPlayer.src = `${audioFolder}/${slides[0].audio}`;
              audioPlayer
                .play()
                .then(() => {
                  playPauseButton.textContent = "Pause";
                })
                .catch((error) =>
                  console.error("Audio autoplay blocked:", error)
                );
            }, 100);
          },
          slideChange: function () {
            const currentSlideIndex = this.realIndex;
            audioPlayer.src = `${audioFolder}/${slides[currentSlideIndex].audio}`;
            audioPlayer.play();
            playPauseButton.textContent = "Pause";
          },
        },
      });
    </script>
  </body>
</html>
