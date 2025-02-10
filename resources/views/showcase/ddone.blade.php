<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nanocyn Cleaning Order</title>
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
        color: #fde047;
        font-size: 1.8em;
        text-align: center;
      }

      .draggable-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin: 20px 0;
      }

      .draggable-item {
        background-color: #facc15;
        color: #1e293b;
        padding: 10px 15px;
        border-radius: 8px;
        font-weight: bold;
        cursor: grab;
        border: 2px solid #1e293b;
      }

      .draggable-item.dragging {
        opacity: 0.5;
        cursor: grabbing;
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
        transition: all 0.3s ease;
      }

      .result button:hover {
        background-color: #fbbf24;
        transform: scale(1.05);
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Arrange the Correct Nanocyn Cleaning Order</h1>
      <div id="draggable-container" class="draggable-container">
        <div class="draggable-item" draggable="true">
          1. Remove all items from the table or bar
        </div>
        <div class="draggable-item" draggable="true">
          2. Clean off all food chunks, chewing gum, and fingerprints
        </div>
        <div class="draggable-item" draggable="true">
          3. Thoroughly clean the surface with a microfiber cloth
        </div>
        <div class="draggable-item" draggable="true">
          4. Spray Nanocyn HOCL in a fine mist over the clean surface
        </div>
        <div class="draggable-item" draggable="true">
          5. Do not touch anything for 30 seconds to allow Nanocyn to work
        </div>
      </div>
      <div class="result">
        <button onclick="checkOrder()">Submit</button>
        <p id="feedback"></p>
      </div>
    </div>

    <script>
      const items = document.querySelectorAll(".draggable-item");
      const container = document.getElementById("draggable-container");
      const correctOrder = [
        "1. Remove all items from the table or bar",
        "2. Clean off all food chunks, chewing gum, and fingerprints",
        "3. Thoroughly clean the surface with a microfiber cloth",
        "4. Spray Nanocyn HOCL in a fine mist over the clean surface",
        "5. Do not touch anything for 30 seconds to allow Nanocyn to work",
      ];

      let draggedItem;

      items.forEach((item) => {
        item.addEventListener("dragstart", () => {
          draggedItem = item;
          item.classList.add("dragging");
        });

        item.addEventListener("dragend", () => {
          draggedItem = null;
          item.classList.remove("dragging");
        });
      });

      container.addEventListener("dragover", (e) => {
        e.preventDefault();
        const afterElement = getDragAfterElement(container, e.clientY);
        if (afterElement == null) {
          container.appendChild(draggedItem);
        } else {
          container.insertBefore(draggedItem, afterElement);
        }
      });

      function getDragAfterElement(container, y) {
        const draggableElements = [
          ...container.querySelectorAll(".draggable-item:not(.dragging)"),
        ];

        return draggableElements.reduce(
          (closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
              return { offset: offset, element: child };
            } else {
              return closest;
            }
          },
          { offset: Number.NEGATIVE_INFINITY }
        ).element;
      }

      function checkOrder() {
        const currentOrder = Array.from(container.children).map((child) =>
          child.textContent.trim()
        );
        const feedback = document.getElementById("feedback");

        if (JSON.stringify(currentOrder) === JSON.stringify(correctOrder)) {
          feedback.textContent = "Correct! Redirecting to the next question...";
          feedback.style.color = "#4caf50";

          setTimeout(() => {
            window.location.href = "{{ route('quiz.ddtwo') }}"; // Redirect to ddtwo.html
          }, 2000);
        } else {
          feedback.textContent = "Incorrect. Please try again!";
          feedback.style.color = "#f87171";
        }
      }
    </script>
  </body>
</html>
