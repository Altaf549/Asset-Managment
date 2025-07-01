<!-- Sidebar -->
<div class="col-md-3 col-lg-2 sidebar">
    <h4 class="mb-4">Admin Panel</h4>
    <nav class="nav flex-column">
        <!-- Main Navigation -->
        <a class="nav-link <?php echo $page === 'dashboard' ? 'active' : ''; ?>" href="<?= site_url('admin/dashboard') ?>">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>

        <a class="nav-link <?php echo $page === 'employee' ? 'active' : ''; ?>" href="<?= site_url('admin/employee') ?>">
            <i class="bi bi-speedometer2 me-2"></i> Employee
        </a>

        <div class="nav-item mb-3">
            <a class="nav-link <?php 
                $settingsPages = ['assigned-laptop', 'Unassigned-laptop'];
                echo in_array($page, $settingsPages) ? 'active' : ''; 
            ?>" id="laptop-toggle" href="#" role="button" aria-expanded="<?php echo in_array($page, $settingsPages) ? 'true' : 'false'; ?>" aria-controls="laptopMenu">
                <div class="d-flex align-items-center w-100">
                    <i class="bi bi-gear me-2"></i>
                    <span class="flex-grow-1">Laptop</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </a>
            <div class="<?php echo in_array($page, ['assigned-laptop', 'Unassigned-laptop']) ? 'is-open' : ''; ?>" id="laptopMenu">
                <div class="nav flex-column ms-3">
                    <a class="nav-link <?php echo $page === 'assigned-laptop' ? 'active' : ''; ?>" href="<?= site_url('admin/laptop/assigned') ?>">
                        <i class="bi bi-display me-2"></i> Assigned
                    </a>
                    <a class="nav-link <?php echo $page === 'unassigned-laptop' ? 'active' : ''; ?>" href="<?= site_url('admin/laptop/unassigned') ?>">
                        <i class="bi bi-info-circle me-2"></i> Unassigned
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-item mb-3">
            <a class="nav-link <?php 
                $settingsPages = ['assigned', 'Unassigned'];
                echo in_array($page, $settingsPages) ? 'active' : ''; 
            ?>" id="monitor-toggle" href="#" role="button" aria-expanded="<?php echo in_array($page, $settingsPages) ? 'true' : 'false'; ?>" aria-controls="monitorMenu">
                <div class="d-flex align-items-center w-100">
                    <i class="bi bi-gear me-2"></i>
                    <span class="flex-grow-1">Monitor</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </a>
            <div class="<?php echo in_array($page, ['assigned', 'Unassigned']) ? 'is-open' : ''; ?>" id="monitorMenu">
                <div class="nav flex-column ms-3">
                    <a class="nav-link <?php echo $page === 'assigned' ? 'active' : ''; ?>" href="<?= site_url('admin/monitor/assigned') ?>">
                        <i class="bi bi-display me-2"></i> Assigned
                    </a>
                    <a class="nav-link <?php echo $page === 'unassigned' ? 'active' : ''; ?>" href="<?= site_url('admin/monitor/unassigned') ?>">
                        <i class="bi bi-info-circle me-2"></i> Unassigned
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-item mb-3">
            <a class="nav-link <?php 
                $settingsPages = ['assigned', 'Unassigned'];
                echo in_array($page, $settingsPages) ? 'active' : ''; 
            ?>" id="cpu-toggle" href="#" role="button" aria-expanded="<?php echo in_array($page, $settingsPages) ? 'true' : 'false'; ?>" aria-controls="cpuMenu">
                <div class="d-flex align-items-center w-100">
                    <i class="bi bi-gear me-2"></i>
                    <span class="flex-grow-1">CPU</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </a>
            <div class="<?php echo in_array($page, ['assigned', 'Unassigned']) ? 'is-open' : ''; ?>" id="cpuMenu">
                <div class="nav flex-column ms-3">
                    <a class="nav-link <?php echo $page === 'assigned' ? 'active' : ''; ?>" href="<?= site_url('admin/cpu/assigned') ?>">
                        <i class="bi bi-display me-2"></i> Assigned
                    </a>
                    <a class="nav-link <?php echo $page === 'unassigned' ? 'active' : ''; ?>" href="<?= site_url('admin/cpu/unassigned') ?>">
                        <i class="bi bi-info-circle me-2"></i> Unassigned
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-item mb-3">
            <a class="nav-link <?php 
                $settingsPages = ['assigned', 'Unassigned'];
                echo in_array($page, $settingsPages) ? 'active' : ''; 
            ?>" id="mac-toggle" href="#" role="button" aria-expanded="<?php echo in_array($page, $settingsPages) ? 'true' : 'false'; ?>" aria-controls="macMenu">
                <div class="d-flex align-items-center w-100">
                    <i class="bi bi-gear me-2"></i>
                    <span class="flex-grow-1">MAC</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </a>
            <div class="<?php echo in_array($page, ['assigned', 'Unassigned']) ? 'is-open' : ''; ?>" id="macMenu">
                <div class="nav flex-column ms-3">
                    <a class="nav-link <?php echo $page === 'assigned' ? 'active' : ''; ?>" href="<?= site_url('admin/mac/assigned') ?>">
                        <i class="bi bi-display me-2"></i> Assigned
                    </a>
                    <a class="nav-link <?php echo $page === 'unassigned' ? 'active' : ''; ?>" href="<?= site_url('admin/mac/unassigned') ?>">
                        <i class="bi bi-info-circle me-2"></i> Unassigned
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-item mb-3">
            <a class="nav-link <?php 
                $settingsPages = ['assigned', 'Unassigned'];
                echo in_array($page, $settingsPages) ? 'active' : ''; 
            ?>" id="keyboard-toggle" href="#" role="button" aria-expanded="<?php echo in_array($page, $settingsPages) ? 'true' : 'false'; ?>" aria-controls="keyboardMenu">
                <div class="d-flex align-items-center w-100">
                    <i class="bi bi-gear me-2"></i>
                    <span class="flex-grow-1">Keyboard</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </a>
            <div class="<?php echo in_array($page, ['assigned', 'Unassigned']) ? 'is-open' : ''; ?>" id="keyboardMenu">
                <div class="nav flex-column ms-3">
                    <a class="nav-link <?php echo $page === 'assigned' ? 'active' : ''; ?>" href="<?= site_url('admin/keyboard/assigned') ?>">
                        <i class="bi bi-display me-2"></i> Assigned
                    </a>
                    <a class="nav-link <?php echo $page === 'unassigned' ? 'active' : ''; ?>" href="<?= site_url('admin/keyboard/unassigned') ?>">
                        <i class="bi bi-info-circle me-2"></i> Unassigned
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-item mb-3">
            <a class="nav-link <?php 
                $settingsPages = ['assigned', 'Unassigned'];
                echo in_array($page, $settingsPages) ? 'active' : ''; 
            ?>" id="mouse-toggle" href="#" role="button" aria-expanded="<?php echo in_array($page, $settingsPages) ? 'true' : 'false'; ?>" aria-controls="mouseMenu">
                <div class="d-flex align-items-center w-100">
                    <i class="bi bi-gear me-2"></i>
                    <span class="flex-grow-1">Mouse</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </a>
            <div class="<?php echo in_array($page, ['assigned', 'Unassigned']) ? 'is-open' : ''; ?>" id="mouseMenu">
                <div class="nav flex-column ms-3">
                    <a class="nav-link <?php echo $page === 'assigned' ? 'active' : ''; ?>" href="<?= site_url('admin/mouse/assigned') ?>">
                        <i class="bi bi-display me-2"></i> Assigned
                    </a>
                    <a class="nav-link <?php echo $page === 'unassigned' ? 'active' : ''; ?>" href="<?= site_url('admin/mouse/unassigned') ?>">
                        <i class="bi bi-info-circle me-2"></i> Unassigned
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-item mb-3">
            <a class="nav-link <?php 
                $settingsPages = ['assigned', 'Unassigned'];
                echo in_array($page, $settingsPages) ? 'active' : ''; 
            ?>" id="phones-toggle" href="#" role="button" aria-expanded="<?php echo in_array($page, $settingsPages) ? 'true' : 'false'; ?>" aria-controls="phonesMenu">
                <div class="d-flex align-items-center w-100">
                    <i class="bi bi-gear me-2"></i>
                    <span class="flex-grow-1">Phones</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </a>
            <div class="<?php echo in_array($page, ['assigned', 'Unassigned']) ? 'is-open' : ''; ?>" id="phonesMenu">
                <div class="nav flex-column ms-3">
                    <a class="nav-link <?php echo $page === 'assigned' ? 'active' : ''; ?>" href="<?= site_url('admin/phones/assigned') ?>">
                        <i class="bi bi-display me-2"></i> Assigned
                    </a>
                    <a class="nav-link <?php echo $page === 'unassigned' ? 'active' : ''; ?>" href="<?= site_url('admin/phones/unassigned') ?>">
                        <i class="bi bi-info-circle me-2"></i> Unassigned
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-item mb-3">
            <a class="nav-link <?php 
                $settingsPages = ['pendrive', 'data-cable'];
                echo in_array($page, $settingsPages) ? 'active' : ''; 
            ?>" id="asset-toggle" href="#" role="button" aria-expanded="<?php echo in_array($page, $settingsPages) ? 'true' : 'false'; ?>" aria-controls="assetMenu">
                <div class="d-flex align-items-center w-100">
                    <i class="bi bi-gear me-2"></i>
                    <span class="flex-grow-1">Other Asset</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </a>
            <div class="<?php echo in_array($page, ['pendrive', 'data-cable']) ? 'is-open' : ''; ?>" id="assetMenu">
                <div class="nav flex-column ms-3">
                    <a class="nav-link <?php echo $page === 'pendrive' ? 'active' : ''; ?>" href="<?= site_url('admin/asset/pendrive') ?>">
                        <i class="bi bi-display me-2"></i> Pendrive
                    </a>
                    <a class="nav-link <?php echo $page === 'data-cable' ? 'active' : ''; ?>" href="<?= site_url('admin/asset/data-cable') ?>">
                        <i class="bi bi-info-circle me-2"></i> Data Cable
                    </a>
                </div>
            </div>
        </div>

        <!-- Logout -->
        <a class="nav-link" href="<?= site_url('admin/logout') ?>">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
    </nav>
