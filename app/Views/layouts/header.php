<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Home Tutor</title>

    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>
    <div class="container">
        <header class="header">
            <!-- Brand / Logo -->
            <div class="brand">
                <div class="logo">
                    <img src="/assets/images/logo.jpeg" alt="The Home Tutor Logo" class="logo-img">
                </div>
                <div class="brand-info">
                    <div class="site-title">The Home Tutor</div>
                    <div class="tagline">Trusted tutors at your doorstep</div>
                </div>
            </div>



            <!-- Navigation -->
            <nav class="nav">
                <a href="/">Home</a>
                <a href="/about">About</a>
                <a href="/contact">Contact</a>

                <?php if (session()->has('user')):
                    $u = session()->get('user'); ?>
                    <div class="user-area">
                        <span class="user-greet">Hi, <?= htmlspecialchars($u['full_name']) ?></span>

                        <?php if ($u['role'] === 'admin'): ?>
                            <a href="/admin" class="btn ghost">Admin</a>
                        <?php else: ?>
                            <a href="/user" class="btn ghost">Dashboard</a>
                        <?php endif; ?>

                        <a href="/logout" class="btn">Logout</a>
                    </div>
                <?php else: ?>
                    <a href="/login" class="btn">Login</a>
                    <a href="/register" class="btn">Register</a>
                <?php endif; ?>
            </nav>
        </header>