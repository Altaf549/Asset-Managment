<!-- Sidebar -->
<?php
$collapsibles = [
    'laptop'   => 'Laptop',
    'monitor'  => 'Monitor',
    'cpu'      => 'CPU',
    'mac'      => 'MAC',
    'keyboard' => 'Keyboard',
    'mouse'    => 'Mouse',
    'phone'   => 'Phone',
];

$collapsiblePages = ['product', 'assigned', 'unassigned'];
?>

<!-- Sidebar -->
<div class="col-md-3 col-lg-2 sidebar">
    <h4 class="mb-4">Admin Panel</h4>
    <nav class="nav flex-column">
        <!-- Main Navigation -->
        <a class="nav-link <?= $page === 'dashboard' ? 'active' : '' ?>" href="<?= site_url('admin/dashboard') ?>">
            <i class="bi bi-grid-3x3-gap-fill me-2"></i> Dashboard
        </a>
        <a class="nav-link <?= $page === 'employee' ? 'active' : '' ?>" href="<?= site_url('admin/employee') ?>">
            <i class="bi bi-people me-2"></i> Employee
        </a>

        <!-- Collapsible Sections -->
        <?php foreach ($collapsibles as $key => $label): 
            $menuId = $key . 'Menu';
            $toggleId = $key . '-toggle';
            $isOpen = strpos(current_url(), "admin/$key") !== false;
            $icon = match($key) {
                'laptop' => 'bi-laptop',
                'monitor' => 'bi-display',
                'cpu' => 'bi-motherboard',
                'mac' => 'bi-apple',
                'keyboard' => 'bi-keyboard',
                'mouse' => 'bi-mouse',
                'phone' => 'bi-phone',
                default => 'bi-hdd-stack'
            };
        ?>
        <div class="nav-item mb-3">
            <a class="nav-link <?= strpos(current_url(), "admin/$key") !== false ? 'active' : '' ?>" 
               id="<?= $toggleId ?>" href="#" role="button"
               aria-expanded="<?= $isOpen ? 'true' : 'false' ?>" 
               aria-controls="<?= $menuId ?>">
                <div class="d-flex align-items-center w-100">
                    <i class="<?= $icon ?> me-2"></i>
                    <span class="flex-grow-1"><?= $label ?></span>
                    <i class="bi bi-chevron-down <?= $isOpen ? 'rotate-180' : '' ?>"></i>
                </div>
            </a>
            <div class="collapse-menu <?= $isOpen ? 'is-open' : '' ?>" id="<?= $menuId ?>">
                <div class="nav flex-column ms-3">
                    <a class="nav-link <?= strpos(current_url(), "admin/$key/product") !== false ? 'active' : '' ?>" 
                       href="<?= site_url("admin/$key/product") ?>">
                        <i class="bi bi-box-seam me-2"></i> Product
                    </a>
                    <a class="nav-link <?= strpos(current_url(), "admin/$key/assigned") !== false ? 'active' : '' ?>" 
                       href="<?= site_url("admin/$key/assigned") ?>">
                        <i class="bi bi-check-circle-fill me-2"></i> Assigned
                    </a>
                    <a class="nav-link <?= strpos(current_url(), "admin/$key/unassigned") !== false ? 'active' : '' ?>" 
                       href="<?= site_url("admin/$key/unassigned") ?>">
                        <i class="bi bi-x-circle-fill me-2"></i> Unassigned
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <a class="nav-link <?= $page === 'other-asset' ? 'active' : '' ?>" href="<?= site_url('admin/other-asset') ?>">
            <i class="bi bi-archive me-2"></i> Other Asset
        </a>
        <a class="nav-link" href="<?= site_url('admin/logout') ?>">
            <i class="bi bi-door-open me-2"></i> Logout
        </a>
    </nav>
</div>


<!-- Add custom CSS for sidebar styling -->
<style>
/* Sidebar Styling */
.sidebar {
    height: 100vh;
    overflow-y: auto;
    position: fixed;
    left: 0;
    width: 20%;
    padding: 1rem;
}

/* Nav Link Styling */
.nav-item .nav-link {
    position: relative;
    transition: all 0.3s ease;
}

.nav-item .nav-link .bi-chevron-down {
    transition: transform 0.3s ease;
}

.nav-item .nav-link[aria-expanded="true"] .bi-chevron-down {
    transform: rotate(180deg);
}

/* Collapse Menu Animation */
.collapse-menu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease-out;
}
.collapse-menu.is-open {
    max-height: 500px;
}


</style>

<!-- Add custom JavaScript for settings menu -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[id$="-toggle"]').forEach(toggle => {
        const menuId = toggle.getAttribute('aria-controls');
        const menu = document.getElementById(menuId);
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            menu.classList.toggle('is-open');
            const expanded = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!expanded));
        });
    });
});
</script>



