<div class="row">
    <form>
        <h2 class="alert alert-warning" role="alert">Contact Web Admin before uploading results!</h2>
        <h2 class="alert alert-danger" role="alert">Not yet available!!</h2>
  <div class="form-group">
    <label for="resultFormControlFile1">Single upload for each result</label>
    <input type="file" class="form-control-file" id="resultFormControlFile1">
  </div>
</form>
<hr>
<br>
    <!-- Display the countdown timer in an element -->
    <blockquote class="blockquote">
      <p class="mb-0 alert alert-warning" id="demo" role="alert"></p>
    </blockquote>

    <script>
    // Set the date we are counting down to
    var countDownDate = new Date("Jul 23, 2023 16:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>
</div>
