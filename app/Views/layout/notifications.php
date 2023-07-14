<li class="dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
        <i class="far fa-bell"></i>
    </a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">
            Notifications
            <div class="float-right">
                <a href="#">Mark All As Read</a>
            </div>
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
            <?php if (!empty($notifications)) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <?= $notification['title'] ?>
                            <div class="time text-primary"><?= $notification['created_at'] ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else : ?>
                <a href="#" class="dropdown-item">
                    <div class="dropdown-item-desc">
                        Tidak ada notifikasi
                    </div>
                </a>
            <?php endif; ?>
        </div>
        <div class="dropdown-footer text-center">
            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</li>
