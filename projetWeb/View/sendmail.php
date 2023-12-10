
<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send an Email!!</title>
  <style>
        body {
  font-family: 'Arial', sans-serif;
  background-color: #f8f8f8;
  margin: 0;
}

.wrapper {
  max-width: 800px;
  margin: 50px auto;
  background-color: #fff;
  padding: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 12px;
  text-align: left; /* Align the text to the left */
}

#contact {
  text-align: center;
}

h1 {
  color: #333;
  font-size: 28px;
}

.form-box {
  margin-bottom: 20px;
}

input,
textarea {
  width: 100%;
  padding: 12px;
  margin-top: 8px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button {
  background-color: #4caf50;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background-color: #45a049;
}

/* Responsive Styling */
@media screen and (max-width: 600px) {
  .wrapper {
    margin: 20px;
    padding: 20px;
  }
}

    </style>
</head>
 
<body>
  <div class="wrapper">
    <form id="contact" action="mail.php" method="post">
      <h1>Contact Form</h1>
 
      <div class=form-box>
        <input placeholder="Your name" name="name" type="text" tabindex="1" autofocus>
      </div>
      <div class=form-box>
        <input placeholder="Your Email Address" name="email" type="email" tabindex="2">
        </div>
      <div class=form-box>
        <input placeholder="Type your subject line" type="text" name="subject" tabindex="4">
        </div>
      <div class=form-box>
        <textarea name="message" placeholder="Type your Message Details Here..." tabindex="5"></textarea>
        </div>
 
      <div class=form-box>
        <button type="submit" name="send" id="contact-submit">Submit Now</button>
      </div>
    </form>
  </div>
</body>
 
</html>