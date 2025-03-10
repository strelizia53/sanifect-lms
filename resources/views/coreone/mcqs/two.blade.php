<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css') <!-- Ensure Tailwind CSS is loaded -->
    <title>Question 2</title>
    <style>
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          background-color: #0f172a;
          color: #f8fafc;
        }
  
        .container {
          text-align: center;
          width: 90%;
          max-width: 800px;
          background-color: #1e293b;
          border-radius: 12px;
          padding: 30px;
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
          border: 2px solid #facc15;
  
          /* Centering */
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
        }
  
        .question {
          font-size: 1.5em;
          margin-bottom: 25px;
          color: #facc15;
        }
  
        .btn {
          display: block;
          width: 100%;
          max-width: 600px;
          margin: 10px auto;
          padding: 12px 20px;
          font-size: 1.1em;
          background-color: #334155;
          color: #facc15;
          border: none;
          border-radius: 8px;
          cursor: pointer;
          transition: all 0.3s ease;
          text-align: center;
          text-transform: uppercase;
        }
  
        .btn:hover {
          background-color: #475569;
          transform: scale(1.05);
        }
  
        .btn:active {
          transform: scale(0.98);
        }
  
        #feedback {
          margin-top: 20px;
          font-size: 1.2em;
          font-weight: bold;
          color: #f87171;
        }
  
        /* Back to Slideshow Button */
        .back-btn {
          margin-top: 20px;
          background-color: #facc15;
          color: #1e293b;
          font-weight: bold;
        }
  
        .back-btn:hover {
          background-color: #ffdb4d;
          transform: scale(1.05);
        }
      </style>
  </head>
<body>

    <!-- Navbar -->
    <nav class="bg-yellow-500 shadow-lg w-full fixed top-0 z-50">
        <div class="max-w-full px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10">
                </a>
            </div>

            <!-- User Auth Section -->
            <div class="flex items-center space-x-4">
                @auth
                    <div class="relative">
                        <button id="dropdownButton" class="text-gray-900 font-medium flex items-center space-x-2">
                            <span>Welcome, {{ auth()->user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5"
                                viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5z"/>
                            </svg>
                        </button>

                        <div id="dropdownMenu"
                            class="absolute right-0 mt-2 bg-white rounded-lg shadow-lg w-48 hidden z-10">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-900 hover:bg-yellow-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-gray-900 hover:bg-yellow-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-900 hover:text-white font-semibold">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-900 hover:text-white font-semibold">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Quiz Container -->
    <div class="container">
        <p class="question">What is an example of airborne transmission?</p>
        <div id="answers">
            <button class="btn" onclick="validateMCQ(this, 'incorrect')">
                A) Shaking hands with an infected person
            </button>
            <button class="btn" onclick="validateMCQ(this, 'correct')">
                B) Inhaling infectious particles suspended in the air
            </button>
            <button class="btn" onclick="validateMCQ(this, 'incorrect')">
                C) Touching a contaminated surface
            </button>
            <button class="btn" onclick="validateMCQ(this, 'incorrect')">
                D) Being bitten by an insect
            </button>
            <button class="btn" onclick="validateMCQ(this, 'incorrect')">
                E) Pathogens spreading only through food contamination
            </button>
            <button class="btn" onclick="validateMCQ(this, 'incorrect')">
                F) Washing hands eliminates the need for airborne precautions
            </button>
        </div>
        <p id="feedback"></p>

        <!-- Back to Slideshow Button -->
        <button class="btn back-btn" onclick="window.location.href='{{ route('coreone.slideshow') }}'">
            ⬅ Back to Slideshow
        </button>
    </div>

    <script>
        function validateMCQ(button, correctness) {
            const feedback = document.getElementById("feedback");

            if (correctness === "correct") {
                feedback.textContent = "Correct! Moving to the next question...";
                feedback.style.color = "#4caf50"; // Green for correct
                setTimeout(() => {
                    window.location.href = "{{ route('coreone.three') }}"; // Redirect to Question 3
                }, 2000);
            } else {
                feedback.textContent = "Incorrect. Try again!";
                feedback.style.color = "#f87171"; // Red for incorrect
            }
        }

        function shuffleAnswers() {
            const answersDiv = document.getElementById("answers");
            const buttons = Array.from(answersDiv.children);

            // Shuffle using Fisher-Yates Algorithm
            for (let i = buttons.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [buttons[i], buttons[j]] = [buttons[j], buttons[i]];
            }

            // Clear the existing order and append shuffled buttons
            answersDiv.innerHTML = "";
            buttons.forEach((button) => answersDiv.appendChild(button));
        }

        window.onload = shuffleAnswers;

        // Navbar Dropdown
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton?.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
