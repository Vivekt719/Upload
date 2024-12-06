<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multi-Page Form</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = $_POST['page'] ?? '1';

    
    if ($page == '1') {
        if (!isset($_POST['subscribe'])) {
            echo "<p style='color:red;'></p>";
        } else {
            $page = '2';
        }
    }

   
    if ($page == '1') {
        ?>
        <h2>Page 1</h2>
        <form method="post">
            <input type="hidden" name="page" value="1">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"><br><br>

            <label for="subscribe">I agree to terms and conditions:</label>
            <input type="checkbox" id="subscribe" name="subscribe" <?php echo isset($_POST['subscribe']) ? 'checked' : ''; ?>><br><br>

            <input type="submit" value="Next">
        </form>
        <?php
    }
    
    elseif ($page == '2') {
        ?>
        <h2>Page 2</h2>
        <form method="post">
            <input type="hidden" name="page" value="3">

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required value="<?php echo htmlspecialchars($_POST['address'] ?? ''); ?>"><br><br>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" pattern="^\d{10}$" placeholder="1234567890" required value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>"><br><br>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" min="1" max="120" required value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>"><br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select...</option>
                <option value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select><br><br>

            <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
            <input type="hidden" name="subscribe" value="Yes">

            <input type="submit" value="Next">
        </form>
        <form method="post" style="display:inline;">
            <input type="hidden" name="page" value="1">
            <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
            <input type="hidden" name="subscribe" value="Yes">
        </form>
        <?php
    }
    
    elseif ($page == '3') {
        ?>
        <h2>Summary</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($_POST['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email']); ?></p>
        <p><strong>Subscribe to newsletter:</strong> <?php echo htmlspecialchars($_POST['subscribe']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($_POST['address']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($_POST['phone']); ?></p>
        <p><strong>Age:</strong> <?php echo htmlspecialchars($_POST['age']); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($_POST['gender']); ?></p>

        <form method="post" style="display:inline;">
            <input type="hidden" name="page" value="2">
            <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
            <input type="hidden" name="subscribe" value="Yes">
            <input type="hidden" name="address" value="<?php echo htmlspecialchars($_POST['address']); ?>">
            <input type="hidden" name="phone" value="<?php echo htmlspecialchars($_POST['phone']); ?>">
            <input type="hidden" name="age" value="<?php echo htmlspecialchars($_POST['age']); ?>">
            <input type="hidden" name="gender" value="<?php echo htmlspecialchars($_POST['gender']); ?>">
            <input type="submit" value="Back">
        </form>
        <form method="post" style="display:inline;">
            <input type="hidden" name="page" value="1">
            <input type="submit" value="Start Over">
        </form>
        <?php
    }
} else {
    
    ?>
    <h2>Page 1</h2>
    <form method="post">
        <input type="hidden" name="page" value="1">
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="subscribe">I agree to terms and conditions:</label>
        <input type="checkbox" id="subscribe" name="subscribe"><br><br>

        <input type="submit" value="Next">
    </form>
    <?php
}
?>
</body>
</html>
