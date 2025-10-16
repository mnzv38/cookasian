<?php include __DIR__ . '/../layout/header.php'; ?>

<main class="page-recettes">
    <h1>Toutes les recettes</h1>

    <?php if (!empty($recettes)): ?>
        <ul>
            <?php foreach ($recettes as $r): ?>
                <li>
                    <a href="/recettes/<?= htmlspecialchars($r['slug']) ?>">
                        <?= htmlspecialchars($r['titre']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune recette trouvée.</p>
    <?php endif; ?>
</main>

<?php include __DIR__ . '/../layout/footer.php'; ?>
