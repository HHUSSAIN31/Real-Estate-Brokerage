<!doctype html>
<html lang="en">
<head>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- jQuery UI -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h5 class="mt-4"></h5>
    <div class="row">
      <div class="col-md-4">
        <label>Search:</label>
        <input type="text" name="city" id="search_city" placeholder="Type to search">
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(function() {
      $("#search_city").autocomplete({
        source: './find.php',
        minLength: 2, // Set the minimum length before triggering autocomplete
        select: function (event, ui) {
          // Do something when a city is selected
          console.log(ui.item.value);
        },
        response: function (event, ui) {
          // Handle the server response if needed
          console.log(ui.content);
        },
        open: function (event, ui) {
          // Handle when the dropdown is opened
        },
        close: function (event, ui) {
          // Handle when the dropdown is closed
        }
      });
    });
  </script>
</body>
</html>
