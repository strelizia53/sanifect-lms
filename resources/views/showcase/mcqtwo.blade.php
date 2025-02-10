<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Question 2</title>
    <style>
      /* Same styling as before */
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
        display: inline-block;
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
        For how long do we leave Nanocyn untouched on a surface after misting
        with a handheld sprayer?
      </p>
      <div>
        <button class="btn" onclick="validateMCQ(this, 'correct')">
          30 seconds
        </button>
        <button class="btn" onclick="validateMCQ(this, 'incorrect')">
          50 seconds
        </button>
        <button class="btn" onclick="validateMCQ(this, 'incorrect')">
          1 minute
        </button>
        <button class="btn" onclick="validateMCQ(this, 'incorrect')">
          5 minutes
        </button>
      </div>
      <p id="feedback"></p>
    </div>

    <script>
      function validateMCQ(button, correctness) {
        const feedback = button.parentNode.nextElementSibling;

        if (correctness === "correct") {
          feedback.textContent = "Correct! Moving to the next question...";
          feedback.style.color = "#4caf50"; // Green for correct
          setTimeout(() => {
            window.location.href = "{{ route('quiz.mcq3') }}"; // Redirect to Question 3
          }, 2000);
        } else {
          feedback.textContent = "Incorrect. Try again!";
          feedback.style.color = "#f87171"; // Red for incorrect
        }
      }
    </script>
  </body>
</html>
