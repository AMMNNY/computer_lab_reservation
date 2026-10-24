
<?php
require "dbCon.php";

$lab = false;
$error = "";

if (isset($_GET["lab_id"]) && filter_var($_GET["lab_id"], FILTER_VALIDATE_INT) !== false && (int) $_GET["lab_id"] > 0) {
    $lab_id = (int) $_GET["lab_id"];

    $stmt = $conn->prepare("SELECT * FROM labs WHERE lab_id = :lab_id");
    $stmt->execute([
        "lab_id" => $lab_id
    ]);

    $lab = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lab_id = filter_input(INPUT_POST, "lab_id", FILTER_VALIDATE_INT);
    $date = $_POST["reservation_date"] ?? "";
    $start_time = $_POST["start_time"] ?? "";
    $end_time = $_POST["end_time"] ?? "";

    if (!$lab_id || $date == "" || $start_time == "" || $end_time == "") {
        $error = "Please fill in all fields.";
    } elseif ($end_time <= $start_time) {
        $error = "End time must be after start time.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM labs WHERE lab_id = :lab_id");
        $stmt->execute([
            "lab_id" => $lab_id
        ]);
        $lab = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$lab) {
            $error = "Lab not found.";
        } elseif ($lab["status"] != 1) {
            $error = "This lab is currently unavailable.";
        } else {
            $error = "Your form is valid. Saving the reservation will be added next.";
        }
    }
}

$today = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Lab</title>
    <link rel="stylesheet" href="reserve.css">
</head>
<body>
    <div class="reservation-container">
        <h1>Reserve a Lab</h1>

        <?php if ($error != "") { ?>
            <p class="message"><?= htmlspecialchars($error) ?></p>
        <?php } ?>

        <?php if ($lab !== false && $lab !== null) { ?>

            <div class="lab-details">
                <h2><?= htmlspecialchars($lab["lab_name"]) ?></h2>
                <p>Location: <?= htmlspecialchars($lab["location"]) ?></p>
                <p>Capacity: <?= htmlspecialchars($lab["capacity"]) ?> Students</p>
            </div>

            <?php if ($lab["status"] == 1) { ?>
                <form action="reservation_process.php?lab_id=<?= (int) $lab["lab_id"] ?>" method="POST">

                    <input type="hidden" name="lab_id" value="<?= (int) $lab["lab_id"] ?>">

                    <div class="form-group">
                        <label for="reservation_date">Reservation Date</label>
                        <input
                            type="date"
                            id="reservation_date"
                            name="reservation_date"
                            min="<?= $today ?>"
                            value="<?= htmlspecialchars($_POST["reservation_date"] ?? "") ?>"
                            required
                        >
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <input
                                type="time"
                                id="start_time"
                                name="start_time"
                                value="<?= htmlspecialchars($_POST["start_time"] ?? "") ?>"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <input
                                type="time"
                                id="end_time"
                                name="end_time"
                                value="<?= htmlspecialchars($_POST["end_time"] ?? "") ?>"
                                required
                            >
                        </div>
                    </div>

                    <button type="submit" class="reserve-btn">
                        Confirm Reservation
                    </button>
                </form>
            <?php } else { ?>
                <p>This lab is currently unavailable.</p>
            <?php } ?>

        <?php } else { ?>
            <p>Lab not found. Please return to the available labs page.</p>
            <a href="userPage.php" class="back-btn">Back to Labs</a>
        <?php } ?>
    </div>
</body>
</html>
