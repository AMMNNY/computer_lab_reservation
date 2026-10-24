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
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">AZ</div>
                                    <span>Ayman Zahran</span>
                                </div>
                            </td>
                            <td>Computer Lab 1</td>
                            <td>25 Oct 2026</td>
                            <td>10:00 - 12:00</td>
                            <td><span class="status pending">Pending</span></td>
                            <td>
                                <div class="actions">
                                    <button class="approve">Approve</button>
                                    <button class="reject">Reject</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">SK</div>
                                    <span>Sara Khalil</span>
                                </div>
                            </td>
                            <td>Computer Lab 2</td>
                            <td>27 Oct 2026</td>
                            <td>12:00 - 14:00</td>
                            <td><span class="status approved">Approved</span></td>
                            <td><span class="no-action">No actions</span></td>
                        </tr>

                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">OA</div>
                                    <span>Omar Ali</span>
                                </div>
                            </td>
                            <td>Computer Lab 3</td>
                            <td>28 Oct 2026</td>
                            <td>09:00 - 11:00</td>
                            <td><span class="status rejected">Rejected</span></td>
                            <td><span class="no-action">No actions</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

</body>
</html>