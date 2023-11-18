<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Optional: Add your custom styles here */
        .map-container {
            height: 300px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
  
  <div class="container mt-5">
      <div class="row">
          <!-- Contact Form -->
          <div class="col-md-6">
              <h2 style="color:red">Contact Us</h2>
              <form>
                  <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter your name">
                  </div>
                  <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter your email">
                  </div>
                  <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter your title">
                </div>
                  <div class="form-group">
                      <label for="message">Message:</label>
                      <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
          
          <!-- Map -->
          <div class="col-md-6">
            <h2 style="color:red">Our Location</h2>
            <iframe
                width="100%"
                height="300"
                frameborder="0"
                style="border:0"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.096966609173!2d105.78049781424785!3d21.028805785998376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cd0c66f05%3A0xea31563511af2e54!2zOCBUw7RuIFRo4bqldCBUaHV54bq_dCwgTeG7uSDEkMOsbmgsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1635332704619!5m2!1svi!2s"
                allowfullscreen>
            </iframe>
          </div>
      </div>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Add any additional JavaScript libraries or scripts here -->
</body>
</html>
