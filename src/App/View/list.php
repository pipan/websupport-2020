<div class="container">
    <div class="flexbox flexbox--row align--middle">
        <h2 class="flex">DNS Records</h2>
        <a href="/createselect" class="btn btn--primary left-m">CREATE</a>
    </div>
    <?php foreach ($data['flash'] as $alert): ?>
        <div class="top-s alert alert--<?= $alert['type'] ?>">
            <?= htmlspecialchars($alert['message']) ?>
        </div>
    <?php endforeach; ?>
    <div class="list top-m">
        <?php foreach ($data['dns_records'] as $item): ?>
            <div class="list__item">
                <div class="list__item__title flexbox flexbox--row align--middle">
                    <div class="list__item__type tag right-m"><?= htmlspecialchars($item['type']) ?></div>
                    <div class="list__item__name"><?= htmlspecialchars($item['name']) ?></div>
                </div>
                <?php if (isset($item['note']) && $item['note'] !== ""): ?>
                    <div class="list__item__note">
                        <div class="flex">
                            <?= htmlspecialchars($item['note']) ?>
                        </div>
                        <form method="POST" action="/delete" onsubmit="return confirm('You are about to remove DNS record. Are you sure?')">
                            <input type="hidden" name="csrf" value="<?= $item['csrf_token'] ?>" />
                            <input type="hidden" name="id" value="<?= $item['id'] ?>" />
                            <button type="submit" class="btn btn--secondary">DELETE</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>