</div>

<!-- Add custom CSS for sidebar styling -->
<style>
.nav-item .nav-link {
    position: relative;
    transition: all 0.3s ease;
}

.nav-item .nav-link .bi-chevron-down {
    transition: transform 0.3s ease;
}

.nav-item .nav-link.active .bi-chevron-down,
.nav-item .nav-link[aria-expanded="true"] .bi-chevron-down {
    transform: rotate(180deg);
}

.nav-item .nav-link .d-flex {
    width: 100%;
    align-items: center;
}

.nav-item .nav-link .flex-grow-1 {
    min-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

#laptopMenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease-out;
}

#laptopMenu.is-open {
    max-height: 500px;
}

#monitorMenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease-out;
}

#monitorMenu.is-open {
    max-height: 500px;
}

#cpuMenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease-out;
}

#cpuMenu.is-open {
    max-height: 500px;
}

#macMenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease-out;
}

#macMenu.is-open {
    max-height: 500px;
}

#keyboardMenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease-out;
}

#keyboardMenu.is-open {
    max-height: 500px;
}

#mouseMenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease-out;
}

#mouseMenu.is-open {
    max-height: 500px;
}

#phonesMenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease-out;
}

#phonesMenu.is-open {
    max-height: 500px;
}

#assetMenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease-out;
}

