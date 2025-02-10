<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Question 4</title>
    <style>
      /* Global Styles */
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #0f172a; /* Darker background for better contrast */
        color: #f8fafc; /* Lighter text color */
      }

      /* Container */
      .container {
        text-align: center;
        max-width: 600px;
        background-color: #1e293b; /* Dark card background */
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Softer shadow */
        border: 2px solid #facc15; /* Golden border */
      }

      /* Question */
      .question {
        font-size: 1.8em;
        margin-bottom: 25px;
        color: #facc15; /* Golden question text */
      }

      /* Buttons */
      .btn {
        display: inline-block;
        width: 100%;
        max-width: 400px;
        margin: 10px auto; /* Spaced out buttons */
        padding: 12px 20px;
        font-size: 1.1em;
        background-color: #334155; /* Muted dark button background */
        color: #facc15; /* Golden button text */
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease; /* Smooth transition for hover effects */
        text-align: center;
        text-transform: uppercase; /* Capitalized button text */
      }

      .btn:hover {
        background-color: #475569; /* Brighter dark on hover */
        transform: scale(1.05); /* Slight scale effect on hover */
      }

      .btn:active {
        transform: scale(0.98); /* Slight shrink effect on click */
      }

      /* Feedback */
      #feedback {
        margin-top: 20px;
        font-size: 1.2em;
        font-weight: bold;
        color: #f87171; /* Initial feedback text color (red) */
      }

      /* Responsive Design */
      @media (max-width: 768px) {
        .container {
          padding: 20px;
        }

        .question {
          font-size: 1.5em;
        }

        .btn {
          font-size: 1em;
          padding: 10px 15px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <p class="question">
        For how long should I hold my breath when misting with Nanocyn?
      </p>
      <div>
        <button class="btn" onclick="validateMCQ(this, 'correct')">
          No breath holding, as Nanocyn is not harmful to humans
        </button>
        <button class="btn" onclick="validateMCQ(this, 'incorrect')">
          1 minute
        </button>
        <button class="btn" onclick="validateMCQ(this, 'incorrect')">
          20 seconds
        </button>
        <button class="btn" onclick="validateMCQ(this, 'incorrect')">
          10 seconds
        </button>
      </div>
      <p id="feedback"></p>
    </div>

    <script>
      function validateMCQ(button, correctness) {
        const feedback = button.parentNode.nextElementSibling;

        if (correctness === "correct") {
          feedback.textContent = "Correct! Great job!";
          feedback.style.color = "#4caf50"; // Green for correct
          setTimeout(() => {
            window.location.href = "{{ route('quiz.ddone') }}";
          }, 2000); // Redirect after 2 seconds
        } else {
          feedback.textContent = "Incorrect. Try again!";
          feedback.style.color = "#f87171"; // Red for incorrect
        }
      }
    </script>
  </body>
</html>
