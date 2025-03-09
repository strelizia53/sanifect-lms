<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanifect Training Modules</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
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
        .content-container {
            display: flex;
            align-items: center;
            gap: 30px;
            width: 85%;
            max-width: 1200px;
            background-color: #1e293b;
            border: 3px solid #facc15;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .media-section {
            width: 45%;
            position: relative;
        }
        .media-section img, .media-section video {
            width: 100%;
            height: auto;
            border-radius: 8px;
            display: none; /* Initially hidden */
        }
        .text-section {
            width: 55%;
            display: flex;
            flex-direction: column;
        }
        .scrollable-content {
            max-height: 250px;
            overflow-y: auto;
            background-color: #1e293b;
            border: 2px solid #facc15;
            border-radius: 5px;
            padding: 15px;
        }
        .button-container {
            margin-top: 15px;
        }
        .quiz-button, .play-button {
            background-color: #facc15;
            color: #1e293b;
            border: none;
            padding: 15px 30px;
            font-size: 1.2em;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .quiz-button:hover, .play-button:hover {
            background-color: #ffe082;
        }
    </style>
</head>
<body>

<h1 id="mainTitle">Sanifect Training Modules</h1>

<div class="content-container">
    <!-- Media Section (Image and Video) -->
    <div class="media-section">
        <img id="slideImage" src="" alt="Slide Image">
        <video id="slideVideo" autoplay loop muted>
            <source src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Text Section -->
    <div class="text-section">
        <h2 id="slideTitle">Module Title</h2>
        <div class="scrollable-content" id="slideDescription">
            <!-- Slide content will be dynamically inserted here -->
        </div>
        <!-- Buttons -->
        <div class="button-container">
            <button class="play-button" id="playPauseButton">Play</button>
            <button class="quiz-button" onclick="window.location.href = '{{ route('coreone.one') }}'">
                Go to Quiz
            </button>
        </div>
    </div>
</div>

<script>
const slides = [
    { 
        media: "1.mp4",
        type: "video",
        audio: "1.mp3", 
        title: "Module Preamble", 
        description: `<p>In the hospitality and food service industries—including hotels, restaurants, cafés, bars, and catering operations—large numbers of guests and staff interact daily, often in close proximity. This creates numerous opportunities for pathogens to spread if proper precautions are not taken. Surfaces are touched by multiple individuals, food is prepared and served under strict time pressures, and shared spaces require continual upkeep to maintain hygiene. By applying robust infection control practices in these settings, businesses can prevent outbreaks of illnesses such as norovirus, salmonella, and other foodborne or communicable diseases.</p>
        <p><strong>Pathogens are microorganisms that cause disease</strong>, including <strong>bacteria, viruses, fungi, and parasites</strong>. They can survive on surfaces, in the air, in water, and within the human body, making infection control essential in preventing their spread.</p>
        <ul>
            <li><strong>Bacteria</strong> – Single-celled organisms that can multiply rapidly. Some are harmful (e.g., Salmonella, E. coli), while others are beneficial (Lactobacillus in the gut).</li>
            <li><strong>Viruses</strong> – Smaller than bacteria, viruses require a <strong>host</strong> to replicate. Examples include <strong>influenza, norovirus, and COVID-19</strong>.</li>
            <li><strong>Fungi</strong> – Organisms like mould and yeast that can cause infections such as <strong>athlete’s foot</strong> or <strong>candidiasis</strong>.</li>
            <li><strong>Parasites</strong> – Organisms that live on or inside a host, such as <strong>lice, tapeworms, or malaria-causing protozoa</strong>.</li>
        </ul>`
    },
    {
        media: "2.jpg",
        type: "image",
        audio: "2.mp3",
        title: "Understanding Pathogens (Bacteria, Viruses, Fungi, Parasites)",
        description: `<p><strong>Preamble:</strong></p> 
            <p>Pathogens are <strong>microorganisms that cause disease</strong>, including 
            <strong>bacteria, viruses, fungi, and parasites</strong>. They can survive on surfaces, 
            in the air, in water, and within the human body, making infection control essential in preventing their spread.</p>
            <ul>
                <li><strong>Bacteria</strong> – Single-celled organisms that can multiply rapidly. Some are harmful (e.g., 
                Salmonella, E. coli), while others are beneficial (Lactobacillus in the gut).</li>
                <li><strong>Viruses</strong> – Smaller than bacteria, viruses require a <strong>host</strong> to replicate. 
                Examples include <strong>influenza, norovirus, and COVID-19</strong>.</li>
                <li><strong>Fungi</strong> – Organisms like mould and yeast that can cause infections such as 
                <strong>athlete’s foot</strong> or <strong>candidiasis</strong>.</li>
                <li><strong>Parasites</strong> – Organisms that live on or inside a host, such as 
                <strong>lice, tapeworms, or malaria-causing protozoa</strong>.</li>
            </ul>`
    },
    {
        media: "3.jpg",
        type: "image",
        audio: "3.mp3",
        title: "Modes of Transmission (Contact, Droplet, Airborne, Vector-Borne)",
        description: `<p><strong>Preamble:</strong></p>
            <p>Pathogens <strong>spread in different ways</strong>, requiring 
            <strong>targeted infection control strategies</strong> to minimize risk.</p>
            <ul>
                <li><strong>Contact Transmission</strong> – Occurs through direct contact 
                (e.g., touching an infected person) or indirect contact (e.g., touching contaminated surfaces).</li>
                <li><strong>Droplet Transmission</strong> – This happens when 
                <strong>infected respiratory droplets</strong> (from coughing, sneezing, talking) 
                spread short distances (1–2 meters).</li>
                <li><strong>Airborne Transmission</strong> – Some pathogens remain 
                <strong>suspended in the air</strong> for longer periods, such as 
                <strong>measles, tuberculosis, and COVID-19</strong>.</li>
                <li><strong>Vector-Borne Transmission</strong> – Spread through 
                <strong>insects and animals</strong>, such as <strong>malaria (mosquitoes)</strong> and 
                <strong>Lyme disease (ticks)</strong>.</li>
            </ul>`
    },
    {
        media: "4.jpg",
        type: "image",
        audio: "4.mp3",
        title: "Cleaning vs. Disinfecting – Why Both Are Essential",
        description: `<p><strong>Preamble:</strong></p>
            <p>Cleaning and disinfecting are <strong>two separate but complementary steps</strong> in infection control:</p>
            <ul>
                <li><strong>Cleaning</strong> – Physically removes <strong>dirt, grease, and organic matter</strong> (e.g., blood, food residue) using soap/detergent and water.</li>
                <li><strong>Disinfecting</strong> – Kills or inactivates <strong>pathogens</strong> using <strong>chemicals like alcohol, bleach, or hydrogen peroxide</strong>.</li>
            </ul>
            <p>Cleaning should <strong>always precede disinfection</strong>, as disinfectants <strong>may not work effectively</strong> on dirty surfaces. High-risk areas require a <strong>two-step process</strong> to ensure thorough sanitation.</p>`
    },
    {
        media: "5.jpg",
        type: "image",
        audio: "5.mp3",
        title: "Selecting the Right Disinfectant (Types, Efficacy, and Safety)",
        description: `<p><strong>Preamble:</strong></p>
            <p>Not all disinfectants work equally well against <strong>different types of pathogens</strong>. Choosing the <strong>correct disinfectant</strong> is essential for <strong>effective infection control</strong>.</p>
            <ul>
                <li><strong>Alcohol-based disinfectants</strong> – Effective against <strong>enveloped viruses (e.g., flu, COVID-19)</strong> but evaporate quickly.</li>
                <li><strong>Chlorine-based disinfectants (bleach)</strong> – Effective against <strong>bacteria, viruses, and spores</strong> but requires proper dilution.</li>
                <li><strong>Quaternary Ammonium Compounds (Quats)</strong> – Used in <strong>healthcare and hospitality</strong> but may contribute to resistance if overused.</li>
                <li><strong>Hydrogen Peroxide Disinfectants</strong> – Strong oxidizing agents effective against a broad range of microorganisms.</li>
            </ul>
            <p>The proper disinfectant should be chosen based on the following:</p>
            <ul>
                <li><strong>Pathogen type</strong> (e.g., spores require stronger disinfectants)</li>
                <li><strong>Surface material</strong> (some disinfectants damage electronics or fabrics)</li>
                <li><strong>Contact time</strong> (how long the disinfectant must stay wet on the surface)</li>
            </ul>`
    },
    {
        media: "6.jpg",
        type: "image",
        audio: "6.mp3",
        title: "Cleaning & Disinfection of High-Touch Surfaces",
        description: `<p><strong>Preamble:</strong></p>
            <p>High-touch surfaces in hospitality settings—such as guest room doorknobs, front desk counters, dining tables, chair armrests, and elevator buttons—require frequent cleaning and disinfection. With constant turnover of guests and staff, these surfaces can become reservoirs for bacteria, viruses, and other pathogens.</p>
            <p>A rigorous cleaning and disinfection schedule:</p>
            <ul>
                <li>Minimizes the spread of illnesses like colds, flu, and COVID-19</li>
                <li>Protects both customers and employees from potential infections</li>
                <li>Upholds a professional image and meets regulatory standards</li>
            </ul>
            <p>In fast-paced environments, <strong>choosing disinfectants with shorter required contact times</strong> can help staff maintain cleanliness without excessively interrupting service. However, <strong>pre-cleaning</strong> to remove visible dirt and organic matter is essential before applying disinfectants to ensure they work effectively.</p>`
    },
    {
        media: "module7.jpg",
        type: "image",
        audio: "7.mp3",
        title: "Food Safety & Hygiene",
        description: `<p><strong>Preamble:</strong></p>
        <p>Food safety is at the heart of any hospitality operation. Restaurants, hotel kitchens, buffets, and catered events must follow strict protocols to ensure that food does not become a vehicle for harmful microbes like salmonella, E. coli, and norovirus.</p>
        <p>Key practices include:</p>
        <ul>
            <li><strong>Preventing cross-contamination:</strong> Keeping raw and cooked foods separate, using dedicated utensils and cutting boards.</li>
            <li><strong>Maintaining proper temperatures:</strong> Storing perishable items in refrigerators or freezers, cooking foods to recommended internal temperatures.</li>
            <li><strong>Enforcing staff hygiene:</strong> Frequent and proper handwashing, wearing hairnets or caps, and avoiding work while symptomatic.</li>
            <li><strong>Regular monitoring and documentation:</strong> Checking fridge/freezer temperatures, training employees, and maintaining cleaning logs.</li>
        </ul>
        <p>By diligently following these food safety measures, hospitality venues protect their guests from <strong>foodborne</strong> illnesses and safeguard their reputations.</p>`
    },
    {
        media: "module8.jpg",
        type: "image",
        audio: "8.mp3",
        title: "Disinfectants Approved for Food Contact Surfaces",
        description: `<p><strong>Preamble:</strong></p>
        <p>Not all disinfectants are suitable for surfaces that come into direct contact with food, such as <strong>countertops</strong>, cutting boards, and serving utensils. <strong>Food-safe disinfectants</strong> must meet specific regulatory standards to ensure they do not leave harmful residues or alter the taste and safety of food.</p>
        <p>Common considerations include:</p>
        <ul>
            <li><strong>Non-toxicity:</strong> Products should be formulated to minimize risks if they come into indirect contact with food.</li>
            <li><strong>Fast-acting with suitable contact times:</strong> Many food service environments operate quickly and need disinfectants that work effectively within short windows.</li>
            <li><strong>Clear labelling and usage instructions:</strong> Ensuring that staff know how to dilute, apply, and rinse (if required) these products.</li>
        </ul>
        <p>Selecting the wrong disinfectant can pose health risks and lead to non-compliance with local or international food safety regulations.</p>`
    },
    {
        media: "module9.jpg",
        type: "image",
        audio: "9.mp3",
        title: "Managing Outbreaks in Hospitality (Norovirus, Foodborne Illnesses)",
        description: `<p><strong>Preamble:</strong></p>
        <p>Outbreaks in hospitality settings can be devastating, leading to:</p>
        <ul>
            <li><strong>Temporary or prolonged closures</strong></li>
            <li><strong>Damage to reputation and loss of customers</strong></li>
            <li><strong>Financial losses</strong> due to cancellations, refunds, and potential legal claims</li>
        </ul>
        <p>Common culprits include norovirus, which is extremely contagious and known for rapid person-to-person spread, and various <strong>foodborne</strong> pathogens (e.g., salmonella, <strong>campylobacter</strong>).</p>
        <p>Effective outbreak management involves:</p>
        <ol>
            <li><strong>Immediate isolation of symptomatic individuals</strong> (guests or staff).</li>
            <li><strong>Enhanced cleaning and disinfection</strong> protocols, particularly in restrooms and dining areas.</li>
            <li><strong>Transparent communication</strong> with local health authorities and patrons.</li>
            <li><strong>Reviewing and adjusting food handling procedures</strong> to pinpoint and eliminate the source of contamination.</li>
        </ol>`
    },
    {
        image: "module10.jpg",
        type: "image",
        audio: "10.mp3",
        title: "Linen & Laundry Hygiene",
        description: `<p><strong>Preamble:</strong></p>
            <p>Linens in hospitality—such as bedding, towels, tablecloths, and staff uniforms—are frequently exposed to moisture and organic matter, creating an ideal environment for microbial growth. Ensuring proper <strong>laundry hygiene</strong>:</p>
            <ul>
                <li><strong>Reduces cross-contamination</strong> when soiled linens and clean linens are stored or washed together.</li>
                <li><strong>Prevents odours and visible stains</strong> that can deter guests.</li>
                <li><strong>Lowers pathogen survival rates</strong> by using recommended wash temperatures (often above 60°C/140°F) and detergents or disinfectants appropriate for fabrics.</li>
            </ul>
            <p>Clean, well-maintained linens not only enhance guest comfort but also uphold safety standards in <strong>hotels, spas, and dining areas</strong>.</p>`
    },
    {
        media: "module11.jpg",
        type: "image",
        audio: "11.mp3",
        title: "Restroom Sanitation and Best Practices",
        description: `<p><strong>Preamble:</strong></p>
            <p>Restrooms are high-traffic areas where pathogens can easily spread, especially in shared facilities within hotels, restaurants, and event venues. <strong>Proper restroom sanitation</strong>:</p>
            <ul>
                <li><strong>Focuses on high-touch areas:</strong> <em>faucet</em> handles, flush levers, door handles, and <em>countertops</em>.</li>
                <li><strong>Requires frequent checks and thorough cleaning schedules</strong> to maintain consistent hygiene.</li>
                <li><strong>Involves regular replenishment</strong> of soap, paper towels, and toilet paper to encourage good hygiene practices.</li>
                <li><strong>Ensures appropriate ventilation</strong>, reducing moisture <em>buildup</em> that can promote microbial growth.</li>
            </ul>
            <p>By implementing <strong>detailed cleaning checklists</strong>, staff can systematically address each area to minimize the risk of contamination and enhance guest satisfaction.</p>`
    }
];
let currentIndex = 0;
const audioPlayer = new Audio();
const videoElement = document.getElementById("slideVideo");
const imageElement = document.getElementById("slideImage");

function updateSlideContent(index) {
    const slide = slides[index];

    // Hide both elements initially
    imageElement.style.display = "none";
    videoElement.style.display = "none";

    if (slide.type === "video") {
        // Show video and update source
        videoElement.style.display = "block";
        videoElement.innerHTML = `<source src="{{ asset('coreone/moduleSlides') }}/${slide.media}" type="video/mp4">`;
        videoElement.load();
        videoElement.play();
    } else if (slide.type === "image") {
        // Show image and update source
        imageElement.style.display = "block";
        imageElement.src = `{{ asset('coreone/moduleSlides') }}/${slide.media}`;
    }

    // Update Text
    document.getElementById("slideTitle").innerHTML = slide.title;
    document.getElementById("slideDescription").innerHTML = slide.description;

    // Play audio
    audioPlayer.src = `{{ asset('coreone/moduleAudio') }}/${slide.audio}`;
    audioPlayer.play();
    document.getElementById("playPauseButton").textContent = "Pause";

    // When audio ends, move to the next slide
    audioPlayer.onended = function () {
        if (currentIndex < slides.length - 1) {
            currentIndex++;
            updateSlideContent(currentIndex);
        } else {
            document.getElementById("playPauseButton").textContent = "Replay";
        }
    };
}

document.getElementById("playPauseButton").addEventListener("click", function () {
    if (audioPlayer.paused) {
        audioPlayer.play();
        videoElement.play();
        this.textContent = "Pause";
    } else {
        audioPlayer.pause();
        videoElement.pause();
        this.textContent = "Play";
    }
});

// Start from the first slide
updateSlideContent(0);
</script>

</body>
</html>
