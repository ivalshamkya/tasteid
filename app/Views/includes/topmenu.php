<header>
    <nav>
        <div>
            <ul>
                <li><a href="<?= base_url() ?>" class="logo"><span class="red">Taste</span><span class="white">ID.</span></a></li>
            </ul>
        </div>
        <div>
            <?php session();?>
            <?php if(!isset($_SESSION['user'])){ ?>
                <ul style="margin-top: 25px;">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url('resep/search') ?>">Cari</a></li>
                    <li><a href="<?= base_url('home/daftar') ?>" class="nav-daftar">Daftar</a></li>
                    <li><a href="<?= base_url('home/login') ?>" class="nav-masuk">Masuk</a></li>
                </ul>
            <?php } else{ ?>
                <ul style="margin-top: 25px;">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url('resep/search') ?>">Cari</a></li>
                    <li><a href="<?= base_url('planner') ?>">Meal Planner</a></li>
                    <li><a href="<?= base_url('resep/upload') ?>" >Upload Resep</a></li>
                    <li><a href="<?= base_url('artikel') ?>" >Upload Artikel</a></li>
                    <li><a href="<?= base_url('home/poin') ?>" >Poin</a></li>
                    <li><a href="<?= base_url('bookmark') ?>" >Bookmark</a></li>
                    <li><a href="<?= base_url('auth/logout') ?>" class="nav-daftar">Log Out</a></li>
                </ul>
            <?php } ?>
        </div>
    </nav>
</header>