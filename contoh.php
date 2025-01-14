<?php
session_start();

// Set default active menu and submenu if not already set
if (!isset($_SESSION['active_menu'])) {
    $_SESSION['active_menu'] = '';
}
if (!isset($_SESSION['active_submenu'])) {
    $_SESSION['active_submenu'] = '';
}

// Update active menu and submenu based on the request
if (isset($_GET['menu']) && isset($_GET['submenu'])) {
    $_SESSION['active_menu'] = $_GET['menu'];
    $_SESSION['active_submenu'] = $_GET['submenu'];
}

// Helper function to determine active state
function isActive($menu, $submenu = '')
{
    return $_SESSION['active_menu'] === $menu && $_SESSION['active_submenu'] === $submenu;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            display: none;
            background: #f4f4f4;
            padding: 10px;
            width: 200px;
        }

        .menu {
            list-style: none;
            padding: 0;
        }

        .menu>li {
            margin: 10px 0;
        }

        .submenu {
            display: none;
            list-style: none;
            padding-left: 20px;
        }

        .submenu.active {
            display: block;
        }

        .active-link {
            font-weight: bold;
            color: blue;
        }

        .nav-arrow {
            transition: transform 0.3s ease;
        }

        .submenu.active~.nav-link .nav-arrow {
            transform: rotate(90deg);
        }

        .content {
            margin-left: auto;
            margin-right: auto;
            padding: 10px;
        }

        .toggle-btn {
            display: block;
            margin: 10px;
            padding: 10px;
            background: #007bff;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        @media (min-width: 768px) {
            .sidebar {
                display: block;
            }

            .toggle-btn {
                display: none;
            }
        }
    </style>
    <script>
        function toggleSubMenu(menuId) {
            const submenus = document.querySelectorAll('.submenu');
            submenus.forEach(submenu => {
                submenu.classList.remove('active');
            });

            const currentSubmenu = document.querySelector(`.submenu[data-menu="${menuId}"]`);
            if (currentSubmenu) {
                currentSubmenu.classList.toggle('active');
            }
        }
    </script>
</head>

<body>
    <div class="sidebar">
        <ul class="menu">
            <li class="nav-item">
                <div onclick="toggleSubMenu('menu1')" class="nav-link <?php echo $_SESSION['active_menu'] === 'menu1' ? 'active-link' : ''; ?>">
                    <i class="nav-icon bi bi-clipboard-fill"></i>
                    <p>Menu 1 <i class="nav-arrow bi <?php echo $_SESSION['active_menu'] === 'menu1' ? 'bi-chevron-down' : 'bi-chevron-right'; ?>"></i></p>
                </div>
                <ul class="submenu" data-menu="menu1">
                    <li class="nav-link"><a href="../agen_kp/index.php" class="<?php echo isActive('menu1', 'agen_kp') ? 'active-link' : ''; ?>">Agen/KP</a></li>
                    <li class="nav-link"><a href="../user_hybrid/index.php" class="<?php echo isActive('menu1', 'data_user') ? 'active-link' : ''; ?>">Data User</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <div onclick="toggleSubMenu('menu2')" class="nav-link <?php echo $_SESSION['active_menu'] === 'menu2' ? 'active-link' : ''; ?>">
                    <i class="nav-icon bi bi-clipboard-fill"></i>
                    <p>Menu 2 <i class="nav-arrow bi <?php echo $_SESSION['active_menu'] === 'menu2' ? 'bi-chevron-down' : 'bi-chevron-right'; ?>"></i></p>
                </div>
                <ul class="submenu" data-menu="menu2">
                    <li class="nav-link"><a href="../pickup_kurir/index.php" class="<?php echo isActive('menu2', 'pickup_kurir') ? 'active-link' : ''; ?>">Pickup Kurir</a></li>
                    <li class="nav-link"><a href="../delivery_kurir/index.php" class="<?php echo isActive('menu2', 'delivery_kurir') ? 'active-link' : ''; ?>">Delivery Kurir</a></li>
                </ul>
            </li>
        </ul>
    </div>
</body>

</html>