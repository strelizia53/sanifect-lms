<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanifect Training Modules</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
            width: 85%;
            max-width: 1200px;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .slide-content {
            display: flex;
            align-items: center;
            gap: 30px;
            width: 100%;
            padding: 20px;
            background-color: #1e293b;
            border: 3px solid #facc15;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .slide-image {
            width: 50%;
            height: 100%;
            padding: 10px;
            border-radius: 8px;
            background-color: #1e293b;
        }
        .slide-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }
        .slide-text {
            width: 50%;
            text-align: left;
            padding: 10px;
            border-radius: 8px;
            background-color: #1e293b;
        }
        .slide-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }
        .slide-description {
            font-size: 1.2rem;
            line-height: 1.6;
            text-align: left;
        }
        .button-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .quiz-button,
        .play-button,
        .prev-button,
        .next-button {
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
        .play-button:hover,
        .prev-button:hover,
        .next-button:hover {
            background-color: #ffe082;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1 class="slide-title" id="mainTitle">Module 2: Infection Control in Hospitality & Food Service
    </h1>

    <div class="swiper-container-wrapper">
        <div class="slide-content">
            <!-- Image Section -->
            <div class="slide-image">
                <img id="slideImage" src="{{ asset('coreone/moduleSlides/1.jpg') }}" alt="Slide Image">
            </div>

            <!-- Text Section -->
            <div class="slide-text">
                <h2 id="slideTitle">Module Preamble</h2>
                <p id="slideDescription">
                    In the hospitality and food service industries—including hotels, restaurants, cafés, bars, and catering operations - large numbers of guests and staff interact daily, often in close proximity. This creates numerous opportunities for pathogens to spread if proper precautions are not taken. Surfaces are touched by multiple individuals, food is prepared and served under strict time pressures, and shared spaces require continual upkeep to maintain hygiene. By applying robust infection control practices in these settings, businesses can prevent outbreaks of illnesses such as norovirus, salmonella, and other foodborne or communicable diseases.

                </p>
            </div>
        </div>
    </div>

    <!-- Button Container -->
    <div class="button-container">
        <button class="prev-button" id="prevButton">Previous</button>
        <button class="play-button" id="playPauseButton">Play</button>
        <button class="next-button" id="nextButton">Next</button>
    </div>

    <div class="button-container">
        <button class="quiz-button" onclick="window.location.href = '{{ route('coreone.one') }}'">
            Go to Quiz
        </button>
    </div>

    <script>
        const slides = [
            { image: "1.jpg", audio: "1.mp3", title: "Module Preamble", 
              description: "In the hospitality and food service industries—including hotels, restaurants, cafés, bars, and catering operations - large numbers of guests and staff interact daily, often in close proximity. This creates numerous opportunities for pathogens to spread if proper precautions are not taken. Surfaces are touched by multiple individuals, food is prepared and served under strict time pressures, and shared spaces require continual upkeep to maintain hygiene. By applying robust infection control practices in these settings, businesses can prevent outbreaks of illnesses such as norovirus, salmonella, and other foodborne or communicable diseases" },

            { image: "2.jpg", audio: "2.mp3", title: "Understanding Pathogens (Bacteria, Viruses, Fungi, Parasites)", 
              description: "Pathogens are microorganisms that cause disease, including bacteria, viruses, fungi, and parasites. They can survive on surfaces, in the air, in water, and within the human body, making infection control essential in preventing their spread" },

            { image: "3.jpg", audio: "3.mp3", title: "Modes of Transmission (Contact, Droplet, Airborne, Vector-Borne)", 
              description: "Pathogens spread in different ways, requiring targeted infection control strategies to minimize risk" },

            { image: "4.jpg", audio: "4.mp3", title: "Cleaning vs. Disinfecting. Why Both Are Essential", 
              description: "Cleaning and disinfecting are two separate but complementary steps in infection control. 	Cleaning – Physically removes dirt, grease, and organic matter (e.g., blood, food residue) using soap/detergent and water. 	Disinfecting – Kills or inactivates pathogens using chemicals like alcohol, bleach, or hydrogen peroxide" },

            { image: "5.jpg", audio: "5.mp3", title: "Selecting the Right Disinfectant (Types, Efficacy, and Safety)", 
              description: "Not all disinfectants work equally well against different types of pathogens. Choosing the correct disinfectant is essential for effective infection control" },

            { image: "6.jpg", audio: "6.mp3", title: "Cleaning & Disinfection of High-Touch Surfaces", 
              description: "High-touch surfaces in hospitality settings—such as guest room doorknobs, front desk counters, dining tables, chair armrests, and elevator buttons—require frequent cleaning and disinfection. With constant turnover of guests and staff, these surfaces can become reservoirs for bacteria, viruses, and other pathogens. A rigorous cleaning and disinfection schedule" },

            { image: "7.jpg", audio: "7.mp3", title: "Food Safety & Hygiene", 
              description: "Food safety is at the heart of any hospitality operation. Restaurants, hotel kitchens, buffets, and catered events must follow strict protocols to ensure that food does not become a vehicle for harmful microbes like salmonella, E. coli, and norovirus. Key practices include. 	Preventing cross-contamination: Keeping raw and cooked foods separate, using dedicated utensils and cutting boards. 	Maintaining proper temperatures: Storing perishable items in refrigerators or freezers, cooking foods to recommended internal temperatures" },

            { image: "8.jpg", audio: "8.mp3", title: "Disinfectants Approved for Food Contact Surfaces", 
              description: "Not all disinfectants are suitable for surfaces that come into direct contact with food, such as countertops, cutting boards, and serving utensils. Food-safe disinfectants must meet specific regulatory standards to ensure they do not leave harmful residues or alter the taste and safety of food." },

            { image: "9.jpg", audio: "9.mp3", title: "Managing Outbreaks in Hospitality (Norovirus, Foodborne Illnesses)", 
              description: "Outbreaks in hospitality settings can be devastating, leading to. Temporary or prolonged closures. 	Damage to reputation and loss of customers. Financial losses due to cancellations, refunds, and potential legal claims" },

            { image: "10.jpg", audio: "10.mp3", title: "Linen & Laundry Hygiene", 
              description: "Linens in hospitality—such as bedding, towels, tablecloths, and staff uniforms—are frequently exposed to moisture and organic matter, creating an ideal environment for microbial growth. Ensuring proper laundry hygiene" },

            { image: "11.jpg", audio: "11.mp3", title: "Restroom Sanitation and Best Practices", 
            description: "Restrooms are high-traffic areas where pathogens can easily spread, especially in shared facilities within hotels, restaurants, and event venues. Proper restroom sanitation" }
        ];

        let currentIndex = 0;
        const audioPlayer = new Audio();

        function updateSlideContent(index) {
            document.getElementById("slideImage").src = `{{ asset('coreone/moduleSlides') }}/${slides[index].image}`;
            document.getElementById("slideTitle").textContent = slides[index].title;
            document.getElementById("slideDescription").textContent = slides[index].description;

            audioPlayer.src = `{{ asset('coreone/moduleAudio') }}/${slides[index].audio}`;
            audioPlayer.play();
            document.getElementById("playPauseButton").textContent = "Pause";
        }

        document.getElementById("playPauseButton").addEventListener("click", function () {
            if (audioPlayer.paused) {
                audioPlayer.play();
                this.textContent = "Pause";
            } else {
                audioPlayer.pause();
                this.textContent = "Play";
            }
        });

        document.getElementById("prevButton").addEventListener("click", function () {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlideContent(currentIndex);
            }
        });

        document.getElementById("nextButton").addEventListener("click", function () {
            if (currentIndex < slides.length - 1) {
                currentIndex++;
                updateSlideContent(currentIndex);
            }
        });

        updateSlideContent(0);
    </script>
</body>
</html>
