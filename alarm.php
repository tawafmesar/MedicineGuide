<?php
$date = '2023-05-22';
$time = '22:54:00';
?>
<?php
// Get the user input for the time
$user_time = substr($time, 0, 5);


// Validate the user input and convert it to a valid date object
if (preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $user_time)) {
    $user_date = new DateTime($user_time);
} else {
    echo "Invalid time format. Please enter HH:MM.";
    exit;
}

// Use the setInterval() function in JavaScript to check the current time every second
echo "<script>
var user_time = '$user_time';
setInterval(function() {
  // Get the current time as a date object
  var now = new Date();
  // Format the current time as HH:MM
  var now_time = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2);
  // Compare the current time with the user input
  if (now_time == user_time) {
    // Do something when the time matches, such as playing an audio file or popping an alert message box
    ringtone = new Audio('./files/ringtone.mp3');
    ringtone.play();
  ringtone.loop = true;
    alert('Time is up!');

  }
}, 1000);
</script>";

?>