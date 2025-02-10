<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thank You!</title>
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
        text-align: center;
      }
      .thank-you-container {
        max-width: 600px;
        padding: 20px;
        border: 3px solid #facc15;
        border-radius: 10px;
        background-color: #334155;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      }
      .thank-you-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
      }
      .thank-you-message {
        font-size: 1.2rem;
        margin-bottom: 20px;
      }
      .redirect-message {
        font-size: 1rem;
        color: #ffe082;
      }
    </style>
    <script>
      // Redirect after 5 seconds
      setTimeout(() => {
        window.location.href = "{{ route('home') }}";
      }, 5000);
    </script>
  </head>
  <body>
    <div class="thank-you-container">
      <h1 class="thank-you-title">Thank You!</h1>
      <p class="thank-you-message">
        Thank you for taking the quiz! Your answers have been submitted.
      </p>
      <p class="redirect-message">
        You will be redirected to the home page in a few seconds...
      </p>
    </div>
  </body>
</html>
