<?php
session_start();
include 'db_config.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


if (isset($_GET['action']) && isset($_GET['req_id'])) {
    $req_id = (int)$_GET['req_id'];
    $status = ($_GET['action'] == 'accept') ? 'accepted' : 'rejected';
    
    
    $conn->query("UPDATE swap_requests SET status = '$status' WHERE id = $req_id AND receiver_id = $user_id");
    header("Location: requests.php");
    exit();
}


$received_sql = "SELECT sr.id, sr.status, p.title, u.username as sender_name, u.email as sender_email 
                 FROM swap_requests sr 
                 JOIN posts p ON sr.post_id = p.post_id 
                 JOIN users u ON sr.sender_id = u.id 
                 WHERE sr.receiver_id = $user_id";
$received_res = $conn->query($received_sql);


$sent_sql = "SELECT sr.status, p.title, u.username as receiver_name, u.email as receiver_email 
             FROM swap_requests sr 
             JOIN posts p ON sr.post_id = p.post_id 
             JOIN users u ON sr.receiver_id = u.id 
             WHERE sr.sender_id = $user_id";
$sent_res = $conn->query($sent_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkillSwap - My Requests</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .request-container { width: 85%; margin: 50px auto; font-family: 'Segoe UI', Tahoma, sans-serif; }
        .section-title { color: #2c3e50; border-bottom: 2px solid #2ecc71; padding-bottom: 10px; margin-top: 40px; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #f8f9fa; color: #7f8c8d; text-transform: uppercase; font-size: 13px; }
        
        .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: bold; text-transform: uppercase; display: inline-block; }
        .pending { background: #fff3cd; color: #856404; }
        .accepted { background: #d4edda; color: #155724; }
        .rejected { background: #f8d7da; color: #721c24; }
        
        .btn { padding: 8px 15px; text-decoration: none; border-radius: 5px; font-size: 14px; margin-right: 5px; color: white; display: inline-block; font-weight: bold; }
        .btn-accept { background: #2ecc71; }
        .btn-reject { background: #e74c3c; }
        
        .contact-box { font-size: 0.9rem; color: #2c3e50; line-height: 1.4; }
        .connected-label { display: block; color: #27ae60; font-weight: bold; margin-bottom: 3px; font-size: 0.85rem; }
        .email-text { color: #2980b9; font-weight: bold; text-decoration: none; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo"><i class="fas fa-sync-alt"></i> SkillSwap</div>
        <ul class="nav-links">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="post_skill.php">Post a Skill</a></li>
            <li><a href="requests.php">My Requests</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="request-container">
        <h2 class="section-title">Incoming Requests (Who wants to swap with you?)</h2>
        <table>
            <tr>
                <th>Sender</th>
                <th>Skill Requested</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php if ($received_res && $received_res->num_rows > 0): ?>
                <?php while($row = $received_res->fetch_assoc()): ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($row['sender_name']); ?></strong></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><span class="status-badge <?php echo $row['status']; ?>"><?php echo $row['status']; ?></span></td>
                    <td>
                        <?php if($row['status'] == 'pending'): ?>
                            <a href="requests.php?action=accept&req_id=<?php echo $row['id']; ?>" class="btn btn-accept">Accept</a>
                            <a href="requests.php?action=reject&req_id=<?php echo $row['id']; ?>" class="btn btn-reject">Reject</a>
                        <?php elseif($row['status'] == 'accepted'): ?>
                            <div class="contact-box">
                                <span class="connected-label"><i class="fas fa-check-circle"></i> Connected!</span>
                                Contact via email for more: <br>
                                <span class="email-text"><?php echo htmlspecialchars($row['sender_email']); ?></span>
                            </div>
                        <?php else: ?>
                            <span style="color: #95a5a6;">Closed</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4" style="text-align:center; padding: 30px; color: #95a5a6;">No incoming requests found.</td></tr>
            <?php endif; ?>
        </table>

        <h2 class="section-title">Sent Requests (Skills you want to learn)</h2>
        <table>
            <tr>
                <th>Skill Owner</th>
                <th>Skill Title</th>
                <th>Status</th>
            </tr>
            <?php if ($sent_res && $sent_res->num_rows > 0): ?>
                <?php while($row = $sent_res->fetch_assoc()): ?>
                <tr>
                    <td>
                        <strong><?php echo htmlspecialchars($row['receiver_name']); ?></strong>
                        <?php if($row['status'] == 'accepted'): ?>
                            <div class="contact-box" style="margin-top: 5px;">
                                Contact for more: <br>
                                <span class="email-text"><?php echo htmlspecialchars($row['receiver_email']); ?></span>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><span class="status-badge <?php echo $row['status']; ?>"><?php echo $row['status']; ?></span></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="3" style="text-align:center; padding: 30px; color: #95a5a6;">You haven't sent any requests yet.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
