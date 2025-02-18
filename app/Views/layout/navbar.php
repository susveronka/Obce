<nav
    class="navbar navbar-expand-sm navbar-light bg-light"
>
    <div class="container">
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <?= anchor(base_url("/"), 'Home', ['class'=>'nav-link']) ?>
                </li>
                <?php 
                foreach ($okres as $okres) : ?>
                    <li class="nav-item">
                        <?= anchor("okres/".$okres['kod'].'/20', $okres['nazev'], ['class'=>'nav-link']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
