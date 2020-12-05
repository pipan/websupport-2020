<div class="container">
    <div class="flexbox flexbox--row align--middle">
        <h2 class="flex">Select Type</h2>
    </div>
    <div class="card top-m">
        <div class="flexbox">
            <?php foreach ($data['types'] as $type): ?>
                <a class="btn btn--secondary" href="/create?type=<?= $type ?>"><?= $type ?></a>
            <?php endforeach; ?>
        </div>
        <div class="flexbox flexbox--row align--right top-m">
            <a class="btn btn--secondary" href="/">BACK</a>
        </div>
    </div>
</div>