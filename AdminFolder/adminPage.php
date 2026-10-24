<?php
    require "getAdminStats.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminPage.css">
</head>
<body>

<div class="dashboard">
    <aside class="sidebar">
        <h2>LabReserve</h2>

        <p class="menu-title">MAIN MENU</p>

        <nav>
            <a href="adminPage.php" class="active">Dashboard</a>
            <a href="manageLabs.php">Manage Labs</a>
            <a href="getAdminReservations.php">Reservations</a>
            <a href="manageUsers.php">Users</a>
        </nav>

        <a href="logout.php" class="logout">Logout</a>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div>
                <h1>Admin Dashboard</h1>
                <p>Overview of your computer lab reservation system</p>
            </div>

            <div class="admin-profile">
                <div class="avatar">AD</div>
                <span>Administrator</span>
            </div>
        </header>

        <section class="stats">
            <div class="stat-card">
                <p>Total Labs</p>
                <h2><?php echo $lab; ?></h2>
                <span>Computer laboratories</span>
            </div>

            <div class="stat-card">
                <p>Registered Users</p>
                <h2><?php echo $user; ?></h2>
                <span>System users</span>
            </div>

            <div class="stat-card">
                <p>Total Reservations</p>
                <h2><?php echo $res; ?></h2>
                <span>All reservations</span>
            </div>

            <div class="stat-card">
                <p>Pending Requests</p>
                <h2><?php echo $stat; ?></h2>
                <span>Waiting for approval</span>
            </div>
        </section>

        <section class="reservations-section">
            <div class="section-header">
                <div>
                    <h2>Recent Reservations</h2>
                    <p>Review and manage reservation requests</p>
                </div>

                <a href="manageReservations.php" class="view-all">
                    View All
                </a>
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
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Ayman Zahran</td>
                            <td>Computer Lab 1</td>
                            <td>25 Oct 2026</td>
                            <td>10:00 - 12:00</td>
                            <td>
                                <span class="status pending">Pending</span>
                            </td>
                            <td>
                                <button class="approve">Approve</button>
                                <button class="reject">Reject</button>
                            </td>
                        </tr>

                        <tr>
                            <td>Sara Khalil</td>
                            <td>Computer Lab 2</td>
                            <td>27 Oct 2026</td>
                            <td>12:00 - 14:00</td>
                            <td>
                                <span class="status approved">Approved</span>
                            </td>
                            <td>
                                <span class="no-action">—</span>
                            </td>
                        </tr>

                        <tr>
                            <td>Omar Ali</td>
                            <td>Computer Lab 3</td>
                            <td>28 Oct 2026</td>
                            <td>09:00 - 11:00</td>
                            <td>
                                <span class="status rejected">Rejected</span>
                            </td>
                            <td>
                                <span class="no-action">—</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </main>
</div>

</body>
</html>