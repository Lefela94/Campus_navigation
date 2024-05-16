<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Navigation System</title>
</head>
<body>

<a href="Admin.php">ADMIN</a>
<a href="CampusNaigation.php">LIMKOKWING CAMPUSES</a>

<?php
// PHP code
class CampusNavigationSystem {
    private $map_api_key;
    private $conn;

    function __construct($map_api_key, $conn) {
        $this->map_api_key = $map_api_key;
        $this->conn = $conn;
    }

    function getDirections($origin, $destination) {
        // Same as before
    }

    function getEvents() {
        // Fetch events from the database
        $sql = "SELECT * FROM events";
        $result = $this->conn->query($sql);

        $events = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
        }
        // Add the final examinations event
        $events[] = array(
            "name" => "Final Examinations",
            "location" => "Various Examination Halls",
            "time" => "2024-05-25 to 2024-05-31"
        );
        return $events;
    }

    function getEmergencies() {
        // Fetch emergencies from the database
        $sql = "SELECT * FROM emergencies";
        $result = $this->conn->query($sql);

        $emergencies = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $emergencies[] = $row;
            }
        }
        return $emergencies;
    }
}


// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Navigation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// JavaScript code
echo "<script>";
// JavaScript code remains the same
echo "</script>";

// Initialize campus navigation system with map API key and database connection
$map_api_key = "YOUR_GOOGLE_MAPS_API_KEY"; // Replace with your Google Maps API key
$navigation_system = new CampusNavigationSystem($map_api_key, $conn);

// Get directions and display
// Same as before

// Get ongoing events and display
echo "<h2>Ongoing Events:</h2>";
echo "<div id='events'>";
$events = $navigation_system->getEvents();
if (!empty($events)) {
    foreach ($events as $event) {
        echo "<p>{$event['name']} at {$event['location']} - {$event['time']}</p>";
    }
} else {
    echo "No ongoing events.";
}
echo "</div>";

// Get real-time emergencies and display
echo "<h2>Emergencies:</h2>";
echo "<div id='emergencies'>";
$emergencies = $navigation_system->getEmergencies();
if (!empty($emergencies)) {
    foreach ($emergencies as $emergency) {
        echo "<p>{$emergency['type']} at {$emergency['location']} - {$emergency['time']}</p>";
    }
} else {
    echo "No emergencies reported.";
}
echo "</div>";

// Close the database connection
$conn->close();
?>
 <iframe src="https://www.google.com/maps/d/embed?mid=1cYnEG8ihDd9f6L-xlZiovPJ4Pfa3smM&ehbc=2E312F" width="1250" height="580"></iframe>
</body>
</html>
