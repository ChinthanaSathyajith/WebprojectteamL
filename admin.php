<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: login.php');
    exit();
}
require_once 'db_connect.php';

// Handle feedback delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_feedback_id'])) {
    $del_id = intval($_POST['delete_feedback_id']);
    $conn->query("DELETE FROM feedback WHERE id = $del_id");
    header('Location: admin.php?msg=feedback_deleted');
    exit();
}

// Handle promote/demote
if (isset($_GET['action'], $_GET['id'])) {
    $action = $_GET['action'];
    $id = intval($_GET['id']);

    if ($action === 'promote') {
        $newRole = 'admin';
    } elseif ($action === 'demote') {
        $newRole = 'user';
    } else {
        die("Invalid action!");
    }

    $stmt = $conn->prepare("UPDATE users SET role=? WHERE id=?");
    $stmt->bind_param("si", $newRole, $id);
    $stmt->execute();
    $stmt->close();

    header('Location: admin.php?msg=status_changed');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="container mt-5">
    <h1 class="mb-4">Admin Dashboard</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! This is your admin dashboard.</p>
    <a href="index.php" class="btn btn-primary mb-3"><i class="fa fa-home"></i> Go to Home Page</a>


    <!-- Users & Admins Section -->
    <section id="user-admins" class="mb-5">
        <div class="card p-4 mb-4">
            <h2 class="mb-3"><i class="fa fa-users"></i> Users & Admins</h2>
            <?php
            $users = $conn->query("SELECT id, fullname, email, role FROM users ORDER BY id ASC");
            ?>
            <?php if (isset($_GET['msg']) && $_GET['msg'] === 'status_changed'): ?>
                <div class="alert alert-success mt-3">Status changed successfully.</div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-hover table-bordered bg-light">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($users && $users->num_rows > 0): ?>
                            <?php while ($u = $users->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($u['fullname']); ?></td>
                                <td><?php echo htmlspecialchars($u['email']); ?></td>
                                <td>
                                    <?php if ($u['role'] === 'admin'): ?>
                                        <span class="badge badge-success">Admin</span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary">User</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($u['role'] === 'user'): ?>
                                        <a href="admin.php?action=promote&id=<?php echo $u['id']; ?>" class="btn btn-warning btn-sm">
                                            <i class="fa fa-arrow-up"></i> Make Admin
                                        </a>
                                    <?php else: ?>
                                        <a href="admin.php?action=demote&id=<?php echo $u['id']; ?>" class="btn btn-secondary btn-sm">
                                            <i class="fa fa-arrow-down"></i> Make User
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="text-center">No users found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>
