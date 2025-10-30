<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Home Tutor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/toast.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    <div class="container">
        <header class="header">
            <!-- Brand -->
            <div class="brand">
                <div class="logo">
                    <img src="/assets/images/logo.jpeg" alt="The Home Tutor Logo" class="logo-img">
                </div>
                <div class="brand-info">
                    <div class="site-title">The Home Tutor</div>
                    <div class="tagline">Trusted Tutors at Your Doorstep</div>
                </div>
            </div>

            <!-- Burger Icon -->
            <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navigation -->
            <nav class="nav" id="navMenu">
                <div class="nav-links">
                    <a href="/">Home</a>
                    <a href="/about">About</a>
                    <a href="/contact">Contact</a>
                </div>

                <div class="nav-actions">
                    <?php if (session()->has('user')):
                        $u = session()->get('user'); ?>
                        <span class="user-greet">👋 Hi, <?= htmlspecialchars($u['full_name']) ?></span>

                        <?php if ($u['role'] === 'admin'): ?>
                            <a href="/admin" class="btn ghost">Dashboard</a>
                        <?php else: ?>
                            <a href="/user" class="btn ghost">Dashboard</a>
                        <?php endif; ?>

                        <a href="/logout" class="btn">Logout</a>
                    <?php else: ?>
                        <a href="/login" class="btn">Login</a>
                        <a href="/register" class="btn ghost">Register</a>
                    <?php endif; ?>
                </div>
            </nav>
        </header>

        <!-- Toast container -->
        <!-- Toast container for jQuery toasts -->
        <div id="toast-container"></div>