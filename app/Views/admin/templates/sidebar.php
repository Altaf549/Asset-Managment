<!-- Sidebar -->
<div class="col-md-3 col-lg-2 sidebar">
    <h4 class="mb-4">Admin Panel</h4>
    <nav class="nav flex-column">
        <!-- Main Navigation -->
        <a class="nav-link <?php echo $page === 'dashboard' ? 'active' : ''; ?>" href="<?= site_url('admin/dashboard') ?>">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>


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

#settingsMenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease-out;
}

#settingsMenu.is-open {
    max-height: 500px;
}
</style>

<!-- Add custom JavaScript for settings menu -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('settings-toggle');
    const menu = document.getElementById('settingsMenu');

    if (toggleButton && menu) {
        toggleButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Toggle the is-open class
            menu.classList.toggle('is-open');
            
            // Toggle the aria-expanded attribute
            toggleButton.setAttribute('aria-expanded', 
                toggleButton.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'
            );
        });
    }
});
</script>


