<div class="container">
    <div class="flexbox flexbox--row align--middle">
        <h2 class="flex">Create Record</h2>
    </div>
    <?php foreach ($data['flash'] as $alert): ?>
        <div class="top-s alert alert--<?= $alert['type'] ?>">
            <?= $alert['message'] ?>
        </div>
    <?php endforeach; ?>
    <div class="card top-m">
        <form method="POST">
            <div class="form__item">
                <div class="form__label">Type</div>
                <div class="form__input">
                    <span class="tag"><?= $data['form']['type'] ?></span>
                    <input type="hidden" name="type" value="<?= $data['form']['type'] ?>" />
                </div>
            </div>
            <label class="form__item" for="name">
                <div class="form__label">Name</div>
                <div class="form__input">
                    <input id="name" type="text" name="name" value="<?= $data['form']['name'] ?>" />
                </div>
            </label>
            <label class="form__item" for="content">
                <div class="form__label">Content</div>
                <div class="form__input">
                    <input id="content" type="text" name="content" value="<?= $data['form']['content'] ?>" />
                </div>
            </label>
            <label class="form__item" for="ttl">
                <div class="form__label">TTL</div>
                <div class="form__input">
                    <input id="ttl" type="text" name="ttl" value="<?= $data['form']['ttl'] ?>" />
                </div>
            </label>
            <?php if (isset($data['form']['prio'])): ?>
                <label class="form__item" for="prio">
                    <div class="form__label">Priority</div>
                    <div class="form__input">
                        <input id="prio" type="text" name="prio" value="<?= $data['form']['prio'] ?>" />
                    </div>
                </label>
            <?php endif; ?>
            <?php if (isset($data['form']['port'])): ?>
                <label class="form__item" for="port">
                    <div class="form__label">Port</div>
                    <div class="form__input">
                        <input id="port" type="text" name="port" value="<?= $data['form']['port'] ?>" />
                    </div>
                </label>
            <?php endif; ?>
            <?php if (isset($data['form']['weight'])): ?>
                <label class="form__item" for="weight">
                    <div class="form__label">Weight</div>
                    <div class="form__input">
                        <input id="weight" type="text" name="weight" value="<?= $data['form']['weight'] ?>" />
                    </div>
                </label>
            <?php endif; ?>
            <div class="flexbox flexbox--row align--right top-s">
                <a href="/" class="btn btn--secondary right-m">CANCEL</a>
                <button type="submit" class="btn btn--primary">SAVE</button>
            </div>
        </form>
    </div>
</div>