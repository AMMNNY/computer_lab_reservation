<?php
require "getLabs.php";
require "getReservations.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="userPage.css">
</head>
<body>

    <nav class="navbar">
        <a href="userPage.php" class="logo">
            <span class="logo-icon">▣</span>
            <span>Computer Lab Reservation</span>
        </a>

        <div class="nav-links">
            <a href="userPage.php" class="active">Home</a>
            <a href="#labs">Available Labs</a>
            <a href="#reservations">My Reservations</a>
        </div>

        <div class="profile">
            <div class="profile-icon">U</div>
            <span>User</span>
        </div>
    </nav>

    <main class="container">

        <section class="welcome">
            <div>
                <p class="eyebrow">USER DASHBOARD</p>
                <h1>Welcome Back!</h1>
                <p class="welcome-text">
                    Find a computer lab and reserve your preferred time.
                </p>
            </div>

            <div class="welcome-icon">💻</div>
        </section>

        <section id="labs" class="section">
            <div class="section-header">
                <div>
                    <h2>Available Labs</h2>
                    <p>Choose a lab that suits your needs.</p>
                </div>
                <span class="count">3 Labs</span>
            </div>

            <div class="labs-grid">
<?php foreach ($lab as $l) { ?>
    <article class="lab-card">
        <div class="lab-image image-one">
            <span>💻</span>
            <span class="status">
                <?= htmlspecialchars(ucfirst($l["status"])) ?>
            </span>
        </div>

        <div class="lab-content">
            <h3><?= htmlspecialchars($l["lab_name"]) ?></h3>

            <p class="lab-location">
                📍 <?= htmlspecialchars($l["location"]) ?>
            </p>

            <div class="lab-info">
                <span>👥 Capacity</span>
                <strong><?= htmlspecialchars($l["capacity"]) ?> Students</strong>
            </div>

            <?php if ($l["status"] == 1) { ?>
                    <a href="reserve.php?lab_id=<?= $l['lab_id'] ?>" class="reserve-btn">
                        Reserve Lab
                    </a>
            <?php } else { ?>
                <span class="reserve-btn">
                    Currently Unavailable
                </span>
            <?php } ?>
        </div>
    </article>
<?php } ?>
            </div>
        </section>

        <section id="reservations" class="section reservations-section">
            <div class="section-header">
                <div>
                    <h2>My Reservations</h2>
                    <p>Keep track of your lab bookings.</p>
                </div>
                <span class="count">My Bookings</span>
            </div>

            <div class="table-wrapper">
                <table>
<tbody>
    <?php foreach ($reg as $reservation) { ?>
        <tr>
            <td><?= htmlspecialchars($reservation["lab_name"]) ?></td>
            <td><?= htmlspecialchars($reservation["reservation_date"]) ?></td>
            <td>
                <?= htmlspecialchars(substr($reservation["start_time"], 0, 5)) ?>
                -
                <?= htmlspecialchars(substr($reservation["end_time"], 0, 5)) ?>
            </td>
            <td>
                <span class="reservation-status <?= htmlspecialchars($reservation["status"]) ?>">
                    <?= htmlspecialchars(ucfirst($reservation["status"])) ?>
                </span>
            </td>
            <td>
                <form action="deleteReservation.php" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                    <input type="hidden" name="reservation_id"
                           value="<?= (int) $reservation["reservation_id"] ?>">
                    <button type="submit" class="view-link">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</tbody>
                </table>
            </div>
        </section>

        <footer>
            <p>Computer Lab Reservation System</p>
        </footer>

    </main>

</body>
</html>
