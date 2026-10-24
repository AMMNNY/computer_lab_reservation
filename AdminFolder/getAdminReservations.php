<?php
require "fetchReservations.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
    <link rel="stylesheet" href="manageReservations.css">
</head>
<body>

<div class="dashboard">
    <aside class="sidebar">
        <h2>LabReserve</h2>
        <p class="menu-title">MAIN MENU</p>

        <nav>
            <a href="adminPage.php">Dashboard</a>
            <a href="manageLabs.php">Manage Labs</a>
            <a href="manageReservations.php" class="active">Reservations</a>
            <a href="manageUsers.php">Users</a>
        </nav>

        <a href="logout.php" class="logout">Logout</a>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div>
                <h1>Manage Reservations</h1>
                <p>Review and manage all computer lab reservations</p>
            </div>

            <div class="admin-profile">
                <div class="avatar">AD</div>
                <span>Administrator</span>
            </div>
        </header>

        <section class="summary-cards">
            <div class="summary-card">
                <p>Total Reservations</p>
                <h2>38</h2>
            </div>

            <div class="summary-card pending-card">
                <p>Pending</p>
                <h2>7</h2>
            </div>

            <div class="summary-card approved-card">
                <p>Approved</p>
                <h2>24</h2>
            </div>

            <div class="summary-card rejected-card">
                <p>Rejected</p>
                <h2>7</h2>
            </div>
        </section>

        <section class="reservations-section">
            <div class="section-header">
                <div>
                    <h2>All Reservations</h2>
                    <p>View reservation details and update their status</p>
                </div>
            </div>

            <div class="filters">
                <input type="search" placeholder="Search by user or lab...">

                <select>
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Lab</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php foreach ($data as $reservation) { ?>
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">
                                            <?= strtoupper(substr($reservation["full_name"], 0, 2)) ?>
                                        </div>
                                        <span><?= htmlspecialchars($reservation["full_name"]) ?></span>
                                    </div>
                                </td>

                                <td><?= htmlspecialchars($reservation["lab_name"]) ?></td>
                                <td><?= htmlspecialchars($reservation["reservation_date"]) ?></td>
                                <td>
                                    <?= htmlspecialchars(substr($reservation["start_time"], 0, 5)) ?>
                                    -
                                    <?= htmlspecialchars(substr($reservation["end_time"], 0, 5)) ?>
                                </td>

                                <td>
                                    <span class="status <?= htmlspecialchars($reservation["status"]) ?>">
                                        <?= htmlspecialchars(ucfirst($reservation["status"])) ?>
                                    </span>
                                </td>

                                <td>
                                    <?php if ($reservation["status"] =="pending") { ?>
                                        <div class="actions">
                                            <form action="updateReservationStatus.php" method="POST">
                                                <input type="hidden" name="reservation_id"
                                                    value="<?= $reservation["reservation_id"] ?>">
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="approve">Approve</button>
                                            </form>

                                            <form action="updateReservationStatus.php" method="POST">
                                                <input type="hidden" name="reservation_id"
                                                    value="<?= $reservation["reservation_id"] ?>">
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="reject">Reject</button>
                                            </form>
                                        </div>
                                    <?php } else { ?>
                                        <span class="no-action">No actions</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

</body>
</html>