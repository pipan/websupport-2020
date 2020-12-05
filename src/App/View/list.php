<div class="container">
    <div class="flexbox flexbox--row align--middle">
        <h2 class="flex">DNS Records</h2>
        <a href="/create" class="btn btn--primary left-m">CREATE</a>
    </div>
    <?php foreach ($data['flash'] as $alert): ?>
        <div class="top-s alert alert--<?= $alert['type'] ?>">
            <?= $alert['message'] ?>
        </div>
    <?php endforeach; ?>
    <div class="list top-m">
        <?php foreach ($data['dns_records'] as $item): ?>
            <div class="list__item">
                <div class="list__item__title flexbox flexbox--row align--middle">
                    <div class="list__item__type tag right-m"><?= $item['type'] ?></div>
                    <div class="list__item__name"><?= $item['name'] ?></div>
                </div>
                <?php if (isset($item['note']) && $item['note'] !== ""): ?>
                    <div class="list__item__note">
                        <?= $item['note'] ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>