#assetMenu.is-open {
    max-height: 500px;
}

.sidebar {
    height: calc(100vh); /* Full viewport height minus header height */
    overflow-y: auto;
    position: fixed;
    left: 0;
    width: 250px;
    padding: 1rem;
}

</style>

<!-- Add custom JavaScript for settings menu -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    function setupToggle(toggleId, menuId) {
        const toggleButton = document.getElementById(toggleId);
        const menu = document.getElementById(menuId);

        if (toggleButton && menu) {
            toggleButton.addEventListener('click', function (e) {
                e.preventDefault();
                menu.classList.toggle('is-open');
                const expanded = toggleButton.getAttribute('aria-expanded') === 'true';
                toggleButton.setAttribute('aria-expanded', String(!expanded));
            });
        }
    }

    // Use the function for both menus
    setupToggle('laptop-toggle', 'laptopMenu');
    setupToggle('monitor-toggle', 'monitorMenu');
    setupToggle('cpu-toggle', 'cpuMenu');
    setupToggle('mac-toggle', 'macMenu');
    setupToggle('keyboard-toggle', 'keyboardMenu');
    setupToggle('mouse-toggle', 'mouseMenu');
    setupToggle('phones-toggle', 'phonesMenu');
    setupToggle('asset-toggle', 'assetMenu');
});
</script>


