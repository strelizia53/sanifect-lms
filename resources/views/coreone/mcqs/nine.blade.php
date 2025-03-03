<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Question 9</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #0f172a;
            color: #f8fafc;
        }

        .container {
            text-align: center;
            max-width: 600px;
            background-color: #1e293b;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            border: 2px solid #facc15;
        }

        .question {
            font-size: 1.8em;
            margin-bottom: 25px;
            color: #facc15;
        }

        .btn {
            display: block;
            width: 100%;
            max-width: 400px;
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
    </style>
</head>
<body>
    <div class="container">
        <p class="question">
            Which measure helps maintain proper linen hygiene in hospitality settings?
        </p>
        <div id="answers">
            <button class="btn" onclick="validateMCQ(this, 'incorrect')">
                Mixing soiled and clean linens in the same cart to reduce trips
            </button>
            <button class="btn" onclick="validateMCQ(this, 'incorrect')">
                Storing used towels for several days before washing
            </button>
            <button class="btn" onclick="validateMCQ(this, 'incorrect')">
                Washing linens at low temperatures to save energy
            </button>
            <button class="btn" onclick="validateMCQ(this, 'correct')">
                Using recommended high-temperature wash cycles and appropriate detergents/disinfectants
            </button>
            <button class="btn" onclick="validateMCQ(this, 'incorrect')">
                Only washing linens if they have visible stains
            </button>
            <button class="btn" onclick="validateMCQ(this, 'incorrect')">
                Reusing towels from one guest to another without laundering
            </button>
        </div>
        <p id="feedback"></p>
    </div>

    <script>
        function validateMCQ(button, correctness) {
            const feedback = document.getElementById("feedback");

            if (correctness === "correct") {
                feedback.textContent = "Correct! Moving to the next question...";
                feedback.style.color = "#4caf50"; // Green for correct
                setTimeout(() => {
                    window.location.href = "{{ route('coreone.ten') }}"; // Redirect to Question 10
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
    </script>
</body>
</html>
