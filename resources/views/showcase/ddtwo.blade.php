<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fill in the Blanks</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #0f172a;
        color: #f8fafc;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }

      .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #1e293b;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        border: 2px solid #facc15;
      }

      h1 {
        text-align: center;
        color: #fde047;
        font-size: 1.8em;
        margin-bottom: 20px;
      }

      .blanks-container {
        margin: 20px 0;
      }

      .blank {
        border-bottom: 2px solid #facc15;
        padding: 5px 10px;
        margin: 0 5px;
        font-size: 1em;
        color: #f8fafc;
      }

      .word {
        background-color: #fde047;
        color: #1e293b;
        padding: 5px 10px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: bold;
        display: inline-block;
        margin: 5px;
      }

      .result {
        text-align: center;
        margin-top: 20px;
      }

      .result button {
        background-color: #fde047;
        color: #1e293b;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: bold;
        cursor: pointer;
      }

      .result button:hover {
        background-color: #fbbf24;
        transform: scale(1.05);
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Drag the Words to Fill the Blanks</h1>
      <div class="blanks-container">
        <p>
          Chux wipes should no longer be used when cleaning because they do not
          hold food particles as well as <span class="blank"></span> do.
        </p>
        <p>
          Chux wipe fibres do not rejuvenate after washing and so cannot be
          satisfactorily <span class="blank"></span>.
        </p>
        <p>
          They are often disposed of inappropriately and end up clogging
          <span class="blank"></span> in our city.
        </p>
      </div>
      <div class="words-container">
        <span class="word" draggable="true">micro fibre cloths</span>
        <span class="word" draggable="true">re-used</span>
        <span class="word" draggable="true">waterways</span>
      </div>
      <div class="result">
        <button onclick="checkBlanks()">Submit</button>
        <p id="feedback"></p>
      </div>
    </div>

    <script>
      const blanks = document.querySelectorAll(".blank");
      const words = document.querySelectorAll(".word");
      let draggedWord;

      words.forEach((word) => {
        word.addEventListener("dragstart", () => {
          draggedWord = word;
        });
      });

      blanks.forEach((blank) => {
        blank.addEventListener("dragover", (e) => e.preventDefault());
        blank.addEventListener("drop", () => {
          blank.textContent = draggedWord.textContent;
        });
      });

      function checkBlanks() {
        const feedback = document.getElementById("feedback");
        const correctAnswers = ["micro fibre cloths", "re-used", "waterways"];
        const userAnswers = Array.from(blanks).map(
          (blank) => blank.textContent
        );

        if (JSON.stringify(correctAnswers) === JSON.stringify(userAnswers)) {
          feedback.textContent = "Correct! Well done!";
          feedback.style.color = "#4caf50";
          setTimeout(() => {
            window.location.href = "{{ route('showcase.thankyou') }}"; // Redirect to ddtwo.html
          }, 2000);
        } else {
          feedback.textContent = "Incorrect. Please try again!";
          feedback.style.color = "#f87171";
        }
      }
    </script>
  </body>
</html>
